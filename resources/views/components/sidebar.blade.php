
{{-- sidebar untuk halaman admin dan siswa --}}

@props([])

@php
    // menentukan role berdasarkan url
    $role = request()->is('admin*') ? 'admin' : 'siswa';

    // konfigurasi sidebar admin dan siswa
    $config = [
        'admin' => [
            'brand' => [
                'title' => 'One Private Course',
                'sub' => 'Sistem Manajemen Bimbel',
                'home' => 'admin.dashboard',
            ],
            'cta' => [
                'label' => 'Tambah Sesi Les',
                'route' => 'admin.jadwal.baru',
            ],
            'menus' => [
                ['key' => 'dashboard', 'label' => 'Dashboard Ringkasan', 'icon' => 'grid', 'route' => 'admin.dashboard', 'live' => true],
                ['key' => 'jadwal', 'label' => 'Jadwal & Sesi Les', 'icon' => 'calendar', 'route' => 'admin.jadwal'],
                ['key' => 'siswa', 'label' => 'Database Siswa', 'icon' => 'users', 'route' => 'admin.siswa'],
                ['key' => 'tutor', 'label' => 'Tutor & Guru Pengajar', 'icon' => 'briefcase', 'route' => 'admin.tutor'],
                ['key' => 'presensi', 'label' => 'Presensi & Laporan', 'icon' => 'clipboard', 'route' => 'admin.presensi'],
                ['key' => 'pembayaran', 'label' => 'Invoicing & Honorarium', 'icon' => 'receipt', 'route' => 'admin.pembayaran'],
                'divider',
                ['key' => 'konfirmasi', 'label' => 'Konfirmasi Sesi', 'icon' => 'calendar-check', 'route' => 'admin.konfirmasi'],
                ['key' => 'akun', 'label' => 'Akun & Hak Akses', 'icon' => 'user-cog', 'route' => 'admin.akun'],
            ],
            'help' => [
                'title' => 'Bantuan Cabang',
                'sub' => 'One Private v2.4',
                'href' => '#',
            ],
        ],

        'siswa' => [
            'brand' => [
                'title' => 'One Private',
                'sub' => 'PORTAL EDUKASI',
                'home' => 'siswa.beranda',
            ],
            'cta' => null,
            'menus' => [
                ['key' => 'beranda', 'label' => 'Beranda', 'icon' => 'grid', 'route' => 'siswa.beranda'],
                ['key' => 'jadwal', 'label' => 'Jadwal Les', 'icon' => 'calendar', 'route' => 'siswa.jadwal'],
                ['key' => 'presensi', 'label' => 'Presensi & Catatan', 'icon' => 'clipboard', 'route' => 'siswa.presensi'],
                ['key' => 'tagihan', 'label' => 'Riwayat Tagihan', 'icon' => 'receipt', 'route' => 'siswa.tagihan'],
                ['key' => 'profil', 'label' => 'Profil Siswa', 'icon' => 'user-square', 'route' => 'siswa.profil'],
            ],
            'help' => [
                'title' => 'Bantuan Admin',
                'sub' => 'WhatsApp Konsultasi',
                'href' => 'https://wa.me/',
            ],
        ],
    ];

    // mengambil konfigurasi sesuai role
    $sidebar = $config[$role];
    $menus = $sidebar['menus'];

    // membuat url dan menentukan menu aktif
    foreach ($menus as $index => $menu) {
        if ($menu === 'divider') {
            continue;
        }

        $menus[$index]['url'] = \Illuminate\Support\Facades\Route::has($menu['route'])
            ? route($menu['route'])
            : '#';

        $menus[$index]['active'] = request()->routeIs($menu['route'])
            || request()->routeIs($menu['route'] . '.*');
    }

    // membuat url halaman utama
    $homeUrl = \Illuminate\Support\Facades\Route::has($sidebar['brand']['home'])
        ? route($sidebar['brand']['home'])
        : '#';

    // membuat url tombol tambah sesi
    $ctaUrl = $sidebar['cta'] &&
        \Illuminate\Support\Facades\Route::has($sidebar['cta']['route'])
        ? route($sidebar['cta']['route'])
        : '#';
@endphp

<aside class="sidebar" id="sidebar" aria-label="Navigasi utama">

    {{-- brand sidebar --}}
    <a href="{{ $homeUrl }}" class="brand">
        <span class="brand-logo">
            <svg class="i" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M22 10 12 5 2 10l10 5z"/>
                <path d="M6 12v5c3 3 9 3 12 0v-5"/>
            </svg>
        </span>

        <span>
            <strong>{{ $sidebar['brand']['title'] }}</strong>
            <small>{{ $sidebar['brand']['sub'] }}</small>
        </span>
    </a>

    {{-- tombol tambah sesi khusus admin --}}
    @if ($sidebar['cta'])
        <a href="{{ $ctaUrl }}" class="sb-cta">
            <svg class="i" viewBox="0 0 24 24" aria-hidden="true">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 8v8M8 12h8"/>
            </svg>
            {{ $sidebar['cta']['label'] }}
        </a>
    @endif

    {{-- daftar navigasi --}}
    <nav class="sb-nav">
        @foreach ($menus as $m)

            {{-- pemisah menu --}}
            @if ($m === 'divider')
                <div class="sb-sep"></div>
                @continue
            @endif

            @php
                $on = $m['active'];
            @endphp

            {{-- link menu --}}
            <a href="{{ $m['url'] }}"
               class="sb-link {{ $on ? 'active' : '' }}"
               @if ($on) aria-current="page" @endif>

                <x-icon :name="$m['icon']" />

                <span>{{ $m['label'] }}</span>

                {{-- indikator dashboard aktif --}}
                @if (!empty($m['live']) && $on)
                    <span class="live"></span>
                @endif

            </a>
        @endforeach
    </nav>

    {{-- bantuan sidebar --}}
    <a href="{{ $sidebar['help']['href'] }}" class="sb-help">
        <span class="ic">
            <svg class="i" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M3 14v-2a9 9 0 0 1 18 0v2"/>
                <path d="M21 15a2 2 0 0 1-2 2h-1v-6h1a2 2 0 0 1 2 2zM3 15a2 2 0 0 0 2 2h1v-6H5a2 2 0 0 0-2 2z"/>
            </svg>
        </span>

        <span>
            <b>{{ $sidebar['help']['title'] }}</b>
            <small>{{ $sidebar['help']['sub'] }}</small>
        </span>
    </a>

</aside>
