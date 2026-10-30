<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\LessonSession;
use App\Models\Payment;
use App\Models\Student;
use App\Support\Fmt;

class ExportController extends Controller
{
    public function csv(string $type)
    {
        $rows = [];
        switch ($type) {
            case 'siswa':
                $rows[] = ['Kode', 'Nama', 'Jenjang', 'Sekolah', 'Program', 'Tutor', 'Metode', 'Wali', 'No. Wali', 'Status'];
                foreach (Student::with('tutor')->orderBy('id')->get() as $s) {
                    $rows[] = [$s->code, $s->name, $s->grade, $s->school, $s->program, $s->tutor->name ?? '-', Fmt::method($s->method), $s->guardian_name, $s->guardian_phone, $s->status];
                }
                break;
            case 'pembayaran':
                $rows[] = ['Invoice', 'Siswa', 'Periode', 'Nominal', 'Status', 'Metode', 'Tgl Bayar', 'Kuitansi'];
                foreach (Payment::with('student')->orderBy('id')->get() as $p) {
                    $rows[] = [$p->invoice_no, $p->student->name, $p->period, $p->amount, $p->status, $p->method, optional($p->paid_at)->toDateString(), $p->receipt_no];
                }
                break;
            case 'presensi':
                $rows[] = ['Tanggal', 'Jam', 'Siswa', 'Tutor', 'Materi', 'Status Presensi', 'Jurnal'];
                foreach (LessonSession::with(['student', 'tutor', 'attendance'])->whereDate('date', '<=', today())->orderByDesc('date')->get() as $s) {
                    $rows[] = [$s->date->toDateString(), Fmt::range($s->start_time, $s->end_time), $s->student->name, $s->tutor->name ?? '-', $s->topic ?: $s->subject, $s->attendance->status ?? 'belum', $s->attendance->journal ?? ''];
                }
                break;
            default: // jadwal & konfirmasi
                $rows[] = ['Tanggal', 'Jam', 'Siswa', 'Tutor', 'Mapel', 'Metode', 'Status', 'Tutor Konfirmasi', 'Ortu Konfirmasi'];
                foreach (LessonSession::with(['student', 'tutor'])->orderBy('date')->orderBy('start_time')->get() as $s) {
                    $rows[] = [$s->date->toDateString(), Fmt::range($s->start_time, $s->end_time), $s->student->name, $s->tutor->name ?? '-', $s->subject, Fmt::method($s->method), $s->liveStatus(), $s->tutor_confirmed ? 'ya' : 'belum', $s->parent_confirmed ? 'ya' : 'belum'];
                }
        }

        return response()->streamDownload(function () use ($rows) {
            $out = fopen('php://output', 'w');
            fwrite($out, "\xEF\xBB\xBF");
            foreach ($rows as $r) fputcsv($out, $r);
            fclose($out);
        }, $type . '-' . now()->format('Ymd') . '.csv', ['Content-Type' => 'text/csv; charset=UTF-8']);
    }
}
