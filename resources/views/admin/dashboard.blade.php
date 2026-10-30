

@extends('portal')
@section('title', 'Dashboard Ringkasan')

@php
    /*
     * Semua data di bawah adalah DEFAULT/DUMMY agar tampilan langsung jalan.
     * Dari controller cukup kirim variabel dengan nama sama untuk menimpanya:
     *   return view('admin.dashboard', compact('namaAdmin', 'stats', 'tindakLanjut', 'sesiHariIni', ...));
     */
    $namaAdmin = $namaAdmin ?? 'Arya Pratama';
    $tanggal   = $tanggal ?? '24 Oktober 2026';

    $stats = $stats ?? [
        ['label' => 'Sesi Hari Ini',   'value' => 14, 'unit' => 'Sesi',  'icon' => 'calendar-check', 'tone' => 'blue',
         'meta' => [['c' => '#2057d6', 't' => '8 Home Visit'], ['c' => '#6d5ae6', 't' => '6 Online Zoom']]],
        ['label' => 'Siswa Aktif',     'value' => 48, 'unit' => 'Siswa', 'icon' => 'graduation', 'tone' => 'green',
         'trend' => '+4 siswa baru bulan ini'],
        ['label' => 'Tutor Bertugas',  'value' => 12, 'unit' => 'Tutor', 'icon' => 'user-square', 'tone' => 'violet',
         'ok' => 'Semua tutor telah terkonfirmasi'],
        ['label' => 'Belum Membayar',  'value' => 9,  'unit' => 'Siswa', 'icon' => 'receipt', 'tone' => 'amber',
         'warn' => 'Periode Oktober 2026'],
    ];

    $tindakLanjut = $tindakLanjut ?? [
        ['label' => 'PRESENSI KOSONG', 'waktu' => 'Kemarin', 'c' => '#e11d48', 'bg' => '#ffe9ee',
         'judul' => 'Absensi Belum Diisi',
         'isi' => '2 sesi les kemarin oleh <b>Kak Fikri S.Si</b> belum mengisi catatan materi & kehadiran.',
         'status' => 'Status: Pending Tutor', 'btn' => 'Lihat Presensi', 'route' => 'admin.presensi', 'primary' => false],
        ['label' => 'IURAN SISWA', 'waktu' => 'Bulan Berjalan', 'c' => '#6d5ae6', 'bg' => '#eeebff',
         'judul' => 'Belum Bayar',
         'isi' => '<b>9 siswa</b> belum melakukan pembayaran untuk periode les bulan Oktober 2026.',
         'status' => 'Total: 9 Siswa', 'btn' => 'Lihat Pembayaran', 'route' => 'admin.pembayaran', 'primary' => false],
        ['label' => 'JADWAL BARU', 'waktu' => '3 Request', 'c' => '#14b8a6', 'bg' => '#e0f7f4',
         'judul' => 'Konfirmasi Sesi Baru',
         'isi' => '3 permintaan jadwal sesi les baru dari orang tua siswa menunggu konfirmasi waktu & tutor.',
         'status' => 'Cabang Utama', 'btn' => 'Buka Konfirmasi', 'route' => 'admin.konfirmasi', 'primary' => true],
    ];

    $sesiHariIni = $sesiHariIni ?? [
        ['ini' => 'AP', 'warna' => 'b', 'nama' => 'Aisyah Putri',   'kelas' => 'Kelas 8 SMP • Reguler',
         'tutor' => 'Kak Rina M.Pd',   'mapel' => 'Mengaji & Tahsin',      'waktu' => '14:00 - 15:30 WIB', 'ket' => 'Durasi: 90 Menit',  'state' => '',    'metode' => 'home'],
        ['ini' => 'KP', 'warna' => 'b', 'nama' => 'Kevin Pratama',  'kelas' => 'Kelas 11 SMA • Intensif',
         'tutor' => 'Sir Danu S.Hum',  'mapel' => 'English Conversation',  'waktu' => '15:45 - 17:15 WIB', 'ket' => 'Sesi Berlangsung', 'state' => 'now', 'metode' => 'online'],
        ['ini' => 'BR', 'warna' => 'y', 'nama' => 'Bilqis & Rafa',  'kelas' => 'SD Kelas 5 & 3 • Duo',
         'tutor' => 'Kak Fikri S.Si',  'mapel' => 'Matematika & IPA',      'waktu' => '16:00 - 17:30 WIB', 'ket' => 'Mulai dlm 15 mnt', 'state' => 'soon','metode' => 'home'],
        ['ini' => 'FN', 'warna' => 'g', 'nama' => 'Farhan Nugraha', 'kelas' => 'SMA Kelas 12 • Intensif',
         'tutor' => 'Ustadz Hanif',    'mapel' => "Tahfidz Al-Qur'an",     'waktu' => '18:30 - 20:00 WIB', 'ket' => "Sesi Ba'da Maghrib",'state' => '',    'metode' => 'home'],
    ];
    $totalSesi = $totalSesi ?? 14;

    $capaian = $capaian ?? ['persen' => 78, 'target' => '240 Jam Sesi', 'selesai' => '188 Jam Terselesaikan', 'kehadiran' => 98.4, 'bulan' => 'Okt 2026'];

    $tutorDuty = $tutorDuty ?? [
        ['ini' => 'RN', 'warna' => 'b', 'nama' => 'Kak Rina M.Pd',  'info' => '2 Sesi (Home Visit)',  'status' => 'Terselesaikan', 'tone' => 'green'],
        ['ini' => 'DN', 'warna' => 'b', 'nama' => 'Sir Danu S.Hum', 'info' => '1 Sesi (Online Zoom)', 'status' => 'Di Kelas',       'tone' => 'blue'],
        ['ini' => 'FK', 'warna' => 'y', 'nama' => 'Kak Fikri S.Si', 'info' => '2 Sesi (Home Visit)',  'status' => 'Siap Berangkat', 'tone' => 'gray'],
    ];

    $url = fn ($n) => \Illuminate\Support\Facades\Route::has($n) ? route($n) : '#';
    $ringC = 2 * M_PI * 44; // keliling lingkaran r=44
