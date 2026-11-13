<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaJadwalController extends Controller
{
    private const TZ = 'Asia/Jakarta';

    private const SLOTS = [
        'pagi'  => ['label' => 'Pagi',   'start' => '09:00', 'end' => '10:30'],
        'sore1' => ['label' => 'Sore 1', 'start' => '15:30', 'end' => '17:00'],
        'sore2' => ['label' => 'Sore 2', 'start' => '17:00', 'end' => '18:30'],
    ];

    private function student(Request $request)
    {
        $student = DB::table('students')->where('user_id', $request->user()->id)->first();
        abort_if(!$student, 403, 'Akun ini belum terhubung dengan data siswa.');

        return $student;
    }

    public function index(Request $request)
    {
        $student = $this->student($request);
        $today   = Carbon::now(self::TZ)->startOfDay();

        $request->validate(['date' => ['nullable', 'date']]);
        $selected  = Carbon::parse($request->query('date', $today->toDateString()), self::TZ)->startOfDay();
        $weekStart = $selected->copy()->startOfWeek(Carbon::MONDAY);
        $weekEnd   = $weekStart->copy()->endOfWeek(Carbon::SUNDAY);

        $sessions = DB::table('lesson_sessions as ls')
            ->leftJoin('tutors as t', 't.id', '=', 'ls.tutor_id')
            ->where('ls.student_id', $student->id)
            ->where('ls.status', '!=', 'batal')
            ->whereBetween('ls.date', [$weekStart->toDateString(), $weekEnd->toDateString()])
            ->orderBy('ls.date')->orderBy('ls.start_time')
            ->get(['ls.*', 't.name as tutor_name']);

        $pendingIds = DB::table('reschedule_requests')
            ->where('student_id', $student->id)
            ->where('status', 'menunggu')
            ->pluck('lesson_session_id')
            ->all();

        $sessions = $sessions->map(fn ($s) => $this->present($s, $pendingIds));
        $byDate   = $sessions->groupBy('date');

        $days = collect(range(0, 6))->map(function ($i) use ($weekStart, $today, $selected, $byDate) {
            $d     = $weekStart->copy()->addDays($i);
            $items = $byDate->get($d->toDateString(), collect());

            return [
                'date'        => $d->toDateString(),
                'day_name'    => $d->locale('id')->isoFormat('dddd'),
                'day_number'  => $d->day,
                'month_short' => $d->locale('id')->isoFormat('MMM'),
                'is_today'    => $d->isSameDay($today),
                'is_selected' => $d->isSameDay($selected),
                'count'       => $items->count(),
                'needs_action' => $items->contains(fn ($s) => $s->status === 'terjadwal' && !$s->student_confirmed),
            ];
        });

        $selectedKey      = $selected->toDateString();
        $selectedSessions = $byDate->get($selectedKey, collect());
        $otherSessions    = $sessions->filter(fn ($s) => $s->date !== $selectedKey)->values();

        // Ringkasan status hari terpilih
        $needsAction = $selectedSessions->contains(fn ($s) => $s->status === 'terjadwal' && !$s->student_confirmed);
        $statusText  = $selectedSessions->isEmpty()
            ? 'Tidak ada sesi'
            : ($needsAction ? 'Ada sesi menunggu konfirmasi' : 'Semua Terkonfirmasi');

        return view('portal_siswa.jadwal', [
            'student'          => $student,
            'weekStart'        => $weekStart,
            'weekEnd'          => $weekEnd,
            'weekNumber'       => $weekStart->copy()->addDays(3)->weekOfMonth,
            'prevWeek'         => $weekStart->copy()->subWeek()->toDateString(),
            'nextWeek'         => $weekStart->copy()->addWeek()->toDateString(),
            'todayDate'        => $today->toDateString(),
            'days'             => $days,
            'selected'         => $selected,
            'selectedSessions' => $selectedSessions,
            'otherSessions'    => $otherSessions,
            'statusText'       => $statusText,
            'needsAction'      => $needsAction,
            'slots'            => self::SLOTS,
        ]);
    }

    public function confirm(Request $request, int $id)
    {
        $student = $this->student($request);
        $session = $this->ownSession($student->id, $id);

        abort_if($session->status !== 'terjadwal', 422, 'Sesi ini tidak bisa dikonfirmasi.');

        DB::table('lesson_sessions')->where('id', $id)->update([
            'student_confirmed' => true,
            'updated_at'        => now(),
        ]);

        return back()->with('success', 'Kehadiran pada sesi tersebut berhasil dikonfirmasi.');
    }

    public function reschedule(Request $request, int $id)
    {
        $student = $this->student($request);
        $session = $this->ownSession($student->id, $id);

        $data = $request->validate([
            'date'   => ['required', 'date', 'after_or_equal:today'],
            'slot'   => ['required', 'in:' . implode(',', array_keys(self::SLOTS))],
            'reason' => ['nullable', 'string', 'max:500'],
        ]);

        abort_if($session->status !== 'terjadwal', 422, 'Sesi ini tidak bisa diajukan ganti waktu.');

        $slot = self::SLOTS[$data['slot']];

        $bentrok = DB::table('lesson_sessions')
            ->where('tutor_id', $session->tutor_id)
            ->where('id', '!=', $session->id)
            ->where('status', 'terjadwal')
            ->where('date', $data['date'])
            ->where('start_time', '<', $slot['end'])
            ->where('end_time', '>', $slot['start'])
            ->exists();

        if ($bentrok) {
            return back()->withErrors(['slot' => 'Slot tersebut sudah terisi oleh tutor. Pilih waktu lain.'])->withInput();
        }

        $pending = DB::table('reschedule_requests')
            ->where('lesson_session_id', $id)->where('status', 'menunggu')->exists();

        if ($pending) {
            return back()->withErrors(['slot' => 'Sudah ada pengajuan yang menunggu persetujuan untuk sesi ini.']);
        }

        DB::table('reschedule_requests')->insert([
            'lesson_session_id' => $id,
            'student_id'        => $student->id,
            'requested_by'      => $request->user()->id,
            'requested_date'    => $data['date'],
            'requested_start'   => $slot['start'],
            'requested_end'     => $slot['end'],
            'reason'            => $data['reason'] ?? null,
            'status'            => 'menunggu',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        return back()->with('success', 'Pengajuan ganti waktu terkirim dan menunggu persetujuan.');
    }

    private function ownSession(int $studentId, int $id)
    {
        $session = DB::table('lesson_sessions')
            ->where('id', $id)->where('student_id', $studentId)->first();
        abort_if(!$session, 404);

        return $session;
    }

    private function present($s, array $pendingIds)
    {
        $s->time_label   = substr($s->start_time, 0, 5) . ' – ' . substr($s->end_time, 0, 5) . ' WIB';
        $s->date_label   = Carbon::parse($s->date)->locale('id')->isoFormat('ddd, D MMM');
        $s->method_label = $s->method === 'online' ? 'Online' : 'Home Visit';
        $s->has_pending  = in_array($s->id, $pendingIds, true);

        [$s->state, $s->state_class] = match (true) {
            $s->status === 'selesai'                     => ['Selesai', 'done'],
            $s->has_pending                              => ['Menunggu persetujuan ganti waktu', 'wait'],
            $s->student_confirmed && $s->tutor_confirmed => ['Terkonfirmasi', 'ok'],
            $s->student_confirmed                        => ['Menunggu tutor', 'wait'],
            default                                      => ['Belum dikonfirmasi', 'todo'],
        };

        return $s;
    }
}
