<!DOCTYPE html><html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}"><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta content="web_dashboard" name="shell-type"><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"><style>@@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={"darkMode":"class","theme":{"extend":{"colors":{"on-tertiary-container":"#f1eeff","surface-dim":"#d2d9f4","secondary-fixed-dim":"#6bd8cb","on-primary":"#ffffff","background":"#faf8ff","surface-container-high":"#e2e7ff","tertiary":"#3e3fcc","primary":"#004ac6","on-surface":"#131b2e","inverse-primary":"#b4c5ff","primary-fixed":"#dbe1ff","surface-container-highest":"#dae2fd","surface-container-low":"#f2f3ff","error":"#ba1a1a","on-error-container":"#93000a","on-primary-container":"#eeefff","surface-container-lowest":"#ffffff","surface":"#faf8ff","secondary-fixed":"#89f5e7","outline-variant":"#c3c6d7","surface-tint":"#0053db","surface-container":"#eaedff","primary-container":"#2563eb","on-surface-variant":"#434655","outline":"#737686","surface-bright":"#faf8ff","tertiary-container":"#585be6","on-secondary":"#ffffff","on-tertiary-fixed-variant":"#2f2ebe","inverse-surface":"#283044","secondary-container":"#86f2e4","error-container":"#ffdad6","on-secondary-fixed-variant":"#005049","surface-variant":"#dae2fd","on-secondary-container":"#006f66","on-primary-fixed":"#00174b","tertiary-fixed":"#e1e0ff","secondary":"#006a61","inverse-on-surface":"#eef0ff","on-background":"#131b2e","tertiary-fixed-dim":"#c0c1ff","primary-fixed-dim":"#b4c5ff","on-tertiary":"#ffffff","on-tertiary-fixed":"#07006c","on-secondary-fixed":"#00201d","on-error":"#ffffff","on-primary-fixed-variant":"#003ea8"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px"},"spacing":{"space-sm":"0.5rem","gutter-mobile":"1rem","space-lg":"1.5rem","space-md":"1rem","margin-mobile":"1rem","space-xl":"2rem","space-xs":"0.25rem","gutter":"1.5rem","margin":"2rem"},"fontFamily":{"label-md":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"label-lg":["Plus Jakarta Sans"],"body-md":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"display-lg-mobile":["Plus Jakarta Sans"],"headline-xl":["Plus Jakarta Sans"],"label-sm":["Plus Jakarta Sans"],"body-sm":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"]},"fontSize":{"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"display-lg":["40px",{"lineHeight":"48px","letterSpacing":"-0.02em","fontWeight":"700"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-md":["20px",{"lineHeight":"28px","fontWeight":"600"}],"headline-xl-mobile":["24px",{"lineHeight":"32px","letterSpacing":"-0.015em","fontWeight":"700"}],"headline-lg":["24px",{"lineHeight":"32px","letterSpacing":"-0.01em","fontWeight":"600"}],"display-lg-mobile":["30px",{"lineHeight":"38px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-xl":["32px",{"lineHeight":"40px","letterSpacing":"-0.015em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"26px","fontWeight":"600"}]}}}}</script></head><body class="bg-surface font-body-md text-on-surface"><aside class="fixed left-0 top-0 h-full w-[258px] bg-surface-container-lowest border-r border-outline-variant/40 z-50 flex flex-col justify-between py-5"><div class="flex flex-col"><div class="px-5 flex items-center gap-3 mb-6"><div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-on-primary text-[22px]">school</span></div><div class="flex flex-col min-w-0"><span class="font-label-lg text-label-lg text-primary-container font-bold truncate tracking-tight">One Private Course</span><span class="font-label-sm text-label-sm text-on-surface-variant font-medium truncate">Sistem Manajemen Bimbel</span></div></div><div class="px-5 mb-5"><button class="w-full h-10 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg rounded-lg flex items-center justify-center gap-2 transition-colors" type="button"><span class="material-symbols-outlined text-[18px]">add</span><span class="">Tambah Sesi Les</span></button></div><nav class="flex flex-col gap-1 px-3" data-active-classes="bg-surface-container-low text-primary-container font-semibold rounded-lg"><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="dashboard-ringkasan" href="{{ route('admin.dashboard') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">grid_view</span><span class="font-label-lg text-label-lg">Dashboard Ringkasan</span></div><span class="w-2 h-2 rounded-full bg-primary-container shrink-0"></span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="jadwal-dan-sesi-les" href="{{ route('admin.jadwal') }}"><span class="material-symbols-outlined text-[20px]">calendar_month</span><span class="font-label-lg text-label-lg">Jadwal &amp; Sesi Les</span></a><a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="database-siswa" href="{{ route('admin.siswa') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">group</span><span class="font-label-lg text-label-lg">Database Siswa</span></div><span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">{{ $nav['students'] }}</span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="tutor-dan-guru-pengajar" href="{{ route('admin.tutor') }}"><span class="material-symbols-outlined text-[20px]">person_apron</span><span class="font-label-lg text-label-lg">Tutor &amp; Guru Pengajar</span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="presensi-dan-laporan" href="{{ route('admin.presensi') }}"><span class="material-symbols-outlined text-[20px]">assignment_turned_in</span><span class="font-label-lg text-label-lg">Presensi &amp; Laporan</span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="pembayaran" href="{{ route('admin.pembayaran') }}"><span class="material-symbols-outlined text-[20px]">payments</span><span class="font-label-lg text-label-lg">Pembayaran</span></a><div class="border-t border-outline-variant/30 my-2 mx-1"></div><a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="konfirmasi-sesi" href="{{ route('admin.konfirmasi') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">pending_actions</span><span class="font-label-lg text-label-lg">Konfirmasi Sesi</span></div><span class="px-2 py-0.5 rounded-full bg-error-container text-error font-label-sm text-label-sm font-semibold">{{ $nav['confirm'] }}</span></a></nav></div><div class="px-5 pt-3"><div class="p-3 bg-surface-container-low rounded-lg flex items-center gap-3"><span class="material-symbols-outlined text-primary-container text-[20px]">support_agent</span><div class="flex flex-col"><span class="font-label-sm text-label-sm font-semibold text-on-surface">Bantuan Cabang</span><span class="font-body-sm text-[11px] text-on-surface-variant">v2.4 LTS</span></div></div></div></aside><div class="pl-[258px]"><header class="fixed top-0 left-[258px] right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md border-b border-outline-variant/40 z-40 flex items-center justify-between px-8"><div class="flex items-center gap-2 font-label-lg text-label-lg"><span class="text-on-surface-variant">Operasional Cabang</span><span class="text-outline-variant">/</span><span class="text-on-surface font-semibold">Dashboard Ringkasan</span></div><div class="flex items-center gap-4"><div class="text-right flex flex-col"><span class="font-label-md text-label-md font-semibold text-on-surface">{{ auth()->user()->name }}</span><span class="font-body-sm text-[11px] text-on-surface-variant">Admin Cabang</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 bg-surface min-h-screen p-8"><div class="flex flex-col w-full">
<!-- Top Navigation & Action Context -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
<div class="flex items-center gap-3">
<a class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-surface-container-lowest text-on-surface-variant hover:text-primary-container hover:bg-surface-container transition-all shadow-sm" href="{{ route('admin.siswa') }}" title="Kembali ke Database Siswa">
<span class="material-symbols-outlined text-[20px]">arrow_back</span>
</a>
<div class="flex flex-col">
<div class="flex items-center gap-2 font-label-md text-label-md text-on-surface-variant">
<span class="">Operasional Cabang</span>
<span class="">/</span>
<a class="hover:text-primary-container transition-colors" href="{{ route('admin.siswa') }}">Database Siswa</a>
<span class="">/</span>
<span class="text-on-surface font-semibold">Detail Siswa - {{ $student->name }}</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">ID Terdaftar: #{{ $student->code }} • Cabang {{ auth()->user()->branch ?? "Tebet" }}</span>
</div>
</div>
<div class="flex items-center gap-3">
<button class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-surface-container-lowest text-on-surface font-label-md text-label-md hover:bg-surface-container-low transition-colors shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px]">print</span>
<span class="">Cetak Biodata</span>
</button>
<button class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-primary-container hover:bg-primary text-on-primary font-label-md text-label-md transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px]">add_circle</span>
<span class="">Tambah Jadwal Sesi</span>
</button>
</div>
</div>
<!-- Profil Siswa Card -->
<div class="bg-surface-container-lowest rounded-2xl p-6 sm:p-8 shadow-sm relative overflow-hidden mb-8">
<div class="absolute -top-16 -right-16 w-64 h-64 bg-primary-fixed/30 rounded-full blur-3xl pointer-events-none"></div>
<div class="absolute top-1/2 -left-12 w-48 h-48 bg-secondary-fixed/20 rounded-full blur-2xl pointer-events-none"></div>
<div class="relative flex flex-col lg:flex-row lg:items-center justify-between gap-6">
<div class="flex flex-col sm:flex-row items-start sm:items-center gap-5">
<div class="relative shrink-0">
<div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl bg-gradient-to-br from-primary-container to-primary flex items-center justify-center text-on-primary font-headline-xl text-headline-xl shadow-md tracking-wider"> {{ \App\Support\Fmt::initials($student->name) }} </div>
<div class="absolute -bottom-1 -right-1 w-6 h-6 rounded-full bg-surface-container-lowest flex items-center justify-center p-0.5 shadow-sm">
<span class="w-full h-full rounded-full bg-secondary flex items-center justify-center text-on-secondary">
<span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">check</span>
</span>
</div>
</div>
<div class="flex flex-col gap-1.5 min-w-0">
<div class="flex flex-wrap items-center gap-3">
<h1 class="font-headline-xl text-headline-xl text-on-surface font-bold tracking-tight">{{ $student->name }}</h1>
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary-container/40 text-on-secondary-container font-label-md text-label-md font-semibold">
<span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span> {{ $student->status === 'aktif' ? 'Siswa Aktif' : 'Siswa Nonaktif' }} </span>
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-lg bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">{{ \App\Support\Fmt::methodIcon($student->method) }}</span> {{ \App\Support\Fmt::method($student->method) }} </span>
</div>
<div class="flex flex-wrap items-center gap-y-1 gap-x-3 text-on-surface-variant font-body-md text-body-md">
<span class="font-semibold text-primary-container">{{ $student->grade }}</span>
<span class="text-outline-variant font-light">•</span>
<span class="flex items-center gap-1 text-on-surface">
<span class="material-symbols-outlined text-[18px] text-outline">school</span> {{ $student->school }} </span>
<span class="text-outline-variant font-light">•</span>
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface-variant">
<span class="material-symbols-outlined text-[14px]">tag</span> #{{ $student->code }} </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-1 mt-0.5">
            Tergabung sejak {{ \App\Support\Fmt::dateLong($student->joined_at ?? $student->created_at) }} • Program {{ $student->program }}
          </p>
</div>
</div>
<!-- Action Buttons -->
<div class="flex items-center gap-2 self-start lg:self-center shrink-0">
<button class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-primary-container hover:bg-primary text-on-primary font-label-md text-label-md font-semibold transition-all shadow-sm" type="button"><span class="material-symbols-outlined text-[18px]">edit</span><span class="">Ubah Data</span></button>
<button class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-primary-container hover:bg-primary text-on-primary font-label-md text-label-md font-semibold transition-all shadow-sm" type="button"><span class="material-symbols-outlined text-[18px]">edit</span><span class="">Ubah Data</span></button>
</div>
</div>
</div>
<!-- Horizontal Tab Navigation -->
<div class="flex items-center justify-between mb-8 overflow-x-auto pb-1">
<div class="flex items-center gap-2 bg-surface-container-lowest p-1.5 rounded-2xl shadow-sm">
<button class="relative px-5 py-2.5 rounded-xl font-label-lg text-label-lg font-bold text-on-primary bg-primary-container shadow-sm flex items-center gap-2" type="button">
<span class="material-symbols-outlined text-[18px]">badge</span>
<span class="">Profil Siswa</span>
</button>
<button class="px-5 py-2.5 rounded-xl font-label-lg text-label-lg font-semibold text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low transition-colors flex items-center gap-2" type="button">
<span class="material-symbols-outlined text-[18px]">calendar_month</span>
<span class="">Jadwal &amp; Sesi Les</span>
</button>
<button class="px-5 py-2.5 rounded-xl font-label-lg text-label-lg font-semibold text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low transition-colors flex items-center gap-2" type="button">
<span class="material-symbols-outlined text-[18px]">assignment_turned_in</span>
<span class="">Presensi &amp; Laporan</span>
<span class="px-1.5 py-0.2 rounded-md bg-secondary-container text-on-secondary-container font-label-sm text-[10px]">{{ $st['attTotal'] }}</span>
</button>
<button class="px-5 py-2.5 rounded-xl font-label-lg text-label-lg font-semibold text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low transition-colors flex items-center gap-2" type="button">
<span class="material-symbols-outlined text-[18px]">receipt_long</span>
<span class="">Riwayat Pembayaran</span>
</button>
</div>
<div class="hidden xl:flex items-center gap-2 text-on-surface-variant font-label-sm text-label-sm bg-surface-container-low px-3 py-1.5 rounded-xl">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span class="">Sinkronisasi sistem: 10 menit lalu</span>
</div>
</div>
<!-- Tab Content (Grid Layout) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
<!-- Kolom Kiri / Utama (8 Kolom) -->
<div class="lg:col-span-8 flex flex-col gap-6">
<!-- Baris 1: 2 Kolom Informasi (Kontak Wali & Akademik) -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- Kartu Informasi Kontak & Wali -->
<div class="bg-surface-container-lowest rounded-2xl p-6 shadow-sm flex flex-col justify-between relative overflow-hidden group">
<div class="absolute top-0 left-0 w-1.5 h-full bg-primary-container"></div>
<div>
<div class="flex items-center justify-between mb-4">
<span class="font-label-md text-label-md uppercase tracking-wider text-primary-container font-bold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[18px]">family_restroom</span>
                Informasi Kontak Wali
              </span>
<span class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-semibold">{{ $student->guardian_relation ?? "Wali" }}</span>
</div>
<div class="space-y-4">
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Nama Orang Tua / Wali</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold block">{{ $student->guardian_name }}</span>
</div>
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Nomor WhatsApp Aktif</span>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-secondary">phone_iphone</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-semibold tracking-wide">{{ $student->guardian_phone }}</span>
</div>
</div>
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Lokasi Sesi Belajar (Home Visit)</span>
<div class="p-3 rounded-xl bg-surface-container-low flex items-start gap-2.5">
<span class="material-symbols-outlined text-[20px] text-primary-container shrink-0 mt-0.5">place</span>
<div class="flex flex-col">
<span class="font-body-md text-body-md text-on-surface font-semibold leading-snug">
                      {{ $student->address ?: "-" }}
                    </span>
<span class="font-body-sm text-body-sm text-on-surface-variant">{{ $student->area }}</span>
</div>
</div>
</div>
</div>
</div>
<div class="mt-6 pt-4 flex gap-2">
<a class="w-full h-10 px-4 rounded-xl bg-secondary text-on-secondary hover:bg-secondary/90 transition-all text-label-md font-semibold flex items-center justify-center gap-2 shadow-sm" href="{{ \App\Support\Fmt::waLink($student->guardian_phone) }}" rel="noopener noreferrer" target="_blank"><span class="material-symbols-outlined text-[18px]">chat</span><span class="">Hubungi via WhatsApp</span></a>
</div>
</div>
<!-- Kartu Akademik & Program -->
<div class="bg-surface-container-lowest rounded-2xl p-6 shadow-sm flex flex-col justify-between relative overflow-hidden">
<div class="absolute top-0 left-0 w-1.5 h-full bg-secondary"></div>
<div>
<div class="flex items-center justify-between mb-4">
<span class="font-label-md text-label-md uppercase tracking-wider text-secondary font-bold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[18px]">auto_stories</span>
                Akademik &amp; Program
              </span>
<span class="px-2 py-0.5 rounded-full bg-secondary-container/40 text-on-secondary-container font-label-sm text-label-sm font-semibold">{{ $student->package ? "Reguler" : "Reguler" }}</span>
</div>
<div class="space-y-4">
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Mata Pelajaran &amp; Paket</span>
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">{{ $student->program }}</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">{{ $student->package }}</span>
</div>
<div class="p-3 rounded-xl bg-surface-container-low flex items-center gap-3">
<div class="w-11 h-11 rounded-xl bg-primary-fixed flex items-center justify-center text-primary-container shrink-0 font-bold font-label-lg text-label-lg"> {{ \App\Support\Fmt::initials($student->tutor->name ?? "-") }} </div>
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-[11px] text-on-surface-variant uppercase font-semibold">Tutor Pendamping</span>
<span class="font-label-lg text-label-lg text-on-surface font-bold truncate">{{ $student->tutor->name ?? "-" }}</span>
<span class="font-body-sm text-[12px] text-secondary font-medium">{{ $student->tutor->headline ?? "-" }}</span>
</div>
</div>
<div class="grid grid-cols-2 gap-3 pt-1">
<div class="p-2.5 rounded-xl bg-surface-container-low flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant mb-1">Jadwal Rutin</span>
<span class="font-label-md text-label-md text-on-surface font-bold">{{ $st['days'] }}</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">{{ $st['time'] }}</span>
</div>
<div class="p-2.5 rounded-xl bg-surface-container-low flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant mb-1">Metode Billing</span>
<span class="font-label-md text-label-md text-on-surface font-bold">{{ $student->billing_scheme === 'monthly' ? 'Bulanan (Monthly)' : 'Per Sesi' }}</span>
<span class="font-body-sm text-[12px] text-secondary font-medium">{{ $student->billing_scheme === 'monthly' ? 'Auto-invoice tgl 1' : 'Tagih per pertemuan' }}</span>
</div>
</div>
</div>
</div>
<div class="mt-6 pt-4 flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<span class="">Durasi Sesi: {{ $student->duration }} Menit</span>
<span class="text-primary-container font-semibold">{{ $student->billing_scheme === 'monthly' ? '8 Pertemuan / Bulan' : 'Sesuai kehadiran' }}</span>
</div>
</div>
</div>
<!-- Kartu Kebutuhan Khusus & Target Belajar -->
<div class="bg-surface-container-lowest rounded-2xl p-6 sm:p-8 shadow-sm relative overflow-hidden">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-tertiary-fixed flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-[22px]">flag</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Target Belajar &amp; Catatan Khusus</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Panduan pendekatan pedagogik khusus siswa bimbingan</p>
</div>
</div>
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-high text-on-surface font-label-md text-label-md font-semibold self-start sm:self-auto">
<span class="material-symbols-outlined text-[16px] text-primary-container">psychology</span>
            Rekomendasi Tutor
          </span>
</div>
<!-- Deskripsi Karakteristik & Catatan Khusus -->
<div class="p-4 rounded-xl bg-surface-container-low mb-6">
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary-container text-[20px] shrink-0 mt-0.5">tips_and_updates</span>
<div class="flex flex-col gap-1">
<span class="font-label-md text-label-md font-bold text-on-surface">Observasi Perilaku &amp; Strategi Pendekatan:</span>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                "{{ $student->goals ?: "Belum ada catatan khusus." }}"
              </p>
</div>
</div>
</div>
<!-- Target Milestone & Progress Ring -->
<div class="p-5 rounded-xl bg-surface-container-low/70 flex flex-col gap-4">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
<div>
<span class="font-label-lg text-label-lg font-bold text-on-surface">Target {{ $student->program }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">Periode {{ \App\Support\Fmt::period() }}</span>
</div>
<div class="flex items-center gap-2 self-start sm:self-auto">
<span class="font-headline-md text-headline-md font-bold text-primary-container">{{ $st['progress'] }}%</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Tercapai</span>
</div>
</div>
<!-- Progress Bar tipis -->
<div class="w-full bg-surface-container-high h-2.5 rounded-full overflow-hidden relative">
<div class="bg-gradient-to-r from-primary-container to-secondary h-full rounded-full transition-all duration-500" style="width: {{ $st['progress'] }}%"></div>
</div>
<div class="flex flex-wrap items-center justify-between text-on-surface-variant font-label-sm text-label-sm pt-1">
<div class="flex items-center gap-2">
<span class="inline-flex items-center gap-1 text-secondary font-semibold">
<span class="material-symbols-outlined text-[16px]">task_alt</span>
                {{ $st['done'] }} dari {{ $st['monthTotal'] }} Sesi Terlaksana
              </span>
<span class="">•</span>
<span class="">Sisa {{ max(0, $st['monthTotal'] - $st['done']) }} Sesi</span>
</div>
<span class="text-on-surface font-medium">Target selesai: {{ \App\Support\Fmt::dateLong(now()->endOfMonth()) }}</span>
</div>
</div>
<!-- Quick Sub-Milestones Badges -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mt-4">
<div class="p-3 rounded-xl bg-surface-container-lowest flex items-center gap-2.5 shadow-sm">
<span class="material-symbols-outlined text-secondary text-[20px]">verified</span>
<div class="flex flex-col">
<span class="font-label-sm text-[11px] text-on-surface-variant">Tingkat Kehadiran</span>
<span class="font-label-md text-label-md font-bold text-on-surface">{{ $st['attPct'] }}%</span>
</div>
</div>
<div class="p-3 rounded-xl bg-surface-container-lowest flex items-center gap-2.5 shadow-sm">
<span class="material-symbols-outlined text-secondary text-[20px]">verified</span>
<div class="flex flex-col">
<span class="font-label-sm text-[11px] text-on-surface-variant">Rata-rata Pemahaman</span>
<span class="font-label-md text-label-md font-bold text-on-surface">{{ $st['avgUnd'] }} / 5</span>
</div>
</div>
<div class="p-3 rounded-xl bg-surface-container-lowest flex items-center gap-2.5 shadow-sm">
<span class="material-symbols-outlined text-tertiary-container text-[20px]">hourglass_top</span>
<div class="flex flex-col">
<span class="font-label-sm text-[11px] text-on-surface-variant">Status Les</span>
<span class="font-label-md text-label-md font-bold text-on-surface">{{ $student->status === 'aktif' ? 'Aktif' : 'Nonaktif' }}</span>
</div>
</div>
</div>
</div>
</div>
<!-- Kolom Kanan (Ringkasan Metrik Sesi & Status Periode Ini - 4 Kolom) -->
<div class="lg:col-span-4 flex flex-col gap-6">
<!-- Kartu Ringkasan Akademik Periode Ini -->
<div class="bg-surface-container-lowest rounded-2xl p-6 shadow-sm flex flex-col gap-6 relative overflow-hidden">
<div class="flex items-center justify-between pb-2">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-primary-container text-[22px]">monitoring</span>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Ringkasan Sesi</h3>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant px-2.5 py-1 rounded-lg bg-surface-container">{{ mb_substr(\App\Support\Fmt::period(), 0, 3) }} {{ now()->year }}</span>
</div>
<!-- Metric Block 1: Total Pertemuan -->
<div class="p-4 rounded-xl bg-surface-container-low flex items-center justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant">Total Sesi Bulan Ini</span>
<span class="font-headline-md text-headline-md font-bold text-on-surface mt-0.5">{{ $st['monthTotal'] }} Sesi Terjadwal</span>
<div class="flex items-center gap-2 mt-1">
<span class="font-label-sm text-[11px] font-semibold text-secondary">{{ $st['done'] }} Selesai</span>
<span class="text-outline-variant">•</span>
<span class="font-label-sm text-[11px] font-medium text-primary-container">{{ max(0, $st['monthTotal'] - $st['done']) }} Mendatang</span>
</div>
</div>
<!-- Radial Mini Visualizer SVG -->
<div class="relative w-14 h-14 flex items-center justify-center">
<svg class="w-14 h-14 transform -rotate-90" viewBox="0 0 36 36">
<path class="text-surface-container-high" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5"></path>
<path class="text-primary-container" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="{{ $st['progress'] }}, 100" stroke-linecap="round" stroke-width="3.5"></path>
</svg>
<span class="absolute font-label-sm text-[11px] font-bold text-on-surface">{{ $st['done'] }}/{{ $st['monthTotal'] }}</span>
</div>
</div>
<!-- Metric Block 2: Tingkat Kehadiran -->
<div class="p-4 rounded-xl bg-surface-container-low flex items-center justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant">Tingkat Kehadiran Siswa</span>
<span class="font-headline-md text-headline-md font-bold text-secondary mt-0.5">{{ $st['attPct'] }}%</span>
<span class="font-body-sm text-[12px] text-on-surface-variant mt-1">{{ $st['attPct'] >= 100 ? 'Semua sesi hadir tanpa izin/alfa' : 'Ada sesi izin / sakit / belum diisi' }}</span>
</div>
<div class="w-11 h-11 rounded-xl bg-secondary-container/50 text-secondary flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">event_available</span>
</div>
</div>
<!-- Metric Block 3: Billing & Status Pembayaran -->
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">Status Pembayaran ({{ \App\Support\Fmt::period() }})</span>
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[14px]">check_circle</span> {{ ($st['pay']->status ?? 'belum') === 'lunas' ? 'Lunas / Terbayar' : 'Belum Dibayar' }} </span>
</div>
<div class="flex items-baseline justify-between pt-1">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">{{ \App\Support\Fmt::rupiah($st['pay']->amount ?? $student->price) }}</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">Ref: #{{ $st['pay']->invoice_no ?? '-' }}</span>
</div>
</div>
<!-- Catatan Sesi Terakhir -->
<div class="p-4 rounded-xl bg-surface-container-low/70 flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm font-bold text-on-surface flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary-container">rate_review</span>
              Catatan Sesi Terakhir
            </span>
<span class="font-label-sm text-[11px] text-on-surface-variant">{{ $st['last'] ? \App\Support\Fmt::dateShort($st['last']->session->date) : '-' }}</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-snug">
            "{{ $st['last'] ? ($st['last']->journal ?: 'Belum ada jurnal.') : 'Belum ada catatan sesi.' }}"
          </p>
<div class="flex items-center gap-2 pt-1">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span class="font-label-sm text-[11px] text-on-surface-variant">Pemahaman: {{ $st['last']->understanding ?? '-' }} / 5</span>
</div>
</div>
<!-- Quick Action Buttons -->
<div class="flex flex-col gap-2.5 pt-2">
<button class="w-full h-11 px-4 rounded-xl bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg font-semibold transition-all shadow-sm flex items-center justify-center gap-2" type="button">
<span class="material-symbols-outlined text-[18px]">fact_check</span>
<span class="">Lihat Seluruh Presensi</span>
</button>
<button class="w-full h-11 px-4 rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface font-label-lg text-label-lg font-semibold transition-colors flex items-center justify-center gap-2" type="button">
<span class="material-symbols-outlined text-[18px] text-secondary">add_card</span>
<span class="">Catat Pembayaran Baru</span>
</button>
</div>
</div>
<!-- Quick Info / Tutor Contact Widget -->
<div class="bg-surface-container-lowest rounded-2xl p-5 shadow-sm flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary-container">
<span class="material-symbols-outlined text-[20px]">support</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md font-bold text-on-surface">Pusat Bantuan Sesi</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">Koordinasi jadwal &amp; tutor pengganti</span>
</div>
</div>
<button class="p-2 rounded-lg hover:bg-surface-container-low text-on-surface-variant transition-colors" title="Buka panduan" type="button">
<span class="material-symbols-outlined text-[20px]">chevron_right</span>
</button>
</div>
</div>
</div>
</div></main></div>

<script src="{{ asset('js/opc.js') }}"></script><script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});
const sid = {{ $student->id }};
OPC.on('Cetak Biodata', () => window.print());
OPC.on('Tambah Jadwal Sesi', () => OPC.go({!! json_encode(route('admin.jadwal.baru')) !!} + '?student=' + sid));
OPC.on('Ubah Data', () => OPC.go({!! json_encode(route('admin.siswa.ubah', $student)) !!}));
OPC.on('Jadwal & Sesi Les', () => OPC.go({!! json_encode(route('admin.jadwal')) !!} + '?student=' + sid), {sel:'button'});
OPC.on('Presensi & Laporan', () => OPC.go({!! json_encode(route('admin.presensi')) !!} + '?student=' + sid), {sel:'button', exact:false});
OPC.on('Riwayat Pembayaran', () => OPC.go({!! json_encode(route('admin.pembayaran')) !!} + '?student=' + sid), {sel:'button'});
OPC.on('Lihat Seluruh Presensi', () => OPC.go({!! json_encode(route('admin.presensi')) !!} + '?student=' + sid));
OPC.on('Catat Pembayaran Baru', () => OPC.go({!! json_encode(route('admin.pembayaran')) !!} + '?student=' + sid + '&catat=1'));
OPC.on('Pusat Bantuan Sesi', () => window.open('https://wa.me/6281198760001','_blank'), {sel:'div', exact:false});
document.querySelectorAll('button[title="Buka panduan"]').forEach(b => b.addEventListener('click', () => window.open('https://wa.me/6281198760001','_blank')));
</script></body></html>