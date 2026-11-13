@use('App\Support\Fmt')
@use('App\Support\PortalContext')
@use('App\Models\User')
@php
    $pekan     = (int) request()->input('pekan', 0);
    $todayIso  = today()->toDateString();
    $focusIso  = $focus->toDateString();
    $weekEnd   = $weekStart->copy()->endOfWeek();
    $dayNames  = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
    $dateOptions = collect(range(0, 13))->map(fn ($i) => [
        'v' => today()->addDays($i)->toDateString(),
        't' => Fmt::dateShort(today()->addDays($i)) . ($i === 0 ? ' (Hari Ini)' : ($i === 1 ? ' (Besok)' : '')),
    ]);
    $slots   = [['l' => 'Pagi', 't' => '09:00'], ['l' => 'Sore 1', 't' => '15:30'], ['l' => 'Sore 2', 't' => '17:00']];
    $reasons = ['Siswa Kurang Sehat', 'Bentrok Ekskul / Sekolah', 'Urusan Keluarga Mendesak', 'Lainnya'];
    $admin   = User::where('role', 'admin')->orderBy('id')->first();
    $adminWa = PortalContext::wa(null, 'Halo Admin, saya wali ' . $child->name . '. Mohon bantuan terkait jadwal les.');
    $dayNeedsAction = $daySessions->contains(fn ($x) => ! $x->parent_confirmed && $x->liveStatus() !== 'selesai');
