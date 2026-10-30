<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LessonSession;
use App\Models\Tutor;
use App\Models\User;
use App\Support\Fmt;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    private function decorate(Tutor $t): Tutor
    {
        $load = $t->weeklyLoad();
        $max = max(1, $t->max_sessions);
        $pct = (int) round($load / $max * 100);
        $t->students_count = $t->students()->where('status', 'aktif')->count();
        $t->load = $load;
        $t->load_pct = $pct;
        $t->availability = $pct >= 100 ? 'penuh' : ($max - $load < 3 ? 'terbatas' : 'tersedia');
        $t->badge = match ($t->availability) { 'penuh' => 'Jadwal Penuh', 'terbatas' => 'Sisa ' . ($max - $load) . ' Slot', default => 'Tersedia' };

        return $t;
    }

    public function index()
    {
        $tutors = Tutor::where('status', 'aktif')->orderBy('id')->get()->map(fn ($t) => $this->decorate($t));

        return view('admin.tutor', compact('tutors'));
    }

    public function show(Tutor $tutor)
    {
        $this->decorate($tutor);
        $agenda = LessonSession::with('student')->where('tutor_id', $tutor->id)->whereDate('date', '>=', today())->where('status', '!=', 'batal')
            ->orderBy('date')->orderBy('start_time')->limit(3)->get()->map(fn ($s) => [
                'when' => Fmt::dayName($s->date) . ', ' . Fmt::range($s->start_time, $s->end_time),
                'who' => $s->student->name . ' • ' . $s->subject,
                'method' => Fmt::method($s->method) . ($s->location && $s->method === 'home_visit' ? ' (' . $s->location . ')' : ''),
            ])->values();
        $students = $tutor->students()->where('status', 'aktif')->get()->map(fn ($s) => [
            'initials' => Fmt::initials($s->name), 'name' => $s->name, 'info' => $s->grade . ' • ' . $s->program, 'freq' => max(1, $s->slots()->count()) . 'x / pekan',
        ])->values();
        $phoneFmt = '+62 ' . substr(preg_replace('/^0/', '', (string) $tutor->phone), 0, 3) . '-' . substr(preg_replace('/^0/', '', (string) $tutor->phone), 3, 4) . '-' . substr(preg_replace('/^0/', '', (string) $tutor->phone), 7);

        return response()->json([
            'id' => $tutor->id, 'name' => $tutor->name, 'initials' => Fmt::initials($tutor->name), 'code' => $tutor->code, 'headline' => $tutor->headline,
            'rating' => number_format((float) $tutor->rating, 1), 'reviews' => $tutor->reviews, 'availability' => $tutor->availability,
            'wa' => Fmt::waLink($tutor->phone), 'phone' => $tutor->phone, 'phone_fmt' => $phoneFmt, 'email' => $tutor->email,
            'subjects' => $tutor->subject_list, 'area' => $tutor->area, 'load' => $tutor->load, 'max_sessions' => $tutor->max_sessions,
            'agenda' => $agenda, 'students' => $students,
        ]);
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'name' => 'required|string|max:255', 'code' => 'nullable|string|max:60|unique:tutors,code', 'phone' => 'required|string|max:30',
            'email' => 'required|email|unique:users,email', 'subjects' => 'nullable|string', 'methods' => 'nullable|string', 'area' => 'nullable|string', 'max_sessions' => 'nullable|integer|min:1|max:60',
        ], ['email.unique' => 'Email sudah dipakai akun lain.', 'name.required' => 'Nama tutor wajib diisi.', 'code.unique' => 'ID tutor sudah dipakai.']);

        $user = User::create([
            'code' => 'TTR-EDU-' . random_int(1000, 9999), 'name' => $data['name'], 'email' => $data['email'], 'phone' => $data['phone'],
            'username' => 'tutor.' . strtolower(preg_replace('/\W+/', '', explode(' ', trim(preg_replace('/^(Kak|Sir|Ust\.?|Ustadz|Bpk\.?)\s+/i', '', $data['name'])))[0])) . random_int(10, 99),
            'role' => 'tutor', 'role_label' => 'Tutor Pengajar', 'password' => 'password123',
        ]);
        Tutor::create([
            'user_id' => $user->id, 'code' => $data['code'] ?: 'OP-TUT-' . now()->year . '-' . str_pad((string) (Tutor::count() + 1), 3, '0', STR_PAD_LEFT),
            'name' => $data['name'], 'headline' => collect(explode(',', (string) ($data['subjects'] ?? '')))->first() ?: 'Tutor Pengajar', 'phone' => $data['phone'], 'email' => $data['email'],
            'subjects' => $data['subjects'] ?? '', 'area' => $data['area'] ?? '', 'methods' => $data['methods'] ?? 'home_visit', 'max_sessions' => $data['max_sessions'] ?? 20,
        ]);

        return response()->json(['message' => 'Tutor baru tersimpan. Login: ' . $user->email . ' / password123']);
    }

    public function update(Request $r, Tutor $tutor)
    {
        $data = $r->validate([
            'name' => 'required|string|max:255', 'headline' => 'nullable|string|max:255', 'phone' => 'nullable|string|max:30', 'email' => 'nullable|email',
            'subjects' => 'nullable|string', 'area' => 'nullable|string', 'max_sessions' => 'required|integer|min:1|max:60',
        ]);
        $data['subjects'] = collect(explode(',', (string) ($data['subjects'] ?? '')))->map(fn ($x) => trim($x))->filter()->implode(',');
        $tutor->update($data);
        if ($tutor->user) {
            $tutor->user->update(['name' => $data['name'], 'phone' => $data['phone'] ?? $tutor->user->phone]);
        }

        return response()->json(['message' => 'Data tutor diperbarui.']);
    }

    public function destroy(Tutor $tutor)
    {
        $tutor->students()->update(['tutor_id' => null]);
        if ($tutor->user) {
            $tutor->user->update(['status' => 'nonaktif']);
        }
        $tutor->update(['status' => 'nonaktif']);

        return response()->json(['message' => 'Tutor dinonaktifkan.']);
    }
}