@endphp

@section('topbar')
    <div class="crumb">
        <span>Operasional Cabang</span><span>›</span><b>Dashboard Ringkasan</b>
    </div>
@endsection

@section('topbar-right')
    <div class="userbox">
        <div class="who"><b>{{ $namaAdmin }}</b><small>Admin Cabang</small></div>
        <div class="avatar-c">{{ collect(explode(' ', $namaAdmin))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->join('') }}</div>
    </div>
@endsection

@section('content')
    {{-- Header --}}
    <div class="adm-head">
        <div>
            <div class="pg-title">
                <h1>Dashboard Ringkasan</h1>
                <span class="badge-live">AKTIF HARI INI</span>
            </div>
            <p class="pg-sub">Selamat datang kembali, {{ $namaAdmin }}. Pantau aktivitas belajar dan operasional les hari ini.</p>
        </div>
        <div class="head-actions">
            <button class="btn" type="button"><x-icon name="calendar" /> Hari ini, {{ $tanggal }} <x-icon name="chevron-down" /></button>
            <button class="btn" type="button" onclick="window.print()"><x-icon name="printer" /> Cetak Ringkasan</button>
            <button class="btn btn-primary" type="button"><x-icon name="download" /> Ekspor Rekap</button>
        </div>
    </div>

    {{-- Statistik --}}
    <section class="stats" aria-label="Statistik hari ini">
        @foreach ($stats as $s)
            <article class="card stat">
                <div class="row">
                    <span>{{ $s['label'] }}</span>
                    <span class="ico {{ $s['tone'] }}"><x-icon :name="$s['icon']" /></span>
                </div>
                <div class="num">{{ $s['value'] }}<small>{{ $s['unit'] }}</small></div>

                @if (!empty($s['meta']))
                    <div class="meta">
                        @foreach ($s['meta'] as $m)
                            <span><i class="dotc" style="background:{{ $m['c'] }}"></i>{{ $m['t'] }}</span>
                        @endforeach
                    </div>
                @elseif (!empty($s['trend']))
                    <div class="meta" style="color:var(--green)"><x-icon name="trend" style="width:14px;height:14px" /> {{ $s['trend'] }}</div>
                @elseif (!empty($s['ok']))
                    <div class="meta" style="color:var(--green)"><x-icon name="check" style="width:14px;height:14px" /> {{ $s['ok'] }}</div>
                @elseif (!empty($s['warn']))
                    <div class="meta" style="color:var(--amber)"><b style="margin-right:2px">!</b> {{ $s['warn'] }}</div>
                @endif
            </article>
        @endforeach
    </section>

    {{-- Perlu tindak lanjut --}}
    <div class="sec-h">
        <h2><x-icon name="check-circle" /> Perlu Tindak Lanjut</h2>
        <span class="pill-gray">{{ count($tindakLanjut) }} Perhatian Prioritas</span>
    </div>
    <section class="todo-grid">
        @foreach ($tindakLanjut as $t)
            <article class="card todo" style="--c:{{ $t['c'] }};--bgc:{{ $t['bg'] }}">
                <div class="top"><span class="lbl">{{ $t['label'] }}</span><span>{{ $t['waktu'] }}</span></div>
                <h3>{{ $t['judul'] }}</h3>
                <p>{!! $t['isi'] !!}</p>
                <div class="foot">
                    <span>{{ $t['status'] }}</span>
                    <a href="{{ $url($t['route']) }}" class="btn {{ $t['primary'] ? 'btn-primary' : '' }}">
                        {{ $t['btn'] }} <x-icon name="arrow-right" />
                    </a>
                </div>
            </article>
        @endforeach
    </section>

    {{-- Jadwal + sisi kanan --}}
    <div class="adm-grid">
        <section class="card" aria-label="Jadwal sesi hari ini">
            <div class="card-h">
                <div class="t">
                    <span class="ico blue"><x-icon name="clipboard" /></span>
                    <div><h3>Jadwal Sesi Hari Ini</h3><small>Pantauan real-time pelaksanaan kelas tatap muka & virtual</small></div>
                </div>
                <div class="seg" role="tablist" id="filterMetode">
                    <button class="on" data-f="all" role="tab">Semua ({{ $totalSesi }})</button>
                    <button data-f="home" role="tab">Home Visit</button>
                    <button data-f="online" role="tab">Online</button>
                </div>
            </div>

            <div class="tbl-wrap">
                <table class="tbl">
                    <thead>
                        <tr><th>Siswa / Peserta</th><th>Tutor & Pelajaran</th><th>Waktu Sesi</th><th>Metode</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($sesiHariIni as $r)
                            <tr data-metode="{{ $r['metode'] }}">
                                <td>
                                    <div class="cell-user">
                                        <span class="av {{ $r['warna'] }}">{{ $r['ini'] }}</span>
                                        <div><b>{{ $r['nama'] }}</b><small>{{ $r['kelas'] }}</small></div>
                                    </div>
                                </td>
                                <td><b>{{ $r['tutor'] }}</b><span class="sub">{{ $r['mapel'] }}</span></td>
                                <td>
                                    <div class="time {{ $r['state'] === 'now' ? 'now' : '' }}">
                                        <x-icon name="clock" /> {{ $r['waktu'] }}
                                    </div>
                                    <small style="{{ $r['state'] === 'now' ? 'color:var(--blue)' : ($r['state'] === 'soon' ? 'color:var(--amber)' : '') }}">{{ $r['ket'] }}</small>
                                </td>
                                <td>
                                    @if ($r['metode'] === 'online')
                                        <span class="m-chip zoom"><x-icon name="video" /> Online Zoom</span>
                                    @else
                                        <span class="m-chip"><x-icon name="map-pin" /> Home Visit</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tbl-foot">
                <span>Menampilkan <b id="shownCount">{{ count($sesiHariIni) }}</b> dari <b>{{ $totalSesi }}</b> sesi hari ini</span>
                <a href="{{ $url('admin.jadwal') }}" class="link">Lihat Seluruh {{ $totalSesi }} Sesi <x-icon name="arrow-right" /></a>
            </div>
        </section>

        <aside class="side-stack">
            {{-- Pencapaian --}}
            <section class="card ring-card">
                <div class="hd"><h3>Pencapaian Sesi Bulan Ini</h3><span class="tag blue">{{ $capaian['bulan'] }}</span></div>
                <div class="ring-wrap">
                    <div class="ring">
                        <svg viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="44" fill="none" stroke="#e6edfb" stroke-width="9"/>
                            <circle cx="50" cy="50" r="44" fill="none" stroke="#2057d6" stroke-width="9" stroke-linecap="round"
                                    stroke-dasharray="{{ round($ringC * $capaian['persen'] / 100, 1) }} {{ round($ringC, 1) }}"/>
                        </svg>
                        <div class="t"><b>{{ $capaian['persen'] }}%</b><small>SELESAI</small></div>
                    </div>
                    <div class="ring-info">
                        <small>Target Bulan Ini</small><b>{{ $capaian['target'] }}</b>
                        <small>Terlaksana</small><b class="bl">{{ $capaian['selesai'] }}</b>
                    </div>
                </div>
                <div class="kehadiran">
                    <div class="r"><span>Tingkat Kehadiran Tutor</span><b>{{ $capaian['kehadiran'] }}%</b></div>
                    <div class="bar"><i style="width:{{ $capaian['kehadiran'] }}%"></i></div>
                </div>
            </section>

            {{-- Tutor on duty --}}
            <section class="card duty">
                <div class="hd">
                    <h3><x-icon name="users" /> Tutor On-Duty Hari Ini</h3>
                    <a href="{{ $url('admin.tutor') }}" class="link" style="font-size:12px">Semua ({{ count($tutorDuty) + 9 }})</a>
                </div>
                @foreach ($tutorDuty as $d)
                    <div class="duty-row">
                        <span class="av {{ $d['warna'] }}">{{ $d['ini'] }}</span>
                        <div><b>{{ $d['nama'] }}</b><small>{{ $d['info'] }}</small></div>
                        <span class="tag {{ $d['tone'] }}">{{ $d['status'] }}</span>
                    </div>
                @endforeach
            </section>
        </aside>
    </div>

    <p class="foot-copy">© {{ date('Y') }} One Private Course. Sistem Manajemen Bimbel & Les Privat.</p>
@endsection

@push('scripts')
<script>
    // Filter tabel jadwal berdasarkan metode (Semua / Home Visit / Online)
    (function () {
        const tabs = document.querySelectorAll('#filterMetode button');
        const rows = document.querySelectorAll('.tbl tbody tr');
        const out  = document.getElementById('shownCount');
        tabs.forEach(t => t.addEventListener('click', () => {
            tabs.forEach(x => x.classList.toggle('on', x === t));
            let n = 0;
            rows.forEach(r => {
                const show = t.dataset.f === 'all' || r.dataset.metode === t.dataset.f;
                r.style.display = show ? '' : 'none';
                if (show) n++;
            });
            out.textContent = n;
        }));
    })();
</script>
@endpush
