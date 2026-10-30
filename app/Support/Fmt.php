<?php

namespace App\Support;

use Carbon\Carbon;

class Fmt
{
    public const DAYS = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    public const MONTHS = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    public static function initials(?string $name): string
    {
        $name = trim(preg_replace('/\b(Kak|Sir|Bpk\.?|Ibu|Ustadz|Ustadzah|Ms\.?|Mr\.?)\s+/i', '', (string) $name));
        $parts = preg_split('/\s+/', $name);
        $a = mb_substr($parts[0] ?? '', 0, 1);
        $b = mb_substr($parts[1] ?? '', 0, 1);
        return mb_strtoupper($a . $b);
    }

    public static function rupiah($n): string
    {
        return 'Rp ' . number_format((int) $n, 0, ',', '.');
    }

    public static function dayName($date): string
    {
        return self::DAYS[Carbon::parse($date)->dayOfWeek];
    }

    /** Rabu, 22 Okt 2026 */
    public static function dateShort($date): string
    {
        $d = Carbon::parse($date);
        return self::DAYS[$d->dayOfWeek] . ', ' . $d->day . ' ' . mb_substr(self::MONTHS[$d->month], 0, 3) . ' ' . $d->year;
    }

    /** 22 Oktober 2026 */
    public static function dateLong($date): string
    {
        $d = Carbon::parse($date);
        return $d->day . ' ' . self::MONTHS[$d->month] . ' ' . $d->year;
    }

    public static function period($date = null): string
    {
        $d = $date ? Carbon::parse($date) : Carbon::today();
        return self::MONTHS[$d->month] . ' ' . $d->year;
    }

    public static function hhmm($t): string
    {
        return substr((string) $t, 0, 5);
    }

    public static function range($start, $end): string
    {
        return self::hhmm($start) . ' - ' . self::hhmm($end) . ' WIB';
    }

    public static function method(?string $m): string
    {
        return match ($m) {
            'online' => 'Online Zoom',
            'studio' => 'Studio Bimbel',
            default  => 'Home Visit',
        };
    }

    public static function methodIcon(?string $m): string
    {
        return match ($m) {
            'online' => 'videocam',
            'studio' => 'meeting_room',
            default  => 'home_pin',
        };
    }

    public static function minutes($start, $end): int
    {
        return Carbon::parse($start)->diffInMinutes(Carbon::parse($end));
    }

    public static function waLink(?string $phone, string $text = ''): string
    {
        $n = preg_replace('/\D+/', '', (string) $phone);
        if (str_starts_with($n, '0')) {
            $n = '62' . substr($n, 1);
        }
        return 'https://wa.me/' . $n . ($text ? '?text=' . rawurlencode($text) : '');
    }

    /** Nama pendek: "Kak Rina M.Pd" -> "Kak Rina" */
    public static function shortName(?string $name): string
    {
        $w = preg_split('/\s+/', trim((string) $name));
        if (count($w) > 1 && preg_match('/^(Kak|Sir|Ustadz|Ustadzah|Bpk\.?|Ibu|Ms\.?)$/i', $w[0])) {
            return $w[0] . ' ' . $w[1];
        }
        return $w[0] ?? '';
    }

    public static function programIcon(?string $program): string
    {
        $p = mb_strtolower((string) $program);
        return match (true) {
            str_contains($p, 'english'), str_contains($p, 'toefl'), str_contains($p, 'bahasa') => 'translate',
            str_contains($p, 'matematika'), str_contains($p, 'ipa'), str_contains($p, 'fisika') => 'calculate',
            str_contains($p, 'utbk'), str_contains($p, 'persiapan') => 'school',
            str_contains($p, 'tahfidz') => 'auto_stories',
            default => 'menu_book',
        };
    }

    public static function colorFor(string $seed): array
    {
        $set = [['bg-blue-100', 'text-blue-700'], ['bg-indigo-100', 'text-indigo-700'], ['bg-amber-100', 'text-amber-700'], ['bg-emerald-100', 'text-emerald-700'], ['bg-rose-100', 'text-rose-700']];
        return $set[crc32($seed) % count($set)];
    }
}
