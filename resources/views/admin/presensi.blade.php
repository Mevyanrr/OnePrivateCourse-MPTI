<!DOCTYPE html><html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}"><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta content="web_dashboard" name="shell-type"><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"><style>@@layer base{html,body{margin:0;padding:0;font-family:'Plus Jakarta Sans',sans-serif;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}
/* Tabel tetap bisa digeser: scrollbar horizontal ditampilkan tipis hanya di area tabel */
.scroll-x{overflow-x:auto;-webkit-overflow-scrolling:touch;scrollbar-width:thin;scrollbar-color:#c3c6d7 transparent;}
.scroll-x::-webkit-scrollbar{display:block;height:8px;}
.scroll-x::-webkit-scrollbar-track{background:transparent;}
.scroll-x::-webkit-scrollbar-thumb{background:#c3c6d7;border-radius:9999px;}
.material-symbols-outlined{font-variation-settings:'FILL' 0,'wght' 400;}</style><script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script><script id="tailwind-config">tailwind.config={"darkMode":"class","theme":{"extend":{"boxShadow":{"xs":"0 1px 2px 0 rgb(0 0 0 / 0.05)"},"colors":{"on-tertiary-container":"#f1eeff","surface-dim":"#d2d9f4","secondary-fixed-dim":"#6bd8cb","on-primary":"#ffffff","background":"#faf8ff","surface-container-high":"#e2e7ff","tertiary":"#3e3fcc","primary":"#004ac6","on-surface":"#131b2e","inverse-primary":"#b4c5ff","primary-fixed":"#dbe1ff","surface-container-highest":"#dae2fd","surface-container-low":"#f2f3ff","error":"#ba1a1a","on-error-container":"#93000a","on-primary-container":"#eeefff","surface-container-lowest":"#ffffff","surface":"#faf8ff","secondary-fixed":"#89f5e7","outline-variant":"#c3c6d7","surface-tint":"#0053db","surface-container":"#eaedff","primary-container":"#2563eb","on-surface-variant":"#434655","outline":"#737686","surface-bright":"#faf8ff","tertiary-container":"#585be6","on-secondary":"#ffffff","on-tertiary-fixed-variant":"#2f2ebe","inverse-surface":"#283044","secondary-container":"#86f2e4","error-container":"#ffdad6","on-secondary-fixed-variant":"#005049","surface-variant":"#dae2fd","on-secondary-container":"#006f66","on-primary-fixed":"#00174b","tertiary-fixed":"#e1e0ff","secondary":"#006a61","inverse-on-surface":"#eef0ff","on-background":"#131b2e","tertiary-fixed-dim":"#c0c1ff","primary-fixed-dim":"#b4c5ff","on-tertiary":"#ffffff","on-tertiary-fixed":"#07006c","on-secondary-fixed":"#00201d","on-error":"#ffffff","on-primary-fixed-variant":"#003ea8"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","2xl":"1rem","full":"9999px"},"spacing":{"space-sm":"0.5rem","gutter-mobile":"1rem","space-lg":"1.5rem","space-md":"1rem","margin-mobile":"1rem","space-xl":"2rem","space-xs":"0.25rem","gutter":"1.5rem","margin":"2rem","4.5":"1.125rem"},"fontFamily":{"label-md":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"label-lg":["Plus Jakarta Sans"],"body-md":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"display-lg-mobile":["Plus Jakarta Sans"],"headline-xl":["Plus Jakarta Sans"],"label-sm":["Plus Jakarta Sans"],"body-sm":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"]},"fontSize":{"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"display-lg":["40px",{"lineHeight":"48px","letterSpacing":"-0.02em","fontWeight":"700"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-md":["20px",{"lineHeight":"28px","fontWeight":"600"}],"headline-xl-mobile":["24px",{"lineHeight":"32px","letterSpacing":"-0.015em","fontWeight":"700"}],"headline-lg":["24px",{"lineHeight":"32px","letterSpacing":"-0.01em","fontWeight":"600"}],"display-lg-mobile":["30px",{"lineHeight":"38px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-xl":["32px",{"lineHeight":"40px","letterSpacing":"-0.015em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"26px","fontWeight":"600"}]}}}}</script></head><body class="bg-surface font-body-md text-on-surface antialiased">
<!-- Sidebar -->
<aside class="fixed left-0 top-0 h-full w-[258px] bg-surface-container-lowest border-r border-outline-variant/40 z-50 flex flex-col justify-between py-5">
<div class="flex flex-col">
<div class="px-5 flex items-center gap-3 mb-6">
<div class="w-10 h-10 rounded-xl bg-primary-container flex items-center justify-center shrink-0 shadow-sm shadow-primary/20"><span class="material-symbols-outlined text-on-primary text-[22px]">school</span></div>
<div class="flex flex-col min-w-0"><span class="font-headline-sm text-[16px] text-primary-container font-bold truncate tracking-tight">One Private Course</span><span class="font-label-sm text-[11px] text-on-surface-variant font-medium truncate">Sistem Manajemen Bimbel</span></div>
</div>
<div class="px-5 mb-5">
<a href="{{ route('admin.jadwal.baru') }}" class="w-full h-10 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg rounded-xl flex items-center justify-center gap-2 transition-all shadow-sm shadow-primary/25"><span class="material-symbols-outlined text-[19px]">add_circle</span><span>Tambah Sesi Les</span></a>
</div>
<nav class="flex flex-col gap-1 px-3">
<a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" href="{{ route('admin.dashboard') }}"><span class="material-symbols-outlined text-[20px] text-outline">dashboard</span><span class="font-label-lg text-label-lg">Dashboard Ringkasan</span></a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" href="{{ route('admin.jadwal') }}"><span class="material-symbols-outlined text-[20px] text-outline">calendar_month</span><span class="font-label-lg text-label-lg">Jadwal &amp; Sesi Les</span></a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" href="{{ route('admin.siswa') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px] text-outline">group</span><span class="font-label-lg text-label-lg">Database Siswa</span></div><span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-[11px] font-semibold">{{ $nav['students'] }}</span></a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" href="{{ route('admin.tutor') }}"><span class="material-symbols-outlined text-[20px] text-outline">badge</span><span class="font-label-lg text-label-lg">Tutor &amp; Guru Pengajar</span></a>
<a aria-current="page" class="flex items-center justify-between px-3 py-2.5 bg-primary-fixed/60 text-primary-container font-semibold rounded-xl border border-primary-container/20 shadow-xs" href="{{ route('admin.presensi') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px] text-primary-container">fact_check</span><span class="font-label-lg text-label-lg text-primary font-bold">Presensi &amp; Laporan</span></div><span class="w-2 h-2 rounded-full bg-primary-container shrink-0"></span></a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" href="{{ route('admin.pembayaran') }}"><span class="material-symbols-outlined text-[20px] text-outline">payments</span><span class="font-label-lg text-label-lg">Pembayaran</span></a>
<div class="border-t border-outline-variant/30 my-2 mx-1"></div>
<a class="flex items-center justify-between px-3 py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" href="{{ route('admin.konfirmasi') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px] text-outline">pending_actions</span><span class="font-label-lg text-label-lg">Konfirmasi Sesi</span></div><span class="px-2 py-0.5 rounded-full bg-error-container text-error font-label-sm text-[11px] font-bold">{{ $nav['confirm'] }}</span></a>
</nav>
</div>
<div class="px-4"><div class="p-3 bg-surface-container-low rounded-xl border border-outline-variant/30 flex items-center gap-3"><div class="w-8 h-8 rounded-lg bg-primary-container/10 text-primary-container flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-[19px]">support_agent</span></div><div class="flex flex-col min-w-0"><span class="font-label-sm text-[11px] font-semibold text-on-surface truncate">Bantuan Cabang</span><span class="font-body-sm text-[10px] text-on-surface-variant">Lentera Edukasi v2.4</span></div></div></div>
</aside>
<!-- Main Wrapper -->
<div class="pl-[258px]">
<header class="fixed top-0 left-[258px] right-0 h-16 bg-surface-container-lowest/95 backdrop-blur-md border-b border-outline-variant/40 z-40 flex items-center justify-between px-8">
<div class="flex items-center gap-2 font-label-md text-label-md"><span class="text-xs font-medium text-on-surface-variant">Operasional Cabang</span><span class="text-xs text-outline-variant">/</span><span class="text-xs font-semibold text-on-surface tracking-tight">Presensi &amp; Laporan</span></div>
<div class="flex items-center gap-3"><div class="text-right flex flex-col"><span class="font-label-md text-label-md font-bold text-on-surface leading-tight">{{ auth()->user()->name }}</span><span class="font-body-sm text-[11px] text-on-surface-variant">Admin Cabang Tebet</span></div><div class="w-9 h-9 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-bold text-[13px] shadow-xs">{{ \App\Support\Fmt::initials(auth()->user()->name) }}</div></div>
</header>
<main class="relative pt-16 bg-surface min-h-screen p-8">
<div class="flex flex-col w-full max-w-7xl mx-auto space-y-6">
<!-- 1. HEADER -->
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 pt-6">
<div class="flex flex-col min-w-0">
<div class="flex items-center gap-2 text-xs font-medium text-on-surface-variant mb-1.5"><span class="text-primary-container font-medium">Operasional Cabang</span><span class="text-outline-variant">/</span><span class="text-on-surface font-semibold">Presensi &amp; Laporan</span></div>
<div class="flex flex-wrap items-center gap-3"><h1 class="text-[24px] font-bold text-on-surface tracking-tight leading-tight">Presensi &amp; Laporan Pembelajaran</h1><span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary-fixed text-primary font-label-sm text-[11px] font-bold border border-primary/20"><span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span> Periode Aktif: {{ \App\Support\Fmt::period() }}</span></div>
<p class="text-xs text-on-surface-variant mt-1.5 max-w-3xl leading-relaxed">Pantau rekapitulasi kehadiran dan catatan jurnal materi les siswa. Presensi diisi mandiri oleh orang tua/siswa, admin memantau dan mencatat manual bila ada keterlambatan.</p>
</div>
<div class="flex items-center gap-3 shrink-0 self-start lg:self-center">
<button class="h-9 px-3.5 bg-surface-container-lowest hover:bg-surface-container-low text-on-surface border border-outline-variant/60 rounded-xl shadow-xs flex items-center gap-2 transition-all hover:border-outline text-xs font-medium whitespace-nowrap" type="button"><span class="material-symbols-outlined text-[18px] text-on-surface-variant">download</span><span>Ekspor Rekap (XLS/PDF)</span></button>
<button class="h-9 px-4 bg-primary-container hover:bg-primary text-on-primary rounded-xl shadow-sm shadow-primary/25 flex items-center gap-2 transition-all text-xs font-semibold whitespace-nowrap" id="btnOpenModal" type="button"><span class="material-symbols-outlined text-[18px]">add_circle</span><span> Catat Pertemuan Manual</span></button>
</div>
</div>
<!-- 2. METRIC CARDS -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
<div class="bg-surface-container-lowest p-5 rounded-2xl border border-outline-variant/40 shadow-xs flex flex-col justify-between hover:shadow-md transition-shadow">
<div><div class="flex items-start justify-between"><span class="font-label-sm text-[11px] uppercase tracking-wider text-on-surface-variant font-semibold">Total Sesi Terjadwal</span><div class="w-9 h-9 rounded-xl bg-primary-fixed text-primary flex items-center justify-center"><span class="material-symbols-outlined text-[20px]">calendar_month</span></div></div>
<div class="flex items-baseline gap-2 mt-2"><span class="font-headline-xl text-[32px] font-bold text-on-surface tracking-tight">{{ $m['total'] }}</span><span class="font-label-md text-label-md text-on-surface-variant font-medium">Sesi</span></div>
<p class="font-body-sm text-[12px] text-on-surface-variant mt-0.5">Periode {{ \App\Support\Fmt::period() }}</p></div>
<div class="mt-4 pt-3 border-t border-outline-variant/20"><div class="w-full bg-surface-container-high rounded-full h-1.5 overflow-hidden"><div class="bg-primary-container h-1.5 rounded-full" style="width: 100%"></div></div><div class="flex items-center justify-between text-[11px] text-on-surface-variant mt-1.5"><span>Target Bulan: {{ $m['total'] }}</span><span class="font-semibold text-primary">100% Terjadwal</span></div></div>
</div>
<div class="bg-surface-container-lowest p-5 rounded-2xl border border-outline-variant/40 shadow-xs flex flex-col justify-between hover:shadow-md transition-shadow">
<div><div class="flex items-start justify-between"><span class="font-label-sm text-[11px] uppercase tracking-wider text-on-surface-variant font-semibold">Tervalidasi Hadir</span><div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center border border-emerald-200/60"><span class="material-symbols-outlined text-[20px]">check_circle</span></div></div>
<div class="flex items-baseline gap-2 mt-2"><span class="font-headline-xl text-[32px] font-bold text-emerald-800 tracking-tight">{{ $m['hadir'] }}</span><span class="font-label-md text-label-md text-on-surface-variant font-medium">Sesi</span></div>
<div class="flex items-center gap-2 mt-1"><span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-label-sm text-[11px] font-bold">{{ $m['hadirPct'] }}% Terverifikasi</span></div></div>
<div class="mt-4 pt-3 border-t border-outline-variant/20"><div class="w-full bg-emerald-100 rounded-full h-1.5 overflow-hidden"><div class="bg-emerald-600 h-1.5 rounded-full" style="width: {{ $m['hadirPct'] }}%"></div></div><div class="flex items-center gap-1.5 text-[11px] text-on-surface-variant mt-1.5"><span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span><span>Jurnal &amp; materi terisi lengkap</span></div></div>
</div>
<div class="bg-surface-container-lowest p-5 rounded-2xl border border-outline-variant/40 shadow-xs flex flex-col justify-between hover:shadow-md transition-shadow">
<div><div class="flex items-start justify-between"><span class="font-label-sm text-[11px] uppercase tracking-wider text-on-surface-variant font-semibold">Izin &amp; Sakit</span><div class="w-9 h-9 rounded-xl bg-indigo-50 text-tertiary flex items-center justify-center border border-indigo-200/60"><span class="material-symbols-outlined text-[20px]">event_busy</span></div></div>
<div class="flex items-baseline gap-2 mt-2"><span class="font-headline-xl text-[32px] font-bold text-on-surface tracking-tight">{{ $m['izinSakit'] }}</span><span class="font-label-md text-label-md text-on-surface-variant font-medium">Sesi</span></div>
<div class="flex items-center gap-1.5 mt-1"><span class="px-2.5 py-0.5 rounded-full bg-indigo-100 text-tertiary font-label-sm text-[11px] font-bold">{{ $m['izin'] }} Izin • {{ $m['sakit'] }} Sakit</span></div></div>
<div class="mt-4 pt-3 border-t border-outline-variant/20"><div class="w-full bg-indigo-100 rounded-full h-1.5 overflow-hidden"><div class="bg-tertiary-container h-1.5 rounded-full" style="width: {{ $m['izinPct'] }}%"></div></div><div class="flex items-center justify-between text-[11px] text-on-surface-variant mt-1.5"><span>Reschedule diajukan: {{ $m['resched'] }}</span><span class="text-tertiary font-semibold">{{ $m['izinPct'] }}% Rasio</span></div></div>
</div>
<div class="bg-surface-container-lowest p-5 rounded-2xl border border-rose-200 shadow-xs flex flex-col justify-between hover:shadow-md transition-shadow relative overflow-hidden">
<div class="absolute top-0 left-0 right-0 h-1 bg-rose-500"></div>
<div><div class="flex items-start justify-between"><span class="font-label-sm text-[11px] uppercase tracking-wider text-rose-700 font-bold flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-rose-500 animate-ping"></span>Belum Diisi (Urgent)</span><div class="w-9 h-9 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center border border-rose-200"><span class="material-symbols-outlined text-[20px]">warning</span></div></div>
<div class="flex items-baseline gap-2 mt-2"><span class="font-headline-xl text-[32px] font-bold text-rose-600 tracking-tight">{{ $m['belum'] }}</span><span class="font-label-md text-label-md text-rose-700 font-medium">Sesi</span></div>
<div class="flex items-center gap-1.5 mt-1"><span class="px-2 py-0.5 rounded-full bg-rose-100 text-rose-700 font-label-sm text-[11px] font-bold">! Perlu Tindak Lanjut</span></div></div>
<div class="mt-4 pt-3 border-t border-rose-100"><div class="w-full bg-rose-100 rounded-full h-1.5 overflow-hidden"><div class="bg-rose-500 h-1.5 rounded-full" style="width: 100%"></div></div><div class="flex items-center gap-1 text-[11px] text-rose-700 font-medium mt-1.5"><span class="material-symbols-outlined text-[14px]">notification_important</span><span>Hubungi tutor / orang tua via WhatsApp</span></div></div>
</div>
</div>
<!-- 3. BANNER SOP -->
<div class="bg-blue-50/70 border border-blue-200/70 rounded-2xl p-5 flex flex-col md:flex-row md:items-center justify-between gap-4 shadow-xs">
<div class="flex items-start gap-3.5">
<div class="w-10 h-10 rounded-xl bg-primary-container text-on-primary flex items-center justify-center shrink-0 shadow-xs"><span class="material-symbols-outlined text-[22px]">verified_user</span></div>
<div class="flex flex-col">
<div class="flex flex-wrap items-center gap-2"><h2 class="font-headline-sm text-[15px] font-bold text-on-surface">Standar Operasional (SOP) Konfirmasi Presensi</h2><span class="px-2 py-0.5 rounded-full bg-blue-100 text-primary-container border border-blue-300/40 font-label-sm text-[10px] font-bold">Kebijakan Mutu</span></div>
<p class="font-body-sm text-[12.5px] text-on-surface-variant mt-1 leading-relaxed max-w-3xl">Orang tua atau siswa mengonfirmasi kehadiran dan rangkuman belajar maksimal <span class="font-semibold text-on-surface">6 jam</span> pasca-sesi les. Sesi yang belum terisi lebih dari <span class="font-bold text-rose-700">12 jam</span> ditandai warna merah/kuning untuk dicatat manual oleh admin cabang setelah konfirmasi WhatsApp.</p>
</div>
</div>
<div class="flex flex-wrap sm:flex-nowrap items-center gap-3 shrink-0">
<div class="bg-white/90 border border-blue-200/80 rounded-xl px-3.5 py-2 flex flex-col min-w-[160px] shadow-xs"><span class="text-[10px] font-semibold text-on-surface-variant uppercase tracking-wider">Target Konfirmasi</span><div class="flex items-center gap-1.5 text-primary-container font-bold text-[13px] mt-0.5 whitespace-nowrap"><span class="material-symbols-outlined text-[16px]">schedule</span><span>≤ 6 Jam Pasca-Sesi</span></div></div>
<div class="bg-white/90 border border-amber-200 rounded-xl px-3.5 py-2 flex flex-col min-w-[160px] shadow-xs"><span class="text-[10px] font-semibold text-on-surface-variant uppercase tracking-wider">Toleransi Maksimal</span><div class="flex items-center gap-1.5 text-amber-700 font-bold text-[13px] mt-0.5 whitespace-nowrap"><span class="material-symbols-outlined text-[16px]">hourglass_bottom</span><span>≤ 12 Jam Follow-up</span></div></div>
</div>
</div>
<!-- 4. TABS & FILTER BAR -->
<div class="flex flex-col space-y-4">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
<div class="flex items-center bg-surface-container-low p-1 rounded-xl border border-outline-variant/30 w-fit">
<button class="px-4 py-2 rounded-lg font-label-lg text-label-lg transition-all bg-surface-container-lowest text-primary-container font-bold shadow-xs flex items-center gap-2 whitespace-nowrap" id="tabBtnLog" type="button"><span class="material-symbols-outlined text-[18px]">history_edu</span><span>Log Pertemuan Real-time</span><span class="px-2 py-0.5 rounded-full bg-primary-container/10 text-primary-container font-label-sm text-[11px] font-bold">{{ $m['total'] }}</span></button>
<button class="px-4 py-2 rounded-lg font-label-lg text-label-lg transition-all text-on-surface-variant hover:text-on-surface font-medium flex items-center gap-2 whitespace-nowrap" id="tabBtnRekap" type="button"><span class="material-symbols-outlined text-[18px]">group</span><span>Rekap Per Siswa</span><span class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-[11px] font-semibold">{{ $m['students'] }}</span></button>
</div>
<div class="flex items-center gap-4 text-on-surface-variant font-body-sm text-[12px] bg-surface-container-lowest px-4 py-2 rounded-xl border border-outline-variant/30 shadow-xs self-start sm:self-auto whitespace-nowrap">
<div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span><span class="font-medium text-on-surface">Hadir</span></div>
<div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-indigo-500"></span><span class="font-medium text-on-surface">Izin / Sakit</span></div>
<div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span><span class="font-medium text-rose-700">Belum Diisi (&gt;12 Jam)</span></div>
</div>
</div>
<div class="bg-surface-container-lowest p-3.5 rounded-2xl border border-outline-variant/40 shadow-xs flex flex-wrap items-center justify-between gap-3">
<div class="flex flex-wrap items-center gap-2.5 w-full lg:w-auto">
<div class="flex items-center bg-surface-container-low hover:bg-surface-container border border-outline-variant/30 rounded-xl px-3 py-1.5 text-on-surface gap-2 cursor-pointer transition-colors min-w-[170px]"><span class="material-symbols-outlined text-primary-container text-[18px]">calendar_month</span><div class="flex flex-col"><span class="font-label-sm text-[10px] text-on-surface-variant">Periode Belajar</span><span class="font-label-md text-label-md font-semibold text-on-surface">Oktober 2026</span></div><span class="material-symbols-outlined text-outline ml-auto text-[16px]">expand_more</span></div>
<div class="flex items-center bg-surface-container-low hover:bg-surface-container border border-outline-variant/30 rounded-xl px-3 py-1.5 text-on-surface gap-2 cursor-pointer transition-colors min-w-[190px]"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">school</span><div class="flex flex-col"><span class="font-label-sm text-[10px] text-on-surface-variant">Filter Siswa</span><span class="font-label-md text-label-md font-semibold text-on-surface">Semua Siswa ({{ $m['students'] }})</span></div><span class="material-symbols-outlined text-outline ml-auto text-[16px]">expand_more</span></div>
<div class="flex items-center bg-surface-container-low hover:bg-surface-container border border-outline-variant/30 rounded-xl px-3 py-1.5 text-on-surface gap-2 cursor-pointer transition-colors min-w-[185px]"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">person_celebrate</span><div class="flex flex-col"><span class="font-label-sm text-[10px] text-on-surface-variant">Filter Tutor</span><span class="font-label-md text-label-md font-semibold text-on-surface">Semua Tutor ({{ $m['tutors'] }})</span></div><span class="material-symbols-outlined text-outline ml-auto text-[16px]">expand_more</span></div>
<div class="flex items-center bg-surface-container-low hover:bg-surface-container border border-outline-variant/30 rounded-xl px-3 py-1.5 text-on-surface gap-2 cursor-pointer transition-colors min-w-[160px]"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">filter_list</span><div class="flex flex-col"><span class="font-label-sm text-[10px] text-on-surface-variant">Status Sesi</span><span class="font-label-md text-label-md font-semibold text-on-surface">Semua Status</span></div><span class="material-symbols-outlined text-outline ml-auto text-[16px]">expand_more</span></div>
</div>
<div class="flex items-center bg-surface-container-low border border-outline-variant/40 rounded-xl px-3 py-2 w-full lg:w-80 focus-within:border-primary-container focus-within:bg-surface-container-lowest transition-all"><span class="material-symbols-outlined text-outline text-[18px] mr-2">search</span><input class="bg-transparent font-body-sm text-[13px] text-on-surface placeholder:text-outline focus:outline-none focus:ring-0 border-0 p-0 w-full" placeholder="Cari materi, nama siswa, atau tutor..." type="text"><span class="font-label-sm text-[10px] bg-surface-container px-1.5 py-0.5 rounded text-on-surface-variant border border-outline-variant/30">⌘K</span></div>
</div>
</div>
<!-- 5. TABEL -->
<div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/40 shadow-xs overflow-hidden">
<!-- Tab 1: Log Pertemuan Real-time (tetap bisa digeser horizontal) -->
<div class="w-full scroll-x" id="tabContentLog">
<table class="w-full min-w-[1240px] text-left font-body-sm text-[13px] border-collapse">
<thead class="bg-surface-container-low text-on-surface-variant font-label-sm text-[11px] uppercase tracking-wider border-b border-outline-variant/40"><tr>
<th class="py-3 px-4 min-w-[200px]">Waktu &amp; Metode</th><th class="py-3 px-4 min-w-[220px]">Siswa &amp; Kelas</th><th class="py-3 px-4 min-w-[180px]">Tutor Pengajar</th><th class="py-3 px-4 min-w-[310px]">Materi &amp; Jurnal Belajar</th><th class="py-3 px-4 min-w-[170px]">Status Presensi</th><th class="py-3 px-4 min-w-[160px] text-right">Aksi Admin</th>
</tr></thead>
<tbody class="divide-y divide-outline-variant/25 text-on-surface">
@forelse($sessions as $s)

@if($s->att_status === 'belum')
<tr data-id="{{ $s->id }}" data-st="{{ $s->att_status }}" class="bg-amber-50/60 border-l-4 border-l-amber-500 hover:bg-amber-100/40 transition-colors">
<td class="py-3.5 px-4 align-top"><div class="flex flex-col"><span class="font-label-md text-label-md font-bold text-on-surface">{{ \App\Support\Fmt::dateShort($s->date) }}</span><span class="text-on-surface-variant text-[12px] font-medium">{{ \App\Support\Fmt::range($s->start_time, $s->end_time) }}</span><span class="mt-1.5 inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-amber-100/90 text-amber-900 border-amber-300/50 font-label-sm text-[10.5px] font-semibold w-fit border"><span class="material-symbols-outlined text-[13px] ">{{ \App\Support\Fmt::methodIcon($s->method) }}</span>{{ \App\Support\Fmt::method($s->method) }}{{ $s->location ? " • " . $s->location : "" }}</span></div></td>
<td class="py-3.5 px-4 align-top"><div class="flex items-start gap-2.5"><div class="w-8 h-8 rounded-full bg-amber-200 text-amber-900 flex items-center justify-center font-bold text-[12px] shrink-0 mt-0.5">{{ \App\Support\Fmt::initials($s->student->name) }}</div><div class="flex flex-col min-w-0"><span class="font-label-md text-label-md font-bold text-on-surface truncate">{{ $s->student->name }}</span><span class="text-on-surface-variant text-[12px]">{{ $s->student->grade }} • {{ $s->student->program }}</span><span class="text-[11px] text-outline mt-0.5">Wali: {{ $s->student->guardian_name }} ({{ $s->student->guardian_phone }})</span></div></div></td>
<td class="py-3.5 px-4 align-top"><div class="flex items-start gap-2"><div class="w-7 h-7 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-bold text-[11px] shrink-0 mt-0.5">{{ \App\Support\Fmt::initials($s->tutor->name ?? "-") }}</div><div class="flex flex-col"><span class="font-label-md text-label-md font-semibold text-on-surface">{{ $s->tutor->name ?? "-" }}</span><span class="text-on-surface-variant text-[11px]">{{ $s->tutor->headline ?? "-" }}</span><span class="text-[11px] text-outline">{{ $s->tutor->phone ?? "-" }}</span></div></div></td>
<td class="py-3.5 px-4 align-top"><div class="flex flex-col space-y-1"><div class="flex flex-wrap items-center gap-2"><span class="text-rose-700 italic text-[12px] font-medium inline-flex items-center gap-1"><span class="material-symbols-outlined text-[15px] text-rose-600">pending_actions</span>Belum diinput oleh siswa/wali murid (&gt;18 jam)</span><span class="px-1.5 py-0.5 rounded bg-rose-100 text-rose-700 font-label-sm text-[10px] font-bold shrink-0">Terlambat 12j+</span></div><p class="text-[11.5px] text-on-surface-variant">Sesi terjadwal: {{ $s->topic ?: $s->subject }}. Menunggu verifikasi log kehadiran.</p></div></td>
<td class="py-3.5 px-4 align-top"><div class="flex flex-col gap-1 min-w-0"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-rose-100 text-rose-800 font-label-sm text-[11px] font-bold w-fit border border-rose-300/50 whitespace-nowrap"><span class="w-1.5 h-1.5 rounded-full bg-rose-600 shrink-0"></span>Belum Diisi</span><span class="text-[10.5px] text-rose-700 font-medium truncate">SLA Terlewati</span></div></td>
<td class="py-3.5 px-4 align-top text-right"><div class="flex items-center justify-end gap-1.5"><button class="h-8 px-3 rounded-lg bg-amber-600 hover:bg-amber-700 text-white font-label-sm text-[11px] font-bold inline-flex items-center gap-1.5 shadow-xs transition-all whitespace-nowrap" data-prefill="{{ $s->id }}" type="button"><span class="material-symbols-outlined text-[15px]">edit_note</span><span>Catat Manual</span></button><a class="h-8 px-2.5 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-300/60 font-label-sm text-[11px] font-bold inline-flex items-center gap-1 transition-colors" href="{{ \App\Support\Fmt::waLink($s->tutor->phone ?? "", "Halo, mohon konfirmasi presensi sesi " . $s->student->name . ".") }}" target="_blank" title="Follow Up WhatsApp Tutor/Wali"><span class="material-symbols-outlined text-[15px] text-emerald-700">chat</span><span>WA</span></a></div></td>
</tr>
@elseif(in_array($s->att_status, ['izin', 'sakit']))
<tr data-id="{{ $s->id }}" data-st="{{ $s->att_status }}" class="hover:bg-surface-container-low transition-colors">
<td class="py-3.5 px-4 align-top"><div class="flex flex-col"><span class="font-label-md text-label-md font-bold text-on-surface">{{ \App\Support\Fmt::dateShort($s->date) }}</span><span class="text-on-surface-variant text-[12px] font-medium">{{ \App\Support\Fmt::range($s->start_time, $s->end_time) }}</span><span class="mt-1.5 inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-surface-container text-on-surface-variant border-outline-variant/30 font-label-sm text-[10.5px] font-semibold w-fit border"><span class="material-symbols-outlined text-[13px] text-tertiary">{{ \App\Support\Fmt::methodIcon($s->method) }}</span>{{ \App\Support\Fmt::method($s->method) }}{{ $s->location ? " • " . $s->location : "" }}</span></div></td>
<td class="py-3.5 px-4 align-top"><div class="flex items-start gap-2.5"><div class="w-8 h-8 rounded-full bg-indigo-100 text-tertiary flex items-center justify-center font-bold text-[12px] shrink-0 mt-0.5">{{ \App\Support\Fmt::initials($s->student->name) }}</div><div class="flex flex-col min-w-0"><span class="font-label-md text-label-md font-bold text-on-surface truncate">{{ $s->student->name }}</span><span class="text-on-surface-variant text-[12px]">{{ $s->student->grade }} • {{ $s->student->program }}</span><span class="text-[11px] text-outline mt-0.5">Wali: {{ $s->student->guardian_name }} ({{ $s->student->guardian_phone }})</span></div></div></td>
<td class="py-3.5 px-4 align-top"><div class="flex items-start gap-2"><div class="w-7 h-7 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-bold text-[11px] shrink-0 mt-0.5">{{ \App\Support\Fmt::initials($s->tutor->name ?? "-") }}</div><div class="flex flex-col"><span class="font-label-md text-label-md font-semibold text-on-surface">{{ $s->tutor->name ?? "-" }}</span><span class="text-on-surface-variant text-[11px]">{{ $s->tutor->headline ?? "-" }}</span><span class="text-[11px] text-outline">{{ $s->tutor->phone ?? "-" }}</span></div></div></td>
<td class="py-3.5 px-4 align-top"><div class="flex flex-col space-y-1"><div class="flex items-center gap-2"><span class="font-label-md text-[13px] font-bold text-on-surface">{{ $s->topic ?: $s->subject }}</span><span class="px-1.5 py-0.5 rounded bg-indigo-100 text-tertiary font-label-sm text-[10px] font-bold shrink-0">{{ $s->att_badge }}</span></div><p class="text-[12px] text-on-surface-variant leading-relaxed">{{ $s->attendance->journal ?? "-" }}</p></div></td>
<td class="py-3.5 px-4 align-top"><div class="flex flex-col gap-1 min-w-0"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-indigo-100 text-tertiary font-label-sm text-[11px] font-bold w-fit border border-indigo-200 whitespace-nowrap"><span class="w-1.5 h-1.5 rounded-full bg-tertiary shrink-0"></span>{{ ucfirst($s->attendance->status ?? "izin") }}</span><span class="text-[10.5px] text-on-surface-variant">{{ $s->att_by }}</span></div></td>
<td class="py-3.5 px-4 align-top text-right"><div class="flex items-center justify-end gap-1.5"><button class="h-8 px-2.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-sm text-[11px] font-semibold inline-flex items-center gap-1 transition-colors whitespace-nowrap" type="button"><span class="material-symbols-outlined text-[15px]">attachment</span><span>Surat Izin</span></button><button class="h-8 w-8 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container flex items-center justify-center transition-colors" title="Ubah Catatan" type="button"><span class="material-symbols-outlined text-[16px]">edit</span></button></div></td>
</tr>
@else
<tr data-id="{{ $s->id }}" data-st="{{ $s->att_status }}" class="hover:bg-surface-container-low transition-colors">
<td class="py-3.5 px-4 align-top"><div class="flex flex-col"><span class="font-label-md text-label-md font-bold text-on-surface">{{ \App\Support\Fmt::dateShort($s->date) }}</span><span class="text-on-surface-variant text-[12px] font-medium">{{ \App\Support\Fmt::range($s->start_time, $s->end_time) }}</span><span class="mt-1.5 inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-surface-container text-on-surface-variant border-outline-variant/30 font-label-sm text-[10.5px] font-semibold w-fit border"><span class="material-symbols-outlined text-[13px] text-primary">{{ \App\Support\Fmt::methodIcon($s->method) }}</span>{{ \App\Support\Fmt::method($s->method) }}{{ $s->location ? " • " . $s->location : "" }}</span></div></td>
<td class="py-3.5 px-4 align-top"><div class="flex items-start gap-2.5"><div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-[12px] shrink-0 mt-0.5">{{ \App\Support\Fmt::initials($s->student->name) }}</div><div class="flex flex-col min-w-0"><span class="font-label-md text-label-md font-bold text-on-surface truncate">{{ $s->student->name }}</span><span class="text-on-surface-variant text-[12px]">{{ $s->student->grade }} • {{ $s->student->program }}</span><span class="text-[11px] text-outline mt-0.5">Wali: {{ $s->student->guardian_name }} ({{ $s->student->guardian_phone }})</span></div></div></td>
<td class="py-3.5 px-4 align-top"><div class="flex items-start gap-2"><div class="w-7 h-7 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-bold text-[11px] shrink-0 mt-0.5">{{ \App\Support\Fmt::initials($s->tutor->name ?? "-") }}</div><div class="flex flex-col"><span class="font-label-md text-label-md font-semibold text-on-surface">{{ $s->tutor->name ?? "-" }}</span><span class="text-on-surface-variant text-[11px]">{{ $s->tutor->headline ?? "-" }}</span><span class="text-[11px] text-outline">{{ $s->tutor->phone ?? "-" }}</span></div></div></td>
<td class="py-3.5 px-4 align-top"><div class="flex flex-col space-y-1"><div class="flex items-center gap-2"><span class="font-label-md text-[13px] font-bold text-on-surface">{{ $s->topic ?: $s->subject }}</span><span class="px-1.5 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-[10px] font-semibold shrink-0">{{ $s->att_badge }}</span></div><p class="text-[12px] text-on-surface-variant leading-relaxed">{{ $s->attendance->journal ?? "-" }}</p></div></td>
<td class="py-3.5 px-4 align-top"><div class="flex flex-col gap-1 min-w-0"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800 font-label-sm text-[11px] font-bold w-fit border border-emerald-300/50 whitespace-nowrap"><span class="material-symbols-outlined text-[14px]">check</span>Hadir</span><span class="text-[10.5px] text-on-surface-variant">{{ $s->att_by }}</span></div></td>
<td class="py-3.5 px-4 align-top text-right"><div class="flex items-center justify-end gap-1.5"><button class="h-8 px-2.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-primary font-label-sm text-[11px] font-bold inline-flex items-center gap-1 transition-colors whitespace-nowrap" type="button"><span class="material-symbols-outlined text-[15px]">visibility</span><span>Lihat Detail</span></button><button class="h-8 w-8 rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container flex items-center justify-center transition-colors" title="Ubah Catatan" type="button"><span class="material-symbols-outlined text-[16px]">edit</span></button></div></td>
</tr>
@endif

@empty
<tr><td colspan="6" class="py-10 text-center text-xs text-slate-400">Belum ada catatan pertemuan.</td></tr>
@endforelse
</tbody>
</table>
</div>
<!-- Tab 2: Rekap Per Siswa -->
<div class="w-full scroll-x hidden" id="tabContentRekap">
<table class="w-full min-w-[1000px] text-left font-body-sm text-[13px] border-collapse">
<thead class="bg-surface-container-low text-on-surface-variant font-label-sm text-[11px] uppercase tracking-wider border-b border-outline-variant/40"><tr>
<th class="py-3 px-4">Nama Siswa &amp; Jenjang</th><th class="py-3 px-4">Tutor Utama</th><th class="py-3 px-4">Paket Les</th><th class="py-3 px-4 text-center">Hadir</th><th class="py-3 px-4 text-center">Izin</th><th class="py-3 px-4 text-center">Sakit</th><th class="py-3 px-4 text-center">Alpa</th><th class="py-3 px-4 min-w-[180px]">% Kehadiran</th><th class="py-3 px-4 text-right">Aksi</th>
</tr></thead>
<tbody class="divide-y divide-outline-variant/25 text-on-surface">
@foreach($recap as $row)
<tr class="hover:bg-surface-container-low transition-colors">
<td class="py-3.5 px-4"><div class="flex items-center gap-3"><div class="w-9 h-9 rounded-xl bg-primary-container text-on-primary flex items-center justify-center font-bold text-[13px]">{{ \App\Support\Fmt::initials($row->name) }}</div><div class="flex flex-col"><span class="font-label-md text-label-md font-bold text-on-surface">{{ $row->name }}</span><span class="text-on-surface-variant text-[12px]">{{ $row->grade }} • {{ $row->program }}</span></div></div></td>
<td class="py-3.5 px-4 font-semibold text-on-surface">{{ $row->tutor->name ?? "-" }}</td>
<td class="py-3.5 px-4"><span class="px-2.5 py-1 rounded-full bg-surface-container font-label-sm text-[11px] font-semibold text-on-surface whitespace-nowrap">{{ $row->sessions_count }} Sesi</span></td>
<td class="py-3.5 px-4 text-center font-bold text-emerald-700">{{ $row->c_hadir }}</td>
<td class="py-3.5 px-4 text-center text-on-surface-variant">{{ $row->c_izin }}</td>
<td class="py-3.5 px-4 text-center text-on-surface-variant">{{ $row->c_sakit }}</td>
<td class="py-3.5 px-4 text-center text-on-surface-variant">{{ $row->c_alpa }}</td>
<td class="py-3.5 px-4"><div class="flex items-center gap-3"><div class="w-full bg-surface-container-high rounded-full h-2 overflow-hidden"><div class="bg-emerald-600 h-2 rounded-full" style="width: {{ $row->pct }}%"></div></div><span class="font-label-md text-label-md font-bold text-emerald-800">{{ $row->pct }}%</span></div></td>
<td class="py-3.5 px-4 text-right whitespace-nowrap"><button data-go="{{ route('admin.siswa.show', $row->id) }}" class="px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-primary font-label-sm text-[11px] font-bold transition-colors" type="button">Detail Rekap</button></td>
</tr>
@endforeach
</tbody>
</table>
</div>
<!-- Paginasi -->
<div class="p-4 bg-surface-container-lowest border-t border-outline-variant/30 flex flex-col sm:flex-row items-center justify-between gap-3 text-on-surface-variant font-body-sm text-[12.5px]">
<span class="font-medium">Menampilkan <strong class="text-on-surface">{{ $sessions->firstItem() ?? 0 }}–{{ $sessions->lastItem() ?? 0 }}</strong> dari <strong class="text-on-surface">{{ $sessions->total() }}</strong> catatan pertemuan</span>
<div class="flex items-center gap-1.5">
<button {{ $sessions->onFirstPage() ? "disabled" : "" }} data-go="{{ $sessions->previousPageUrl() }}" class="h-8 px-2.5 rounded-lg bg-surface-container-low flex items-center justify-center text-on-surface hover:bg-surface-container transition-colors disabled:opacity-40 disabled:cursor-not-allowed text-[12px] font-semibold gap-1" type="button"><span class="material-symbols-outlined text-[16px]">chevron_left</span><span>Prev</span></button>
@foreach(range(1, max(1, $sessions->lastPage())) as $pg)
@if($pg === $sessions->currentPage())
<button class="w-8 h-8 rounded-lg bg-primary-container text-on-primary flex items-center justify-center font-label-sm text-[12px] font-bold shadow-xs" type="button">{{ $pg }}</button>
@else
<button data-go="{{ $sessions->url($pg) }}" class="w-8 h-8 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container flex items-center justify-center font-label-sm text-[12px] font-medium" type="button">{{ $pg }}</button>
@endif
@endforeach
<button {{ $sessions->hasMorePages() ? "" : "disabled" }} data-go="{{ $sessions->nextPageUrl() }}" class="h-8 px-2.5 rounded-lg bg-surface-container-low flex items-center justify-center text-on-surface hover:bg-surface-container transition-colors text-[12px] font-semibold gap-1" type="button"><span>Next</span><span class="material-symbols-outlined text-[16px]">chevron_right</span></button>
</div>
</div>
</div>
<!-- 6. MODAL -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-inverse-surface/40 backdrop-blur-sm hidden transition-opacity" id="modalCatatPertemuan">
<div class="bg-surface-container-lowest rounded-2xl w-full max-w-xl shadow-2xl border border-outline-variant/50 overflow-hidden flex flex-col max-h-[92vh]">
<div class="p-5 bg-surface-container-low border-b border-outline-variant/30 flex items-center justify-between">
<div class="flex items-center gap-3"><div class="w-10 h-10 rounded-xl bg-primary-container text-on-primary flex items-center justify-center shadow-xs"><span class="material-symbols-outlined text-[22px]">assignment_add</span></div><div class="flex flex-col"><h3 class="font-headline-sm text-[16px] text-on-surface font-bold">Catat Pertemuan &amp; Jurnal Manual</h3><span class="font-body-sm text-[12px] text-on-surface-variant">Pencatatan berita acara &amp; presensi sesi oleh Admin Cabang</span></div></div>
<button class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors" id="btnCloseModal" type="button"><span class="material-symbols-outlined text-[20px]">close</span></button>
</div>
<form class="p-6 overflow-y-auto space-y-4" id="formCatatPertemuan">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-bold flex items-center justify-between"><span>Pilih Sesi Les Terjadwal <span class="text-rose-600">*</span></span><span class="text-[11px] text-on-surface-variant font-normal">Sinkron dengan jadwal cabang</span></label>
<div class="relative"><select class="w-full bg-surface-container-low border border-outline-variant/50 text-on-surface font-body-md text-[13px] rounded-xl p-2.5 focus:bg-surface-container-lowest focus:border-primary-container transition-all appearance-none cursor-pointer" id="modalSelectSesi">
@foreach($pending as $x)<option value="{{ $x->id }}">{{ \App\Support\Fmt::dateShort($x->date) }} - {{ $x->student->name }} • {{ $x->tutor->name ?? "-" }} ({{ $x->subject }})</option>@endforeach
</select><span class="material-symbols-outlined absolute right-3 top-3 text-outline pointer-events-none text-[18px]">expand_more</span></div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
<div class="flex flex-col gap-1.5"><label class="font-label-md text-label-md text-on-surface font-semibold text-[12px]">Tanggal Pelaksanaan</label><input class="w-full bg-surface-container-low border border-outline-variant/30 text-on-surface font-body-md text-[13px] rounded-xl p-2.5 focus:outline-none" id="modalInputTanggal" readonly="" type="text" value="21 Oktober 2026"></div>
<div class="flex flex-col gap-1.5"><label class="font-label-md text-label-md text-on-surface font-semibold text-[12px]">Waktu Sesi</label><input class="w-full bg-surface-container-low border border-outline-variant/30 text-on-surface font-body-md text-[13px] rounded-xl p-2.5 focus:outline-none" id="modalInputWaktu" readonly="" type="text" value="16:00 - 17:30 WIB"></div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-bold text-[12px]">Status Kehadiran Siswa <span class="text-rose-600">*</span></label>
<div class="grid grid-cols-4 gap-2">
<label class="cursor-pointer"><input checked="" class="peer sr-only" name="statusHadir" type="radio" value="hadir"><div class="py-2 text-center rounded-xl font-label-md text-[12px] font-bold bg-surface-container-low text-on-surface-variant border border-outline-variant/40 peer-checked:bg-emerald-100 peer-checked:text-emerald-800 peer-checked:border-emerald-400 transition-all">Hadir</div></label>
<label class="cursor-pointer"><input class="peer sr-only" name="statusHadir" type="radio" value="izin"><div class="py-2 text-center rounded-xl font-label-md text-[12px] font-bold bg-surface-container-low text-on-surface-variant border border-outline-variant/40 peer-checked:bg-indigo-100 peer-checked:text-tertiary peer-checked:border-indigo-400 transition-all">Izin</div></label>
<label class="cursor-pointer"><input class="peer sr-only" name="statusHadir" type="radio" value="sakit"><div class="py-2 text-center rounded-xl font-label-md text-[12px] font-bold bg-surface-container-low text-on-surface-variant border border-outline-variant/40 peer-checked:bg-indigo-100 peer-checked:text-tertiary peer-checked:border-indigo-400 transition-all">Sakit</div></label>
<label class="cursor-pointer"><input class="peer sr-only" name="statusHadir" type="radio" value="alpa"><div class="py-2 text-center rounded-xl font-label-md text-[12px] font-bold bg-surface-container-low text-on-surface-variant border border-outline-variant/40 peer-checked:bg-rose-100 peer-checked:text-rose-800 peer-checked:border-rose-400 transition-all">Alpa</div></label>
</div>
</div>
<div class="flex flex-col gap-1.5"><label class="font-label-md text-label-md text-on-surface font-bold text-[12px]">Materi yang Diajarkan <span class="text-rose-600">*</span></label><input class="w-full bg-surface-container-low border border-outline-variant/40 text-on-surface font-body-md text-[13px] rounded-xl p-2.5 focus:bg-surface-container-lowest focus:border-primary-container transition-all" id="modalInputMateri" placeholder="Misal: Hukum Newton II &amp; Dinamika Gerak" type="text" value="Hukum Newton II &amp; Dinamika Gerak Lurus"></div>
<div class="flex flex-col gap-1.5"><label class="font-label-md text-label-md text-on-surface font-bold text-[12px]">Rangkuman Evaluasi / Pemahaman Siswa</label><textarea class="w-full bg-surface-container-low border border-outline-variant/40 text-on-surface font-body-md text-[13px] rounded-xl p-2.5 focus:bg-surface-container-lowest focus:border-primary-container transition-all resize-none" placeholder="Catatan respon siswa terhadap materi les..." rows="3">Siswa Farhan telah memahami konsep gaya gesek statis &amp; kinetis. Perlu penguatan pada soal variasi bidang miring. Modul latihan 15 soal telah diserahkan.</textarea></div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-bold text-[12px]">Catatan / Alasan Input Manual Admin <span class="text-rose-600">*</span></label>
<div class="grid grid-cols-1 gap-2">
<label class="flex items-center gap-2.5 p-2 rounded-xl bg-surface-container-low border border-outline-variant/30 cursor-pointer hover:bg-surface-container transition-colors"><input checked="" class="text-primary-container focus:ring-primary-container" name="alasanAdmin" type="radio" value="wa"><span class="font-body-sm text-[12.5px] text-on-surface">Dikonfirmasi via WhatsApp dengan Wali Murid (Ibu Ratna / Bpk. Nugraha)</span></label>
<label class="flex items-center gap-2.5 p-2 rounded-xl bg-surface-container-low border border-outline-variant/30 cursor-pointer hover:bg-surface-container transition-colors"><input class="text-primary-container focus:ring-primary-container" name="alasanAdmin" type="radio" value="app"><span class="font-body-sm text-[12.5px] text-on-surface">Kendala Teknis Aplikasi Wali/Siswa (Tidak bisa upload mandiri)</span></label>
</div>
</div>
</form>
<div class="p-4 bg-surface-container-low border-t border-outline-variant/30 flex items-center justify-end gap-3">
<button class="h-10 px-4 rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface font-label-lg text-label-lg font-semibold transition-colors" id="btnCancelModal" type="button">Batal</button>
<button class="h-10 px-5 rounded-xl bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg font-bold flex items-center gap-2 shadow-sm transition-all" id="btnSubmitModal" type="button"><span class="material-symbols-outlined text-[18px]">verified</span><span>Simpan Presensi</span></button>
</div>
</div>
</div>
</div>
</main>
</div>
<!-- Page Interactivity Scripts -->
<script>
  // Tab Switching Logic
  const tabBtnLog = document.getElementById('tabBtnLog');
  const tabBtnRekap = document.getElementById('tabBtnRekap');
  const tabContentLog = document.getElementById('tabContentLog');
  const tabContentRekap = document.getElementById('tabContentRekap');
  tabBtnLog.addEventListener('click', () => {
    tabBtnLog.className = 'px-4 py-2 rounded-lg font-label-lg text-label-lg transition-all bg-surface-container-lowest text-primary-container font-bold shadow-xs flex items-center gap-2 whitespace-nowrap';
    tabBtnRekap.className = 'px-4 py-2 rounded-lg font-label-lg text-label-lg transition-all text-on-surface-variant hover:text-on-surface font-medium flex items-center gap-2 whitespace-nowrap';
    tabContentLog.classList.remove('hidden');
    tabContentRekap.classList.add('hidden');
  });
  tabBtnRekap.addEventListener('click', () => {
    tabBtnRekap.className = 'px-4 py-2 rounded-lg font-label-lg text-label-lg transition-all bg-surface-container-lowest text-primary-container font-bold shadow-xs flex items-center gap-2 whitespace-nowrap';
    tabBtnLog.className = 'px-4 py-2 rounded-lg font-label-lg text-label-lg transition-all text-on-surface-variant hover:text-on-surface font-medium flex items-center gap-2 whitespace-nowrap';
    tabContentRekap.classList.remove('hidden');
    tabContentLog.classList.add('hidden');
  });

  // Modal Control Logic
  const modal = document.getElementById('modalCatatPertemuan');
  const btnOpenModal = document.getElementById('btnOpenModal');
  const btnCloseModal = document.getElementById('btnCloseModal');
  const btnCancelModal = document.getElementById('btnCancelModal');
  const btnSubmitModal = document.getElementById('btnSubmitModal');
  function openModal() { modal.classList.remove('hidden'); document.body.style.overflow = 'hidden'; }
  function closeModal() { modal.classList.add('hidden'); document.body.style.overflow = ''; }
  btnOpenModal.addEventListener('click', openModal);
  btnCloseModal.addEventListener('click', closeModal);
  btnCancelModal.addEventListener('click', closeModal);
  modal.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

  window.openModalWithPrefill = function(siswa, tutor, materi, tgl, waktu) {
    const inputMateri = document.getElementById('modalInputMateri');
    const inputTgl = document.getElementById('modalInputTanggal');
    const inputWaktu = document.getElementById('modalInputWaktu');
    if (inputMateri && materi) inputMateri.value = materi;
    if (inputTgl && tgl) inputTgl.value = tgl;
    if (inputWaktu && waktu) inputWaktu.value = waktu;
    openModal();
  };

  btnSubmitModal.addEventListener('click', () => {
    const originalText = btnSubmitModal.innerHTML;
    btnSubmitModal.innerHTML = '<span class="material-symbols-outlined text-[18px] animate-spin">refresh</span><span>Menyimpan Presensi...</span>';
    setTimeout(() => { btnSubmitModal.innerHTML = originalText; closeModal(); }, 500);
  });
</script>

<script src="{{ asset('js/opc.js') }}"></script><script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});
const API = {!! json_encode(url('/admin/presensi')) !!};
const PEND = {!! json_encode($pendingJson) !!};
OPC.on('Ekspor Rekap (XLS/PDF)', () => OPC.go({!! json_encode(route('admin.export', 'presensi')) !!}), {exact: false});
function fillModal(id) { const d = PEND[id]; if (!d) return; document.getElementById('modalSelectSesi').value = id; document.getElementById('modalInputTanggal').value = d.date; document.getElementById('modalInputWaktu').value = d.time; document.getElementById('modalInputMateri').value = d.topic || ''; }
const selSesi = document.getElementById('modalSelectSesi'); const fm = document.getElementById('formCatatPertemuan');
fm.querySelector('textarea').value = '';
selSesi.addEventListener('change', () => fillModal(selSesi.value)); if (selSesi.value) fillModal(selSesi.value);
document.querySelectorAll('[data-prefill]').forEach(b => b.addEventListener('click', () => { fillModal(b.dataset.prefill); }));
document.getElementById('btnSubmitModal').addEventListener('click', async e => {
  e.stopImmediatePropagation();
  const st = (fm.querySelector('input[name=statusHadir]:checked') || {}).value, al = (fm.querySelector('input[name=alasanAdmin]:checked') || {}).value;
  if (!selSesi.value) return OPC.toast('Tidak ada sesi yang perlu dicatat.', false);
  try { const j = await OPC.post(API, {session_id: selSesi.value, status: st, topic: document.getElementById('modalInputMateri').value, journal: fm.querySelector('textarea').value, reason: al});
    document.getElementById('modalCatatPertemuan').classList.add('hidden'); OPC.done(j, 'reload'); } catch (err) {}
}, true);
document.querySelectorAll('[data-detail]').forEach(b => b.addEventListener('click', () => OPC.go({!! json_encode(route('admin.siswa')) !!})));
document.querySelectorAll('button[title="Ubah Catatan"]').forEach(b => b.addEventListener('click', () => { const id = b.closest('tr').dataset.id; document.getElementById('btnOpenModal').click(); if (PEND[id]) fillModal(id); else OPC.toast('Catatan sesi ini sudah final; gunakan Catat Pertemuan Manual untuk sesi yang belum diisi.', true); }));
OPC.on('Surat Izin', () => OPC.toast('Surat izin dikirim via WhatsApp ke Admin Cabang.', true), {sel: 'button'});
OPC.on('Lihat Detail', () => {}, {sel: 'button'});
document.querySelectorAll('tbody button').forEach(b => { if (OPC.label(b) === 'Lihat Detail') b.addEventListener('click', () => { const tr = b.closest('tr'); OPC.toast(tr.querySelector('p') ? tr.querySelector('p').textContent.slice(0, 160) : 'Tidak ada jurnal.', true); }); });
// pencarian
const qi = document.querySelector('input[placeholder^="Cari materi"]'); const trs = [...document.querySelectorAll('#tabContentLog tbody tr[data-id], #tabContentRekap tbody tr')];
const Q = new URLSearchParams(location.search); qi.value = Q.get('q') || '';
qi.addEventListener('input', () => { const v = qi.value.toLowerCase(); trs.forEach(t => t.style.display = t.textContent.toLowerCase().includes(v) ? '' : 'none'); });
// filter kartu (siswa / tutor / status) via dialog
const filters = [...document.querySelectorAll('div')].filter(d => ['Filter Siswa', 'Filter Tutor', 'Status Sesi'].some(x => d.firstElementChild && d.firstElementChild.textContent.trim() === x));
function nav(k, v) { const u = new URL(location.href); u.searchParams.delete('page'); v ? u.searchParams.set(k, v) : u.searchParams.delete(k); location.href = u.toString(); }
const FS = {!! json_encode($filterStudents) !!}, FT = {!! json_encode($filterTutors) !!};
filters.forEach(f => { const box = f.closest('div[class*=cursor], div[class*=rounded]') || f.parentElement; box.style.cursor = 'pointer'; const t = f.firstElementChild.textContent.trim();
  box.addEventListener('click', () => { if (t === 'Filter Siswa') OPC.dialog({title: 'Filter Siswa', fields: [{name: 'v', label: 'Siswa', type: 'select', value: Q.get('student') || '', options: [{v: '', t: 'Semua Siswa'}].concat(FS.map(s => ({v: s.id, t: s.name})))}], submit: 'Terapkan', onSubmit: async v => nav('student', v.v)});
    if (t === 'Filter Tutor') OPC.dialog({title: 'Filter Tutor', fields: [{name: 'v', label: 'Tutor', type: 'select', value: Q.get('tutor') || '', options: [{v: '', t: 'Semua Tutor'}].concat(FT.map(s => ({v: s.id, t: s.name})))}], submit: 'Terapkan', onSubmit: async v => nav('tutor', v.v)});
    if (t === 'Status Sesi') OPC.dialog({title: 'Status Sesi', fields: [{name: 'v', label: 'Status', type: 'select', value: Q.get('status') || '', options: [{v: '', t: 'Semua Status'}, {v: 'hadir', t: 'Hadir'}, {v: 'izin', t: 'Izin'}, {v: 'sakit', t: 'Sakit'}, {v: 'belum', t: 'Belum Diisi'}]}], submit: 'Terapkan', onSubmit: async v => nav('status', v.v)}); }); });
</script></body></html>