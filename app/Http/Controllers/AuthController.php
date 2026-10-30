<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RoleMiddleware;
use App\Models\Tutor;
use App\Models\User;
use App\Support\Identity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /** Hash bcrypt acak: dipakai agar waktu proses sama walau akun tidak ditemukan (anti tebak akun). */
    private const DUMMY_HASH = '$2y$12$y.9G1TEB6WHzS7hNHz4UqehkYkJ1wECgdVZd1WUkYEPQdG2Bt0DVm';

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'role'       => ['required', Rule::in(['admin', 'tutor'])],
            'identifier' => ['required', 'string', 'max:255'],
            'password'   => ['required', 'string', 'max:255'],
        ], [
            'identifier.required' => 'Email / No. WhatsApp / Username wajib diisi.',
            'password.required'   => 'Kata sandi wajib diisi.',
        ]);

        $keep = $request->only('identifier', 'role');
        $id   = trim($data['identifier']);

        // Batasi percobaan: per (identitas + IP) dan per IP.
        $max   = max(1, (int) config('opc.login_max_attempts', 5));
        $decay = max(1, (int) config('opc.login_lockout_seconds', 60));
        $keyUser = 'login:' . mb_strtolower($id) . '|' . $request->ip();
        $keyIp   = 'login-ip:' . $request->ip();
        foreach ([[$keyUser, $max], [$keyIp, $max * 4]] as [$k, $limit]) {
            if (RateLimiter::tooManyAttempts($k, $limit)) {
                $s = RateLimiter::availableIn($k);

                return back()->withErrors(['identifier' => "Terlalu banyak percobaan masuk. Coba lagi dalam {$s} detik."])->withInput($keep);
            }
        }

        $user  = $this->findUser($id, $data['role']);
        $check = Hash::check($data['password'], $user?->password ?? self::DUMMY_HASH);

        if (! $user || ! $check) {
            RateLimiter::hit($keyUser, $decay);
            RateLimiter::hit($keyIp, $decay);

            return back()->withErrors(['identifier' => 'Akun tidak ditemukan atau kata sandi salah untuk peran ini.'])->withInput($keep);
        }
        if ($user->status === 'nonaktif') {
            return back()->withErrors(['identifier' => 'Akun ini belum aktif atau dinonaktifkan. Hubungi admin cabang.'])->withInput($keep);
        }

        RateLimiter::clear($keyUser);
        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended(RoleMiddleware::home());
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'role'     => ['required', Rule::in(['admin', 'tutor'])],
            'name'     => ['required', 'string', 'max:255'],
            'contact'  => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed', function ($attr, $value, $fail) {
                if (! preg_match('/[A-Za-z]/', (string) $value) || ! preg_match('/\d/', (string) $value)) {
                    $fail('Kata sandi harus mengandung huruf dan angka.');
                }
            }],
            'terms'    => ['accepted'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.', 'contact.required' => 'Email / No. WhatsApp wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.', 'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'terms.accepted' => 'Kamu harus menyetujui Syarat & Ketentuan.',
        ]);

        $rateKey = 'register:' . $request->ip();
        if (RateLimiter::tooManyAttempts($rateKey, max(1, (int) config('opc.register_max_per_hour', 5)))) {
            return back()->withErrors(['contact' => 'Terlalu banyak pendaftaran dari perangkat ini. Coba lagi nanti.'])->withInput();
        }

        // Email dibuat huruf kecil; nomor WhatsApp diseragamkan ke format 08xxxxxxxxxx.
        $contact = trim($request->contact);
        if (filter_var($contact, FILTER_VALIDATE_EMAIL)) {
            $column = 'email';
            $value  = Identity::email($contact);
            $exists = User::whereRaw('LOWER(email) = ?', [$value])->exists();
        } else {
            $column = 'phone';
            $value  = Identity::phoneFromInput($contact);
            if (! $value) {
                return back()->withErrors(['contact' => 'Masukkan email atau nomor WhatsApp yang valid.'])->withInput();
            }
            $exists = User::whereIn('phone', Identity::phoneVariants($value))->exists();
        }
        if ($exists) {
            return back()->withErrors(['contact' => 'Email / nomor ini sudah terdaftar.'])->withInput();
        }

        // Akun daftar-mandiri menunggu aktivasi admin (cegah orang asing jadi Admin/Tutor sendiri).
        $pending = (bool) config('opc.register_requires_approval', true);
        $status  = $pending ? 'nonaktif' : 'aktif';
        $name    = trim(preg_replace('/\s+/', ' ', $request->name));

        $user = DB::transaction(function () use ($request, $column, $value, $status, $name) {
            $user = User::create([
                'name' => $name, $column => $value, 'role' => $request->role, 'status' => $status,
                'role_label' => $request->role === 'admin' ? 'Admin Cabang' : 'Tutor Pengajar', 'password' => $request->password,
                'code' => ($request->role === 'admin' ? 'ADM-' : 'TTR-') . random_int(1000, 9999),
            ]);
            if ($request->role === 'tutor') {
                Tutor::create(['user_id' => $user->id, 'code' => 'OP-TUT-' . now()->year . '-' . str_pad((string) (Tutor::count() + 1), 3, '0', STR_PAD_LEFT),
                    'name' => $user->name, 'headline' => 'Tutor Pengajar', 'phone' => $user->phone, 'email' => $user->email, 'status' => $status]);
            }

            return $user;
        });
        RateLimiter::hit($rateKey, 3600);

        if ($pending) {
            return redirect()->route('login')->with('success', 'Pendaftaran berhasil. Akun kamu akan aktif setelah disetujui admin cabang.');
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect(RoleMiddleware::home());
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /** Cari akun lewat email / No. WhatsApp / username (tidak peka huruf besar-kecil, format nomor fleksibel). */
    private function findUser(string $id, string $role): ?User
    {
        $lower  = mb_strtolower($id);
        $phones = Identity::phoneVariants(Identity::phoneFromInput($id));

        return User::query()
            ->where(function ($q) use ($lower, $phones) {
                $q->whereRaw('LOWER(email) = ?', [$lower])->orWhereRaw('LOWER(username) = ?', [$lower]);
                if ($phones) {
                    $q->orWhereIn('phone', $phones);
                }
            })
            // wali murid bisa masuk lewat pilihan peran mana pun
            ->where(fn ($q) => $q->where('role', $role)->orWhere('role', 'wali'))
            ->first();
    }
}
