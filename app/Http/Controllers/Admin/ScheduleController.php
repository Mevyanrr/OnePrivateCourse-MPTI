<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LessonSession;
use App\Models\Student;
use App\Models\Tutor;
use App\Support\Fmt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ScheduleController extends Controller
{
    private function range(Request $r)
    {
        return match ($r->input('range', 'all')) {
            'today' => [today()->toDateString(), today()->toDateString()],
            'week'  => [now()->startOfWeek()->toDateString(), now()->endOfWeek()->toDateString()],
            'month' => [now()->startOfMonth()->toDateString(), now()->endOfMonth()->toDateString()],
            default => null,
        };
    }

    /** pasangan sesi yang bentrok (tutor sama / siswa sama, waktu tumpang tindih) */
    private function conflictPairs($sessions): array
    {
        $pairs = [];
        $list = $sessions->where('status', '!=', 'batal')->values();
        foreach ($list as $i => $a) {
            foreach ($list->slice($i + 1) as $b) {
                if ($a->date->toDateString() !== $b->date->toDateString()) continue;
                if ($a->tutor_id !== $b->tutor_id && $a->student_id !== $b->student_id) continue;
                if ($a->start_time < $b->end_time && $a->end_time > $b->start_time) {
                    $pairs[] = [$a, $b];
                }
            }
        }
        return $pairs;
    }

    public function index(Request $r)
    {
        $q = LessonSession::with(['student', 'tutor'])->orderBy('date')->orderBy('start_time');
        if ($rg = $this->range($r)) $q->whereBetween('date', $rg);
        if ($r->filled('tutor')) $q->where('tutor_id', $r->tutor);
        if ($r->filled('student')) $q->where('student_id', $r->student);
        if ($r->filled('method')) $q->where('method', $r->method);
        $all = $q->get();

        $week = LessonSession::with(['student', 'tutor'])->whereBetween('date', [now()->startOfWeek()->toDateString(), now()->endOfWeek()->toDateString()])->get();
        $pairs = $this->conflictPairs($week);
        $conflictIds = collect($pairs)->flatten()->pluck('id')->unique()->all();
        $order = [];
        foreach ($pairs as $n => [$a, $b]) { $order[$a->id] = $order[$a->id] ?? ($n + 1); $order[$b->id] = $order[$b->id] ?? ($n + 1); }

        foreach ($all as $s) {
            $s->vs = in_array($s->id, $conflictIds, true) ? 'bentrok' : match ($s->liveStatus()) { 'selesai' => 'selesai', 'berjalan' => 'berjalan', 'batal' => 'selesai', default => 'akan' };
            $s->second_line = match ($s->vs) { 'berjalan' => 'Sedang Berlangsung', 'bentrok' => 'Bentrok #' . ($order[$s->id] ?? 1), default => Fmt::dateShort($s->date) };
        }
        if ($r->filled('status')) $all = $all->where('vs', $r->status)->values();
        if ($r->filled('q')) {
            $needle = mb_strtolower($r->q);
            $all = $all->filter(fn ($s) => str_contains(mb_strtolower($s->student->name . ' ' . ($s->tutor->name ?? '') . ' ' . $s->subject), $needle))->values();
        }
        $page = max(1, (int) $r->input('page', 1));
        $sessions = new LengthAwarePaginator($all->forPage($page, 10)->values(), $all->count(), 10, $page, ['path' => $r->url(), 'query' => $r->query()]);

        $today = LessonSession::with('tutor')->whereDate('date', today())->where('status', '!=', 'batal')->orderBy('start_time')->get();
        $running = $today->filter(fn ($s) => $s->liveStatus() === 'berjalan');
        $upcoming = $today->filter(fn ($s) => $s->liveStatus() === 'belum');
        $done = $today->filter(fn ($s) => $s->liveStatus() === 'selesai');
        $kpi = [
            'today' => $today->count(), 'done' => $done->count(), 'running' => $running->count(), 'upcoming' => $upcoming->count(),
            'confirmedPct' => $today->count() ? (int) round($today->where('tutor_confirmed', true)->count() / $today->count() * 100) : 100,
            'attNote' => 'Laporan presensi telah diisi',
            'runningNote' => $running->where('method', 'studio')->count() . ' Sesi di Studio Bimbel',
            'upNote' => $upcoming->count() ? 'Mulai pukul ' . $upcoming->pluck('start_time')->map(fn ($t) => Fmt::hhmm($t))->unique()->take(2)->implode(' & ') . ' WIB' : 'Tidak ada sesi tersisa',
        ];

        $html = '';
        if ($pairs) {
            [$a, $b] = $pairs[0];
            $same = $a->tutor_id === $b->tutor_id;
            $html = '<strong>' . e($same ? ($a->tutor->name ?? '-') : $a->student->name) . '</strong> dialokasikan pada 2 sesi bersamaan di hari <strong>' . e(Fmt::dateShort($a->date) . ' (' . Fmt::hhmm($a->start_time) . ' – ' . Fmt::hhmm($a->end_time) . ' WIB)') . '</strong> antara <span class="font-semibold">' . e($a->student->name . ' (' . Fmt::method($a->method) . ')') . '</span> dan <span class="font-semibold">' . e($b->student->name . ' (' . Fmt::method($b->method) . ')') . '</span>.';
        }

        $sessionsJson = $sessions->getCollection()->mapWithKeys(fn ($s) => [$s->id => [
            'date' => $s->date->toDateString(), 'date_label' => Fmt::dateShort($s->date), 'start' => Fmt::hhmm($s->start_time), 'end' => Fmt::hhmm($s->end_time),
            'tutor_id' => $s->tutor_id, 'student' => $s->student->name, 'tutor' => $s->tutor->name ?? '-', 'method' => Fmt::method($s->method),
        ]]);

        return view('admin.jadwal', [
            'sessions' => $sessions, 'kpi' => $kpi, 'conflictCount' => count($pairs), 'conflictHtml' => $html,
            'tutors' => Tutor::where('status', 'aktif')->orderBy('id')->get(), 'range' => $r->input('range', 'all'), 'sessionsJson' => $sessionsJson,
        ]);
    }

    private function freeSlots(LessonSession $s): array
    {
        $slots = [];
        $dur = Fmt::minutes($s->start_time, $s->end_time);
        $d = $s->date->toDateString();
        $free = fn ($tid, $date, $st, $en) => LessonSession::conflicts($tid, $s->student_id, $date, $st, $en, $s->id)->isEmpty();
        // 1) jam lain di hari yang sama
        foreach (['18:00', '19:00', '17:30', '15:00', '10:00'] as $h) {
            $en = Carbon::parse($h)->addMinutes($dur)->format('H:i');
            if ($s->tutor_id && $free($s->tutor_id, $d, $h, $en)) {
                $slots[] = ['date' => $d, 'start' => $h, 'end' => $en, 'tutor_id' => $s->tutor_id, 'label' => Fmt::dateShort($d) . ' • ' . $h . ' - ' . $en . ' WIB', 'tag' => 'Rekomendasi Terbaik', 'sub' => 'Tutor: ' . ($s->tutor->name ?? '-') . ' (' . Fmt::method($s->method) . ')'];
                break;
            }
        }
        // 2) hari berikutnya jam sama
        for ($i = 1; $i <= 4 && count($slots) < 2; $i++) {
            $nd = $s->date->copy()->addDays($i)->toDateString();
            $st = Fmt::hhmm($s->start_time);
            $en = Fmt::hhmm($s->end_time);
            if ($s->tutor_id && $free($s->tutor_id, $nd, $st, $en)) {
                $slots[] = ['date' => $nd, 'start' => $st, 'end' => $en, 'tutor_id' => $s->tutor_id, 'label' => Fmt::dateShort($nd) . ' • ' . $st . ' - ' . $en . ' WIB', 'tag' => 'Slot Bebas', 'sub' => 'Tutor: ' . ($s->tutor->name ?? '-') . ' (' . Fmt::method($s->method) . ')'];
            }
        }
        // 3) tutor pengganti pada waktu yang sama
        foreach (Tutor::where('status', 'aktif')->where('id', '!=', $s->tutor_id)->get() as $t) {
            if ($free($t->id, $d, Fmt::hhmm($s->start_time), Fmt::hhmm($s->end_time))) {
                $slots[] = ['date' => $d, 'start' => Fmt::hhmm($s->start_time), 'end' => Fmt::hhmm($s->end_time), 'tutor_id' => $t->id, 'label' => Fmt::dateShort($d) . ' • ' . Fmt::hhmm($s->start_time) . ' - ' . Fmt::hhmm($s->end_time) . ' WIB', 'tag' => 'Tutor Pengganti', 'sub' => 'Assign: ' . $t->name . ' (' . $t->headline . ')'];
                break;
            }
        }
        return array_slice($slots, 0, 3);
    }

    public function create(Request $r)
    {
        $students = Student::where('status', 'aktif')->orderBy('name')->get();
        $tutors = Tutor::where('status', 'aktif')->orderBy('id')->get();
        $edit = null;
        $target = null;
        if ($r->filled('ubah')) {
            $target = LessonSession::with(['student', 'tutor'])->find($r->ubah);
        }
        if (! $target) {
            $week = LessonSession::with(['student', 'tutor'])->whereBetween('date', [now()->startOfWeek()->toDateString(), now()->endOfWeek()->toDateString()])->get();
            $pairs = $this->conflictPairs($week);
            if ($pairs) { $target = $pairs[0][1]; }
        }
        if ($target) {
            $other = LessonSession::conflicts((int) $target->tutor_id, $target->student_id, $target->date->toDateString(), Fmt::hhmm($target->start_time), Fmt::hhmm($target->end_time), $target->id)->first();
            $edit = [
                'id' => $target->id, 'date' => $target->date->toDateString(), 'start' => Fmt::hhmm($target->start_time), 'end' => Fmt::hhmm($target->end_time),
                'student' => $target->student->name, 'grade' => $target->student->grade, 'school' => $target->student->school, 'code' => $target->student->code,
                'tutor' => $target->tutor->name ?? '-', 'tutor_head' => $target->tutor->headline ?? '-',
                'conflict_text' => $other ? 'Bentrok dengan sesi ' . $other->student->name . ' (' . Fmt::hhmm($other->start_time) . ' - ' . Fmt::hhmm($other->end_time) . ' WIB) pada tutor ' . ($other->tutor->name ?? '-') . '.' : 'Tidak ada bentrok pada jadwal saat ini. Pilih slot pengganti bila ingin menggeser jadwal.',
                'slots' => $this->freeSlots($target),
            ];
        }
        return view('admin.jadwal_baru', [
            'edit' => $edit,
            'studentsJson' => $students->map(fn ($s) => ['id' => $s->id, 'name' => $s->name, 'grade' => $s->grade, 'code' => $s->code, 'address' => $s->address, 'area' => $s->area, 'method' => $s->method, 'program' => $s->program, 'tutor_id' => $s->tutor_id, 'initials' => Fmt::initials($s->name)])->values(),
            'tutorsJson' => $tutors->map(fn ($t) => ['id' => $t->id, 'name' => $t->name, 'headline' => $t->headline, 'initials' => Fmt::initials($t->name)])->values(),
        ]);
    }

    private function check(int $studentId, int $tutorId, string $date, string $start, string $end, ?int $ignore = null): array
    {
        $conf = LessonSession::conflicts($tutorId, $studentId, $date, $start, $end, $ignore);
        $tutor = Tutor::find($tutorId);
        $load = $tutor ? $tutor->weeklyLoad() : 0;
        $max = $tutor->max_sessions ?? 20;
        $dayName = Fmt::dayName($date);
        if ($conf->isEmpty()) {
            return ['ok' => true, 'message' => 'Tidak ada bentrok. Jadwal tutor ' . ($tutor->name ?? '-') . ' dan siswa ' . (Student::find($studentId)->name ?? '-') . ' cocok pada waktu ini.',
                'checks' => ["Slot {$dayName} {$start} - {$end} WIB terbuka penuh tanpa janji lain.", "{$load}/{$max} Sesi pekan ini (" . ($load / max(1, $max) < .8 ? 'Aman' : 'Padat') . ' - ' . (int) round($load / max(1, $max) * 100) . '% kapasitas kerja tutor).', 'Siswa bebas dari sesi privat lain pada jam ini.', 'Tidak ada sesi lain berdekatan yang memerlukan waktu perjalanan.'],
                'avail' => $load >= $max ? 'Penuh' : 'Tersedia (Sisa ' . max(0, $max - $load) . ' slot pekan ini)'];
        }
        $c = $conf->first();
        return ['ok' => false, 'message' => 'Bentrok dengan sesi ' . $c->student->name . ' (' . Fmt::hhmm($c->start_time) . ' - ' . Fmt::hhmm($c->end_time) . ' WIB) bersama ' . ($c->tutor->name ?? '-') . '.',
            'checks' => ['Tutor / siswa sudah memiliki sesi pada jam ini.', "{$load}/{$max} Sesi pekan ini.", 'Siswa memiliki sesi lain pada rentang waktu ini.', 'Pilih jam atau tutor lain.'], 'avail' => 'Bentrok'];
    }

    public function cek(Request $r)
    {
        $d = $r->validate(['student_id' => 'required|integer', 'tutor_id' => 'required|integer', 'date' => 'required|date', 'start_time' => 'required', 'end_time' => 'required']);
        return response()->json($this->check($d['student_id'], $d['tutor_id'], $d['date'], $d['start_time'], $d['end_time']));
    }

    public function store(Request $r)
    {
        $d = $r->validate([
            'student_id' => 'required|exists:students,id', 'tutor_id' => 'required|exists:tutors,id', 'date' => 'required|date', 'start_time' => 'required', 'end_time' => 'required|after:start_time',
            'method' => 'required|in:home_visit,online,studio', 'repeat' => 'nullable|in:sekali,rutin', 'notes' => 'nullable|string',
        ], ['end_time.after' => 'Jam selesai harus setelah jam mulai.']);
        $student = Student::find($d['student_id']);
        $times = ($d['repeat'] ?? 'sekali') === 'rutin' ? 4 : 1;
        $made = 0; $skipped = 0;
        $no = (int) LessonSession::where('student_id', $student->id)->max('session_no');
        for ($i = 0; $i < $times; $i++) {
            $date = Carbon::parse($d['date'])->addWeeks($i)->toDateString();
            if (LessonSession::conflicts($d['tutor_id'], $student->id, $date, $d['start_time'], $d['end_time'])->isNotEmpty()) { $skipped++; continue; }
            LessonSession::create(['student_id' => $student->id, 'tutor_id' => $d['tutor_id'], 'subject' => $student->program, 'date' => $date, 'start_time' => $d['start_time'], 'end_time' => $d['end_time'],
                'method' => $d['method'], 'location' => $d['method'] === 'online' ? 'Zoom' : $student->area, 'notes' => $d['notes'] ?? null, 'session_no' => ++$no]);
            $made++;
        }
        if (! $made) {
            return response()->json(['message' => 'Jadwal bentrok. Pilih jam atau tutor lain.'], 422);
        }
        return response()->json(['message' => $made . ' sesi les dijadwalkan' . ($skipped ? ', ' . $skipped . ' bentrok dilewati.' : '.'), 'redirect' => route('admin.jadwal')]);
    }

    public function update(Request $r, LessonSession $session)
    {
        $d = $r->validate(['date' => 'required|date', 'start_time' => 'required', 'end_time' => 'required|after:start_time', 'tutor_id' => 'required|exists:tutors,id', 'reason' => 'nullable|string'],
            ['end_time.after' => 'Jam selesai harus setelah jam mulai.']);
        if (LessonSession::conflicts($d['tutor_id'], $session->student_id, $d['date'], $d['start_time'], $d['end_time'], $session->id)->isNotEmpty()) {
            return response()->json(['message' => 'Slot itu masih bentrok dengan sesi lain.'], 422);
        }
        $session->update(['date' => $d['date'], 'start_time' => $d['start_time'], 'end_time' => $d['end_time'], 'tutor_id' => $d['tutor_id'], 'reschedule_reason' => $d['reason'] ?? null,
            'tutor_confirmed' => false, 'parent_confirmed' => false, 'status' => 'terjadwal']);
        return response()->json(['message' => 'Jadwal sesi diperbarui. Tutor & orang tua perlu konfirmasi ulang.']);
    }

    public function cancel(LessonSession $session)
    {
        $session->update(['status' => 'batal']);
        return response()->json(['message' => 'Sesi dibatalkan.']);
    }
}
