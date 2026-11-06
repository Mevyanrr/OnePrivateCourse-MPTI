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

    $menus = [
        ['pola' => 'admin/dashboard*',  'url' => url('/admin/dashboard'),  'label' => 'Dashboard Ringkasan',   'live' => true,
         'svg' => '<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>'],
        ['pola' => 'admin/jadwal*',     'url' => url('/admin/jadwal'),     'label' => 'Jadwal & Sesi Les',
         'svg' => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>'],
        ['pola' => 'admin/siswa*',      'url' => url('/admin/siswa'),      'label' => 'Database Siswa', 'key' => 'siswa', 'badge' => 42,
         'svg' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>'],
        ['pola' => 'admin/tutor*',      'url' => url('/admin/tutor'),      'label' => 'Tutor & Guru Pengajar',
         'svg' => '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>'],
        ['pola' => 'admin/presensi*',   'url' => url('/admin/presensi'),   'label' => 'Presensi & Laporan',
         'svg' => '<rect x="8" y="2" width="8" height="4" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2M9 12h6M9 16h6"/>'],
        ['pola' => 'admin/pembayaran*', 'url' => url('/admin/pembayaran'), 'label' => 'Invoicing & Honorarium',
         'svg' => '<path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1z"/><path d="M8 8h8M8 12h8M8 16h5"/>'],
        'divider',
        ['pola' => 'admin/konfirmasi*', 'url' => url('/admin/konfirmasi'), 'label' => 'Konfirmasi Sesi', 'key' => 'konfirmasi', 'badge' => 3, 'tone' => 'amber',
         'svg' => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18M9 16l2 2 4-4"/>'],
        ['pola' => 'admin/notifikasi*', 'url' => $notifUrl,                'label' => 'Notifikasi Masuk', 'key' => 'notifikasi', 'badge' => 5, 'tone' => 'blue',
         'svg' => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>'],
        ['pola' => 'admin/akun*',       'url' => url('/admin/akun'),       'label' => 'Akun & Hak Akses',
         'svg' => '<circle cx="9" cy="7" r="4"/><path d="M3 21v-2a4 4 0 0 1 4-4h3"/><circle cx="18" cy="17" r="2.5"/><path d="M18 12.5v2M18 19.5v2M14.1 14.8l1.7 1M20.2 18.2l1.7 1M14.1 19.2l1.7-1M20.2 15.8l1.7-1"/>'],
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

                @if ($bd !== null)
                    <span class="badge {{ $m['tone'] ?? '' }}">{{ $bd }}</span>
                @elseif (!empty($m['live']) && $on)
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