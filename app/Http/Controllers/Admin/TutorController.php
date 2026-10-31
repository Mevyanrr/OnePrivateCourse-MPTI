<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LessonSession;
use App\Models\Tutor;
use App\Support\Fmt;
use App\Support\Identity;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

/**
 * Kelola data tutor (khusus admin).
 * Tutor adalah DATA pengajar, bukan akun login: yang bisa masuk hanya admin dan wali.
 */
class TutorController extends Controller
{
    private const METHODS = ['home_visit', 'online', 'studio'];

    /** Tambahkan angka beban mengajar & status ketersediaan ke model tutor. */
    private function decorate(Tutor $t): Tutor
    {
        $load = $t->weeklyLoad();
        $max  = max(1, (int) $t->max_sessions);
        $pct  = (int) round($load / $max * 100);
        $left = $max - $load;

        $t->students_count = $t->students()->where('status', 'aktif')->count();
        $t->load           = $load;
        $t->load_pct       = $pct;
        $t->availability   = $left <= 0 ? 'penuh' : ($left < 3 ? 'terbatas' : 'tersedia');
        $t->badge          = match ($t->availability) {
            'penuh'    => 'Jadwal Penuh',
            'terbatas' => 'Sisa ' . $left . ' Slot',
            default    => 'Tersedia',
        };
        $t->method_list = array_values(array_filter(explode(',', (string) $t->methods)));

        return $t;
    }

    public function index()
    {
        $all = Tutor::orderBy('name')->get();
        $active = $all->where('status', 'aktif')->values()->map(fn ($t) => $this->decorate($t));

        $stats = [
            'total'    => $all->count(),
            'active'   => $active->count(),
            'ready'    => $active->where('availability', 'tersedia')->count(),
            'avg_load' => $active->count() ? (int) round($active->avg(fn ($t) => min(100, $t->load_pct))) : 0,
            'students' => $active->sum('students_count'),
            'sessions' => $active->sum('load'),
        ];

        return view('admin.tutor', ['tutors' => $active, 'stats' => $stats]);
    }

    public function show(Tutor $tutor)
    {
        $this->decorate($tutor);

        $agenda = LessonSession::with('student')
            ->where('tutor_id', $tutor->id)
            ->whereDate('date', '>=', today())
            ->where('status', '!=', 'batal')
            ->orderBy('date')->orderBy('start_time')
            ->limit(4)->get()
            ->map(fn ($s) => [
                'when'   => Fmt::dayName($s->date) . ', ' . Fmt::dateShort($s->date) . ' • ' . Fmt::range($s->start_time, $s->end_time),
                'who'    => ($s->student->name ?? '-') . ' • ' . ($s->subject ?: '-'),
                'method' => Fmt::method($s->method) . ($s->location && $s->method === 'home_visit' ? ' (' . $s->location . ')' : ''),
            ])->values();

        $students = $tutor->students()->where('status', 'aktif')->get()
            ->map(fn ($s) => [
                'initials' => Fmt::initials($s->name),
                'name'     => $s->name,
                'info'     => trim($s->grade . ' • ' . $s->program, ' •'),
                'freq'     => max(1, $s->slots()->count()) . 'x / pekan',
            ])->values();

        return response()->json([
            'id'           => $tutor->id,
            'name'         => $tutor->name,
            'initials'     => Fmt::initials($tutor->name),
            'code'         => $tutor->code,
            'headline'     => $tutor->headline,
            'education'    => $tutor->education,
            'rating'       => number_format((float) $tutor->rating, 1),
            'reviews'      => $tutor->reviews,
            'availability' => $tutor->availability,
            'badge'        => $tutor->badge,
            'wa'           => Fmt::waLink($tutor->phone),
            'phone'        => $tutor->phone,
            'phone_fmt'    => $this->phoneFmt($tutor->phone),
            'email'        => $tutor->email,
            'subjects'     => $tutor->subject_list,
            'methods'      => $tutor->method_list,
            'method_labels' => array_map(fn ($m) => Fmt::method($m), $tutor->method_list),
            'area'         => $tutor->area,
            'load'         => $tutor->load,
            'load_pct'     => $tutor->load_pct,
            'max_sessions' => $tutor->max_sessions,
            'students_count' => $tutor->students_count,
            'agenda'       => $agenda,
            'students'     => $students,
        ]);
    }

    public function store(Request $r)
    {
        $data = $this->validated($r);

        $tutor = Tutor::create($data + [
            'user_id' => null, // tutor tidak punya akun login
            'code'    => $data['code'] ?: $this->newCode(),
            'status'  => 'aktif',
        ]);

        return response()->json(['message' => 'Tutor ' . $tutor->name . ' berhasil disimpan.']);
    }

