@extends('portal')
@section('title', 'Dashboard Ringkasan')

{{--
    Seluruh data berasal dari App\Http\Controllers\Admin\DashboardController (database Supabase).
    Tidak ada data dummy di file ini; variabel yang kurang akan memunculkan error (bukan angka palsu).
    Tanggal yang ditampilkan dikontrol lewat query string  ?tanggal=YYYY-MM-DD  (kosong = hari ini).
--}}

@php
    $url   = fn ($n) => \Illuminate\Support\Facades\Route::has($n) ? route($n) : '#';
    $ringC = 2 * M_PI * 44; // keliling lingkaran r=44
    $initials = \App\Support\Fmt::initials($namaAdmin);
@endphp

@push('styles')
<style>
    /* ===== Penanda status tanggal ===== */
    .badge-live.past{border-color:#cdd5e6;color:var(--ink-2);background:#f3f5fa}
    .badge-live.future{border-color:#b7c9f5;color:var(--blue);background:var(--blue-50)}

    /* ===== Kartu statistik ===== */
    .stat .meta{flex-wrap:wrap;gap:2px 18px}
    .stat .meta.muted{color:var(--muted)}

    /* ===== Tabel jadwal ===== */
    .tbl-wrap{max-height:470px;overflow:auto}
    .tbl thead th{position:sticky;top:0;z-index:1}
    .time.done{color:var(--muted)}
    .m-chip.studio{background:#e0f7f4;color:#0f8f81;border:1px solid #b9ebe5}
    .tbl tr.empty td{text-align:center;color:var(--muted);padding:38px 20px}

    /* ===== Pemilih tanggal ===== */
    .datepick{position:relative}
    .datepick > .btn[aria-expanded="true"]{border-color:var(--blue);color:var(--blue)}
    .dp-panel{position:absolute;right:0;top:calc(100% + 8px);z-index:60;width:316px;max-width:calc(100vw - 32px);
        background:#fff;border:1px solid var(--line);border-radius:14px;padding:14px;
        box-shadow:0 14px 36px rgba(22,33,58,.16)}
    .dp-panel[hidden]{display:none}
    .dp-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px}
    .dp-head b{font-size:14px}
    .dp-nav{width:32px;height:32px;border-radius:8px;display:grid;place-items:center;color:var(--ink-2);border:1px solid var(--line)}
    .dp-nav:hover{background:var(--blue-50);color:var(--blue)}
    .dp-nav svg.i{width:16px;height:16px}
    .dp-week,.dp-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:2px;text-align:center}
    .dp-week span{font-size:11px;font-weight:600;color:var(--muted);padding:6px 0}
    .dp-day{position:relative;height:36px;border-radius:9px;font-size:13px;font-weight:500;color:var(--ink)}
    .dp-day:hover{background:var(--blue-50)}
    .dp-day.out{color:#b3bbcd}
    .dp-day.today{box-shadow:inset 0 0 0 1.5px var(--blue);color:var(--blue);font-weight:700}
    .dp-day.sel{background:var(--blue);color:#fff;font-weight:700;box-shadow:none}
    .dp-day.has::after{content:"";position:absolute;left:50%;bottom:4px;width:4px;height:4px;margin-left:-2px;border-radius:50%;background:var(--blue)}
    .dp-day.sel.has::after{background:#fff}
    .dp-foot{display:flex;gap:8px;margin-top:12px;padding-top:12px;border-top:1px solid var(--line)}
    .dp-foot button{flex:1;padding:8px 0;border-radius:9px;font-size:12.5px;font-weight:600;background:var(--bg);color:var(--ink-2);border:1px solid var(--line)}
    .dp-foot button:hover{background:var(--blue-50);color:var(--blue);border-color:var(--blue-100)}
    .dp-legend{margin-top:10px;font-size:11.5px;color:var(--muted);display:flex;align-items:center;gap:6px}
    .dp-legend i{width:5px;height:5px;border-radius:50%;background:var(--blue);display:inline-block}
</style>
@endpush

@section('topbar')
    <div class="crumb">
        <span>Operasional Cabang</span><span>›</span><b>Dashboard Ringkasan</b>
    </div>
@endsection

@section('topbar-right')
    <div class="userbox">
        <div class="who"><b>{{ $namaAdmin }}</b><small>{{ $roleLabel }}</small></div>
        <div class="avatar-c">{{ $initials }}</div>
    </div>
@endsection

@section('content')
    {{-- Header --}}
    <div class="adm-head">
        <div>
            <div class="pg-title">
                <h1>Dashboard Ringkasan</h1>
                <span class="badge-live {{ $dateInfo['badgeClass'] }}">{{ $dateInfo['badge'] }}</span>
            </div>
            <p class="pg-sub">Selamat datang kembali, {{ $namaAdmin }}. Pantau aktivitas belajar dan operasional les {{ $dateInfo['sub'] }}.</p>
        </div>
        <div class="head-actions">
            {{-- Pemilih tanggal --}}
            <div class="datepick" id="datePick"
                 data-selected="{{ $dateInfo['iso'] }}"
                 data-today="{{ $dateInfo['today'] }}"
                 data-base="{{ route('admin.dashboard') }}"
                 data-counts="{{ json_encode($sessionDays) }}">
                <button class="btn" type="button" id="dateBtn" aria-haspopup="dialog" aria-expanded="false" aria-controls="datePanel">
                    <x-icon name="calendar" /> <span>{{ $dateInfo['button'] }}</span> <x-icon name="chevron-down" />
                </button>
                <div class="dp-panel" id="datePanel" role="dialog" aria-label="Pilih tanggal" hidden>
                    <div class="dp-head">
                        <button type="button" class="dp-nav" id="dpPrev" aria-label="Bulan sebelumnya"><x-icon name="chevron-left" /></button>
                        <b id="dpTitle" aria-live="polite"></b>
                        <button type="button" class="dp-nav" id="dpNext" aria-label="Bulan berikutnya"><x-icon name="chevron-right" /></button>
                    </div>
                    <div class="dp-week"><span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span></div>
                    <div class="dp-grid" id="dpGrid"></div>
                    <div class="dp-legend"><i></i> Ada sesi terjadwal</div>
                    <div class="dp-foot">
                        <button type="button" data-offset="-1">Kemarin</button>
                        <button type="button" data-offset="0">Hari Ini</button>
                        <button type="button" data-offset="1">Besok</button>
                    </div>
                </div>
            </div>

            <button class="btn" type="button" onclick="window.print()"><x-icon name="printer" /> Cetak Ringkasan</button>
            <a class="btn btn-primary" href="{{ route('admin.export', 'jadwal') }}"><x-icon name="download" /> Ekspor Rekap</a>
        </div>
    </div>

    {{-- Statistik --}}
    <section class="stats" aria-label="Statistik">
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
                @elseif (!empty($s['note']))
                    <div class="meta muted">{{ $s['note'] }}</div>
                @endif
            </article>
        @endforeach
    </section>

    {{-- Perlu tindak lanjut --}}
    <div class="sec-h">
        <h2><x-icon name="check-circle" /> Perlu Tindak Lanjut</h2>
        <span class="pill-gray">{{ $prioritas > 0 ? $prioritas . ' Perhatian Prioritas' : 'Tidak ada yang mendesak' }}</span>
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
        <section class="card" aria-label="Jadwal sesi">
            <div class="card-h">
                <div class="t">
                    <span class="ico blue" style="display:grid;place-items:center"><x-icon name="clipboard" /></span>
                    <div>
                        <h3>Jadwal Sesi {{ $dateInfo['scopeLong'] }}</h3>
                        <small>{{ $dateInfo['isToday'] ? 'Pantauan real-time pelaksanaan kelas tatap muka & virtual' : 'Pelaksanaan kelas tatap muka & virtual pada tanggal terpilih' }}</small>
                    </div>
                </div>
                <div class="seg" role="tablist" id="filterMetode">
                    <button class="on" data-f="all" role="tab">Semua ({{ $totalSesi }})</button>
                    <button data-f="home" role="tab">Home Visit</button>
                    <button data-f="online" role="tab">Online</button>
                    @if ($adaStudio)
                        <button data-f="studio" role="tab">Studio</button>
                    @endif
                </div>
            </div>

            <div class="tbl-wrap">
                <table class="tbl">
                    <thead>
                        <tr><th>Siswa / Peserta</th><th>Tutor & Pelajaran</th><th>Waktu Sesi</th><th>Metode</th></tr>
                    </thead>
                    <tbody>
                        @forelse ($sesiHariIni as $r)
                            <tr data-metode="{{ $r['metode'] }}">
                                <td>
                                    <div class="cell-user">
                                        <span class="av {{ $r['warna'] }}">{{ $r['ini'] }}</span>
                                        <div><b>{{ $r['nama'] }}</b><small>{{ $r['kelas'] }}</small></div>
                                    </div>
                                </td>
                                <td><b>{{ $r['tutor'] }}</b><span class="sub">{{ $r['mapel'] }}</span></td>
                                <td>
                                    <div class="time {{ $r['state'] === 'now' ? 'now' : ($r['state'] === 'done' ? 'done' : '') }}">
                                        <x-icon name="clock" /> {{ $r['waktu'] }}
                                    </div>
                                    <small style="{{ $r['state'] === 'now' ? 'color:var(--blue)' : ($r['state'] === 'soon' ? 'color:var(--amber)' : '') }}">{{ $r['ket'] }}</small>
                                </td>
                                <td>
                                    @if ($r['metode'] === 'online')
                                        <span class="m-chip zoom"><x-icon name="video" /> Online Zoom</span>
                                    @elseif ($r['metode'] === 'studio')
                                        <span class="m-chip studio"><x-icon name="map-pin" /> Studio Bimbel</span>
                                    @else
                                        <span class="m-chip"><x-icon name="map-pin" /> Home Visit</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr class="empty"><td colspan="4">Tidak ada sesi les yang terjadwal pada tanggal ini.</td></tr>
                        @endforelse
                        <tr class="empty" id="emptyFilter" style="display:none"><td colspan="4">Tidak ada sesi dengan metode ini.</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="tbl-foot">
                <span>Menampilkan <b id="shownCount">{{ $totalSesi }}</b> dari <b>{{ $totalSesi }}</b> sesi {{ $dateInfo['isToday'] ? 'hari ini' : 'pada tanggal ini' }}</span>
                <a href="{{ route('admin.jadwal', ['date' => $dateInfo['iso']]) }}" class="link">
                    {{ $totalSesi > 0 ? 'Lihat Seluruh ' . $totalSesi . ' Sesi' : 'Buka Jadwal & Sesi Les' }} <x-icon name="arrow-right" />
                </a>
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
                    <div class="r"><span>Tingkat Konfirmasi Tutor</span><b>{{ $capaian['kehadiranText'] }}%</b></div>
                    <div class="bar"><i style="width:{{ $capaian['kehadiran'] }}%"></i></div>
                </div>
            </section>

            {{-- Tutor on duty --}}
            <section class="card duty">
                <div class="hd">
                    <h3><x-icon name="users" /> Tutor On-Duty {{ $dateInfo['scope'] }}</h3>
                    <a href="{{ $url('admin.tutor') }}" class="link" style="font-size:12px">Semua ({{ $tutorDutyTotal }})</a>
                </div>
                @forelse ($tutorDuty as $d)
                    <div class="duty-row">
                        <span class="av {{ $d['warna'] }}">{{ $d['ini'] }}</span>
                        <div><b>{{ $d['nama'] }}</b><small>{{ $d['info'] }}</small></div>
                        <span class="tag {{ $d['tone'] }}">{{ $d['status'] }}</span>
                    </div>
                @empty
                    <p style="color:var(--muted);font-size:13px;padding:14px 0 4px">Tidak ada tutor yang bertugas pada tanggal ini.</p>
                @endforelse
                @if ($tutorDutyTotal > $tutorDuty->count())
                    <a href="{{ $url('admin.tutor') }}" class="link" style="font-size:12px;margin-top:4px">
                        +{{ $tutorDutyTotal - $tutorDuty->count() }} tutor lainnya <x-icon name="arrow-right" />
                    </a>
                @endif
            </section>
        </aside>
    </div>

    <p class="foot-copy">© {{ date('Y') }} One Private Course. Sistem Manajemen Bimbel & Les Privat.</p>
@endsection

@push('scripts')
<script>
    // ---------- Filter tabel jadwal (Semua / Home Visit / Online / Studio) ----------
    (function () {
        const tabs  = document.querySelectorAll('#filterMetode button');
        const rows  = document.querySelectorAll('.tbl tbody tr[data-metode]');
        const out   = document.getElementById('shownCount');
        const empty = document.getElementById('emptyFilter');
        tabs.forEach(t => t.addEventListener('click', () => {
            tabs.forEach(x => x.classList.toggle('on', x === t));
            let n = 0;
            rows.forEach(r => {
                const show = t.dataset.f === 'all' || r.dataset.metode === t.dataset.f;
                r.style.display = show ? '' : 'none';
                if (show) n++;
            });
            out.textContent = n;
            if (empty) empty.style.display = (rows.length > 0 && n === 0) ? '' : 'none';
        }));
    })();

    // ---------- Pemilih tanggal ----------
    (function () {
        const root = document.getElementById('datePick');
        if (!root) return;

        const btn   = document.getElementById('dateBtn');
        const panel = document.getElementById('datePanel');
        const grid  = document.getElementById('dpGrid');
        const title = document.getElementById('dpTitle');
        const sel   = root.dataset.selected;   // YYYY-MM-DD (tanggal yang sedang tampil)
        const today = root.dataset.today;      // YYYY-MM-DD (hari ini menurut server)
        const base  = root.dataset.base;
        let counts = {};
        try { counts = JSON.parse(root.dataset.counts || '{}') || {}; } catch (e) {}

        const MONTHS = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        const pad = n => String(n).padStart(2, '0');
        const iso = (y, m, d) => y + '-' + pad(m + 1) + '-' + pad(d);
        const parse = s => { const p = s.split('-').map(Number); return new Date(p[0], p[1] - 1, p[2]); };
        const fmt = d => iso(d.getFullYear(), d.getMonth(), d.getDate());

        let vy, vm;
        function resetView() { const p = sel.split('-').map(Number); vy = p[0]; vm = p[1] - 1; }
        resetView();

        function render() {
            title.textContent = MONTHS[vm] + ' ' + vy;
            const lead  = (new Date(vy, vm, 1).getDay() + 6) % 7;   // pekan mulai Senin
            const start = new Date(vy, vm, 1 - lead);
            let html = '';
            for (let i = 0; i < 42; i++) {
                const d   = new Date(start.getFullYear(), start.getMonth(), start.getDate() + i);
                const key = fmt(d);
                const cls = ['dp-day'];
                if (d.getMonth() !== vm) cls.push('out');
                if (key === today) cls.push('today');
                if (key === sel)   cls.push('sel');
                if (counts[key])   cls.push('has');
                html += '<button type="button" class="' + cls.join(' ') + '" data-d="' + key + '"'
                     + (counts[key] ? ' title="' + counts[key] + ' sesi"' : '') + '>' + d.getDate() + '</button>';
            }
            grid.innerHTML = html;
        }

        function go(key) {
            if (key === sel) { close(); return; }
            window.location.href = key === today ? base : base + '?tanggal=' + key;
        }

        function open() {
            resetView(); render();
            panel.hidden = false;
            btn.setAttribute('aria-expanded', 'true');
            const s = grid.querySelector('.sel') || grid.querySelector('.today');
            if (s) s.focus();
        }
        function close(refocus) {
            panel.hidden = true;
            btn.setAttribute('aria-expanded', 'false');
            if (refocus) btn.focus();
        }

        btn.addEventListener('click', () => panel.hidden ? open() : close());
        document.getElementById('dpPrev').addEventListener('click', () => { vm--; if (vm < 0)  { vm = 11; vy--; } render(); });
        document.getElementById('dpNext').addEventListener('click', () => { vm++; if (vm > 11) { vm = 0;  vy++; } render(); });
        grid.addEventListener('click', e => {
            const b = e.target.closest('.dp-day');
            if (b) go(b.dataset.d);
        });
        panel.querySelectorAll('.dp-foot button').forEach(b => b.addEventListener('click', () => {
            const d = parse(today);
            d.setDate(d.getDate() + Number(b.dataset.offset));
            go(fmt(d));
        }));
        document.addEventListener('click', e => { if (!panel.hidden && !root.contains(e.target)) close(); });
        document.addEventListener('keydown', e => { if (e.key === 'Escape' && !panel.hidden) close(true); });
    })();
</script>
@endpush
