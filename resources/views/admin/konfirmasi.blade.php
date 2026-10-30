<!DOCTYPE html><html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}"><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta content="web_dashboard" name="shell-type"><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"><style>@@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={"darkMode":"class","theme":{"extend":{"colors":{"on-tertiary-container":"#f1eeff","surface-dim":"#d2d9f4","secondary-fixed-dim":"#6bd8cb","on-primary":"#ffffff","background":"#faf8ff","surface-container-high":"#e2e7ff","tertiary":"#3e3fcc","primary":"#004ac6","on-surface":"#131b2e","inverse-primary":"#b4c5ff","primary-fixed":"#dbe1ff","surface-container-highest":"#dae2fd","surface-container-low":"#f2f3ff","error":"#ba1a1a","on-error-container":"#93000a","on-primary-container":"#eeefff","surface-container-lowest":"#ffffff","surface":"#faf8ff","secondary-fixed":"#89f5e7","outline-variant":"#c3c6d7","surface-tint":"#0053db","surface-container":"#eaedff","primary-container":"#2563eb","on-surface-variant":"#434655","outline":"#737686","surface-bright":"#faf8ff","tertiary-container":"#585be6","on-secondary":"#ffffff","on-tertiary-fixed-variant":"#2f2ebe","inverse-surface":"#283044","secondary-container":"#86f2e4","error-container":"#ffdad6","on-secondary-fixed-variant":"#005049","surface-variant":"#dae2fd","on-secondary-container":"#006f66","on-primary-fixed":"#00174b","tertiary-fixed":"#e1e0ff","secondary":"#006a61","inverse-on-surface":"#eef0ff","on-background":"#131b2e","tertiary-fixed-dim":"#c0c1ff","primary-fixed-dim":"#b4c5ff","on-tertiary":"#ffffff","on-tertiary-fixed":"#07006c","on-secondary-fixed":"#00201d","on-error":"#ffffff","on-primary-fixed-variant":"#003ea8"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px"},"spacing":{"space-sm":"0.5rem","gutter-mobile":"1rem","space-lg":"1.5rem","space-md":"1rem","margin-mobile":"1rem","space-xl":"2rem","space-xs":"0.25rem","gutter":"1.5rem","margin":"2rem"},"fontFamily":{"label-md":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"label-lg":["Plus Jakarta Sans"],"body-md":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"display-lg-mobile":["Plus Jakarta Sans"],"headline-xl":["Plus Jakarta Sans"],"label-sm":["Plus Jakarta Sans"],"body-sm":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"]},"fontSize":{"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"display-lg":["40px",{"lineHeight":"48px","letterSpacing":"-0.02em","fontWeight":"700"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-md":["20px",{"lineHeight":"28px","fontWeight":"600"}],"headline-xl-mobile":["24px",{"lineHeight":"32px","letterSpacing":"-0.015em","fontWeight":"700"}],"headline-lg":["24px",{"lineHeight":"32px","letterSpacing":"-0.01em","fontWeight":"600"}],"display-lg-mobile":["30px",{"lineHeight":"38px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-xl":["32px",{"lineHeight":"40px","letterSpacing":"-0.015em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"26px","fontWeight":"600"}]}}}}</script></head><body class="bg-surface font-body-md text-on-surface"><aside class="fixed left-0 top-0 h-full w-[258px] bg-surface-container-lowest border-r border-outline-variant/40 z-50 flex flex-col justify-between py-5"><div class="flex flex-col"><div class="px-5 flex items-center gap-3 mb-6"><div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-on-primary text-[22px]">school</span></div><div class="flex flex-col min-w-0"><span class="font-label-lg text-label-lg text-primary-container font-bold truncate tracking-tight">One Private Course</span><span class="font-label-sm text-label-sm text-on-surface-variant font-medium truncate">Sistem Manajemen Bimbel</span></div></div><div class="px-5 mb-5"><button class="w-full h-10 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg rounded-lg flex items-center justify-center gap-2 transition-colors" type="button"><span class="material-symbols-outlined text-[18px]">add</span><span class="">Tambah Sesi Les</span></button></div><nav class="flex flex-col gap-1 px-3" data-active-classes="bg-surface-container-low text-primary-container font-semibold rounded-lg"><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="dashboard-ringkasan" href="{{ route('admin.dashboard') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">grid_view</span><span class="font-label-lg text-label-lg">Dashboard Ringkasan</span></div><span class="w-2 h-2 rounded-full bg-primary-container shrink-0"></span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="jadwal-dan-sesi-les" href="{{ route('admin.jadwal') }}"><span class="material-symbols-outlined text-[20px]">calendar_month</span><span class="font-label-lg text-label-lg">Jadwal &amp; Sesi Les</span></a><a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="database-siswa" href="{{ route('admin.siswa') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">group</span><span class="font-label-lg text-label-lg">Database Siswa</span></div><span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">{{ $nav['students'] }}</span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="tutor-dan-guru-pengajar" href="{{ route('admin.tutor') }}"><span class="material-symbols-outlined text-[20px]">person_apron</span><span class="font-label-lg text-label-lg">Tutor &amp; Guru Pengajar</span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="presensi-dan-laporan" href="{{ route('admin.presensi') }}"><span class="material-symbols-outlined text-[20px]">assignment_turned_in</span><span class="font-label-lg text-label-lg">Presensi &amp; Laporan</span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="pembayaran" href="{{ route('admin.pembayaran') }}"><span class="material-symbols-outlined text-[20px]">payments</span><span class="font-label-lg text-label-lg">Pembayaran</span></a><div class="border-t border-outline-variant/30 my-2 mx-1"></div><a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="konfirmasi-sesi" href="{{ route('admin.konfirmasi') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">pending_actions</span><span class="font-label-lg text-label-lg">Konfirmasi Sesi</span></div><span class="px-2 py-0.5 rounded-full bg-error-container text-error font-label-sm text-label-sm font-semibold">{{ $nav['confirm'] }}</span></a></nav></div><div class="px-5 pt-3"><div class="p-3 bg-surface-container-low rounded-lg flex items-center gap-3"><span class="material-symbols-outlined text-primary-container text-[20px]">support_agent</span><div class="flex flex-col"><span class="font-label-sm text-label-sm font-semibold text-on-surface">Bantuan Cabang</span><span class="font-body-sm text-[11px] text-on-surface-variant">v2.4 LTS</span></div></div></div></aside><div class="pl-[258px]"><header class="fixed top-0 left-[258px] right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md border-b border-outline-variant/40 z-40 flex items-center justify-between px-8"><div class="flex items-center gap-2 font-label-lg text-label-lg"><span class="text-on-surface-variant">Operasional Cabang</span><span class="text-outline-variant">/</span><span class="text-on-surface-variant">Penjadwalan &amp; Sesi</span><span class="text-outline-variant">/</span><span class="text-on-surface font-semibold">Konfirmasi Sesi</span></div><div class="flex items-center gap-4"><div class="text-right flex flex-col"><span class="font-label-md text-label-md font-semibold text-on-surface">{{ auth()->user()->name }}</span><span class="font-body-sm text-[11px] text-on-surface-variant">Admin Cabang</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 bg-surface min-h-screen p-8"><div class="flex flex-col w-full gap-6">
<!-- Breadcrumb Navigation -->
<div class="flex items-center gap-2 text-[12px] font-medium text-on-surface-variant">
<span class="hover:text-primary cursor-pointer transition-colors">Operasional Cabang</span>
<span class="text-outline-variant">/</span>
<span class="hover:text-primary cursor-pointer transition-colors">Penjadwalan &amp; Sesi</span>
<span class="text-outline-variant">/</span>
<span class="text-on-surface font-semibold">Konfirmasi Sesi</span>
</div>
<!-- Page Header & Action Controls -->
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4"><div class="flex flex-col gap-1.5 max-w-2xl"><div class="flex items-center gap-3"><h1 class="text-[24px] text-on-surface tracking-tight font-bold">Konfirmasi Sesi</h1><span class="px-2.5 py-0.5 rounded-full bg-[#fee2e2] text-[#b91c1c] font-label-sm text-label-sm font-bold flex items-center gap-1.5 shadow-sm"><span class="w-1.5 h-1.5 rounded-full bg-[#b91c1c] animate-pulse"></span>{{ $k['urgent'] }} Urgent SLA</span></div><p class="text-[12px] text-on-surface-variant font-medium">Pantau dan kendalikan status konfirmasi ketersediaan jadwal dari tutor dan persetujuan orang tua murid secara real-time.</p></div><div class="flex items-center gap-3 shrink-0"><button class="h-10 px-4 rounded-lg bg-surface-container-lowest text-on-surface font-label-lg text-label-lg shadow-sm hover:bg-surface-container-low transition-all flex items-center gap-2 cursor-pointer" type="button"><span class="material-symbols-outlined text-[19px] text-on-surface-variant">download</span><span class="">Export Log (XLS/CSV)</span></button><button class="h-10 px-5 rounded-lg bg-primary-container text-on-primary font-label-lg text-label-lg shadow-sm hover:bg-primary transition-all flex items-center gap-2 cursor-pointer active:scale-95" onclick="kirimReminderMassal()" type="button"><span class="material-symbols-outlined text-[19px]">send</span><span class="">Kirim Reminder Massal</span></button></div></div>
<!-- SLA Target Info Banner -->
<div class="w-full bg-surface-container-low rounded-xl p-4.5 flex flex-col sm:flex-row sm:items-center gap-4 relative overflow-hidden shadow-sm"><div class="w-1.5 self-stretch bg-primary-container rounded-full shrink-0"></div><div class="w-10 h-10 rounded-xl bg-primary-fixed text-primary flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-[24px]">timer</span></div><div class="flex-1"><div class="flex items-center gap-2 mb-1"><span class="font-label-lg text-label-lg text-primary font-bold">Standar Operasional (SLA) Konfirmasi Sesi Cabang</span><span class="px-2 py-0.5 rounded bg-primary-container/10 text-primary-container font-label-sm text-label-sm font-semibold">Kebijakan Mutu</span></div><p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">Target konfirmasi tutor adalah <strong class="text-on-surface font-semibold">≤ 1 hari (24 jam)</strong> sebelum sesi dimulai, dan konfirmasi orang tua wali murid <strong class="text-on-surface font-semibold">≤ 4 jam</strong> setelah jadwal dirilis. Sesi yang melampaui batas toleransi ditandai status merah dan wajib segera ditindaklanjuti secara manual oleh tim admin operasional.</p></div><div class="flex flex-wrap sm:flex-nowrap items-center gap-3 pt-2 sm:pt-0 sm:pl-4 sm:border-l border-outline-variant/30 shrink-0"><div class="bg-surface-container-lowest px-3 py-2 rounded-lg shadow-sm flex items-center gap-2.5"><span class="material-symbols-outlined text-[18px] text-primary">schedule</span><div class="flex flex-col"><span class="font-label-sm text-[11px] text-on-surface-variant font-medium">Target Tutor</span><span class="font-label-md text-label-md text-on-surface font-bold">≤ 24 Jam Pra-Sesi</span></div></div><div class="bg-surface-container-lowest px-3 py-2 rounded-lg shadow-sm flex items-center gap-2.5"><span class="material-symbols-outlined text-[18px] text-secondary">schedule</span><div class="flex flex-col"><span class="font-label-sm text-[11px] text-on-surface-variant font-medium">Target Orang Tua</span><span class="font-label-md text-label-md text-on-surface font-bold">≤ 4 Jam Pasca-Jadwal</span></div></div></div></div>
<!-- Summary Metric KPI Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-5"><div class="bg-surface-container-lowest rounded-xl p-6 flex flex-col justify-between shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow"><div class="flex items-start justify-between mb-3"><div><span class="font-label-md text-label-md text-on-surface-variant font-semibold uppercase tracking-wider block mb-1">Menunggu Respon Tutor</span><div class="flex items-baseline gap-2"><span class="font-headline-xl text-headline-xl font-bold text-[#b45309]">{{ $k['waitTutor'] }}</span><span class="font-headline-sm text-headline-sm text-[#b45309] font-medium">Sesi</span></div></div><div class="w-12 h-12 rounded-xl bg-[#fef3c7] text-[#b45309] flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-[26px]">person_alert</span></div></div><p class="font-body-sm text-body-sm text-on-surface-variant mb-4">Menunggu respon ketersediaan kehadiran tutor pengajar</p><div class="space-y-2"><div class="flex items-center justify-between font-label-sm text-label-sm"><span class="text-on-surface-variant">Rasio Antrean</span><span class="font-semibold text-on-surface">{{ $k['waitTutor'] }} / {{ $k['total'] }} sesi ({{ $k['pctTutor'] }}%)</span></div><div class="w-full h-1.5 rounded-full bg-surface-container-high overflow-hidden"><div class="h-full bg-[#f59e0b] rounded-full" style="width: {{ $k['pctTutor'] }}%"></div></div><div class="pt-2 flex items-center"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#fee2e2] text-[#b91c1c] font-label-sm text-label-sm font-semibold"><span class="material-symbols-outlined text-[14px]">warning</span> {{ $k['lateTutor'] }} Melewati SLA (&gt;24 Jam)</span></div></div></div><div class="bg-surface-container-lowest rounded-xl p-6 flex flex-col justify-between shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow"><div class="flex items-start justify-between mb-3"><div><span class="font-label-md text-label-md text-on-surface-variant font-semibold uppercase tracking-wider block mb-1">Menunggu Verifikasi Orang Tua</span><div class="flex items-baseline gap-2"><span class="font-headline-xl text-headline-xl font-bold text-primary-container">{{ $k['waitParent'] }}</span><span class="font-headline-sm text-headline-sm text-primary-container font-medium">Sesi</span></div></div><div class="w-12 h-12 rounded-xl bg-surface-container-high text-primary-container flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-[26px]">family_restroom</span></div></div><p class="font-body-sm text-body-sm text-on-surface-variant mb-4">Menunggu persetujuan dan verifikasi sesi dari wali murid</p><div class="space-y-2"><div class="flex items-center justify-between font-label-sm text-label-sm"><span class="text-on-surface-variant">Rasio Antrean</span><span class="font-semibold text-on-surface">{{ $k['waitParent'] }} / {{ $k['total'] }} sesi ({{ $k['pctParent'] }}%)</span></div><div class="w-full h-1.5 rounded-full bg-surface-container-high overflow-hidden"><div class="h-full bg-primary-container rounded-full" style="width: {{ $k['pctParent'] }}%"></div></div><div class="pt-2 flex items-center"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#fee2e2] text-[#b91c1c] font-label-sm text-label-sm font-semibold"><span class="material-symbols-outlined text-[14px]">schedule</span>{{ $k['lateParent'] }} Melewati SLA (&gt;4 Jam)</span></div></div></div><div class="bg-surface-container-lowest rounded-xl p-6 flex flex-col justify-between shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow"><div class="flex items-start justify-between mb-3"><div><span class="font-label-md text-label-md text-on-surface-variant font-semibold uppercase tracking-wider block mb-1">Terkonfirmasi Lengkap (Siap Jalan)</span><div class="flex items-baseline gap-2"><span class="font-headline-xl text-headline-xl font-bold text-[#0d9488]">{{ $k['ok'] }}</span><span class="font-headline-sm text-headline-sm text-[#0d9488] font-medium">Sesi</span></div></div><div class="w-12 h-12 rounded-xl bg-[#ccfbf1] text-[#0d9488] flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-[26px]">verified</span></div></div><p class="font-body-sm text-body-sm text-on-surface-variant mb-4">Kedua pihak telah menyetujui jadwal &amp; siap dilaksanakan</p><div class="space-y-2"><div class="flex items-center justify-between font-label-sm text-label-sm"><span class="text-on-surface-variant">Kepastian Pelaksanaan</span><span class="font-semibold text-on-surface">{{ $k['ok'] }} / {{ $k['total'] }} sesi ({{ $k['pctOk'] }}%)</span></div><div class="w-full h-1.5 rounded-full bg-surface-container-high overflow-hidden"><div class="h-full bg-[#0d9488] rounded-full" style="width: {{ $k['pctOk'] }}%"></div></div><div class="pt-2 flex items-center"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#ccfbf1] text-[#0d9488] font-label-sm text-label-sm font-semibold"><span class="material-symbols-outlined text-[14px]">thumb_up</span>Tingkat Keberhasilan {{ $k['pctOk'] }}%</span></div></div></div></div>
<!-- Filter & Navigation Tab Controls -->
<div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm flex flex-col xl:flex-row items-stretch xl:items-center justify-between gap-4"><div class="flex items-center gap-1.5 overflow-x-auto pb-1 xl:pb-0 scrollbar-none"><button class="px-3.5 py-2 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md font-semibold shrink-0 transition-colors shadow-sm cursor-pointer" type="button">Semua Sesi ({{ $k['total'] }})</button><button class="px-3.5 py-2 rounded-lg bg-surface-container-low text-on-surface-variant hover:text-on-surface font-label-md text-label-md font-semibold shrink-0 transition-colors cursor-pointer" type="button">Menunggu Tutor ({{ $k['waitTutor'] }})</button><button class="px-3.5 py-2 rounded-lg bg-surface-container-low text-on-surface-variant hover:text-on-surface font-label-md text-label-md font-semibold shrink-0 transition-colors cursor-pointer" type="button">Menunggu Orang Tua ({{ $k['waitParent'] }})</button><button class="px-3.5 py-2 rounded-lg bg-surface-container-low text-on-surface-variant hover:text-on-surface font-label-md text-label-md font-semibold shrink-0 transition-colors cursor-pointer" type="button">Sudah Terkonfirmasi ({{ $k['ok'] }})</button></div><div class="flex flex-wrap sm:flex-nowrap items-center gap-3"><div class="relative flex-1 sm:w-72"><span class="material-symbols-outlined text-outline absolute left-3 top-1/2 -translate-y-1/2 text-[18px]">search</span><input class="w-full h-10 pl-9 pr-3 text-on-surface bg-surface-container-low rounded-lg font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest placeholder:text-outline transition-all" placeholder="Cari siswa, tutor, atau materi..." type="text"></div><div class="relative shrink-0"><button class="h-10 px-3 bg-surface-container-low hover:bg-surface-container text-on-surface rounded-lg font-label-md text-label-md flex items-center gap-2 transition-colors cursor-pointer" type="button"><span class="material-symbols-outlined text-[18px] text-primary">date_range</span><span class="">Pekan Ini: {{ now()->startOfWeek()->day }} – {{ \App\Support\Fmt::dateLong(now()->endOfWeek()) }}</span><span class="material-symbols-outlined text-[16px] text-outline">expand_more</span></button></div><div class="relative shrink-0"><button class="h-10 px-3 bg-surface-container-low hover:bg-surface-container text-on-surface rounded-lg font-label-md text-label-md flex items-center gap-2 transition-colors cursor-pointer" type="button"><span class="material-symbols-outlined text-[18px] text-on-surface-variant">filter_list</span><span class="">Semua Metode (Home Visit / Online)</span><span class="material-symbols-outlined text-[16px] text-outline">expand_more</span></button></div></div></div>
<!-- Primary Confirmation Monitoring Table Card -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden flex flex-col">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low font-label-md text-label-md text-on-surface-variant uppercase tracking-wider"><th class="py-3.5 px-4 font-semibold text-[12px] whitespace-nowrap">Waktu &amp; Metode</th><th class="py-3.5 px-4 font-semibold text-[12px] whitespace-nowrap">Siswa &amp; Wali</th><th class="py-3.5 px-4 font-semibold text-[12px] whitespace-nowrap">Tutor Pengajar</th><th class="py-3.5 px-3 font-semibold text-center text-[12px] whitespace-nowrap">Status Tutor</th><th class="py-3.5 px-3 font-semibold text-center text-[12px] whitespace-nowrap">Status Ortu</th><th class="py-3.5 px-4 font-semibold text-[12px] whitespace-nowrap">Durasi SLA</th><th class="py-3.5 px-4 font-semibold text-right text-[12px] whitespace-nowrap">Aksi Cepat</th></tr>
</thead>
<tbody class="font-body-sm text-body-sm divide-y-0 text-on-surface">
@forelse($sessions as $s)
<tr data-id="{{ $s->id }}" data-cat="{{ $s->cat }}" class="hover:bg-surface-container-low/60 transition-colors group">
<td class="py-4 px-5 align-top">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg font-bold text-on-surface">{{ \App\Support\Fmt::dateShort($s->date) }}</span>
<span class="text-on-surface-variant text-[13px] mb-1.5">{{ \App\Support\Fmt::range($s->start_time, $s->end_time) }}</span>
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-surface-container-high text-primary font-label-sm text-label-sm w-fit font-medium">
<span class="material-symbols-outlined text-[14px]">{{ \App\Support\Fmt::methodIcon($s->method) }}</span>
                  {{ \App\Support\Fmt::method($s->method) }}{{ $s->location && $s->method === "home_visit" ? " - " . $s->location : "" }}
                </span>
</div>
</td>
<td class="py-4 px-5 align-top">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg font-semibold text-on-surface">{{ $s->student->name }}</span>
<span class="text-on-surface-variant text-[12px] mb-1">{{ $s->student->grade }}</span>
<span class="text-on-surface-variant flex items-center gap-1 text-[12px]">
<span class="material-symbols-outlined text-[14px] text-outline">person</span>
                  {{ $s->student->guardian_name }} ({{ $s->student->guardian_phone }})
                </span>
</div>
</td>
<td class="py-4 px-5 align-top">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg font-semibold text-on-surface">{{ $s->tutor->name ?? "-" }}</span>
<span class="text-on-surface-variant text-[12px] mb-1">{{ $s->subject }}</span>
<span class="text-on-surface-variant flex items-center gap-1 text-[12px]">
<span class="material-symbols-outlined text-[14px] text-outline">call</span>
                  {{ $s->tutor->phone ?? "-" }}
                </span>
</div>
</td>

@if($s->tutor_confirmed)

@if($s->parent_confirmed)
<td class="py-4 px-4 align-top text-center">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-[#ccfbf1] text-[#0d9488] font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-[15px]">check_circle</span>
                Terkonfirmasi
              </span>
</td>
@else
<td class="py-4 px-4 align-top text-center">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-[#fef3c7] text-[#b45309] font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-[15px]">schedule</span>
                Menunggu
              </span>
</td>
@endif

@else
<td class="py-4 px-4 align-top text-center">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-[#fef3c7] text-[#b45309] font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-[15px]">schedule</span>
                Menunggu
              </span>
</td>
@endif

<td class="py-4 px-4 align-top text-center">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-[#ccfbf1] text-[#0d9488] font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-[15px]">check_circle</span>
                Terkonfirmasi
              </span>
</td>

@if($s->sla_critical)
<td class="py-4 px-5 align-top">
<div class="flex flex-col gap-1">
<span class="font-label-lg text-label-lg font-bold text-[#b91c1c]">{{ $s->sla_text }}</span>
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#fee2e2] text-[#b91c1c] font-label-sm text-label-sm font-semibold w-fit">
<span class="material-symbols-outlined text-[12px]">error</span>
                  {{ $s->sla_label }}
                </span>
</div>
</td>
@else
<td class="py-4 px-5 align-top">
<div class="flex flex-col gap-1">
<span class="font-label-lg text-label-lg font-bold text-on-surface">{{ $s->sla_text }}</span>
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm font-medium w-fit">
<span class="material-symbols-outlined text-[12px]">hourglass_empty</span>
                  {{ $s->sla_label }}
                </span>
</div>
</td>
@endif


@if(!$s->tutor_confirmed)
<td class="py-4 px-5 align-top text-right"><div class="flex items-center justify-end gap-1.5 whitespace-nowrap"><button class="h-8 px-3 rounded-lg bg-surface-container-high hover:bg-primary-container hover:text-on-primary text-primary-container text-[12px] font-semibold transition-all cursor-pointer whitespace-nowrap shrink-0" onclick="tandaiKonfirmasi({{ $s->id }}, 'Tutor')" type="button">Konfirmasi Tutor</button><button class="w-8 h-8 rounded-lg bg-surface-container-low hover:bg-secondary-container text-secondary flex items-center justify-center transition-colors cursor-pointer shrink-0" onclick="salinDraftWA({{ $s->id }}, 'Tutor')" title="Salin Draft Pesan Reminder WhatsApp" type="button"><span class="material-symbols-outlined text-[18px]">chat</span></button><button class="w-8 h-8 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant flex items-center justify-center transition-colors cursor-pointer shrink-0" type="button"><span class="material-symbols-outlined text-[18px]">more_vert</span></button></div></td>
@elseif(!$s->parent_confirmed)
<td class="py-4 px-5 align-top text-right"><div class="flex items-center justify-end gap-1.5 whitespace-nowrap"><button class="h-8 px-3 rounded-lg bg-surface-container-high hover:bg-primary-container hover:text-on-primary text-primary-container text-[12px] font-semibold transition-all cursor-pointer whitespace-nowrap shrink-0" onclick="tandaiKonfirmasi({{ $s->id }}, 'Orang Tua')" type="button">Konfirmasi Ortu</button><button class="w-8 h-8 rounded-lg bg-surface-container-low hover:bg-secondary-container text-secondary flex items-center justify-center transition-colors cursor-pointer shrink-0" onclick="salinDraftWA({{ $s->id }}, 'Orang Tua')" title="Salin Draft Pesan Reminder WhatsApp" type="button"><span class="material-symbols-outlined text-[18px]">chat</span></button><button class="w-8 h-8 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant flex items-center justify-center transition-colors cursor-pointer shrink-0" type="button"><span class="material-symbols-outlined text-[18px]">more_vert</span></button></div></td>
@else
<td class="py-4 px-5 align-top text-right"><div class="flex items-center justify-end gap-1.5 whitespace-nowrap"><span class="text-[11px] font-semibold text-emerald-700 px-2">Siap Jalan</span><button class="w-8 h-8 rounded-lg bg-surface-container-low hover:bg-secondary-container text-secondary flex items-center justify-center transition-colors cursor-pointer shrink-0" onclick="salinDraftWA({{ $s->id }}, 'Orang Tua')" title="Salin Draft Pesan Reminder WhatsApp" type="button"><span class="material-symbols-outlined text-[18px]">chat</span></button><button class="w-8 h-8 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant flex items-center justify-center transition-colors cursor-pointer shrink-0" type="button"><span class="material-symbols-outlined text-[18px]">more_vert</span></button></div></td>
@endif

</tr>
@empty
<tr><td colspan="7" class="py-10 text-center text-xs text-slate-400">Tidak ada sesi yang perlu dikonfirmasi.</td></tr>
@endforelse
</tbody>
</table>
</div>
<!-- Table Pagination Footer -->
<div class="p-4 bg-surface-container-lowest flex flex-col sm:flex-row items-center justify-between gap-4">
<div class="font-body-sm text-body-sm text-on-surface-variant">
        Menampilkan <span class="font-semibold text-on-surface">{{ $sessions->firstItem() ?? 0 }} – {{ $sessions->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-on-surface">{{ $sessions->total() }}</span> sesi konfirmasi aktif
      </div>
<div class="flex items-center gap-1.5">
<button {{ $sessions->onFirstPage() ? "disabled" : "" }} data-go="{{ $sessions->previousPageUrl() }}" class="h-9 px-3 rounded-lg bg-surface-container-low text-outline font-label-sm text-label-sm flex items-center gap-1 opacity-50 cursor-not-allowed" type="button">
<span class="material-symbols-outlined text-[16px]">chevron_left</span>
<span class="">Sebelumnya</span>
</button>
@foreach(range(1, max(1, $sessions->lastPage())) as $pg)
@if($pg === $sessions->currentPage())
<button class="w-9 h-9 rounded-lg bg-primary-container text-on-primary font-label-sm text-label-sm font-bold shadow-sm cursor-pointer" type="button">{{ $pg }}</button>
@else
<button data-go="{{ $sessions->url($pg) }}" class="w-9 h-9 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold transition-colors cursor-pointer" type="button">{{ $pg }}</button>
@endif
@endforeach
<button {{ $sessions->hasMorePages() ? "" : "disabled" }} data-go="{{ $sessions->nextPageUrl() }}" class="h-9 px-3 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-sm text-label-sm flex items-center gap-1 transition-colors cursor-pointer" type="button">
<span class="">Selanjutnya</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Interactive WhatsApp Reminder Floating Preview Card -->
<aside aria-label="Template Reminder WhatsApp" class="fixed bottom-6 right-6 z-40 max-w-sm w-full bg-surface-container-lowest rounded-xl p-4 shadow-xl">
<div class="flex items-center justify-between mb-2">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-[#0d9488] animate-ping"></span>
<span class="font-label-md text-label-md font-bold text-on-surface">Preview Template WA Sesi</span>
</div>
<button class="text-on-surface-variant hover:text-on-surface transition-colors cursor-pointer" onclick="this.closest('aside').classList.add('hidden')" type="button">
<span class="material-symbols-outlined text-[18px]">close</span>
</button>
</div>
<div class="bg-surface-container-low rounded-lg p-3 text-[12px] font-body-sm text-on-surface leading-relaxed mb-3">
<p class="italic break-words text-[12px] leading-relaxed" id="waPreviewText">“Halo Kak Rina, mohon konfirmasi jadwal les privat Aisyah Putri (Rabu 22 Okt 16:00 WIB). Balas 1 untuk Setuju, 2 untuk Reschedule. Terima kasih - Admin One Private Course”</p>
</div>
<div class="flex items-center justify-between gap-2">
<span class="font-label-sm text-label-sm text-on-surface-variant">Otomasi Bot aktif</span>
<button class="h-8 px-3 rounded-lg bg-primary-container text-on-primary font-label-sm text-label-sm font-semibold flex items-center gap-1.5 hover:bg-primary transition-colors cursor-pointer shadow-sm" id="btnSalinTemplate" onclick="salinTemplateTeks()" type="button">
<span class="material-symbols-outlined text-[15px]">content_copy</span>
<span class="">Salin Template</span>
</button>
</div>
</aside>
<!-- Notification Toast Container -->
<div class="fixed top-20 right-8 z-50 transform transition-all duration-300 pointer-events-none bg-surface-container-lowest text-on-surface px-4 py-3 rounded-xl shadow-xl flex items-center gap-3 translate-x-full opacity-0" id="toastNotification">
<div class="w-8 h-8 rounded-lg bg-[#ccfbf1] text-[#0d9488] flex items-center justify-center shrink-0" id="toastIcon"><span class="material-symbols-outlined text-[20px]">check</span></div>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface" id="toastTitle">Konfirmasi Berhasil Dicatat</span>
<span class="font-body-sm text-body-sm text-on-surface-variant" id="toastDesc">Tutor an. Kak Rina M.Pd telah ditandai Hadir / Terkonfirmasi.</span>
</div>
</div>
<script>
    function showToast(title, desc, isSuccess = true) {
      const toast = document.getElementById('toastNotification');
      const toastTitle = document.getElementById('toastTitle');
      const toastDesc = document.getElementById('toastDesc');
      const toastIcon = document.getElementById('toastIcon');

      toastTitle.textContent = title;
      toastDesc.textContent = desc;
      
      if (isSuccess) {
        toastIcon.className = "w-8 h-8 rounded-lg bg-[#ccfbf1] text-[#0d9488] flex items-center justify-center shrink-0";
        toastIcon.innerHTML = '<span class="material-symbols-outlined text-[20px]">check</span>';
      } else {
        toastIcon.className = "w-8 h-8 rounded-lg bg-[#fee2e2] text-[#b91c1c] flex items-center justify-center shrink-0";
        toastIcon.innerHTML = '<span class="material-symbols-outlined text-[20px]">info</span>';
      }

      toast.classList.remove('translate-x-full', 'opacity-0');
      toast.classList.add('translate-x-0', 'opacity-100');

      setTimeout(() => {
        toast.classList.add('translate-x-full', 'opacity-0');
        toast.classList.remove('translate-x-0', 'opacity-100');
      }, 3200);
    }

    function tandaiKonfirmasi(nama, peran) {
      showToast('Konfirmasi Berhasil Dicatat', `${peran} an. ${nama} telah ditandai Hadir / Terkonfirmasi.`);
    }

    function salinDraftWA(siswa, penerima, waktu) {
      const draft = `Halo ${penerima}, mohon konfirmasi jadwal les privat ${siswa} (${waktu}). Balas 1 untuk Setuju, 2 untuk Reschedule. Terima kasih - Admin One Private Course`;
      document.getElementById('waPreviewText').textContent = `"${draft}"`;
      
      navigator.clipboard.writeText(draft).then(() => {
        showToast('Draft WhatsApp Tersalin', `Pesan untuk ${penerima} disalin ke clipboard.`);
      }).catch(() => {
        showToast('Draft WhatsApp Tersalin', `Pesan untuk ${penerima} disalin.`);
      });
    }

    function salinTemplateTeks() {
      const text = document.getElementById('waPreviewText').innerText.replace(/[“”]/g, '');
      const btn = document.getElementById('btnSalinTemplate');
      navigator.clipboard.writeText(text).then(() => {
        btn.innerHTML = '<span class="material-symbols-outlined text-[15px]">done</span><span>Tersalin!</span>';
        showToast('Tersalin!', 'Template pesan siap ditempel di WhatsApp Web/App.');
        setTimeout(() => {
          btn.innerHTML = '<span class="material-symbols-outlined text-[15px]">content_copy</span><span>Salin Template</span>';
        }, 2000);
      });
    }

    function kirimReminderMassal() {
      showToast('Reminder Massal Terkirim', '3 pesan pengingat SLA telah diteruskan ke nomor antrean WhatsApp.');
    }
  </script>
</div></main></div>




<script src="{{ asset('js/opc.js') }}"></script><script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});
const API = {!! json_encode(url('/admin/konfirmasi')) !!}; const WA = {!! json_encode($waJson) !!};
window.tandaiKonfirmasi = async function (id, peran) {
  try { const j = await OPC.post(API + '/' + id + '/' + (peran === 'Tutor' ? 'tutor' : 'ortu'), {}); showToast('Konfirmasi Berhasil Dicatat', j.message); setTimeout(() => location.reload(), 900); } catch (e) {}
};
window.salinDraftWA = function (id, who) {
  const d = WA[id]; if (!d) return; const draft = d[who === 'Tutor' ? 'tutor' : 'ortu'];
  const pv = document.getElementById('waPreviewText'); if (pv) pv.textContent = '"' + draft + '"';
  (navigator.clipboard ? navigator.clipboard.writeText(draft) : Promise.reject()).then(() => showToast('Draft WhatsApp Tersalin', 'Pesan disalin ke clipboard.')).catch(() => showToast('Draft WhatsApp', 'Pesan siap di panel preview.'));
  window.open(d[who === 'Tutor' ? 'tutor_link' : 'ortu_link'], '_blank');
};
window.kirimReminderMassal = async function () { try { const j = await OPC.post(API + '/reminder', {}); showToast('Reminder Massal', j.message); } catch (e) {} };
OPC.on('Export Log (XLS/CSV)', () => OPC.go({!! json_encode(route('admin.export', 'konfirmasi')) !!}), {exact: false});
// tab
const labels = ['Semua Sesi', 'Menunggu Tutor', 'Menunggu Orang Tua', 'Sudah Terkonfirmasi']; const keys = ['all', 'tutor', 'ortu', 'ok'];
const tb = labels.map(t => OPC.find(t, {sel: 'button', exact: false})[0]); const cur = keys.indexOf({!! json_encode($tab) !!});
const rows = [...document.querySelectorAll('tbody tr[data-id]')];
let ready = false; const ap = OPC.choice(tb, 0, k => { if (!ready) return; const u = new URL(location.href); u.searchParams.set('tab', keys[k]); u.searchParams.delete('page'); location.href = u.toString(); }); if (cur > 0) ap(cur); ready = true;
const qi = document.querySelector('input[placeholder^="Cari siswa"]'); qi.addEventListener('input', () => { const v = qi.value.toLowerCase(); rows.forEach(r => r.style.display = r.textContent.toLowerCase().includes(v) ? '' : 'none'); });
OPC.on('Pekan Ini', () => OPC.toast('Menampilkan sesi pekan ini.', true), {sel: 'button', exact: false});
document.querySelectorAll('button').forEach(b => { if (OPC.label(b).startsWith('Semua Metode')) b.addEventListener('click', () => { const on = b._m = !b._m; rows.forEach(r => { r.style.display = on && !r.textContent.includes('Online') ? 'none' : ''; }); OPC.toast(on ? 'Hanya sesi Online Zoom' : 'Semua metode', true); }); });
document.querySelectorAll('button').forEach(b => { if (OPC.label(b) === '' && b.textContent.trim() === 'more_vert') b.addEventListener('click', () => { const id = b.closest('tr').dataset.id; OPC.dialog({title: 'Aksi Sesi', desc: 'Pilih tindakan untuk sesi ini.', fields: [{name: 'a', label: 'Tindakan', type: 'select', options: [{v: 'jadwal', t: 'Ubah jadwal sesi'}, {v: 'batal', t: 'Batalkan sesi'}]}], submit: 'Lanjut', onSubmit: async v => { if (v.a === 'jadwal') OPC.go({!! json_encode(route('admin.jadwal.baru')) !!} + '?ubah=' + id); else { const j = await OPC.post({!! json_encode(url('/admin/jadwal')) !!} + '/' + id + '/batal', {}); OPC.done(j, 'reload'); } }}); }); });
</script></body></html>