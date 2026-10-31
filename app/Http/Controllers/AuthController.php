<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RoleMiddleware;
use App\Models\User;
use App\Support\Identity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /** Hash bcrypt acak: dipakai agar waktu proses sama walau akun tidak ditemukan (anti tebak akun). */
    private const DUMMY_HASH = '$2y$12$y.9G1TEB6WHzS7hNHz4UqehkYkJ1wECgdVZd1WUkYEPQdG2Bt0DVm';

    /** Pilihan peran di halaman masuk -> peran akun yang boleh masuk lewat pilihan itu. */
    private const LOGIN_ROLES = [
        'admin' => ['admin'], // tab "Admin": admin & staf/tutor (panel /admin)
        'wali'  => ['wali'],           // tab "Siswa/Wali": portal /portal
    ];

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'role'       => ['required', Rule::in(array_keys(self::LOGIN_ROLES))],
            'identifier' => ['required', 'string', 'max:255'],
            'password'   => ['required', 'string', 'max:255'],
        ], [
            'role.required'       => 'Pilih peran masuk terlebih dahulu.',
            'role.in'             => 'Peran masuk tidak valid.',
            'identifier.required' => 'Email / No. WhatsApp / Username wajib diisi.',
            'password.required'   => 'Kata sandi wajib diisi.',
        ]);

        $keep = $request->only('identifier', 'role');
        $id   = trim($data['identifier']);

        // Batasi percobaan: per (identitas + IP) dan per IP.
        $max     = max(1, (int) config('opc.login_max_attempts', 5));
        $decay   = max(1, (int) config('opc.login_lockout_seconds', 60));
        $keyUser = 'login:' . mb_strtolower($id) . '|' . $request->ip();
        $keyIp   = 'login-ip:' . $request->ip();
        foreach ([[$keyUser, $max], [$keyIp, $max * 4]] as [$k, $limit]) {
            if (RateLimiter::tooManyAttempts($k, $limit)) {
                $s = RateLimiter::availableIn($k);

                return back()->withErrors(['identifier' => "Terlalu banyak percobaan masuk. Coba lagi dalam {$s} detik."])->withInput($keep);
            }
        }

        $user  = $this->findUser($id);
        $check = Hash::check($data['password'], $user?->password ?? self::DUMMY_HASH);

        if (! $user || ! $check) {
            RateLimiter::hit($keyUser, $decay);
            RateLimiter::hit($keyIp, $decay);

            return back()->withErrors(['identifier' => 'Email / No. WhatsApp / Username atau kata sandi salah.'])->withInput($keep);
        }
        if ($user->status === 'nonaktif') {
            return back()->withErrors(['identifier' => 'Akun ini belum aktif atau dinonaktifkan. Hubungi admin cabang.'])->withInput($keep);
        }

        if ($user->role === 'tutor') {
           return back()->withErrors(['identifier' => 'Akun tutor tidak memiliki akses masuk. Hubungi admin cabang.'])->withInput($keep);
       }
        // Kata sandi benar, tapi peran yang dipilih tidak sesuai akun -> arahkan ke tab yang benar.
        if (! in_array($user->role, self::LOGIN_ROLES[$data['role']], true)) {
            $should = $user->role === 'wali' ? 'Siswa/Wali' : 'Admin';

            return back()->withErrors(['identifier' => "Akun ini terdaftar sebagai {$should}. Pilih peran \"{$should}\" lalu coba lagi."])->withInput($keep);
        }

        RateLimiter::clear($keyUser);
        Auth::login($user);
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
            'role'     => ['required', Rule::in(['admin', 'wali'])],
            'name'     => ['required', 'string', 'min:3', 'max:255'],
            'contact'  => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed', function ($attr, $value, $fail) {
                if (! preg_match('/[A-Za-z]/', (string) $value) || ! preg_match('/\d/', (string) $value)) {
                    $fail('Kata sandi harus mengandung huruf dan angka.');
                }
            }],
            'terms'    => ['accepted'],
        ], [
            'role.required'      => 'Pilih peran pendaftaran terlebih dahulu.',
            'role.in'            => 'Peran pendaftaran tidak valid.',
            'name.required'      => 'Nama lengkap wajib diisi.',
            'name.min'           => 'Nama lengkap minimal 3 karakter.',
            'contact.required'   => 'Email / No. WhatsApp wajib diisi.',
            'password.required'  => 'Kata sandi wajib diisi.',
            'password.min'       => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'terms.accepted'     => 'Kamu harus menyetujui Syarat & Ketentuan serta Kebijakan Privasi.',
        ]);

        $rateKey = 'register:' . $request->ip();
        if (RateLimiter::tooManyAttempts($rateKey, max(1, (int) config('opc.register_max_per_hour', 5)))) {
            return back()->withErrors(['contact' => 'Terlalu banyak pendaftaran dari perangkat ini. Coba lagi nanti.'])->withInput();
        }

        // Email dibuat huruf kecil; nomor WhatsApp diseragamkan ke format 08xxxxxxxxxx.
        $contact = trim($request->contact);
        if (str_contains($contact, '@')) {
            if (! filter_var($contact, FILTER_VALIDATE_EMAIL)) {
                return back()->withErrors(['contact' => 'Format email tidak valid.'])->withInput();
            }
            $column = 'email';
            $value  = Identity::email($contact);
            $exists = User::whereRaw('LOWER(email) = ?', [$value])->exists();
        } else {
            $column = 'phone';
            $value  = Identity::phoneFromInput($contact);
            if (! $value) {
                return back()->withErrors(['contact' => 'Masukkan email atau No. WhatsApp yang valid, contoh 08123456789.'])->withInput();
            }
            $exists = User::whereIn('phone', Identity::phoneVariants($value))->exists();
        }
        if ($exists) {
            return back()->withErrors(['contact' => 'Email / No. WhatsApp ini sudah terdaftar. Silakan masuk.'])->withInput();
        }

        // Default: akun langsung aktif & masuk dashboard. Set REGISTER_REQUIRES_APPROVAL=true bila
        // pendaftaran harus disetujui admin dulu (disarankan untuk peran Admin/Staf di production).
        $pending = (bool) config('opc.register_requires_approval', false);
        $admin   = $request->role === 'admin';

        $user = User::create([
            'name'       => trim(preg_replace('/\s+/', ' ', $request->name)),
            $column      => $value,
            'role'       => $request->role,
            'role_label' => $admin ? 'Admin Cabang' : 'Wali Murid',
            'status'     => $pending ? 'nonaktif' : 'aktif',
            'password'   => $request->password, // di-hash otomatis (cast 'hashed')
            'code'       => $this->newCode($admin ? 'ADM-' : 'WLI-'),
        ]);
        RateLimiter::hit($rateKey, 3600);

        if ($pending) {
            return redirect()->route('login')->with('success', 'Pendaftaran berhasil. Akun kamu akan aktif setelah disetujui admin cabang.');
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect(RoleMiddleware::home())->with('success', 'Pendaftaran berhasil. Selamat datang, ' . $user->name . '!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /** Cari akun lewat email / No. WhatsApp / username (tidak peka huruf besar-kecil, format nomor fleksibel). */
    private function findUser(string $id): ?User
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
            ->first();
    }

    private function newCode(string $prefix): string
    {
        do {
            $code = $prefix . random_int(10000, 99999);
        } while (User::where('code', $code)->exists());

        return $code;
    }
}
