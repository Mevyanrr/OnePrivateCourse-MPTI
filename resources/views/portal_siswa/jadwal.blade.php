<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jadwal Les — Portal Siswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{--bg:#f4f6fb;--card:#fff;--ink:#0f172a;--mute:#64748b;--line:#e5e9f2;--brand:#2563eb;--brand-soft:#eaf1ff;--ok:#059669;--ok-soft:#e7f8f1;--warn:#b45309;--warn-soft:#fff4e0;--danger:#dc2626}
        *{box-sizing:border-box}
        body{margin:0;font-family:'Plus Jakarta Sans',system-ui,sans-serif;background:var(--bg);color:var(--ink)}
        a{color:inherit;text-decoration:none}
        .app{display:grid;grid-template-columns:280px 1fr;min-height:100vh}
        .sidebar{background:#fff;border-right:1px solid var(--line);padding:24px 20px;display:flex;flex-direction:column;gap:6px;position:sticky;top:0;height:100vh}
        .brand{display:flex;align-items:center;gap:12px;margin-bottom:24px}
        .brand-logo{width:48px;height:48px;border-radius:14px;background:var(--brand);color:#fff;display:grid;place-items:center;font-weight:800}
        .brand b{display:block}.brand small{color:var(--mute);font-size:12px}
        .nav a{display:flex;align-items:center;gap:12px;padding:12px 14px;border-radius:12px;color:var(--mute);font-weight:500;margin-bottom:4px}
        .nav a.active{background:var(--brand-soft);color:var(--brand);font-weight:700}
        .spacer{flex:1}
        .logout{width:100%;padding:12px;border:1px solid var(--line);background:#fff;border-radius:12px;font:inherit;cursor:pointer}
        .main{min-width:0}
        .topbar{background:#fff;border-bottom:1px solid var(--line);padding:18px 32px;display:flex;justify-content:space-between;align-items:center;gap:16px;flex-wrap:wrap}
        .topbar h2{margin:0;font-size:22px}
        .pill{background:var(--brand-soft);border-radius:999px;padding:8px 16px;font-size:14px;margin-left:12px}
        .pill b{color:var(--brand)}
        .user{display:flex;align-items:center;gap:12px;text-align:right}
        .user small{color:var(--mute);display:block}
        .avatar{width:44px;height:44px;border-radius:50%;background:var(--brand);color:#fff;display:grid;place-items:center;font-weight:700}
        .content{padding:28px 32px 60px;max-width:1280px}
        .crumb{color:var(--mute);font-size:14px}.crumb b{color:var(--brand);font-weight:500}
        h1{font-size:32px;margin:6px 0 6px}
        .lead{color:var(--mute);margin:0 0 24px}
        .panel{background:var(--card);border-radius:20px;padding:18px 22px;box-shadow:0 1px 2px rgba(15,23,42,.04)}
        .week-bar{display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap;margin-bottom:22px}
        .week-title{display:flex;align-items:center;gap:14px}
        .week-title h3{margin:0;font-size:22px}.week-title small{color:var(--mute)}
        .ico{width:44px;height:44px;border-radius:12px;background:var(--brand-soft);display:grid;place-items:center;color:var(--brand)}
        .nav-week{display:flex;align-items:center;gap:6px;background:var(--bg);border-radius:12px;padding:6px}
        .nav-week a{padding:8px 14px;border-radius:10px;font-weight:600;font-size:14px}
        .toggle{display:flex;background:var(--bg);border-radius:12px;padding:4px}
        .toggle button{border:0;background:transparent;padding:10px 16px;border-radius:10px;font:inherit;font-weight:600;color:var(--mute);cursor:pointer}
        .toggle button.on{background:#fff;color:var(--brand);box-shadow:0 1px 3px rgba(0,0,0,.08)}
        .week-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:14px;margin-bottom:30px}
        .day{background:#fff;border-radius:18px;padding:16px;border:2px solid transparent;position:relative;display:block}
        .day.today .tag{display:inline-block;font-size:11px;font-weight:700;color:var(--brand);margin-left:4px}
        .day.selected{border-color:var(--brand);box-shadow:0 6px 20px rgba(37,99,235,.15)}
        .day .name{font-size:14px;font-weight:600;display:flex;justify-content:space-between;align-items:center}
        .dot{width:9px;height:9px;border-radius:50%;background:#cbd5e1}
        .dot.on{background:var(--brand)}.dot.warn{background:#f59e0b}
        .day .num{font-size:30px;font-weight:800;margin:10px 0 6px}.day .num small{font-size:13px;font-weight:500;color:var(--mute)}
        .day .count{font-size:13px;color:var(--mute);font-weight:500}.day .count.on{color:var(--brand)}
        .section-head{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;flex-wrap:wrap;margin-bottom:14px}
        .section-head h3{margin:0;font-size:22px}.section-head p{margin:4px 0 0;color:var(--mute);font-size:14px}
        .status-pill{padding:9px 16px;border-radius:999px;font-weight:600;font-size:14px;background:var(--ok-soft);color:var(--ok)}
        .status-pill.warn{background:var(--warn-soft);color:var(--warn)}
        .empty{color:var(--mute);padding:28px 8px;font-size:14px}
        .list{display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:16px}
        .session{background:#fff;border-radius:18px;padding:18px;box-shadow:0 1px 2px rgba(15,23,42,.04);display:flex;flex-direction:column;gap:8px}
        .session-top{display:flex;justify-content:space-between;align-items:center}
        .chip{background:var(--bg);padding:5px 12px;border-radius:999px;font-size:13px;font-weight:600}
        .time{color:var(--brand);font-weight:700;font-size:14px}
        .session h3{margin:6px 0 0;font-size:18px}.topic{font-weight:500;color:var(--mute);font-size:15px}
        .meta{margin:0;color:var(--mute);font-size:14px}
        .session-bottom{display:flex;justify-content:space-between;align-items:center;gap:10px;flex-wrap:wrap;margin-top:8px}
        .actions{display:flex;gap:8px;flex-wrap:wrap}
        .badge{padding:5px 12px;border-radius:999px;font-size:12px;font-weight:700}
        .badge-ok,.badge-done{background:var(--ok-soft);color:var(--ok)}
        .badge-wait{background:var(--warn-soft);color:var(--warn)}
        .badge-todo{background:#fee9e9;color:var(--danger)}
        .btn{border:0;border-radius:12px;font:inherit;font-weight:700;cursor:pointer;padding:12px 18px}
        .btn-sm{padding:9px 14px;font-size:13px}
        .btn-primary{background:var(--brand);color:#fff}
        .btn-ghost{background:var(--brand-soft);color:var(--brand)}
        .alert{border-radius:14px;padding:14px 18px;margin-bottom:18px;font-size:14px;font-weight:500}
        .alert-ok{background:var(--ok-soft);color:var(--ok)}
        .alert-err{background:#fee9e9;color:var(--danger)}
        .alert ul{margin:0;padding-left:18px}
        .modal{position:fixed;inset:0;background:rgba(15,23,42,.45);display:none;align-items:center;justify-content:center;padding:16px;z-index:50}
        .modal.open{display:flex}
        .modal-box{background:#fff;border-radius:22px;width:100%;max-width:480px;padding:26px;max-height:92vh;overflow:auto}
        .modal-box h3{margin:0 0 4px;font-size:20px}.modal-box .sub{margin:0 0 18px;color:var(--mute);font-size:14px}
        label.f{display:block;font-weight:600;font-size:14px;margin:14px 0 8px}
        input[type=date],textarea{width:100%;padding:12px 14px;border:1px solid var(--line);border-radius:12px;font:inherit;background:var(--bg)}
        .slots{display:grid;grid-template-columns:repeat(3,1fr);gap:10px}
        .slots input{display:none}
        .slots label{border:2px solid var(--line);border-radius:14px;padding:12px 6px;text-align:center;cursor:pointer;font-size:13px}
        .slots label b{display:block;font-size:14px;margin-top:2px}
        .slots input:checked + label{border-color:var(--brand);background:var(--brand-soft);color:var(--brand)}
        .modal-actions{display:flex;gap:10px;justify-content:flex-end;margin-top:22px}
        @media(max-width:1100px){.week-grid{grid-template-columns:repeat(4,1fr)}}
        @media(max-width:820px){.app{grid-template-columns:1fr}.sidebar{position:static;height:auto}.content,.topbar{padding-left:18px;padding-right:18px}.week-grid{grid-template-columns:repeat(2,1fr)}}
    </style>
</head>
<body>
<div class="app">

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-logo">OP</div>
            <div><b>One Private Course</b><small>Sistem Manajemen Bimbel</small></div>
        </div>
        <nav class="nav">
            <a href="#">Beranda</a>
            <a href="{{ route('siswa.jadwal') }}" class="active">Jadwal Les</a>
            <a href="#">Presensi &amp; Catatan</a>
            <a href="#">Profil Saya</a>
        </nav>
        <div class="spacer"></div>
        @if(Route::has('logout'))
            <form method="POST" action="{{ route('logout') }}">@csrf
                <button class="logout" type="submit">Keluar</button>
            </form>
        @endif
    </aside>

    <div class="main">
        <header class="topbar">
            <div style="display:flex;align-items:center;flex-wrap:wrap;gap:8px">
                <h2>Portal Siswa</h2>
                <span class="pill">Profil Aktif: <b>{{ $student->name }}</b> ({{ $student->grade }})</span>
            </div>
            <div class="user">
                <div><b>{{ auth()->user()->name }}</b><small>{{ auth()->user()->role_label ?? 'Siswa' }}</small></div>
                <div class="avatar">{{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</div>
            </div>
        </header>

        <main class="content">
            <div class="crumb">Portal Siswa / <b>Jadwal &amp; Konfirmasi Sesi</b></div>
            <h1>Jadwal Les &amp; Konfirmasi Sesi</h1>
            <p class="lead">Pantau kalender mingguan lesmu, konfirmasi kehadiran, atau ajukan penyesuaian waktu ke tutor.</p>

            @if(session('success'))<div class="alert alert-ok">{{ session('success') }}</div>@endif
            @if($errors->any())
                <div class="alert alert-err"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            @endif

            <div class="panel week-bar">
                <div class="week-title">
                    <div class="ico">▦</div>
                    <div>
                        <h3>{{ $weekStart->locale('id')->isoFormat('MMMM YYYY') }}</h3>
                        <small>Pekan {{ $weekNumber }} • {{ $weekStart->day }} – {{ $weekEnd->locale('id')->isoFormat('D MMMM YYYY') }}</small>
                    </div>
                </div>
                <div class="nav-week">
                    <a href="{{ route('siswa.jadwal', ['date' => $prevWeek]) }}">‹</a>
                    <a href="{{ route('siswa.jadwal', ['date' => $todayDate]) }}">Hari Ini</a>
                    <a href="{{ route('siswa.jadwal', ['date' => $nextWeek]) }}">›</a>
                </div>
                <div class="toggle">
                    <button type="button" class="on" data-view="week">Tampilan Mingguan</button>
                    <button type="button" data-view="list">Daftar Hari</button>
                </div>
            </div>

            <div class="week-grid" id="weekGrid">
                @foreach($days as $d)
                    <a class="day {{ $d['is_today'] ? 'today' : '' }} {{ $d['is_selected'] ? 'selected' : '' }}"
                       href="{{ route('siswa.jadwal', ['date' => $d['date']]) }}">
                        <div class="name">
                            <span>{{ $d['day_name'] }}@if($d['is_today'])<span class="tag">(Hari Ini)</span>@endif</span>
                            <span class="dot {{ $d['needs_action'] ? 'warn' : ($d['count'] ? 'on' : '') }}"></span>
                        </div>
                        <div class="num">{{ $d['day_number'] }} <small>{{ $d['month_short'] }}</small></div>
                        <div class="count {{ $d['count'] ? 'on' : '' }}">{{ $d['count'] ? $d['count'].' Sesi' : 'Libur Les' }}</div>
                    </a>
                @endforeach
            </div>

            <div class="section-head">
                <div>
                    <h3>Sesi {{ $selected->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</h3>
                    <p>{{ $selectedSessions->count() }} sesi dijadwalkan untuk {{ $student->name }}</p>
                </div>
                <span class="status-pill {{ $needsAction ? 'warn' : '' }}">Status: {{ $statusText }}</span>
            </div>

            @if($selectedSessions->isEmpty())
                <div class="empty">Tidak ada sesi pada hari ini.</div>
            @else
                <div class="list" style="margin-bottom:30px">
                    @foreach($selectedSessions as $s)
                        @include('portal_siswa.partials.session-card', ['s' => $s])
                    @endforeach
                </div>
            @endif

            <div class="section-head" style="margin-top:28px">
                <div><h3 style="font-size:18px">Sesi Lainnya Pekan Ini</h3></div>
                <span style="color:var(--mute);font-size:14px">Total {{ $otherSessions->count() }} sesi tersisa</span>
            </div>
            @if($otherSessions->isEmpty())
                <div class="empty">Tidak ada sesi lain pada pekan ini.</div>
            @else
                <div class="list">
                    @foreach($otherSessions as $s)
                        @include('portal_siswa.partials.session-card', ['s' => $s])
                    @endforeach
                </div>
            @endif
        </main>
    </div>
</div>

<div class="modal" id="reschedModal" aria-hidden="true">
    <div class="modal-box">
        <h3>Formulir Ajukan Ganti Waktu</h3>
        <p class="sub" id="reschedTitle"></p>
        <form method="POST" id="reschedForm" action="">
            @csrf
            <label class="f" for="rDate">Pilih Tanggal Alternatif</label>
            <input type="date" id="rDate" name="date" min="{{ $todayDate }}" required>

            <label class="f">Pilih Slot Waktu Pengganti</label>
            <div class="slots">
                @foreach($slots as $key => $slot)
                    <div>
                        <input type="radio" name="slot" id="slot-{{ $key }}" value="{{ $key }}" {{ $loop->first ? 'required' : '' }}>
                        <label for="slot-{{ $key }}">{{ $slot['label'] }}<b>{{ $slot['start'] }} WIB</b></label>
                    </div>
                @endforeach
            </div>

            <label class="f" for="rReason">Alasan (opsional)</label>
            <textarea id="rReason" name="reason" rows="3" maxlength="500" placeholder="Contoh: ada kegiatan sekolah"></textarea>

            <div class="modal-actions">
                <button type="button" class="btn btn-ghost" id="reschedCancel">Batal</button>
                <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
            </div>
        </form>
    </div>
</div>

<script>
    const urlTemplate = @json(route('siswa.jadwal.reschedule', ['id' => '__ID__']));
    const modal = document.getElementById('reschedModal');
    const form  = document.getElementById('reschedForm');

    document.querySelectorAll('[data-reschedule]').forEach(btn => {
        btn.addEventListener('click', () => {
            form.action = urlTemplate.replace('__ID__', btn.dataset.id);
            document.getElementById('reschedTitle').textContent = btn.dataset.title;
            document.getElementById('rDate').value = btn.dataset.date;
            modal.classList.add('open');
        });
    });
    const close = () => modal.classList.remove('open');
    document.getElementById('reschedCancel').addEventListener('click', close);
    modal.addEventListener('click', e => { if (e.target === modal) close(); });
    document.addEventListener('keydown', e => { if (e.key === 'Escape') close(); });

    const grid = document.getElementById('weekGrid');
    document.querySelectorAll('.toggle button').forEach(b => b.addEventListener('click', () => {
        document.querySelectorAll('.toggle button').forEach(x => x.classList.remove('on'));
        b.classList.add('on');
        grid.style.display = b.dataset.view === 'list' ? 'none' : '';
    }));
</script>
</body>
</html>