@endphp
<!DOCTYPE html><html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}"><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta content="web_dashboard" name="shell-type"><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"><style>@@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{colors:{"on-tertiary-fixed-variant":"#2f2ebe","on-error-container":"#93000a","on-secondary-fixed":"#00201d","tertiary-fixed":"#e1e0ff","surface-container-highest":"#dae2fd","surface-container-low":"#f2f3ff","secondary":"#006a61","inverse-surface":"#283044","error":"#ba1a1a","secondary-fixed-dim":"#6bd8cb","surface-bright":"#faf8ff","error-container":"#ffdad6","tertiary-container":"#585be6","on-primary":"#ffffff","on-secondary-fixed-variant":"#005049","on-error":"#ffffff","primary":"#004ac6","surface-container":"#eaedff","surface-variant":"#dae2fd","on-surface-variant":"#434655","outline":"#737686","tertiary":"#3e3fcc","surface-tint":"#0053db","background":"#faf8ff","on-tertiary":"#ffffff","surface-container-lowest":"#ffffff","secondary-fixed":"#89f5e7","primary-fixed-dim":"#b4c5ff","primary-container":"#2563eb","on-primary-fixed":"#00174b","outline-variant":"#c3c6d7","inverse-primary":"#b4c5ff","surface-dim":"#d2d9f4","on-primary-fixed-variant":"#003ea8","primary-fixed":"#dbe1ff","on-primary-container":"#eeefff","on-tertiary-fixed":"#07006c","surface-container-high":"#e2e7ff","on-tertiary-container":"#f1eeff","inverse-on-surface":"#eef0ff","on-secondary":"#ffffff","tertiary-fixed-dim":"#c0c1ff","on-surface":"#131b2e","surface":"#faf8ff","secondary-container":"#86f2e4","on-secondary-container":"#006f66"},borderRadius:{DEFAULT:"0.25rem",lg:"0.5rem",xl:"0.75rem",full:"9999px"},spacing:{"space-sm":"0.5rem","space-md":"1rem","space-lg":"1.5rem","space-xl":"2rem","gutter-mobile":"1rem","margin-mobile":"1rem",gutter:"1.5rem","space-xs":"0.25rem",margin:"2rem"},fontFamily:{"headline-sm":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"],"headline-xl":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"body-md":["Plus Jakarta Sans"],"display-lg-mobile":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"body-sm":["Plus Jakarta Sans"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"label-lg":["Plus Jakarta Sans"],"label-sm":["Plus Jakarta Sans"],"label-md":["Plus Jakarta Sans"]},fontSize:{"headline-sm":["18px",{lineHeight:"26px",fontWeight:"600"}],"headline-md":["20px",{lineHeight:"28px",fontWeight:"600"}],"headline-xl":["32px",{lineHeight:"40px",letterSpacing:"-0.015em",fontWeight:"700"}],"body-lg":["16px",{lineHeight:"24px",fontWeight:"400"}],"body-md":["14px",{lineHeight:"20px",fontWeight:"400"}],"display-lg-mobile":["30px",{lineHeight:"38px",letterSpacing:"-0.02em",fontWeight:"700"}],"display-lg":["40px",{lineHeight:"48px",letterSpacing:"-0.02em",fontWeight:"700"}],"body-sm":["13px",{lineHeight:"18px",fontWeight:"400"}],"headline-xl-mobile":["24px",{lineHeight:"32px",letterSpacing:"-0.015em",fontWeight:"700"}],"headline-lg":["24px",{lineHeight:"32px",letterSpacing:"-0.01em",fontWeight:"600"}],"label-lg":["14px",{lineHeight:"20px",letterSpacing:"0.01em",fontWeight:"600"}],"label-sm":["11px",{lineHeight:"14px",letterSpacing:"0.03em",fontWeight:"600"}],"label-md":["12px",{lineHeight:"16px",letterSpacing:"0.02em",fontWeight:"600"}]}}}};</script></head>
<body class="bg-surface font-body-md text-body-md text-on-surface antialiased">
@include('siswa._sidebar', ['active' => 'jadwal'])
<div class="pl-64">

{{-- ================= HEADER ================= --}}
<header class="fixed top-0 left-64 right-0 h-16 bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40"><div class="h-16 w-full px-8 flex items-center justify-between border-b border-surface-container-high/60">
<div class="flex items-center gap-space-md">
<div class="font-headline-sm text-headline-sm text-on-surface font-semibold tracking-tight">Portal Orang Tua &amp; Siswa</div>
<span class="text-outline-variant">•</span>
<div class="flex items-center gap-2 px-3.5 py-1.5 bg-surface-container-low rounded-full shadow-xs">
<span class="material-symbols-outlined text-primary text-[18px]">school</span>
<span class="font-label-md text-label-md text-on-surface">Profil Aktif: <strong class="text-primary font-bold">{{ $child->name }}</strong> ({{ $child->grade }})</span>
</div>
</div>
<div class="flex items-center gap-4">
<button aria-label="Pemberitahuan" class="relative p-2.5 rounded-xl text-on-surface-variant bg-surface-container-low hover:bg-surface-container hover:text-on-surface transition-colors shadow-xs" type="button"><span class="material-symbols-outlined text-[20px]">notifications</span><span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-error ring-2 ring-surface"></span></button>
<div class="flex items-center gap-space-sm pl-2 border-l border-surface-container-high">
<div class="text-right hidden sm:block">
<div class="font-label-lg text-label-lg text-on-surface font-semibold leading-none">{{ auth()->user()->name }}</div>
<div class="font-label-sm text-label-sm text-on-surface-variant mt-1">Wali Murid @if(auth()->user()->branch) • {{ auth()->user()->branch }} @endif</div></div>
<div class="w-9 h-9 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center shadow-xs"><span class="material-symbols-outlined text-[20px]">person</span></div>
</div>
</div>
</div></header>

<main class="relative w-full pt-16 bg-surface min-h-screen"><div class="flex flex-col w-full">
<div class="px-8 py-8 space-y-7 max-w-[1540px] mx-auto w-full">

{{-- ================= JUDUL + SWITCHER ANAK ================= --}}
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 pb-2">
<div class="space-y-1.5">
<div class="flex items-center gap-2 text-xs text-slate-500 font-medium"><span>Portal Orang Tua &amp; Siswa</span><span class="text-slate-300 font-bold">/</span><span class="text-blue-600 font-semibold">Jadwal &amp; Konfirmasi Sesi</span></div>
<h1 class="text-2xl font-bold tracking-tight text-slate-900">Jadwal Les &amp; Konfirmasi Sesi</h1>
<p class="text-xs text-slate-500 max-w-2xl">Pantau kalender mingguan les putra-putri Anda, konfirmasi jadwal tutor, atau ajukan penyesuaian waktu.</p>
</div>
<div class="flex items-center flex-wrap gap-2.5 p-1.5 bg-surface-container-low rounded-2xl shadow-sm">
@foreach($children as $c)
@php $isActive = $c->id === $child->id; @endphp
<a href="{{ route('portal.jadwal', ['anak' => $c->id]) }}" class="flex items-center gap-2 px-4 py-2 rounded-xl font-label-lg text-label-lg transition-all {{ $isActive ? 'bg-primary-container text-on-primary-container shadow-sm' : 'bg-transparent hover:bg-surface-container-high text-on-surface-variant' }}">
<span class="material-symbols-outlined text-[18px]" @if($isActive) style="font-variation-settings: 'FILL' 1;" @endif>{{ $isActive ? 'star' : 'face_6' }}</span>
<span>{{ $c->name }} <span class="opacity-80 font-normal text-xs">({{ $c->grade }})</span></span>
</a>
@endforeach
<a href="{{ PortalContext::wa(null, 'Halo Admin, saya ingin menambahkan data anak ke akun portal saya.') }}" target="_blank" class="flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-surface-container hover:bg-surface-container-highest text-primary font-label-lg text-label-lg transition-all">
<span class="material-symbols-outlined text-[18px]">add_circle</span><span>Tambah Anak</span>
</a>
</div>
</div>

{{-- ================= NAVIGASI PEKAN ================= --}}
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 p-4 rounded-2xl bg-surface-container-lowest shadow-sm">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary"><span class="material-symbols-outlined text-[24px]">calendar_month</span></div>
<div>
<div class="font-headline-sm text-headline-sm text-on-surface tracking-tight">{{ Fmt::period($weekStart) }}</div>
<div class="font-label-sm text-label-sm text-on-surface-variant">Pekan {{ $weekStart->weekOfMonth }} • {{ $weekStart->day }} – {{ Fmt::dateLong($weekEnd) }}</div>
</div>
<div class="flex items-center gap-1 ml-4 bg-surface-container-low py-1 px-1.5 rounded-xl">
<a href="{{ route('portal.jadwal', ['pekan' => $pekan - 1]) }}" title="Minggu Sebelumnya" class="p-1.5 rounded-lg text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-colors"><span class="material-symbols-outlined text-[20px]">chevron_left</span></a>
<a href="{{ route('portal.jadwal') }}" class="px-3 py-1 rounded-lg text-on-surface font-label-md text-label-md hover:bg-surface-container-high transition-colors">Hari Ini</a>
<a href="{{ route('portal.jadwal', ['pekan' => $pekan + 1]) }}" title="Minggu Berikutnya" class="p-1.5 rounded-lg text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-colors"><span class="material-symbols-outlined text-[20px]">chevron_right</span></a>
</div>
</div>
<div class="flex items-center gap-1 bg-surface-container-low p-1 rounded-xl self-start md:self-auto">
<button id="btn-week" onclick="toggleStrip(true)" class="flex items-center gap-2 px-3.5 py-2 rounded-lg bg-surface-container-lowest text-primary font-label-md text-label-md shadow-xs transition-colors" type="button"><span class="material-symbols-outlined text-[18px]">view_week</span><span>Tampilan Mingguan</span></button>
<button id="btn-list" onclick="toggleStrip(false)" class="flex items-center gap-2 px-3.5 py-2 rounded-lg text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" type="button"><span class="material-symbols-outlined text-[18px]">view_agenda</span><span>Daftar Hari</span></button>
</div>
</div>

{{-- ================= BANNER TINDAKAN ================= --}}
@if($pending)
<div class="p-5 rounded-2xl bg-gradient-to-r from-amber-50 to-orange-50/70 text-on-surface shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-4" id="alert-action-required">
<div class="flex items-start gap-4">
<div class="w-10 h-10 rounded-xl bg-amber-500/15 text-amber-700 flex items-center justify-center shrink-0 mt-0.5"><span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">notification_important</span></div>
<div class="space-y-1">
<div class="flex items-center gap-2 flex-wrap">
<span class="font-label-lg text-label-lg text-amber-900 font-bold tracking-wide">{{ $pendingCount }} Sesi Menunggu Konfirmasi Anda</span>
<span class="px-2 py-0.5 rounded-full bg-amber-200/60 text-amber-900 font-label-sm text-label-sm">Sesi terdekat: {{ Fmt::dateShort($pending->date) }}</span>
</div>
<p class="font-body-md text-body-md text-amber-950/80">
<strong>{{ $pending->subject ?: ($child->program ?: 'Sesi Les Privat') }}</strong> • {{ Fmt::dateShort($pending->date) }}
(<span class="font-semibold text-primary-container">{{ Fmt::hhmm($pending->start_time) }} – {{ Fmt::hhmm($pending->end_time) }} WIB</span>)
bersama <strong>{{ $pending->tutor->name ?? 'tutor' }}</strong>. Mohon konfirmasi agar jadwal tercatat.
</p>
</div>
</div>
<div class="flex items-center gap-2.5 shrink-0 self-end md:self-center">
<button class="px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold shadow-sm transition-all flex items-center gap-2" onclick="confirmSession({{ $pending->id }})" type="button"><span class="material-symbols-outlined text-[18px]">check_circle</span><span>Konfirmasi Sekarang</span></button>
<button class="px-4 py-2.5 rounded-xl bg-white text-slate-700 border border-slate-200 hover:bg-slate-50 text-xs font-medium transition-all shadow-sm flex items-center gap-2" type="button"
 onclick="openResched(this)" data-id="{{ $pending->id }}" data-minutes="{{ Fmt::minutes($pending->start_time, $pending->end_time) }}" data-date="{{ $pending->date->toDateString() }}" data-title="{{ $pending->subject }}" data-tutor="{{ $pending->tutor->name ?? 'Tutor' }}"><span class="material-symbols-outlined text-[18px]">edit_calendar</span><span>Ajukan Jadwal Lain</span></button>
</div>
</div>
@endif

{{-- ================= STRIP 7 HARI ================= --}}
<div id="week-strip" class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-7 gap-3">
@foreach($weekJson as $i => $w)
@php
    $isToday = $w['date'] === $todayIso;
    $isSel   = $w['date'] === $focusIso;
    $dt      = \Carbon\Carbon::parse($w['date']);
@endphp
<a href="{{ route('portal.jadwal', ['tgl' => $w['date'], 'pekan' => $pekan]) }}"
   class="p-3.5 rounded-2xl transition-all cursor-pointer flex flex-col justify-between h-28 {{ $isSel ? 'bg-surface-container-low ring-2 ring-primary shadow-md' : 'bg-surface-container-lowest hover:bg-surface-container-low shadow-xs' }}">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-semibold {{ $isSel ? 'text-primary font-bold' : 'text-on-surface-variant' }}">{{ $dayNames[$i] }}@if($isToday) <span class="text-[10px] font-bold text-primary">(Hari Ini)</span>@endif</span>
<span class="w-2 h-2 rounded-full {{ $w['count'] ? 'bg-primary' : 'bg-outline-variant' }}"></span>
</div>
<div class="font-headline-lg text-headline-lg font-bold flex items-baseline gap-1 {{ $isSel ? 'text-primary' : 'text-on-surface' }}">{{ $w['day'] }} <span class="font-label-sm text-label-sm font-normal text-on-surface-variant">{{ mb_substr(Fmt::MONTHS[$dt->month], 0, 3) }}</span></div>
<div class="font-label-sm text-label-sm {{ $w['count'] ? 'text-primary font-semibold' : 'text-on-surface-variant' }}">{{ $w['count'] ? $w['count'] . ' Sesi' : 'Libur Les' }}</div>
</a>
@endforeach
</div>

{{-- ================= KONTEN 2 KOLOM ================= --}}
<div class="grid grid-cols-1 lg:grid-cols-12 gap-7 items-start">

{{-- ---------- KIRI: sesi hari terpilih ---------- --}}
<div class="lg:col-span-7 space-y-6">
<div class="flex items-center justify-between">
<div>
<h2 class="font-headline-md text-headline-md text-on-surface">Sesi Hari {{ Fmt::dayName($focus) }}, {{ Fmt::dateLong($focus) }}</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">{{ $daySessions->count() }} Sesi dijadwalkan untuk {{ $child->name }}</p>
</div>
<span class="px-3 py-1 rounded-full bg-primary-container/10 text-primary font-label-md text-label-md font-semibold">Status: {{ $daySessions->isEmpty() ? 'Tidak Ada Sesi' : ($dayNeedsAction ? 'Menunggu Tindakan' : 'Semua Terkonfirmasi') }}</span>
</div>

@forelse($daySessions as $s)
@php
    $live     = $s->liveStatus();
    $done     = $live === 'selesai';
    $needs    = ! $s->parent_confirmed && ! $done;
    $waitTut  = $s->parent_confirmed && ! $s->tutor_confirmed && ! $done;
    $reasonTx = trim((string) $s->reschedule_reason);
    $photo    = $s->tutor->photo_url ?? null;
    $tName    = $s->tutor->name ?? 'Tutor belum ditentukan';
    $place    = $s->location ?: ($child->area ?: $child->address);
    [$badgeTx, $badgeCls, $badgeIc] = match (true) {
        $done    => ['Selesai', 'bg-surface-container text-on-surface-variant', 'task_alt'],
        $live === 'berjalan' => ['Sedang Berlangsung', 'bg-secondary-fixed/50 text-on-secondary-fixed', 'play_circle'],
        $needs   => ['Menunggu Respon Wali Murid', 'bg-amber-100 text-amber-900', 'hourglass_top'],
        $waitTut => ['Menunggu Persetujuan Tutor', 'bg-amber-100 text-amber-900', 'hourglass_top'],
        default  => ['Terkonfirmasi', 'bg-secondary-fixed/50 text-on-secondary-fixed', 'check_circle'],
    };
@endphp
<div class="rounded-2xl bg-surface-container-lowest p-6 shadow-sm relative overflow-hidden transition-all hover:shadow-md">
<div class="absolute left-0 top-0 bottom-0 w-1.5 {{ $needs || $waitTut ? 'bg-amber-500' : ($done ? 'bg-outline-variant' : 'bg-secondary') }}"></div>
<div class="pl-2 space-y-5">
<div class="flex flex-wrap items-center justify-between gap-3">
<div class="flex items-center gap-2 flex-wrap">
<span class="px-3 py-1 rounded-full {{ $badgeCls }} font-label-md text-label-md font-semibold flex items-center gap-1.5"><span class="material-symbols-outlined text-[15px]">{{ $badgeIc }}</span><span>{{ $badgeTx }}</span></span>
@if($reasonTx !== '')<span class="px-3 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-md text-label-md font-semibold flex items-center gap-1.5"><span class="material-symbols-outlined text-[15px]">update</span><span>Waktu Diajukan Ulang</span></span>@endif
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Sesi Ke-{{ $s->session_no ?: 1 }}</span>
</div>

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-xl bg-surface-container-low">
<div class="space-y-1">
<div class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold">Mata Pelajaran</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">{{ $s->subject ?: ($child->program ?: 'Sesi Les Privat') }}</h3>
<div class="font-body-sm text-body-sm text-on-surface-variant">Fokus Materi: {{ $s->topic ?: ($s->subject ?: '-') }}</div>
</div>
<div class="bg-surface-container-lowest p-3 rounded-xl shadow-xs shrink-0 sm:text-right">
<div class="font-label-sm text-label-sm text-on-surface-variant">{{ Fmt::dateShort($s->date) }}</div>
<div class="flex items-center gap-1.5 text-primary font-headline-sm text-headline-sm font-bold mt-0.5"><span class="material-symbols-outlined text-[20px]">schedule</span><span>{{ Fmt::hhmm($s->start_time) }} – {{ Fmt::hhmm($s->end_time) }} WIB</span></div>
<div class="font-label-sm text-label-sm text-secondary font-medium mt-0.5">{{ Fmt::minutes($s->start_time, $s->end_time) }} Menit</div>
</div>
</div>

<div class="flex items-center justify-between flex-wrap gap-4 pt-1">
<div class="flex items-center gap-3">
@if($photo)<img class="w-12 h-12 rounded-full object-cover shadow-xs" src="{{ $photo }}" alt="{{ $tName }}">
@else<div class="w-12 h-12 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-bold">{{ mb_strtoupper(mb_substr($tName, 0, 1)) }}</div>@endif
<div>
<div class="flex items-center gap-2"><span class="font-label-lg text-label-lg text-on-surface font-bold">{{ $tName }}</span>
@if($s->tutor)<span class="px-2 py-0.5 rounded-md bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">⭐ {{ number_format((float) $s->tutor->rating, 1) }} ({{ $s->tutor->reviews ?? 0 }} Ulasan)</span>@endif</div>
<div class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">{{ $s->tutor->headline ?? 'Tutor Pengajar' }}</div>
</div>
</div>
@if($s->tutor)
<a class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md" href="{{ Fmt::waLink($s->tutor->phone ?? '') }}" target="_blank"><span class="material-symbols-outlined text-[16px] text-secondary">chat</span><span>Chat {{ Fmt::shortName($tName) }}</span></a>
@endif
</div>

<div class="p-3.5 rounded-xl bg-surface-container-low flex items-center gap-3">
<div class="w-9 h-9 rounded-lg bg-primary-container text-on-primary-container flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-[20px]">{{ $s->method === 'online' ? 'videocam' : 'home_pin' }}</span></div>
<div class="min-w-0">
<div class="font-body-md text-body-md text-on-surface font-semibold">{{ Fmt::method($s->method) }}@if($s->method !== 'online' && $place) • {{ $place }}@endif</div>
@if($s->method === 'online')<div class="font-label-sm text-label-sm text-on-surface-variant">Tautan ruang belajar dikirim tutor melalui WhatsApp.</div>@endif
</div>
</div>

@if(trim((string) $s->notes) !== '')
<div class="p-3.5 rounded-xl bg-surface-container-low flex items-start gap-3"><span class="material-symbols-outlined text-tertiary-container text-[20px] shrink-0 mt-0.5">format_quote</span><p class="font-body-sm text-body-sm text-on-surface italic">{{ $s->notes }}</p></div>
@endif
@if($reasonTx !== '')
<div class="font-label-sm text-label-sm text-on-surface-variant">Alasan perubahan waktu: {{ $reasonTx }}</div>
@endif

@unless($done)
<div class="flex flex-wrap items-center gap-3 pt-2">
@if($needs)
<button class="flex-1 min-w-[200px] h-11 px-5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold shadow-sm transition-all flex items-center justify-center gap-2" onclick="confirmSession({{ $s->id }})" type="button"><span class="material-symbols-outlined text-[20px]">check_circle</span><span>Konfirmasi Jadwal Ini</span></button>
@endif
<button class="h-11 px-4 rounded-xl bg-white text-slate-700 border border-slate-200 hover:bg-slate-50 text-xs font-medium transition-colors flex items-center gap-2 shadow-sm" type="button"
 onclick="openResched(this)" data-id="{{ $s->id }}" data-minutes="{{ Fmt::minutes($s->start_time, $s->end_time) }}" data-date="{{ $s->date->toDateString() }}" data-title="{{ $s->subject }}" data-tutor="{{ $tName }}"><span class="material-symbols-outlined text-[20px]">calendar_month</span><span>Ajukan Perubahan Waktu</span></button>
</div>
@endunless
</div>
</div>
@empty
<div class="text-xs text-slate-400 p-4">Tidak ada sesi pada hari ini.</div>
@endforelse

{{-- Sesi lain pekan ini --}}
<div class="space-y-3 pt-2">
<div class="flex items-center justify-between">
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Sesi Lainnya Pekan Ini</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Total {{ $others->count() }} sesi tersisa</span>
</div>
@if($others->isEmpty())
<div class="text-xs text-slate-400 p-2">Tidak ada sesi lain pada pekan ini.</div>
@else
<div class="grid grid-cols-1 md:grid-cols-2 gap-3.5">
@foreach($others as $o)
<a href="{{ route('portal.jadwal', ['tgl' => $o->date->toDateString(), 'pekan' => $pekan]) }}" class="p-4 rounded-xl bg-surface-container-lowest shadow-xs flex flex-col justify-between hover:bg-surface-container-low transition-colors">
<div class="flex items-center justify-between mb-2">
<span class="px-2.5 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm">{{ Fmt::dateShort($o->date) }}</span>
<span class="font-label-sm text-label-sm font-semibold text-primary">{{ Fmt::hhmm($o->start_time) }} WIB</span>
</div>
<div class="font-headline-sm text-[16px] text-on-surface font-bold">{{ $o->subject ?: 'Sesi Les Privat' }}@if($o->topic) <span class="font-normal text-on-surface-variant text-sm">• {{ $o->topic }}</span>@endif</div>
<div class="font-body-sm text-body-sm text-on-surface-variant mt-1">{{ $o->tutor->name ?? 'Tutor belum ditentukan' }} • {{ Fmt::method($o->method) }}</div>
<div class="mt-3 pt-2.5 flex items-center justify-between font-label-sm text-label-sm {{ $o->parent_confirmed ? 'text-secondary' : 'text-amber-700' }}">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">{{ $o->parent_confirmed ? 'event_available' : 'hourglass_top' }}</span><span>{{ $o->parent_confirmed ? 'Jadwal Terkonfirmasi' : 'Menunggu Konfirmasi' }}</span></span>
<span class="material-symbols-outlined text-[16px] text-outline">chevron_right</span>
</div>
</a>
@endforeach
</div>
@endif
</div>
</div>

{{-- ---------- KANAN ---------- --}}
<div class="lg:col-span-5 space-y-6">

{{-- Formulir ganti waktu (terbuka saat tombol "Ajukan ..." ditekan) --}}
<div class="rounded-2xl bg-surface-container-lowest p-6 shadow-sm space-y-5 transition-all opacity-50 pointer-events-none" id="reschedule-action-card">
<div class="flex items-center justify-between pb-1">
<div class="flex items-center gap-2.5">
<div class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center"><span class="material-symbols-outlined text-[20px]">edit_calendar</span></div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Formulir Ajukan Ganti Waktu</h3>
<p class="font-label-sm text-label-sm text-on-surface-variant" id="resched-title">Pilih sesi lalu tekan "Ajukan Perubahan Waktu"</p>
</div>
</div>
<button class="p-1 rounded-lg hover:bg-surface-container text-on-surface-variant transition-colors" onclick="closeResched()" title="Tutup Formulir" type="button"><span class="material-symbols-outlined text-[20px]">close</span></button>
</div>
<div class="space-y-4">
<div class="space-y-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px] text-primary">event</span><span>Pilih Tanggal Alternatif yang Diinginkan</span></label>
<div class="relative">
<select id="resched-date" class="w-full h-11 px-3.5 pr-10 rounded-xl bg-surface-container-low text-on-surface font-body-md text-body-md appearance-none focus:outline-none focus:ring-2 focus:ring-primary shadow-xs">
@foreach($dateOptions as $d)<option value="{{ $d['v'] }}">{{ $d['t'] }}</option>@endforeach
</select>
<span class="material-symbols-outlined text-[20px] text-on-surface-variant absolute right-3 top-3 pointer-events-none">expand_more</span>
</div>
</div>
<div class="space-y-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px] text-primary">schedule</span><span>Pilih Slot Waktu Pengganti</span></label>
<div class="grid grid-cols-3 gap-2">
@foreach($slots as $sl)
<button type="button" data-slot="{{ $sl['t'] }}" onclick="selectSlot(this)" class="slot-btn p-2.5 rounded-xl text-center font-label-md text-label-md transition-all {{ $sl['t'] === '15:30' ? 'bg-primary-container text-on-primary-container shadow-xs' : 'bg-surface-container-low hover:bg-surface-container text-on-surface' }}">
<div class="text-[11px] opacity-75 font-normal">{{ $sl['l'] }}</div><div class="font-semibold">{{ $sl['t'] }} WIB</div>
</button>
@endforeach
</div>
</div>
<div class="space-y-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Alasan Penyesuaian Waktu</label>
<div class="flex flex-wrap gap-2 pt-0.5">
@foreach($reasons as $r)
<button class="reschedule-chip px-3 py-1.5 rounded-lg bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm hover:bg-surface-container-highest transition-colors" onclick="selectReasonChip(this)" type="button">{{ $r }}</button>
@endforeach
</div>
</div>
<div class="space-y-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Catatan Khusus untuk <span id="resched-tutor">Tutor</span> &amp; Admin</label>
<textarea id="resched-note" class="w-full p-3 rounded-xl bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-on-surface-variant/50" placeholder="Contoh: {{ $child->name }} ada kegiatan sekolah sampai jam 16:30, mohon sesi digeser ke jam 17:00..." rows="3"></textarea>
</div>
<div class="pt-2">
<button class="w-full h-11 rounded-xl bg-primary text-on-primary font-label-lg text-label-lg hover:bg-primary-container transition-all shadow-xs flex items-center justify-center gap-2" id="btnSendResched" onclick="submitResched()" type="button"><span class="material-symbols-outlined text-[20px]">send</span><span>Kirim Pengajuan ke Tutor &amp; Cabang</span></button>
<p class="font-label-sm text-label-sm text-center text-on-surface-variant mt-2">Konfirmasi persetujuan tutor akan dikabari via WhatsApp.</p>
</div>
</div>
</div>

{{-- Paket belajar --}}
<div class="p-5 rounded-2xl bg-surface-container-lowest shadow-sm space-y-4">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-9 h-9 rounded-xl bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center"><span class="material-symbols-outlined text-[20px]">inventory_2</span></div>
<div>
<div class="font-label-lg text-label-lg text-on-surface font-bold">Paket Belajar Aktif</div>
<div class="font-label-sm text-label-sm text-on-surface-variant">{{ $child->package ?: 'Paket Reguler' }}</div>
</div>
</div>
<span class="px-2.5 py-1 rounded-full bg-secondary-fixed/40 text-on-secondary-fixed font-label-sm text-label-sm font-semibold">{{ ucfirst($child->status ?? 'aktif') }}</span>
</div>
<div class="space-y-2">
<div class="flex items-center justify-between font-label-md text-label-md">
<span class="text-on-surface-variant">Sesi Terpakai: <strong class="text-on-surface font-bold">{{ $quota['used'] }} / {{ $quota['total'] }} Sesi</strong></span>
<span class="text-primary font-bold">Sisa: {{ max(0, $quota['total'] - $quota['used']) }} Sesi</span>
</div>
<div class="w-full h-3 rounded-full bg-surface-container overflow-hidden"><div class="h-full bg-primary rounded-full" style="width: {{ $quota['pct'] }}%;"></div></div>
<div class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1.5 pt-0.5"><span class="material-symbols-outlined text-[15px] text-amber-600">info</span><span>Siklus {{ Fmt::MONTHS[now()->month] }} {{ now()->year }}. Kuota baru diperbarui otomatis tanggal 1 setiap bulan.</span></div>
</div>
<a class="w-full py-2.5 rounded-xl bg-surface-container-high hover:bg-surface-container-highest text-primary font-label-md text-label-md flex items-center justify-center gap-1.5 transition-colors" href="{{ PortalContext::wa(null, 'Halo Admin, saya ingin memperpanjang paket les ' . $child->name . '.') }}" target="_blank"><span class="material-symbols-outlined text-[18px]">add_task</span><span>Perpanjang Sesi Les</span></a>
</div>

{{-- Admin / CS --}}
<div class="p-5 rounded-2xl bg-surface-container-low shadow-xs flex items-center justify-between gap-4">
<div class="flex items-center gap-3">
<div class="w-11 h-11 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-bold">{{ mb_strtoupper(mb_substr($admin->name ?? 'A', 0, 1)) }}</div>
<div>
<div class="font-label-lg text-label-lg text-on-surface font-bold">{{ $admin->name ?? 'Admin Cabang' }}</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">{{ config('opc.cs_role', 'Customer Care & Penjadwalan') }}</div>
</div>
</div>
<a class="px-3.5 py-2 rounded-xl bg-surface-container-lowest hover:bg-surface-container text-on-surface font-label-md text-label-md shadow-xs flex items-center gap-1.5 transition-colors shrink-0" href="{{ $adminWa }}" target="_blank"><span class="material-symbols-outlined text-[18px] text-secondary">support_agent</span><span>Bantuan CS</span></a>
</div>

</div>
</div>
</div>
</div></main></div>

<script src="{{ asset('js/opc.js') }}"></script>
<script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});
const BASE = {!! json_encode(url('/portal/jadwal')) !!};
const R = {id: null, minutes: 90, slot: '15:30', reason: 'Lainnya'};
const ACTIVE_SLOT = ['bg-primary-container', 'text-on-primary-container', 'shadow-xs'];
const IDLE_SLOT = ['bg-surface-container-low', 'text-on-surface'];

