<!DOCTYPE html><html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}"><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta content="web_dashboard" name="shell-type"><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"><style>@@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={"darkMode":"class","theme":{"extend":{"colors":{"on-primary-fixed-variant":"#003ea8","surface-container-highest":"#dae2fd","on-primary-container":"#eeefff","on-tertiary":"#ffffff","on-tertiary-container":"#f1eeff","primary-fixed-dim":"#b4c5ff","surface-container-lowest":"#ffffff","surface-container":"#eaedff","surface-dim":"#d2d9f4","tertiary":"#3e3fcc","secondary-fixed-dim":"#6bd8cb","inverse-primary":"#b4c5ff","on-primary-fixed":"#00174b","on-secondary":"#ffffff","background":"#faf8ff","on-background":"#131b2e","primary":"#004ac6","error":"#ba1a1a","on-tertiary-fixed-variant":"#2f2ebe","surface":"#faf8ff","tertiary-fixed":"#e1e0ff","on-surface-variant":"#434655","error-container":"#ffdad6","on-secondary-fixed":"#00201d","on-surface":"#131b2e","on-error-container":"#93000a","secondary":"#006a61","surface-container-low":"#f2f3ff","surface-bright":"#faf8ff","on-primary":"#ffffff","surface-container-high":"#e2e7ff","surface-variant":"#dae2fd","inverse-surface":"#283044","outline":"#737686","surface-tint":"#0053db","on-secondary-fixed-variant":"#005049","inverse-on-surface":"#eef0ff","on-secondary-container":"#006f66","tertiary-fixed-dim":"#c0c1ff","tertiary-container":"#585be6","outline-variant":"#c3c6d7","secondary-fixed":"#89f5e7","primary-fixed":"#dbe1ff","primary-container":"#2563eb","secondary-container":"#86f2e4","on-error":"#ffffff","on-tertiary-fixed":"#07006c"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px"},"spacing":{"space-xl":"2rem","gutter-mobile":"1rem","margin-mobile":"1rem","gutter":"1.5rem","space-xs":"0.25rem","space-sm":"0.5rem","space-md":"1rem","space-lg":"1.5rem","margin":"2rem"},"fontFamily":{"headline-xl":["Plus Jakarta Sans"],"label-lg":["Plus Jakarta Sans"],"body-md":["Plus Jakarta Sans"],"label-sm":["Plus Jakarta Sans"],"label-md":["Plus Jakarta Sans"],"body-sm":["Plus Jakarta Sans"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"],"display-lg-mobile":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"]},"fontSize":{"headline-xl":["32px",{"lineHeight":"40px","letterSpacing":"-0.015em","fontWeight":"700"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-xl-mobile":["24px",{"lineHeight":"32px","letterSpacing":"-0.015em","fontWeight":"700"}],"headline-sm":["18px",{"lineHeight":"26px","fontWeight":"600"}],"display-lg-mobile":["30px",{"lineHeight":"38px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-lg":["24px",{"lineHeight":"32px","letterSpacing":"-0.01em","fontWeight":"600"}],"display-lg":["40px",{"lineHeight":"48px","letterSpacing":"-0.02em","fontWeight":"700"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"headline-md":["20px",{"lineHeight":"28px","fontWeight":"600"}]}}}}</script></head><body class="bg-surface font-body-md text-on-surface"><aside class="fixed left-0 top-0 h-full w-[258px] bg-surface-container-lowest border-r border-outline-variant/40 z-50 flex flex-col justify-between py-5"><div class="flex flex-col"><div class="px-5 flex items-center gap-3 mb-6"><div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-on-primary text-[22px]">school</span></div><div class="flex flex-col min-w-0"><span class="font-label-lg text-label-lg text-primary-container font-bold truncate tracking-tight">One Private Course</span><span class="font-label-sm text-label-sm text-on-surface-variant font-medium truncate">Sistem Manajemen Bimbel</span></div></div><div class="px-5 mb-5"><button class="w-full h-10 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg rounded-lg flex items-center justify-center gap-2 transition-colors shadow-sm" type="button"><span class="material-symbols-outlined text-[18px]">add</span><span class="">Tambah Sesi Les</span></button></div><nav class="flex flex-col gap-1 px-3" data-active-classes="bg-surface-container-low text-primary-container font-semibold rounded-lg"><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="dashboard-ringkasan" href="{{ route('admin.dashboard') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">grid_view</span><span class="font-label-lg text-label-lg">Dashboard Ringkasan</span></div></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="jadwal-dan-sesi-les" href="{{ route('admin.jadwal') }}"><span class="material-symbols-outlined text-[20px]">calendar_month</span><span class="font-label-lg text-label-lg">Jadwal &amp; Sesi Les</span></a><a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="database-siswa" href="{{ route('admin.siswa') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">group</span><span class="font-label-lg text-label-lg">Database Siswa</span></div><span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">{{ $nav['students'] }}</span></a><a class="flex items-center justify-between px-3 py-2.5 rounded-lg bg-surface-container-low text-primary-container font-semibold transition-colors" data-path="tutor-dan-guru-pengajar" href="{{ route('admin.tutor') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px] text-primary-container">person_apron</span><span class="font-label-lg text-label-lg">Tutor &amp; Guru Pengajar</span></div><span class="w-2 h-2 rounded-full bg-primary-container shrink-0"></span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="presensi-dan-laporan" href="{{ route('admin.presensi') }}"><span class="material-symbols-outlined text-[20px]">assignment_turned_in</span><span class="font-label-lg text-label-lg">Presensi &amp; Laporan</span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="pembayaran" href="{{ route('admin.pembayaran') }}"><span class="material-symbols-outlined text-[20px]">payments</span><span class="font-label-lg text-label-lg">Pembayaran</span></a><div class="border-t border-outline-variant/30 my-2 mx-1"></div><a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="konfirmasi-sesi" href="{{ route('admin.konfirmasi') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">pending_actions</span><span class="font-label-lg text-label-lg">Konfirmasi Sesi</span></div><span class="px-2 py-0.5 rounded-full bg-error-container text-error font-label-sm text-label-sm font-semibold">{{ $nav['confirm'] }}</span></a></nav></div><div class="px-5 pt-3"><div class="p-3 bg-surface-container-low rounded-lg flex items-center gap-3"><span class="material-symbols-outlined text-primary-container text-[20px]">support_agent</span><div class="flex flex-col"><span class="font-label-sm text-label-sm font-semibold text-on-surface">Bantuan Cabang</span><span class="font-body-sm text-[11px] text-on-surface-variant">v2.4 LTS</span></div></div></div></aside><div class="pl-[258px]"><header class="fixed top-0 left-[258px] right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md border-b border-outline-variant/40 z-40 flex items-center justify-between px-8"><div class="flex items-center gap-2 font-label-lg text-label-lg"><span class="text-slate-500 font-medium text-xs">Operasional Cabang</span><span class="text-slate-300 text-xs">/</span><span class="text-slate-800 font-semibold text-xs">Tutor &amp; Guru Pengajar</span></div><div class="flex items-center gap-4"><div class="text-right flex flex-col"><span class="font-label-md text-label-md font-semibold text-on-surface">{{ auth()->user()->name }}</span><span class="font-body-sm text-[11px] text-on-surface-variant">Admin Cabang</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 bg-surface min-h-screen p-8"><div class="flex flex-col w-full">
<!-- Top Operational Breadcrumb & Title Bar -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6"><div class="flex flex-col gap-1"><div class="flex items-center gap-2 text-xs font-medium text-slate-500"><span class="">Operasional Cabang</span><span class="text-slate-300">/</span><span class="">Database Pengajar</span><span class="text-slate-300">/</span><span class="text-blue-600 font-semibold">Tutor &amp; Guru Pengajar</span></div><div class="flex items-center gap-3 mt-0.5"><h1 class="text-2xl font-bold tracking-tight text-slate-900">Tutor &amp; Guru Pengajar</h1><div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold shadow-xs"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span><span class="">28 Pendidik Terverifikasi</span></div></div><p class="text-xs text-slate-500 mt-0.5">Kelola basis data tutor, spesialisasi kurikulum, rasio beban mengajar, dan alokasi siswa bimbingan cabang.</p></div><div class="flex items-center flex-wrap gap-2.5 shrink-0"><button class="h-9 px-3.5 rounded-xl bg-white text-slate-700 border border-slate-200 hover:bg-slate-50 text-xs font-medium flex items-center gap-1.5 transition-colors shadow-sm" type="button"><span class="material-symbols-outlined text-[17px] text-slate-500">file_download</span><span class="">Export Data</span></button><button class="h-9 px-3.5 rounded-xl bg-white text-slate-700 border border-slate-200 hover:bg-slate-50 text-xs font-medium flex items-center gap-1.5 transition-colors shadow-sm" type="button"><span class="material-symbols-outlined text-[17px] text-slate-500">sync</span><span class="">Sinkronisasi Kalender</span></button><button class="h-9 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold flex items-center gap-1.5 transition-colors shadow-sm" onclick="openAddTutorModal()" type="button"><span class="material-symbols-outlined text-[18px]">add</span><span class="">Tambah Tutor</span></button></div></div>
<!-- Metric Overview Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6"><div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex flex-col justify-between transition-all hover:shadow-md hover:border-blue-300 group"><div class="flex items-center justify-between mb-3"><span class="text-sm font-semibold text-slate-800">Total Tutor Terdaftar</span><div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-105 transition-transform"><span class="material-symbols-outlined text-[20px]">groups</span></div></div><div><div class="flex items-baseline gap-2"><span class="text-2xl font-bold text-slate-900">28</span><span class="text-xs text-emerald-600 font-semibold">Tutor</span></div><div class="flex items-center gap-1.5 mt-1.5 text-xs text-slate-500"><span class="w-2 h-2 rounded-full bg-emerald-500"></span><span class=""><strong class="font-semibold text-slate-800">24 Aktif</strong> Mengajar bulan ini</span></div></div></div><div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex flex-col justify-between transition-all hover:shadow-md hover:border-emerald-300 group"><div class="flex items-center justify-between mb-3"><span class="text-sm font-semibold text-slate-800">Tutor Siap Ajar</span><div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-105 transition-transform"><span class="material-symbols-outlined text-[20px]">event_available</span></div></div><div><div class="flex items-baseline gap-2"><span class="text-2xl font-bold text-slate-900">14</span><span class="text-xs text-emerald-700 bg-emerald-50 border border-emerald-200 px-2 py-0.5 rounded-full font-semibold">Tersedia</span></div><p class="mt-1.5 text-xs text-slate-500">Memiliki minimal <span class="font-semibold text-slate-800">4+ slot aktif</span> / minggu</p></div></div><div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex flex-col justify-between transition-all hover:shadow-md hover:border-indigo-300 group"><div class="flex items-center justify-between mb-3"><span class="text-sm font-semibold text-slate-800">Rata-rata Beban Ajar</span><div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center group-hover:scale-105 transition-transform"><span class="material-symbols-outlined text-[20px]">speed</span></div></div><div><div class="flex items-baseline gap-2"><span class="text-2xl font-bold text-slate-900">72%</span><span class="text-xs text-emerald-700 font-semibold bg-emerald-50 border border-emerald-200 px-2 py-0.5 rounded-full">Ideal</span></div><div class="w-full bg-slate-100 rounded-full h-1.5 mt-2.5 overflow-hidden"><div class="bg-blue-600 h-1.5 rounded-full" style="width: 72%;"></div></div></div></div><div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex flex-col justify-between transition-all hover:shadow-md hover:border-blue-300 group"><div class="flex items-center justify-between mb-3"><span class="text-sm font-semibold text-slate-800">Total Siswa Terbina</span><div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-105 transition-transform"><span class="material-symbols-outlined text-[20px]">school</span></div></div><div><div class="flex items-baseline gap-2"><span class="text-2xl font-bold text-slate-900">74</span><span class="text-xs text-blue-600 font-semibold">Siswa</span></div><p class="mt-1.5 text-xs text-slate-500">Terdistribusi dalam <span class="font-semibold text-slate-800">118 sesi</span> / pekan</p></div></div></div>
<!-- Filter & Controls Toolbar -->
<div class="bg-white rounded-2xl p-3.5 shadow-sm border border-slate-200/80 mb-6 flex flex-col lg:flex-row items-center justify-between gap-3"><div class="flex items-center flex-1 w-full flex-wrap gap-2.5"><div class="relative flex-1 min-w-[240px]"><span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">search</span><input class="w-full h-9 pl-9 pr-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-800 text-xs placeholder:text-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20 transition-all" placeholder="Cari nama tutor, keahlian, atau NIK..." type="text"></div><div class="relative shrink-0"><select class="appearance-none h-9 pl-3 pr-8 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 text-xs font-medium cursor-pointer focus:outline-none hover:bg-slate-100/70 focus:ring-2 focus:ring-blue-500/20"><option value="">Semua Bidang Ajar</option><option value="tahsin">Mengaji &amp; Tahsin</option><option value="english">English Conversation</option><option value="matematika">Matematika &amp; Sains</option><option value="calistung">Calistung &amp; Tematik</option><option value="utbk">UTBK &amp; SMA</option></select><span class="material-symbols-outlined pointer-events-none absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] text-slate-400">expand_more</span></div><div class="relative shrink-0"><select class="appearance-none h-9 pl-3 pr-8 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 text-xs font-medium cursor-pointer focus:outline-none hover:bg-slate-100/70 focus:ring-2 focus:ring-blue-500/20"><option value="">Semua Ketersediaan</option><option value="tersedia">Tersedia (Banyak Slot)</option><option value="terbatas">Terbatas (Sisa &lt; 3 Slot)</option><option value="penuh">Jadwal Penuh</option></select><span class="material-symbols-outlined pointer-events-none absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] text-slate-400">expand_more</span></div><div class="relative shrink-0"><select class="appearance-none h-9 pl-3 pr-8 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 text-xs font-medium cursor-pointer focus:outline-none hover:bg-slate-100/70 focus:ring-2 focus:ring-blue-500/20"><option value="">Semua Metode &amp; Wilayah</option><option value="home-visit">Home Visit Saja</option><option value="online">Online Zoom Saja</option><option value="hybrid">Hybrid (Home &amp; Zoom)</option><option value="jaksel">Jakarta Selatan &amp; Depok</option></select><span class="material-symbols-outlined pointer-events-none absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] text-slate-400">expand_more</span></div></div><div class="flex items-center gap-1 p-1 bg-slate-100/80 border border-slate-200/80 rounded-xl shrink-0 self-end lg:self-auto"><button class="px-3 py-1.5 rounded-lg bg-white text-blue-600 shadow-xs text-xs font-semibold flex items-center gap-1.5 transition-all" type="button"><span class="material-symbols-outlined text-[17px]">grid_view</span><span class="">Grid</span></button><button class="px-3 py-1.5 rounded-lg hover:bg-white/60 text-slate-600 text-xs font-medium flex items-center gap-1.5 transition-all" type="button"><span class="material-symbols-outlined text-[17px]">format_list_bulleted</span><span class="">Tabel</span></button></div></div>
<!-- Tutor Cards Grid (3 Columns) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
@forelse($tutors as $t)

@if($t->availability === 'tersedia')
<div data-card data-avail="{{ $t->availability }}" data-methods="{{ $t->methods }}" class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 transition-all duration-200 hover:shadow-md hover:border-blue-400 flex flex-col justify-between relative group"><div class="absolute -top-px left-6 right-6 h-[3px] bg-blue-600 rounded-t-full"></div><div><div class="flex items-start justify-between gap-2.5 mb-3.5"><div class="flex items-center gap-3 min-w-0 flex-1"><div class="w-11 h-11 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm shrink-0 ring-2 ring-blue-100">{{ \App\Support\Fmt::initials($t->name) }}</div><div class="flex flex-col min-w-0 flex-1"><div class="flex items-center gap-1.5 min-w-0"><h3 class="text-sm font-semibold text-slate-800 truncate">{{ $t->name }}</h3><span class="material-symbols-outlined text-blue-600 text-[16px] shrink-0" style="font-variation-settings: 'FILL' 1;">verified</span></div><span class="text-xs text-slate-500 truncate">{{ $t->headline }}</span><div class="flex items-center gap-1 mt-0.5"><span class="material-symbols-outlined text-[14px] text-amber-500 shrink-0" style="font-variation-settings: 'FILL' 1;">star</span><span class="text-xs font-bold text-slate-800">{{ $t->rating }}</span><span class="text-xs text-slate-400">({{ $t->reviews }} ulasan)</span></div></div></div><div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold shrink-0 self-start"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span><span class="">{{ $t->badge }}</span></div></div><div class="flex flex-wrap gap-1.5 mb-3.5">
@if(count($t->subject_list) > 0)
<span class="px-2.5 py-0.5 rounded-lg bg-blue-50 text-blue-700 text-xs font-medium border border-blue-100">{{ $t->subject_list[0] }}</span>
@endif @if(count($t->subject_list) > 1)
<span class="px-2.5 py-0.5 rounded-lg bg-slate-50 text-slate-700 text-xs font-medium border border-slate-200/80">{{ $t->subject_list[1] }}</span>
@endif @if(count($t->subject_list) > 2)
<span class="px-2 py-0.5 rounded-lg bg-slate-50 text-slate-500 text-xs font-medium">+{{ count($t->subject_list) - 2 }} Lainnya</span>
@endif
</div><div class="p-3 bg-slate-50 rounded-xl mb-3.5 border border-slate-100"><div class="flex items-center justify-between text-xs mb-2"><div class="flex items-center gap-1.5 text-slate-700"><span class="material-symbols-outlined text-[16px] text-blue-600">person</span><span class=""><strong class="text-slate-900">{{ $t->students_count }}</strong> Siswa Aktif</span></div><span class="text-slate-300">|</span><div class="flex items-center gap-1.5 text-slate-700"><span class="material-symbols-outlined text-[16px] text-indigo-600">calendar_today</span><span class=""><strong class="text-slate-900">{{ $t->load }}</strong> Sesi / Minggu</span></div></div><div class="flex flex-col gap-1"><div class="flex items-center justify-between text-xs"><span class="text-slate-500">Beban Mengajar</span><span class="font-semibold text-blue-600">{{ $t->load_pct }}% ({{ $t->load }}/{{ $t->max_sessions }} Sesi Maks)</span></div><div class="w-full bg-slate-200 rounded-full h-1.5 overflow-hidden"><div class="bg-blue-600 h-1.5 rounded-full" style="width: {{ min(100, $t->load_pct) }}%;"></div></div></div></div><div class="flex items-center gap-2 text-slate-500 text-xs mb-4 min-w-0"><span class="material-symbols-outlined text-[16px] text-blue-600 shrink-0">location_on</span><span class="truncate">{{ $t->area }}</span></div></div><div class="flex items-center gap-2 pt-2 border-t border-slate-100"><button class="flex-1 h-8 rounded-xl bg-blue-50 hover:bg-blue-600 text-blue-700 hover:text-white text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors" data-tutor="{{ $t->id }}" onclick="openTutorDrawer()" type="button"><span class="">Lihat Detail Tutor</span><span class="material-symbols-outlined text-[15px]">arrow_forward</span></button><a class="w-8 h-8 rounded-xl bg-emerald-50 hover:bg-emerald-600 hover:text-white text-emerald-700 flex items-center justify-center transition-colors shrink-0 border border-emerald-200/60" href="{{ \App\Support\Fmt::waLink($t->phone) }}" target="_blank" title="Hubungi WhatsApp"><span class="material-symbols-outlined text-[16px]">chat</span></a></div></div>
@elseif($t->availability === 'terbatas')
<div data-card data-avail="{{ $t->availability }}" data-methods="{{ $t->methods }}" class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 transition-all duration-200 hover:shadow-md hover:border-amber-400 flex flex-col justify-between"><div><div class="flex items-start justify-between gap-2.5 mb-3.5"><div class="flex items-center gap-3 min-w-0 flex-1"><div class="w-11 h-11 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold text-sm shrink-0">{{ \App\Support\Fmt::initials($t->name) }}</div><div class="flex flex-col min-w-0 flex-1"><div class="flex items-center gap-1.5 min-w-0"><h3 class="text-sm font-semibold text-slate-800 truncate">{{ $t->name }}</h3><span class="material-symbols-outlined text-blue-600 text-[16px] shrink-0" style="font-variation-settings: 'FILL' 1;">verified</span></div><span class="text-xs text-slate-500 truncate">{{ $t->headline }}</span><div class="flex items-center gap-1 mt-0.5"><span class="material-symbols-outlined text-[14px] text-amber-500 shrink-0" style="font-variation-settings: 'FILL' 1;">star</span><span class="text-xs font-bold text-slate-800">{{ $t->rating }}</span><span class="text-xs text-slate-400">({{ $t->reviews }} ulasan)</span></div></div></div><div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-700 text-xs font-semibold shrink-0 self-start"><span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span><span class="">{{ $t->badge }}</span></div></div><div class="flex flex-wrap gap-1.5 mb-3.5">
@if(count($t->subject_list) > 0)
<span class="px-2.5 py-0.5 rounded-lg bg-slate-50 text-slate-700 text-xs font-medium border border-slate-200/80">{{ $t->subject_list[0] }}</span>
@endif @if(count($t->subject_list) > 1)
<span class="px-2.5 py-0.5 rounded-lg bg-slate-50 text-slate-700 text-xs font-medium border border-slate-200/80">{{ $t->subject_list[1] }}</span>
@endif @if(count($t->subject_list) > 2)
<span class="px-2.5 py-0.5 rounded-lg bg-slate-50 text-slate-700 text-xs font-medium border border-slate-200/80">+{{ count($t->subject_list) - 2 }} Lainnya</span>
@endif
</div><div class="p-3 bg-slate-50 rounded-xl mb-3.5 border border-slate-100"><div class="flex items-center justify-between text-xs mb-2"><div class="flex items-center gap-1.5 text-slate-700"><span class="material-symbols-outlined text-[16px] text-blue-600">person</span><span class=""><strong class="text-slate-900">{{ $t->students_count }}</strong> Siswa Aktif</span></div><span class="text-slate-300">|</span><div class="flex items-center gap-1.5 text-slate-700"><span class="material-symbols-outlined text-[16px] text-indigo-600">calendar_today</span><span class=""><strong class="text-slate-900">{{ $t->load }}</strong> Sesi / Minggu</span></div></div><div class="flex flex-col gap-1"><div class="flex items-center justify-between text-xs"><span class="text-slate-500">Beban Mengajar</span><span class="font-semibold text-amber-700">{{ $t->load_pct }}% ({{ $t->load }}/{{ $t->max_sessions }} Sesi Maks)</span></div><div class="w-full bg-slate-200 rounded-full h-1.5 overflow-hidden"><div class="bg-amber-500 h-1.5 rounded-full" style="width: {{ min(100, $t->load_pct) }}%;"></div></div></div></div><div class="flex items-center gap-2 text-slate-500 text-xs mb-4 min-w-0"><span class="material-symbols-outlined text-[16px] text-blue-600 shrink-0">location_on</span><span class="truncate">{{ $t->area }}</span></div></div><div class="flex items-center gap-2 pt-2 border-t border-slate-100"><button class="flex-1 h-8 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors" data-tutor="{{ $t->id }}" onclick="openTutorDrawer()" type="button"><span class="">Lihat Detail Tutor</span><span class="material-symbols-outlined text-[15px]">arrow_forward</span></button><button class="w-8 h-8 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-500 flex items-center justify-center transition-colors shrink-0" title="Opsi lainnya" type="button"><span class="material-symbols-outlined text-[17px]">more_horiz</span></button></div></div>
@else
<div data-card data-avail="{{ $t->availability }}" data-methods="{{ $t->methods }}" class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 transition-all duration-200 hover:shadow-md hover:border-rose-300 flex flex-col justify-between"><div><div class="flex items-start justify-between gap-2.5 mb-3.5"><div class="flex items-center gap-3 min-w-0 flex-1"><div class="w-11 h-11 rounded-full bg-teal-700 text-white flex items-center justify-center font-bold text-sm shrink-0">{{ \App\Support\Fmt::initials($t->name) }}</div><div class="flex flex-col min-w-0 flex-1"><div class="flex items-center gap-1.5 min-w-0"><h3 class="text-sm font-semibold text-slate-800 truncate">{{ $t->name }}</h3><span class="material-symbols-outlined text-blue-600 text-[16px] shrink-0" style="font-variation-settings: 'FILL' 1;">verified</span></div><span class="text-xs text-slate-500 truncate">{{ $t->headline }}</span><div class="flex items-center gap-1 mt-0.5"><span class="material-symbols-outlined text-[14px] text-amber-500 shrink-0" style="font-variation-settings: 'FILL' 1;">star</span><span class="text-xs font-bold text-slate-800">{{ $t->rating }}</span><span class="text-xs text-slate-400">({{ $t->reviews }} ulasan)</span></div></div></div><div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-slate-100 border border-slate-200 text-slate-600 text-xs font-semibold shrink-0 self-start"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span><span class="">{{ $t->badge }}</span></div></div><div class="flex flex-wrap gap-1.5 mb-3.5">
@if(count($t->subject_list) > 0)
<span class="px-2.5 py-0.5 rounded-lg bg-slate-50 text-slate-700 text-xs font-medium border border-slate-200/80">{{ $t->subject_list[0] }}</span>
@endif @if(count($t->subject_list) > 1)
<span class="px-2.5 py-0.5 rounded-lg bg-slate-50 text-slate-700 text-xs font-medium border border-slate-200/80">{{ $t->subject_list[1] }}</span>
@endif @if(count($t->subject_list) > 2)
<span class="px-2.5 py-0.5 rounded-lg bg-slate-50 text-slate-700 text-xs font-medium border border-slate-200/80">+{{ count($t->subject_list) - 2 }} Lainnya</span>
@endif
</div><div class="p-3 bg-slate-50 rounded-xl mb-3.5 border border-slate-100"><div class="flex items-center justify-between text-xs mb-2"><div class="flex items-center gap-1.5 text-slate-700"><span class="material-symbols-outlined text-[16px] text-blue-600">person</span><span class=""><strong class="text-slate-900">{{ $t->students_count }}</strong> Siswa Aktif</span></div><span class="text-slate-300">|</span><div class="flex items-center gap-1.5 text-slate-700"><span class="material-symbols-outlined text-[16px] text-indigo-600">calendar_today</span><span class=""><strong class="text-slate-900">{{ $t->load }}</strong> Sesi / Minggu</span></div></div><div class="flex flex-col gap-1"><div class="flex items-center justify-between text-xs"><span class="text-slate-500">Beban Mengajar</span><span class="font-semibold text-rose-600">{{ $t->load_pct }}% ({{ $t->load }}/{{ $t->max_sessions }} Sesi Maks)</span></div><div class="w-full bg-slate-200 rounded-full h-1.5 overflow-hidden"><div class="bg-rose-500 h-1.5 rounded-full" style="width: {{ min(100, $t->load_pct) }}%;"></div></div></div></div><div class="flex items-center gap-2 text-slate-500 text-xs mb-4 min-w-0"><span class="material-symbols-outlined text-[16px] text-blue-600 shrink-0">videocam</span><span class="truncate">{{ $t->area }}</span></div></div><div class="flex items-center gap-2 pt-2 border-t border-slate-100"><button class="flex-1 h-8 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors" data-tutor="{{ $t->id }}" onclick="openTutorDrawer()" type="button"><span class="">Lihat Detail Tutor</span><span class="material-symbols-outlined text-[15px]">arrow_forward</span></button><button class="w-8 h-8 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-500 flex items-center justify-center transition-colors shrink-0" title="Opsi lainnya" type="button"><span class="material-symbols-outlined text-[17px]">more_horiz</span></button></div></div>
@endif

@empty
<div class="col-span-3 text-center text-xs text-slate-400 py-10">Belum ada tutor.</div>
@endforelse
</div><!-- Pagination Bottom Bar -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-3 bg-white rounded-2xl p-3.5 shadow-sm border border-slate-200/80"><span class="text-xs text-slate-500">Menampilkan <strong class="text-slate-800 font-semibold">{{ $tutors->count() ? 1 : 0 }} - {{ $tutors->count() }}</strong> dari <strong class="text-slate-800 font-semibold">{{ $tutors->count() }}</strong> tutor aktif</span><div class="flex items-center gap-1"><button class="w-8 h-8 rounded-xl bg-slate-100 hover:bg-slate-200/70 text-slate-500 disabled:opacity-40 flex items-center justify-center transition-colors" disabled=""><span class="material-symbols-outlined text-[17px]">chevron_left</span></button><button class="w-8 h-8 rounded-xl bg-blue-600 text-white text-xs font-semibold flex items-center justify-center shadow-xs">1</button><button class="w-8 h-8 rounded-xl hover:bg-slate-100 text-slate-700 text-xs font-medium flex items-center justify-center transition-colors">2</button><button class="w-8 h-8 rounded-xl hover:bg-slate-100 text-slate-700 text-xs font-medium flex items-center justify-center transition-colors">3</button><button class="w-8 h-8 rounded-xl hover:bg-slate-100 text-slate-700 text-xs font-medium flex items-center justify-center transition-colors">4</button><button class="w-8 h-8 rounded-xl bg-slate-100 hover:bg-slate-200/70 text-slate-700 flex items-center justify-center transition-colors"><span class="material-symbols-outlined text-[17px]">chevron_right</span></button></div></div>
<!-- SLIDE-OVER DRAWER: Detail Tutor (Kak Rina M.Pd) -->
<div class="fixed inset-0 z-50 overflow-hidden pointer-events-none" id="tutorDetailDrawer">
<!-- Overlay Backdrop -->
<div class="absolute inset-0 bg-[#0F172A]/40 backdrop-blur-xs opacity-0 transition-opacity duration-300 pointer-events-none" id="drawerBackdrop" onclick="closeTutorDrawer()"></div>
<div class="absolute inset-y-0 right-0 max-w-full flex pl-10">
<div class="w-screen max-w-[520px] bg-surface-container-lowest shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out pointer-events-auto flex flex-col h-full overflow-hidden" id="drawerPanel">
<!-- Drawer Header -->
<div class="p-6 bg-surface-container-low/60 flex items-center justify-between border-b border-surface-container shrink-0">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-primary-container text-on-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">badge</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm font-bold text-on-surface">Detail Tutor &amp; Profil</h2>
<span class="font-body-sm text-[12px] text-on-surface-variant">ID Tutor: OP-TUT-2023-018</span>
</div>
</div>
<div class="flex items-center gap-2">
<button class="px-3 h-8 rounded-lg bg-surface-container hover:bg-surface-container-high text-primary font-label-sm text-label-sm font-semibold flex items-center gap-1.5 transition-colors" type="button">
<span class="material-symbols-outlined text-[15px]">edit</span>
<span class="">Ubah Data</span>
</button>
<button class="w-8 h-8 rounded-lg hover:bg-surface-container text-on-surface-variant flex items-center justify-center transition-colors" onclick="closeTutorDrawer()" type="button">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
</div>
<!-- Drawer Scrollable Content -->
<div class="flex-1 overflow-y-auto p-6 flex flex-col gap-6">
<!-- Identity Summary Box -->
<div class="p-5 rounded-xl bg-surface-container-low flex flex-col gap-4">
<div class="flex items-start gap-4">
<div class="w-16 h-16 rounded-full bg-primary-container text-on-primary font-bold text-headline-lg flex items-center justify-center ring-4 ring-primary/15 shrink-0 shadow-sm">
                RN
              </div>
<div class="flex flex-col min-w-0">
<div class="flex items-center gap-2">
<h3 class="font-headline-md text-headline-md font-bold text-on-surface truncate">Kak Rina M.Pd</h3>
<span class="material-symbols-outlined text-primary text-[18px]" style="font-variation-settings: 'FILL' 1;">verified</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant font-medium">Spesialis Tahsin &amp; Bahasa Arab Terpadu</span>
<span class="font-body-sm text-[12px] text-on-surface-variant mt-0.5">S1 Tarbiyah (UIN Syarif) &amp; S2 Pend. Islam (UI)</span>
<div class="inline-flex items-center gap-1.5 mt-2 self-start px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-semibold">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span class="">Status Aktif &amp; Siap Ajar</span>
</div>
</div>
</div>
<!-- Quick Contacts -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-2 pt-3 border-t border-surface-container">
<div class="flex items-center gap-2 text-on-surface font-body-sm text-body-sm truncate">
<span class="material-symbols-outlined text-secondary text-[18px]">call</span>
<span class="font-medium">+62 813-8899-7721</span>
</div>
<div class="flex items-center gap-2 text-on-surface font-body-sm text-body-sm truncate">
<span class="material-symbols-outlined text-primary text-[18px]">mail</span>
<span class="truncate">rina.tutor@oneprivate.com</span>
</div>
</div>
<a class="w-full h-10 rounded-lg bg-secondary hover:bg-secondary/90 text-on-secondary font-label-md text-label-md font-semibold flex items-center justify-center gap-2 transition-colors shadow-sm" href="https://wa.me/6281388997721" target="_blank">
<span class="material-symbols-outlined text-[18px]">chat</span>
<span class="">Hubungi Langsung via WhatsApp</span>
</a>
</div>
<!-- Kurikulum & Bidang Ajar Tags -->
<div>
<h4 class="font-label-lg text-label-lg font-bold text-on-surface mb-2.5 flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[18px]">auto_stories</span>
<span class="">Keahlian &amp; Bidang Pengajaran</span>
</h4>
<div class="flex flex-wrap gap-2">
<span class="px-3 py-1.5 rounded-lg bg-surface-container-high text-on-surface font-label-md text-label-md font-medium">Mengaji &amp; Tahsin Al-Qur'an</span>
<span class="px-3 py-1.5 rounded-lg bg-surface-container-high text-on-surface font-label-md text-label-md font-medium">Tajwid Mad Standar Jazari</span>
<span class="px-3 py-1.5 rounded-lg bg-surface-container-high text-on-surface font-label-md text-label-md font-medium">Bahasa Arab Dasar Anak</span>
<span class="px-3 py-1.5 rounded-lg bg-surface-container-high text-on-surface font-label-md text-label-md font-medium">Iqra Balita Cepat</span>
</div>
</div>
<!-- Ketersediaan Mingguan Visual Grid -->
<div>
<div class="flex items-center justify-between mb-2.5">
<h4 class="font-label-lg text-label-lg font-bold text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined text-tertiary text-[18px]">calendar_month</span>
<span class="">Matriks Ketersediaan Mingguan</span>
</h4>
<span class="font-label-sm text-label-sm text-primary font-semibold">12/20 Sesi Terisi</span>
</div>
<div class="p-3.5 bg-surface-container-low rounded-xl">
<div class="grid grid-cols-7 gap-1.5 text-center mb-2">
<div class="font-label-sm text-[11px] font-bold text-on-surface-variant">SEN</div>
<div class="font-label-sm text-[11px] font-bold text-on-surface-variant">SEL</div>
<div class="font-label-sm text-[11px] font-bold text-on-surface-variant">RAB</div>
<div class="font-label-sm text-[11px] font-bold text-on-surface-variant">KAM</div>
<div class="font-label-sm text-[11px] font-bold text-on-surface-variant">JUM</div>
<div class="font-label-sm text-[11px] font-bold text-on-surface-variant">SAB</div>
<div class="font-label-sm text-[11px] font-bold text-on-surface-variant">MIN</div>
</div>
<!-- Slots Grid Visual -->
<div class="grid grid-cols-7 gap-1.5 text-center">
<!-- Senin -->
<div class="flex flex-col gap-1">
<div class="h-6 rounded bg-surface-container flex items-center justify-center text-[10px] text-on-surface-variant font-medium">Pagi</div>
<div class="h-8 rounded bg-surface-container-high flex items-center justify-center text-[11px] font-semibold text-on-surface-variant">Libur</div>
<div class="h-6 rounded bg-surface-container flex items-center justify-center text-[10px] text-on-surface-variant font-medium">Mlm</div>
</div>
<!-- Selasa (Booked 16:00) -->
<div class="flex flex-col gap-1">
<div class="h-6 rounded bg-surface-container-lowest text-secondary font-semibold text-[10px] flex items-center justify-center">Ada</div>
<div class="h-8 rounded bg-primary-container text-on-primary font-semibold text-[10px] flex items-center justify-center shadow-xs" title="16:00 Sesi Aisyah">16:00</div>
<div class="h-6 rounded bg-surface-container-lowest text-secondary font-semibold text-[10px] flex items-center justify-center">Ada</div>
</div>
<!-- Rabu (Booked 19:00) -->
<div class="flex flex-col gap-1">
<div class="h-6 rounded bg-surface-container flex items-center justify-center text-[10px] text-on-surface-variant">-</div>
<div class="h-8 rounded bg-surface-container-lowest text-secondary font-semibold text-[10px] flex items-center justify-center">Ada</div>
<div class="h-6 rounded bg-primary-container text-on-primary font-semibold text-[10px] flex items-center justify-center shadow-xs" title="19:00 Sesi Farhan">19:00</div>
</div>
<!-- Kamis (Booked 16:00) -->
<div class="flex flex-col gap-1">
<div class="h-6 rounded bg-surface-container-lowest text-secondary font-semibold text-[10px] flex items-center justify-center">Ada</div>
<div class="h-8 rounded bg-primary-container text-on-primary font-semibold text-[10px] flex items-center justify-center shadow-xs" title="16:00 Sesi Aisyah">16:00</div>
<div class="h-6 rounded bg-surface-container flex items-center justify-center text-[10px] text-on-surface-variant">-</div>
</div>
<!-- Jumat -->
<div class="flex flex-col gap-1">
<div class="h-6 rounded bg-surface-container-high flex items-center justify-center text-[11px] font-semibold text-on-surface-variant">Off</div>
<div class="h-8 rounded bg-surface-container flex items-center justify-center text-[10px] text-on-surface-variant">-</div>
<div class="h-6 rounded bg-surface-container-lowest text-secondary font-semibold text-[10px] flex items-center justify-center">Ada</div>
</div>
<!-- Sabtu (Booked 09:00) -->
<div class="flex flex-col gap-1">
<div class="h-6 rounded bg-primary-container text-on-primary font-semibold text-[10px] flex items-center justify-center shadow-xs" title="09:00 Sesi Naura">09:00</div>
<div class="h-8 rounded bg-surface-container-lowest text-secondary font-semibold text-[10px] flex items-center justify-center">Ada</div>
<div class="h-6 rounded bg-surface-container flex items-center justify-center text-[10px] text-on-surface-variant">-</div>
</div>
<!-- Minggu -->
<div class="flex flex-col gap-1">
<div class="h-6 rounded bg-surface-container-lowest text-secondary font-semibold text-[10px] flex items-center justify-center">Ada</div>
<div class="h-8 rounded bg-surface-container flex items-center justify-center text-[10px] text-on-surface-variant">-</div>
<div class="h-6 rounded bg-surface-container-high flex items-center justify-center text-[11px] font-semibold text-on-surface-variant">Off</div>
</div>
</div>
<div class="flex items-center justify-center gap-4 mt-3 pt-2 border-t border-surface-container font-label-sm text-[11px]">
<div class="flex items-center gap-1.5 text-on-surface-variant">
<span class="w-2.5 h-2.5 rounded bg-primary-container"></span>
<span class="">Sesi Terjadwal</span>
</div>
<div class="flex items-center gap-1.5 text-on-surface-variant">
<span class="w-2.5 h-2.5 rounded bg-surface-container-lowest border border-outline-variant/50"></span>
<span class="">Slot Tersedia</span>
</div>
<div class="flex items-center gap-1.5 text-on-surface-variant">
<span class="w-2.5 h-2.5 rounded bg-surface-container-high"></span>
<span class="">Libur / Off</span>
</div>
</div>
</div>
</div>
<!-- Jadwal Mengajar Minggu Ini -->
<div>
<h4 class="font-label-lg text-label-lg font-bold text-on-surface mb-2.5 flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[18px]">schedule</span>
<span class="">Jadwal Mengajar Pekan Ini</span>
</h4>
<div class="space-y-2">
<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="w-1.5 h-10 rounded-full bg-primary shrink-0"></span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Selasa, 16:00 - 17:30 WIB</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Aisyah Putri • Mengaji &amp; Tahsin</span>
</div>
</div>
<span class="px-2 py-0.5 rounded text-label-sm font-semibold bg-surface-container-lowest text-primary">Home Visit (Tebet)</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="w-1.5 h-10 rounded-full bg-primary shrink-0"></span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Kamis, 16:00 - 17:30 WIB</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Aisyah Putri • Tahsin Lanjutan</span>
</div>
</div>
<span class="px-2 py-0.5 rounded text-label-sm font-semibold bg-surface-container-lowest text-primary">Home Visit (Tebet)</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="w-1.5 h-10 rounded-full bg-tertiary shrink-0"></span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Rabu, 19:00 - 20:30 WIB</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Farhan Nugraha • Tahfidz Juz 29</span>
</div>
</div>
<span class="px-2 py-0.5 rounded text-label-sm font-semibold bg-surface-container-lowest text-tertiary">Online Zoom</span>
</div>
<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="w-1.5 h-10 rounded-full bg-secondary shrink-0"></span>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Sabtu, 09:00 - 10:30 WIB</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Naura Shafa • Iqra Ceria Balita</span>
</div>
</div>
<span class="px-2 py-0.5 rounded text-label-sm font-semibold bg-surface-container-lowest text-secondary">Home Visit</span>
</div>
</div>
</div>
<!-- Daftar Siswa yang Ditangani -->
<div>
<h4 class="font-label-lg text-label-lg font-bold text-on-surface mb-2.5 flex items-center justify-between">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[18px]">group</span>
<span class="">Siswa Aktif Bimbingan (5 Siswa)</span>
</span>
<a class="font-label-sm text-label-sm text-primary hover:underline" href="#">Kelola Siswa</a>
</h4>
<div class="space-y-2">
<div class="p-3 bg-surface-container-lowest rounded-xl shadow-xs flex items-center justify-between" style="box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);">
<div class="flex items-center gap-3 min-w-0">
<div class="w-8 h-8 rounded-full bg-primary-container/10 text-primary flex items-center justify-center font-bold text-[12px] shrink-0">
                    AP
                  </div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">Aisyah Putri</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">Kelas 8 SMP • Mengaji &amp; Tahsin</span>
</div>
</div>
<span class="px-2.5 py-1 rounded-full bg-surface-container-low text-on-surface font-label-sm text-label-sm font-semibold shrink-0">8 Sesi/Bln</span>
</div>
<div class="p-3 bg-surface-container-lowest rounded-xl shadow-xs flex items-center justify-between" style="box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);">
<div class="flex items-center gap-3 min-w-0">
<div class="w-8 h-8 rounded-full bg-tertiary-container/15 text-tertiary flex items-center justify-center font-bold text-[12px] shrink-0">
                    FN
                  </div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">Farhan Nugraha</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">Kelas 12 SMA • Tahfidz Juz 29</span>
</div>
</div>
<span class="px-2.5 py-1 rounded-full bg-surface-container-low text-on-surface font-label-sm text-label-sm font-semibold shrink-0">4 Sesi/Bln</span>
</div>
<div class="p-3 bg-surface-container-lowest rounded-xl shadow-xs flex items-center justify-between" style="box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);">
<div class="flex items-center gap-3 min-w-0">
<div class="w-8 h-8 rounded-full bg-secondary-container/30 text-secondary flex items-center justify-center font-bold text-[12px] shrink-0">
                    NS
                  </div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">Naura Shafa</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">TK B • Iqra Ceria Balita</span>
</div>
</div>
<span class="px-2.5 py-1 rounded-full bg-surface-container-low text-on-surface font-label-sm text-label-sm font-semibold shrink-0">8 Sesi/Bln</span>
</div>
<div class="p-3 bg-surface-container-lowest rounded-xl shadow-xs flex items-center justify-between" style="box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);">
<div class="flex items-center gap-3 min-w-0">
<div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface font-bold text-[12px] shrink-0">
                    MZ
                  </div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-semibold text-on-surface truncate">M. Zayyan</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">Kelas 5 SD • Tahsin Dasar</span>
</div>
</div>
<span class="px-2.5 py-1 rounded-full bg-surface-container-low text-on-surface font-label-sm text-label-sm font-semibold shrink-0">4 Sesi/Bln</span>
</div>
</div>
</div>
</div>
<!-- Drawer Footer Buttons -->
<div class="p-4 bg-surface-container-low/60 border-t border-surface-container flex items-center gap-3 shrink-0"><button class="h-10 px-4 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-lg text-label-lg font-semibold transition-colors" onclick="closeTutorDrawer()" type="button">
  Tutup
</button>
<button class="flex-1 h-10 rounded-lg bg-surface-container-lowest border border-outline-variant/40 hover:bg-surface-container-low text-primary font-label-lg text-label-lg font-semibold flex items-center justify-center gap-1.5 transition-colors shadow-xs" type="button">
<span class="material-symbols-outlined text-[18px]">tune</span>
<span class="">Atur Ketersediaan</span>
</button>
<button class="flex-1 h-10 rounded-lg bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg font-semibold flex items-center justify-center gap-2 transition-colors shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px]">calendar_add_on</span>
<span class="">Plot Sesi Baru</span>
</button></div>
</div>
</div>
</div>
<!-- MODAL: Tambah Tutor Baru -->
<div class="fixed inset-0 z-50 overflow-y-auto pointer-events-none opacity-0 transition-opacity duration-200 flex items-center justify-center p-4" id="addTutorModal">
<!-- Modal Backdrop -->
<div class="fixed inset-0 bg-[#0F172A]/40 backdrop-blur-xs transition-opacity duration-200" id="modalBackdrop" onclick="closeAddTutorModal()"></div>
<!-- Modal Card Surface -->
<div class="relative bg-surface-container-lowest rounded-2xl max-w-2xl w-full shadow-2xl p-6 md:p-8 z-10 my-8 transition-transform duration-200 scale-95" id="modalContent">
<div class="flex items-center justify-between pb-4 border-b border-surface-container mb-6">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-primary-container text-on-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">person_add</span>
</div>
<div>
<h3 class="font-headline-md text-headline-md font-bold text-on-surface">Tambah Tutor / Guru Pengajar</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Lengkapi data profil dan ketersediaan mengajar tutor baru</p>
</div>
</div>
<button class="w-8 h-8 rounded-lg hover:bg-surface-container text-on-surface-variant flex items-center justify-center transition-colors" onclick="closeAddTutorModal()" type="button">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
<!-- Form Inputs -->
<form class="space-y-4" onsubmit="handleTutorSubmit(event)">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<!-- Nama Lengkap & Gelar -->
<div class="space-y-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Nama Lengkap &amp; Gelar *</label>
<input class="w-full h-10 px-3.5 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest border-0" placeholder="Contoh: Ust. Ahmad Fauzi M.Pd" required="" type="text">
</div>
<!-- NIK / No. Pegawai -->
<div class="space-y-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">NIK / ID Tutor</label>
<input class="w-full h-10 px-3.5 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest border-0" placeholder="OP-TUT-2024-..." type="text">
</div>
<!-- WhatsApp -->
<div class="space-y-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Nomor WhatsApp Aktif *</label>
<div class="relative">
<span class="absolute left-3.5 top-1/2 -translate-y-1/2 font-label-md text-label-md font-medium text-on-surface-variant">+62</span>
<input class="w-full h-10 pl-12 pr-3.5 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest border-0" placeholder="812-3456-7890" required="" type="tel">
</div>
</div>
<!-- Email -->
<div class="space-y-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Email Tutor *</label>
<input class="w-full h-10 px-3.5 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest border-0" placeholder="tutor@oneprivate.com" required="" type="email">
</div>
</div>
<!-- Spesialisasi Bidang Ajar (Checkable Tags) -->
<div class="space-y-2 pt-1">
<label class="font-label-md text-label-md font-semibold text-on-surface">Bidang Ajar Utama (Pilih minimal 1)</label>
<div class="flex flex-wrap gap-2">
<label class="cursor-pointer select-none">
<input checked="" class="hidden peer" type="checkbox">
<span class="inline-block px-3 py-1.5 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md font-medium peer-checked:bg-primary-container peer-checked:text-on-primary transition-colors">Mengaji &amp; Tahsin</span>
</label>
<label class="cursor-pointer select-none">
<input class="hidden peer" type="checkbox">
<span class="inline-block px-3 py-1.5 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md font-medium peer-checked:bg-primary-container peer-checked:text-on-primary transition-colors">English Conversation</span>
</label>
<label class="cursor-pointer select-none">
<input class="hidden peer" type="checkbox">
<span class="inline-block px-3 py-1.5 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md font-medium peer-checked:bg-primary-container peer-checked:text-on-primary transition-colors">Matematika &amp; Sains</span>
</label>
<label class="cursor-pointer select-none">
<input class="hidden peer" type="checkbox">
<span class="inline-block px-3 py-1.5 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md font-medium peer-checked:bg-primary-container peer-checked:text-on-primary transition-colors">Calistung Balita</span>
</label>
<label class="cursor-pointer select-none">
<input class="hidden peer" type="checkbox">
<span class="inline-block px-3 py-1.5 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md font-medium peer-checked:bg-primary-container peer-checked:text-on-primary transition-colors">UTBK &amp; SMA Intensif</span>
</label>
</div>
</div>
<!-- Hari Ketersediaan -->
<div class="space-y-2 pt-1">
<label class="font-label-md text-label-md font-semibold text-on-surface">Ketersediaan Hari Mengajar</label>
<div class="grid grid-cols-7 gap-1.5 text-center">
<label class="cursor-pointer">
<input checked="" class="hidden peer" type="checkbox">
<span class="block py-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm text-label-sm font-semibold peer-checked:bg-secondary-container peer-checked:text-on-secondary-container transition-colors">Sen</span>
</label>
<label class="cursor-pointer">
<input checked="" class="hidden peer" type="checkbox">
<span class="block py-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm text-label-sm font-semibold peer-checked:bg-secondary-container peer-checked:text-on-secondary-container transition-colors">Sel</span>
</label>
<label class="cursor-pointer">
<input checked="" class="hidden peer" type="checkbox">
<span class="block py-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm text-label-sm font-semibold peer-checked:bg-secondary-container peer-checked:text-on-secondary-container transition-colors">Rab</span>
</label>
<label class="cursor-pointer">
<input checked="" class="hidden peer" type="checkbox">
<span class="block py-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm text-label-sm font-semibold peer-checked:bg-secondary-container peer-checked:text-on-secondary-container transition-colors">Kam</span>
</label>
<label class="cursor-pointer">
<input class="hidden peer" type="checkbox">
<span class="block py-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm text-label-sm font-semibold peer-checked:bg-secondary-container peer-checked:text-on-secondary-container transition-colors">Jum</span>
</label>
<label class="cursor-pointer">
<input checked="" class="hidden peer" type="checkbox">
<span class="block py-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm text-label-sm font-semibold peer-checked:bg-secondary-container peer-checked:text-on-secondary-container transition-colors">Sab</span>
</label>
<label class="cursor-pointer">
<input class="hidden peer" type="checkbox">
<span class="block py-2 rounded-lg bg-surface-container-low text-on-surface font-label-sm text-label-sm font-semibold peer-checked:bg-secondary-container peer-checked:text-on-secondary-container transition-colors">Min</span>
</label>
</div>
</div>
<!-- Metode & Maksimal Sesi -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1">
<div class="space-y-1.5">
<label class="font-label-md text-label-md font-semibold text-on-surface">Metode &amp; Wilayah Mengajar</label>
<div class="flex flex-col gap-2 pt-1">
<label class="flex items-center gap-2 cursor-pointer font-body-sm text-body-sm text-on-surface">
<input checked="" class="rounded border-outline-variant text-primary focus:ring-primary/20 w-4 h-4" type="checkbox">
<span class="">Home Visit (Jakarta Selatan &amp; Depok)</span>
</label>
<label class="flex items-center gap-2 cursor-pointer font-body-sm text-body-sm text-on-surface">
<input checked="" class="rounded border-outline-variant text-primary focus:ring-primary/20 w-4 h-4" type="checkbox">
<span class="">Online Class (Zoom Meetings)</span>
</label>
</div>
</div>
<div class="space-y-1.5">
<div class="flex items-center justify-between">
<label class="font-label-md text-label-md font-semibold text-on-surface">Batas Maks Sesi / Minggu</label>
<span class="font-label-md text-label-md font-bold text-primary" id="sessionVal">20 Sesi</span>
</div>
<input class="w-full accent-primary cursor-pointer mt-2" max="30" min="4" oninput="document.getElementById('sessionVal').innerText = this.value + ' Sesi'" step="2" type="range" value="20">
<p class="font-body-sm text-[12px] text-on-surface-variant">Rekomendasi bimbel: 16 - 20 sesi per tutor untuk kualitas optimal.</p>
</div>
</div>
<!-- Form Actions -->
<div class="flex items-center justify-end gap-3 pt-6 border-t border-surface-container">
<button class="h-10 px-5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-lg text-label-lg font-semibold transition-colors" onclick="closeAddTutorModal()" type="button">
            Batal
          </button>
<button class="h-10 px-6 rounded-lg bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg font-semibold flex items-center gap-2 transition-colors shadow-sm" type="submit">
<span class="material-symbols-outlined text-[18px]">check</span>
<span class="">Simpan Data Tutor</span>
</button>
</div>
</form>
</div>
</div>
<script>
    function openTutorDrawer() {
      const drawer = document.getElementById('tutorDetailDrawer');
      const backdrop = document.getElementById('drawerBackdrop');
      const panel = document.getElementById('drawerPanel');
      
      drawer.classList.remove('pointer-events-none');
      backdrop.classList.remove('pointer-events-none', 'opacity-0');
      backdrop.classList.add('opacity-100');
      panel.classList.remove('translate-x-full');
      panel.classList.add('translate-x-0');
    }

    function closeTutorDrawer() {
      const drawer = document.getElementById('tutorDetailDrawer');
      const backdrop = document.getElementById('drawerBackdrop');
      const panel = document.getElementById('drawerPanel');
      
      backdrop.classList.remove('opacity-100');
      backdrop.classList.add('opacity-0');
      panel.classList.remove('translate-x-0');
      panel.classList.add('translate-x-full');
      
      setTimeout(() => {
        drawer.classList.add('pointer-events-none');
        backdrop.classList.add('pointer-events-none');
      }, 300);
    }

    function openAddTutorModal() {
      const modal = document.getElementById('addTutorModal');
      const content = document.getElementById('modalContent');
      
      modal.classList.remove('pointer-events-none', 'opacity-0');
      modal.classList.add('opacity-100');
      content.classList.remove('scale-95');
      content.classList.add('scale-100');
    }

    function closeAddTutorModal() {
      const modal = document.getElementById('addTutorModal');
      const content = document.getElementById('modalContent');
      
      content.classList.remove('scale-100');
      content.classList.add('scale-95');
      modal.classList.remove('opacity-100');
      modal.classList.add('opacity-0');
      
      setTimeout(() => {
        modal.classList.add('pointer-events-none');
      }, 200);
    }

    function handleTutorSubmit(e) {
      e.preventDefault();
      closeAddTutorModal();
      alert('Data Tutor Baru Berhasil Disimpan ke Sistem Lentera Edukasi.');
    }
  </script>
</div></main></div>



<script src="{{ asset('js/opc.js') }}"></script><script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});
const URL_SHOW = {!! json_encode(url('/admin/tutor')) !!};
const openOrig = window.openTutorDrawer;
const D = () => document.getElementById('drawerPanel');
let curTutor = null;
function setText(el, v) { if (el) el.textContent = v; }
window.openTutorDrawer = async function () {
  const btn = document.activeElement && document.activeElement.closest ? document.activeElement.closest('[data-tutor]') : null;
  const id = (window._lastTutor) || (btn && btn.dataset.tutor);
  if (id) { try { const r = await fetch(URL_SHOW + '/' + id, {headers: {'Accept': 'application/json'}}); fillDrawer(await r.json()); } catch (e) {} }
  openOrig();
};
document.addEventListener('click', e => { const b = e.target.closest('[data-tutor]'); if (b) window._lastTutor = b.dataset.tutor; }, true);
function fillDrawer(t) {
  curTutor = t; const P = D();
  setText(P.querySelector('h3'), t.name);
  const ini = [...P.querySelectorAll('div')].find(d => d.children.length === 0 && /^[A-Z]{2}$/.test(d.textContent.trim())); setText(ini, t.initials);
  const idl = OPC.leaf('ID Tutor: #TUT-2024-0012', P) || [...P.querySelectorAll('span')].find(s => s.textContent.startsWith('ID Tutor')); setText(idl, 'ID Tutor: #' + t.code);
  setText([...P.querySelectorAll('span')].find(s => s.textContent.startsWith('Spesialis Mengaji') || s.textContent === t.prevHeadline), t.headline);
  const spans = [...P.querySelectorAll('span')];
  const ratingEl = spans.find(s => /^\d\.\d$/.test(s.textContent.trim())); setText(ratingEl, t.rating);
  setText(spans.find(s => /ulasan wali siswa/.test(s.textContent)), '(' + t.reviews + ' ulasan wali siswa)');
  setText(spans.find(s => /Tersedia \(Slot|Terbatas|Penuh/.test(s.textContent)), ({tersedia: '🟢 Tersedia', terbatas: '🟠 Slot Terbatas', penuh: '🔴 Jadwal Penuh'})[t.availability]);
  const wa = P.querySelector('a[href^="https://wa.me"]'); if (wa) wa.href = t.wa;
  setText(spans.find(s => /^\+62 /.test(s.textContent.trim())), t.phone_fmt);
  setText(spans.find(s => /@/.test(s.textContent)), t.email);
  const chipBox = [...P.querySelectorAll('div')].find(d => d.children.length && [...d.children].every(c => c.tagName === 'SPAN') && d.children.length >= 3 && /Tahsin|Tajwid|Sertifikasi/.test(d.textContent));
  if (chipBox && chipBox.children.length) { const proto = chipBox.children[0]; chipBox.innerHTML = ''; (t.subjects.length ? t.subjects : ['-']).forEach(s => { const n = proto.cloneNode(true); n.textContent = s; chipBox.appendChild(n); }); }
  setText(spans.find(s => /^Home Visit \(/.test(s.textContent.trim()) || /Online Zoom/.test(s.textContent) && s.children.length === 0 && s.parentElement.textContent.includes('Area Jangkauan')), t.area);
  setText(spans.find(s => /Sesi$/.test(s.textContent.trim()) && /\d+\/\d+/.test(s.textContent)), t.load + '/' + t.max_sessions + ' Sesi');
  // agenda
  const ag = [...P.querySelectorAll('h4')].find(h => /Agenda Sesi/.test(h.textContent)); if (ag) { const sec = ag.closest('div').parentElement; const list = sec.children[1]; const proto = list && list.children[1] || (list && list.children[0]);
    setText(ag.parentElement.querySelector(':scope > span:last-child'), t.agenda.length + ' Sesi Terdekat');
    if (list && proto) { const pc = proto.cloneNode(true); list.innerHTML = '';
      if (!t.agenda.length) { list.innerHTML = '<div class="text-xs text-slate-400 p-2">Belum ada sesi pekan ini.</div>'; }
      t.agenda.forEach(a => { const n = pc.cloneNode(true); const ss = [...n.querySelectorAll('span')].filter(x => x.children.length === 0 && x.textContent.trim() && !x.classList.contains('material-symbols-outlined'));
        if (ss[0]) ss[0].textContent = a.when; const nm = ss.find(x => x.textContent.includes('•')); if (nm) nm.textContent = a.who; const mt = ss[ss.length - 1]; if (mt && mt !== nm) mt.textContent = a.method; list.appendChild(n); }); } }
  // siswa
  const sh = [...P.querySelectorAll('h4')].find(h => /Daftar Siswa Aktif/.test(h.textContent)); if (sh) { const sec = sh.closest('div').parentElement; const list = sec.children[1]; const proto = list.children[0].cloneNode(true); list.innerHTML = '';
    setText(sh.querySelector('span:last-child'), 'Daftar Siswa Aktif Diampu (' + t.students.length + ' Siswa)');
    if (!t.students.length) list.innerHTML = '<div class="text-xs text-slate-400 p-2">Belum ada siswa.</div>';
    t.students.forEach(s => { const n = proto.cloneNode(true); const lv = [...n.querySelectorAll('*')].filter(x => x.children.length === 0 && x.textContent.trim());
      lv[0].textContent = s.initials; lv[1].textContent = s.name; lv[2].textContent = s.info; if (lv[3]) lv[3].textContent = s.freq; list.appendChild(n); }); }
}
// tambah tutor
OPC.on('+ Tambah Tutor', () => openAddTutorModal(), {exact: false});
OPC.on('Tambah Tutor', () => openAddTutorModal(), {exact: false});
window.handleTutorSubmit = async function (e) {
  e.preventDefault(); const f = e.target; const ins = f.querySelectorAll('input[type=text],input[type=tel],input[type=email]');
  const checked = [...f.querySelectorAll('input[type=checkbox]:checked')].map(c => c.nextElementSibling ? c.nextElementSibling.textContent.trim() : '');
  const subj = checked.filter(x => !['Sen','Sel','Rab','Kam','Jum','Sab','Min'].includes(x) && !/Home Visit|Online Class/.test(x));
  const methods = []; if (checked.some(x => /Home Visit/.test(x))) methods.push('home_visit'); if (checked.some(x => /Online/.test(x))) methods.push('online');
  const area = checked.filter(x => /Home Visit|Online Class/.test(x)).join(' & ');
  try {
    const j = await OPC.post({!! json_encode(route('admin.tutor.simpan')) !!}, {name: ins[0].value, code: ins[1].value, phone: '0' + ins[2].value.replace(/\D/g, '').replace(/^0+/, ''), email: ins[3].value, subjects: subj.join(','), methods: methods.join(',') || 'home_visit', area: area, max_sessions: f.querySelector('input[type=range]').value});
    closeAddTutorModal(); OPC.done(j, 'reload');
  } catch (err) {}
};
// tombol drawer
OPC.on('Atur Jadwal', () => OPC.go({!! json_encode(route('admin.jadwal.baru')) !!} + (curTutor ? '?tutor=' + curTutor.id : '')), {exact: false});
function editTutor(t) {
  OPC.dialog({title: 'Ubah Data & Ketersediaan', fields: [
    {name: 'name', label: 'Nama', value: t.name}, {name: 'headline', label: 'Spesialisasi', value: t.headline}, {name: 'phone', label: 'No. WhatsApp', value: t.phone},
    {name: 'email', label: 'Email', value: t.email}, {name: 'subjects', label: 'Bidang ajar (pisah koma)', value: t.subjects.join(', ')}, {name: 'area', label: 'Area / wilayah', value: t.area},
    {name: 'max_sessions', label: 'Batas sesi / minggu', type: 'number', value: t.max_sessions}], submit: 'Simpan',
    onSubmit: async v => { const j = await OPC.put(URL_SHOW + '/' + t.id, v); OPC.done(j, 'reload'); }});
}
OPC.on('Ubah Data & Ketersediaan', () => curTutor && editTutor(curTutor), {exact: false});
OPC.on('Ubah Data', () => curTutor && editTutor(curTutor), {exact: true});
OPC.on('Kelola Alokasi', () => OPC.go({!! json_encode(route('admin.siswa')) !!}), {sel: 'a'});
document.querySelectorAll('button[title="Opsi lainnya"]').forEach(b => b.addEventListener('click', e => { e.stopPropagation(); const card = b.closest('[data-card]'); const id = card.querySelector('[data-tutor]').dataset.tutor;
  if (confirm('Nonaktifkan / hapus tutor ini?')) OPC.del(URL_SHOW + '/' + id).then(j => OPC.done(j, 'reload')).catch(() => {}); }));
// filter
(function () {
  const cards = [...document.querySelectorAll('[data-card]')]; const q = document.querySelector('input[placeholder^="Cari nama tutor"]'); const sels = [...document.querySelectorAll('select')];
  const run = () => { const v = q.value.toLowerCase(); const bid = (sels[0] || {}).value, av = (sels[1] || {}).value, me = (sels[2] || {}).value;
    const kw = {tahsin: 'tahsin', english: 'english', matematika: 'matematika', calistung: 'calistung', utbk: 'utbk'};
    cards.forEach(c => { let ok = !v || c.textContent.toLowerCase().includes(v);
      if (bid) ok = ok && c.textContent.toLowerCase().includes(kw[bid] || bid);
      if (av) ok = ok && c.dataset.avail === av;
      if (me === 'home-visit') ok = ok && c.dataset.methods.includes('home_visit') && !c.dataset.methods.includes('online');
      if (me === 'online') ok = ok && c.dataset.methods.includes('online') && !c.dataset.methods.includes('home_visit');
      if (me === 'hybrid') ok = ok && c.dataset.methods.includes('home_visit') && c.dataset.methods.includes('online');
      if (me === 'jaksel') ok = ok && /jak|depok|tebet/i.test(c.textContent);
      c.style.display = ok ? '' : 'none'; }); };
  q.addEventListener('input', run); sels.forEach(s => s.addEventListener('change', run));
})();
OPC.on('Tabel', () => OPC.toast('Tampilan tabel menyusul — saat ini mode Grid.', true), {sel: 'button'});
OPC.on('Grid', () => {}, {sel: 'button'});
</script></body></html>