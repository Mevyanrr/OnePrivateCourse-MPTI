<!DOCTYPE html><html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}"><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta content="web_dashboard" name="shell-type"><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"><style>@@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={"darkMode":"class","theme":{"extend":{"colors":{"on-tertiary-container":"#f1eeff","surface-dim":"#d2d9f4","secondary-fixed-dim":"#6bd8cb","on-primary":"#ffffff","background":"#faf8ff","surface-container-high":"#e2e7ff","tertiary":"#3e3fcc","primary":"#004ac6","on-surface":"#131b2e","inverse-primary":"#b4c5ff","primary-fixed":"#dbe1ff","surface-container-highest":"#dae2fd","surface-container-low":"#f2f3ff","error":"#ba1a1a","on-error-container":"#93000a","on-primary-container":"#eeefff","surface-container-lowest":"#ffffff","surface":"#faf8ff","secondary-fixed":"#89f5e7","outline-variant":"#c3c6d7","surface-tint":"#0053db","surface-container":"#eaedff","primary-container":"#2563eb","on-surface-variant":"#434655","outline":"#737686","surface-bright":"#faf8ff","tertiary-container":"#585be6","on-secondary":"#ffffff","on-tertiary-fixed-variant":"#2f2ebe","inverse-surface":"#283044","secondary-container":"#86f2e4","error-container":"#ffdad6","on-secondary-fixed-variant":"#005049","surface-variant":"#dae2fd","on-secondary-container":"#006f66","on-primary-fixed":"#00174b","tertiary-fixed":"#e1e0ff","secondary":"#006a61","inverse-on-surface":"#eef0ff","on-background":"#131b2e","tertiary-fixed-dim":"#c0c1ff","primary-fixed-dim":"#b4c5ff","on-tertiary":"#ffffff","on-tertiary-fixed":"#07006c","on-secondary-fixed":"#00201d","on-error":"#ffffff","on-primary-fixed-variant":"#003ea8"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px"},"spacing":{"space-sm":"0.5rem","gutter-mobile":"1rem","space-lg":"1.5rem","space-md":"1rem","margin-mobile":"1rem","space-xl":"2rem","space-xs":"0.25rem","gutter":"1.5rem","margin":"2rem"},"fontFamily":{"label-md":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"label-lg":["Plus Jakarta Sans"],"body-md":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"display-lg-mobile":["Plus Jakarta Sans"],"headline-xl":["Plus Jakarta Sans"],"label-sm":["Plus Jakarta Sans"],"body-sm":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"]},"fontSize":{"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"display-lg":["40px",{"lineHeight":"48px","letterSpacing":"-0.02em","fontWeight":"700"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-md":["20px",{"lineHeight":"28px","fontWeight":"600"}],"headline-xl-mobile":["24px",{"lineHeight":"32px","letterSpacing":"-0.015em","fontWeight":"700"}],"headline-lg":["24px",{"lineHeight":"32px","letterSpacing":"-0.01em","fontWeight":"600"}],"display-lg-mobile":["30px",{"lineHeight":"38px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-xl":["32px",{"lineHeight":"40px","letterSpacing":"-0.015em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"26px","fontWeight":"600"}]}}}}</script></head><body class="bg-surface font-body-md text-on-surface"><aside class="fixed left-0 top-0 h-full w-[258px] bg-surface-container-lowest border-r border-outline-variant/40 z-50 flex flex-col justify-between py-5"><div class="flex flex-col"><div class="px-5 flex items-center gap-3 mb-6"><div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-on-primary text-[22px]">school</span></div><div class="flex flex-col min-w-0"><span class="font-label-lg text-label-lg text-primary-container font-bold truncate tracking-tight">One Private Course</span><span class="font-label-sm text-label-sm text-on-surface-variant font-medium truncate">Sistem Manajemen Bimbel</span></div></div><div class="px-5 mb-5"><button class="w-full h-10 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg rounded-lg flex items-center justify-center gap-2 transition-colors" type="button"><span class="material-symbols-outlined text-[18px]">add</span><span class="">Tambah Sesi Les</span></button></div><nav class="flex flex-col gap-1 px-3" data-active-classes="bg-surface-container-low text-primary-container font-semibold rounded-lg"><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="dashboard-ringkasan" href="{{ route('admin.dashboard') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">grid_view</span><span class="font-label-lg text-label-lg">Dashboard Ringkasan</span></div><span class="w-2 h-2 rounded-full bg-primary-container shrink-0"></span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="jadwal-dan-sesi-les" href="{{ route('admin.jadwal') }}"><span class="material-symbols-outlined text-[20px]">calendar_month</span><span class="font-label-lg text-label-lg">Jadwal &amp; Sesi Les</span></a><a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="database-siswa" href="{{ route('admin.siswa') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">group</span><span class="font-label-lg text-label-lg">Database Siswa</span></div><span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">{{ $nav['students'] }}</span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="tutor-dan-guru-pengajar" href="{{ route('admin.tutor') }}"><span class="material-symbols-outlined text-[20px]">person_apron</span><span class="font-label-lg text-label-lg">Tutor &amp; Guru Pengajar</span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="presensi-dan-laporan" href="{{ route('admin.presensi') }}"><span class="material-symbols-outlined text-[20px]">assignment_turned_in</span><span class="font-label-lg text-label-lg">Presensi &amp; Laporan</span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="pembayaran" href="{{ route('admin.pembayaran') }}"><span class="material-symbols-outlined text-[20px]">payments</span><span class="font-label-lg text-label-lg">Pembayaran</span></a><div class="border-t border-outline-variant/30 my-2 mx-1"></div><a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="konfirmasi-sesi" href="{{ route('admin.konfirmasi') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">pending_actions</span><span class="font-label-lg text-label-lg">Konfirmasi Sesi</span></div><span class="px-2 py-0.5 rounded-full bg-error-container text-error font-label-sm text-label-sm font-semibold">{{ $nav['confirm'] }}</span></a></nav></div><div class="px-5 pt-3"><div class="p-3 bg-surface-container-low rounded-lg flex items-center gap-3"><span class="material-symbols-outlined text-primary-container text-[20px]">support_agent</span><div class="flex flex-col"><span class="font-label-sm text-label-sm font-semibold text-on-surface">Bantuan Cabang</span><span class="font-body-sm text-[11px] text-on-surface-variant">v2.4 LTS</span></div></div></div></aside><div class="pl-[258px]"><header class="fixed top-0 left-[258px] right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md border-b border-outline-variant/40 z-40 flex items-center justify-between px-8"><div class="flex items-center gap-2 font-label-lg text-label-lg"><span class="text-on-surface-variant">Operasional Cabang</span><span class="text-outline-variant">/</span><span class="text-on-surface font-semibold">Dashboard Ringkasan</span></div><div class="flex items-center gap-4"><div class="text-right flex flex-col"><span class="font-label-md text-label-md font-semibold text-on-surface">{{ auth()->user()->name }}</span><span class="font-body-sm text-[11px] text-on-surface-variant">Admin Cabang</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 bg-surface min-h-screen p-8"><div class="flex flex-col w-full">
<!-- Content Header Area with Enhanced Visual Contrast -->
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4"><div class="flex flex-col gap-1.5 max-w-2xl">
<div class="flex items-center gap-2 text-xs font-medium text-slate-500">
<span class="hover:text-blue-600 transition-colors cursor-pointer">Operasional Cabang</span>
<span class="text-slate-300">&gt;</span>
<span class="hover:text-blue-600 transition-colors cursor-pointer">Database Siswa</span>
<span class="text-slate-300">&gt;</span>
<span class="text-blue-600 font-semibold">Tambah Siswa Baru</span>
</div>
<h1 class="text-2xl font-bold tracking-tight text-slate-900">Tambah Siswa Baru</h1>
<p class="text-xs text-slate-500 mt-1">
        Lengkapi data siswa untuk pembuatan jadwal, pencatatan presensi, dan sistem pembayaran les cabang Lentera Edukasi.
      </p>
</div>
<div class="flex items-center gap-3 self-start md:self-auto bg-slate-100/80 px-3.5 py-2 rounded-xl border border-slate-200/60">
<div class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></div>
<div class="flex flex-col">
<span class="text-[11px] font-medium text-slate-400 leading-none">Status Formulir</span>
<span class="text-xs font-semibold text-slate-800 mt-0.5">Draf Siap Terhubung</span>
</div>
</div></div>
<!-- Main Multi-step Form Card -->
<div class="w-full bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8 mb-24">
<div class="mb-8 pb-6 bg-slate-50/70 border-b border-slate-100 -mx-6 -mt-6 sm:-mx-8 sm:-mt-8 p-6 sm:p-8 rounded-t-2xl">
<div class="flex flex-col gap-4">
<div class="flex justify-between items-center text-slate-900">
<div class="flex items-center gap-3">
<span class="text-sm font-bold text-slate-900">Langkah 3 dari 4</span>
<span class="hidden sm:inline text-xs text-slate-400">• Pengisian Berkelanjutan</span>
</div>
<span class="text-xs font-semibold text-blue-600 px-2.5 py-1 bg-blue-50 border border-blue-200/50 rounded-lg">75% Selesai Diisi</span>
</div>
<div class="relative w-full h-1.5 bg-slate-200/70 rounded-full overflow-hidden">
<div class="h-full bg-blue-600 rounded-full transition-all duration-500" style="width: 75%;"></div>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-2">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-xl bg-blue-600 text-white text-xs flex items-center justify-center font-bold shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[17px]">check</span>
</div>
<div class="flex flex-col min-w-0">
<span class="text-xs text-slate-800 font-semibold truncate">1. Data Siswa</span>
<span class="text-[11px] text-emerald-600 font-medium">Lengkap</span>
</div>
</div>
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-xl bg-blue-600 text-white text-xs flex items-center justify-center font-bold shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[17px]">check</span>
</div>
<div class="flex flex-col min-w-0">
<span class="text-xs text-slate-800 font-semibold truncate">2. Kontak &amp; Lokasi</span>
<span class="text-[11px] text-emerald-600 font-medium">Lengkap</span>
</div>
</div>
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 border border-blue-200/60 text-xs flex items-center justify-center font-bold shrink-0 shadow-xs">
              3
            </div>
<div class="flex flex-col min-w-0">
<span class="text-xs text-blue-600 font-bold truncate">3. Program &amp; Tutor</span>
<span class="text-[11px] text-blue-600 font-medium">Aktif Sekarang</span>
</div>
</div>
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-xl bg-slate-100 text-slate-400 text-xs flex items-center justify-center font-semibold shrink-0">
              4
            </div>
<div class="flex flex-col min-w-0">
<span class="text-xs text-slate-400 font-medium truncate">4. Kebutuhan Khusus</span>
<span class="text-[11px] text-slate-400 font-normal">Opsional</span>
</div>
</div>
</div>
</div>
</div>
<form class="flex flex-col gap-10">
<!-- SECTION 1: Data Siswa -->
<section class="flex flex-col gap-5">
<div class="flex items-center gap-3 pb-3 border-b border-slate-100">
<div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
<span class="material-symbols-outlined text-[18px]">person</span>
</div>
<div>
<h2 class="text-sm font-semibold text-slate-900 tracking-tight">1. Data Siswa</h2>
<p class="text-xs text-slate-500">Informasi profil dasar siswa untuk pencatatan akademik</p>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
<div class="flex flex-col gap-1.5">
<label class="text-xs font-medium text-slate-700 flex items-center justify-between" for="student_name">
<span class="">Nama Lengkap Siswa <span class="text-rose-500">*</span></span>
<span class="text-[11px] text-slate-400">Sesuai rapor / akta</span>
</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-[18px] text-slate-400">badge</span>
<input class="w-full h-10 pl-9 pr-3.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 placeholder:text-slate-400 focus:outline-none focus:border-blue-600 transition-colors" id="student_name" placeholder="cth. Aisyah Putri Rahmadani" type="text" value="">
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="text-xs font-medium text-slate-700" for="student_grade">
              Jenjang &amp; Kelas <span class="text-rose-500">*</span>
</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-[18px] text-slate-400">school</span>
<select class="w-full h-10 pl-9 pr-8 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-blue-600 transition-colors appearance-none cursor-pointer" id="student_grade">
<option selected="" value="smp-8">Kelas 8 - SMP</option>
<option value="sd-1">Kelas 1-3 - SD (Bawah)</option>
<option value="sd-2">Kelas 4-6 - SD (Atas)</option>
<option value="smp-7">Kelas 7 - SMP</option>
<option value="smp-9">Kelas 9 - SMP</option>
<option value="sma-10">Kelas 10 - SMA</option>
<option value="sma-11">Kelas 11 - SMA</option>
<option value="sma-12">Kelas 12 - SMA / UTBK</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 text-[16px] text-slate-400 pointer-events-none">expand_more</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="text-xs font-medium text-slate-700" for="student_school">
              Asal Sekolah <span class="text-rose-500">*</span>
</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-[18px] text-slate-400">domain</span>
<input class="w-full h-10 pl-9 pr-3.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 placeholder:text-slate-400 focus:outline-none focus:border-blue-600 transition-colors" id="student_school" placeholder="cth. SMP Negeri 115 Jakarta" type="text" value="">
</div>
</div>
<div class="grid grid-cols-2 gap-3">
<div class="flex flex-col gap-1.5">
<label class="text-xs font-medium text-slate-700" for="student_gender">
                Jenis Kelamin
              </label>
<div class="relative flex items-center">
<select class="w-full h-10 px-3 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-blue-600 transition-colors appearance-none cursor-pointer" id="student_gender">
<option selected="" value="P">Perempuan</option>
<option value="L">Laki-laki</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 text-[16px] text-slate-400 pointer-events-none">expand_more</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="text-xs font-medium text-slate-700" for="student_dob">
                Tanggal Lahir
              </label>
<input class="w-full h-10 px-3 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-blue-600 transition-colors cursor-pointer" id="student_dob" type="date" value="">
</div>
</div>
</div>
</section>
<!-- SECTION 2: Kontak & Lokasi Les -->
<section class="flex flex-col gap-5 pt-3">
<div class="flex items-center gap-3 pb-3 border-b border-slate-100">
<div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
<span class="material-symbols-outlined text-[18px]">pin_drop</span>
</div>
<div>
<h2 class="text-sm font-semibold text-slate-900 tracking-tight">2. Kontak &amp; Lokasi Les</h2>
<p class="text-xs text-slate-500">Kontak wali siswa dan metode kehadiran pendampingan</p>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
<div class="flex flex-col gap-1.5">
<label class="text-xs font-medium text-slate-700" for="parent_name">
              Nama Lengkap Orang Tua / Wali <span class="text-rose-500">*</span>
</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-[18px] text-slate-400">family_restroom</span>
<input class="w-full h-10 pl-9 pr-3.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 placeholder:text-slate-400 focus:outline-none focus:border-blue-600 transition-colors" id="parent_name" placeholder="cth. Ibu Nabila Syakieb" type="text" value="">
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="text-xs font-medium text-slate-700 flex items-center justify-between" for="parent_wa">
<span class="">Nomor WhatsApp Aktif <span class="text-rose-500">*</span></span>
<span class="text-emerald-600 text-[11px] font-medium flex items-center gap-1">
<span class="material-symbols-outlined text-[13px]">chat</span> Auto-Broadcast Billing
              </span>
</label>
<div class="relative flex items-center">
<span class="absolute left-3 text-xs text-slate-500 font-semibold bg-slate-100 px-1.5 py-0.5 rounded-md">
                +62
              </span>
<input class="w-full h-10 pl-14 pr-3.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 placeholder:text-slate-400 focus:outline-none focus:border-blue-600 transition-colors" id="parent_wa" placeholder="812-xxxx-xxxx" type="tel" value="">
</div>
</div>
</div>
<div class="flex flex-col gap-2.5">
<label class="text-xs font-medium text-slate-700">
            Metode Pembelajaran Utama <span class="text-rose-500">*</span>
</label>
<div class="grid grid-cols-1 md:grid-cols-3 gap-3">
<label class="relative flex flex-col p-4 rounded-xl border-2 border-blue-600 bg-blue-50/30 cursor-pointer transition-all shadow-xs">
<input checked="" class="peer sr-only" name="learning_method" type="radio" value="home_visit">
<div class="flex items-center justify-between mb-2">
<div class="w-8 h-8 rounded-lg bg-blue-600 text-white flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">home</span>
</div>
<span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/50 text-[10px] font-semibold">
                  Pilihan Populer
                </span>
</div>
<span class="text-xs font-bold text-slate-900">Home Visit</span>
<span class="text-[11px] text-slate-500 mt-1 leading-normal">Tutor hadir langsung ke tempat tinggal siswa dengan kompensasi transport terjadwal.</span>
<div class="mt-3 flex items-center gap-1 text-blue-600 text-[11px] font-semibold">
<span class="material-symbols-outlined text-[14px]">verified</span> Terverifikasi Wilayah
              </div>
</label>
<label class="relative flex flex-col p-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer transition-all">
<input class="peer sr-only" name="learning_method" type="radio" value="online">
<div class="flex items-center justify-between mb-2">
<div class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">videocam</span>
</div>
</div>
<span class="text-xs font-bold text-slate-800">Online Zoom Pro</span>
<span class="text-[11px] text-slate-500 mt-1 leading-normal">Sesi interaktif via ruang virtual cabang dilengkapi rekaman dan papan tulis interaktif.</span>
</label>
<label class="relative flex flex-col p-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer transition-all">
<input class="peer sr-only" name="learning_method" type="radio" value="studio">
<div class="flex items-center justify-between mb-2">
<div class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">corporate_fare</span>
</div>
</div>
<span class="text-xs font-bold text-slate-800">Studio Cabang</span>
<span class="text-[11px] text-slate-500 mt-1 leading-normal">Siswa belajar di ruang privat ber-AC kantor cabang Lentera Edukasi Tebet.</span>
</label>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="text-xs font-medium text-slate-700 flex items-center justify-between" for="home_address">
<span class="">Alamat Lengkap / Titik Lokasi Les (Home Visit) <span class="text-rose-500">*</span></span>
<span class="text-[11px] text-slate-400">Termasuk patokan gerbang</span>
</label>
<div class="relative flex items-start">
<span class="material-symbols-outlined absolute left-3 top-2.5 text-[18px] text-slate-400">location_on</span>
<textarea class="w-full pl-9 pr-3.5 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 placeholder:text-slate-400 focus:outline-none focus:border-blue-600 transition-colors" id="home_address" placeholder="Masukkan alamat lengkap rumah siswa..." rows="3"></textarea>
</div>
</div>
</section>
<!-- SECTION 3: Program & Tutor Pendamping -->
<section class="flex flex-col gap-5 pt-3">
<div class="flex items-center gap-3 pb-3 border-b border-slate-100">
<div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
<span class="material-symbols-outlined text-[18px]">auto_stories</span>
</div>
<div>
<h2 class="text-sm font-semibold text-slate-900 tracking-tight">3. Program &amp; Tutor Pendamping</h2>
<p class="text-xs text-slate-500">Pemilihan kurikulum, tutor utama, dan preferensi jadwal rutin</p>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
<div class="flex flex-col gap-1.5">
<label class="text-xs font-medium text-slate-700" for="study_program">
              Program / Mata Pelajaran <span class="text-rose-500">*</span>
</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-[18px] text-slate-400">menu_book</span>
<select class="w-full h-10 pl-9 pr-8 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-blue-600 transition-colors appearance-none cursor-pointer" id="study_program">
<option selected="" value="tahsin">Mengaji &amp; Tahsin Al-Qur'an (Reguler)</option>
<option value="eng">English Conversation &amp; Grammar</option>
<option value="math">Matematika &amp; IPA Terpadu</option>
<option value="fisika">Fisika SMA &amp; Persiapan Olimpiade</option>
<option value="calistung">Calistung &amp; Iqra' Dasar</option>
</select>
<span class="material-symbols-outlined absolute right-2.5 text-[16px] text-slate-400 pointer-events-none">expand_more</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="text-xs font-medium text-slate-700" for="tutor_assigned">
              Tutor Pendamping Utama <span class="text-rose-500">*</span>
</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-[18px] text-slate-400">person_celebrate</span>
<select class="w-full h-10 pl-9 pr-8 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-blue-600 transition-colors appearance-none cursor-pointer" id="tutor_assigned">
@foreach($tutors as $t)<option value="{{ $t->id }}">{{ $t->name }} ({{ $t->headline }})</option>@endforeach
</select>
<span class="material-symbols-outlined absolute right-2.5 text-[16px] text-slate-400 pointer-events-none">expand_more</span>
</div>
</div>
</div>
<div class="flex flex-col gap-2.5">
<div class="flex items-center justify-between">
<label class="text-xs font-medium text-slate-700 flex items-center gap-2">
<span class="">Pilihan Jadwal Rutin Les</span>
<span class="text-slate-400 font-normal">(Min. 1 sesi per minggu)</span>
</label>
<button class="inline-flex items-center gap-1 text-xs font-semibold text-blue-600 hover:text-blue-700" type="button">
<span class="material-symbols-outlined text-[16px]">add_circle</span> Tambah Jadwal Hari
            </button>
</div>
<div class="flex flex-col gap-2">
<div class="flex flex-wrap items-center justify-between gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200/70">
<div class="flex items-center gap-3">
<div class="w-7 h-7 rounded-lg bg-white border border-slate-200/80 text-blue-600 font-bold flex items-center justify-center text-xs">
                  1
                </div>
<div class="flex items-center gap-2">
<span class="text-xs font-bold text-slate-800">Hari Selasa</span>
<span class="text-slate-300">•</span>
<span class="text-xs font-medium text-slate-600">16:00 – 17:30 WIB</span>
</div>
</div>
<div class="flex items-center gap-2.5">
<span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[11px] font-semibold">
                  Durasi 90 Menit
                </span>
<button class="w-7 h-7 rounded-lg flex items-center justify-center text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors" title="Hapus jadwal" type="button">
<span class="material-symbols-outlined text-[16px]">delete</span>
</button>
</div>
</div>
<div class="flex flex-wrap items-center justify-between gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200/70">
<div class="flex items-center gap-3">
<div class="w-7 h-7 rounded-lg bg-white border border-slate-200/80 text-blue-600 font-bold flex items-center justify-center text-xs">
                  2
                </div>
<div class="flex items-center gap-2">
<span class="text-xs font-bold text-slate-800">Hari Kamis</span>
<span class="text-slate-300">•</span>
<span class="text-xs font-medium text-slate-600">16:00 – 17:30 WIB</span>
</div>
</div>
<div class="flex items-center gap-2.5">
<span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[11px] font-semibold">
                  Durasi 90 Menit
                </span>
<button class="w-7 h-7 rounded-lg flex items-center justify-center text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors" title="Hapus jadwal" type="button">
<span class="material-symbols-outlined text-[16px]">delete</span>
</button>
</div>
</div>
</div>
</div>
<div class="flex flex-col gap-2.5">
<label class="text-xs font-medium text-slate-700">
            Metode Skema Tagihan Bimbel <span class="text-rose-500">*</span>
</label>
<div class="grid grid-cols-1 md:grid-cols-2 gap-3">
<label class="flex items-start gap-3 p-3.5 rounded-xl border border-blue-600 bg-blue-50/20 cursor-pointer transition-all">
<input checked="" class="mt-0.5 text-blue-600 focus:ring-blue-500" name="billing_scheme" type="radio" value="monthly">
<div class="flex flex-col">
<span class="text-xs font-bold text-slate-900">Paket Bulanan (Monthly)</span>
<span class="text-[11px] text-slate-500 mt-0.5 leading-normal">Ditagihkan secara rekapitulasi awal atau akhir bulan kalender berdasarkan paket les aktif.</span>
</div>
</label>
<label class="flex items-start gap-3 p-3.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer transition-all">
<input class="mt-0.5 text-blue-600 focus:ring-blue-500" name="billing_scheme" type="radio" value="per_session">
<div class="flex flex-col">
<span class="text-xs font-bold text-slate-800">Per Pertemuan (Pay as You Go)</span>
<span class="text-[11px] text-slate-500 mt-0.5 leading-normal">Tagihan diterbitkan dinamis berbasis presensi sesi yang berhasil diverifikasi oleh tutor.</span>
</div>
</label>
</div>
</div>
</section>
<!-- SECTION 4: Kebutuhan Khusus & Catatan Belajar -->
<section class="flex flex-col gap-5 pt-3">
<div class="flex items-center gap-3 pb-3 border-b border-slate-100">
<div class="w-8 h-8 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center font-bold">
<span class="material-symbols-outlined text-[18px]">psychology</span>
</div>
<div>
<div class="flex items-center gap-2">
<h2 class="text-sm font-semibold text-slate-900 tracking-tight">4. Kebutuhan Khusus &amp; Catatan Belajar</h2>
<span class="text-[11px] font-medium text-slate-500 bg-slate-100 px-2 py-0.5 rounded-full">Opsional</span>
</div>
<p class="text-xs text-slate-500">Informasi kurikulum sekolah, gaya belajar, atau target pribadi siswa</p>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="text-xs font-medium text-slate-700" for="student_notes">
            Target Belajar &amp; Preferensi Pendampingan
          </label>
<textarea class="w-full p-3.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 placeholder:text-slate-400 focus:outline-none focus:border-blue-600 transition-colors" id="student_notes" placeholder="Jelaskan kebutuhan khusus, kesulitan belajar siswa, atau target kelulusan materi..." rows="3"></textarea>
</div>
<div class="p-3.5 rounded-xl bg-blue-50/50 border border-blue-100 flex items-start gap-3">
<div class="w-7 h-7 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[17px]">info</span>
</div>
<div class="flex flex-col gap-0.5">
<span class="text-xs font-bold text-slate-800">Catatan Integrasi Sistem One Private</span>
<p class="text-[11px] text-slate-600 leading-relaxed">
              Data siswa yang disimpan akan langsung terhubung secara real-time ke modul <strong>Jadwal Sesi Les</strong>, <strong>Presensi Pengajar</strong>, dan pencatatan saldo tagihan cabang secara terpusat.
            </p>
</div>
</div>
</section>
</form>
</div>
<!-- Sticky Bottom Action Footer Bar -->
<aside aria-label="Aksi Formulir" class="fixed bottom-0 left-[258px] right-0 bg-white/95 backdrop-blur-md border-t border-slate-200/80 px-8 py-3 shadow-lg flex items-center justify-between z-30">
<div class="flex items-center gap-2.5">
<div class="w-2.5 h-2.5 rounded-full bg-emerald-500"></div>
<div class="flex flex-col">
<span class="text-xs font-semibold text-slate-800 leading-tight">Status Formulir: Siap Disimpan</span>
<span class="text-[11px] text-slate-400 hidden sm:inline">Semua kolom wajib (Langkah 1–3) telah terisi valid.</span>
</div>
</div>
<div class="flex items-center gap-2.5">
<button class="h-9 px-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 text-xs font-semibold transition-colors cursor-pointer" type="button">
        Batal
      </button>
<button class="h-9 px-5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold flex items-center gap-1.5 shadow-sm shadow-blue-500/20 transition-all cursor-pointer" id="btn-save-trigger" type="button">
<span class="material-symbols-outlined text-[17px]">check_circle</span>
<span class="">Simpan Data Siswa</span>
</button>
</div>
</aside>
<!-- SUCCESS CONFIRMATION MODAL OVERLAY -->
<div class="fixed inset-0 bg-inverse-surface/40 backdrop-blur-sm z-50 flex items-center justify-center p-4 transition-opacity duration-300" id="success-modal"><div class="w-full bg-white rounded-2xl border border-slate-200/80 shadow-2xl p-6 sm:p-7 flex flex-col items-center text-center animate-in fade-in zoom-in-95 duration-200 max-w-lg">
<div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4 shadow-xs">
<span class="material-symbols-outlined text-[30px]">verified</span>
</div>
<h3 class="text-lg font-bold text-slate-900 tracking-tight mb-1.5">
        Data Siswa Berhasil Disimpan!
      </h3>
<p class="text-xs text-slate-500 max-w-sm mb-5 leading-normal">
        Profil siswa <strong>Aisyah Putri</strong> telah ditambahkan ke database cabang. Jadwal sesi dan status les kini aktif di sistem.
      </p>
<div class="w-full bg-slate-50/80 border border-slate-200/70 p-4 rounded-xl text-left flex flex-col gap-3 mb-5"><div class="flex items-center justify-between pb-2.5 border-b border-slate-200/60"><span class="text-[11px] text-slate-400 uppercase tracking-wider font-semibold">Ringkasan Pendaftaran Siswa</span><span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/50 text-[11px] font-semibold"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Aktif &amp; Terverifikasi</span></div><div class="grid grid-cols-2 gap-y-2.5 gap-x-4 text-xs"><div><span class="text-slate-400 text-[11px] block">Nama Siswa</span><span class="font-bold text-slate-800 text-xs">Aisyah Putri</span></div><div><span class="text-slate-400 text-[11px] block">Jenjang / Sekolah</span><span class="font-semibold text-slate-800 text-xs">Kelas 8 SMP · SMPN 115 Jakarta</span></div><div><span class="text-slate-400 text-[11px] block">Program Les</span><span class="font-semibold text-slate-800 text-xs">Mengaji &amp; Tahsin Al-Qur'an</span></div><div><span class="text-slate-400 text-[11px] block">Tutor Pendamping</span><span class="font-semibold text-slate-800 text-xs">Kak Rina M.Pd</span></div><div><span class="text-slate-400 text-[11px] block">Metode Belajar</span><span class="font-semibold text-slate-800 text-xs">Home Visit (Tebet, Jaksel)</span></div><div><span class="text-slate-400 text-[11px] block">Jadwal Rutin</span><span class="font-semibold text-slate-800 text-xs">Selasa &amp; Kamis (16:00–17:30)</span></div><div class="col-span-2 pt-2 border-t border-slate-200/50 flex items-center justify-between"><span class="text-slate-400 text-[11px]">Skema Pembayaran</span><span class="font-semibold text-blue-600 text-xs">Bulanan Otomatis (Rp 1.450.000 / 8 Sesi)</span></div></div></div>
<div class="w-full grid grid-cols-1 sm:grid-cols-2 gap-2.5">
<button class="w-full h-10 px-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 text-xs font-semibold transition-colors" id="btn-close-modal" type="button">
          Tambah Siswa Lagi
        </button>
<button class="w-full h-10 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold flex items-center justify-center gap-1.5 shadow-sm shadow-blue-500/20 transition-all" type="button">
<span class="">Lihat Detail Siswa</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</button>
</div>
</div></div>
<!-- Interactive script to control confirmation modal -->
<script>
    (function() {
      const modal = document.getElementById('success-modal');
      const saveBtn = document.getElementById('btn-save-trigger-off');
      const closeBtn = document.getElementById('btn-close-modal');

      if (saveBtn && modal) {
        saveBtn.addEventListener('click', () => {
          modal.classList.remove('hidden');
          modal.classList.add('flex');
        });
      }

      if (closeBtn && modal) {
        closeBtn.addEventListener('click', () => {
          modal.classList.add('hidden');
          modal.classList.remove('flex');
        });
      }
    })();
  </script>
</div></main></div>



<script src="{{ asset('js/opc.js') }}"></script><script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});
const LIST = {!! json_encode(route('admin.siswa')) !!};
const $ = id => document.getElementById(id);
function gradeLabel(){ const t=$('student_grade').selectedOptions[0].textContent.trim(); return t.replace(/\(.*?\)/g,'').replace(/\s*-\s*/g,' ').replace(/\s+/g,' ').trim(); }
function slotRows(){ return [...document.querySelectorAll('button[title="Hapus jadwal"]')].map(b=>b.parentElement.parentElement); }
function readSlot(r){ const t=[...r.querySelectorAll('span')].map(s=>s.textContent.trim()); const day=(t.find(x=>x.startsWith('Hari '))||'').replace('Hari ',''); const tm=(t.find(x=>/\d{2}:\d{2}/.test(x)&&x.includes('–'))||'').replace(' WIB','').split('–').map(x=>x.trim()); return {day:day,start:tm[0],end:tm[1]}; }
function renumber(){ slotRows().forEach((r,i)=>{ const n=[...r.querySelectorAll('div')].find(d=>d.children.length===0&&/^\d+$/.test(d.textContent.trim())); if(n) n.textContent=i+1; }); }
const rows0 = slotRows(); const tplRow = rows0.length ? rows0[0].cloneNode(true) : null;
function bindDelete(){ document.querySelectorAll('button[title="Hapus jadwal"]').forEach(b=>{ if(b._b) return; b._b=1; b.addEventListener('click',()=>{ if(slotRows().length<=1){OPC.toast('Minimal 1 sesi per minggu.',false);return;} b.parentElement.parentElement.remove(); renumber(); }); }); }
bindDelete();
OPC.find('Tambah Jadwal Hari',{exact:false}).forEach(btn=>btn.addEventListener('click',()=>{
  OPC.dialog({title:'Tambah Jadwal Hari',desc:'Slot mingguan berulang untuk siswa ini.',fields:[
    {name:'day',label:'Hari',type:'select',options:['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'].map(d=>({v:d,t:d}))},
    {name:'start',label:'Jam mulai',type:'time',value:'16:00'},{name:'end',label:'Jam selesai',type:'time',value:'17:30'}],
    submit:'Tambah',onSubmit:async v=>{ if(!tplRow) return; const r=tplRow.cloneNode(true); const sp=[...r.querySelectorAll('span')];
      const d=sp.find(x=>x.textContent.trim().startsWith('Hari ')); if(d) d.textContent='Hari '+v.day;
      const t=sp.find(x=>x.textContent.includes('–')); if(t) t.textContent=v.start+' – '+v.end+' WIB';
      slotRows()[slotRows().length-1].after(r); renumber(); bindDelete(); }});
}));
OPC.on('Batal', ()=>OPC.go(LIST));
OPC.on('+ Tambah Sesi Les', () => OPC.go({!! json_encode(route('admin.jadwal.baru')) !!}));
$('btn-save-trigger').addEventListener('click', async () => {
  const method = (document.querySelector('input[name=learning_method]:checked')||{}).value;
  const wa = $('parent_wa').value.replace(/\D/g,'').replace(/^0+/,'').replace(/^62/,'');
  const body = {
    name:$('student_name').value.trim(), grade:gradeLabel(), school:$('student_school').value.trim(),
    gender:$('student_gender').selectedOptions[0].textContent.trim(), birth_date:$('student_dob').value||null,
    guardian_name:$('parent_name').value.trim(), guardian_phone:wa?('0'+wa):'', method:method,
    address:$('home_address').value.trim(), program:$('study_program').selectedOptions[0].textContent.trim(),
    tutor_id:$('tutor_assigned').value, billing_scheme:(document.querySelector('input[name=billing_scheme]:checked')||{}).value,
    goals:$('student_notes').value.trim(), slots:slotRows().map(readSlot)
  };
  const btn=$('btn-save-trigger'); btn.disabled=true;
  try {
    const j = await OPC.post({!! json_encode(route('admin.siswa.simpan')) !!}, body);
    const s=j.student, m=$('success-modal');
    const strong=m.querySelector('p strong'); if(strong) strong.textContent=s.name;
    const set=(lab,val)=>{ const l=OPC.leaf(lab,m); if(l&&l.nextElementSibling) l.nextElementSibling.textContent=val; };
    set('Nama Siswa',s.name); set('Jenjang / Sekolah',s.grade+' · '+s.school); set('Program Les',s.program); set('Tutor Pendamping',s.tutor);
    set('Metode Belajar',s.method); set('Jadwal Rutin',s.schedule); set('Skema Pembayaran',s.billing);
    OPC.find('Lihat Detail Siswa',{sel:'button',exact:false}).forEach(b=>b.addEventListener('click',()=>OPC.go(s.url)));
    $('btn-close-modal').addEventListener('click',()=>location.href={!! json_encode(route('admin.siswa.baru')) !!});
    m.classList.remove('hidden'); m.classList.add('flex');
    if(j.message) OPC.toast(j.message,true);
  } catch(e) { btn.disabled=false; }
});
</script></body></html>