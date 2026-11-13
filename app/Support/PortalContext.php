<?php

namespace App\Support;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class PortalContext
{
    /**
     * Mengambil siswa yang terhubung dengan akun wali yang login.
     */
    public static function children()
    {
        $user = Auth::user();

        if (!$user) {
            return collect();
        }

        return $user->children()
            ->orderBy('id')
            ->get();
    }

    /**
     * Data wali yang sedang login.
     */
    public static function wali()
    {
        $user = Auth::user();

        return [
            'name' => $user->name ?? 'Wali Murid',
            'email' => $user->email ?? '-',
            'phone' => $user->phone ?? '-',
        ];
    }

    /**
     * Membuat link WhatsApp.
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
        return $student->grade
            ? 'Kelas ' . $student->grade
            : ($student->program ?? 'Program Privat');
    }

    public static function emoji(Student $student): string
    {
        return '🎓';
    }
}
