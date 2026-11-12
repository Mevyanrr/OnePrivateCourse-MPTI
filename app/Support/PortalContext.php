<?php

namespace App\Support;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class PortalContext
{
    /**
     * Mendapatkan daftar anak/siswa berdasarkan user yang login.
     */
    public static function children()
    {
        $user = Auth::user();
        if (!$user) {
            return collect();
        }

        // Cek apakah kolom email ada di tabel students, lalu cari berdasarkan email user
        if (Schema::hasColumn('students', 'email')) {
            $students = Student::where('email', $user->email)->get();
            if ($students->isNotEmpty()) {
                return $students;
            }
        }

        // Fallback aman ambil semua data student
        return Student::all();
    }

    /**
     * Data wali / user yang sedang login.
     */
    public static function wali()
    {
        $user = Auth::user();
        return [
            'name'  => $user->name ?? 'Wali Murid',
            'email' => $user->email ?? '-',
            'phone' => $user->phone ?? '-',
        ];
    }

    /**
     * Helper untuk membuat link WhatsApp otomatis.
     */
    public static function wa(?string $phone, string $text): string
    {
        $cleanPhone = preg_replace('/[^0-9]/', '', (string) $phone);
        if (str_starts_with($cleanPhone, '0')) {
            $cleanPhone = '62' . substr($cleanPhone, 1);
        }
        if (!$cleanPhone) {
            $cleanPhone = '6281234567890';
        }

        return 'https://wa.me/' . $cleanPhone . '?text=' . urlencode($text);
    }

    public static function levelLabel(Student $student): string
    {
        return $student->grade ? 'Kelas ' . $student->grade : ($student->program ?? 'Program Privasi');
    }

    public static function emoji(Student $student): string
    {
        return '🎓';
    }
}
