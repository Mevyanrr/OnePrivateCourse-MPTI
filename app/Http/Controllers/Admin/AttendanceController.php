<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\LessonSession;
use App\Models\Student;
use App\Models\Tutor;
use App\Support\Fmt;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class AttendanceController extends Controller
{
    public function index(Request $r)
    {
        $q = LessonSession::with(['student', 'tutor', 'attendance'])->where('status', '!=', 'batal')->whereDate('date', '<=', today())->orderByDesc('date')->orderByDesc('start_time');
        if ($r->filled('student')) $q->where('student_id', $r->student);
        if ($r->filled('tutor')) $q->where('tutor_id', $r->tutor);
        $all = $q->get()->filter(fn ($s) => $s->attendance || $s->liveStatus() === 'selesai')->values();
        foreach ($all as $s) {
            $a = $s->attendance;
            $s->att_status = $a && $a->status !== 'belum' ? $a->status : 'belum';
            $s->att_badge = match ($s->att_status) { 'hadir' => 'Tuntas', 'izin' => 'Izin', 'sakit' => 'Sakit', 'alpa' => 'Alpa', default => 'Belum' };
            $s->att_by = $a ? (($a->submitted_by ?: 'Admin') . ($a->submitted_at ? ' • ' . $a->submitted_at->format('H:i') . ' WIB' : '')) : '-';
        }
        if ($r->filled('status')) $all = $all->where('att_status', $r->status)->values();
        $page = max(1, (int) $r->input('page', 1));
        $sessions = new LengthAwarePaginator($all->forPage($page, 10)->values(), $all->count(), 10, $page, ['path' => $r->url(), 'query' => $r->query()]);

        $month = LessonSession::with('attendance')->where('status', '!=', 'batal')->whereYear('date', now()->year)->whereMonth('date', now()->month)->get();
        $monthAtt = $month->map->attendance->filter();
        $total = $month->count();
        $hadir = $monthAtt->where('status', 'hadir')->count();
        $izin = $monthAtt->where('status', 'izin')->count();
        $sakit = $monthAtt->where('status', 'sakit')->count();
        $belum = $month->filter(fn ($s) => $s->liveStatus() === 'selesai' && (! $s->attendance || $s->attendance->status === 'belum'))->count();
        $m = [
            'total' => $total, 'hadir' => $hadir, 'izin' => $izin, 'sakit' => $sakit, 'izinSakit' => $izin + $sakit, 'belum' => $belum,
            'hadirPct' => $total ? round($hadir / $total * 100, 1) : 0, 'izinPct' => $total ? round(($izin + $sakit) / $total * 100, 1) : 0,
            'resched' => $month->whereNotNull('reschedule_reason')->count(), 'students' => Student::where('status', 'aktif')->count(), 'tutors' => Tutor::where('status', 'aktif')->count(),
        ];

        $recap = Student::with('tutor')->where('status', 'aktif')->orderBy('id')->limit(12)->get()->map(function ($s) {
            $att = Attendance::whereHas('session', fn ($q) => $q->where('student_id', $s->id))->get();
            $s->sessions_count = $s->sessions()->where('status', '!=', 'batal')->whereMonth('date', now()->month)->count();
            $s->c_hadir = $att->where('status', 'hadir')->count(); $s->c_izin = $att->where('status', 'izin')->count();
            $s->c_sakit = $att->where('status', 'sakit')->count(); $s->c_alpa = $att->where('status', 'alpa')->count();
            $den = $s->c_hadir + $s->c_izin + $s->c_sakit + $s->c_alpa;
            $s->pct = $den ? (int) round($s->c_hadir / $den * 100) : 100;
            return $s;
        });

        $pending = LessonSession::with(['student', 'tutor', 'attendance'])->where('status', '!=', 'batal')->whereDate('date', '<=', today())->orderByDesc('date')->get()
            ->filter(fn ($s) => $s->liveStatus() === 'selesai' && (! $s->attendance || $s->attendance->status === 'belum'))->values();
        if ($pending->isEmpty()) {
            $pending = LessonSession::with(['student', 'tutor'])->where('status', '!=', 'batal')->whereDate('date', '<=', today())->orderByDesc('date')->limit(5)->get();
        }
        $pendingJson = $pending->mapWithKeys(fn ($s) => [$s->id => ['date' => Fmt::dateLong($s->date), 'time' => Fmt::range($s->start_time, $s->end_time), 'topic' => $s->topic ?: $s->subject]]);

        return view('admin.presensi', [
            'sessions' => $sessions, 'm' => $m, 'recap' => $recap, 'pending' => $pending, 'pendingJson' => $pendingJson,
            'filterStudents' => Student::orderBy('name')->get(['id', 'name']), 'filterTutors' => Tutor::orderBy('name')->get(['id', 'name']),
        ]);
    }

    public function store(Request $r)
    {
        $d = $r->validate(['session_id' => 'required|exists:lesson_sessions,id', 'status' => 'required|in:hadir,izin,sakit,alpa', 'topic' => 'nullable|string', 'journal' => 'nullable|string', 'reason' => 'nullable|string']);
        $s = LessonSession::find($d['session_id']);
        if (! empty($d['topic'])) $s->topic = $d['topic'];
        $s->status = 'selesai';
        $s->save();
        Attendance::updateOrCreate(['lesson_session_id' => $s->id], [
            'status' => $d['status'], 'journal' => $d['journal'] ?? null, 'submitted_by' => 'Admin Cabang (' . (($d['reason'] ?? 'wa') === 'wa' ? 'WA' : 'Manual') . ')', 'submitted_at' => now(),
            'understanding' => $d['status'] === 'hadir' ? 4 : null,
        ]);
        return response()->json(['message' => 'Presensi tersimpan.']);
    }
}
