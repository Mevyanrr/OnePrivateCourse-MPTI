<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Support\Identity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function index(Request $r)
    {
        $q = User::with(['children', 'tutor'])->orderBy('id');
        $tab = $r->input('tab', 'all');
        if (in_array($tab, ['admin', 'tutor', 'wali'], true)) $q->where('role', $tab);
        if ($tab === 'nonaktif') $q->where('status', 'nonaktif');
        if ($r->filled('peran')) {
            match ($r->peran) {
                'super' => $q->where('role_label', 'like', '%Super%'), 'keuangan' => $q->where('role_label', 'like', '%Keuangan%'),
                'tutor' => $q->where('role', 'tutor'), 'wali' => $q->where('role', 'wali'), default => null,
            };
        }
        if (in_array($r->status, ['aktif', 'nonaktif'], true)) $q->where('status', $r->status);
        if ($r->filled('q')) {
            $n = '%' . mb_strtolower($r->q) . '%';
            $q->where(fn ($w) => $w->whereRaw('LOWER(name) LIKE ?', [$n])->orWhereRaw('LOWER(email) LIKE ?', [$n])->orWhere('phone', 'like', $n));
        }
        $users = $q->paginate(10)->withQueryString();
        $total = max(1, User::count());
        $k = ['total' => User::count(), 'aktif' => User::where('status', 'aktif')->count(), 'nonaktif' => User::where('status', 'nonaktif')->count(),
            'perlu' => User::where('status', 'aktif')->whereNull('email')->count()];
        $k['aktifPct'] = (int) round($k['aktif'] / $total * 100);

        return view('admin.akun', compact('users', 'k', 'tab'));
    }

    public function show(User $user)
    {
        return response()->json(['user' => $user->only(['id', 'name', 'email', 'phone', 'role', 'role_label', 'branch', 'status'])]);
    }

    public function store(Request $r)
    {
        // Seragamkan email (huruf kecil) & nomor WhatsApp (08…) sebelum divalidasi/unik.
        $r->merge(['email' => Identity::email($r->input('email')), 'phone' => Identity::phone($r->input('phone'))]);
        $d = $r->validate(['name' => 'required|string|max:255', 'email' => 'nullable|email|unique:users,email', 'phone' => 'nullable|string|max:30|unique:users,phone',
            'role' => 'required|in:admin,tutor,wali', 'role_label' => 'nullable|string|max:100', 'branch' => 'nullable|string'],
            ['email.unique' => 'Email sudah dipakai.', 'phone.unique' => 'Nomor WhatsApp sudah dipakai.']);
        if (blank($d['email'] ?? null) && blank($d['phone'] ?? null)) {
            return response()->json(['message' => 'Isi email atau nomor WhatsApp.'], 422);
        }
        $pw = Str::random(8);
        $prefix = ['admin' => 'ADM', 'tutor' => 'TTR', 'wali' => 'USR'][$d['role']];
        $u = User::create($d + ['password' => $pw, 'code' => $prefix . '-' . random_int(1000, 9999), 'role_label' => $d['role_label'] ?? ['admin' => 'Admin', 'tutor' => 'Tutor Pengajar', 'wali' => 'Wali Murid'][$d['role']]]);

        return response()->json(['message' => 'Akun ' . $u->name . ' dibuat.', 'password' => $pw]);
    }

    public function update(Request $r, User $user)
    {
        // Seragamkan email (huruf kecil) & nomor WhatsApp (08…) sebelum divalidasi/unik.
        $r->merge(['email' => Identity::email($r->input('email')), 'phone' => Identity::phone($r->input('phone'))]);
        $d = $r->validate(['name' => 'required|string|max:255', 'email' => 'nullable|email|unique:users,email,' . $user->id, 'phone' => 'nullable|string|max:30|unique:users,phone,' . $user->id,
            'role' => 'required|in:admin,tutor,wali', 'role_label' => 'nullable|string|max:100', 'branch' => 'nullable|string']);
        $user->update($d);

        return response()->json(['message' => 'Akun diperbarui.']);
    }

    public function reset(User $user)
    {
        $pw = Str::random(8);
        $user->update(['password' => $pw]);

        return response()->json(['message' => 'Kata sandi ' . $user->name . ' direset.', 'password' => $pw]);
    }

    public function toggle(User $user)
    {
        if ($user->id === auth()->id()) {
            return response()->json(['message' => 'Tidak bisa menonaktifkan akun sendiri.'], 422);
        }
        $user->update(['status' => $user->status === 'aktif' ? 'nonaktif' : 'aktif']);
        // Profil tutor ikut aktif / nonaktif bersama akunnya (akun daftar-mandiri menunggu persetujuan).
        $user->tutor?->update(['status' => $user->status]);

        return response()->json(['message' => 'Status akun ' . $user->name . ' kini ' . $user->status . '.']);
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return response()->json(['message' => 'Tidak bisa menghapus akun sendiri.'], 422);
        }
        $user->delete();

        return response()->json(['message' => 'Akun dihapus.']);
    }
}
