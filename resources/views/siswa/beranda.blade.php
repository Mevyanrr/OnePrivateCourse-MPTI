@extends('layouts.portal', ['role' => 'siswa', 'active' => 'beranda'])

@section('title', 'Beranda')

@php
    /*
     * Data DEFAULT/DUMMY. Timpa dari controller dengan variabel bernama sama.
     */
    $wali = $wali ?? ['nama' => 'Ibu Nabila', 'peran' => 'Wali Murid • Tebet'];

    $anak = $anak ?? [
        ['nama' => 'Aisyah Putri',   'info' => 'Kelas 8 SMP • Reguler',  'emoji' => '⭐', 'aktif' => true],
        ['nama' => 'Farhan Nugraha', 'info' => 'Kelas 12 SMA • UTBK',    'emoji' => '😎', 'aktif' => false],
    ];
    $aktif = collect($anak)->firstWhere('aktif', true) ?? $anak[0];

    $perluTindakan = $perluTindakan ?? [
        'judul'  => '1 Jadwal Sesi Menunggu Konfirmasi Anda',
        'detail' => 'Sesi Les Privat: <b>Rabu, 22 Okt 2026 (16:00 – 17:30 WIB)</b> • Bersama <b>Kak Rina, M.Pd</b> (Tahsin & PAI Terpadu – Home Visit).',
    ];

    $sesi = $sesi ?? [
        'kurikulum' => 'KURIKULUM MANDIRI & PEMBINAAN KARAKTER QUR\'ANI',
        'judul'     => 'Tahsin & PAI Terpadu',
        'fokus'     => 'Makhraj Huruf Halqiyah & QS. Al-Mulk ayat 1–10.',
        'target'    => 'Target evaluasi kelancaran makharijul huruf dan tajwid mad thabi\'i dengan metode talaqqi.',
        'waktu'     => '16:00 – 17:30 WIB',
        'tutor'     => ['nama' => 'Kak Rina, M.Pd', 'rating' => 4.9, 'peran' => 'Tutor Utama Tahsin', 'lokasi' => 'Home Visit (Tebet Barat)', 'foto' => null],
    ];

    $riwayat = $riwayat ?? [
        ['ikon' => 'book-open', 'tone' => 'tl',     'judul' => 'Tajwid Makhorijul Huruf & QS. Al-Mulk',            'status' => 'ok',   'statusLabel' => 'Hadir Tuntas',
         'tutor' => 'Kak Rina, M.Pd',  'tgl' => 'Selasa, 21 Okt 2026', 'extra' => ['t' => 'Hafalan Sangat Lancar', 'star' => true],
         'catatan' => 'Catatan Tutor: "Makhraj huruf Halqiyah sudah mantap…"', 'aksi' => 'Lihat Jurnal & Nilai', 'filter' => 'tuntas'],
        ['ikon' => 'calc',      'tone' => 'violet', 'judul' => 'Matematika: Sistem Persamaan Linear Tiga Variabel', 'status' => 'ok',   'statusLabel' => 'Hadir Tuntas',
         'tutor' => 'Sir Danu, S.Pd',  'tgl' => 'Sabtu, 18 Okt 2026',  'extra' => ['t' => 'Skor Latihan: 92 / 100', 'star' => false],
         'catatan' => 'Catatan Tutor: "Metode substitusi & eliminasi campuran…"', 'aksi' => 'Lihat Jurnal & Nilai', 'filter' => 'tuntas'],
        ['ikon' => 'languages', 'tone' => 'amber',  'judul' => 'Bahasa Inggris: Daily Conversation & Phrasal Verbs', 'status' => 'warn', 'statusLabel' => 'Izin Sakit (Terkonfirmasi)',
         'tutor' => 'Ms. Sarah',       'tgl' => 'Rabu, 15 Okt 2026',   'extra' => ['t' => 'Jadwal Pengganti: Sabtu, 25 Okt (10:00 WIB)', 'star' => false], 'noVisit' => true,
         'catatan' => 'Status: Reschedule telah disepakati oleh orang tua dan…', 'aksi' => 'Detail Jadwal', 'filter' => 'evaluasi', 'aksiGray' => true],
        ['ikon' => 'flask',     'tone' => 'violet', 'judul' => 'IPA Fisika: Gerak Lurus Beraturan (GLB) & GLBB',     'status' => 'ok',   'statusLabel' => 'Hadir Tuntas',
         'tutor' => 'Kak Fikri, S.Si', 'tgl' => 'Senin, 13 Okt 2026',  'extra' => ['t' => 'Tugas Mandiri Selesai (A)', 'star' => false],
         'catatan' => 'Catatan Tutor: "Pemahaman grafik v-t sudah sangat baik."', 'aksi' => 'Lihat Jurnal & Nilai', 'filter' => 'tuntas'],
    ];
    $totalPertemuan = $totalPertemuan ?? 12;

    $mingguIni = $mingguIni ?? ['sesi' => 3, 'selesai' => 1, 'terjadwal' => 2];
    $presensi  = $presensi  ?? ['bulan' => 'Oktober 2026', 'persen' => 95, 'label' => 'Sangat Baik', 'hadir' => 7, 'total' => 8];
    $tagihan   = $tagihan   ?? ['status' => 'LUNAS', 'jumlah' => 'Rp 650.000', 'paket' => 'Paket 8 Pertemuan Reguler SMP', 'jatuhTempo' => '05 Nov 2026'];
    $paket     = $paket     ?? ['nama' => 'Paket Bulanan 8 Sesi', 'sisa' => 1, 'pakai' => 7, 'total' => 8,
                                'info' => 'Telah digunakan 7 sesi dalam siklus Oktober. Kuota baru diperbarui otomatis tanggal 1 setiap bulan.'];
    $tutorPendamping = $tutorPendamping ?? [
        ['nama' => 'Kak Rina, M.Pd',  'mapel' => 'Tahsin & PAI (Home Visit)',       'foto' => null],
        ['nama' => 'Sir Danu, S.Pd',  'mapel' => 'Matematika & Sains (Home Visit)', 'foto' => null],
    ];
    $cabang = $cabang ?? ['nama' => 'Cabang Tebet & Jakarta Selatan', 'cs' => 'Kak Arya Pratama', 'cs_peran' => 'Customer Care & Penjadwalan', 'jam' => 'Senin – Sabtu • 08.00 – 20.00 WIB'];

    $url = fn ($n) => \Illuminate\Support\Facades\Route::has($n) ? route($n) : '#';
    $inisial = fn ($n) => collect(preg_split('/[\s,]+/', $n))->filter()->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->join('');
    $toneMap = ['tl' => 'ico tl', 'violet' => 'ico violet', 'amber' => 'ico amber'];
