<!DOCTYPE html><html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}"><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta content="web_dashboard" name="shell-type"><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<style>@@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{colors:{"on-tertiary-fixed-variant":"#2f2ebe","on-error-container":"#93000a","on-secondary-fixed":"#00201d","tertiary-fixed":"#e1e0ff","surface-container-highest":"#dae2fd","surface-container-low":"#f2f3ff","secondary":"#006a61","inverse-surface":"#283044","error":"#ba1a1a","secondary-fixed-dim":"#6bd8cb","surface-bright":"#faf8ff","error-container":"#ffdad6","tertiary-container":"#585be6","on-primary":"#ffffff","on-secondary-fixed-variant":"#005049","on-error":"#ffffff","primary":"#004ac6","surface-container":"#eaedff","surface-variant":"#dae2fd","on-surface-variant":"#434655","outline":"#737686","tertiary":"#3e3fcc","surface-tint":"#0053db","background":"#faf8ff","on-tertiary":"#ffffff","surface-container-lowest":"#ffffff","secondary-fixed":"#89f5e7","primary-fixed-dim":"#b4c5ff","primary-container":"#2563eb","on-primary-fixed":"#00174b","outline-variant":"#c3c6d7","inverse-primary":"#b4c5ff","surface-dim":"#d2d9f4","on-primary-fixed-variant":"#003ea8","on-background":"#131b2e","primary-fixed":"#dbe1ff","on-primary-container":"#eeefff","on-tertiary-fixed":"#07006c","surface-container-high":"#e2e7ff","on-tertiary-container":"#f1eeff","inverse-on-surface":"#eef0ff","on-secondary":"#ffffff","tertiary-fixed-dim":"#c0c1ff","on-surface":"#131b2e","surface":"#faf8ff","secondary-container":"#86f2e4","on-secondary-container":"#006f66"},borderRadius:{DEFAULT:"0.25rem",lg:"0.5rem",xl:"0.75rem",full:"9999px"},spacing:{"space-sm":"0.5rem","space-md":"1rem","space-lg":"1.5rem","space-xl":"2rem","gutter-mobile":"1rem","margin-mobile":"1rem",gutter:"1.5rem","space-xs":"0.25rem",margin:"2rem"},fontFamily:{"headline-sm":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"],"headline-xl":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"body-md":["Plus Jakarta Sans"],"display-lg-mobile":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"body-sm":["Plus Jakarta Sans"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"label-lg":["Plus Jakarta Sans"],"label-sm":["Plus Jakarta Sans"],"label-md":["Plus Jakarta Sans"]},fontSize:{"headline-sm":["18px",{lineHeight:"26px",fontWeight:"600"}],"headline-md":["20px",{lineHeight:"28px",fontWeight:"600"}],"headline-xl":["32px",{lineHeight:"40px",letterSpacing:"-0.015em",fontWeight:"700"}],"body-lg":["16px",{lineHeight:"24px",fontWeight:"400"}],"body-md":["14px",{lineHeight:"20px",fontWeight:"400"}],"display-lg-mobile":["30px",{lineHeight:"38px",letterSpacing:"-0.02em",fontWeight:"700"}],"display-lg":["40px",{lineHeight:"48px",letterSpacing:"-0.02em",fontWeight:"700"}],"body-sm":["13px",{lineHeight:"18px",fontWeight:"400"}],"headline-xl-mobile":["24px",{lineHeight:"32px",letterSpacing:"-0.015em",fontWeight:"700"}],"headline-lg":["24px",{lineHeight:"32px",letterSpacing:"-0.01em",fontWeight:"600"}],"label-lg":["14px",{lineHeight:"20px",letterSpacing:"0.01em",fontWeight:"600"}],"label-sm":["11px",{lineHeight:"14px",letterSpacing:"0.03em",fontWeight:"600"}],"label-md":["12px",{lineHeight:"16px",letterSpacing:"0.02em",fontWeight:"600"}]}}}};</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased">

@php
    use Carbon\Carbon;
    $monShort = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    $focusDate = Carbon::parse($focus)->toDateString();
    $pendingDate = $pending ? Carbon::parse($pending->date)->toDateString() : null;

    // Sesi yang jadi target form "Ajukan Ganti Waktu": sesi menunggu konfirmasi, atau sesi pertama di hari terpilih
    $target = $pending ?: $daySessions->first();
    $targetJson = $target ? ['id' => $target->id, 'minutes' => (int) \App\Support\Fmt::minutes($target->start_time, $target->end_time)] : null;

    // Paket: tanggal berakhir (dibaca dari $quota['end'] atau $child->package_end kalau ada; kalau tidak ada, info tanggal disembunyikan)
    $endRaw = $quota['end'] ?? ($child->package_end ?? null);
    $pkgEnd = $endRaw ? Carbon::parse($endRaw)->endOfDay() : null;
    $pkgExpired = $pkgEnd ? $pkgEnd->isPast() : false;
