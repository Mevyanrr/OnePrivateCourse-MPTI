<!DOCTYPE html><html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}"><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta content="web_dashboard" name="shell-type"><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"><style>@@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{colors:{"on-tertiary-fixed-variant":"#2f2ebe","on-error-container":"#93000a","on-secondary-fixed":"#00201d","tertiary-fixed":"#e1e0ff","surface-container-highest":"#dae2fd","surface-container-low":"#f2f3ff","secondary":"#006a61","inverse-surface":"#283044","error":"#ba1a1a","secondary-fixed-dim":"#6bd8cb","surface-bright":"#faf8ff","error-container":"#ffdad6","tertiary-container":"#585be6","on-primary":"#ffffff","on-secondary-fixed-variant":"#005049","on-error":"#ffffff","primary":"#004ac6","surface-container":"#eaedff","surface-variant":"#dae2fd","on-surface-variant":"#434655","outline":"#737686","tertiary":"#3e3fcc","surface-tint":"#0053db","background":"#faf8ff","on-tertiary":"#ffffff","surface-container-lowest":"#ffffff","secondary-fixed":"#89f5e7","primary-fixed-dim":"#b4c5ff","primary-container":"#2563eb","on-primary-fixed":"#00174b","outline-variant":"#c3c6d7","inverse-primary":"#b4c5ff","surface-dim":"#d2d9f4","on-primary-fixed-variant":"#003ea8","on-background":"#131b2e","primary-fixed":"#dbe1ff","on-primary-container":"#eeefff","on-tertiary-fixed":"#07006c","surface-container-high":"#e2e7ff","on-tertiary-container":"#f1eeff","inverse-on-surface":"#eef0ff","on-secondary":"#ffffff","tertiary-fixed-dim":"#c0c1ff","on-surface":"#131b2e","surface":"#faf8ff","secondary-container":"#86f2e4","on-secondary-container":"#006f66"},borderRadius:{DEFAULT:"0.25rem",lg:"0.5rem",xl:"0.75rem",full:"9999px"},spacing:{"space-sm":"0.5rem","space-md":"1rem","space-lg":"1.5rem","space-xl":"2rem","gutter-mobile":"1rem","margin-mobile":"1rem",gutter:"1.5rem","space-xs":"0.25rem",margin:"2rem"},fontFamily:{"headline-sm":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"],"headline-xl":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"body-md":["Plus Jakarta Sans"],"display-lg-mobile":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"body-sm":["Plus Jakarta Sans"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"label-lg":["Plus Jakarta Sans"],"label-sm":["Plus Jakarta Sans"],"label-md":["Plus Jakarta Sans"]},fontSize:{"headline-sm":["18px",{lineHeight:"26px",fontWeight:"600"}],"headline-md":["20px",{lineHeight:"28px",fontWeight:"600"}],"headline-xl":["32px",{lineHeight:"40px",letterSpacing:"-0.015em",fontWeight:"700"}],"body-lg":["16px",{lineHeight:"24px",fontWeight:"400"}],"body-md":["14px",{lineHeight:"20px",fontWeight:"400"}],"display-lg-mobile":["30px",{lineHeight:"38px",letterSpacing:"-0.02em",fontWeight:"700"}],"display-lg":["40px",{lineHeight:"48px",letterSpacing:"-0.02em",fontWeight:"700"}],"body-sm":["13px",{lineHeight:"18px",fontWeight:"400"}],"headline-xl-mobile":["24px",{lineHeight:"32px",letterSpacing:"-0.015em",fontWeight:"700"}],"headline-lg":["24px",{lineHeight:"32px",letterSpacing:"-0.01em",fontWeight:"600"}],"label-lg":["14px",{lineHeight:"20px",letterSpacing:"0.01em",fontWeight:"600"}],"label-sm":["11px",{lineHeight:"14px",letterSpacing:"0.03em",fontWeight:"600"}],"label-md":["12px",{lineHeight:"16px",letterSpacing:"0.02em",fontWeight:"600"}]}}}};</script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased"><aside class="fixed left-0 top-0 h-full w-64 bg-surface-container-lowest shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-50 flex flex-col justify-between py-space-lg"><div class="flex flex-col gap-space-lg"><div class="px-space-lg flex items-center gap-space-sm"><div class="w-9 h-9 rounded-xl bg-primary flex items-center justify-center text-on-primary shadow-sm"><span class="material-symbols-outlined text-[22px]">auto_stories</span></div><div><div class="font-headline-sm text-headline-sm text-primary tracking-tight">One Private</div><div class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Portal Edukasi</div></div></div><div class="px-space-md"><div class="px-space-sm py-space-xs mb-space-xs font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Menu Utama</div><nav class="flex flex-col gap-1" data-active-classes="bg-primary-container text-on-primary-container font-headline-sm"><a class="flex items-center gap-3 px-space-md py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all" data-path="beranda" href="{{ route('portal.beranda') }}"><span class="material-symbols-outlined text-[20px]">grid_view</span><span class="font-label-lg text-label-lg">Beranda</span></a><a class="flex items-center gap-3 px-space-md py-2.5 rounded-xl transition-all bg-primary-container text-on-primary-container font-semibold shadow-sm" data-path="jadwal-les" href="{{ route('portal.jadwal') }}"><span class="material-symbols-outlined text-[20px]" style="font-variation-settings: &quot;FILL&quot; 1;">calendar_today</span><span class="font-label-lg text-label-lg">Jadwal Les</span></a><a class="flex items-center gap-3 px-space-md py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all" data-path="presensi-dan-catatan" href="{{ route('portal.presensi') }}"><span class="material-symbols-outlined text-[20px]">history_edu</span><span class="font-label-lg text-label-lg">Presensi &amp; Catatan</span></a><a class="flex items-center gap-3 px-space-md py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all" data-path="riwayat-tagihan" href="{{ route('portal.tagihan') }}"><span class="material-symbols-outlined text-[20px]">receipt_long</span><span class="font-label-lg text-label-lg">Riwayat Tagihan</span></a><a class="flex items-center gap-3 px-space-md py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all" data-path="profil-siswa" href="#"><span class="material-symbols-outlined text-[20px]">badge</span><span class="font-label-lg text-label-lg">Profil Siswa</span></a></nav></div></div><div class="px-space-lg flex flex-col gap-space-sm"><div class="p-space-md bg-surface-container-low rounded-xl flex items-center gap-3"><span class="material-symbols-outlined text-secondary text-[22px]">support_agent</span><div><div class="font-label-md text-label-md text-on-surface">Bantuan Admin</div><div class="font-body-sm text-body-sm text-on-surface-variant">WhatsApp Konsultasi</div></div></div></div></aside><div class="pl-64"><header class="fixed top-0 left-64 right-0 h-16 bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40"><div class="h-16 w-full px-8 flex items-center justify-between border-b border-surface-container-high/60"><div class="flex items-center gap-space-md"><div class="font-headline-sm text-headline-sm text-on-surface font-semibold tracking-tight">Portal Orang Tua &amp; Siswa</div><span class="text-outline-variant">•</span><div class="flex items-center gap-2 px-3.5 py-1.5 bg-surface-container-low hover:bg-surface-container-high rounded-full cursor-pointer transition-colors shadow-xs"><span class="material-symbols-outlined text-primary text-[18px]">school</span><span class="font-label-md text-label-md text-on-surface">Profil Aktif: <strong class="text-primary font-bold">{{ $child->name }}</strong> ({{ $child->grade }})</span><span class="material-symbols-outlined text-on-surface-variant text-[16px]">expand_more</span></div></div><div class="flex items-center gap-4"><button aria-label="Pemberitahuan" class="relative p-2.5 rounded-xl text-on-surface-variant bg-surface-container-low hover:bg-surface-container hover:text-on-surface transition-colors shadow-xs" type="button"><span class="material-symbols-outlined text-[20px]">notifications</span><span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-error ring-2 ring-surface"></span></button><div class="flex items-center gap-space-sm pl-2 border-l border-surface-container-high"><div class="text-right hidden sm:block"><div class="font-label-lg text-label-lg text-on-surface font-semibold leading-none">{{ \App\Support\Fmt::shortName(auth()->user()->name) !== "" ? preg_replace("/\s+(Kusumawardhani|Syakieb)$/", "", auth()->user()->name) : "" }}</div><div class="font-label-sm text-label-sm text-on-surface-variant mt-1">Wali Murid • {{ auth()->user()->branch }}</div></div><div class="w-9 h-9 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-bold text-sm shadow-xs"><span class="material-symbols-outlined text-[20px]">person</span></div></div></div></div></header><main class="relative w-full pt-16 bg-surface min-h-screen"><div class="flex flex-col w-full">
<!-- Interactive Navigation Highlight Script -->
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
      const successFeedback = document.getElementById('success-feedback-box');
      if (show) {
        modal.classList.remove('opacity-50', 'pointer-events-none');
        modal.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      } else {
        modal.classList.add('opacity-50', 'pointer-events-none');
      }
    }

    function confirmSessionSchedule() {
      const successFeedback = document.getElementById('success-feedback-box');
      const pendingBadges = document.querySelectorAll('.session-pending-status');
      const actionBanner = document.getElementById('alert-action-required');

      successFeedback.classList.remove('hidden');
      successFeedback.classList.add('flex');
      
      if (actionBanner) {
        actionBanner.classList.add('opacity-40', 'pointer-events-none');
      }

      pendingBadges.forEach(badge => {
        badge.textContent = "Terkonfirmasi";
        badge.className = "px-3 py-1 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed text-label-md font-semibold flex items-center gap-1.5";
      });
    }

    function selectReasonChip(element) {
      document.querySelectorAll('.reschedule-chip').forEach(c => {
        c.classList.remove('bg-primary-container', 'text-on-primary-container');
        c.classList.add('bg-surface-container-high', 'text-on-surface-variant');
      });
      element.classList.remove('bg-surface-container-high', 'text-on-surface-variant');
      element.classList.add('bg-primary-container', 'text-on-primary-container');
    }
  </script>
<!-- Content Workspace Container -->
<div class="px-8 py-8 space-y-7 max-w-[1540px] mx-auto w-full">
<!-- Top Section & Child Switcher -->
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 pb-2">
<div class="space-y-1.5"><div class="flex items-center gap-2 text-xs text-slate-500 font-medium">
<span class="">Portal Orang Tua &amp; Siswa</span>
<span class="text-slate-300 font-bold">/</span>
<span class="text-blue-600 font-semibold">Jadwal &amp; Konfirmasi Sesi</span>
</div>
<h1 class="text-2xl font-bold tracking-tight text-slate-900">Jadwal Les &amp; Konfirmasi Sesi</h1>
<p class="text-xs text-slate-500 max-w-2xl">
Pantau kalender mingguan les putra-putri Anda, konfirmasi pembaruan jadwal tutor, atau ajukan penyesuaian waktu.
</p></div>
<!-- Multi-Child Switcher -->
<div class="flex items-center flex-wrap gap-2.5 p-1.5 bg-surface-container-low rounded-2xl shadow-sm">
<button class="flex items-center gap-2 px-4 py-2 rounded-xl bg-primary-container text-on-primary-container font-label-lg text-label-lg shadow-sm transition-all hover:brightness-105" type="button">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="">Aisyah Putri <span class="opacity-80 font-normal text-xs">(Kelas 8 SMP)</span></span>
</button>
<button class="flex items-center gap-2 px-4 py-2 rounded-xl bg-transparent hover:bg-surface-container-high text-on-surface-variant font-label-lg text-label-lg transition-all" type="button">
<span class="material-symbols-outlined text-[18px]">face_6</span>
<span class="">Farhan Nugraha <span class="opacity-75 font-normal text-xs">(Kelas 12 SMA)</span></span>
</button>
<button class="flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-surface-container hover:bg-surface-container-highest text-primary font-label-lg text-label-lg transition-all" type="button">
<span class="material-symbols-outlined text-[18px]">add_circle</span>
<span class="">Tambah Anak</span>
</button>
</div>
</div>
<!-- Calendar Controls & Navigator Toolbar -->
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
<!-- Segmented Switch View Mode -->
<div class="flex items-center gap-1 bg-surface-container-low p-1 rounded-xl self-start md:self-auto">
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg bg-surface-container-lowest text-primary font-label-md text-label-md shadow-xs transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">view_week</span>
<span class="">Tampilan Mingguan</span>
</button>
<button class="flex items-center gap-2 px-3.5 py-2 rounded-lg text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">view_agenda</span>
<span class="">Daftar Hari</span>
</button>
</div>
</div>
<!-- Alert Banner: Action Required -->

@if($pending)
<div class="p-5 rounded-2xl bg-gradient-to-r from-amber-50 to-orange-50/70 text-on-surface shadow-xs transition-all flex flex-col md:flex-row md:items-center justify-between gap-4" id="alert-action-required">
<div class="flex items-start gap-4">
<div class="w-10 h-10 rounded-xl bg-amber-500/15 text-amber-700 flex items-center justify-center shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">notification_important</span>
</div>
<div class="space-y-1">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-amber-900 font-bold tracking-wide">{{ $pendingCount }} Sesi Menunggu Konfirmasi Anda</span>
<span class="px-2 py-0.5 rounded-full bg-amber-200/60 text-amber-900 font-label-sm text-label-sm">Batas Respon: {{ $pending ? \App\Support\Fmt::dateShort($pending->date) : "-" }}</span>
</div>
<p class="font-body-md text-body-md text-amber-950/80">
<strong>{{ $pending->subject ?? "-" }}</strong> • {{ $pending ? \App\Support\Fmt::dateShort($pending->date) : "-" }} (<span class="font-semibold text-primary-container">{{ $pending ? \App\Support\Fmt::hhmm($pending->start_time) . " – " . \App\Support\Fmt::hhmm($pending->end_time) . " WIB" : "-" }}</span>). Diajukan pergeseran jadwal oleh <strong>{{ $pending->tutor->name ?? "-" }}</strong> untuk penyesuaian waktu shalat Ashar.
          </p>
</div>
</div>
<div class="flex items-center gap-2.5 shrink-0 self-end md:self-center"><button class="px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold shadow-sm transition-all flex items-center gap-2" onclick="confirmSessionSchedule()" type="button">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span class="">Konfirmasi Sekarang</span>
</button>
<button class="px-4 py-2.5 rounded-xl bg-white text-slate-700 border border-slate-200 hover:bg-slate-50 text-xs font-medium transition-all shadow-sm flex items-center gap-2" onclick="toggleRescheduleModal(true)" type="button">
<span class="material-symbols-outlined text-[18px]">edit_calendar</span>
<span class="">Ajukan Jadwal Lain</span>
</button></div>
</div>

@endif
<!-- Weekly Interactive 7-Day Calendar Strip -->
<div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-7 gap-3">
<!-- Senin 20 -->
<div class="p-3.5 rounded-2xl bg-surface-container-lowest hover:bg-surface-container-low transition-all cursor-pointer flex flex-col justify-between h-28 shadow-xs">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant font-semibold">Senin</span>
<span class="w-2 h-2 rounded-full bg-secondary"></span>
</div>
<div class="font-headline-lg text-headline-lg text-on-surface font-bold">20</div>
<div class="flex items-center gap-1.5 text-secondary font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">check</span>
<span class="">1 Sesi Selesai</span>
</div>
</div>
<!-- Selasa 21 -->
<div class="p-3.5 rounded-2xl bg-surface-container-lowest hover:bg-surface-container-low transition-all cursor-pointer flex flex-col justify-between h-28 shadow-xs">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant font-semibold">Selasa</span>
<span class="w-2 h-2 rounded-full bg-outline-variant"></span>
</div>
<div class="font-headline-lg text-headline-lg text-on-surface font-bold">21</div>
<div class="text-on-surface-variant font-label-sm text-label-sm">Libur Les</div>
</div>
<!-- Rabu 22 (Active / Selected) -->
<div class="p-3.5 rounded-2xl bg-surface-container-low ring-2 ring-primary relative overflow-hidden transition-all cursor-pointer flex flex-col justify-between h-28 shadow-md">
<div class="absolute -top-1 right-2">
<span class="px-2 py-0.5 rounded-b-lg bg-amber-500 text-surface-container-lowest font-label-sm text-[10px] font-bold shadow-xs flex items-center gap-0.5">
<span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> 1 Respon
          </span>
</div>
<div class="flex items-center justify-between mt-1">
<span class="font-label-md text-label-md text-primary font-bold">Rabu (Hari Ini)</span>
</div>
<div class="font-headline-lg text-headline-lg text-primary font-extrabold flex items-baseline gap-1">
          22 <span class="font-label-sm text-label-sm font-normal text-on-surface-variant">Okt</span>
</div>
<div class="flex items-center gap-1 text-primary font-label-sm text-label-sm font-semibold">
<span class="w-2 h-2 rounded-full bg-primary-container"></span>
<span class="">2 Sesi Terjadwal</span>
</div>
</div>
<!-- Kamis 23 -->
<div class="p-3.5 rounded-2xl bg-surface-container-lowest hover:bg-surface-container-low transition-all cursor-pointer flex flex-col justify-between h-28 shadow-xs">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant font-semibold">Kamis</span>
<span class="w-2 h-2 rounded-full bg-outline-variant"></span>
</div>
<div class="font-headline-lg text-headline-lg text-on-surface font-bold">23</div>
<div class="text-on-surface-variant font-label-sm text-label-sm">Libur Les</div>
</div>
<!-- Jumat 24 -->
<div class="p-3.5 rounded-2xl bg-surface-container-lowest hover:bg-surface-container-low transition-all cursor-pointer flex flex-col justify-between h-28 shadow-xs">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant font-semibold">Jumat</span>
<span class="w-2 h-2 rounded-full bg-primary"></span>
</div>
<div class="font-headline-lg text-headline-lg text-on-surface font-bold">24</div>
<div class="text-on-surface font-label-sm text-label-sm font-medium">1 Sesi Mendatang</div>
</div>
<!-- Sabtu 25 -->
<div class="p-3.5 rounded-2xl bg-surface-container-lowest hover:bg-surface-container-low transition-all cursor-pointer flex flex-col justify-between h-28 shadow-xs">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant font-semibold">Sabtu</span>
<span class="w-2 h-2 rounded-full bg-primary"></span>
</div>
<div class="font-headline-lg text-headline-lg text-on-surface font-bold">25</div>
<div class="text-on-surface font-label-sm text-label-sm font-medium">1 Sesi Mendatang</div>
</div>
<!-- Minggu 26 -->
<div class="p-3.5 rounded-2xl bg-surface-container-lowest hover:bg-surface-container-low transition-all cursor-pointer flex flex-col justify-between h-28 shadow-xs">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface-variant font-semibold">Minggu</span>
<span class="w-2 h-2 rounded-full bg-outline-variant"></span>
</div>
<div class="font-headline-lg text-headline-lg text-on-surface font-bold">26</div>
<div class="text-on-surface-variant font-label-sm text-label-sm">Evaluasi Mingguan</div>
</div>
</div>
<!-- Main 2-Column Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-7 items-start">
<!-- LEFT COLUMN: Selected Day's Sessions & Preview List (7 cols) -->
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

@if($s->parent_confirmed)

@endif
<!-- SESSION 1: Needs Confirmation Card -->
<div class="rounded-2xl bg-surface-container-lowest p-6 shadow-sm relative overflow-hidden transition-all hover:shadow-md">
<!-- Left Status Indicator Bar -->
<div class="absolute left-0 top-0 bottom-0 w-1.5 bg-amber-500"></div>
<div class="pl-2 space-y-5">
<!-- Header Status Badges -->
<div class="flex flex-wrap items-center justify-between gap-3">
<div class="flex items-center gap-2">
<span class="px-3 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-md text-label-md font-semibold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px]">update</span>
<span class="">Jadwal Diperbarui Tutor</span>
</span>
<span class="session-pending-status px-3 py-1 rounded-full bg-amber-100 text-amber-900 font-label-md text-label-md font-semibold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px]">hourglass_top</span>
<span class="">Menunggu Respon Wali Murid</span>
</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Sesi Ke-{{ $s->session_no ?: 1 }}</span>
</div>
<!-- Subject & Time Modification Indicator -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-xl bg-surface-container-low">
<div class="space-y-1">
<div class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold">Mata Pelajaran</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">{{ $s->subject }}</h3>
<div class="font-body-sm text-body-sm text-on-surface-variant">Fokus Materi: {{ $s->topic ?: $s->subject }}</div>
</div>
<!-- Time shift comparator -->
<div class="bg-surface-container-lowest p-3 rounded-xl shadow-xs shrink-0 sm:text-right">
<div class="font-label-sm text-label-sm text-on-surface-variant line-through">Jadwal: {{ \App\Support\Fmt::dateShort($s->date) }}</div>
<div class="flex items-center gap-1.5 text-primary font-headline-sm text-headline-sm font-bold mt-0.5">
<span class="material-symbols-outlined text-[20px]">schedule</span>
<span class="">{{ \App\Support\Fmt::hhmm($s->start_time) }} – {{ \App\Support\Fmt::hhmm($s->end_time) }} WIB</span>
</div>
<div class="font-label-sm text-label-sm text-secondary font-medium mt-0.5">{{ \App\Support\Fmt::minutes($s->start_time, $s->end_time) }} Menit</div>
</div>
</div>
<!-- Tutor Information & Home Visit Details -->
<div class="flex items-center justify-between flex-wrap gap-4 pt-1">
<div class="flex items-center gap-3">
<div class="relative">
<img class="w-12 h-12 rounded-full object-cover shadow-xs" data-alt="Portrait photo of Kak Rina M.Pd, a professional friendly Muslim female educator wearing a soft teal hijab and warm smile, captured in bright high key natural educational studio setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZAHpWqGyEty8E9HOV2VppzkBH589pNwXnpgL8pUMcECynOS10-3MQuirSfjWoIs1VS-xnDR2mMsu-xalF3J8frhdLgsSFAuXLhtspVeg9dtcYbFXQOeUTXNaDX9Pxe7dyaJ8tb5HCOxSmCtSees8vN2IQH55fexXzWl1PIxpz0aPmUfq_Ic3IaKTr9mCJSNhAzBw3n-LEOllh4VudfDPDHRr6CMVDKxVR5oMIN9OApVBPGDyl-j1o-A">
<span class="absolute bottom-0 right-0 w-3.5 h-3.5 rounded-full bg-secondary ring-2 ring-surface-container-lowest" title="Tutor Terverifikasi"></span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-on-surface font-bold">{{ $s->tutor->name ?? "-" }}</span>
<span class="px-2 py-0.5 rounded-md bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">⭐ {{ $s->tutor->rating ?? "-" }} ({{ $s->tutor->reviews ?? 0 }} Ulasan)</span>
</div>
<div class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface-variant mt-0.5">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary">verified</span>
<span class="">{{ $s->tutor->headline ?? "-" }}</span>
</span>
<span class="">•</span>
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-secondary">home_pin</span>
<span class="">{{ \App\Support\Fmt::method($s->method) }}{{ $s->location ? " (" . $s->location . ")" : "" }}</span>
</span>
</div>
</div>
</div>
<a class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md" href="{{ \App\Support\Fmt::waLink($s->tutor->phone ?? "") }}" target="_blank">
<span class="material-symbols-outlined text-[16px] text-secondary">chat</span>
<span class="">Chat {{ \App\Support\Fmt::shortName($s->tutor->name ?? "Tutor") }}</span>
</a>
</div>
<!-- Tutor Note Quote Bubble -->
<div class="p-3.5 rounded-xl bg-surface-container-low flex items-start gap-3">
<span class="material-symbols-outlined text-tertiary-container text-[20px] shrink-0 mt-0.5">format_quote</span>
<p class="font-body-sm text-body-sm text-on-surface italic">{{ $s->notes ?: "Mohon konfirmasi jadwal sesi ini. Terima kasih." }}</p>
</div>
<!-- Decision Action Bar -->
<div class="flex flex-wrap items-center gap-3 pt-2"><button class="flex-1 min-w-[200px] h-11 px-5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold shadow-sm transition-all flex items-center justify-center gap-2" onclick="confirmSessionSchedule({{ $s->id }})" type="button">
<span class="material-symbols-outlined text-[20px]">check_circle</span>
<span class="">Konfirmasi Jadwal Ini</span>
</button>
<button class="h-11 px-4 rounded-xl bg-white text-slate-700 border border-slate-200 hover:bg-slate-50 text-xs font-medium transition-colors flex items-center gap-2 shadow-sm" onclick="toggleRescheduleModal(true)" type="button">
<span class="material-symbols-outlined text-[20px]">calendar_month</span>
<span class="">Ajukan Perubahan Waktu</span>
</button></div>
</div>
</div>

@else
<!-- SESSION 2: Confirmed Evening Session -->
<div class="rounded-2xl bg-surface-container-lowest p-6 shadow-sm relative overflow-hidden transition-all hover:shadow-md">
<!-- Left Status Indicator Bar (Teal / Confirmed) -->
<div class="absolute left-0 top-0 bottom-0 w-1.5 bg-secondary"></div>
<div class="pl-2 space-y-4">
<!-- Header Badges -->
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="px-3 py-1 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed text-label-md font-semibold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="">Terkonfirmasi</span>
</span>
<span class="px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant text-label-sm font-medium">Sesi Ke-{{ $s->session_no ?: 1 }}</span>
</div>
<div class="font-headline-sm text-headline-sm text-on-surface font-bold">{{ \App\Support\Fmt::hhmm($s->start_time) }} – {{ \App\Support\Fmt::hhmm($s->end_time) }} WIB</div>
</div>
<!-- Title & Subject -->
<div>
<div class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold">Mata Pelajaran</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">{{ $s->subject }}</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Topik: {{ $s->topic ?: $s->subject }}</p>
</div>
<!-- Tutor info -->
<div class="flex items-center justify-between flex-wrap gap-4 pt-1">
<div class="flex items-center gap-3">
<img class="w-11 h-11 rounded-full object-cover shadow-xs" data-alt="Warm and professional female native English teacher Ms Sarah Jenkins with light brown hair wearing smart casual blazer in modern classroom background with bookshelves." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlCRgqKkPc-TulyzHY98tzR4jZ7zUzQewafGdYWxbFwOUacywWxNWunZTlOPcFjYFfjHilGKfwlVEvUsuSevlRtOv5ivaZ_OGIPgEIhHB7r11MPrKnMV5aKRh3YMJN4I5ipdiXg51hdW4zpNGxaDaFNJA8LCk-jwID3dKaRHzIXob0jGW7WKi-Vlm2IKVc78i2097iFpD5pH-E-FK_DZ2TbEPjWvn1zDbHi49xWkw1j5Cflke8fjGV1g">
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-on-surface font-bold">{{ $s->tutor->name ?? "-" }}</span>
<span class="px-2 py-0.5 rounded-md bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">⭐ {{ $s->tutor->rating ?? "-" }}</span>
</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">{{ $s->tutor->headline ?? "-" }} • {{ \App\Support\Fmt::method($s->method) }}</div>
</div>
</div>
<a class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md" href="{{ \App\Support\Fmt::waLink($s->tutor->phone ?? "") }}" target="_blank">
<span class="material-symbols-outlined text-[16px] text-secondary">chat</span>
<span class="">Chat {{ \App\Support\Fmt::shortName($s->tutor->name ?? "Tutor") }}</span>
</a>
</div>
<!-- Zoom Online Classroom Box -->
<div class="p-3.5 rounded-xl bg-surface-container-low flex flex-col sm:flex-row sm:items-center justify-between gap-3">
<div class="flex items-center gap-3 min-w-0">
<div class="w-9 h-9 rounded-lg bg-primary-container text-on-primary-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">videocam</span>
</div>
<div class="min-w-0">
<div class="font-label-sm text-label-sm text-on-surface-variant">Tautan Ruang Belajar Virtual</div>
<div class="font-body-md text-body-md text-primary font-semibold truncate">https://zoom.us/j/8492019482?pwd=OnePrivate</div>
</div>
</div>
<div class="flex items-center gap-2 shrink-0">
<button class="p-2 rounded-lg bg-surface-container-lowest hover:bg-surface-container text-on-surface transition-colors shadow-xs" onclick="navigator.clipboard.writeText('https://zoom.us/j/8492019482')" title="Salin Tautan" type="button">
<span class="material-symbols-outlined text-[18px]">content_copy</span>
</button>
<a class="px-3.5 py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:bg-primary-container transition-colors shadow-xs flex items-center gap-1.5" href="#">
<span class="material-symbols-outlined text-[16px]">open_in_new</span>
<span class="">Buka Ruang Zoom</span>
</a>
</div>
</div>
</div>
</div>

@endif

@empty
<div class="text-xs text-slate-400 p-4">Tidak ada sesi pada hari ini.</div>
@endforelse
<!-- UPCOMING DAYS PREVIEW (Jumat & Sabtu) -->
<div class="space-y-3 pt-2">
<div class="flex items-center justify-between">
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Sesi Lainnya Pekan Ini</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Total {{ $others->count() }} sesi tersisa</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-3.5">
<!-- Card Jumat -->
<div class="p-4 rounded-xl bg-surface-container-lowest shadow-xs flex flex-col justify-between hover:bg-surface-container-low transition-colors">
<div class="flex items-center justify-between mb-2">
<span class="px-2.5 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm">Jumat, 24 Okt</span>
<span class="font-label-sm text-label-sm font-semibold text-primary">15:30 WIB</span>
</div>
<div class="font-headline-sm text-[16px] text-on-surface font-bold">Matematika Latihan Mandiri</div>
<div class="font-body-sm text-body-sm text-on-surface-variant mt-1">Kak Dimas, S.Si • Aljabar Linear</div>
<div class="mt-3 pt-2.5 flex items-center justify-between text-secondary font-label-sm text-label-sm">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">event_available</span>
<span class="">Jadwal Terkonfirmasi</span>
</span>
<span class="material-symbols-outlined text-[16px] text-outline">chevron_right</span>
</div>
</div>
<!-- Card Sabtu -->
<div class="p-4 rounded-xl bg-surface-container-lowest shadow-xs flex flex-col justify-between hover:bg-surface-container-low transition-colors">
<div class="flex items-center justify-between mb-2">
<span class="px-2.5 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm">Sabtu, 25 Okt</span>
<span class="font-label-sm text-label-sm font-semibold text-primary">10:00 WIB</span>
</div>
<div class="font-headline-sm text-[16px] text-on-surface font-bold">IPA Fisika (Gerak Lurus GLB &amp; GLBB)</div>
<div class="font-body-sm text-body-sm text-on-surface-variant mt-1">Kak Arisandi, M.Sc • Home Visit</div>
<div class="mt-3 pt-2.5 flex items-center justify-between text-secondary font-label-sm text-label-sm">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">event_available</span>
<span class="">Jadwal Terkonfirmasi</span>
</span>
<span class="material-symbols-outlined text-[16px] text-outline">chevron_right</span>
</div>
</div>
</div>
</div>
</div>
<!-- RIGHT COLUMN: Reschedule Request Form Modal & Status Center (5 cols) -->
<div class="lg:col-span-5 space-y-6">
<!-- SUCCESS FEEDBACK CARD (Initially Hidden or dynamically triggers) -->
<div class="hidden p-5 rounded-2xl bg-secondary-fixed/30 text-on-secondary-fixed shadow-sm flex items-start gap-3.5 transition-all" id="success-feedback-box">
<div class="w-10 h-10 rounded-xl bg-secondary text-on-secondary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">verified</span>
</div>
<div class="space-y-1">
<div class="font-label-lg text-label-lg font-bold text-on-secondary-fixed">Jadwal Sesi Berhasil Dikonfirmasi!</div>
<p class="font-body-sm text-body-sm text-on-secondary-fixed/90">
              Terima kasih Ibu Nabila. Notifikasi otomatis telah dikirimkan ke WhatsApp <strong>Kak Rina, M.Pd</strong> dan kalender belajar Aisyah telah diperbarui.
            </p>
</div>
</div>
<!-- RESCHEDULE REQUEST FORM (Panel Interaktif) -->
<div class="rounded-2xl bg-surface-container-lowest p-6 shadow-sm space-y-5 transition-all" id="reschedule-action-card">
<div class="flex items-center justify-between pb-1">
<div class="flex items-center gap-2.5">
<div class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">edit_calendar</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Formulir Ajukan Ganti Waktu</h3>
<p class="font-label-sm text-label-sm text-on-surface-variant">Reschedule Sesi Tahsin &amp; PAI</p>
</div>
</div>
<button class="p-1 rounded-lg hover:bg-surface-container text-on-surface-variant transition-colors" onclick="toggleRescheduleModal(false)" title="Tutup Formulir" type="button">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
<div class="space-y-4">
<!-- Datepicker Input -->
<div class="space-y-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">event</span>
<span class="">Pilih Tanggal Alternatif yang Diinginkan</span>
</label>
<div class="relative">
<select class="w-full h-11 px-3.5 pr-10 rounded-xl bg-surface-container-low text-on-surface font-body-md text-body-md appearance-none focus:outline-none focus:ring-2 focus:ring-primary shadow-xs">
<option value="2026-10-22">Rabu, 22 Okt 2026 (Tetap di Hari Ini)</option>
<option value="2026-10-23">Kamis, 23 Okt 2026 (Besok)</option>
<option value="2026-10-24">Jumat, 24 Okt 2026</option>
<option value="2026-10-26">Senin, 27 Okt 2026 (Pekan Depan)</option>
</select>
<span class="material-symbols-outlined text-[20px] text-on-surface-variant absolute right-3 top-3 pointer-events-none">expand_more</span>
</div>
</div>
<!-- Time Slot Selection -->
<div class="space-y-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
<span class="">Pilih Slot Waktu Pengganti</span>
</label>
<div class="grid grid-cols-3 gap-2">
<button class="p-2.5 rounded-xl bg-surface-container-low hover:bg-surface-container text-on-surface text-center font-label-md text-label-md focus:bg-primary-container focus:text-on-primary-container transition-all" type="button">
<div class="text-[11px] opacity-75 font-normal">Pagi</div>
<div class="font-semibold">09:00 WIB</div>
</button>
<button class="p-2.5 rounded-xl bg-primary-container text-on-primary-container text-center font-label-md text-label-md shadow-xs transition-all" type="button">
<div class="text-[11px] opacity-75 font-normal">Sore 1</div>
<div class="font-semibold">15:30 WIB</div>
</button>
<button class="p-2.5 rounded-xl bg-surface-container-low hover:bg-surface-container text-on-surface text-center font-label-md text-label-md focus:bg-primary-container focus:text-on-primary-container transition-all" type="button">
<div class="text-[11px] opacity-75 font-normal">Sore 2</div>
<div class="font-semibold">17:00 WIB</div>
</button>
</div>
</div>
<!-- Reschedule Reason Selection Chips -->
<div class="space-y-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Alasan Penyesuaian Waktu</label>
<div class="flex flex-wrap gap-2 pt-0.5">
<button class="reschedule-chip px-3 py-1.5 rounded-lg bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm hover:bg-surface-container-highest transition-colors" onclick="selectReasonChip(this)" type="button">
                  Siswa Kurang Sehat
                </button>
<button class="reschedule-chip px-3 py-1.5 rounded-lg bg-primary-container text-on-primary-container font-label-sm text-label-sm transition-colors" onclick="selectReasonChip(this)" type="button">
                  Bentrok Ekskul / Sekolah
                </button>
<button class="reschedule-chip px-3 py-1.5 rounded-lg bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm hover:bg-surface-container-highest transition-colors" onclick="selectReasonChip(this)" type="button">
                  Urusan Keluarga Mendesak
                </button>
<button class="reschedule-chip px-3 py-1.5 rounded-lg bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm hover:bg-surface-container-highest transition-colors" onclick="selectReasonChip(this)" type="button">
                  Lainnya
                </button>
</div>
</div>
<!-- Additional Notes Textarea -->
<div class="space-y-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Catatan Khusus untuk Kak Rina &amp; Admin</label>
<textarea class="w-full p-3 rounded-xl bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-on-surface-variant/50" placeholder="Contoh: Aisyah ada try out sekolah sampai jam 16:30, mohon sesi digeser ke jam 17:00..." rows="3"></textarea>
</div>
<!-- Submit Reschedule Button -->
<div class="pt-2">
<button class="w-full h-11 rounded-xl bg-primary text-on-primary font-label-lg text-label-lg hover:bg-primary-container transition-all shadow-xs flex items-center justify-center gap-2" id="btnSendResched" type="button">
<span class="material-symbols-outlined text-[20px]">send</span>
<span class="">Kirim Pengajuan ke Tutor &amp; Cabang</span>
</button>
<p class="font-label-sm text-label-sm text-center text-on-surface-variant mt-2">
                Konfirmasi persetujuan tutor akan dikabari via WhatsApp dalam maks. 2 jam.
              </p>
</div>
</div>
</div>
<!-- PACKAGE QUOTA STATUS CARD -->
<div class="p-5 rounded-2xl bg-surface-container-lowest shadow-sm space-y-4">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-9 h-9 rounded-xl bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">inventory_2</span>
</div>
<div>
<div class="font-label-lg text-label-lg text-on-surface font-bold">Paket Belajar Aktif</div>
<div class="font-label-sm text-label-sm text-on-surface-variant">{{ $child->package ?: "Paket Reguler" }}</div>
</div>
</div>
<span class="px-2.5 py-1 rounded-full bg-secondary-fixed/40 text-on-secondary-fixed font-label-sm text-label-sm font-semibold">Aktif</span>
</div>
<!-- Progress Bar & Count -->
<div class="space-y-2">
<div class="flex items-center justify-between font-label-md text-label-md">
<span class="text-on-surface-variant">Sesi Terpakai: <strong class="text-on-surface font-bold">{{ $quota["used"] }} / {{ $quota["total"] }} Sesi</strong></span>
<span class="text-primary font-bold">Sisa: {{ max(0, $quota["total"] - $quota["used"]) }} Sesi</span>
</div>
<div class="w-full h-3 rounded-full bg-surface-container overflow-hidden">
<div class="h-full bg-primary rounded-full" style="width: {{ $quota["pct"] }}%;"></div>
</div>
<div class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1.5 pt-0.5">
<span class="material-symbols-outlined text-[15px] text-amber-600">info</span>
<span class="">Paket berakhir pada 31 Oktober 2026. Anda dapat melakukan perpanjangan paket lebih awal.</span>
</div>
</div>
<a class="w-full py-2.5 rounded-xl bg-surface-container-high hover:bg-surface-container-highest text-primary font-label-md text-label-md flex items-center justify-center gap-1.5 transition-colors" href="#">
<span class="material-symbols-outlined text-[18px]">add_task</span>
<span class="">Perpanjang Sesi Les</span>
</a>
</div>
<!-- ADMIN SCHEDULING COORDINATOR CARD -->
<div class="p-5 rounded-2xl bg-surface-container-low shadow-xs flex items-center justify-between gap-4">
<div class="flex items-center gap-3">
<div class="relative">
<img class="w-11 h-11 rounded-full object-cover shadow-xs" data-alt="Portrait of Kak Arya Pratama, a professional male academic operations consultant in blue polo shirt with customer support headset smiling." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAEHYnlcYBIHikFb3kZLQEqocOBwAabBARXZ9xuc3XmpBZ4jFGBr5HQXBgr_BUMgCGdJbQhTvNeaLuuDQjfOuYw55sFimS4ircZggG4f91lYXCQcYBVltW8x1enqFsKZeIE4LdKu7llvYFcyBRKqMYhqHVzXoDDa54UukQEwLo_r0jSbh8oduNsybf9xc-Jt2HAlPqxuvPAT0OGY9nesVqy9IQFIidngAQascYVq3u9LDzrEiZyXhvvXg">
<span class="absolute bottom-0 right-0 w-3 h-3 rounded-full bg-secondary ring-2 ring-surface-container-low"></span>
</div>
<div>
<div class="font-label-lg text-label-lg text-on-surface font-bold">Kak Arya Pratama</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Koordinator Jadwal Cabang Tebet</div>
</div>
</div>
<a class="px-3.5 py-2 rounded-xl bg-surface-container-lowest hover:bg-surface-container text-on-surface font-label-md text-label-md shadow-xs flex items-center gap-1.5 transition-colors shrink-0" href="https://wa.me/6281234567899" target="_blank">
<span class="material-symbols-outlined text-[18px] text-secondary">support_agent</span>
<span class="">Bantuan CS</span>
</a>
</div>
</div>
</div>
</div>
</div></main></div>

<script src="{{ asset('js/opc.js') }}"></script><script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});
const CHILDREN = {!! json_encode($childrenJson) !!}, CUR = {{ $child->id }};
(function () {
  const btns = [...document.querySelectorAll('button')].filter(b => /\(Kelas|Kelas \d+ (SMP|SMA|SD)/.test(b.textContent) && b.querySelector('div, span') && /Aisyah|Farhan|Kevin|Nabila|Bilqis|Rayhan/.test(b.textContent));
  const kids = btns.slice(0, 2);
  kids.forEach((b, i) => b.addEventListener('click', () => { const c = CHILDREN[i]; if (!c) return OPC.toast('Anak kedua belum terdaftar. Hubungi admin cabang.', false); const u = new URL(location.href); u.searchParams.set('anak', c.id); location.href = u.toString(); }));
  OPC.on('Tambah Anak', () => window.open('https://wa.me/6281198760001?text=' + encodeURIComponent('Halo Admin, saya ingin menambahkan data anak ke akun portal saya.'), '_blank'), {sel: 'button', exact: false});
  document.querySelectorAll('button[aria-label="Pemberitahuan"]').forEach(b => b.addEventListener('click', () => OPC.toast({!! json_encode($notifText ?? 'Tidak ada pemberitahuan baru.') !!}, true)));
  document.querySelectorAll('a[data-path="profil-siswa"]').forEach(a => a.addEventListener('click', e => { e.preventDefault();
    OPC.dialog({title: 'Profil Siswa', desc: 'Data tercatat di administrasi cabang.', fields: [
      {name: 'a', label: 'Nama', value: {!! json_encode($child->name) !!}}, {name: 'b', label: 'Jenjang / Sekolah', value: {!! json_encode($child->grade . ' • ' . $child->school) !!}},
      {name: 'c', label: 'Program', value: {!! json_encode($child->program) !!}}, {name: 'd', label: 'Tutor', value: {!! json_encode($child->tutor->name ?? '-') !!}}, {name: 'e', label: 'Alamat', value: {!! json_encode($child->address) !!}}], submit: 'Tutup', onSubmit: async () => {}}); }));
  document.querySelectorAll('div').forEach(d => { if (d.children.length >= 1 && d.textContent.includes('Bantuan Admin') && d.textContent.includes('WhatsApp Konsultasi') && d.children.length <= 3 && d.textContent.length < 80) { d.style.cursor = 'pointer'; d.addEventListener('click', () => window.open('https://wa.me/6281198760001', '_blank')); } });
})();

const PEND = {!! json_encode($pendingJson) !!};
const orig = window.confirmSessionSchedule;
window.confirmSessionSchedule = async function (id) { try { const j = await OPC.post({!! json_encode(url('/portal/jadwal')) !!} + '/' + (id || (PEND && PEND.id)) + '/konfirmasi', {}); if (orig) orig(); OPC.toast(j.message, true); setTimeout(() => location.reload(), 1400); } catch (e) {} };
const card = document.getElementById('reschedule-action-card');
if (card && PEND) {
  const sel = card.querySelector('select'); if (sel) { sel.innerHTML = ''; PEND.dates.forEach(d => { const o = document.createElement('option'); o.value = d.v; o.textContent = d.t; sel.appendChild(o); }); }
  const slotBtns = [...card.querySelectorAll('button')].filter(b => /^(Pagi|Sore 1|Sore 2)\s/.test(b.textContent.trim().replace(/\s+/g, ' ')));
  let slot = slotBtns[0] ? slotBtns[0].textContent.match(/\d\d:\d\d/)[0] : '15:30';
  slotBtns.forEach(b => b.addEventListener('click', () => { slot = b.textContent.match(/\d\d:\d\d/)[0]; slotBtns.forEach(x => x.style.outline = ''); b.style.outline = '2px solid #2563eb'; }));
  let reason = 'Lainnya'; card.querySelectorAll('.reschedule-chip, button[onclick^="selectReasonChip"]').forEach(c => c.addEventListener('click', () => { reason = c.textContent.trim(); }));
  document.getElementById('btnSendResched').addEventListener('click', async () => {
    const start = slot; const dur = PEND.minutes; const [h, m] = start.split(':').map(Number); const e = new Date(2000, 0, 1, h, m + dur); const end = String(e.getHours()).padStart(2, '0') + ':' + String(e.getMinutes()).padStart(2, '0');
    try { const j = await OPC.post({!! json_encode(url('/portal/jadwal')) !!} + '/' + PEND.id + '/reschedule', {date: sel.value, start_time: start, end_time: end, reason: reason, note: card.querySelector('textarea').value}); OPC.done(j, 'reload'); } catch (err) {} });
} else if (card) { const b = document.getElementById('btnSendResched'); if (b) b.addEventListener('click', () => OPC.toast('Tidak ada sesi yang bisa diajukan.', false)); }
// strip hari
(function () {
  const WEEK = {!! json_encode($weekJson) !!}; const names = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
  const cells = names.map(n => [...document.querySelectorAll('div')].find(d => d.children.length >= 2 && [...d.querySelectorAll('span')].some(s => s.children.length === 0 && /^(Senin|Selasa|Rabu|Kamis|Jumat|Sabtu|Minggu)( \(Hari Ini\))?$/.test(s.textContent.trim()) && s.textContent.trim().startsWith(n)) && d.textContent.length < 90));
  cells.forEach((c, i) => { if (!c || !WEEK[i]) return; const w = WEEK[i]; c.style.cursor = 'pointer';
    const num = [...c.querySelectorAll('div')].find(d => d.children.length === 0 && /^\d{1,2}$/.test(d.textContent.trim())); if (num) num.textContent = w.day;
    const lab = [...c.querySelectorAll('div,span')].find(d => d.children.length === 0 && /(Libur Les|Sesi|Evaluasi Mingguan)/.test(d.textContent)); if (lab) lab.textContent = w.count ? w.count + ' Sesi' : 'Libur Les';
    c.addEventListener('click', () => { const u = new URL(location.href); u.searchParams.set('tgl', w.date); location.href = u.toString(); }); });
  OPC.find('Hari Ini', {sel: 'button'}).forEach(b => b.addEventListener('click', () => { const u = new URL(location.href); u.searchParams.delete('tgl'); u.searchParams.delete('pekan'); location.href = u.toString(); }));
  const shift = n => () => { const u = new URL(location.href); u.searchParams.set('pekan', (parseInt(u.searchParams.get('pekan') || '0') + n)); u.searchParams.delete('tgl'); location.href = u.toString(); };
  document.querySelectorAll('button[title="Minggu Sebelumnya"]').forEach(b => b.addEventListener('click', shift(-1))); document.querySelectorAll('button[title="Minggu Berikutnya"]').forEach(b => b.addEventListener('click', shift(1)));
  OPC.on('Daftar Hari', () => document.getElementById('reschedule-action-card') && window.scrollTo({top: 400, behavior: 'smooth'}), {sel: 'button', exact: false});
  OPC.on('Tampilan Mingguan', () => window.scrollTo({top: 0, behavior: 'smooth'}), {sel: 'button', exact: false});
})();
OPC.on('Perpanjang Sesi Les', () => window.open('https://wa.me/6281198760001?text=' + encodeURIComponent('Halo Admin, saya ingin memperpanjang paket les {{ $child->name }}.'), '_blank'), {sel: 'a', exact: false});
OPC.on('Bantuan CS', () => {}, {sel: 'a', exact: false});
document.querySelectorAll('a').forEach(a => { if (a.getAttribute('href') === 'https://wa.me/6281234567899') a.href = 'https://wa.me/6281198760001'; });
document.querySelectorAll('a[href="#"]').forEach(a => { if (OPC.label(a).includes('Buka Ruang Zoom')) a.addEventListener('click', e => { e.preventDefault(); window.open('https://zoom.us/', '_blank'); }); });
</script></body></html>