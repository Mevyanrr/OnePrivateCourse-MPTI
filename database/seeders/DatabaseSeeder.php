<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\LessonSession;
use App\Models\Payment;
use App\Models\ScheduleSlot;
use App\Models\Student;
use App\Models\Tutor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $today = Carbon::today();

        // ---------- AKUN ----------
        $admin = User::create([
            'code' => 'ADM-DIR-0001', 'name' => 'Arya Pratama', 'email' => 'admin.jaksel@oneprivate.com',
            'phone' => '081198760001', 'username' => 'admin.jaksel', 'role' => 'admin',
            'role_label' => 'Super Admin Cabang', 'password' => 'password123',
        ]);
        User::create([
            'code' => 'ADM-FIN-0042', 'name' => 'Cindy Claudia, S.Ak', 'email' => 'cindy.admin@oneprivate.com',
            'phone' => '082112345678', 'username' => 'cindy', 'role' => 'admin',
            'role_label' => 'Admin Keuangan', 'password' => 'password123',
        ]);
        $wali = User::create([
            'code' => 'USR-WLI-8821', 'name' => 'Ibu Nabila Kusumawardhani', 'email' => 'wali.demo@oneprivate.com',
            'phone' => '081299887766', 'username' => 'wali.demo', 'role' => 'wali',
            'role_label' => 'Wali Murid', 'password' => 'password123',
        ]);

        // ---------- TUTOR ----------
        $tdata = [
            ['TTR-EDU-2201', 'Kak Rina M.Pd', 'Spesialis Tahsin & Bahasa Arab', 'S1 Tarbiyah (UIN Syarif) & S2 Pend. Islam (UI)', '081388997721', 'rina.tutor@oneprivate.com', 4.9, 42, 'Mengaji & Tahsin,Tajwid Lanjutan,Bahasa Arab Dasar Anak,Iqra Balita Cepat', 'Home Visit (Tebet, Pancoran) & Online Zoom', 'home_visit,online', 'tutor.rina'],
            ['TTR-EDU-2202', 'Sir Danu S.Hum', 'Native Fluency & TOEFL Prep', 'S1 Sastra Inggris (UI)', '081345678901', 'danu.tutor@oneprivate.com', 4.8, 38, 'English Conversation,English Primary', 'Home Visit (Jaksel) & Online Zoom', 'home_visit,online', 'tutor.danu'],
            ['TTR-EDU-2203', 'Kak Fikri S.Si', 'Olimpiade Sains & Fisika SMA', 'S1 Fisika (ITB)', '081377001122', 'fikri.tutor@oneprivate.com', 5.0, 51, 'Matematika SD-SMA,Fisika Terpadu', 'Online Zoom Eksklusif', 'online', 'tutor.fikri'],
            ['TTR-EDU-2204', 'Ustadz Hanif Al-Hafidz', "Tahfidz Qur'an & Sanad Jazari", "S1 Ilmu Al-Qur'an (PTIQ)", '081355667788', 'hanif.tutor@oneprivate.com', 4.9, 31, "Tahfidz Al-Qur'an,Tilawah Tartil", 'Home Visit (Jakarta Selatan & Depok)', 'home_visit', 'tutor.hanif'],
            ['TTR-EDU-2205', 'Kak Nadia S.Pd', 'PAUD, Fonik & Calistung Montessori', 'S1 PGPAUD (UNJ)', '081322110099', 'nadia.tutor@oneprivate.com', 4.9, 26, 'Calistung Ceria,Iqra Balita', 'Home Visit (Kebayoran & Cilandak)', 'home_visit', 'tutor.nadia'],
            ['TTR-EDU-2206', 'Bpk. Hendra Wijaya', 'Master Kimia & IPA Terpadu', 'S2 Kimia (UGM)', '081311224455', 'hendra.tutor@oneprivate.com', 4.7, 19, 'Kimia SMA,IPA SMP Terpadu', 'Home Visit & Online Zoom (Tebet/Jaksel)', 'home_visit,online', 'tutor.hendra'],
            ['TTR-EDU-1988', 'Kak Dimas S.Si', 'Persiapan UTBK Saintek', 'S1 Kimia (IPB)', '087890123456', 'dimas.tutor@oneprivate.com', 4.8, 22, 'Persiapan UTBK,Fisika & Kimia', 'Studio Bimbel & Online Zoom', 'online,studio', 'tutor.dimas'],
        ];
        $tutors = [];
        foreach ($tdata as $i => $d) {
            $u = User::create([
                'code' => $d[0], 'name' => $d[1], 'email' => $d[5], 'phone' => $d[4], 'username' => $d[11],
                'role' => 'tutor', 'role_label' => 'Tutor Pengajar', 'password' => 'password123',
            ]);
            $tutors[$i + 1] = Tutor::create([
                'user_id' => $u->id, 'code' => 'OP-TUT-2023-' . str_pad((string) (10 + $i * 4), 3, '0', STR_PAD_LEFT),
                'name' => $d[1], 'headline' => $d[2], 'education' => $d[3], 'phone' => $d[4], 'email' => $d[5],
                'rating' => $d[6], 'reviews' => $d[7], 'subjects' => $d[8], 'area' => $d[9], 'methods' => $d[10],
                'max_sessions' => 20,
            ]);
        }

        // ---------- SISWA ----------
        $sdata = [
            ['Aisyah Putri', 'Kelas 8 SMP', 'SMP Negeri 115 Jakarta', 'Perempuan', 'Ibu Kandung', 'Ibu Nabila Kusumawardhani', '081299887766', 'home_visit', 'Jl. Tebet Barat Dalam VII No. 14, Tebet, Jakarta Selatan 12810', 'Tebet', "Mengaji & Tahsin Al-Qur'an", 1, 1450000, 'Fokus persiapan ujian tahsin juz 30 dan pemantapan makhraj huruf hijaiyah. Siswa sedikit pemalu di awal sesi, butuh pendekatan ramah, sabar, dan interaktif.', 'aktif', $wali->id],
            ['Kevin Pratama', 'Kelas 11 SMA', 'SMA Negeri 8 Jakarta', 'Laki-laki', 'Ayah Kandung', 'Bpk. Hendra Gunawan', '081355443322', 'online', 'Online (Zoom)', 'Jakarta Selatan', 'English Conversation', 2, 1600000, 'Meningkatkan percakapan bahasa Inggris untuk persiapan TOEFL.', 'aktif', null],
            ['Bilqis Zahra', 'Kelas 5 SD', 'SDN Tebet 01', 'Perempuan', 'Ibu Kandung', 'Ibu Dewi', '081277889900', 'home_visit', 'Jl. Tebet Timur Raya No. 7, Jakarta Selatan', 'Tebet', 'Matematika & IPA', 3, 1300000, 'Memperkuat dasar matematika dan sains.', 'aktif', null],
            ['Muhammad Rayhan', 'Kelas 12 SMA', 'SMA Negeri 3 Jakarta', 'Laki-laki', 'Ayah Kandung', 'Bpk. Syaiful', '081276540000', 'studio', 'Studio Bimbel Cabang Tebet', 'Tebet', 'Persiapan UTBK', 7, 1800000, 'Target PTN Saintek.', 'aktif', null],
            ['Nabila Syakieb', 'Kelas 6 SD', 'SDN Manggarai 02', 'Perempuan', 'Ibu Kandung', 'Ibu Rani', '081211223344', 'home_visit', 'Jl. Manggarai Selatan No. 3, Jakarta Selatan', 'Manggarai', "Tahfidz Al-Qur'an", 4, 1350000, 'Murajaah juz 30.', 'nonaktif', null],
            ['Farhan Nugraha', 'Kelas 12 SMA', 'SMAN 28 Jakarta', 'Laki-laki', 'Ayah Kandung', 'Bpk. Bambang', '081288217788', 'online', 'Online (Zoom)', 'Jakarta Selatan', 'UTBK Saintek Intensif', 3, 950000, 'Intensif UTBK Saintek, fokus Fisika dan Kalkulus.', 'aktif', $wali->id],
            ['Nabila Azzahra', 'Kelas 5 SD', 'SDN Pancoran 05', 'Perempuan', 'Ibu Kandung', 'Ibu Handayani', '082199887766', 'home_visit', 'Jl. Pancoran Barat No. 21, Jakarta Selatan', 'Pancoran', 'Tematik SD Kurikulum Merdeka', 5, 600000, 'Tematik dan membaca cepat.', 'aktif', null],
            ['Dimas Arya', 'Kelas 11 SMA', 'SMAN 6 Jakarta', 'Laki-laki', 'Ayah Kandung', 'Bpk. Gunawan', '085611449900', 'online', 'Online (Zoom)', 'Jakarta Selatan', 'TOEFL Preparation Master', 2, 700000, 'Skor TOEFL target 550.', 'aktif', null],
            ['Siti Zulaikha', 'Kelas 4 SD', 'SDN Tebet 05', 'Perempuan', 'Ibu Kandung', 'Ibu Fatimah', '081909090909', 'home_visit', 'Jl. Tebet Utara No. 11, Jakarta Selatan', 'Tebet', 'Calistung & Literasi Awal', 5, 550000, 'Lancar membaca dan menulis.', 'aktif', null],
            ['Rayhan Alif', 'Kelas 9 SMP', 'SMPN 19 Jakarta', 'Laki-laki', 'Ayah Kandung', 'Bpk. Syaiful', '081276549999', 'home_visit', 'Jl. Pancoran Tengah No. 9, Jakarta Selatan', 'Pancoran', 'IPA Terpadu & Olimpiade SMP', 6, 700000, 'Persiapan OSN IPA SMP.', 'aktif', null],
        ];
        $students = [];
        foreach ($sdata as $i => $d) {
            $students[$i + 1] = Student::create([
                'code' => 'SIS-2026-' . str_pad((string) (842 - $i * 37), 4, '0', STR_PAD_LEFT),
                'name' => $d[0], 'grade' => $d[1], 'school' => $d[2], 'gender' => $d[3], 'guardian_relation' => $d[4],
                'guardian_name' => $d[5], 'guardian_phone' => $d[6], 'phone' => null, 'method' => $d[7], 'address' => $d[8],
                'area' => $d[9], 'program' => $d[10], 'tutor_id' => $tutors[$d[11]]->id, 'duration' => 90,
                'package' => 'Paket Reguler Bulanan (8 Sesi / Bulan)', 'billing_scheme' => $i === 7 ? 'per_session' : 'monthly',
                'price' => $d[12], 'goals' => $d[13], 'status' => $d[14], 'parent_user_id' => $d[15],
                'joined_at' => Carbon::create(2025, 1, 14)->addDays($i * 20),
            ]);
        }

        // ---------- JADWAL RUTIN ----------
        foreach ([1 => ['Selasa', 'Kamis'], 2 => ['Senin', 'Rabu'], 3 => ['Selasa', 'Jumat'], 6 => ['Kamis', 'Sabtu']] as $sid => $days) {
            foreach ($days as $day) {
                ScheduleSlot::create([
                    'student_id' => $students[$sid]->id, 'tutor_id' => $students[$sid]->tutor_id,
                    'day' => $day, 'start_time' => '16:00', 'end_time' => '17:30',
                ]);
            }
        }

        // ---------- SESI HARI INI & PEKAN INI ----------
        $mk = function (int $sid, int $dayOffset, string $s, string $e, string $subject, string $topic, bool $tc, bool $pc, ?int $no = null, ?string $notes = null) use ($students, $today) {
            $st = $students[$sid];
            return LessonSession::create([
                'student_id' => $st->id, 'tutor_id' => $st->tutor_id, 'subject' => $subject, 'topic' => $topic,
                'date' => $today->copy()->addDays($dayOffset)->toDateString(), 'start_time' => $s, 'end_time' => $e,
                'method' => $st->method, 'location' => $st->method === 'online' ? 'Zoom' : $st->area,
                'tutor_confirmed' => $tc, 'parent_confirmed' => $pc, 'session_no' => $no, 'notes' => $notes,
            ]);
        };

        // hari ini
        $mk(1, 0, '08:00', '09:30', "Mengaji & Tahsin", 'Makharijul Huruf', true, true, 6);
        $mk(2, 0, '10:00', '11:30', 'English Conversation', 'Speaking Practice', true, true, 4);
        $mk(3, 0, '13:00', '14:30', 'Matematika & IPA', 'Pecahan', true, true, 3);
        $mk(6, 0, '15:00', '16:30', 'UTBK Saintek Intensif', 'Kalkulus Dasar', true, true, 5);
        $mk(4, 0, '16:00', '17:30', 'Persiapan UTBK', 'Latihan Soal TPS', true, true, 8);
        $mk(7, 0, '18:30', '20:00', 'Tematik SD', 'Membaca Cepat', true, false, 2);

        // kemarin (sebagian belum presensi) 
        $y1 = $mk(1, -1, '16:00', '17:30', "Mengaji & Tahsin", 'Mad Thobi\'i', true, true, 5);
        $y2 = $mk(3, -1, '16:00', '17:30', 'Matematika & IPA', 'Bilangan Bulat', true, true, 2);
        $y3 = $mk(8, -1, '19:00', '20:30', 'TOEFL Preparation', 'Listening Part A', true, true, 3);
        foreach ([$y1, $y3] as $y) {
            $y->update(['status' => 'selesai']);
            Attendance::create(['lesson_session_id' => $y->id, 'status' => 'hadir', 'understanding' => 5,
                'journal' => 'Materi tuntas dipelajari dengan baik. Evaluasi harian: Nilai A.', 'submitted_by' => 'Tutor', 'submitted_at' => now()->subDay()]);
        }
        $y2->update(['status' => 'selesai']);

        // pekan ini / depan
        $mk(1, 1, '16:00', '17:30', "Mengaji & Tahsin", 'Mad Aridh Lissukun', false, true, 7);
        $mk(6, 1, '15:30', '17:00', 'UTBK Saintek Intensif', 'Fisika Terpadu & Kalkulus', true, false, 6);
        $mk(2, 2, '18:30', '20:00', 'English Conversation', 'Narrative Essays', false, false, 5);
        $mk(7, 2, '16:00', '17:30', 'Tematik SD', 'Calistung & Fonik', true, false, 3);
        $mk(9, 3, '09:00', '10:30', 'Calistung & Literasi Awal', 'Membaca Suku Kata', true, true, 4);
        $mk(10, 3, '16:00', '17:30', 'IPA Terpadu', 'Gerak Lurus', false, true, 5);
        $mk(8, 4, '19:00', '20:30', 'TOEFL Preparation', 'Reading Strategy', true, true, 4);
        $mk(1, 5, '16:00', '17:30', "Mengaji & Tahsin", 'Ghunnah & Ikhfa', true, true, 8);

        // riwayat sesi Aisyah (untuk portal & detail)
        $hist = [
            [-3, 'Tajwid Makhorijul Huruf & QS. Al-Mulk', 'hadir', 5, 'Makhraj huruf Halqiyah sudah mantap. Pelafalan ayat 1-5 tajwidnya bersih.'],
            [-6, 'Mad Thobi\'i & Mad Wajib', 'hadir', 4, 'Latihan bacaan mad tuntas dipelajari dengan baik.'],
            [-10, 'Hukum Nun Mati & Tanwin', 'izin', 3, 'Izin berhalangan, jadwal pengganti disepakati.'],
            [-13, 'Idgham & Iqlab', 'hadir', 5, 'Pemahaman idgham sangat baik, lancar tanpa koreksi.'],
        ];
        foreach ($hist as $k => $h) {
            $s = $mk(1, $h[0], '16:00', '17:30', "Mengaji & Tahsin Al-Qur'an", $h[1], true, true, 4 - $k);
            $s->update(['status' => 'selesai']);
            Attendance::create(['lesson_session_id' => $s->id, 'status' => $h[2], 'understanding' => $h[3], 'journal' => $h[4],
                'submitted_by' => 'Ibu Nabila (Wali Murid)', 'submitted_at' => $s->date->copy()->setTime(17, 15)]);
        }

        // ---------- PEMBAYARAN ----------
        $period = \App\Support\Fmt::period($today);
        $pay = [
            [6, 'belum', null, null, 850000], [1, 'lunas', 'BCA Transfer', 2, 650000], [2, 'belum', null, null, 750000],
            [7, 'lunas', 'Mandiri Transfer', 3, 600000], [8, 'lunas', 'Mandiri Transfer', 1, 700000],
            [9, 'belum', null, null, 550000], [10, 'lunas', 'Tunai di Cabang', 5, 700000],
            [3, 'lunas', 'BCA Transfer', 4, 650000], [4, 'belum', null, null, 1800000],
        ];
        foreach ($pay as $n => $p) {
            Payment::create([
                'student_id' => $students[$p[0]]->id, 'invoice_no' => 'INV-' . $today->format('Ym') . '-' . str_pad((string) ($n + 1), 2, '0', STR_PAD_LEFT),
                'period' => $period, 'amount' => $p[4], 'status' => $p[1], 'method' => $p[2],
                'due_date' => $today->copy()->startOfMonth()->addDays(9),
                'paid_at' => $p[1] === 'lunas' ? $today->copy()->startOfMonth()->addDays($p[3]) : null,
                'receipt_no' => $p[1] === 'lunas' ? 'KW-' . $today->year . '-' . (1000 + $n * 7) : null,
            ]);
        }
        // tagihan bulan depan untuk Farhan (portal)
        Payment::create([
            'student_id' => $students[6]->id, 'invoice_no' => 'INV-NEXT-01', 'period' => \App\Support\Fmt::period($today->copy()->addMonth()),
            'amount' => 950000, 'status' => 'belum', 'due_date' => $today->copy()->addMonth()->startOfMonth()->addDays(4),
        ]);
    }
}
