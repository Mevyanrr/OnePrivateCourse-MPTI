<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LessonSession;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Tutor;
use App\Services\SessionGenerator;
use App\Support\Fmt;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $r)
    {
        $q = Student::with('tutor')->orderBy('id');
        if ($r->filled('q')) {
            $q->whereRaw('LOWER(name) LIKE ?', ['%' . mb_strtolower($r->q) . '%']);
        }
        if (in_array($r->status, ['aktif', 'nonaktif'], true)) {
            $q->where('status', $r->status);
        }
        $students = $q->paginate(10)->withQueryString();
        $kpi = ['total' => Student::count(), 'aktif' => Student::where('status', 'aktif')->count(), 'nonaktif' => Student::where('status', '!=', 'aktif')->count()];

        return view('admin.siswa.index', compact('students', 'kpi'));
    }

    public function create()
    {
        return view('admin.siswa.baru', ['tutors' => Tutor::where('status', 'aktif')->orderBy('id')->get()]);
    }

    private function rules(): array
    {
        return [
            'name' => 'required|string|max:255', 'grade' => 'required|string|max:100', 'school' => 'nullable|string|max:255',
            'gender' => 'nullable|string', 'birth_date' => 'nullable|date', 'guardian_name' => 'required|string|max:255',
            'guardian_phone' => 'nullable|string|max:30', 'method' => 'required|in:home_visit,online,studio',
            'address' => 'nullable|string', 'program' => 'required|string|max:255', 'tutor_id' => 'required|exists:tutors,id',
            'billing_scheme' => 'required|in:monthly,per_session', 'goals' => 'nullable|string',
            'slots' => 'required|array|min:1', 'slots.*.day' => 'required|string', 'slots.*.start' => 'required', 'slots.*.end' => 'required',
        ];
    }

    private const MESSAGES = [
        'name.required' => 'Nama siswa wajib diisi.', 'guardian_name.required' => 'Nama orang tua / wali wajib diisi.',
        'program.required' => 'Program les wajib dipilih.', 'slots.required' => 'Minimal 1 jadwal rutin per pekan.',
        'tutor_id.required' => 'Pilih tutor pendamping.',
    ];

    private function nextCode(): string
    {
        $n = (int) Student::max('id') + 1;
        do {
            $code = 'SIS-' . now()->year . '-' . str_pad((string) (800 + $n), 4, '0', STR_PAD_LEFT);
            $n++;
        } while (Student::where('code', $code)->exists());
        return $code;
    }

    private function syncSlots(Student $s, array $slots): void
    {
        $s->slots()->delete();
        foreach ($slots as $sl) {
            $s->slots()->create(['tutor_id' => $s->tutor_id, 'day' => $sl['day'], 'start_time' => $sl['start'], 'end_time' => $sl['end']]);
        }
    }

    public function store(Request $r)
    {
        $data = $r->validate($this->rules(), self::MESSAGES);
        if ($data['method'] === 'home_visit' && blank($data['address'] ?? null)) {
            return response()->json(['message' => 'Alamat lokasi les wajib diisi untuk Home Visit.', 'errors' => ['address' => ['Alamat lokasi les wajib diisi untuk Home Visit.']]], 422);
        }
        $price = $data['billing_scheme'] === 'monthly' ? 1450000 : 195000;
        $s = Student::create([
            'code' => $this->nextCode(), 'name' => $data['name'], 'grade' => $data['grade'], 'school' => $data['school'] ?? null,
            'gender' => $data['gender'] ?? null, 'birth_date' => $data['birth_date'] ?? null, 'guardian_relation' => 'Orang Tua',
            'guardian_name' => $data['guardian_name'], 'guardian_phone' => $data['guardian_phone'] ?? null, 'method' => $data['method'],
            'address' => $data['method'] === 'online' ? 'Online (Zoom)' : ($data['address'] ?? null),
            'area' => $data['method'] === 'online' ? 'Online' : $this->areaFrom($data['address'] ?? ''), 'program' => $data['program'],
            'tutor_id' => $data['tutor_id'], 'duration' => 90, 'package' => 'Paket Reguler Bulanan (8 Sesi / Bulan)',
            'billing_scheme' => $data['billing_scheme'], 'price' => $price, 'goals' => $data['goals'] ?? null, 'status' => 'aktif', 'joined_at' => today(),
        ]);
        $this->syncSlots($s, $data['slots']);
        [$made, $skipped] = app(SessionGenerator::class)->generate($s);

        Payment::create([
            'student_id' => $s->id, 'invoice_no' => 'INV-' . now()->format('Ym') . '-' . str_pad((string) $s->id, 3, '0', STR_PAD_LEFT), 'period' => Fmt::period(),
            'amount' => $price, 'status' => 'belum', 'due_date' => today()->addDays(7),
        ]);

        $days = collect($data['slots'])->pluck('day')->unique()->implode(' & ');
        $first = $data['slots'][0];
        $msg = 'Data siswa tersimpan. ' . $made . ' sesi dijadwalkan' . ($skipped ? ', ' . $skipped . ' dilewati karena bentrok.' : '.');

        return response()->json([
            'message' => $msg,
            'student' => [
                'id' => $s->id, 'name' => $s->name, 'grade' => $s->grade, 'school' => $s->school ?: '-', 'program' => $s->program,
                'tutor' => $s->tutor->name ?? '-', 'method' => Fmt::method($s->method) . ($s->area ? ' (' . $s->area . ')' : ''),
                'schedule' => $days . ' (' . $first['start'] . '–' . $first['end'] . ')',
                'billing' => $s->billing_scheme === 'monthly' ? 'Bulanan Otomatis (' . Fmt::rupiah($price) . ' / 8 Sesi)' : 'Per Pertemuan (' . Fmt::rupiah($price) . ' / sesi)',
                'url' => route('admin.siswa.show', $s),
            ],
        ]);
    }

    private function areaFrom(string $address): string
    {
        if (preg_match('/(Tebet|Pancoran|Manggarai|Kebayoran|Cilandak|Mampang|Kalibata|Depok|Kemang|Bintaro)/i', $address, $m)) {
            return ucfirst(strtolower($m[1]));
        }
        return 'Jakarta Selatan';
    }

    public function show(Student $student)
    {
        $student->load(['tutor', 'slots', 'sessions.attendance']);
        $monthSessions = $student->sessions->filter(fn ($s) => $s->status !== 'batal' && $s->date->isSameMonth(now()));
        $att = $student->sessions->map->attendance->filter();
        $counted = $att->whereIn('status', ['hadir', 'izin', 'sakit']);
        $attPct = $counted->count() ? (int) round($counted->where('status', 'hadir')->count() / $counted->count() * 100) : 100;
        $done = $monthSessions->filter(fn ($s) => $s->liveStatus() === 'selesai')->count();
        $total = max($monthSessions->count(), 0);
        $slots = $student->slots;
        $days = $slots->pluck('day')->unique()->implode(' & ') ?: '-';
        $time = $slots->first() ? Fmt::range($slots->first()->start_time, $slots->first()->end_time) : '-';
        $last = $att->filter(fn ($a) => $a->session && $a->session->date->lte(today()))->sortByDesc(fn ($a) => $a->session->date->timestamp)->first();

        $st = [
            'attTotal' => $att->count(), 'monthTotal' => $total, 'done' => $done, 'progress' => $total ? (int) round($done / $total * 100) : 0,
            'attPct' => $attPct, 'avgUnd' => round((float) ($att->whereNotNull('understanding')->avg('understanding') ?: 0), 1),
            'days' => $days, 'time' => $time,
            'pay' => $student->payments()->where('period', Fmt::period())->first() ?: $student->payments()->latest('id')->first(),
            'last' => $last,
        ];

        return view('admin.siswa.detail', compact('student', 'st'));
    }

    public function edit(Student $student)
    {
        $student->load(['tutor', 'slots']);
        $payload = [
            'name' => $student->name, 'school' => $student->school, 'grade' => $student->grade, 'gender' => $student->gender,
            'birth_date' => optional($student->birth_date)->toDateString(), 'phone' => $student->phone, 'guardian_relation' => $student->guardian_relation,
            'guardian_name' => $student->guardian_name, 'guardian_phone' => $student->guardian_phone, 'method' => $student->method,
            'address' => $student->address, 'area' => $student->area, 'address_note' => $student->address_note, 'program' => $student->program,
            'goal' => $student->goals ? mb_substr($student->goals, 0, 90) : '', 'goals' => $student->goals, 'tutor_id' => $student->tutor_id,
            'billing_scheme' => $student->billing_scheme,
        ];
        $tutorList = Tutor::where('status', 'aktif')->orderBy('id')->get()->map(fn ($t) => [
            'id' => $t->id, 'name' => $t->name, 'headline' => $t->headline, 'rating' => $t->rating, 'area' => $t->area, 'initials' => Fmt::initials($t->name),
        ])->values();

        return view('admin.siswa.ubah', compact('student', 'payload', 'tutorList'));
    }

    public function update(Request $r, Student $student)
    {
        $rules = $this->rules();
        $rules['status'] = 'nullable|in:aktif,nonaktif';
        $rules['name'] = 'required|string|max:255';
        $data = $r->validate($rules, self::MESSAGES);
        $student->update([
            'name' => $data['name'], 'grade' => $data['grade'], 'school' => $data['school'] ?? null, 'gender' => $data['gender'] ?? null,
            'birth_date' => $data['birth_date'] ?? null, 'phone' => $r->input('phone'), 'guardian_relation' => $r->input('guardian_relation'),
            'guardian_name' => $data['guardian_name'], 'guardian_phone' => $data['guardian_phone'] ?? null, 'method' => $data['method'],
            'address' => $data['address'] ?? null, 'area' => $r->input('area'), 'address_note' => $r->input('address_note'), 'program' => $data['program'],
            'tutor_id' => $data['tutor_id'], 'billing_scheme' => $data['billing_scheme'], 'goals' => $data['goals'] ?? ($r->input('goal')),
            'price' => $data['billing_scheme'] === 'monthly' ? 1450000 : 195000, 'status' => $r->input('status', $student->status),
        ]);
        $this->syncSlots($student, $data['slots']);

        // jadwal mendatang disusun ulang (yang belum punya presensi)
        LessonSession::where('student_id', $student->id)->whereDate('date', '>', today())->where('status', 'terjadwal')->whereDoesntHave('attendance')->delete();
        [$made, $skipped] = app(SessionGenerator::class)->generate($student);

        return response()->json(['message' => 'Data siswa diperbarui. ' . $made . ' sesi dijadwalkan ulang' . ($skipped ? ' (' . $skipped . ' bentrok dilewati).' : '.')]);
    }

    public function destroy(Student $student)
    {
        $name = $student->name;
        $student->delete();

        return response()->json(['message' => "Siswa {$name} dihapus."]);
    }
}