@endphp

@include('siswa._sidebar', ['active' => 'jadwal'])<div class="pl-64"><header class="fixed top-0 left-64 right-0 h-16 bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40"><div class="h-16 w-full px-8 flex items-center justify-between border-b border-surface-container-high/60"><div class="flex items-center gap-space-md"><div class="font-headline-sm text-headline-sm text-on-surface font-semibold tracking-tight">Portal Orang Tua &amp; Siswa</div><span class="text-outline-variant">•</span><div class="flex items-center gap-2 px-3.5 py-1.5 bg-surface-container-low rounded-full shadow-xs"><span class="material-symbols-outlined text-primary text-[18px]">school</span><span class="font-label-md text-label-md text-on-surface">Profil Aktif: <strong class="text-primary font-bold">{{ $child->name }}</strong> ({{ $child->grade }})</span></div></div><div class="flex items-center gap-4"><button aria-label="Pemberitahuan" class="relative p-2.5 rounded-xl text-on-surface-variant bg-surface-container-low hover:bg-surface-container hover:text-on-surface transition-colors shadow-xs" type="button"><span class="material-symbols-outlined text-[20px]">notifications</span><span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-error ring-2 ring-surface"></span></button><div class="flex items-center gap-space-sm pl-2 border-l border-surface-container-high"><div class="text-right hidden sm:block"><div class="font-label-lg text-label-lg text-on-surface font-semibold leading-none">{{ \App\Support\Fmt::shortName(auth()->user()->name) !== "" ? preg_replace("/\s+(Kusumawardhani|Syakieb)$/", "", auth()->user()->name) : "" }}</div><div class="font-label-sm text-label-sm text-on-surface-variant mt-1">Wali Murid • {{ auth()->user()->branch }}</div></div><div class="w-9 h-9 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-bold text-sm shadow-xs"><span class="material-symbols-outlined text-[20px]">person</span></div></div></div></div></header><main class="relative w-full pt-16 bg-surface min-h-screen"><div class="flex flex-col w-full">

<script>
    document.addEventListener("DOMContentLoaded", function() {
      const activeLink = document.querySelector('nav a[data-path="jadwal-les"]');
      if (activeLink) {
        activeLink.classList.remove("text-on-surface-variant", "hover:bg-surface-container-high", "hover:text-on-surface");
        activeLink.classList.add("bg-primary-container", "text-on-primary-container", "font-semibold", "shadow-sm");
        const icon = activeLink.querySelector('.material-symbols-outlined');
        if (icon) icon.style.fontVariationSettings = "'FILL' 1";
      }
    });

    function toggleRescheduleModal(show) {
      const modal = document.getElementById('reschedule-action-card');
      if (show) {
        modal.classList.remove('opacity-50', 'pointer-events-none');
        modal.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      } else {
        modal.classList.add('opacity-50', 'pointer-events-none');
      }
    }

    function selectReasonChip(element) {
      document.querySelectorAll('.reschedule-chip').forEach(c => {
        c.classList.remove('bg-primary-container', 'text-on-primary-container');
        c.classList.add('bg-surface-container-high', 'text-on-surface-variant');
      });
      element.classList.remove('bg-surface-container-high', 'text-on-surface-variant');
      element.classList.add('bg-primary-container', 'text-on-primary-container');
      window.__reason = element.textContent.trim();
    }

    function selectSlot(btn) {
      document.querySelectorAll('.slot-btn').forEach(b => {
        b.classList.remove('bg-primary-container', 'text-on-primary-container', 'shadow-xs');
        b.classList.add('bg-surface-container-low', 'text-on-surface');
      });
      btn.classList.remove('bg-surface-container-low', 'text-on-surface');
      btn.classList.add('bg-primary-container', 'text-on-primary-container', 'shadow-xs');
      window.__slot = btn.dataset.slot;
    }
  </script>

<div class="px-8 py-8 space-y-7 max-w-[1540px] mx-auto w-full">

<!-- Judul halaman -->
<div class="pb-2">
<div class="space-y-1.5"><div class="flex items-center gap-2 text-xs text-slate-500 font-medium">
<span>Portal Orang Tua &amp; Siswa</span>
<span class="text-slate-300 font-bold">/</span>
<span class="text-blue-600 font-semibold">Jadwal &amp; Konfirmasi Sesi</span>
</div>
<h1 class="text-2xl font-bold tracking-tight text-slate-900">Jadwal Les &amp; Konfirmasi Sesi</h1>
<p class="text-xs text-slate-500 max-w-2xl">
Pantau kalender mingguan les {{ $child->name }}, konfirmasi pembaruan jadwal tutor, atau ajukan penyesuaian waktu.
</p></div>
</div>

