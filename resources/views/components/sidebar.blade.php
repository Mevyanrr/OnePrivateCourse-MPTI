{{--
    resources/views/components/sidebar.blade.php
    Satu sidebar untuk SEMUA halaman admin. Pasang SEKALI di layout portal.blade.php:
        <x-sidebar />
    Menu yang menyala otomatis dari URL, jadi /admin/jadwal/baru -> menu "Jadwal & Sesi Les" menyala.
    Tidak butuh <x-icon> dan tidak bergantung nama route (pakai URL langsung).
    Badge angka bisa dikirim dari layout:  <x-sidebar :badges="['siswa' => 42, 'konfirmasi' => 3, 'notifikasi' => 5]" />
--}}
@props(['badges' => []])

@php
    $notifUrl = \Illuminate\Support\Facades\Route::has('admin.notifikasi') ? route('admin.notifikasi') : '#';

    // Angka badge diisi dari database lewat View Composer di AppServiceProvider ($nav).
    $nav = $nav ?? ['students' => 0, 'confirm' => 0, 'notif' => 0];

    $config = [
        'admin' => [
            'brand' => ['title' => 'One Private Course', 'sub' => 'Sistem Manajemen Bimbel', 'home' => 'admin.dashboard'],
            'cta'   => ['label' => 'Tambah Sesi Les', 'route' => 'admin.jadwal.baru'],
            'label' => null,
            'solid' => false,
            'menus' => [
                ['key' => 'dashboard',  'label' => 'Dashboard Ringkasan',  'icon' => 'grid',      'route' => 'admin.dashboard', 'live' => true],
                ['key' => 'jadwal',     'label' => 'Jadwal & Sesi Les',    'icon' => 'calendar',  'route' => 'admin.jadwal'],
                ['key' => 'siswa',      'label' => 'Database Siswa',       'icon' => 'users',     'route' => 'admin.siswa', 'badge' => $nav['students'] ?? 0],
                ['key' => 'tutor',      'label' => 'Tutor & Guru Pengajar','icon' => 'briefcase', 'route' => 'admin.tutor'],
                ['key' => 'presensi',   'label' => 'Presensi & Laporan',   'icon' => 'clipboard', 'route' => 'admin.presensi'],
                ['key' => 'pembayaran', 'label' => 'Invoicing & Honorarium','icon' => 'receipt',  'route' => 'admin.pembayaran'],
                'divider',
                ['key' => 'konfirmasi', 'label' => 'Konfirmasi Sesi',      'icon' => 'calendar-check', 'route' => 'admin.konfirmasi', 'badge' => $nav['confirm'] ?? 0, 'tone' => 'amber'],
                ['key' => 'notifikasi', 'label' => 'Notifikasi Masuk',     'icon' => 'bell',      'route' => 'admin.notifikasi', 'badge' => $nav['notif'] ?? 0, 'tone' => 'blue'],
                ['key' => 'akun',       'label' => 'Akun & Hak Akses',     'icon' => 'user-cog',  'route' => 'admin.akun'],
            ],
            'help'  => ['title' => 'Bantuan Cabang', 'sub' => 'One Private v2.4', 'icon' => 'headset', 'href' => '#'],
        ],
        'siswa' => [
            'brand' => ['title' => 'One Private', 'sub' => 'PORTAL EDUKASI', 'home' => 'siswa.beranda'],
            'cta'   => null,
            'label' => 'Menu Utama',
            'solid' => true,
            'menus' => [
                ['key' => 'beranda',  'label' => 'Beranda',            'icon' => 'grid',        'route' => 'siswa.beranda'],
                ['key' => 'jadwal',   'label' => 'Jadwal Les',         'icon' => 'calendar',    'route' => 'siswa.jadwal'],
                ['key' => 'presensi', 'label' => 'Presensi & Catatan', 'icon' => 'clipboard',   'route' => 'siswa.presensi'],
                ['key' => 'tagihan',  'label' => 'Riwayat Tagihan',    'icon' => 'receipt',     'route' => 'siswa.tagihan'],
                ['key' => 'profil',   'label' => 'Profil Siswa',       'icon' => 'user-square', 'route' => 'siswa.profil'],
            ],
            'help'  => ['title' => 'Bantuan Admin', 'sub' => 'WhatsApp Konsultasi', 'icon' => 'headset', 'href' => 'https://wa.me/'],
        ],
    ];
@endphp

<aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
    <a href="{{ url('/admin/dashboard') }}" class="brand">
        <span class="brand-logo"><svg class="i" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 10 12 5 2 10l10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></span>
        <span>
            <strong>One Private Course</strong>
            <small>Sistem Manajemen Bimbel</small>
        </span>
    </a>

    <a href="{{ url('/admin/jadwal/baru') }}" class="sb-cta">
        <svg class="i" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v8M8 12h8"/></svg>
        Tambah Sesi Les
    </a>

    <nav class="sb-nav">
        @foreach ($menus as $m)
            @if ($m === 'divider')
                <div class="sb-sep"></div>
                @continue
            @endif

            @php
                $on = request()->is($m['pola']);
                $bd = isset($m['key']) ? ($badges[$m['key']] ?? ($m['badge'] ?? null)) : null;
            @endphp

            <a href="{{ $m['url'] }}" class="sb-link {{ $on ? 'active' : '' }}" @if($on) aria-current="page" @endif>
                <svg class="i" viewBox="0 0 24 24" aria-hidden="true">{!! $m['svg'] !!}</svg>
                <span>{{ $m['label'] }}</span>

                @if (!empty($m['badge']))
                    <span class="badge {{ $m['tone'] ?? '' }}">{{ $m['badge'] }}</span>
                @elseif (!empty($m['live']) && $isActive($m))
                    <span class="live"></span>
                @endif
            </a>
        @endforeach
    </nav>

    <a href="#" class="sb-help">
        <span class="ic"><svg class="i" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 14v-2a9 9 0 0 1 18 0v2"/><path d="M21 15a2 2 0 0 1-2 2h-1v-6h1a2 2 0 0 1 2 2zM3 15a2 2 0 0 0 2 2h1v-6H5a2 2 0 0 0-2 2z"/></svg></span>
        <span>
            <b>Bantuan Cabang</b>
            <small>One Private v2.4</small>
        </span>
    </a>
</aside>