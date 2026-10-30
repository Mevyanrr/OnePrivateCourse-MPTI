<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\LessonSession;
use App\Models\Payment;
use App\Models\Student;
use App\Support\Fmt;

class DashboardController extends Controller
{
    public function index()
    {
        $todays = LessonSession::with(['student', 'tutor'])->whereDate('date', today())->where('status', '!=', 'batal')->orderBy('start_time')->get();
        $period = Fmt::period();

        $emptyAtt = LessonSession::with('tutor')->whereDate('date', '<', today())->where('status', '!=', 'batal')
            ->whereDate('date', '>=', today()->subDay())->whereDoesntHave('attendance')->get();
        $pending = LessonSession::whereDate('date', '>=', today())->where('status', '!=', 'batal')
            ->where(fn ($q) => $q->where('tutor_confirmed', false)->orWhere('parent_confirmed', false))->count();
        $unpaid = Payment::where('status', 'belum')->where('period', $period)->distinct('student_id')->count('student_id');

        $month = LessonSession::where('status', '!=', 'batal')->whereYear('date', now()->year)->whereMonth('date', now()->month)->get();
        $monthDone = $month->filter(fn ($s) => $s->liveStatus() === 'selesai');
        $hours = fn ($c) => round($c->sum(fn ($s) => Fmt::minutes($s->start_time, $s->end_time)) / 60);

        $d = [
            'sessionsToday'  => $todays->count(),
            'homeVisit'      => $todays->where('method', '!=', 'online')->count(),
            'online'         => $todays->where('method', 'online')->count(),
            'activeStudents' => Student::where('status', 'aktif')->count(),
            'newStudents'    => Student::whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)->count(),
            'tutorsToday'    => $todays->pluck('tutor_id')->unique()->count(),
            'allConfirmed'   => $todays->every(fn ($s) => $s->tutor_confirmed),
            'unconfirmed'    => $todays->where('tutor_confirmed', false)->count(),
            'unpaid'         => $unpaid,
            'emptyAtt'       => $emptyAtt->count(),
            'emptyAttTutor'  => $emptyAtt->first()->tutor->name ?? 'tutor',
            'pendingConfirm' => $pending,
            'priority'       => (int) ($emptyAtt->count() > 0) + (int) ($unpaid > 0) + (int) ($pending > 0),
            'monthPct'       => $month->count() ? (int) round($monthDone->count() / $month->count() * 100) : 0,
            'targetHours'    => $hours($month),
            'doneHours'      => $hours($monthDone),
            'tutorAttendance' => $month->count() ? round($month->where('tutor_confirmed', true)->count() / $month->count() * 100, 1) : 100,
        ];

        $dutyTutors = $todays->groupBy('tutor_id')->map(function ($group) {
            $t = $group->first()->tutor;
            $states = $group->map->liveStatus();
            $status = $states->contains('berjalan') ? 'Di Kelas' : ($states->every(fn ($x) => $x === 'selesai') ? 'Terselesaikan' : 'Siap Berangkat');
            $methods = $group->pluck('method')->unique()->map(fn ($m) => Fmt::method($m))->implode(' & ');
            return ['tutor' => $t, 'count' => $group->count(), 'method' => $methods, 'status' => $status];
        })->filter(fn ($r) => $r['tutor'])->values();

        return view('admin.dashboard', [
            'd' => $d,
            'todaySessions' => $todays->take(4),
            'dutyTutors' => $dutyTutors,
        ]);
    }
}