    public function update(Request $r, Tutor $tutor)
    {
        $data = $this->validated($r, $tutor);
        if (! $data['code']) {
            unset($data['code']); // kosong = pertahankan ID lama
        }
        $tutor->update($data);

        return response()->json(['message' => 'Data tutor diperbarui.']);
    }

    public function destroy(Tutor $tutor)
    {
        $released = $tutor->students()->count();
        $tutor->students()->update(['tutor_id' => null]);
        $tutor->update(['status' => 'nonaktif']);

        // Sisa akun lama (data seed versi sebelumnya): hanya nonaktifkan bila memang akun tutor.
        if ($tutor->user && $tutor->user->role === 'tutor') {
            $tutor->user->update(['status' => 'nonaktif']);
        }

        return response()->json([
            'message' => 'Tutor dinonaktifkan.' . ($released ? " {$released} siswa perlu dialokasikan ke tutor lain." : ''),
        ]);
    }

    /* ---------------------------------------------------------------- */

    private function validated(Request $r, ?Tutor $tutor = null): array
    {
        $data = $r->validate([
            'name'         => ['required', 'string', 'min:3', 'max:255'],
            'code'         => ['nullable', 'string', 'max:60', Rule::unique('tutors', 'code')->ignore($tutor?->id)],
            'phone'        => ['required', 'string', 'max:30'],
            'email'        => ['required', 'email', 'max:255', Rule::unique('tutors', 'email')->ignore($tutor?->id)],
            'headline'     => ['nullable', 'string', 'max:255'],
            'education'    => ['nullable', 'string', 'max:255'],
            'subjects'     => ['nullable', 'string', 'max:1000'],
            'methods'      => ['nullable', 'string', 'max:100'],
            'area'         => ['nullable', 'string', 'max:255'],
            'max_sessions' => ['nullable', 'integer', 'min:1', 'max:60'],
        ], [
            'name.required'  => 'Nama tutor wajib diisi.',
            'name.min'       => 'Nama tutor minimal 3 karakter.',
            'code.unique'    => 'ID tutor sudah dipakai tutor lain.',
            'phone.required' => 'Nomor WhatsApp wajib diisi.',
            'email.required' => 'Email tutor wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'email.unique'   => 'Email sudah dipakai tutor lain.',
            'max_sessions.min' => 'Batas sesi minimal 1 per minggu.',
            'max_sessions.max' => 'Batas sesi maksimal 60 per minggu.',
        ]);

        $phone = Identity::phoneFromInput($data['phone']);
        if (! $phone) {
            throw ValidationException::withMessages(['phone' => 'Nomor WhatsApp tidak valid, contoh 0812-3456-7890.']);
        }

        $methods = collect(explode(',', (string) ($data['methods'] ?? '')))
            ->map(fn ($m) => trim($m))->filter(fn ($m) => in_array($m, self::METHODS, true))->unique()->values();
        $subjects = collect(explode(',', (string) ($data['subjects'] ?? '')))
            ->map(fn ($x) => trim($x))->filter()->unique()->values();

        return [
            'name'         => trim(preg_replace('/\s+/', ' ', $data['name'])),
            'code'         => trim((string) ($data['code'] ?? '')),
            'phone'        => $phone,
            'email'        => mb_strtolower(trim($data['email'])),
            'headline'     => trim((string) ($data['headline'] ?? '')) ?: ($subjects->first() ?: 'Tutor Pengajar'),
            'education'    => trim((string) ($data['education'] ?? '')) ?: null,
            'subjects'     => $subjects->implode(','),
            'methods'      => $methods->isEmpty() ? 'home_visit' : $methods->implode(','),
            'area'         => trim((string) ($data['area'] ?? '')) ?: null,
            'max_sessions' => (int) ($data['max_sessions'] ?? 20),
        ];
    }

    private function newCode(): string
    {
        $n = Tutor::count() + 1;
        do {
            $code = 'OP-TUT-' . now()->year . '-' . str_pad((string) $n++, 3, '0', STR_PAD_LEFT);
        } while (Tutor::where('code', $code)->exists());

        return $code;
    }

    /** 081388997721 -> +62 813-8899-7721 */
    private function phoneFmt(?string $phone): string
    {
        $d = preg_replace('/\D+/', '', (string) $phone);
        $d = preg_replace('/^(62|0)/', '', $d);
        if ($d === '') {
            return '-';
        }

        return '+62 ' . trim(substr($d, 0, 3) . '-' . substr($d, 3, 4) . '-' . substr($d, 7), '-');
    }
}