document.querySelectorAll('button[aria-label="Pemberitahuan"]').forEach(b => b.addEventListener('click', () => OPC.toast({!! json_encode($notifText ?? 'Tidak ada pemberitahuan baru.') !!}, true)));
document.querySelectorAll('a[data-path="profil-siswa"]').forEach(a => a.addEventListener('click', e => { e.preventDefault();
  OPC.dialog({title: 'Profil Siswa', desc: 'Data tercatat di administrasi cabang.', fields: [
    {name: 'a', label: 'Nama', value: {!! json_encode($child->name) !!}}, {name: 'b', label: 'Jenjang / Sekolah', value: {!! json_encode($child->grade . ' • ' . $child->school) !!}},
    {name: 'c', label: 'Program', value: {!! json_encode($child->program) !!}}, {name: 'd', label: 'Tutor', value: {!! json_encode($child->tutor->name ?? '-') !!}}, {name: 'e', label: 'Alamat', value: {!! json_encode($child->address) !!}}], submit: 'Tutup', onSubmit: async () => {}}); }));

function toggleStrip(show) {
  document.getElementById('week-strip').style.display = show ? '' : 'none';
  const on = ['bg-surface-container-lowest', 'text-primary', 'shadow-xs'], off = ['text-on-surface-variant'];
  const w = document.getElementById('btn-week'), l = document.getElementById('btn-list');
  [w, l].forEach(b => { b.classList.remove(...on, ...off); });
  (show ? w : l).classList.add(...on); (show ? l : w).classList.add(...off);
}

