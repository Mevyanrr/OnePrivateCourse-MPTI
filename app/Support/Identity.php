<?php

namespace App\Support;

/** Penyeragaman identitas login (email & nomor WhatsApp) supaya pencarian akun konsisten. */
class Identity
{
    public static function email(?string $v): ?string
    {
        $v = trim((string) $v);

        return $v === '' ? null : mb_strtolower($v);
    }

    /** Nomor kanonik berformat 08xxxxxxxxxx. Terima 08…, 8…, 62…, +62…, spasi/strip diabaikan. */
    public static function phone(?string $v): ?string
    {
        $n = preg_replace('/\D+/', '', (string) $v);
        if ($n === '') {
            return null;
        }
        if (str_starts_with($n, '62')) {
            $n = '0' . substr($n, 2);
        } elseif (! str_starts_with($n, '0')) {
            $n = '0' . $n;
        }

        return $n;
    }

    /** Nomor kanonik jika teks yang diketik terlihat seperti nomor telepon; selain itu null (mis. username). */
    public static function phoneFromInput(string $v): ?string
    {
        $v = trim($v);
        if (! preg_match('/^\+?[0-9\s\-]{8,18}$/', $v)) {
            return null;
        }
        $n = self::phone($v);

        return $n && preg_match('/^0[1-9][0-9]{7,13}$/', $n) ? $n : null;
    }

    /** Semua bentuk penulisan yang mungkin tersimpan di database untuk nomor kanonik. */
    public static function phoneVariants(?string $canonical): array
    {
        if (! $canonical) {
            return [];
        }
        $rest = substr($canonical, 1);

        return [$canonical, '62' . $rest, '+62' . $rest];
    }
}