<!-- Navigasi pekan -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 p-4 rounded-2xl bg-surface-container-lowest shadow-sm">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[24px]">calendar_month</span>
</div>
<div>
<div class="font-headline-sm text-headline-sm text-on-surface tracking-tight">{{ \App\Support\Fmt::period($weekStart) }}</div>
<div class="font-label-sm text-label-sm text-on-surface-variant">Pekan {{ $weekStart->weekOfMonth }} • {{ $weekStart->day }} – {{ \App\Support\Fmt::dateLong($weekStart->copy()->endOfWeek()) }}</div>
</div>
<div class="flex items-center gap-1 ml-4 pl-4 bg-surface-container-low py-1 px-1.5 rounded-xl">
<button class="p-1.5 rounded-lg text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-colors" title="Minggu Sebelumnya" type="button">
<span class="material-symbols-outlined text-[20px]">chevron_left</span>
</button>
<button class="px-3 py-1 rounded-lg text-on-surface font-label-md text-label-md hover:bg-surface-container-high transition-colors" type="button">Hari Ini</button>
<button class="p-1.5 rounded-lg text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-colors" title="Minggu Berikutnya" type="button">
<span class="material-symbols-outlined text-[20px]">chevron_right</span>
</button>
</div>
</div>
<div class="flex items-center gap-1 bg-surface-container-low p-1 rounded-xl self-start md:self-auto">
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg bg-surface-container-lowest text-primary font-label-md text-label-md shadow-xs transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">view_week</span>
<span>Tampilan Mingguan</span>
</button>
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">view_agenda</span>
<span>Daftar Hari</span>
</button>
</div>
</div>

<!-- Banner butuh konfirmasi -->
@if($pending)
<div class="p-5 rounded-2xl bg-gradient-to-r from-amber-50 to-orange-50/70 text-on-surface shadow-xs transition-all flex flex-col md:flex-row md:items-center justify-between gap-4" id="alert-action-required">
<div class="flex items-start gap-4">
<div class="w-10 h-10 rounded-xl bg-amber-500/15 text-amber-700 flex items-center justify-center shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">notification_important</span>
</div>
<div class="space-y-1">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-amber-900 font-bold tracking-wide">{{ $pendingCount }} Sesi Menunggu Konfirmasi Anda</span>
<span class="px-2 py-0.5 rounded-full bg-amber-200/60 text-amber-900 font-label-sm text-label-sm">Batas Respon: {{ \App\Support\Fmt::dateShort($pending->date) }}</span>
</div>
<p class="font-body-md text-body-md text-amber-950/80">
<strong>{{ $pending->subject ?? "-" }}</strong> • {{ \App\Support\Fmt::dateShort($pending->date) }} (<span class="font-semibold text-primary-container">{{ \App\Support\Fmt::hhmm($pending->start_time) . " – " . \App\Support\Fmt::hhmm($pending->end_time) . " WIB" }}</span>). Jadwal diajukan oleh <strong>{{ $pending->tutor->name ?? "-" }}</strong>, mohon konfirmasi atau ajukan waktu lain.
</p>
</div>
</div>
<div class="flex items-center gap-2.5 shrink-0 self-end md:self-center"><button class="px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold shadow-sm transition-all flex items-center gap-2" onclick="confirmSessionSchedule()" type="button">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span>Konfirmasi Sekarang</span>
</button>
<button class="px-4 py-2.5 rounded-xl bg-white text-slate-700 border border-slate-200 hover:bg-slate-50 text-xs font-medium transition-all shadow-sm flex items-center gap-2" onclick="toggleRescheduleModal(true)" type="button">
<span class="material-symbols-outlined text-[18px]">edit_calendar</span>
<span>Ajukan Jadwal Lain</span>
</button></div>
</div>
@endif

<!-- Strip 7 hari (dari data pekan yang tampil) -->
<div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-7 gap-3">
@foreach($weekJson as $w)
@php
    $d = Carbon::parse(data_get($w, 'date'));
    $cnt = (int) data_get($w, 'count', 0);
    $isToday = $d->isToday();
    $isFocus = $d->toDateString() === $focusDate;
    $hasPending = $pendingDate === $d->toDateString();
    $isPast = $d->isPast() && !$isToday;
