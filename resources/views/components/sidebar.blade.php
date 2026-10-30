{{--
    SIDEBAR REUSABLE
    ----------------
    Pemakaian di halaman mana pun:
        <x-sidebar role="admin" />                      → active otomatis dari route saat ini
        <x-sidebar role="siswa" active="jadwal" />      → paksa menu "jadwal" aktif

    Untuk menambah / mengubah menu cukup edit array $menus di bawah.
    Jika nama route belum ada, link otomatis jadi "#" (tidak error).
--}}
@props(['role' => 'admin', 'active' => null])

@php
    $url = fn (string $name) => \Illuminate\Support\Facades\Route::has($name) ? route($name) : '#';

    $config = [
        'admin' => [
            'brand' => ['title' => 'One Private Course', 'sub' => 'Sistem Manajemen Bimbel', 'home' => 'admin.dashboard'],
            'cta'   => ['label' => 'Tambah Sesi Les', 'route' => 'admin.jadwal.baru'],
            'label' => null,
            'solid' => false,
            'menus' => [
                ['key' => 'dashboard',  'label' => 'Dashboard Ringkasan',  'icon' => 'grid',      'route' => 'admin.dashboard', 'live' => true],
                ['key' => 'jadwal',     'label' => 'Jadwal & Sesi Les',    'icon' => 'calendar',  'route' => 'admin.jadwal'],
                ['key' => 'siswa',      'label' => 'Database Siswa',       'icon' => 'users',     'route' => 'admin.siswa.index', 'badge' => 42],
                ['key' => 'tutor',      'label' => 'Tutor & Guru Pengajar','icon' => 'briefcase', 'route' => 'admin.tutor'],
                ['key' => 'presensi',   'label' => 'Presensi & Laporan',   'icon' => 'clipboard', 'route' => 'admin.presensi'],
                ['key' => 'pembayaran', 'label' => 'Invoicing & Honorarium','icon' => 'receipt',  'route' => 'admin.pembayaran'],
                'divider',
                ['key' => 'konfirmasi', 'label' => 'Konfirmasi Sesi',      'icon' => 'calendar-check', 'route' => 'admin.konfirmasi', 'badge' => 3, 'tone' => 'amber'],
                ['key' => 'notifikasi', 'label' => 'Notifikasi Masuk',     'icon' => 'bell',      'route' => 'admin.notifikasi', 'badge' => 5, 'tone' => 'blue'],
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

    $c = $config[$role] ?? $config['admin'];

    // Tentukan menu aktif: prop `active` > cocokkan nama route saat ini
    $isActive = function (array $m) use ($active) {
        if ($active) return $active === $m['key'];
        return request()->routeIs($m['route'], $m['route'] . '.*');
    };
@endphp

<aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
    <a href="{{ $url($c['brand']['home']) }}" class="brand">
        <span class="brand-logo"><x-icon name="{{ $role === 'admin' ? 'graduation' : 'book-open' }}" /></span>
        <span>
            <strong>{{ $c['brand']['title'] }}</strong>
            <small>{{ $c['brand']['sub'] }}</small>
        </span>
    </a>

    @if ($c['cta'])
        <a href="{{ $url($c['cta']['route']) }}" class="sb-cta">
            <x-icon name="plus-circle" /> {{ $c['cta']['label'] }}
        </a>
    @endif

    @if ($c['label'])
        <div class="sb-label">{{ $c['label'] }}</div>
    @endif

    <nav class="sb-nav">
        @foreach ($c['menus'] as $m)
            @if ($m === 'divider')
                <div class="sb-sep"></div>
                @continue
            @endif

            <a href="{{ $url($m['route']) }}"
               class="sb-link {{ $c['solid'] ? 'solid' : '' }} {{ $isActive($m) ? 'active' : '' }}"
               @if($isActive($m)) aria-current="page" @endif>
                <x-icon :name="$m['icon']" />
                <span>{{ $m['label'] }}</span>

                @if (isset($m['badge']))
                    <span class="badge {{ $m['tone'] ?? '' }}">{{ $m['badge'] }}</span>
                @elseif (!empty($m['live']) && $isActive($m))
                    <span class="live"></span>
                @endif
            </a>
        @endforeach
    </nav>

    <a href="{{ $c['help']['href'] }}" class="sb-help">
        <span class="ic"><x-icon :name="$c['help']['icon']" /></span>
        <span>
            <b>{{ $c['help']['title'] }}</b>
            <small>{{ $c['help']['sub'] }}</small>
        </span>
    </a>
</aside>