@endphp

@section('topbar')
    <div class="crumb">
        <span>Portal Orang Tua & Siswa</span><i class="dot"></i>
        <button class="profile-pill" type="button">
            <x-icon name="graduation" style="width:16px;height:16px;color:var(--blue)" />
            <span>Profil Aktif: <b>{{ $aktif['nama'] }}</b> ({{ \Illuminate\Support\Str::before($aktif['info'], ' •') }})</span>
            <x-icon name="chevron-down" style="width:14px;height:14px" />
        </button>
    </div>
@endsection

@section('topbar-right')
    <div class="userbox">
        <span class="bell" aria-label="Notifikasi"><x-icon name="bell" /></span>
        <span class="vsep"></span>
        <div class="who"><b>{{ $wali['nama'] }}</b><small>{{ $wali['peran'] }}</small></div>
        <div class="avatar-c solid"><x-icon name="user" style="width:18px;height:18px" /></div>
    </div>
@endsection

@section('content')
    {{-- Header + pemilih anak --}}
    <div class="sw-head">
        <div>
            <h1>Selamat Datang, {{ $wali['nama'] }} 👋</h1>
            <p class="pg-sub">Pantau perkembangan belajar, kehadiran, dan jadwal les privat putra-putri Anda secara real-time.</p>
        </div>
        <div class="child-switch">
            <div class="child-row">
                @foreach ($anak as $a)
                    <button type="button" class="child {{ $a['aktif'] ? 'on' : '' }}">
                        <span class="em">{{ $a['emoji'] }}</span>
                        <span><b>{{ $a['nama'] }}</b><small>{{ $a['info'] }}</small></span>
                        @if ($a['aktif'])<i class="st"></i>@endif
                    </button>
                @endforeach
            </div>
            <a href="#" class="link add-child"><x-icon name="plus-circle" /> Tambah Anak</a>
        </div>
    </div>

    {{-- Banner tindakan --}}
    @if ($perluTindakan)
        <section class="alert" role="alert">
            <span class="ico"><x-icon name="calendar-check" /></span>
            <div class="txt">
                <span class="tg">● TINDAKAN DIPERLUKAN</span><br>
                <b>{{ $perluTindakan['judul'] }}</b><br>
                {!! $perluTindakan['detail'] !!}
            </div>
            <div class="acts">
                <a href="{{ $url('siswa.jadwal') }}" class="btn btn-primary"><x-icon name="check-circle" /> Konfirmasi Jadwal</a>
                <a href="{{ $url('siswa.jadwal') }}" class="btn"><x-icon name="refresh" /> Ajukan Reschedule</a>
                <a href="https://wa.me/" class="btn btn-green"><x-icon name="message" /> Chat Tutor</a>
            </div>
        </section>
    @endif

    <div class="sw-grid">
        {{-- ============ Kolom utama ============ --}}
        <div>
            {{-- Hero sesi berlangsung --}}
            <section class="hero" aria-label="Sesi sedang berlangsung">
                <div class="row1">
                    <span class="live"><i></i> SESI SEDANG BERLANGSUNG • HARI INI</span>
                    <span class="clock"><x-icon name="clock" /> {{ $sesi['waktu'] }}</span>
                </div>
                <div class="kur"><x-icon name="book-open" /> {{ $sesi['kurikulum'] }}</div>
                <h2>{{ $sesi['judul'] }}</h2>
                <p class="fok">Fokus Pembelajaran: <b>{{ $sesi['fokus'] }}</b> {{ $sesi['target'] }}</p>

                <div class="tutor-box">
                    <span class="ph">
                        @if ($sesi['tutor']['foto'])<img src="{{ $sesi['tutor']['foto'] }}" alt="{{ $sesi['tutor']['nama'] }}">
                        @else{{ $inisial($sesi['tutor']['nama']) }}@endif
                    </span>
                    <div class="nm">
                        <b>{{ $sesi['tutor']['nama'] }}</b>
                        <span class="rate"><x-icon name="star" fill style="width:11px;height:11px;color:#fbbf24;vertical-align:-1px" /> {{ $sesi['tutor']['rating'] }}</span>
                        <small>{{ $sesi['tutor']['peran'] }}</small>
                    </div>
                    <span class="loc"><x-icon name="map-pin" style="width:15px;height:15px" /> {{ $sesi['tutor']['lokasi'] }}</span>
                    <span class="ver"><x-icon name="shield-check" /> <span>Tutor Terverifikasi<br>BSNP</span></span>
                </div>

                <div class="acts">
                    <a href="{{ $url('siswa.presensi') }}" class="btn"><x-icon name="clipboard" /> Isi Presensi & Catatan Belajar</a>
                    <a href="https://wa.me/" class="btn wa"><x-icon name="message" /> Chat WhatsApp Tutor</a>
                    <a href="#" class="plain"><x-icon name="book-open" style="width:16px;height:16px" /> Lihat Silabus</a>
                </div>
            </section>

            {{-- Riwayat --}}
            <div class="hist-h">
                <div>
                    <h2>Riwayat & Catatan Belajar Terkini</h2><span class="cnt">{{ $totalPertemuan }} Pertemuan</span>
                    <p>Jurnal evaluasi akademik, keaktifan, dan absensi {{ $aktif['nama'] }}</p>
                </div>
                <div class="seg" id="filterRiwayat">
                    <button type="button" class="on" data-f="all">Semua<br>Sesi</button>
                    <button type="button" data-f="tuntas">Tuntas<br>({{ collect($riwayat)->where('filter', 'tuntas')->count() + 7 }})</button>
                    <button type="button" data-f="evaluasi">Perlu<br>Evaluasi ({{ collect($riwayat)->where('filter', 'evaluasi')->count() + 1 }})</button>
                </div>
            </div>

            <div class="hist">
                @foreach ($riwayat as $r)
                    <article class="card h-item" data-filter="{{ $r['filter'] }}">
                        <span class="ic {{ $toneMap[$r['tone']] ?? 'ico blue' }}"><x-icon :name="$r['ikon']" /></span>
                        <div class="body">
                            <h3>{{ $r['judul'] }}</h3>
                            <div class="tags">
                                <span class="chip {{ $r['status'] }}">{{ $r['statusLabel'] }}</span>
                                @empty($r['noVisit'])<span class="chip vis">Home Visit</span>@endempty
                            </div>
                            <div class="meta">
                                <span>{{ $r['tutor'] }}</span><i class="sep"></i>
                                <span>{{ $r['tgl'] }}</span><i class="sep"></i>
                                <span class="hl {{ $r['extra']['star'] ? 'star' : '' }}">
                                    @if ($r['extra']['star'])<x-icon name="star" fill style="width:12px;height:12px;vertical-align:-1px" />@endif
                                    {{ $r['extra']['t'] }}
                                </span>
                            </div>
                            <p class="note">{{ $r['catatan'] }}</p>
                        </div>
                        <a href="{{ $url('siswa.presensi') }}" class="btn act {{ !empty($r['aksiGray']) ? 'btn-gray' : 'btn-soft' }}">
                            {{ $r['aksi'] }}
                            <x-icon name="{{ !empty($r['aksiGray']) ? 'chevron-down' : 'arrow-right' }}" style="{{ !empty($r['aksiGray']) ? 'transform:rotate(-90deg)' : '' }}" />
                        </a>
                    </article>
                @endforeach
            </div>

            <div class="more">
                <a href="{{ $url('siswa.presensi') }}" class="link">Lihat Semua Catatan Pembelajaran (Total {{ $totalPertemuan }} Pertemuan) <x-icon name="arrow-right" /></a>
            </div>
        </div>

        {{-- ============ Kolom kanan ============ --}}
        <aside class="side-col">
            <section class="card mini">
                <div class="row"><span>Jadwal Minggu Ini</span><span class="ico blue" style="width:34px;height:34px;border-radius:10px;display:grid;place-items:center"><x-icon name="columns" /></span></div>
                <div class="big">{{ $mingguIni['sesi'] }} Sesi <small>/ 7 Hari</small></div>
                <div class="legend"><span class="g">{{ $mingguIni['selesai'] }} Selesai</span><span>{{ $mingguIni['terjadwal'] }} Terjadwal</span></div>
            </section>

            <section class="card mini">
                <div class="row"><span>Presensi {{ $presensi['bulan'] }}</span><span class="ico green" style="width:34px;height:34px;border-radius:10px;display:grid;place-items:center"><x-icon name="user-check" /></span></div>
                <div class="big">{{ $presensi['persen'] }}% <small class="ok">{{ $presensi['label'] }}</small></div>
                <span class="tot" style="margin-top:-24px">{{ $presensi['hadir'] }} dari {{ $presensi['total'] }} Sesi</span>
                <div class="bar"><i style="width:{{ $presensi['persen'] }}%"></i></div>
            </section>

            <section class="card mini">
                <div class="row"><span>Status Tagihan Periode Ini</span><span class="tag-lunas"><x-icon name="check-circle" style="width:13px;height:13px" /> {{ $tagihan['status'] }}</span></div>
                <div class="amt">{{ $tagihan['jumlah'] }}</div>
                <small style="color:var(--ink-2)">{{ $tagihan['paket'] }}</small>
                <div class="due"><span>Jatuh tempo: {{ $tagihan['jatuhTempo'] }}</span><a href="{{ $url('siswa.tagihan') }}" class="wa-btn" aria-label="Lihat tagihan"><x-icon name="message" /></a></div>
            </section>

            <section class="card pkt">
                <div class="hd"><h3>Paket & Tutor Pendamping</h3><x-icon name="graduation" /></div>
                <div class="pkt-box">
                    <div class="r1"><b>{{ $paket['nama'] }}</b><span class="sisa">Sisa {{ $paket['sisa'] }} Sesi</span></div>
                    <p>{{ $paket['info'] }}</p>
                    <div class="u"><span>Penggunaan Kuota</span><b>{{ $paket['pakai'] }} / {{ $paket['total'] }} Sesi ({{ round($paket['pakai'] / $paket['total'] * 100, 1) }}%)</b></div>
                    <div class="bar"><i style="width:{{ $paket['pakai'] / $paket['total'] * 100 }}%"></i></div>
                </div>

                <div class="sm">Tutor Pendamping {{ \Illuminate\Support\Str::before($aktif['nama'], ' ') }}</div>
                @foreach ($tutorPendamping as $tp)
                    <div class="pt">
                        <span class="ph">@if ($tp['foto'])<img src="{{ $tp['foto'] }}" alt="">@else{{ $inisial($tp['nama']) }}@endif</span>
                        <div><b>{{ $tp['nama'] }}</b><small>{{ $tp['mapel'] }}</small></div>
                        <a href="https://wa.me/" class="wa-btn" aria-label="Chat {{ $tp['nama'] }}"><x-icon name="message" /></a>
                    </div>
                @endforeach

                <a href="#" class="req"><x-icon name="request" /> Request Tambah Sesi / Tutor Baru</a>
            </section>

            <section class="help">
                <div class="hd">
                    <span class="ic"><x-icon name="headset" /></span>
                    <div><b>Layanan Bantuan Cabang</b><small>{{ $cabang['nama'] }}</small></div>
                </div>
                <p>Perlu penyesuaian jadwal mendadak, pergantian silabus, atau konsultasi akademik? Tim Academic Advisor kami siap membantu.</p>
                <a href="https://wa.me/" class="cs">
                    <span class="ic"><x-icon name="headset" /></span>
                    <span><b>{{ $cabang['cs'] }}</b><small>{{ $cabang['cs_peran'] }}</small></span>
                    <x-icon name="arrow-up-right" />
                </a>
                <div class="jam"><span>{{ $cabang['jam'] }}</span><b>● Online</b></div>
            </section>
        </aside>
    </div>
@endsection

@push('scripts')
<script>
    // Filter riwayat: Semua / Tuntas / Perlu Evaluasi
    (function () {
        const tabs  = document.querySelectorAll('#filterRiwayat button');
        const items = document.querySelectorAll('.h-item');
        tabs.forEach(t => t.addEventListener('click', () => {
            tabs.forEach(x => x.classList.toggle('on', x === t));
            items.forEach(i => i.style.display =
                (t.dataset.f === 'all' || i.dataset.filter === t.dataset.f) ? '' : 'none');
        }));
    })();
</script>
@endpush