@endphp
<a href="{{ request()->fullUrlWithQuery(['tgl' => $d->toDateString(), 'page' => null]) }}" class="p-3.5 rounded-2xl relative overflow-hidden transition-all cursor-pointer flex flex-col justify-between h-28 {{ $isFocus ? 'bg-surface-container-low ring-2 ring-primary shadow-md' : 'bg-surface-container-lowest hover:bg-surface-container-low shadow-xs' }}">
@if($hasPending)
<div class="absolute -top-1 right-2">
<span class="px-2 py-0.5 rounded-b-lg bg-amber-500 text-white font-label-sm text-[10px] font-bold shadow-xs flex items-center gap-0.5">
<span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> 1 Respon
</span>
</div>
@endif
<div class="flex items-center justify-between {{ $hasPending ? 'mt-1' : '' }}">
<span class="font-label-md text-label-md font-semibold {{ $isFocus ? 'text-primary font-bold' : 'text-on-surface-variant' }}">{{ \App\Support\Fmt::dayName($d) }}{{ $isToday ? ' (Hari Ini)' : '' }}</span>
@if(!$hasPending)<span class="w-2 h-2 rounded-full {{ $cnt > 0 ? ($isPast ? 'bg-secondary' : 'bg-primary') : 'bg-outline-variant' }}"></span>@endif
</div>
<div class="font-headline-lg text-headline-lg font-bold flex items-baseline gap-1 {{ $isFocus ? 'text-primary' : 'text-on-surface' }}">
{{ $d->day }} <span class="font-label-sm text-label-sm font-normal text-on-surface-variant">{{ $monShort[$d->month - 1] }}</span>
</div>
<div class="font-label-sm text-label-sm {{ $cnt > 0 ? ($isFocus ? 'text-primary font-semibold' : 'text-on-surface font-medium') : 'text-on-surface-variant' }}">
@if($cnt > 0){{ $cnt }} Sesi{{ $isPast ? ' Selesai' : '' }}@else Libur Les @endif
</div>
</a>
@endforeach
</div>

<!-- Grid utama -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-7 items-start">

<!-- KIRI: sesi hari terpilih -->
<div class="lg:col-span-7 space-y-6">
<div class="flex items-center justify-between">
<div>
<h2 class="font-headline-md text-headline-md text-on-surface">Sesi Hari {{ \App\Support\Fmt::dayName($focus) }}, {{ \App\Support\Fmt::dateLong($focus) }}</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">{{ $daySessions->count() }} Sesi dijadwalkan untuk {{ $child->name }}</p>
</div>
<span class="px-3 py-1 rounded-full bg-primary-container/10 text-primary font-label-md text-label-md font-semibold">Status: {{ $pendingCount ? "Menunggu " . $pendingCount . " Tindakan" : "Semua Terkonfirmasi" }}</span>
</div>

@forelse($daySessions as $s)

@if(!$s->parent_confirmed)
<!-- Sesi menunggu konfirmasi -->
<div class="rounded-2xl bg-surface-container-lowest p-6 shadow-sm relative overflow-hidden transition-all hover:shadow-md">
<div class="absolute left-0 top-0 bottom-0 w-1.5 bg-amber-500"></div>
<div class="pl-2 space-y-5">
<div class="flex flex-wrap items-center justify-between gap-3">
<div class="flex items-center gap-2">
<span class="px-3 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-md text-label-md font-semibold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px]">update</span>
<span>Jadwal Diperbarui Tutor</span>
</span>
<span class="session-pending-status px-3 py-1 rounded-full bg-amber-100 text-amber-900 font-label-md text-label-md font-semibold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px]">hourglass_top</span>
<span>Menunggu Respon Wali Murid</span>
</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Sesi Ke-{{ $s->session_no ?: 1 }}</span>
</div>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-xl bg-surface-container-low">
<div class="space-y-1">
<div class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold">Mata Pelajaran</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">{{ $s->subject }}</h3>
<div class="font-body-sm text-body-sm text-on-surface-variant">Fokus Materi: {{ $s->topic ?: $s->subject }}</div>
</div>
<div class="bg-surface-container-lowest p-3 rounded-xl shadow-xs shrink-0 sm:text-right">
<div class="font-label-sm text-label-sm text-on-surface-variant">Jadwal: {{ \App\Support\Fmt::dateShort($s->date) }}</div>
<div class="flex items-center gap-1.5 text-primary font-headline-sm text-headline-sm font-bold mt-0.5">
<span class="material-symbols-outlined text-[20px]">schedule</span>
<span>{{ \App\Support\Fmt::hhmm($s->start_time) }} – {{ \App\Support\Fmt::hhmm($s->end_time) }} WIB</span>
</div>
<div class="font-label-sm text-label-sm text-secondary font-medium mt-0.5">{{ \App\Support\Fmt::minutes($s->start_time, $s->end_time) }} Menit</div>
</div>
</div>
<div class="flex items-center justify-between flex-wrap gap-4 pt-1">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-bold text-sm shrink-0">{{ \App\Support\Fmt::initials($s->tutor->name ?? "-") }}</div>
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-on-surface font-bold">{{ $s->tutor->name ?? "-" }}</span>
<span class="px-2 py-0.5 rounded-md bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">⭐ {{ $s->tutor->rating ?? "-" }} ({{ $s->tutor->reviews ?? 0 }} Ulasan)</span>
</div>
<div class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface-variant mt-0.5">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary">verified</span>
<span>{{ $s->tutor->headline ?? "-" }}</span>
</span>
<span>•</span>
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-secondary">home_pin</span>
<span>{{ \App\Support\Fmt::method($s->method) }}{{ $s->location ? " (" . $s->location . ")" : "" }}</span>
</span>
</div>
</div>
</div>
<a class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md" href="{{ \App\Support\Fmt::waLink($s->tutor->phone ?? "") }}" target="_blank">
<span class="material-symbols-outlined text-[16px] text-secondary">chat</span>
<span>Chat {{ \App\Support\Fmt::shortName($s->tutor->name ?? "Tutor") }}</span>
</a>
</div>
<div class="p-3.5 rounded-xl bg-surface-container-low flex items-start gap-3">
<span class="material-symbols-outlined text-tertiary-container text-[20px] shrink-0 mt-0.5">format_quote</span>
<p class="font-body-sm text-body-sm text-on-surface italic">{{ $s->notes ?: "Mohon konfirmasi jadwal sesi ini. Terima kasih." }}</p>
</div>
<div class="flex flex-wrap items-center gap-3 pt-2"><button class="flex-1 min-w-[200px] h-11 px-5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold shadow-sm transition-all flex items-center justify-center gap-2" onclick="confirmSessionSchedule({{ $s->id }})" type="button">
<span class="material-symbols-outlined text-[20px]">check_circle</span>
<span>Konfirmasi Jadwal Ini</span>
</button>
<button class="h-11 px-4 rounded-xl bg-white text-slate-700 border border-slate-200 hover:bg-slate-50 text-xs font-medium transition-colors flex items-center gap-2 shadow-sm" onclick="toggleRescheduleModal(true)" type="button">
<span class="material-symbols-outlined text-[20px]">calendar_month</span>
<span>Ajukan Perubahan Waktu</span>
</button></div>
</div>
</div>

