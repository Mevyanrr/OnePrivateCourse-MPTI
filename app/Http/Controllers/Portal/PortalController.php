<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\LessonSession;
use App\Models\Payment;
use App\Models\Student;
use App\Support\Fmt;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    private function children()
    {
        $user = auth()->user();
        if ($user->role === 'wali') {
            return Student::with('tutor')->where('parent_user_id', $user->id)->orderBy('id')->get();
        }
        return Student::with('tutor')->where('status', 'aktif')->orderBy('id')->limit(2)->get(); // pratinjau admin
    }

    private function base(Request $r): array
    {
        $children = $this->children();
        if ($children->isEmpty()) {
            abort(403, 'Belum ada siswa yang terhubung ke akun ini. Hubungi admin cabang.');
        }
        if ($r->filled('anak') && $children->contains('id', (int) $r->anak)) {
            session(['child_id' => (int) $r->anak]);
        }
        $child = $children->firstWhere('id', session('child_id')) ?: $children->first();

        return [
            'children' => $children, 'child' => $child,
            'childrenJson' => $children->map(fn ($c) => ['id' => $c->id, 'name' => $c->name])->values(),
            'notifText' => 'Tidak ada pemberitahuan baru.',
        ];
    }

    private function quota(Student $child): array
    {
        $used = $child->sessions()->where('status', '!=', 'batal')->whereYear('date', now()->year)->whereMonth('date', now()->month)->get()->filter(fn ($s) => $s->liveStatus() === 'selesai')->count();
        return ['used' => $used, 'total' => 8, 'pct' => min(100, round($used / 8 * 100, 1))];
    }

    private function history(Student $child, int $limit)
    {
        return Attendance::with('session.tutor')->whereHas('session', fn ($q) => $q->where('student_id', $child->id))
            ->where('status', '!=', 'belum')->get()->sortByDesc(fn ($a) => $a->session->date->timestamp)->take($limit)->values();
    }

    public function beranda(Request $r)
    {
        $d = $this->base($r);
        $child = $d['child'];
        $next = LessonSession::with('tutor')->where('student_id', $child->id)->whereDate('date', '>=', today())->where('status', '!=', 'batal')->where('parent_confirmed', false)->orderBy('date')->orderBy('start_time')->first();
        $hero = LessonSession::with('tutor')->where('student_id', $child->id)->where('status', '!=', 'batal')->whereDate('date', '>=', today())->orderBy('date')->orderBy('start_time')->get()
            ->first(fn ($s) => $s->liveStatus() !== 'selesai');
        $history = $this->history($child, 4);
        foreach ($history as $a) {
            $a->label = match ($a->status) { 'hadir' => 'Hadir Tuntas', 'izin' => 'Izin (Terkonfirmasi)', 'sakit' => 'Izin Sakit (Terkonfirmasi)', default => ucfirst($a->status) };
            $a->extra = $a->status === 'hadir' ? ($a->understanding >= 5 ? 'Hafalan Sangat Lancar' : 'Pemahaman ' . ($a->understanding ?: '-') . '/5') : 'Jadwal pengganti disepakati cabang';
        }
        $all = Attendance::whereHas('session', fn ($q) => $q->where('student_id', $child->id))->where('status', '!=', 'belum')->get();
        $weekSessions = LessonSession::where('student_id', $child->id)->where('status', '!=', 'batal')->whereBetween('date', [now()->startOfWeek()->toDateString(), now()->endOfWeek()->toDateString()])->get();
        $done = $weekSessions->filter(fn ($s) => $s->liveStatus() === 'selesai')->count();
        $monthAtt = $all->filter(fn ($a) => $a->session && $a->session->date->isSameMonth(now()));
        $den = max(1, $all->count());
        $pct = (int) round($all->where('status', 'hadir')->count() / $den * 100);
        $pay = $child->payments()->where('period', Fmt::period())->first() ?: $child->payments()->latest('id')->first();
        $tutor2 = $child->tutor ? \App\Models\Tutor::where('id', '!=', $child->tutor_id)->first() : null;

        return view('siswa.beranda', $d + [
            'greet' => trim(preg_replace('/\s+(Kusumawardhani|Syakieb)$/', '', auth()->user()->name)),
            'next' => $next, 'pendingCount' => LessonSession::where('student_id', $child->id)->whereDate('date', '>=', today())->where('status', '!=', 'batal')->where('parent_confirmed', false)->count(),
            'nextJson' => $next ? ['id' => $next->id, 'date' => $next->date->toDateString(), 'start' => Fmt::hhmm($next->start_time), 'end' => Fmt::hhmm($next->end_time)] : ['id' => 0, 'date' => today()->toDateString(), 'start' => '16:00', 'end' => '17:30'],
            'hero' => $hero, 'history' => $history, 'histTotal' => $all->count(), 'hist' => ['hadir' => $all->where('status', 'hadir')->count(), 'lain' => $all->where('status', '!=', 'hadir')->count()],
            'week' => ['total' => $weekSessions->count(), 'done' => $done, 'plan' => $weekSessions->count() - $done],
            'att' => ['pct' => $pct, 'label' => $pct >= 85 ? 'Sangat Baik' : 'Perlu Ditingkatkan', 'hadir' => $all->where('status', 'hadir')->count(), 'total' => $all->count()],
            'pay' => $pay, 'quota' => $this->quota($child), 'tutor2' => $tutor2,
        ]);
    }

    public function jadwal(Request $r)
    {
        $d = $this->base($r);
        $child = $d['child'];
        $weekStart = now()->startOfWeek()->addWeeks((int) $r->input('pekan', 0));
        $focus = $r->filled('tgl') ? Carbon::parse($r->tgl) : (($r->input('pekan', 0) == 0) ? today() : $weekStart->copy());
        $sessions = LessonSession::with('tutor')->where('student_id', $child->id)->where('status', '!=', 'batal')->whereBetween('date', [$weekStart->toDateString(), $weekStart->copy()->endOfWeek()->toDateString()])->orderBy('start_time')->get();
        $daySessions = $sessions->filter(fn ($s) => $s->date->isSameDay($focus))->values();
        $pending = LessonSession::with('tutor')->where('student_id', $child->id)->whereDate('date', '>=', today())->where('status', '!=', 'batal')->where('parent_confirmed', false)->orderBy('date')->orderBy('start_time')->first();
        if ($pending && ! $daySessions->contains('id', $pending->id) && ! $r->filled('tgl') && $r->input('pekan', 0) == 0) {
            $focus = $pending->date->copy();
            $daySessions = $sessions->filter(fn ($s) => $s->date->isSameDay($focus))->values();
        }
        $weekJson = collect(range(0, 6))->map(function ($i) use ($weekStart, $sessions) {
            $dt = $weekStart->copy()->addDays($i);
            return ['day' => $dt->day, 'date' => $dt->toDateString(), 'count' => $sessions->filter(fn ($s) => $s->date->isSameDay($dt))->count()];
        });
        $dates = collect(range(0, 5))->map(fn ($i) => ['v' => today()->addDays($i)->toDateString(), 't' => Fmt::dateShort(today()->addDays($i)) . ($i === 0 ? ' (Hari Ini)' : '')])->values();

        return view('siswa.jadwal', $d + [
            'weekStart' => $weekStart, 'pending' => $pending, 'pendingCount' => LessonSession::where('student_id', $child->id)->whereDate('date', '>=', today())->where('status', '!=', 'batal')->where('parent_confirmed', false)->count(),
            'focus' => $focus, 'daySessions' => $daySessions, 'others' => $sessions->filter(fn ($s) => ! $s->date->isSameDay($focus) && $s->date->gte(today()))->values(),
            'quota' => $this->quota($child), 'weekJson' => $weekJson,
            'pendingJson' => $pending ? ['id' => $pending->id, 'minutes' => Fmt::minutes($pending->start_time, $pending->end_time), 'dates' => $dates] : null,
        ]);
    }

    public function presensi(Request $r)
    {
        $d = $this->base($r);
        $child = $d['child'];
        $live = LessonSession::with('tutor')->where('student_id', $child->id)->where('status', '!=', 'batal')->whereDate('date', '<=', today())->whereDoesntHave('attendance', fn ($q) => $q->where('status', '!=', 'belum'))
            ->orderByDesc('date')->orderByDesc('start_time')->first()
            ?: LessonSession::with('tutor')->where('student_id', $child->id)->where('status', '!=', 'batal')->whereDate('date', '>=', today())->orderBy('date')->orderBy('start_time')->first();
        $history = $this->history($child, 4);
        foreach ($history as $a) {
            $a->label = match ($a->status) { 'hadir' => 'Hadir', 'izin' => 'Izin', 'sakit' => 'Izin (Sakit)', default => ucfirst($a->status) };
        }
        $all = Attendance::whereHas('session', fn ($q) => $q->where('student_id', $child->id))->where('status', '!=', 'belum')->get();
        $den = max(1, $all->count());
        $nextS = LessonSession::with('tutor')->where('student_id', $child->id)->where('status', '!=', 'batal')->whereDate('date', '>=', today())->orderBy('date')->orderBy('start_time')->get()->first(fn ($s) => $s->liveStatus() === 'belum');

        return view('siswa.presensi', $d + [
            'live' => $live, 'liveJson' => $live ? ['id' => $live->id] : null, 'history' => $history, 'nextS' => $nextS,
            'stat' => ['pct' => (int) round($all->where('status', 'hadir')->count() / $den * 100), 'hadir' => $all->where('status', 'hadir')->count(), 'sakit' => $all->where('status', 'sakit')->count(), 'izin' => $all->where('status', 'izin')->count(), 'total' => $all->count()],
        ]);
    }

    public function tagihan(Request $r)
    {
        $d = $this->base($r);
        $children = $d['children'];
        $ids = $children->pluck('id');
        $rows = Payment::with('student')->whereIn('student_id', $ids)->orderByDesc('id')->get();
        foreach ($rows as $pc) {
            $pc->used = $pc->student->sessions()->where('status', '!=', 'batal')->whereYear('date', now()->year)->whereMonth('date', now()->month)->get()->filter(fn ($s) => $s->liveStatus() === 'selesai')->count();
        }
        $paid = $rows->where('status', 'lunas')->first();
        $unpaid = $rows->where('status', 'belum')->first();
        $cards = collect([$paid, $unpaid])->filter()->values();
        $q = $this->quota($d['child']);
        $k = [
            'active' => $cards->sum('amount'), 'periods' => 'Periode ' . $cards->pluck('period')->unique()->implode(' & '),
            'paid' => $paid->amount ?? 0, 'paidNote' => $paid ? '1 Paket (' . $paid->student->name . ' - ' . $paid->period . ')' : 'Belum ada',
            'unpaid' => $unpaid->amount ?? 0, 'unpaidNote' => $unpaid ? '1 Paket (' . $unpaid->student->name . ' - Jatuh Tempo ' . ($unpaid->due_date ? Fmt::dateShort($unpaid->due_date) : '-') . ')' : 'Semua lunas',
            'quotaLeft' => $q['total'] - $q['used'], 'quotaTotal' => $q['total'],
        ];

        return view('siswa.tagihan', $d + compact('rows', 'cards', 'k'));
    }

    private function own(LessonSession $session)
    {
        abort_unless($this->children()->contains('id', $session->student_id), 403);
    }

    public function konfirmasi(LessonSession $session)
    {
        $this->own($session);
        $session->update(['parent_confirmed' => true]);

        return response()->json(['message' => 'Jadwal sesi dikonfirmasi. Notifikasi dikirim ke tutor.']);
    }

    public function reschedule(Request $r, LessonSession $session)
    {
        $this->own($session);
        $d = $r->validate(['date' => 'required|date', 'start_time' => 'required', 'end_time' => 'required', 'reason' => 'nullable|string', 'note' => 'nullable|string']);
        if (Fmt::minutes($d['start_time'], $d['end_time']) <= 0) {
            return response()->json(['message' => 'Jam selesai harus setelah jam mulai.'], 422);
        }
        if ($session->tutor_id && LessonSession::conflicts($session->tutor_id, $session->student_id, $d['date'], $d['start_time'], $d['end_time'], $session->id)->isNotEmpty()) {
            return response()->json(['message' => 'Tutor tidak tersedia pada waktu itu. Coba slot lain.'], 422);
        }
        $session->update(['date' => $d['date'], 'start_time' => $d['start_time'], 'end_time' => $d['end_time'], 'reschedule_reason' => trim(($d['reason'] ?? '') . ' ' . ($d['note'] ?? '')),
            'parent_confirmed' => true, 'tutor_confirmed' => false]);

        return response()->json(['message' => 'Pengajuan reschedule dikirim ke tutor & admin cabang.']);
    }

    public function presensiStore(Request $r, LessonSession $session)
    {
        $this->own($session);
        $d = $r->validate(['status' => 'required|in:hadir,izin,sakit', 'understanding' => 'nullable|integer|min:1|max:5', 'note' => 'nullable|string|max:300']);
        $session->update(['status' => 'selesai']);
        Attendance::updateOrCreate(['lesson_session_id' => $session->id], [
            'status' => $d['status'], 'understanding' => $d['understanding'] ?? null, 'note' => $d['note'] ?? null,
            'journal' => $d['note'] ?? null, 'submitted_by' => auth()->user()->name . ' (Wali Murid)', 'submitted_at' => now(),
        ]);

        return response()->json(['message' => 'Presensi berhasil disimpan & diverifikasi.']);
    }

    public function kuitansi(Payment $payment)
    {
        abort_unless($this->children()->contains('id', $payment->student_id), 403);

        return view('admin.kuitansi', ['p' => $payment->load('student')]);
    }
}
