<!DOCTYPE html><html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}"><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta content="web_dashboard" name="shell-type"><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"><style>@@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script><script id="tailwind-config">tailwind.config={"darkMode":"class","theme":{"extend":{"colors":{"on-tertiary-container":"#f1eeff","surface-dim":"#d2d9f4","secondary-fixed-dim":"#6bd8cb","on-primary":"#ffffff","background":"#faf8ff","surface-container-high":"#e2e7ff","tertiary":"#3e3fcc","primary":"#004ac6","on-surface":"#131b2e","inverse-primary":"#b4c5ff","primary-fixed":"#dbe1ff","surface-container-highest":"#dae2fd","surface-container-low":"#f2f3ff","error":"#ba1a1a","on-error-container":"#93000a","on-primary-container":"#eeefff","surface-container-lowest":"#ffffff","surface":"#faf8ff","secondary-fixed":"#89f5e7","outline-variant":"#c3c6d7","surface-tint":"#0053db","surface-container":"#eaedff","primary-container":"#2563eb","on-surface-variant":"#434655","outline":"#737686","surface-bright":"#faf8ff","tertiary-container":"#585be6","on-secondary":"#ffffff","on-tertiary-fixed-variant":"#2f2ebe","inverse-surface":"#283044","secondary-container":"#86f2e4","error-container":"#ffdad6","on-secondary-fixed-variant":"#005049","surface-variant":"#dae2fd","on-secondary-container":"#006f66","on-primary-fixed":"#00174b","tertiary-fixed":"#e1e0ff","secondary":"#006a61","inverse-on-surface":"#eef0ff","on-background":"#131b2e","tertiary-fixed-dim":"#c0c1ff","primary-fixed-dim":"#b4c5ff","on-tertiary":"#ffffff","on-tertiary-fixed":"#07006c","on-secondary-fixed":"#00201d","on-error":"#ffffff","on-primary-fixed-variant":"#003ea8"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px"},"spacing":{"space-sm":"0.5rem","gutter-mobile":"1rem","space-lg":"1.5rem","space-md":"1rem","margin-mobile":"1rem","space-xl":"2rem","space-xs":"0.25rem","gutter":"1.5rem","margin":"2rem"},"fontFamily":{"label-md":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"label-lg":["Plus Jakarta Sans"],"body-md":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"display-lg-mobile":["Plus Jakarta Sans"],"headline-xl":["Plus Jakarta Sans"],"label-sm":["Plus Jakarta Sans"],"body-sm":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"]},"fontSize":{"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"display-lg":["40px",{"lineHeight":"48px","letterSpacing":"-0.02em","fontWeight":"700"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-md":["20px",{"lineHeight":"28px","fontWeight":"600"}],"headline-xl-mobile":["24px",{"lineHeight":"32px","letterSpacing":"-0.015em","fontWeight":"700"}],"headline-lg":["24px",{"lineHeight":"32px","letterSpacing":"-0.01em","fontWeight":"600"}],"display-lg-mobile":["30px",{"lineHeight":"38px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-xl":["32px",{"lineHeight":"40px","letterSpacing":"-0.015em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"26px","fontWeight":"600"}]}}}}</script></head><body class="bg-surface font-body-md text-on-surface antialiased">
<!-- Sidebar -->
<aside class="fixed left-0 top-0 h-full w-[258px] bg-surface-container-lowest border-r border-outline-variant/40 z-50 flex flex-col justify-between py-5">
<div class="flex flex-col">
<!-- Brand -->
<div class="px-5 flex items-center gap-3 mb-6">
<div class="w-10 h-10 rounded-xl bg-primary-container flex items-center justify-center shrink-0 shadow-sm shadow-primary/20">
<span class="material-symbols-outlined text-on-primary text-[22px]">school</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-headline-sm text-[16px] text-primary-container font-bold truncate tracking-tight">One Private Course</span>
<span class="font-label-sm text-[11px] text-on-surface-variant font-medium truncate">Sistem Manajemen Bimbel</span>
</div>
</div>
<!-- Quick Add Button -->
<div class="px-5 mb-5">
<button class="w-full h-10 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg rounded-xl flex items-center justify-center gap-2 transition-all shadow-sm shadow-primary/25" type="button">
<span class="material-symbols-outlined text-[19px]">add_circle</span>
<span class="">+ Tambah Sesi Les</span>
</button>
</div>
<!-- Nav Items -->
<nav class="flex flex-col gap-1 px-3" data-active-classes="bg-surface-container text-primary font-bold shadow-xs">
<a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="dashboard-ringkasan" href="{{ route('admin.dashboard') }}">
<span class="material-symbols-outlined text-[20px] text-outline">dashboard</span>
<span class="font-label-lg text-label-lg">Dashboard Ringkasan</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="jadwal-sesi-les" href="{{ route('admin.jadwal') }}">
<span class="material-symbols-outlined text-[20px] text-outline">calendar_month</span>
<span class="font-label-lg text-label-lg">Jadwal &amp; Sesi Les</span>
</a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="database-siswa" href="{{ route('admin.siswa') }}">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[20px] text-outline">group</span>
<span class="font-label-lg text-label-lg">Database Siswa</span>
</div>
<span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-[11px] font-semibold">{{ $nav['students'] }}</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="tutor-guru-pengajar" href="{{ route('admin.tutor') }}">
<span class="material-symbols-outlined text-[20px] text-outline">badge</span>
<span class="font-label-lg text-label-lg">Tutor &amp; Guru Pengajar</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="presensi-laporan" href="{{ route('admin.presensi') }}">
<span class="material-symbols-outlined text-[20px] text-outline">fact_check</span>
<span class="font-label-lg text-label-lg">Presensi &amp; Laporan</span>
</a>
<a aria-current="page" class="flex items-center justify-between px-3 py-2.5 rounded-xl transition-colors bg-surface-container text-primary font-bold shadow-xs" data-path="pembayaran" href="{{ route('admin.pembayaran') }}">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[20px] text-primary-container">payments</span>
<span class="font-label-lg text-label-lg text-primary font-bold">Pembayaran</span>
</div>
<span class="w-2 h-2 rounded-full bg-primary-container shrink-0"></span>
</a>
<div class="border-t border-outline-variant/30 my-2 mx-1"></div>
<a class="flex items-center justify-between px-3 py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="konfirmasi-sesi" href="{{ route('admin.konfirmasi') }}">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[20px] text-outline">pending_actions</span>
<span class="font-label-lg text-label-lg">Konfirmasi Sesi</span>
</div>
<span class="px-2 py-0.5 rounded-full bg-error-container text-error font-label-sm text-[11px] font-bold">{{ $nav['confirm'] }}</span>
</a>
</nav>
</div>
<div class="px-4">
<div class="p-3 bg-surface-container-low rounded-xl border border-outline-variant/30 flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-primary-container/10 text-primary-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[19px]">support_agent</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-[11px] font-semibold text-on-surface truncate">Bantuan Cabang</span>
<span class="font-body-sm text-[10px] text-on-surface-variant">Lentera Edukasi v2.4</span>
</div>
</div>
</div>
</aside>
<!-- Main Wrapper -->
<div class="pl-[258px]">
<!-- Topbar Header -->
<header class="fixed top-0 left-[258px] right-0 h-16 bg-surface-container-lowest/95 backdrop-blur-md border-b border-outline-variant/40 z-40 flex items-center justify-between px-8">
<div class="flex items-center gap-2 font-label-md text-label-md">
<span class="text-on-surface-variant font-medium">Operasional Cabang</span>
<span class="text-outline-variant">/</span>
<span class="text-on-surface font-semibold text-[13px] tracking-tight">Pembayaran</span>
</div>
<div class="flex items-center gap-3">
<div class="text-right flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface leading-tight">{{ auth()->user()->name }}</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">Admin Cabang Tebet</span>
</div>
<div class="w-9 h-9 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-bold text-[13px] shadow-xs">
        AP
      </div>
</div>
</header>
<!-- Page Content -->
<main class="relative pt-16 bg-surface min-h-screen p-8"><div class="flex flex-col w-full pb-16">
<!-- Top Header & Breadcrumb Section -->
<div class="flex flex-col gap-5 mb-8">
<div class="flex items-center gap-2 text-xs font-medium text-slate-500"><span class="">Operasional Cabang</span><span class="text-slate-400">/</span><span class="">Administrasi &amp; Keuangan</span><span class="text-slate-400">/</span><span class="text-blue-600 font-semibold">Pembayaran</span></div>
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-5">
<div class="max-w-3xl"><h1 class="text-2xl font-bold tracking-tight text-slate-900">Manajemen &amp; Rekap Pembayaran</h1><p class="text-xs text-slate-500 mt-1.5 leading-relaxed">Sistem pencatatan manual pembayaran les siswa. Pembayaran ditransfer/dibayar mandiri oleh orang tua via WhatsApp konfirmasi cabang, sistem bertindak mencatat validasi dan memperbarui status piutang operasional.</p></div>
<div class="flex flex-wrap items-center gap-3 shrink-0">
<!-- Filter Periode -->
<div class="relative bg-surface-container-lowest px-3.5 py-2 rounded-xl shadow-xs flex items-center gap-2 text-on-surface">
<span class="material-symbols-outlined text-primary-container text-[20px]">calendar_month</span>
<div class="flex flex-col">
<span class="text-[10px] font-label-sm uppercase tracking-wider text-on-surface-variant leading-none">Periode Aktif</span>
<span class="font-label-md text-label-md text-on-surface font-semibold leading-tight">{{ \App\Support\Fmt::period() }}</span>
</div>
<span class="material-symbols-outlined text-[18px] text-outline ml-1">expand_more</span>
</div>
<!-- Tombol Ekspor -->
<button class="h-10 px-4 bg-surface-container-lowest hover:bg-surface-container text-on-surface font-label-lg text-label-lg rounded-xl flex items-center gap-2 shadow-xs transition-colors" type="button">
<span class="material-symbols-outlined text-[19px] text-on-surface-variant">file_download</span>
<span class="">Ekspor Laporan</span>
</button>
<!-- Tombol Tambah Pembayaran -->
<button class="h-10 px-4 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-xl flex items-center gap-2 shadow-sm transition-all" id="btn-open-payment-modal" type="button"><span class="material-symbols-outlined text-[18px]">add_circle</span><span class="">+ Catat Pembayaran</span></button>
</div>
</div>
</div>
<!-- Banner Info Kebijakan Pembayaran Cabang -->
<div class="relative overflow-hidden bg-surface-container-low rounded-2xl p-5 mb-8 shadow-xs">
<div class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-primary/5 to-transparent pointer-events-none"></div>
<div class="flex items-start gap-4">
<div class="w-10 h-10 rounded-xl bg-primary-container/10 text-primary-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">verified_user</span>
</div>
<div class="flex flex-col min-w-0 pr-6">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg font-bold text-on-surface">Pemberitahuan Sistem &amp; Kebijakan Pembayaran Cabang</span>
<span class="px-2 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-[10px] font-semibold">SOP Cabang</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-1 leading-normal">
          Seluruh tagihan les diterbitkan resmi melalui WhatsApp Admin Cabang ke nomor wali murid tiap tanggal <span class="font-semibold text-on-surface">25–28</span> setiap bulannya. Formulir di halaman ini digunakan admin untuk memvalidasi bukti transfer masuk (BCA/Mandiri/BNI) atau pembayaran tunai langsung di meja administrasi cabang.
        </p>
</div>
</div>
</div>
<!-- Kartu Ringkasan 3 Kolom & Progress Bar -->
<div class="flex flex-col gap-4 mb-8">
<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
<!-- KPI 1: Siswa Aktif -->
<div class="bg-surface-container-lowest rounded-2xl p-6 shadow-xs flex flex-col justify-between">
<div class="flex items-start justify-between">
<div>
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider font-semibold">Siswa Aktif</span>
<div class="font-headline-xl text-[38px] text-on-surface font-extrabold tracking-tight mt-1 leading-none">{{ $k['students'] }}</div>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-container text-on-surface-variant flex items-center justify-center">
<span class="material-symbols-outlined text-[26px]">groups</span>
</div>
</div>
<div class="mt-4 pt-3 flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="w-2 h-2 rounded-full bg-outline"></span>
<span class="">Terdaftar aktif periode {{ \App\Support\Fmt::period() }}</span>
</div>
</div>
<!-- KPI 2: Sudah Membayar -->
<div class="bg-surface-container-lowest rounded-2xl p-6 shadow-xs flex flex-col justify-between relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-secondary-container/20 rounded-bl-full pointer-events-none"></div>
<div class="flex items-start justify-between">
<div>
<div class="flex items-center gap-2 whitespace-nowrap"><span class="font-label-md text-label-md text-secondary uppercase tracking-wider font-semibold shrink-0">Sudah Membayar</span><span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-[11px] font-bold shrink-0 whitespace-nowrap">Lunas</span></div>
<div class="font-headline-xl text-[38px] text-secondary font-extrabold tracking-tight mt-1 leading-none">{{ $k['paid'] }} <span class="font-label-lg text-label-lg font-semibold text-on-surface-variant">Siswa</span></div>
</div>
<div class="w-12 h-12 rounded-xl bg-secondary-container/30 text-secondary flex items-center justify-center">
<span class="material-symbols-outlined text-[26px]">check_circle</span>
</div>
</div>
<div class="mt-4 pt-3 flex items-center justify-between font-body-sm text-body-sm">
<span class="text-secondary font-semibold">{{ $k['paidPct'] }}% telah terverifikasi lunas</span>
<span class="font-label-md text-label-md font-bold text-on-surface">{{ \App\Support\Fmt::rupiah($k['paidAmt']) }}</span>
</div>
</div>
<!-- KPI 3: Belum Membayar -->
<div class="bg-surface-container-lowest rounded-2xl p-6 shadow-xs flex flex-col justify-between relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-error-container/30 rounded-bl-full pointer-events-none"></div>
<div class="flex items-start justify-between">
<div>
<div class="flex items-center gap-2 whitespace-nowrap"><span class="font-label-md text-label-md text-error uppercase tracking-wider font-semibold shrink-0">Belum Membayar</span><span class="px-2 py-0.5 rounded-full bg-error-container text-error font-label-sm text-[11px] font-bold shrink-0 whitespace-nowrap">! {{ $k['unpaid'] }} Tertunda</span></div>
<div class="font-headline-xl text-[38px] text-error font-extrabold tracking-tight mt-1 leading-none">{{ $k['unpaid'] }} <span class="font-label-lg text-label-lg font-semibold text-on-surface-variant">Siswa</span></div>
</div>
<div class="w-12 h-12 rounded-xl bg-error-container text-error flex items-center justify-center">
<span class="material-symbols-outlined text-[26px]">pending</span>
</div>
</div>
<div class="mt-4 pt-3 flex items-center justify-between font-body-sm text-body-sm">
<span class="text-error font-semibold">Perlu follow-up WhatsApp</span>
<span class="font-label-md text-label-md font-bold text-error">{{ \App\Support\Fmt::rupiah($k['unpaidAmt']) }}</span>
</div>
</div>
</div>
<!-- Progress Bar Pelunasan -->
<div class="bg-surface-container-lowest rounded-2xl p-5 shadow-xs flex flex-col gap-3">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-on-surface font-bold">Progres Pelunasan Periode Ini</span>
<span class="px-2.5 py-0.5 rounded-full bg-secondary-container/50 text-secondary font-label-sm text-label-sm font-bold">{{ $k['paidPct'] }}% Selesai</span>
</div>
<div class="font-label-md text-label-md text-on-surface-variant">
<span class="text-secondary font-bold">{{ \App\Support\Fmt::rupiah($k['paidAmt']) }}</span>
<span class="text-outline-variant mx-1">/</span>
<span class="">Target {{ \App\Support\Fmt::rupiah($k['target']) }}</span>
<span class="text-on-surface-variant ml-2 text-[12px] font-normal">({{ $k['paid'] }} dari {{ $k['students'] }} Siswa)</span>
</div>
</div>
<!-- Segmented Bar -->
<div class="w-full h-3 bg-surface-container rounded-full overflow-hidden flex p-0.5">
<div class="h-full bg-secondary rounded-full transition-all duration-700" style="width: {{ $k['paidPct'] }}%;"></div>
<div class="h-full bg-error-container rounded-r-full transition-all duration-700 ml-1" style="width: {{ 100 - $k['paidPct'] }}%;"></div>
</div>
<div class="flex items-center justify-between text-[11px] font-label-sm text-on-surface-variant pt-0.5">
<div class="flex items-center gap-4">
<span class="flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span class="">{{ $k['paid'] }} Siswa Telah Lunas (BCA, Mandiri, Cash)</span>
</span>
<span class="flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-error-container"></span>
<span class="">{{ $k['unpaid'] }} Siswa Menunggu Pembayaran</span>
</span>
</div>
<span class="text-outline font-medium">Batas Rekap: {{ \App\Support\Fmt::dateShort(now()->startOfMonth()->addDays(9)) }}</span>
</div>
</div>
</div>
<!-- Navigasi Tab & Filter Bar -->
<div class="bg-surface-container-lowest rounded-2xl p-4 mb-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-4">
<!-- Tabs -->
<div class="inline-flex p-1 bg-surface-container-low rounded-xl gap-1" id="payment-tabs"><button class="filter-tab-btn active px-4 py-2 rounded-lg font-label-lg text-label-lg font-bold bg-surface-container-lowest text-primary-container shadow-xs flex items-center gap-2 transition-all whitespace-nowrap shrink-0" data-filter="all" type="button"><span class="whitespace-nowrap">Semua Siswa</span><span class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface font-label-sm text-[11px] font-semibold shrink-0">{{ $k['students'] }}</span></button><button class="filter-tab-btn px-4 py-2 rounded-lg font-label-lg text-label-lg font-medium text-on-surface-variant hover:text-on-surface flex items-center gap-2 transition-all whitespace-nowrap shrink-0" data-filter="pending" type="button"><span class="whitespace-nowrap">Belum Membayar</span><span class="px-2 py-0.5 rounded-full bg-error-container text-error font-label-sm text-[11px] font-bold shrink-0">{{ $k['unpaid'] }}</span></button><button class="filter-tab-btn px-4 py-2 rounded-lg font-label-lg text-label-lg font-medium text-on-surface-variant hover:text-on-surface flex items-center gap-2 transition-all whitespace-nowrap shrink-0" data-filter="paid" type="button"><span class="whitespace-nowrap">Sudah Membayar</span><span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-[11px] font-bold shrink-0">{{ $k['paid'] }}</span></button></div>
<!-- Filters & Search -->
<div class="flex flex-wrap items-center gap-3">
<!-- Search -->
<div class="relative flex-1 sm:w-72">
<span class="material-symbols-outlined text-[19px] text-outline absolute left-3.5 top-1/2 -translate-y-1/2">search</span>
<input class="w-full h-10 pl-10 pr-4 bg-surface-container-low rounded-xl font-body-md text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary-container/30 transition-all" placeholder="Cari siswa, wali murid, program..." type="text">
</div>
<!-- Filter Sistem Pembayaran -->
<div class="relative">
<select class="h-10 pl-3.5 pr-8 bg-surface-container-low rounded-xl font-label-md text-label-md text-on-surface font-medium appearance-none focus:outline-none focus:ring-2 focus:ring-primary-container/30 transition-all cursor-pointer">
<option>Sistem: Semua (Bulanan &amp; Sesi)</option>
<option>Paket Bulanan (8 Sesi)</option>
<option>Per Pertemuan (Pay per Session)</option>
</select>
<span class="material-symbols-outlined text-[18px] text-outline absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none">unfold_more</span>
</div>
<!-- Filter Program Belajar -->
<div class="relative">
<select class="h-10 pl-3.5 pr-8 bg-surface-container-low rounded-xl font-label-md text-label-md text-on-surface font-medium appearance-none focus:outline-none focus:ring-2 focus:ring-primary-container/30 transition-all cursor-pointer">
<option>Program: Semua Program</option>
<option>UTBK Saintek &amp; Soshum</option>
<option>Tahsin &amp; PAI Terpadu</option>
<option>Bilingual SMP</option>
<option>Matematika Wajib SMA</option>
<option>Calistung &amp; Tematik SD</option>
<option>TOEFL Preparation</option>
</select>
<span class="material-symbols-outlined text-[18px] text-outline absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none">unfold_more</span>
</div>
</div>
</div>
<!-- Tabel Data Pembayaran -->
<div class="bg-surface-container-lowest rounded-2xl shadow-xs overflow-hidden flex flex-col mb-8">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-md text-label-md tracking-wider uppercase"><th class="py-3.5 px-6 font-semibold min-w-[240px]">Siswa &amp; Wali Murid</th><th class="py-3.5 px-4 font-semibold min-w-[180px]">Program Les</th><th class="py-3.5 px-4 font-semibold min-w-[170px]">Sistem Pembayaran</th><th class="py-3.5 px-4 font-semibold min-w-[130px]">Pertemuan</th><th class="py-3.5 px-4 font-semibold min-w-[150px]">Status Pembayaran</th><th class="py-3.5 px-5 font-semibold min-w-[170px]">Tanggal Dibayar</th><th class="py-3.5 px-6 text-right font-semibold min-w-[150px]">Aksi Validasi</th></tr>
</thead>
<tbody class="divide-y divide-outline-variant/20 font-body-md text-body-md text-on-surface" id="payment-table-body">
@forelse($payments as $pay)

@if($pay->status === 'lunas')
<tr class="hover:bg-surface-container-low/50 transition-colors" data-status="paid"><td class="py-4 px-6"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-full bg-secondary text-on-secondary flex items-center justify-center font-bold font-label-lg shrink-0 shadow-xs">{{ \App\Support\Fmt::initials($pay->student->name) }}</div><div class="flex flex-col min-w-0"><span class="font-label-lg text-label-lg font-bold text-on-surface truncate">{{ $pay->student->name }}</span><span class="font-body-sm text-[12px] text-on-surface-variant">{{ $pay->student->grade }} • Wali: {{ $pay->student->guardian_name }} (<span class="font-mono">{{ $pay->student->guardian_phone }}</span>)</span></div></div></td><td class="py-4 px-4 font-medium"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface text-label-md font-semibold whitespace-nowrap"><span class="w-2 h-2 rounded-full bg-tertiary shrink-0"></span><span class="truncate">{{ $pay->student->program }}</span></span></td><td class="py-4 px-4"><span class="font-label-md text-label-md text-on-surface-variant font-medium whitespace-nowrap">{{ $pay->student->billing_scheme === 'monthly' ? 'Bulanan (Paket 8 Sesi)' : 'Per Pertemuan (Pay per Session)' }}</span></td><td class="py-4 px-4"><span class="font-label-md text-label-md font-semibold text-on-surface whitespace-nowrap">{{ $pay->sessions_label }}</span></td><td class="py-4 px-4"><span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-md text-label-md font-bold whitespace-nowrap shrink-0"><span class="material-symbols-outlined text-[15px]">check_circle</span>Lunas</span></td><td class="py-4 px-5"><div class="flex flex-col whitespace-nowrap"><span class="text-on-surface font-semibold font-label-md text-label-md">{{ $pay->paid_at ? \App\Support\Fmt::dateShort($pay->paid_at) : "-" }}</span><span class="text-on-surface-variant text-[11px] font-body-sm">{{ $pay->method ?: "-" }} • {{ \App\Support\Fmt::rupiah($pay->amount) }}</span></div></td><td class="py-4 px-6 text-right"><button class="px-3 py-1.5 bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md rounded-lg inline-flex items-center gap-1.5 transition-colors whitespace-nowrap" type="button"><span class="material-symbols-outlined text-[16px] text-on-surface-variant">receipt_long</span><span class="">{{ $pay->receipt_no ?: "Kuitansi" }}</span></button></td></tr>
@else
<tr class="hover:bg-surface-container-low/50 transition-colors" data-status="pending"><td class="py-4 px-6"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-bold font-label-lg shrink-0 shadow-xs">{{ \App\Support\Fmt::initials($pay->student->name) }}</div><div class="flex flex-col min-w-0"><span class="font-label-lg text-label-lg font-bold text-on-surface truncate">{{ $pay->student->name }}</span><span class="font-body-sm text-[12px] text-on-surface-variant">{{ $pay->student->grade }} • Wali: {{ $pay->student->guardian_name }} (<span class="font-mono">{{ $pay->student->guardian_phone }}</span>)</span></div></div></td><td class="py-4 px-4 font-medium"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface text-label-md font-semibold whitespace-nowrap"><span class="w-2 h-2 rounded-full bg-primary-container shrink-0"></span><span class="truncate">{{ $pay->student->program }}</span></span></td><td class="py-4 px-4"><span class="font-label-md text-label-md text-on-surface-variant font-medium whitespace-nowrap">{{ $pay->student->billing_scheme === 'monthly' ? 'Bulanan (Paket 8 Sesi)' : 'Per Pertemuan (Pay per Session)' }}</span></td><td class="py-4 px-4"><div class="flex items-center gap-1.5 font-label-md text-label-md font-semibold text-on-surface whitespace-nowrap"><span class="">{{ $pay->sessions_label }}</span><span class="material-symbols-outlined text-secondary text-[16px]">check</span></div></td><td class="py-4 px-4"><span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-error-container text-error font-label-md text-label-md font-bold whitespace-nowrap shrink-0"><span class="material-symbols-outlined text-[15px]">schedule</span>Belum Bayar</span></td><td class="py-4 px-5"><div class="flex flex-col whitespace-nowrap"><span class="text-error font-semibold font-label-md text-label-md">Tenggat: {{ \App\Support\Fmt::dateShort($pay->due_date) }}</span><span class="text-on-surface-variant text-[11px] font-body-sm">Tagihan: {{ \App\Support\Fmt::rupiah($pay->amount) }}</span></div></td><td class="py-4 px-6 text-right"><div class="flex items-center justify-end gap-2"><button class="btn-quick-pay px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-lg flex items-center gap-1.5 shadow-sm transition-colors whitespace-nowrap" data-amount="{{ number_format($pay->amount, 0, ',', '.') }}" data-pid="{{ $pay->id }}" data-grade="{{ $pay->student->grade }}" data-id="{{ $pay->student->code }}" data-name="{{ $pay->student->name }}" type="button"><span class="material-symbols-outlined text-[15px]">check</span><span class="">Catat</span></button><button class="p-1.5 rounded-lg text-secondary hover:bg-secondary-container/30 transition-colors" title="Kirim Reminder WhatsApp" data-wa="{{ \App\Support\Fmt::waLink($pay->student->guardian_phone, "Halo, mengingatkan tagihan les " . $pay->student->name . " periode " . $pay->period . " sebesar " . \App\Support\Fmt::rupiah($pay->amount) . ".") }}" type="button"><span class="material-symbols-outlined text-[20px]">chat</span></button></div></td></tr>
@endif

@empty
<tr><td colspan="7" class="py-10 text-center text-xs text-slate-400">Belum ada tagihan.</td></tr>
@endforelse
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="p-4 bg-surface-container-low/50 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
<span class="font-body-sm text-body-sm text-on-surface-variant">
        Menampilkan <span class="font-semibold text-on-surface">{{ $payments->firstItem() ?? 0 }}–{{ $payments->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-on-surface">{{ $payments->total() }}</span> data pembayaran
      </span>
<div class="flex items-center gap-1.5">
<button {{ $payments->onFirstPage() ? "disabled" : "" }} data-go="{{ $payments->previousPageUrl() }}" class="h-8 px-3 rounded-lg bg-surface-container-lowest text-outline font-label-sm text-label-sm font-semibold opacity-60 cursor-not-allowed flex items-center gap-1" type="button">
<span class="material-symbols-outlined text-[16px]">chevron_left</span>
<span class="">Sebelumnya</span>
</button>
@foreach(range(1, max(1, $payments->lastPage())) as $pg)
@if($pg === $payments->currentPage())
<button class="w-8 h-8 rounded-lg bg-primary-container text-on-primary font-label-sm text-label-sm font-bold flex items-center justify-center shadow-xs" type="button">{{ $pg }}</button>
@else
<button data-go="{{ $payments->url($pg) }}" class="w-8 h-8 rounded-lg bg-surface-container-lowest hover:bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold flex items-center justify-center" type="button">{{ $pg }}</button>
@endif
@endforeach
<button {{ $payments->hasMorePages() ? "" : "disabled" }} data-go="{{ $payments->nextPageUrl() }}" class="h-8 px-3 rounded-lg bg-surface-container-lowest hover:bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold flex items-center gap-1" type="button">
<span class="">Berikutnya</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Visual State Feedback Simulation Section -->
<div class="bg-surface-container-lowest rounded-2xl p-6 shadow-xs flex flex-col gap-4">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary-container text-[22px]">sync_alt</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Simulasi Live State Status Pelunasan</h3>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Otomatisasi Sistem Pembayaran Cabang</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 rounded-xl bg-surface-container-low"><!-- State 1: Sebelum Tercatat --><div class="p-4 rounded-xl bg-surface-container-lowest flex flex-col gap-3 shadow-xs min-w-0"><div class="flex items-center justify-between gap-3 whitespace-nowrap"><span class="font-label-md text-label-md font-bold text-on-surface-variant uppercase tracking-wider shrink-0 whitespace-nowrap">Status Awal (Tertunda)</span><span class="px-2.5 py-0.5 rounded-full bg-error-container text-error font-label-sm text-label-sm font-bold inline-flex items-center gap-1 shrink-0 whitespace-nowrap"><span class="material-symbols-outlined text-[14px]">schedule</span> Belum Bayar</span></div><div class="flex items-center gap-3 min-w-0"><div class="w-9 h-9 rounded-full bg-surface-container text-on-surface flex items-center justify-center font-bold font-label-md shrink-0">KP</div><div class="min-w-0 flex-1"><div class="font-label-lg text-label-lg font-bold text-on-surface truncate">Kevin Pratama (Kelas 10 SMA)</div><div class="text-error font-body-sm text-[12px] font-semibold truncate">Sisa Tagihan Periode: Rp 750.000</div></div></div><div class="text-[12px] font-body-sm text-on-surface-variant leading-relaxed">Status sistem menandai wali murid belum melampirkan slip validasi BCA/Mandiri atau kwitansi tunai.</div></div><!-- State 2: Sesudah Validasi Form --><div class="p-4 rounded-xl bg-surface-container-lowest flex flex-col gap-3 shadow-xs min-w-0"><div class="flex items-center justify-between gap-3 whitespace-nowrap"><span class="font-label-md text-label-md font-bold text-secondary uppercase tracking-wider shrink-0 whitespace-nowrap">Status Validasi (Terbaru)</span><span class="px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold inline-flex items-center gap-1 shrink-0 whitespace-nowrap"><span class="material-symbols-outlined text-[14px]">check_circle</span> Lunas</span></div><div class="flex items-center gap-3 min-w-0"><div class="w-9 h-9 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center font-bold font-label-md shrink-0">KP</div><div class="min-w-0 flex-1"><div class="font-label-lg text-label-lg font-bold text-on-surface truncate">Kevin Pratama • Validasi Berhasil</div><div class="text-secondary font-body-sm text-[12px] font-semibold truncate">Tercatat 06 Okt 2026 • Kuitansi #KW-2026-1048</div></div></div><div class="text-[12px] font-body-sm text-on-surface-variant leading-relaxed">Kuitansi digital otomatis dibuatkan, status tagihan nol (lunas), dan notifikasi terima kasih terkirim ke WhatsApp wali.</div></div></div>
</div>
<!-- Modal Dialog: Catat Pembayaran Siswa -->
<div class="fixed inset-0 z-50 flex items-center justify-center bg-inverse-surface/40 backdrop-blur-xs p-4 hidden" id="payment-modal">
<div class="w-full max-w-xl bg-surface-container-lowest rounded-2xl shadow-xl flex flex-col overflow-hidden max-h-[942px] animate-in fade-in zoom-in-95 duration-200">
<!-- Modal Header -->
<div class="px-6 py-5 bg-surface-container-low flex items-center justify-between shrink-0">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-primary-container text-on-primary flex items-center justify-center shadow-xs">
<span class="material-symbols-outlined text-[22px]">payments</span>
</div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Catat Pembayaran Siswa</h2>
<span class="font-body-sm text-[12px] text-on-surface-variant">Validasi setoran les privat cabang</span>
</div>
</div>
<button class="w-9 h-9 rounded-xl bg-surface-container-lowest hover:bg-surface-container text-on-surface-variant flex items-center justify-center transition-colors" id="btn-close-modal" type="button">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
<!-- Modal Body (Form) -->
<div class="px-6 py-5 overflow-y-auto flex flex-col gap-5">
<!-- Field 1: Pilih Siswa -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-bold text-on-surface">Pilih Siswa &amp; Rekening Tagihan <span class="text-error">*</span></label>
<div class="relative">
<select class="w-full h-11 pl-3.5 pr-9 bg-surface-container-low rounded-xl font-body-md text-body-md text-on-surface appearance-none focus:outline-none focus:ring-2 focus:ring-primary-container/30 transition-all font-medium" id="modal-select-student">
@foreach($pendingPayments as $x)<option value="{{ $x->id }}">{{ $x->student->name }} (ID: {{ $x->student->code }}) - {{ $x->student->grade }}</option>@endforeach
</select>
<span class="material-symbols-outlined text-[19px] text-outline absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none">unfold_more</span>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<!-- Field 2: Periode Pembayaran -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-bold text-on-surface">Periode Les</label>
<input class="w-full h-11 px-3.5 bg-surface-container rounded-xl font-label-md text-label-md text-on-surface font-semibold focus:outline-none cursor-default" readonly="" type="text" value="Oktober 2026">
</div>
<!-- Field 3: Nominal Pembayaran -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-bold text-on-surface">Nominal Bayar (Rp) <span class="text-error">*</span></label>
<div class="relative">
<span class="absolute left-3.5 top-1/2 -translate-y-1/2 font-label-md text-label-md font-bold text-on-surface-variant">Rp</span>
<input class="w-full h-11 pl-11 pr-3.5 bg-surface-container-low rounded-xl font-label-lg text-label-lg font-bold text-on-surface focus:outline-none focus:ring-2 focus:ring-primary-container/30 transition-all" id="modal-input-amount" type="text" value="750.000">
</div>
<span class="text-[11px] font-body-sm text-secondary font-medium">Tagihan otomatis 8 sesi les bulanan</span>
</div>
</div>
<!-- Field 4: Tanggal Bayar -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-bold text-on-surface">Tanggal Diterima / Bayar <span class="text-error">*</span></label>
<div class="relative">
<span class="material-symbols-outlined text-[19px] text-outline absolute left-3.5 top-1/2 -translate-y-1/2">event</span>
<input class="w-full h-11 pl-11 pr-3.5 bg-surface-container-low rounded-xl font-body-md text-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-primary-container/30 transition-all" type="date" value="2026-10-06">
</div>
</div>
<!-- Field 5: Metode Pembayaran (Radio Cards) -->
<div class="flex flex-col gap-2">
<label class="font-label-md text-label-md font-bold text-on-surface">Metode Pembayaran <span class="text-error">*</span></label>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
<label class="relative flex items-center gap-3 p-3.5 rounded-xl bg-surface-container-low cursor-pointer hover:bg-surface-container transition-all">
<input checked="" class="w-4 h-4 text-primary-container focus:ring-primary-container" name="payment_method" type="radio" value="transfer">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Transfer Bank</span>
<span class="text-[11px] font-body-sm text-on-surface-variant">BCA / Mandiri / BNI Cabang</span>
</div>
</label>
<label class="relative flex items-center gap-3 p-3.5 rounded-xl bg-surface-container-low cursor-pointer hover:bg-surface-container transition-all">
<input class="w-4 h-4 text-primary-container focus:ring-primary-container" name="payment_method" type="radio" value="cash">
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Tunai / Cash</span>
<span class="text-[11px] font-body-sm text-on-surface-variant">Diserahkan di Kasir Cabang</span>
</div>
</label>
</div>
</div>
<!-- Field 6: Nomor Referensi / Bukti Transfer -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-bold text-on-surface">Nomor Referensi Transaksi (Opsional)</label>
<input class="w-full h-11 px-3.5 bg-surface-container-low rounded-xl font-body-md text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:ring-2 focus:ring-primary-container/30 transition-all" placeholder="e.g. TRX-BCA-98124482 atau Nomor Resi" type="text" value="TRX-BCA-98124482">
</div>
<!-- Field 7: Catatan Tambahan -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md font-bold text-on-surface">Catatan Admin Cabang</label>
<textarea class="w-full p-3.5 bg-surface-container-low rounded-xl font-body-md text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:ring-2 focus:ring-primary-container/30 transition-all" rows="2">Konfirmasi via WhatsApp orang tua Ibu Melani pada 06 Okt 2026 14:20 WIB</textarea>
</div>
<!-- Kotak Info Notifikasi -->
<div class="p-3.5 rounded-xl bg-surface-container text-on-surface font-body-sm text-[12px] flex items-start gap-2.5">
<span class="material-symbols-outlined text-primary-container text-[18px] shrink-0 mt-0.5">info</span>
<p class="leading-relaxed text-on-surface-variant">
<span class="font-semibold text-on-surface">Info Validasi:</span> Status pembayaran siswa akan otomatis berubah menjadi <span class="font-bold text-secondary">"Lunas"</span> setelah data disimpan dan kuitansi digital bernomor resmi akan dibuatkan otomatis.
          </p>
</div>
</div>
<!-- Modal Footer -->
<div class="px-6 py-4 bg-surface-container-low flex items-center justify-end gap-3 shrink-0">
<button class="h-10 px-4 rounded-xl bg-surface-container-lowest hover:bg-surface-container text-on-surface font-label-lg text-label-lg transition-colors" id="btn-cancel-modal" type="button">
          Batal
        </button>
<button class="h-10 px-5 rounded-xl bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg font-bold flex items-center gap-2 shadow-sm shadow-primary/20 transition-all" id="btn-submit-payment" type="button">
<span class="material-symbols-outlined text-[19px]">check_circle</span>
<span class="">+ Simpan &amp; Terbitkan Kuitansi</span>
</button>
</div>
</div>
</div>
</div>
<script>
  (function () {
    const modal = document.getElementById('payment-modal');
    const openBtn = document.getElementById('btn-open-payment-modal');
    const closeBtn = document.getElementById('btn-close-modal');
    const cancelBtn = document.getElementById('btn-cancel-modal');
    const submitBtn = document.getElementById('btn-submit-payment');
    const selectStudent = document.getElementById('modal-select-student');
    const inputAmount = document.getElementById('modal-input-amount');
    const quickPayBtns = document.querySelectorAll('.btn-quick-pay');

    function showModal() {
      if (modal) modal.classList.remove('hidden');
    }

    function hideModal() {
      if (modal) modal.classList.add('hidden');
    }

    if (openBtn) openBtn.addEventListener('click', showModal);
    if (closeBtn) closeBtn.addEventListener('click', hideModal);
    if (cancelBtn) cancelBtn.addEventListener('click', hideModal);

    modal.addEventListener('click', function (e) {
      if (e.target === modal) hideModal();
    });

    quickPayBtns.forEach(btn => {
      btn.addEventListener('click', function () {
        const studentName = this.getAttribute('data-name');
        const studentAmount = this.getAttribute('data-amount');
        if (inputAmount) inputAmount.value = studentAmount;
        showModal();
      });
    });

    if (submitBtn) {
      submitBtn.addEventListener('click', function () {
        this.innerHTML = '<span class="material-symbols-outlined text-[19px] animate-spin">refresh</span> Menyimpan...';
        setTimeout(() => {
          this.innerHTML = '<span class="material-symbols-outlined text-[19px]">check</span> Tersimpan!';
          setTimeout(() => {
            hideModal();
            this.innerHTML = '<span class="material-symbols-outlined text-[19px]">check_circle</span> <span>+ Simpan &amp; Terbitkan Kuitansi</span>';
          }, 600);
        }, 800);
      });
    }

    // Segmented tab logic
    const tabBtns = document.querySelectorAll('.filter-tab-btn');
    const rows = document.querySelectorAll('#payment-table-body tr');

    tabBtns.forEach(btn => {
      btn.addEventListener('click', function () {
        tabBtns.forEach(b => {
          b.classList.remove('bg-surface-container-lowest', 'text-primary-container', 'shadow-xs', 'font-bold');
          b.classList.add('font-medium', 'text-on-surface-variant');
        });

        this.classList.add('bg-surface-container-lowest', 'text-primary-container', 'shadow-xs', 'font-bold');
        this.classList.remove('font-medium', 'text-on-surface-variant');

        const filter = this.getAttribute('data-filter');
        rows.forEach(row => {
          const rowStatus = row.getAttribute('data-status');
          if (filter === 'all' || rowStatus === filter) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
      });
    });
  })();
</script></main>
</div>






<script src="{{ asset('js/opc.js') }}"></script><script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});
const API = {!! json_encode(url('/admin/pembayaran')) !!}; const PP = {!! json_encode($pendingJson) !!};
const Q = new URLSearchParams(location.search);
const modal = document.getElementById('payment-modal'), selS = document.getElementById('modal-select-student'), amt = document.getElementById('modal-input-amount');
const dateIn = modal.querySelector('input[type=date]'); const refIn = modal.querySelector('input[placeholder^="e.g. TRX"]'); if (refIn) refIn.value = '';
dateIn.value = {!! json_encode(now()->toDateString()) !!};
function fill(id) { const d = PP[id]; if (!d) return; selS.value = id; amt.value = d.amount_fmt; }
selS.addEventListener('change', () => fill(selS.value)); if (selS.value) fill(selS.value);
document.querySelectorAll('button[data-pid]').forEach(b => b.addEventListener('click', () => { fill(b.dataset.pid); modal.classList.remove('hidden'); }));
if (Q.get('catat')) { const sid = Q.get('student'); const pick = Object.values(PP).find(x => String(x.student_id) === sid); if (pick) fill(pick.id); modal.classList.remove('hidden'); }
document.getElementById('btn-submit-payment').addEventListener('click', async e => {
  e.stopImmediatePropagation();
  if (!selS.value) return OPC.toast('Tidak ada tagihan yang perlu dicatat.', false);
  const meth = (modal.querySelector('input[name=payment_method]:checked') || {}).value;
  try { const j = await OPC.post(API + '/' + selS.value + '/lunas', {amount: amt.value.replace(/\D/g, ''), paid_at: dateIn.value, method: meth, ref: refIn ? refIn.value : ''}); modal.classList.add('hidden'); OPC.done(j, 'reload'); } catch (err) {}
}, true);
OPC.on('Ekspor Laporan', () => OPC.go({!! json_encode(route('admin.export', 'pembayaran')) !!}));
document.querySelectorAll('button[data-wa]').forEach(b => b.addEventListener('click', () => window.open(b.dataset.wa, '_blank')));
document.querySelectorAll('button[data-receipt]').forEach(b => b.addEventListener('click', () => window.open(API + '/' + b.dataset.receipt + '/kuitansi', '_blank')));
// filter
const rows = [...document.querySelectorAll('#payment-table-body tr[data-status]')]; const qi = document.querySelector('input[placeholder^="Cari siswa"]'); const sels = [...document.querySelectorAll('select')].filter(s => s.id !== 'modal-select-student');
qi.value = Q.get('q') || '';
function run() { const v = qi.value.toLowerCase(); const tab = (document.querySelector('.filter-tab-btn.font-bold') || {dataset: {filter: 'all'}}).dataset.filter; const sys = sels[0] ? sels[0].selectedIndex : 0, prog = sels[1] ? sels[1].value : '';
  rows.forEach(r => { let ok = (!v || r.dataset.search.includes(v)) && (tab === 'all' || r.dataset.status === tab);
    if (sys === 1) ok = ok && r.dataset.billing === 'monthly'; if (sys === 2) ok = ok && r.dataset.billing === 'per_session';
    if (sels[1] && sels[1].selectedIndex > 0) ok = ok && r.textContent.toLowerCase().includes(sels[1].selectedOptions[0].textContent.toLowerCase().split(' &')[0].split(' ')[0]);
    r.style.display = ok ? '' : 'none'; }); }
qi.addEventListener('input', run); sels.forEach(s => s.addEventListener('change', run)); document.querySelectorAll('.filter-tab-btn').forEach(b => b.addEventListener('click', () => setTimeout(run, 0)));
if (Q.get('student')) { const n = {!! json_encode($studentFilterName ?? '') !!}; if (n) { qi.value = n; run(); } }
document.querySelectorAll('div').forEach(d => { if (d.firstElementChild && d.firstElementChild.textContent.trim() === 'Periode Aktif') { d.closest('div[class*=cursor], div[class*=rounded]').addEventListener('click', () => OPC.toast('Periode aktif: ' + d.lastElementChild.textContent.trim(), true)); } });
</script></body></html>