@else
<!-- Sesi terkonfirmasi -->
<div class="rounded-2xl bg-surface-container-lowest p-6 shadow-sm relative overflow-hidden transition-all hover:shadow-md">
<div class="absolute left-0 top-0 bottom-0 w-1.5 bg-secondary"></div>
<div class="pl-2 space-y-4">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="px-3 py-1 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed text-label-md font-semibold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span>Terkonfirmasi</span>
</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant text-label-sm font-medium">Sesi Ke-{{ $s->session_no ?: 1 }}</span>
</div>
<div class="font-headline-sm text-headline-sm text-on-surface font-bold">{{ \App\Support\Fmt::hhmm($s->start_time) }} – {{ \App\Support\Fmt::hhmm($s->end_time) }} WIB</div>
</div>
<div>
<div class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold">Mata Pelajaran</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">{{ $s->subject }}</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Topik: {{ $s->topic ?: $s->subject }}</p>
</div>
<div class="flex items-center justify-between flex-wrap gap-4 pt-1">
<div class="flex items-center gap-3">
<div class="w-11 h-11 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-bold text-sm shrink-0">{{ \App\Support\Fmt::initials($s->tutor->name ?? "-") }}</div>
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-on-surface font-bold">{{ $s->tutor->name ?? "-" }}</span>
<span class="px-2 py-0.5 rounded-md bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">⭐ {{ $s->tutor->rating ?? "-" }}</span>
</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">{{ $s->tutor->headline ?? "-" }} • {{ \App\Support\Fmt::method($s->method) }}{{ $s->location && $s->method !== "online" ? " (" . $s->location . ")" : "" }}</div>
</div>
</div>
<a class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md" href="{{ \App\Support\Fmt::waLink($s->tutor->phone ?? "") }}" target="_blank">
<span class="material-symbols-outlined text-[16px] text-secondary">chat</span>
<span>Chat {{ \App\Support\Fmt::shortName($s->tutor->name ?? "Tutor") }}</span>
</a>
</div>
@if($s->method === 'online')
@php $zoomUrl = ($s->location && str_starts_with($s->location, 'http')) ? $s->location : 'https://zoom.us/'; @endphp
<div class="p-3.5 rounded-xl bg-surface-container-low flex flex-col sm:flex-row sm:items-center justify-between gap-3">
<div class="flex items-center gap-3 min-w-0">
<div class="w-9 h-9 rounded-lg bg-primary-container text-on-primary-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">videocam</span>
</div>
<div class="min-w-0">
<div class="font-label-sm text-label-sm text-on-surface-variant">Tautan Ruang Belajar Virtual</div>
<div class="font-body-md text-body-md text-primary font-semibold truncate">{{ $zoomUrl }}</div>
</div>
</div>
<div class="flex items-center gap-2 shrink-0">
<button class="p-2 rounded-lg bg-surface-container-lowest hover:bg-surface-container text-on-surface transition-colors shadow-xs" onclick="navigator.clipboard.writeText({{ json_encode($zoomUrl) }})" title="Salin Tautan" type="button">
<span class="material-symbols-outlined text-[18px]">content_copy</span>
</button>
<a class="px-3.5 py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:bg-primary-container transition-colors shadow-xs flex items-center gap-1.5" href="{{ $zoomUrl }}" target="_blank">
<span class="material-symbols-outlined text-[16px]">open_in_new</span>
<span>Buka Ruang Zoom</span>
</a>
</div>
</div>
@endif
</div>
</div>
@endif

