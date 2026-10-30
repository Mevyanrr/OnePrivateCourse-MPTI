<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /** Halaman awal sesuai peran user. */
    public static function home(): string
    {
        $user = Auth::user();
        if (! $user) {
            return '/login';
        }

        return match ($user->role) {
            'wali'  => '/portal/beranda',
            'tutor' => '/admin/jadwal',
            default => '/admin/dashboard',
        };
    }

    public function handle(Request $request, Closure $next, string ...$roles)
    {
        $user = $request->user();

        // Akun yang dinonaktifkan admin langsung dikeluarkan, meski sesinya masih berjalan.
        if ($user && $user->status === 'nonaktif') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            if ($request->expectsJson()) {
                return response()->json(['ok' => false, 'message' => 'Akun ini sudah dinonaktifkan.'], 403);
            }

            return redirect('/login')->withErrors(['identifier' => 'Akun ini sudah dinonaktifkan.']);
        }

        if (! $user || ! in_array($user->role, $roles, true)) {
            if ($request->expectsJson()) {
                return response()->json(['ok' => false, 'message' => 'Tidak punya akses.'], 403);
            }

            return redirect(self::home())->with('error', 'Kamu tidak punya akses ke halaman itu.');
        }

        return $next($request);
    }
}