async function confirmSession(id) {
  try { const j = await OPC.post(BASE + '/' + id + '/konfirmasi', {}); OPC.toast(j.message, true); setTimeout(() => location.reload(), 1200); } catch (e) {}
}

function openResched(btn) {
  R.id = btn.dataset.id; R.minutes = parseInt(btn.dataset.minutes) || 90;
  document.getElementById('resched-title').textContent = 'Reschedule Sesi ' + (btn.dataset.title || 'Les');
  document.getElementById('resched-tutor').textContent = btn.dataset.tutor || 'Tutor';
  const sel = document.getElementById('resched-date');
  if ([...sel.options].some(o => o.value === btn.dataset.date)) sel.value = btn.dataset.date;
  const card = document.getElementById('reschedule-action-card');
  card.classList.remove('opacity-50', 'pointer-events-none');
  card.scrollIntoView({behavior: 'smooth', block: 'nearest'});
}
function closeResched() { document.getElementById('reschedule-action-card').classList.add('opacity-50', 'pointer-events-none'); R.id = null; }

function selectSlot(el) {
  R.slot = el.dataset.slot;
  document.querySelectorAll('.slot-btn').forEach(b => { b.classList.remove(...ACTIVE_SLOT); b.classList.add(...IDLE_SLOT); });
  el.classList.remove(...IDLE_SLOT); el.classList.add(...ACTIVE_SLOT);
}
function selectReasonChip(el) {
  R.reason = el.textContent.trim();
  document.querySelectorAll('.reschedule-chip').forEach(c => { c.classList.remove('bg-primary-container', 'text-on-primary-container'); c.classList.add('bg-surface-container-high', 'text-on-surface-variant'); });
  el.classList.remove('bg-surface-container-high', 'text-on-surface-variant'); el.classList.add('bg-primary-container', 'text-on-primary-container');
}

async function submitResched() {
  if (!R.id) return OPC.toast('Pilih sesi yang ingin diubah waktunya.', false);
  const [h, m] = R.slot.split(':').map(Number), e = new Date(2000, 0, 1, h, m + R.minutes);
  const end = String(e.getHours()).padStart(2, '0') + ':' + String(e.getMinutes()).padStart(2, '0');
  try {
    const j = await OPC.post(BASE + '/' + R.id + '/reschedule', {date: document.getElementById('resched-date').value, start_time: R.slot, end_time: end, reason: R.reason, note: document.getElementById('resched-note').value});
    OPC.done(j, 'reload');
  } catch (err) {}
}
</script>
</body></html>