@empty
<div class="text-xs text-slate-400 p-4">Tidak ada sesi pada hari ini.</div>
@endforelse

<!-- Sesi lainnya pekan ini (dari data, bukan hardcode) -->
<div class="space-y-3 pt-2">
<div class="flex items-center justify-between">
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Sesi Lainnya Pekan Ini</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Total {{ $others->count() }} sesi tersisa</span>
</div>
@if($others->count())
<div class="grid grid-cols-1 md:grid-cols-2 gap-3.5">
@foreach($others as $o)
@php $od = Carbon::parse($o->date); @endphp
<a href="{{ request()->fullUrlWithQuery(['tgl' => $od->toDateString(), 'page' => null]) }}" class="p-4 rounded-xl bg-surface-container-lowest shadow-xs flex flex-col justify-between hover:bg-surface-container-low transition-colors">
<div class="flex items-center justify-between mb-2">
<span class="px-2.5 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm">{{ \App\Support\Fmt::dayName($od) }}, {{ $od->day }} {{ $monShort[$od->month - 1] }}</span>
<span class="font-label-sm text-label-sm font-semibold text-primary">{{ \App\Support\Fmt::hhmm($o->start_time) }} WIB</span>
</div>
<div class="font-headline-sm text-[16px] text-on-surface font-bold">{{ $o->subject }}</div>
<div class="font-body-sm text-body-sm text-on-surface-variant mt-1">{{ $o->tutor->name ?? "-" }} • {{ \App\Support\Fmt::method($o->method) }}</div>
<div class="mt-3 pt-2.5 flex items-center justify-between font-label-sm text-label-sm {{ $o->parent_confirmed ? 'text-secondary' : 'text-amber-700' }}">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">{{ $o->parent_confirmed ? 'event_available' : 'hourglass_top' }}</span>
<span>{{ $o->parent_confirmed ? 'Jadwal Terkonfirmasi' : 'Menunggu Konfirmasi' }}</span>
</span>
<span class="material-symbols-outlined text-[16px] text-outline">chevron_right</span>
</div>
</a>
@endforeach
</div>
@else
<div class="text-xs text-slate-400 p-4 rounded-xl bg-surface-container-lowest">Tidak ada sesi lain di pekan ini.</div>
@endif
</div>
</div>

<!-- KANAN -->
<div class="lg:col-span-5 space-y-6">

<div class="hidden p-5 rounded-2xl bg-secondary-fixed/30 text-on-secondary-fixed shadow-sm items-start gap-3.5 transition-all" id="success-feedback-box">
<div class="w-10 h-10 rounded-xl bg-secondary text-on-secondary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">verified</span>
</div>
<div class="space-y-1">
<div class="font-label-lg text-label-lg font-bold text-on-secondary-fixed">Jadwal Sesi Berhasil Dikonfirmasi!</div>
<p class="font-body-sm text-body-sm text-on-secondary-fixed/90">Terima kasih. Kalender belajar {{ $child->name }} telah diperbarui.</p>
</div>
</div>

