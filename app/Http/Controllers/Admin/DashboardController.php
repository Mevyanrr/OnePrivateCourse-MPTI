<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LessonSession;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Tutor;
use App\Support\Fmt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /** Jumlah tutor yang ditampilkan di kartu "Tutor On-Duty". */
    private const DUTY_LIMIT = 5;

    /** Rentang (hari) yang dipantau untuk presensi kosong. */
    private const ATTENDANCE_WINDOW = 7;

    public function index(Request $request)
    {
        $user    = Auth::user();
        $today   = today();
        $date    = $this->resolveDate($request->query('tanggal'), $today);
        $isToday = $date->isSameDay($today);
        $isPast  = $date->lt($today);

        // ---------- DATA DASAR (semua dari database) ----------
        $todays = LessonSession::with(['student:id,name,grade,school', 'tutor:id,name'])
            ->whereDate('date', $date->toDateString())
            ->where('status', '!=', 'batal')
            ->orderBy('start_time')
            ->get();

        $monthStart = $date->copy()->startOfMonth();
        $monthEnd   = $date->copy()->endOfMonth();
        $month = LessonSession::where('status', '!=', 'batal')
            ->whereBetween('date', [$monthStart->toDateString(), $monthEnd->toDateString()])
            ->get(['id', 'date', 'start_time', 'end_time', 'status', 'tutor_confirmed']);

        $period = Fmt::period($date);
        $monthLabel = $date->isSameMonth($today) ? 'bulan ini' : 'di ' . $period;

        // ---------- LABEL TANGGAL ----------
        $dayShort = $date->day . ' ' . mb_substr(Fmt::MONTHS[$date->month], 0, 3);
        $scope = $isToday ? 'Hari Ini' : $dayShort;

        $dateInfo = [
            'iso'     => $date->toDateString(),
            'today'   => $today->toDateString(),
            'isToday' => $isToday,
            'button'  => ($isToday ? 'Hari ini' : Fmt::DAYS[$date->dayOfWeek]) . ', ' . Fmt::dateLong($date),
            'scope'   => $scope,
            'scopeLong' => $isToday ? 'Hari Ini' : Fmt::dateShort($date),
            'sub'     => $isToday ? 'hari ini' : 'pada ' . Fmt::dateShort($date),
            'badge'   => $isToday ? 'AKTIF HARI INI' : ($isPast ? 'RIWAYAT' : 'JADWAL MENDATANG'),
            'badgeClass' => $isToday ? '' : ($isPast ? 'past' : 'future'),
        ];

        // ---------- KOMPONEN HALAMAN ----------
        $stats  = $this->buildStats($todays, $date, $period, $monthLabel);
        $todo   = $this->buildTodo($date, $today, $period);
        $rows   = $this->buildSessionRows($todays, $isToday);
        $duty   = $this->buildDuty($todays, $date, $today);

        return view('admin.dashboard', [
            'namaAdmin'   => $user->name,
            'roleLabel'   => $user->role_label ?: 'Admin Cabang',
            'dateInfo'    => $dateInfo,
            'stats'       => $stats,
            'tindakLanjut' => $todo['cards'],
            'prioritas'   => $todo['priority'],
            'sesiHariIni' => $rows,
            'totalSesi'   => $rows->count(),
            'adaStudio'   => $rows->contains('metode', 'studio'),
            'capaian'     => $this->buildAchievement($month, $date),
            'tutorDuty'   => $duty['list'],
            'tutorDutyTotal' => $duty['total'],
            'sessionDays' => $this->sessionDays($date),
        ]);
    }

    /** Baca ?tanggal=YYYY-MM-DD; nilai tidak valid -> hari ini. */
    private function resolveDate(mixed $raw, Carbon $fallback): Carbon
    {
        if (is_string($raw) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $raw)) {
            try {
                $d = Carbon::createFromFormat('!Y-m-d', $raw);
                // tolak tanggal "meluap" seperti 2026-02-31 dan tahun di luar batas wajar
                if ($d && $d->format('Y-m-d') === $raw && $d->year >= 2000 && $d->year <= 2100) {
                    return $d->startOfDay();
                }
            } catch (\Throwable $e) {
                // jatuh ke default
            }
        }

        return $fallback->copy();
    }

    /** Empat kartu statistik teratas. */
    private function buildStats(Collection $todays, Carbon $date, string $period, string $monthLabel): array
    {
        // --- Sesi ---
        $count  = $todays->count();
        $online = $todays->where('method', 'online')->count();
        $studio = $todays->where('method', 'studio')->count();
        $home   = $count - $online - $studio;

        $sesi = ['label' => 'Sesi ' . ($date->isToday() ? 'Hari Ini' : $date->day . ' ' . mb_substr(Fmt::MONTHS[$date->month], 0, 3)),
            'value' => $count, 'unit' => 'Sesi', 'icon' => 'calendar-check', 'tone' => 'blue'];
        if ($count === 0) {
            $sesi['meta'] = [['c' => '#b6bfd3', 't' => 'Tidak ada sesi terjadwal']];
        } else {
            $sesi['meta'] = [['c' => '#2057d6', 't' => $home . ' Home Visit'], ['c' => '#6d5ae6', 't' => $online . ' Online Zoom']];
            if ($studio > 0) {
                $sesi['meta'][] = ['c' => '#14b8a6', 't' => $studio . ' Studio'];
            }
        }

        // --- Siswa aktif ---
        $mStart = $date->copy()->startOfMonth();
        $mEnd   = $date->copy()->endOfMonth();
        $newStudents = Student::where('status', 'aktif')
            ->where(function ($q) use ($mStart, $mEnd) {
                $q->whereBetween('joined_at', [$mStart->toDateString(), $mEnd->toDateString()])
                  ->orWhere(fn ($n) => $n->whereNull('joined_at')
                      ->whereBetween('created_at', [$mStart->copy()->startOfDay(), $mEnd->copy()->endOfDay()]));
            })->count();

        $siswa = ['label' => 'Siswa Aktif', 'value' => Student::where('status', 'aktif')->count(),
            'unit' => 'Siswa', 'icon' => 'graduation', 'tone' => 'green'];
        if ($newStudents > 0) {
            $siswa['trend'] = '+' . $newStudents . ' siswa baru ' . $monthLabel;
        } else {
            $siswa['note'] = 'Belum ada siswa baru ' . $monthLabel;
        }

        // --- Tutor bertugas ---
        $tutorCount = $todays->pluck('tutor_id')->filter()->unique()->count();
        $belumKonfirmasi = $todays->where('tutor_confirmed', false)->count();
        $tutor = ['label' => 'Tutor Bertugas', 'value' => $tutorCount, 'unit' => 'Tutor',
            'icon' => 'user-square', 'tone' => 'violet'];
        if ($count === 0) {
            $tutor['note'] = 'Tidak ada sesi pada tanggal ini';
        } elseif ($belumKonfirmasi === 0) {
            $tutor['ok'] = 'Semua tutor telah terkonfirmasi';
        } else {
            $tutor['warn'] = $belumKonfirmasi . ' sesi belum dikonfirmasi tutor';
        }

        // --- Belum membayar ---
        $unpaid = Payment::where('status', 'belum')->where('period', $period);
        $unpaidStudents = (clone $unpaid)->distinct()->count('student_id');
        $bayar = ['label' => 'Belum Membayar', 'value' => $unpaidStudents, 'unit' => 'Siswa',
            'icon' => 'receipt', 'tone' => 'amber'];
        if ($unpaidStudents > 0) {
            $bayar['warn'] = 'Periode ' . $period;
        } elseif (Payment::where('period', $period)->exists()) {
            $bayar['ok'] = 'Semua tagihan ' . $period . ' lunas';
        } else {
            $bayar['note'] = 'Belum ada tagihan ' . $period;
        }

        return [$sesi, $siswa, $tutor, $bayar];
    }

    /** Kartu "Perlu Tindak Lanjut" + jumlah yang benar-benar butuh perhatian. */
    private function buildTodo(Carbon $date, Carbon $today, string $period): array
    {
        $red   = ['c' => '#e11d48', 'bg' => '#ffe9ee'];
        $violet = ['c' => '#6d5ae6', 'bg' => '#eeebff'];
        $teal  = ['c' => '#14b8a6', 'bg' => '#e0f7f4'];
        $ok    = ['c' => '#12a56e', 'bg' => '#e6f7f0'];

        // 1) Presensi kosong: sesi yang sudah lewat tetapi belum ada catatan kehadiran.
        $attEnd = $date->copy()->subDay();
        if ($attEnd->gte($today)) {
            $attEnd = $today->copy()->subDay();
        }
        $attStart = $attEnd->copy()->subDays(self::ATTENDANCE_WINDOW - 1);

        $emptyAtt = LessonSession::with('tutor:id,name')
            ->where('status', '!=', 'batal')
            ->whereBetween('date', [$attStart->toDateString(), $attEnd->toDateString()])
            ->where(function ($q) {
                $q->whereDoesntHave('attendance')
                  ->orWhereHas('attendance', fn ($a) => $a->where('status', 'belum'));
            })
            ->orderByDesc('date')
            ->get();

        $n = $emptyAtt->count();
        $dates = $emptyAtt->map(fn ($s) => $s->date->toDateString())->unique();
        $yesterday = $today->copy()->subDay()->toDateString();
        $kapan = $dates->count() === 1
            ? ($dates->first() === $yesterday ? 'kemarin' : 'pada ' . Fmt::dateLong($dates->first()))
            : self::ATTENDANCE_WINDOW . ' hari terakhir';
        $waktuAtt = $dates->count() === 1
            ? ($dates->first() === $yesterday ? 'Kemarin' : Fmt::dateLong($dates->first()))
            : self::ATTENDANCE_WINDOW . ' Hari Terakhir';

        $names = $emptyAtt->map(fn ($s) => $s->tutor->name ?? null)->filter()->unique()->values();
        $who = match (true) {
            $names->isEmpty() => 'tutor',
            $names->count() === 1 => '<b>' . e($names[0]) . '</b>',
            default => '<b>' . e($names[0]) . '</b> dan ' . ($names->count() - 1) . ' tutor lainnya',
        };

        $presensi = $n > 0
            ? ['label' => 'PRESENSI KOSONG', 'waktu' => $waktuAtt, ...$red,
                'judul' => 'Absensi Belum Diisi',
                'isi' => $n . ' sesi les ' . $kapan . ' oleh ' . $who . ' belum mengisi catatan materi &amp; kehadiran.',
                'status' => 'Status: Pending Tutor', 'btn' => 'Lihat Presensi', 'route' => 'admin.presensi', 'primary' => false, 'urgent' => true]
            : ['label' => 'PRESENSI', 'waktu' => self::ATTENDANCE_WINDOW . ' Hari Terakhir', ...$ok,
                'judul' => 'Presensi Lengkap',
                'isi' => 'Semua sesi les ' . self::ATTENDANCE_WINDOW . ' hari terakhir sudah memiliki catatan materi &amp; kehadiran.',
                'status' => 'Status: Terisi semua', 'btn' => 'Lihat Presensi', 'route' => 'admin.presensi', 'primary' => false, 'urgent' => false];

        // 2) Iuran siswa belum bayar untuk periode tanggal terpilih.
        $unpaidQ = Payment::where('status', 'belum')->where('period', $period);
        $unpaidStudents = (clone $unpaidQ)->distinct()->count('student_id');
        $unpaidAmount = (int) (clone $unpaidQ)->sum('amount');
        $billed = Payment::where('period', $period)->exists();
        $waktuBayar = $date->isSameMonth($today) ? 'Bulan Berjalan' : $period;

        $iuran = $unpaidStudents > 0
            ? ['label' => 'IURAN SISWA', 'waktu' => $waktuBayar, ...$violet,
                'judul' => 'Belum Bayar',
                'isi' => '<b>' . $unpaidStudents . ' siswa</b> belum melakukan pembayaran untuk periode les bulan ' . e($period) . '.',
                'status' => 'Total: ' . Fmt::rupiah($unpaidAmount), 'btn' => 'Lihat Pembayaran', 'route' => 'admin.pembayaran', 'primary' => false, 'urgent' => true]
            : ['label' => 'IURAN SISWA', 'waktu' => $waktuBayar, ...$ok,
                'judul' => $billed ? 'Semua Lunas' : 'Belum Ada Tagihan',
                'isi' => $billed
                    ? 'Seluruh tagihan periode les bulan ' . e($period) . ' sudah dibayar.'
                    : 'Belum ada tagihan yang diterbitkan untuk periode les bulan ' . e($period) . '.',
                'status' => $billed ? 'Tertunggak: Rp 0' : 'Periode ' . $period,
                'btn' => 'Lihat Pembayaran', 'route' => 'admin.pembayaran', 'primary' => false, 'urgent' => false];

        // 3) Konfirmasi sesi mendatang (aturan sama dengan halaman Konfirmasi Sesi & badge sidebar).
        $pending = LessonSession::where('status', '!=', 'batal')
            ->whereDate('date', '>=', $today->toDateString())
            ->where(fn ($q) => $q->where('tutor_confirmed', false)->orWhere('parent_confirmed', false))
            ->get(['id', 'created_at', 'tutor_confirmed', 'parent_confirmed']);

        $pn = $pending->count();
        $waitTutor = $pending->where('tutor_confirmed', false)->count();
        $waitParent = $pn - $waitTutor;
        $late = $pending->filter(function ($s) {
            $hrs = $s->created_at ? $s->created_at->diffInHours(now()) : 0;
            return (! $s->tutor_confirmed && $hrs > 24) || (! $s->parent_confirmed && $hrs > 4);
        })->count();

        $konfirmasi = $pn > 0
            ? ['label' => 'KONFIRMASI SESI', 'waktu' => $pn . ' Sesi', ...$teal,
                'judul' => 'Konfirmasi Sesi Mendatang',
                'isi' => $pn . ' sesi les mendatang menunggu konfirmasi: <b>' . $waitTutor . '</b> menunggu tutor dan <b>' . $waitParent . '</b> menunggu orang tua siswa.',
                'status' => $late > 0 ? $late . ' melebihi batas SLA' : 'Semua dalam batas SLA',
                'btn' => 'Buka Konfirmasi', 'route' => 'admin.konfirmasi', 'primary' => true, 'urgent' => true]
            : ['label' => 'KONFIRMASI SESI', 'waktu' => '0 Sesi', ...$ok,
                'judul' => 'Semua Sesi Terkonfirmasi',
                'isi' => 'Tidak ada sesi mendatang yang menunggu konfirmasi tutor maupun orang tua.',
                'status' => 'Semua dalam batas SLA', 'btn' => 'Buka Konfirmasi', 'route' => 'admin.konfirmasi', 'primary' => false, 'urgent' => false];

        $cards = [$presensi, $iuran, $konfirmasi];

        return ['cards' => $cards, 'priority' => collect($cards)->where('urgent', true)->count()];
    }

    /** Baris tabel "Jadwal Sesi" untuk tanggal terpilih. */
    private function buildSessionRows(Collection $todays, bool $isToday): Collection
    {
        return $todays->map(function (LessonSession $s) use ($isToday) {
            $live  = $s->liveStatus();
            $dur   = Fmt::minutes($s->start_time, $s->end_time);
            $state = '';
            $ket   = 'Durasi: ' . $dur . ' Menit';

            if ($live === 'selesai') {
                $state = 'done';
                $ket = 'Selesai';
            } elseif ($live === 'berjalan') {
                $state = 'now';
                $ket = 'Sesi Berlangsung';
            } elseif ($isToday) {
                $start = $s->date->copy()->setTimeFromTimeString($s->start_time);
                $mins = (int) ceil(now()->diffInMinutes($start, false));
                if ($mins > 0 && $mins <= 60) {
                    $state = 'soon';
                    $ket = 'Mulai dlm ' . $mins . ' mnt';
                }
            }

            $name = $s->student->name ?? '-';
            $kelas = trim(($s->student->grade ?? '') . ($s->student?->school ? ' • ' . $s->student->school : ''), ' •');

            return [
                'ini'    => Fmt::initials($name),
                'warna'  => ['b', 'y', 'g'][crc32($name) % 3],
                'nama'   => $name,
                'kelas'  => $kelas !== '' ? $kelas : '-',
                'tutor'  => $s->tutor->name ?? 'Belum ditugaskan',
                'mapel'  => $s->subject ?: ($s->topic ?: '-'),
                'waktu'  => Fmt::range($s->start_time, $s->end_time),
                'ket'    => $ket,
                'state'  => $state,
                'metode' => match ($s->method) { 'online' => 'online', 'studio' => 'studio', default => 'home' },
            ];
        })->values();
    }

    /** Daftar tutor yang bertugas pada tanggal terpilih. */
    private function buildDuty(Collection $todays, Carbon $date, Carbon $today): array
    {
        $all = $todays->filter(fn ($s) => $s->tutor)->groupBy('tutor_id')->map(function ($group) use ($date, $today) {
            $t = $group->first()->tutor;
            $states = $group->map(fn ($s) => $s->liveStatus());

            [$status, $tone] = match (true) {
                $date->gt($today) => ['Terjadwal', 'gray'],
                $states->contains('berjalan') => ['Di Kelas', 'blue'],
                $states->every(fn ($x) => $x === 'selesai') => ['Terselesaikan', 'green'],
                default => ['Siap Berangkat', 'gray'],
            };

            $methods = $group->pluck('method')->unique()->map(fn ($m) => Fmt::method($m))->implode(' & ');

            return [
                'ini'    => Fmt::initials($t->name),
                'warna'  => ['b', 'y', 'g'][crc32($t->name) % 3],
                'nama'   => $t->name,
                'info'   => $group->count() . ' Sesi (' . $methods . ')',
                'status' => $status,
                'tone'   => $tone,
            ];
        })->values();

        return ['list' => $all->take(self::DUTY_LIMIT)->values(), 'total' => $all->count()];
    }

    /** Kartu "Pencapaian Sesi Bulan Ini" untuk bulan dari tanggal terpilih. */
    private function buildAchievement(Collection $month, Carbon $date): array
    {
        $total = $month->count();
        $done  = $month->filter(fn ($s) => $s->liveStatus() === 'selesai');
        $hours = fn (Collection $c) => round($c->sum(fn ($s) => Fmt::minutes($s->start_time, $s->end_time)) / 60, 1);
        $fmtH  = fn ($h) => rtrim(rtrim(number_format($h, 1, ',', '.'), '0'), ',');

        $confirmedPct = $total ? round($month->where('tutor_confirmed', true)->count() / $total * 100, 1) : 0;

        return [
            'persen'    => $total ? (int) round($done->count() / $total * 100) : 0,
            'target'    => $fmtH($hours($month)) . ' Jam Sesi',
            'selesai'   => $fmtH($hours($done)) . ' Jam Terselesaikan',
            'kehadiran' => $confirmedPct,
            'kehadiranText' => number_format($confirmedPct, 1, ',', '.'),
            'bulan'     => mb_substr(Fmt::MONTHS[$date->month], 0, 3) . ' ' . $date->year,
        ];
    }

    /** Jumlah sesi per tanggal (±6 bulan) untuk penanda titik di kalender. */
    private function sessionDays(Carbon $date): array
    {
        $from = $date->copy()->subMonths(6)->startOfMonth()->toDateString();
        $to   = $date->copy()->addMonths(6)->endOfMonth()->toDateString();

        return DB::table('lesson_sessions')
            ->where('status', '!=', 'batal')
            ->whereBetween('date', [$from, $to])
            ->select('date')
            ->selectRaw('COUNT(*) as c')
            ->groupBy('date')
            ->pluck('c', 'date')
            ->map(fn ($v) => (int) $v)
            ->all();
    }
}
