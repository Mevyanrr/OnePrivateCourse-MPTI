<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\LessonSession;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Tutor;
use App\Models\User;
use App\Support\Fmt;
use App\Support\PortalContext;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PortalController extends Controller
{
    private function children()
    {
        return PortalContext::children();
    }

    private function base(Request $r): array
    {
        $children = $this->children();

        if ($children->isEmpty()) {
            throw new HttpResponseException(
                response()->view('siswa.kosong', ['user' => auth()->user()])
            );
        }

        if ($r->filled('anak') && $children->contains('id', (int) $r->anak)) {
            session(['child_id' => (int) $r->anak]);
        }

        $child = $children->firstWhere('id', session('child_id')) ?: $children->first();

        return [
            'children' => $children,
            'child' => $child,
            'childrenJson' => $children->map(fn ($c) => [
                'id' => $c->id,
                'name' => $c->name,
            ])->values(),
            'notifText' => 'Tidak ada pemberitahuan baru.',
        ];
    }

    private function packageTotal(Student $child): int
    {
        if (preg_match('/(\d+)\s*(sesi|pertemuan)/i', (string) $child->package, $m) && (int) $m[1] > 0) {
            return (int) $m[1];
        }

        return 8;
    }

    private function quota(Student $child): array
    {
        $used = $child->sessions()
            ->where('status', '!=', 'batal')
            ->whereYear('date', now()->year)
            ->whereMonth('date', now()->month)
            ->get()
            ->filter(fn ($s) => $s->liveStatus() === 'selesai')
            ->count();

        $total = $this->packageTotal($child);

        return [
            'used' => $used,
            'total' => $total,
            'pct' => min(100, round($used / max(1, $total) * 100, 1)),
        ];
    }

    private function history(Student $child, int $limit)
    {
        return Attendance::with('session.tutor')
            ->whereHas('session', fn ($q) => $q->where('student_id', $child->id))
            ->where('status', '!=', 'belum')
            ->get()
            ->sortByDesc(fn ($a) => $a->session->date->timestamp)
            ->take($limit)
            ->values();
    }

    private function subjectStyle(?string $text): array
    {
        $t = mb_strtolower((string) $text);

        return match (true) {
            (bool) preg_match('/tahsin|mengaji|qur|tajwid|agama|pai\b/', $t) => ['book-open', 'tl'],
            (bool) preg_match('/matemat|hitung|aljabar/', $t) => ['calc', 'violet'],
            (bool) preg_match('/inggris|english|bahasa|arab/', $t) => ['languages', 'amber'],
            (bool) preg_match('/fisika|kimia|biologi|ipa\b|sains/', $t) => ['flask', 'violet'],
            default => ['book-open', 'tl'],
        };
    }

    private function historyItems(Collection $attendances): Collection
    {
        return $attendances->map(function (Attendance $a) {
            $s = $a->session;
            $hadir = $a->status === 'hadir';

            [$ikon, $tone] = $this->subjectStyle(
                ($s->subject ?? '') . ' ' . ($s->topic ?? '')
            );

            $label = match ($a->status) {
                'hadir' => 'Hadir Tuntas',
                'izin' => 'Izin (Terkonfirmasi)',
                'sakit' => 'Izin Sakit (Terkonfirmasi)',
                'alpa' => 'Tidak Hadir',
                default => ucfirst((string) $a->status),
            };

            $u = (int) $a->understanding;

            $extra = $hadir
                ? ($u >= 5
                    ? 'Pemahaman Sangat Baik'
                    : ($u === 4
                        ? 'Pemahaman Baik'
                        : ($u > 0 ? 'Pemahaman ' . $u . '/5' : 'Sesi Selesai')))
                : 'Jadwal pengganti diatur cabang';

            $note = trim((string) ($a->note ?: $a->journal));

            $catatan = $note !== ''
                ? ($hadir
                    ? 'Catatan Tutor: “' . Str::limit($note, 70) . '”'
                    : 'Status: ' . Str::limit($note, 70))
                : ($hadir
                    ? 'Belum ada catatan tertulis dari tutor.'
                    : 'Status: menunggu jadwal pengganti.');

            return [
                'ikon' => $ikon,
                'tone' => $tone,
                'judul' => $s->topic ?: ($s->subject ?: 'Sesi Les Privat'),
                'status' => $hadir ? 'ok' : 'warn',
                'statusLabel' => $label,
                'metode' => $hadir ? Fmt::method($s->method) : null,
                'tutor' => $s->tutor->name ?? 'Belum ditugaskan',
                'tgl' => Fmt::dateShort($s->date),
                'extra' => ['t' => $extra, 'star' => $hadir && $u >= 4],
                'catatan' => $catatan,
                'aksi' => $hadir ? 'Lihat Jurnal & Nilai' : 'Detail Jadwal',
                'aksiGray' => ! $hadir,
                'aksiRoute' => $hadir ? 'portal.presensi' : 'portal.jadwal',
                'filter' => $hadir ? 'tuntas' : 'evaluasi',
            ];
        })->values();
    }

    private function companionTutors(Student $child): Collection
    {
        $ids = LessonSession::where('student_id', $child->id)
            ->where('status', '!=', 'batal')
            ->whereDate('date', '>=', today()->subDays(60))
            ->pluck('tutor_id');

        if ($child->tutor_id) {
            $ids->prepend($child->tutor_id);
        }

        $ids = $ids->filter()->unique()->values();

        if ($ids->isEmpty()) {
            return collect();
        }

        $tutors = Tutor::whereIn('id', $ids)->get()->keyBy('id');

        return $ids->map(fn ($id) => $tutors->get($id))->filter()->values();
    }

    private function branchInfo(): array
    {
        $admin = User::where('role', 'admin')->orderBy('id')->first();

        $days = config('opc.service_days', [1, 2, 3, 4, 5, 6]);
        [$from, $to] = config('opc.service_hours', ['08:00', '20:00']);

        $open = in_array(now()->dayOfWeekIso, $days, true)
            && now()->format('H:i') >= $from
            && now()->format('H:i') < $to;

        return [
            'nama' => config('opc.branch_name', 'Cabang Tebet & Jakarta Selatan'),
            'cs' => $admin->name ?? 'Admin Cabang',
            'cs_peran' => config('opc.cs_role', 'Customer Care & Penjadwalan'),
            'jam' => config('opc.service_label', 'Senin – Sabtu • 08.00 – 20.00 WIB'),
            'online' => $open,
        ];
    }

    public function beranda(Request $r)
    {
        $d = $this->base($r);
        $child = $d['child'];
        $today = today();

        // Sesi mendatang dan yang belum dikonfirmasi wali.
        $upcoming = LessonSession::with('tutor')
            ->where('student_id', $child->id)
            ->where('status', '!=', 'batal')
            ->whereDate('date', '>=', $today)
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        $unfinished = $upcoming
            ->filter(fn ($s) => $s->liveStatus() !== 'selesai')
            ->values();

        $pending = $unfinished
            ->where('parent_confirmed', false)
            ->values();

        $next = $pending->first();

        $hero = $unfinished->first(
            fn ($s) => $s->liveStatus() === 'berjalan'
        ) ?: $unfinished->first();

        // Banner tindakan diperlukan.
        $perluTindakan = null;

        if ($next) {
            $nt = $next->tutor;

            $perluTindakan = [
                'judul' => $pending->count() . ' Jadwal Sesi Menunggu Konfirmasi Anda',
                'detail' => 'Sesi Les Privat: <b>'
                    . e(Fmt::dateShort($next->date))
                    . ' (' . Fmt::hhmm($next->start_time)
                    . ' – ' . Fmt::hhmm($next->end_time)
                    . ' WIB)</b> • Bersama <b>'
                    . e($nt->name ?? 'tutor')
                    . '</b> ('
                    . e(($next->subject ?: $child->program) . ' – ' . Fmt::method($next->method))
                    . ').',
                'confirm' => route('portal.jadwal.konfirmasi', $next->id),
                'resched' => route('portal.jadwal', [
                    'tgl' => $next->date->toDateString(),
                ]),
                'wa' => PortalContext::wa(
                    $nt->phone ?? null,
                    'Halo ' . ($nt->name ?? 'Kak') . ', saya wali ' . $child->name
                    . '. Mau konfirmasi jadwal les ' . Fmt::dateShort($next->date) . '.'
                ),
            ];
        }

        // Kartu sesi berikutnya.
        $sesi = null;

        if ($hero) {
            $t = $hero->tutor;
            $live = $hero->liveStatus() === 'berjalan';
            $place = $hero->location ?: $child->area;

            $sesi = [
                'label' => $live
                    ? 'SESI SEDANG BERLANGSUNG • HARI INI'
                    : ($hero->date->isToday()
                        ? 'SESI HARI INI • MULAI ' . Fmt::hhmm($hero->start_time)
                        : 'SESI BERIKUTNYA • ' . mb_strtoupper(Fmt::dateShort($hero->date))),

                'live' => $live,

                'kurikulum' => mb_strtoupper(
                    trim(preg_replace('/\s*\([^)]*\)\s*$/', '', (string) $child->program))
                ) ?: 'PROGRAM LES PRIVAT',

                'judul' => $hero->subject ?: ($child->program ?: 'Sesi Les Privat'),
                'fokus' => trim((string) $hero->topic),
                'target' => Str::limit(trim((string) ($hero->notes ?: $child->goals)), 180),
                'waktu' => Fmt::hhmm($hero->start_time) . ' – ' . Fmt::hhmm($hero->end_time) . ' WIB',

                'tutor' => $t ? [
                    'nama' => $t->name,
                    'rating' => number_format((float) $t->rating, 1),
                    'peran' => $t->headline ?: 'Tutor Pengajar',
                    'lokasi' => $hero->method === 'online'
                        ? 'Online Zoom'
                        : Fmt::method($hero->method) . ($place ? ' (' . $place . ')' : ''),
                    'foto' => $t->photo_url ?? null,
                    'wa' => PortalContext::wa(
                        $t->phone,
                        'Halo ' . $t->name . ', saya wali ' . $child->name . '.'
                    ),
                ] : null,
            ];
        }

        // Riwayat dan presensi.
        $att = Attendance::with('session.tutor')
            ->whereHas('session', fn ($q) => $q->where('student_id', $child->id))
            ->where('status', '!=', 'belum')
            ->get()
            ->sortByDesc(
                fn ($a) => $a->session->date->toDateString() . ' ' . $a->session->start_time
            )
            ->values();

        $monthAtt = $att->filter(
            fn ($a) => $a->session->date->isSameMonth($today)
        );

        $mTotal = $monthAtt->count();
        $mHadir = $monthAtt->where('status', 'hadir')->count();

        $pct = $mTotal
            ? (int) round(($mHadir / $mTotal) * 100)
            : 0;

        // Jadwal pekan ini.
        $week = LessonSession::where('student_id', $child->id)
            ->where('status', '!=', 'batal')
            ->whereBetween('date', [
                now()->startOfWeek()->toDateString(),
                now()->endOfWeek()->toDateString(),
            ])
            ->get();

        $weekDone = $week
            ->filter(fn ($s) => $s->liveStatus() === 'selesai')
            ->count();

        // Tagihan periode ini.
        $pay = $child->payments()
            ->where('period', Fmt::period())
            ->latest('id')
            ->first()
            ?: $child->payments()->latest('id')->first();

        $tagihan = $pay ? [
            'lunas' => $pay->status === 'lunas',
            'status' => $pay->status === 'lunas' ? 'LUNAS' : 'BELUM BAYAR',
            'jumlah' => Fmt::rupiah($pay->amount),
            'paket' => $child->package ?: 'Paket Les Privat',
            'jatuhTempo' => $pay->due_date
                ? $pay->due_date->format('d') . ' '
                    . mb_substr(Fmt::MONTHS[$pay->due_date->month], 0, 3)
                    . ' ' . $pay->due_date->year
                : '-',
            'periode' => $pay->period,
        ] : null;

        // Paket dan kuota.
        $q = $this->quota($child);

        $paket = [
            'nama' => 'Paket Bulanan ' . $q['total'] . ' Sesi',
            'sisa' => max(0, $q['total'] - $q['used']),
            'pakai' => $q['used'],
            'total' => $q['total'],
            'info' => 'Telah digunakan ' . $q['used']
                . ' sesi dalam siklus ' . Fmt::MONTHS[$today->month]
                . '. Kuota baru diperbarui otomatis tanggal 1 setiap bulan.',
        ];

        $tutorPendamping = $this->companionTutors($child)
            ->map(fn ($t) => [
                'nama' => $t->name,
                'mapel' => ($t->headline ?: 'Tutor Pengajar')
                    . ' (' . Fmt::method($child->method) . ')',
                'foto' => $t->photo_url ?? null,
                'wa' => PortalContext::wa(
                    $t->phone,
                    'Halo ' . $t->name . ', saya wali ' . $child->name . '.'
                ),
            ])
            ->all();

        $cabang = $this->branchInfo();

        $cabang['wa'] = PortalContext::wa(
            null,
            'Halo Admin ' . $cabang['nama'] . ', saya wali ' . $child->name . '.'
        );

        // Variabel riwayat yang dipakai langsung oleh Blade.
        $history = $att->take(10)->values();

        foreach ($history as $a) {
            $a->label = match ($a->status) {
                'hadir' => 'Hadir',
                'izin' => 'Izin',
                'sakit' => 'Sakit',
                'alpa' => 'Tidak Hadir',
                default => ucfirst((string) $a->status),
            };

            $a->extra = match ($a->status) {
                'hadir' => 'Hadir Tuntas',
                'izin' => 'Izin Terkonfirmasi',
                'sakit' => 'Izin Sakit',
                'alpa' => 'Tidak Hadir',
                default => 'Menunggu Evaluasi',
            };
        }

        // Data yang dibutuhkan oleh beranda.blade.php.
        return view('siswa.beranda', $d + [
            'greet' => auth()->user()->name ?? 'Pengguna',

            'next' => $next,
            'pendingCount' => $pending->count(),
            'hero' => $hero,

            'att' => [
                'pct' => $pct,
                'label' => $mTotal === 0
                    ? 'Belum ada data'
                    : ($pct >= 90
                        ? 'Sangat Baik'
                        : ($pct >= 75 ? 'Baik' : 'Perlu Ditingkatkan')),
                'hadir' => $mHadir,
                'total' => $mTotal,
            ],

            'week' => [
                'done' => $weekDone,
                'total' => $week->count(),
                'plan' => $week->count() - $weekDone,
            ],

            'quota' => $q,
            'history' => $history,
            'histTotal' => $att->count(),

            'wali' => PortalContext::wali(),

            'anak' => $d['children']->map(fn ($c) => [
                'id' => $c->id,
                'nama' => $c->name,
                'info' => PortalContext::levelLabel($c),
                'emoji' => PortalContext::emoji($c),
                'aktif' => $c->id === $child->id,
                'url' => route('portal.beranda', ['anak' => $c->id]),
            ])->values()->all(),

            'aktif' => [
                'nama' => $child->name,
                'info' => PortalContext::levelLabel($child),
                'grade' => $child->grade,
            ],

            'perluTindakan' => $perluTindakan,
            'sesi' => $sesi,
            'riwayat' => $this->historyItems($att->take(10)),

            'hist' => [
                'total' => $att->count(),
                'tuntas' => $att->where('status', 'hadir')->count(),
                'evaluasi' => $att->where('status', '!=', 'hadir')->count(),
            ],

            'mingguIni' => [
                'sesi' => $week->count(),
                'selesai' => $weekDone,
                'terjadwal' => $week->count() - $weekDone,
            ],

            'presensi' => [
                'bulan' => Fmt::period(),
                'persen' => $pct,
                'label' => $mTotal === 0
                    ? 'Belum ada data'
                    : ($pct >= 90
                        ? 'Sangat Baik'
                        : ($pct >= 75 ? 'Baik' : 'Perlu Ditingkatkan')),
                'hadir' => $mHadir,
                'total' => $mTotal,
            ],

            'tagihan' => $tagihan,
            'paket' => $paket,
            'tutorPendamping' => $tutorPendamping,
            'cabang' => $cabang,

            'links' => [
                'tambahAnak' => PortalContext::wa(
                    null,
                    'Halo Admin, saya ingin menambahkan data anak ke akun portal saya.'
                ),
                'tambahSesi' => PortalContext::wa(
                    null,
                    'Halo Admin, saya ingin request tambah sesi / tutor baru untuk ' . $child->name . '.'
                ),
                'silabus' => PortalContext::wa(
                    null,
                    'Halo Admin, mohon info silabus les ' . $child->name . '.'
                ),
            ],
        ]);
    }

    public function profil(Request $r)
    {
        $d = $this->base($r);
        $child = $d['child'];
        $q = $this->quota($child);

        $att = Attendance::whereHas(
            'session',
            fn ($s) => $s->where('student_id', $child->id)
        )->where('status', '!=', 'belum')->get();

        $done = $child->sessions()
            ->where('status', '!=', 'batal')
            ->get()
            ->filter(fn ($s) => $s->liveStatus() === 'selesai')
            ->count();

        $pct = $att->count()
            ? (int) round($att->where('status', 'hadir')->count() / $att->count() * 100)
            : 0;

        return view('siswa.profil', $d + [
            'wali' => PortalContext::wali(),

            'anak' => $d['children']->map(fn ($c) => [
                'id' => $c->id,
                'nama' => $c->name,
                'info' => PortalContext::levelLabel($c),
                'emoji' => PortalContext::emoji($c),
                'aktif' => $c->id === $child->id,
                'url' => route('portal.profil', ['anak' => $c->id]),
            ])->values()->all(),

            'level' => PortalContext::levelLabel($child),
            'emoji' => PortalContext::emoji($child),
            'quota' => $q,

            'stat' => [
                'selesai' => $done,
                'hadir' => $att->where('status', 'hadir')->count(),
                'total' => $att->count(),
                'pct' => $pct,
            ],

            'tutors' => $this->companionTutors($child),

            'cabang' => $this->branchInfo() + [
                'wa' => PortalContext::wa(
                    null,
                    'Halo Admin, saya ingin mengubah data profil ' . $child->name . '.'
                ),
            ],
        ]);
    }

    public function jadwal(Request $r)
    {
        $d = $this->base($r);
        $child = $d['child'];

        $weekStart = now()->startOfWeek()->addWeeks((int) $r->input('pekan', 0));

        $focus = $r->filled('tgl')
            ? Carbon::parse($r->tgl)
            : (($r->input('pekan', 0) == 0) ? today() : $weekStart->copy());

        $sessions = LessonSession::with('tutor')
            ->where('student_id', $child->id)
            ->where('status', '!=', 'batal')
            ->whereBetween('date', [
                $weekStart->toDateString(),
                $weekStart->copy()->endOfWeek()->toDateString(),
            ])
            ->orderBy('start_time')
            ->get();

        $daySessions = $sessions
            ->filter(fn ($s) => $s->date->isSameDay($focus))
            ->values();

        $pending = LessonSession::with('tutor')
            ->where('student_id', $child->id)
            ->whereDate('date', '>=', today())
            ->where('status', '!=', 'batal')
            ->where('parent_confirmed', false)
            ->orderBy('date')
            ->orderBy('start_time')
            ->first();

        if (
            $pending
            && ! $daySessions->contains('id', $pending->id)
            && ! $r->filled('tgl')
            && $r->input('pekan', 0) == 0
        ) {
            $focus = $pending->date->copy();

            $daySessions = $sessions
                ->filter(fn ($s) => $s->date->isSameDay($focus))
                ->values();
        }

        $weekJson = collect(range(0, 6))->map(function ($i) use ($weekStart, $sessions) {
            $dt = $weekStart->copy()->addDays($i);

            return [
                'day' => $dt->day,
                'date' => $dt->toDateString(),
                'count' => $sessions->filter(fn ($s) => $s->date->isSameDay($dt))->count(),
            ];
        });

        $dates = collect(range(0, 5))
            ->map(fn ($i) => [
                'v' => today()->addDays($i)->toDateString(),
                't' => Fmt::dateShort(today()->addDays($i))
                    . ($i === 0 ? ' (Hari Ini)' : ''),
            ])
            ->values();

        return view('siswa.jadwal', $d + [
            'weekStart' => $weekStart,
            'pending' => $pending,

            'pendingCount' => LessonSession::where('student_id', $child->id)
                ->whereDate('date', '>=', today())
                ->where('status', '!=', 'batal')
                ->where('parent_confirmed', false)
                ->count(),

            'focus' => $focus,
            'daySessions' => $daySessions,

            'others' => $sessions
                ->filter(fn ($s) => ! $s->date->isSameDay($focus) && $s->date->gte(today()))
                ->values(),

            'quota' => $this->quota($child),
            'weekJson' => $weekJson,

            'pendingJson' => $pending ? [
                'id' => $pending->id,
                'minutes' => Fmt::minutes($pending->start_time, $pending->end_time),
                'dates' => $dates,
            ] : null,
        ]);
    }

    public function presensi(Request $r)
    {
        $d = $this->base($r);
        $child = $d['child'];

        $live = LessonSession::with('tutor')
            ->where('student_id', $child->id)
            ->where('status', '!=', 'batal')
            ->whereDate('date', '<=', today())
            ->whereDoesntHave(
                'attendance',
                fn ($q) => $q->where('status', '!=', 'belum')
            )
            ->orderByDesc('date')
            ->orderByDesc('start_time')
            ->first()
            ?: LessonSession::with('tutor')
                ->where('student_id', $child->id)
                ->where('status', '!=', 'batal')
                ->whereDate('date', '>=', today())
                ->orderBy('date')
                ->orderBy('start_time')
                ->first();

        $history = $this->history($child, 4);

        foreach ($history as $a) {
            $a->label = match ($a->status) {
                'hadir' => 'Hadir',
                'izin' => 'Izin',
                'sakit' => 'Izin (Sakit)',
                default => ucfirst($a->status),
            };
        }

        $all = Attendance::whereHas(
            'session',
            fn ($q) => $q->where('student_id', $child->id)
        )->where('status', '!=', 'belum')->get();

        $den = max(1, $all->count());

        $nextS = LessonSession::with('tutor')
            ->where('student_id', $child->id)
            ->where('status', '!=', 'batal')
            ->whereDate('date', '>=', today())
            ->orderBy('date')
            ->orderBy('start_time')
            ->get()
            ->first(fn ($s) => $s->liveStatus() === 'belum');

        return view('siswa.presensi', $d + [
            'live' => $live,
            'liveJson' => $live ? ['id' => $live->id] : null,
            'history' => $history,
            'nextS' => $nextS,

            'stat' => [
                'pct' => (int) round(($all->where('status', 'hadir')->count() / $den) * 100),
                'hadir' => $all->where('status', 'hadir')->count(),
                'sakit' => $all->where('status', 'sakit')->count(),
                'izin' => $all->where('status', 'izin')->count(),
                'total' => $all->count(),
            ],
        ]);
    }

    public function tagihan(Request $r)
    {
        $d = $this->base($r);
        $children = $d['children'];
        $ids = $children->pluck('id');

        $rows = Payment::with('student')
            ->whereIn('student_id', $ids)
            ->orderByDesc('id')
            ->get();

        foreach ($rows as $pc) {
            $pc->used = $pc->student->sessions()
                ->where('status', '!=', 'batal')
                ->whereYear('date', now()->year)
                ->whereMonth('date', now()->month)
                ->get()
                ->filter(fn ($s) => $s->liveStatus() === 'selesai')
                ->count();
        }

        $paid = $rows->where('status', 'lunas')->first();
        $unpaid = $rows->where('status', 'belum')->first();

        $cards = collect([$paid, $unpaid])->filter()->values();
        $q = $this->quota($d['child']);

        $k = [
            'active' => $cards->sum('amount'),
            'periods' => 'Periode ' . $cards->pluck('period')->unique()->implode(' & '),
            'paid' => $paid->amount ?? 0,
            'paidNote' => $paid
                ? '1 Paket (' . $paid->student->name . ' - ' . $paid->period . ')'
                : 'Belum ada',
            'unpaid' => $unpaid->amount ?? 0,
            'unpaidNote' => $unpaid
                ? '1 Paket (' . $unpaid->student->name
                    . ' - Jatuh Tempo '
                    . ($unpaid->due_date ? Fmt::dateShort($unpaid->due_date) : '-')
                    . ')'
                : 'Semua lunas',
            'quotaLeft' => $q['total'] - $q['used'],
            'quotaTotal' => $q['total'],
        ];

        return view('siswa.tagihan', $d + compact('rows', 'cards', 'k'));
    }

    private function own(LessonSession $session)
    {
        abort_unless(
            $this->children()->contains('id', $session->student_id),
            403
        );
    }

    public function konfirmasi(LessonSession $session)
    {
        $this->own($session);

        $session->update([
            'parent_confirmed' => true,
        ]);

        return response()->json([
            'message' => 'Jadwal sesi dikonfirmasi. Notifikasi dikirim ke tutor.',
        ]);
    }

    public function reschedule(Request $r, LessonSession $session)
    {
        $this->own($session);

        $d = $r->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'reason' => 'nullable|string',
            'note' => 'nullable|string',
        ]);

        if (Fmt::minutes($d['start_time'], $d['end_time']) <= 0) {
            return response()->json([
                'message' => 'Jam selesai harus setelah jam mulai.',
            ], 422);
        }

        if (
            $session->tutor_id
            && LessonSession::conflicts(
                $session->tutor_id,
                $session->student_id,
                $d['date'],
                $d['start_time'],
                $d['end_time'],
                $session->id
            )->isNotEmpty()
        ) {
            return response()->json([
                'message' => 'Tutor tidak tersedia pada waktu itu. Coba slot lain.',
            ], 422);
        }

        $session->update([
            'date' => $d['date'],
            'start_time' => $d['start_time'],
            'end_time' => $d['end_time'],
            'reschedule_reason' => trim(
                ($d['reason'] ?? '') . ' ' . ($d['note'] ?? '')
            ),
            'parent_confirmed' => true,
            'tutor_confirmed' => false,
        ]);

        return response()->json([
            'message' => 'Pengajuan reschedule dikirim ke tutor & admin cabang.',
        ]);
    }

    public function presensiStore(Request $r, LessonSession $session)
    {
        $this->own($session);

        $d = $r->validate([
            'status' => 'required|in:hadir,izin,sakit',
            'understanding' => 'nullable|integer|min:1|max:5',
            'note' => 'nullable|string|max:300',
        ]);

        $session->update([
            'status' => 'selesai',
        ]);

        Attendance::updateOrCreate(
            ['lesson_session_id' => $session->id],
            [
                'status' => $d['status'],
                'understanding' => $d['understanding'] ?? null,
                'note' => $d['note'] ?? null,
                'journal' => $d['note'] ?? null,
                'submitted_by' => auth()->user()->name . ' (Wali Murid)',
                'submitted_at' => now(),
            ]
        );

        return response()->json([
            'message' => 'Presensi berhasil disimpan & diverifikasi.',
        ]);
    }

    public function kuitansi(Payment $payment)
    {
        abort_unless(
            $this->children()->contains('id', $payment->student_id),
            403
        );

        return view('admin.kuitansi', [
            'p' => $payment->load('student'),
        ]);
    }
}