<!-- Form ajukan ganti waktu -->
<div class="rounded-2xl bg-surface-container-lowest p-6 shadow-sm space-y-5 transition-all" id="reschedule-action-card">
<div class="flex items-center justify-between pb-1">
<div class="flex items-center gap-2.5">
<div class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">edit_calendar</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Formulir Ajukan Ganti Waktu</h3>
<p class="font-label-sm text-label-sm text-on-surface-variant">Reschedule Sesi {{ $target->subject ?? '' }}</p>
</div>
</div>
<button class="p-1 rounded-lg hover:bg-surface-container text-on-surface-variant transition-colors" onclick="toggleRescheduleModal(false)" title="Tutup Formulir" type="button">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
<div class="space-y-4">
<!-- Date picker -->
<div class="space-y-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-1.5" for="resched-date">
<span class="material-symbols-outlined text-[16px] text-primary">event</span>
<span>Pilih Tanggal Alternatif yang Diinginkan</span>
</label>
<input id="resched-date" type="date" min="{{ now()->toDateString() }}" value="{{ now()->toDateString() }}" class="w-full h-11 px-3.5 rounded-xl bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary shadow-xs">
</div>
<!-- Slot -->
<div class="space-y-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
<span>Pilih Slot Waktu Pengganti</span>
</label>
<div class="grid grid-cols-3 gap-2">
<button class="slot-btn p-2.5 rounded-xl bg-surface-container-low hover:bg-surface-container text-on-surface text-center font-label-md text-label-md transition-all" data-slot="09:00" onclick="selectSlot(this)" type="button">
<div class="text-[11px] opacity-75 font-normal">Pagi</div>
<div class="font-semibold">09:00 WIB</div>
</button>
<button class="slot-btn p-2.5 rounded-xl bg-primary-container text-on-primary-container text-center font-label-md text-label-md shadow-xs transition-all" data-slot="15:30" onclick="selectSlot(this)" type="button">
<div class="text-[11px] opacity-75 font-normal">Sore 1</div>
<div class="font-semibold">15:30 WIB</div>
</button>
<button class="slot-btn p-2.5 rounded-xl bg-surface-container-low hover:bg-surface-container text-on-surface text-center font-label-md text-label-md transition-all" data-slot="17:00" onclick="selectSlot(this)" type="button">
<div class="text-[11px] opacity-75 font-normal">Sore 2</div>
<div class="font-semibold">17:00 WIB</div>
</button>
</div>
</div>
<!-- Alasan -->
<div class="space-y-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Alasan Penyesuaian Waktu</label>
<div class="flex flex-wrap gap-2 pt-0.5">
<button class="reschedule-chip px-3 py-1.5 rounded-lg bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm hover:bg-surface-container-highest transition-colors" onclick="selectReasonChip(this)" type="button">Siswa Kurang Sehat</button>
<button class="reschedule-chip px-3 py-1.5 rounded-lg bg-primary-container text-on-primary-container font-label-sm text-label-sm transition-colors" onclick="selectReasonChip(this)" type="button">Bentrok Ekskul / Sekolah</button>
<button class="reschedule-chip px-3 py-1.5 rounded-lg bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm hover:bg-surface-container-highest transition-colors" onclick="selectReasonChip(this)" type="button">Urusan Keluarga Mendesak</button>
<button class="reschedule-chip px-3 py-1.5 rounded-lg bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm hover:bg-surface-container-highest transition-colors" onclick="selectReasonChip(this)" type="button">Lainnya</button>
</div>
</div>
<!-- Catatan -->
<div class="space-y-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Catatan Tambahan</label>
<textarea id="resched-note" class="w-full p-3 rounded-xl bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-on-surface-variant/50" placeholder="Contoh: Ada try out sekolah sampai jam 16:30, mohon sesi digeser ke jam 17:00..." rows="3"></textarea>
</div>
<div class="pt-2">
<button class="w-full h-11 rounded-xl bg-primary text-on-primary font-label-lg text-label-lg hover:bg-primary-container transition-all shadow-xs flex items-center justify-center gap-2" id="btnSendResched" type="button">
<span class="material-symbols-outlined text-[20px]">send</span>
<span>Kirim Pengajuan</span>
</button></div>
</div>
</div>

<!-- Paket belajar -->
<div class="p-5 rounded-2xl bg-surface-container-lowest shadow-sm space-y-4">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-9 h-9 rounded-xl bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">inventory_2</span>
</div>
<div>
<div class="font-label-lg text-label-lg text-on-surface font-bold">Paket Belajar {{ $pkgExpired ? 'Berakhir' : 'Aktif' }}</div>
<div class="font-label-sm text-label-sm text-on-surface-variant">{{ $child->package ?: "Paket Reguler" }}</div>
</div>
</div>
@if($pkgExpired)
<span class="px-2.5 py-1 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm font-semibold">Kedaluwarsa</span>
@else
<span class="px-2.5 py-1 rounded-full bg-secondary-fixed/40 text-on-secondary-fixed font-label-sm text-label-sm font-semibold">Aktif</span>
@endif
</div>
<div class="space-y-2">
<div class="flex items-center justify-between font-label-md text-label-md">
<span class="text-on-surface-variant">Sesi Terpakai: <strong class="text-on-surface font-bold">{{ $quota["used"] }} / {{ $quota["total"] }} Sesi</strong></span>
<span class="text-primary font-bold">Sisa: {{ max(0, $quota["total"] - $quota["used"]) }} Sesi</span>
</div>
<div class="w-full h-3 rounded-full bg-surface-container overflow-hidden">
<div class="h-full {{ $pkgExpired ? 'bg-outline' : 'bg-primary' }} rounded-full" style="width: {{ $quota["pct"] }}%;"></div>
</div>
@if($pkgEnd)
<div class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1.5 pt-0.5">
<span class="material-symbols-outlined text-[15px] {{ $pkgExpired ? 'text-error' : 'text-amber-600' }}">{{ $pkgExpired ? 'error' : 'info' }}</span>
<span>
@if($pkgExpired)
Paket berakhir pada {{ \App\Support\Fmt::dateLong($pkgEnd) }}. Perpanjang paket untuk melanjutkan les.
@else
Paket berakhir pada {{ \App\Support\Fmt::dateLong($pkgEnd) }}. Anda dapat melakukan perpanjangan paket lebih awal.
@endif
</span>
</div>
@endif
</div>
<a class="w-full py-2.5 rounded-xl bg-surface-container-high hover:bg-surface-container-highest text-primary font-label-md text-label-md flex items-center justify-center gap-1.5 transition-colors" href="#">
<span class="material-symbols-outlined text-[18px]">add_task</span>
<span>Perpanjang Sesi Les</span>
</a>
</div>

</div>
</div>
</div>
</div></main></div>

<script src="{{ asset('js/opc.js') }}"></script><script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});

(function () {
  document.querySelectorAll('button[aria-label="Pemberitahuan"]').forEach(b => b.addEventListener('click', () => OPC.toast({!! json_encode($notifText ?? 'Tidak ada pemberitahuan baru.') !!}, true)));
  document.querySelectorAll('a[data-path="profil-siswa"]').forEach(a => a.addEventListener('click', e => { e.preventDefault();
    OPC.dialog({title: 'Profil Siswa', desc: 'Data tercatat di administrasi cabang.', fields: [
      {name: 'a', label: 'Nama', value: {!! json_encode($child->name) !!}}, {name: 'b', label: 'Jenjang / Sekolah', value: {!! json_encode($child->grade . ' • ' . $child->school) !!}},
      {name: 'c', label: 'Program', value: {!! json_encode($child->program) !!}}, {name: 'd', label: 'Tutor', value: {!! json_encode($child->tutor->name ?? '-') !!}}, {name: 'e', label: 'Alamat', value: {!! json_encode($child->address) !!}}], submit: 'Tutup', onSubmit: async () => {}}); }));
})();

const TARGET = {!! json_encode($targetJson) !!};
const PEND_ID = {!! json_encode($pending->id ?? null) !!};
const BASE_URL = {!! json_encode(url('/portal/jadwal')) !!};

window.__slot = '15:30';
window.__reason = 'Bentrok Ekskul / Sekolah';

// Konfirmasi sesi
window.confirmSessionSchedule = async function (id) {
  try {
    const sid = id || PEND_ID;
    const j = await OPC.post(BASE_URL + '/' + sid + '/konfirmasi', {});
    const box = document.getElementById('success-feedback-box');
    if (box) { box.classList.remove('hidden'); box.classList.add('flex'); }
    setTimeout(() => location.reload(), 1200);
  } catch (e) {}
};

// Kirim pengajuan ganti waktu
(function () {
  const btn = document.getElementById('btnSendResched');
  if (!btn) return;
  btn.addEventListener('click', async () => {
    if (!TARGET) return OPC.toast('Tidak ada sesi yang bisa diajukan.', false);
    const dateEl = document.getElementById('resched-date');
    if (!dateEl.value) return OPC.toast('Pilih tanggal alternatif dulu.', false);
    const today = new Date().toISOString().slice(0, 10);
    if (dateEl.value < today) return OPC.toast('Tanggal tidak boleh sebelum hari ini.', false);
    const start = window.__slot;
    const [h, m] = start.split(':').map(Number);
    const e = new Date(2000, 0, 1, h, m + TARGET.minutes);
    const end = String(e.getHours()).padStart(2, '0') + ':' + String(e.getMinutes()).padStart(2, '0');
    try {
      const j = await OPC.post(BASE_URL + '/' + TARGET.id + '/reschedule', {
        date: dateEl.value, start_time: start, end_time: end,
        reason: window.__reason, note: document.getElementById('resched-note').value
      });
      location.reload();
    } catch (err) {}
  });
})();

// Navigasi pekan
(function () {
  OPC.find('Hari Ini', {sel: 'button'}).forEach(b => b.addEventListener('click', () => { const u = new URL(location.href); u.searchParams.delete('tgl'); u.searchParams.delete('pekan'); location.href = u.toString(); }));
  const shift = n => () => { const u = new URL(location.href); u.searchParams.set('pekan', (parseInt(u.searchParams.get('pekan') || '0') + n)); u.searchParams.delete('tgl'); location.href = u.toString(); };
  document.querySelectorAll('button[title="Minggu Sebelumnya"]').forEach(b => b.addEventListener('click', shift(-1)));
  document.querySelectorAll('button[title="Minggu Berikutnya"]').forEach(b => b.addEventListener('click', shift(1)));
  OPC.on('Daftar Hari', () => window.scrollTo({top: 400, behavior: 'smooth'}), {sel: 'button', exact: false});
  OPC.on('Tampilan Mingguan', () => window.scrollTo({top: 0, behavior: 'smooth'}), {sel: 'button', exact: false});
})();

OPC.on('Perpanjang Sesi Les', () => window.open('https://wa.me/6285868046255?text=' + encodeURIComponent({!! json_encode('Halo Admin, saya ingin memperpanjang paket les ' . $child->name . '.') !!}), '_blank'), {sel: 'a', exact: false});
</script></body></html>