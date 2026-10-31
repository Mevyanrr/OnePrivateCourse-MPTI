<!DOCTYPE html><html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}"><meta charset="utf-8"><title>Tutor &amp; Guru Pengajar - One Private Course</title><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta content="web_dashboard" name="shell-type"><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"><style>@@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={"darkMode":"class","theme":{"extend":{"colors":{"on-primary-fixed-variant":"#003ea8","surface-container-highest":"#dae2fd","on-primary-container":"#eeefff","on-tertiary":"#ffffff","on-tertiary-container":"#f1eeff","primary-fixed-dim":"#b4c5ff","surface-container-lowest":"#ffffff","surface-container":"#eaedff","surface-dim":"#d2d9f4","tertiary":"#3e3fcc","secondary-fixed-dim":"#6bd8cb","inverse-primary":"#b4c5ff","on-primary-fixed":"#00174b","on-secondary":"#ffffff","background":"#faf8ff","on-background":"#131b2e","primary":"#004ac6","error":"#ba1a1a","on-tertiary-fixed-variant":"#2f2ebe","surface":"#faf8ff","tertiary-fixed":"#e1e0ff","on-surface-variant":"#434655","error-container":"#ffdad6","on-secondary-fixed":"#00201d","on-surface":"#131b2e","on-error-container":"#93000a","secondary":"#006a61","surface-container-low":"#f2f3ff","surface-bright":"#faf8ff","on-primary":"#ffffff","surface-container-high":"#e2e7ff","surface-variant":"#dae2fd","inverse-surface":"#283044","outline":"#737686","surface-tint":"#0053db","on-secondary-fixed-variant":"#005049","inverse-on-surface":"#eef0ff","on-secondary-container":"#006f66","tertiary-fixed-dim":"#c0c1ff","tertiary-container":"#585be6","outline-variant":"#c3c6d7","secondary-fixed":"#89f5e7","primary-fixed":"#dbe1ff","primary-container":"#2563eb","secondary-container":"#86f2e4","on-error":"#ffffff","on-tertiary-fixed":"#07006c"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px"},"spacing":{"space-xl":"2rem","gutter-mobile":"1rem","margin-mobile":"1rem","gutter":"1.5rem","space-xs":"0.25rem","space-sm":"0.5rem","space-md":"1rem","space-lg":"1.5rem","margin":"2rem"},"fontFamily":{"headline-xl":["Plus Jakarta Sans"],"label-lg":["Plus Jakarta Sans"],"body-md":["Plus Jakarta Sans"],"label-sm":["Plus Jakarta Sans"],"label-md":["Plus Jakarta Sans"],"body-sm":["Plus Jakarta Sans"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"],"display-lg-mobile":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"]},"fontSize":{"headline-xl":["32px",{"lineHeight":"40px","letterSpacing":"-0.015em","fontWeight":"700"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-xl-mobile":["24px",{"lineHeight":"32px","letterSpacing":"-0.015em","fontWeight":"700"}],"headline-sm":["18px",{"lineHeight":"26px","fontWeight":"600"}],"display-lg-mobile":["30px",{"lineHeight":"38px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-lg":["24px",{"lineHeight":"32px","letterSpacing":"-0.01em","fontWeight":"600"}],"display-lg":["40px",{"lineHeight":"48px","letterSpacing":"-0.02em","fontWeight":"700"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"headline-md":["20px",{"lineHeight":"28px","fontWeight":"600"}]}}}}</script></head><body class="bg-surface font-body-md text-on-surface"><aside class="fixed left-0 top-0 h-full w-[258px] bg-surface-container-lowest border-r border-outline-variant/40 z-50 flex flex-col justify-between py-5"><div class="flex flex-col"><div class="px-5 flex items-center gap-3 mb-6"><div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-on-primary text-[22px]">school</span></div><div class="flex flex-col min-w-0"><span class="font-label-lg text-label-lg text-primary-container font-bold truncate tracking-tight">One Private Course</span><span class="font-label-sm text-label-sm text-on-surface-variant font-medium truncate">Sistem Manajemen Bimbel</span></div></div><div class="px-5 mb-5"><button class="w-full h-10 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg rounded-lg flex items-center justify-center gap-2 transition-colors shadow-sm" type="button"><span class="material-symbols-outlined text-[18px]">add</span><span class="">Tambah Sesi Les</span></button></div><nav class="flex flex-col gap-1 px-3" data-active-classes="bg-surface-container-low text-primary-container font-semibold rounded-lg"><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="dashboard-ringkasan" href="{{ route('admin.dashboard') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">grid_view</span><span class="font-label-lg text-label-lg">Dashboard Ringkasan</span></div></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="jadwal-dan-sesi-les" href="{{ route('admin.jadwal') }}"><span class="material-symbols-outlined text-[20px]">calendar_month</span><span class="font-label-lg text-label-lg">Jadwal &amp; Sesi Les</span></a><a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="database-siswa" href="{{ route('admin.siswa') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">group</span><span class="font-label-lg text-label-lg">Database Siswa</span></div><span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm">{{ $nav['students'] }}</span></a><a class="flex items-center justify-between px-3 py-2.5 rounded-lg bg-surface-container-low text-primary-container font-semibold transition-colors" data-path="tutor-dan-guru-pengajar" href="{{ route('admin.tutor') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px] text-primary-container">person_apron</span><span class="font-label-lg text-label-lg">Tutor &amp; Guru Pengajar</span></div><span class="w-2 h-2 rounded-full bg-primary-container shrink-0"></span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="presensi-dan-laporan" href="{{ route('admin.presensi') }}"><span class="material-symbols-outlined text-[20px]">assignment_turned_in</span><span class="font-label-lg text-label-lg">Presensi &amp; Laporan</span></a><a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="pembayaran" href="{{ route('admin.pembayaran') }}"><span class="material-symbols-outlined text-[20px]">payments</span><span class="font-label-lg text-label-lg">Pembayaran</span></a><div class="border-t border-outline-variant/30 my-2 mx-1"></div><a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" data-path="konfirmasi-sesi" href="{{ route('admin.konfirmasi') }}"><div class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">pending_actions</span><span class="font-label-lg text-label-lg">Konfirmasi Sesi</span></div><span class="px-2 py-0.5 rounded-full bg-error-container text-error font-label-sm text-label-sm font-semibold">{{ $nav['confirm'] }}</span></a></nav></div><div class="px-5 pt-3"><div class="p-3 bg-surface-container-low rounded-lg flex items-center gap-3"><span class="material-symbols-outlined text-primary-container text-[20px]">support_agent</span><div class="flex flex-col"><span class="font-label-sm text-label-sm font-semibold text-on-surface">Bantuan Cabang</span><span class="font-body-sm text-[11px] text-on-surface-variant">v2.4 LTS</span></div></div></div></aside><div class="pl-[258px]"><header class="fixed top-0 left-[258px] right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md border-b border-outline-variant/40 z-40 flex items-center justify-between px-8"><div class="flex items-center gap-2 font-label-lg text-label-lg"><span class="text-slate-500 font-medium text-xs">Operasional Cabang</span><span class="text-slate-300 text-xs">/</span><span class="text-slate-800 font-semibold text-xs">Tutor &amp; Guru Pengajar</span></div><div class="flex items-center gap-4"><div class="text-right flex flex-col"><span class="font-label-md text-label-md font-semibold text-on-surface">{{ auth()->user()->name }}</span><span class="font-body-sm text-[11px] text-on-surface-variant">Admin Cabang</span></div><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></header><main class="relative pt-16 bg-surface min-h-screen p-8"><div class="flex flex-col w-full">

@php
    $subjectOptions = $tutors->flatMap(fn ($t) => $t->subject_list)->unique()->sort()->values();
    $avgLabel = $stats['avg_load'] < 50 ? 'Longgar' : ($stats['avg_load'] <= 85 ? 'Ideal' : 'Padat');
    $palette = [
        'tersedia' => ['avatar' => 'bg-blue-600',   'badge' => 'bg-emerald-50 border-emerald-200 text-emerald-700', 'dot' => 'bg-emerald-500', 'bar' => 'bg-blue-600',  'txt' => 'text-blue-600',  'hover' => 'hover:border-blue-400'],
        'terbatas' => ['avatar' => 'bg-indigo-600', 'badge' => 'bg-amber-50 border-amber-200 text-amber-700',       'dot' => 'bg-amber-500',   'bar' => 'bg-amber-500', 'txt' => 'text-amber-700', 'hover' => 'hover:border-amber-400'],
        'penuh'    => ['avatar' => 'bg-teal-700',   'badge' => 'bg-rose-50 border-rose-200 text-rose-700',          'dot' => 'bg-rose-500',    'bar' => 'bg-rose-500',  'txt' => 'text-rose-600',  'hover' => 'hover:border-rose-300'],
    ];
@endphp

<!-- Judul halaman -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
  <div class="flex flex-col gap-1">
    <div class="flex items-center gap-2 text-xs font-medium text-slate-500"><span>Operasional Cabang</span><span class="text-slate-300">/</span><span>Database Pengajar</span><span class="text-slate-300">/</span><span class="text-blue-600 font-semibold">Tutor &amp; Guru Pengajar</span></div>
    <div class="flex items-center gap-3 mt-0.5">
      <h1 class="text-2xl font-bold tracking-tight text-slate-900">Tutor &amp; Guru Pengajar</h1>
      <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span><span>{{ $stats['active'] }} Tutor Aktif</span></div>
    </div>
    <p class="text-xs text-slate-500 mt-0.5">Kelola data tutor, bidang ajar, beban mengajar, dan siswa bimbingan cabang. Tutor tidak memiliki akun login; jadwal dan presensi dikelola admin.</p>
  </div>
  <div class="flex items-center gap-2.5 shrink-0">
    <button class="h-9 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold flex items-center gap-1.5 transition-colors shadow-sm" onclick="openTutorForm()" type="button"><span class="material-symbols-outlined text-[18px]">add</span><span>Tambah Tutor</span></button>
  </div>
</div>

<!-- Ringkasan -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
  <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80">
    <div class="flex items-center justify-between mb-3"><span class="text-sm font-semibold text-slate-800">Total Tutor Terdaftar</span><div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center"><span class="material-symbols-outlined text-[20px]">groups</span></div></div>
    <div class="flex items-baseline gap-2"><span class="text-2xl font-bold text-slate-900">{{ $stats['total'] }}</span><span class="text-xs text-emerald-600 font-semibold">Tutor</span></div>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-slate-500"><span class="w-2 h-2 rounded-full bg-emerald-500"></span><span><strong class="font-semibold text-slate-800">{{ $stats['active'] }} Aktif</strong> mengajar</span></div>
  </div>
  <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80">
    <div class="flex items-center justify-between mb-3"><span class="text-sm font-semibold text-slate-800">Tutor Siap Ajar</span><div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center"><span class="material-symbols-outlined text-[20px]">event_available</span></div></div>
    <div class="flex items-baseline gap-2"><span class="text-2xl font-bold text-slate-900">{{ $stats['ready'] }}</span><span class="text-xs text-emerald-700 bg-emerald-50 border border-emerald-200 px-2 py-0.5 rounded-full font-semibold">Tersedia</span></div>
    <p class="mt-1.5 text-xs text-slate-500">Masih punya <span class="font-semibold text-slate-800">3+ slot</span> pekan ini</p>
  </div>
  <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80">
    <div class="flex items-center justify-between mb-3"><span class="text-sm font-semibold text-slate-800">Rata-rata Beban Ajar</span><div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center"><span class="material-symbols-outlined text-[20px]">speed</span></div></div>
    <div class="flex items-baseline gap-2"><span class="text-2xl font-bold text-slate-900">{{ $stats['avg_load'] }}%</span><span class="text-xs text-slate-700 bg-slate-50 border border-slate-200 px-2 py-0.5 rounded-full font-semibold">{{ $avgLabel }}</span></div>
    <div class="w-full bg-slate-100 rounded-full h-1.5 mt-2.5 overflow-hidden"><div class="bg-blue-600 h-1.5 rounded-full" style="width: {{ min(100, $stats['avg_load']) }}%;"></div></div>
  </div>
  <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80">
    <div class="flex items-center justify-between mb-3"><span class="text-sm font-semibold text-slate-800">Total Siswa Terbina</span><div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center"><span class="material-symbols-outlined text-[20px]">school</span></div></div>
    <div class="flex items-baseline gap-2"><span class="text-2xl font-bold text-slate-900">{{ $stats['students'] }}</span><span class="text-xs text-blue-600 font-semibold">Siswa</span></div>
    <p class="mt-1.5 text-xs text-slate-500">Dalam <span class="font-semibold text-slate-800">{{ $stats['sessions'] }} sesi</span> pekan ini</p>
  </div>
</div>

<!-- Filter -->
<div class="bg-white rounded-2xl p-3.5 shadow-sm border border-slate-200/80 mb-6 flex flex-wrap items-center gap-2.5">
  <div class="relative flex-1 min-w-[240px]">
    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">search</span>
    <input id="fSearch" class="w-full h-9 pl-9 pr-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-800 text-xs placeholder:text-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20" placeholder="Cari nama, ID tutor, bidang ajar, atau wilayah..." type="text">
  </div>
  <select id="fSubject" class="h-9 pl-3 pr-8 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 text-xs font-medium cursor-pointer focus:outline-none">
    <option value="">Semua Bidang Ajar</option>
    @foreach($subjectOptions as $s)<option value="{{ mb_strtolower($s) }}">{{ $s }}</option>@endforeach
  </select>
  <select id="fAvail" class="h-9 pl-3 pr-8 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 text-xs font-medium cursor-pointer focus:outline-none">
    <option value="">Semua Ketersediaan</option>
    <option value="tersedia">Tersedia (banyak slot)</option>
    <option value="terbatas">Terbatas (sisa &lt; 3 slot)</option>
    <option value="penuh">Jadwal Penuh</option>
  </select>
  <select id="fMethod" class="h-9 pl-3 pr-8 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 text-xs font-medium cursor-pointer focus:outline-none">
    <option value="">Semua Metode</option>
    <option value="home_visit">Home Visit</option>
    <option value="online">Online Zoom</option>
    <option value="studio">Studio Bimbel</option>
  </select>
</div>

<!-- Kartu tutor -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-4" id="tutorGrid">
@forelse($tutors as $t)
  @php $c = $palette[$t->availability]; $subs = $t->subject_list; @endphp
  <div data-card data-avail="{{ $t->availability }}" data-methods="{{ $t->methods }}" data-subjects="{{ mb_strtolower(implode('|', $subs)) }}"
       data-search="{{ mb_strtolower($t->name . ' ' . $t->code . ' ' . $t->headline . ' ' . implode(' ', $subs) . ' ' . $t->area) }}"
       class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 transition-all hover:shadow-md {{ $c['hover'] }} flex flex-col justify-between">
    <div>
      <div class="flex items-start justify-between gap-2.5 mb-3.5">
        <div class="flex items-center gap-3 min-w-0 flex-1">
          <div class="w-11 h-11 rounded-full {{ $c['avatar'] }} text-white flex items-center justify-center font-bold text-sm shrink-0">{{ \App\Support\Fmt::initials($t->name) }}</div>
          <div class="flex flex-col min-w-0 flex-1">
            <h3 class="text-sm font-semibold text-slate-800 truncate">{{ $t->name }}</h3>
            <span class="text-xs text-slate-500 truncate">{{ $t->headline }}</span>
            <div class="flex items-center gap-1 mt-0.5">
              @if($t->reviews > 0)
                <span class="material-symbols-outlined text-[14px] text-amber-500" style="font-variation-settings:'FILL' 1;">star</span>
                <span class="text-xs font-bold text-slate-800">{{ number_format((float) $t->rating, 1) }}</span><span class="text-xs text-slate-400">({{ $t->reviews }} ulasan)</span>
              @else
                <span class="text-xs text-slate-400">Belum ada ulasan</span>
              @endif
            </div>
          </div>
        </div>
        <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full border {{ $c['badge'] }} text-xs font-semibold shrink-0 self-start"><span class="w-1.5 h-1.5 rounded-full {{ $c['dot'] }}"></span><span>{{ $t->badge }}</span></div>
      </div>

      <div class="flex flex-wrap gap-1.5 mb-3.5">
        @foreach(array_slice($subs, 0, 2) as $i => $s)
          <span class="px-2.5 py-0.5 rounded-lg {{ $i === 0 ? 'bg-blue-50 text-blue-700 border-blue-100' : 'bg-slate-50 text-slate-700 border-slate-200/80' }} text-xs font-medium border">{{ $s }}</span>
        @endforeach
        @if(count($subs) > 2)<span class="px-2 py-0.5 rounded-lg bg-slate-50 text-slate-500 text-xs font-medium">+{{ count($subs) - 2 }} Lainnya</span>@endif
        @if(!$subs)<span class="text-xs text-slate-400">Bidang ajar belum diisi</span>@endif
      </div>

      <div class="p-3 bg-slate-50 rounded-xl mb-3.5 border border-slate-100">
        <div class="flex items-center justify-between text-xs mb-2">
          <div class="flex items-center gap-1.5 text-slate-700"><span class="material-symbols-outlined text-[16px] text-blue-600">person</span><span><strong class="text-slate-900">{{ $t->students_count }}</strong> Siswa Aktif</span></div>
          <span class="text-slate-300">|</span>
          <div class="flex items-center gap-1.5 text-slate-700"><span class="material-symbols-outlined text-[16px] text-indigo-600">calendar_today</span><span><strong class="text-slate-900">{{ $t->load }}</strong> Sesi / Minggu</span></div>
        </div>
        <div class="flex items-center justify-between text-xs"><span class="text-slate-500">Beban Mengajar</span><span class="font-semibold {{ $c['txt'] }}">{{ $t->load_pct }}% ({{ $t->load }}/{{ $t->max_sessions }} sesi)</span></div>
        <div class="w-full bg-slate-200 rounded-full h-1.5 overflow-hidden mt-1"><div class="{{ $c['bar'] }} h-1.5 rounded-full" style="width: {{ min(100, $t->load_pct) }}%;"></div></div>
      </div>

      <div class="flex items-center gap-2 text-slate-500 text-xs mb-4 min-w-0"><span class="material-symbols-outlined text-[16px] text-blue-600 shrink-0">location_on</span><span class="truncate">{{ $t->area ?: 'Wilayah belum diisi' }}</span></div>
    </div>

    <div class="flex items-center gap-2 pt-2 border-t border-slate-100">
      <button class="flex-1 h-8 rounded-xl bg-blue-50 hover:bg-blue-600 text-blue-700 hover:text-white text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors" onclick="openTutorDrawer({{ $t->id }})" type="button"><span>Lihat Profil Tutor</span><span class="material-symbols-outlined text-[15px]">arrow_forward</span></button>
      <a class="w-8 h-8 rounded-xl bg-emerald-50 hover:bg-emerald-600 hover:text-white text-emerald-700 flex items-center justify-center transition-colors shrink-0 border border-emerald-200/60" href="{{ \App\Support\Fmt::waLink($t->phone) }}" target="_blank" rel="noopener" title="Hubungi via WhatsApp"><span class="material-symbols-outlined text-[16px]">chat</span></a>
    </div>
  </div>
@empty
  <div class="col-span-full text-center text-xs text-slate-400 py-10 bg-white rounded-2xl border border-slate-200/80">Belum ada tutor. Klik <strong>Tambah Tutor</strong> untuk menambahkan.</div>
@endforelse
</div>
<div id="noResult" class="hidden text-center text-xs text-slate-400 py-10 bg-white rounded-2xl border border-slate-200/80 mb-4">Tidak ada tutor yang cocok dengan filter.</div>
<div class="bg-white rounded-2xl p-3.5 shadow-sm border border-slate-200/80 text-xs text-slate-500">Menampilkan <strong id="shownCount" class="text-slate-800 font-semibold">{{ $tutors->count() }}</strong> dari <strong class="text-slate-800 font-semibold">{{ $tutors->count() }}</strong> tutor aktif</div>

<!-- DRAWER: Profil Tutor -->
<div class="fixed inset-0 z-50 overflow-hidden pointer-events-none" id="tutorDetailDrawer">
  <div class="absolute inset-0 bg-[#0F172A]/40 opacity-0 transition-opacity duration-300 pointer-events-none" id="drawerBackdrop" onclick="closeTutorDrawer()"></div>
  <div class="absolute inset-y-0 right-0 max-w-full flex pl-10">
    <div class="w-screen max-w-[520px] bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out pointer-events-auto flex flex-col h-full overflow-hidden" id="drawerPanel">
      <div class="p-6 bg-surface-container-low/60 flex items-center justify-between border-b border-surface-container shrink-0">
        <div class="flex items-center gap-2.5">
          <div class="w-8 h-8 rounded-lg bg-primary-container text-on-primary flex items-center justify-center"><span class="material-symbols-outlined text-[18px]">badge</span></div>
          <div><h2 class="font-headline-sm text-headline-sm font-bold text-on-surface">Profil Tutor</h2><span class="text-[12px] text-on-surface-variant" id="dCode">ID Tutor: -</span></div>
        </div>
        <button class="w-8 h-8 rounded-lg hover:bg-surface-container text-on-surface-variant flex items-center justify-center" onclick="closeTutorDrawer()" type="button"><span class="material-symbols-outlined text-[20px]">close</span></button>
      </div>

      <div class="flex-1 overflow-y-auto p-6 flex flex-col gap-6" id="drawerBody">
        <div class="p-5 rounded-xl bg-surface-container-low flex flex-col gap-4">
          <div class="flex items-start gap-4">
            <div class="w-16 h-16 rounded-full bg-primary-container text-on-primary font-bold text-xl flex items-center justify-center shrink-0" id="dInitials">--</div>
            <div class="flex flex-col min-w-0">
              <h3 class="text-lg font-bold text-on-surface truncate" id="dName">-</h3>
              <span class="text-sm text-on-surface-variant font-medium" id="dHeadline">-</span>
              <span class="text-[12px] text-on-surface-variant mt-0.5" id="dEducation"></span>
              <div class="flex items-center gap-2 mt-2 flex-wrap">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container text-[11px] font-semibold" id="dBadge">-</span>
                <span class="text-[12px] text-on-surface-variant" id="dRating"></span>
              </div>
            </div>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 pt-3 border-t border-surface-container">
            <div class="flex items-center gap-2 text-sm text-on-surface"><span class="material-symbols-outlined text-secondary text-[18px]">call</span><span class="font-medium" id="dPhone">-</span></div>
            <div class="flex items-center gap-2 text-sm text-on-surface min-w-0"><span class="material-symbols-outlined text-primary text-[18px]">mail</span><span class="truncate" id="dEmail">-</span></div>
          </div>
          <a id="dWa" class="w-full h-10 rounded-lg bg-secondary hover:opacity-90 text-white text-xs font-semibold flex items-center justify-center gap-2 transition" href="#" target="_blank" rel="noopener"><span class="material-symbols-outlined text-[18px]">chat</span><span>Hubungi via WhatsApp</span></a>
        </div>

        <div>
          <h4 class="text-sm font-bold text-on-surface mb-2.5 flex items-center gap-2"><span class="material-symbols-outlined text-primary text-[18px]">auto_stories</span>Keahlian &amp; Bidang Pengajaran</h4>
          <div class="flex flex-wrap gap-2" id="dSubjects"></div>
        </div>

        <div>
          <h4 class="text-sm font-bold text-on-surface mb-2.5 flex items-center gap-2"><span class="material-symbols-outlined text-tertiary text-[18px]">location_on</span>Metode &amp; Wilayah</h4>
          <div class="flex flex-wrap gap-2 mb-2" id="dMethods"></div>
          <p class="text-sm text-on-surface-variant" id="dArea">-</p>
        </div>

        <div>
          <div class="flex items-center justify-between mb-2.5">
            <h4 class="text-sm font-bold text-on-surface flex items-center gap-2"><span class="material-symbols-outlined text-primary text-[18px]">speed</span>Beban Mengajar Pekan Ini</h4>
            <span class="text-xs text-primary font-semibold" id="dLoadText">-</span>
          </div>
          <div class="w-full bg-slate-200 rounded-full h-2 overflow-hidden"><div class="bg-blue-600 h-2 rounded-full transition-all" id="dLoadBar" style="width:0%"></div></div>
        </div>

        <div>
          <h4 class="text-sm font-bold text-on-surface mb-2.5 flex items-center gap-2"><span class="material-symbols-outlined text-secondary text-[18px]">schedule</span>Agenda Sesi Terdekat</h4>
          <div class="space-y-2" id="dAgenda"></div>
        </div>

        <div>
          <h4 class="text-sm font-bold text-on-surface mb-2.5 flex items-center justify-between">
            <span class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-[18px]">group</span><span id="dStudentTitle">Siswa Aktif Bimbingan</span></span>
            <a class="text-[11px] text-primary hover:underline" href="{{ route('admin.siswa') }}">Kelola Siswa</a>
          </h4>
          <div class="space-y-2" id="dStudents"></div>
        </div>
      </div>

      <div class="p-4 bg-surface-container-low/60 border-t border-surface-container flex items-center gap-2 shrink-0">
        <button class="h-10 px-3 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-semibold flex items-center gap-1.5 transition-colors" onclick="deactivateTutor()" type="button"><span class="material-symbols-outlined text-[18px]">person_off</span>Nonaktifkan</button>
        <button class="flex-1 h-10 rounded-lg bg-white border border-outline-variant/40 hover:bg-surface-container-low text-primary text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors" onclick="openTutorForm(cur)" type="button"><span class="material-symbols-outlined text-[18px]">edit</span>Ubah Data</button>
        <button class="flex-1 h-10 rounded-lg bg-primary-container hover:bg-primary text-white text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors" onclick="plotSession()" type="button"><span class="material-symbols-outlined text-[18px]">calendar_add_on</span>Plot Sesi Baru</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL: Tambah / Ubah Tutor -->
<div class="fixed inset-0 z-[60] overflow-y-auto pointer-events-none opacity-0 transition-opacity duration-200 flex items-start justify-center p-4" id="tutorModal">
  <div class="fixed inset-0 bg-[#0F172A]/40" onclick="closeTutorForm()"></div>
  <div class="relative bg-white rounded-2xl max-w-2xl w-full shadow-2xl p-6 md:p-8 z-10 my-8">
    <div class="flex items-center justify-between pb-4 border-b border-surface-container mb-6">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-primary-container text-on-primary flex items-center justify-center"><span class="material-symbols-outlined text-[22px]" id="mIcon">person_add</span></div>
        <div><h3 class="text-lg font-bold text-on-surface" id="mTitle">Tambah Tutor / Guru Pengajar</h3><p class="text-xs text-on-surface-variant">Data tutor dipakai untuk penjadwalan dan alokasi siswa</p></div>
      </div>
      <button class="w-8 h-8 rounded-lg hover:bg-surface-container text-on-surface-variant flex items-center justify-center" onclick="closeTutorForm()" type="button"><span class="material-symbols-outlined text-[20px]">close</span></button>
    </div>

    <form id="tutorForm" class="space-y-4" onsubmit="submitTutor(event)" novalidate>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="space-y-1.5"><label class="text-xs font-semibold text-on-surface">Nama Lengkap &amp; Gelar *</label><input name="name" required maxlength="255" class="w-full h-10 px-3.5 rounded-lg bg-surface-container-low text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 border-0" placeholder="Contoh: Ust. Ahmad Fauzi M.Pd" type="text"></div>
        <div class="space-y-1.5"><label class="text-xs font-semibold text-on-surface">ID Tutor <span class="font-normal text-on-surface-variant">(kosong = otomatis)</span></label><input name="code" maxlength="60" class="w-full h-10 px-3.5 rounded-lg bg-surface-container-low text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 border-0" placeholder="OP-TUT-2026-001" type="text"></div>
        <div class="space-y-1.5"><label class="text-xs font-semibold text-on-surface">Nomor WhatsApp Aktif *</label><input name="phone" required maxlength="30" class="w-full h-10 px-3.5 rounded-lg bg-surface-container-low text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 border-0" placeholder="0812-3456-7890" type="tel"></div>
        <div class="space-y-1.5"><label class="text-xs font-semibold text-on-surface">Email Tutor *</label><input name="email" required maxlength="255" class="w-full h-10 px-3.5 rounded-lg bg-surface-container-low text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 border-0" placeholder="tutor@oneprivate.com" type="email"></div>
        <div class="space-y-1.5"><label class="text-xs font-semibold text-on-surface">Spesialisasi</label><input name="headline" maxlength="255" class="w-full h-10 px-3.5 rounded-lg bg-surface-container-low text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 border-0" placeholder="Spesialis Tahsin &amp; Bahasa Arab" type="text"></div>
        <div class="space-y-1.5"><label class="text-xs font-semibold text-on-surface">Pendidikan</label><input name="education" maxlength="255" class="w-full h-10 px-3.5 rounded-lg bg-surface-container-low text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 border-0" placeholder="S1 Pendidikan Matematika (UNJ)" type="text"></div>
      </div>

      <div class="space-y-1.5"><label class="text-xs font-semibold text-on-surface">Bidang Ajar <span class="font-normal text-on-surface-variant">(pisahkan dengan koma)</span></label><input name="subjects" maxlength="1000" class="w-full h-10 px-3.5 rounded-lg bg-surface-container-low text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 border-0" placeholder="Mengaji &amp; Tahsin, Tajwid, Bahasa Arab Dasar" type="text"></div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="space-y-2">
          <label class="text-xs font-semibold text-on-surface">Metode Mengajar</label>
          <label class="flex items-center gap-2 text-sm cursor-pointer"><input type="checkbox" name="methods" value="home_visit" checked class="w-4 h-4 rounded">Home Visit</label>
          <label class="flex items-center gap-2 text-sm cursor-pointer"><input type="checkbox" name="methods" value="online" class="w-4 h-4 rounded">Online (Zoom)</label>
          <label class="flex items-center gap-2 text-sm cursor-pointer"><input type="checkbox" name="methods" value="studio" class="w-4 h-4 rounded">Studio Bimbel</label>
        </div>
        <div class="space-y-1.5">
          <label class="text-xs font-semibold text-on-surface">Wilayah Jangkauan</label>
          <input name="area" maxlength="255" class="w-full h-10 px-3.5 rounded-lg bg-surface-container-low text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 border-0" placeholder="Tebet, Pancoran, Online" type="text">
          <div class="flex items-center justify-between pt-2"><label class="text-xs font-semibold text-on-surface">Batas Maks Sesi / Minggu</label><span class="text-xs font-bold text-primary" id="sessionVal">20 Sesi</span></div>
          <input name="max_sessions" class="w-full accent-primary cursor-pointer" max="40" min="4" step="1" type="range" value="20" oninput="document.getElementById('sessionVal').textContent = this.value + ' Sesi'">
          <p class="text-[12px] text-on-surface-variant">Rekomendasi: 16–20 sesi per tutor agar kualitas terjaga.</p>
        </div>
      </div>

      <div class="flex items-center justify-end gap-3 pt-6 border-t border-surface-container">
        <button class="h-10 px-5 rounded-lg bg-surface-container-low hover:bg-surface-container text-sm font-semibold" onclick="closeTutorForm()" type="button">Batal</button>
        <button id="mSubmit" class="h-10 px-6 rounded-lg bg-primary-container hover:bg-primary text-white text-sm font-semibold flex items-center gap-2 shadow-sm disabled:opacity-60" type="submit"><span class="material-symbols-outlined text-[18px]">check</span><span>Simpan Data Tutor</span></button>
      </div>
    </form>
  </div>
</div>

</div></main></div>

<script src="{{ asset('js/opc.js') }}"></script>
<script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});

const URL_BASE  = {!! json_encode(url('/admin/tutor')) !!};
const URL_STORE = {!! json_encode(route('admin.tutor.simpan')) !!};
const URL_PLOT  = {!! json_encode(route('admin.jadwal.baru')) !!};
const $ = id => document.getElementById(id);
const esc = s => String(s ?? '').replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
let cur = null;        // data tutor yang sedang dibuka di drawer
let editingId = null;  // null = mode tambah

/* ---------- Drawer profil ---------- */
async function openTutorDrawer(id) {
  try {
    const res = await fetch(URL_BASE + '/' + id, {headers: {'Accept': 'application/json'}});
    if (!res.ok) throw new Error();
    cur = await res.json();
  } catch (e) { OPC.toast('Gagal memuat profil tutor.', false); return; }
  renderDrawer(cur);
  $('tutorDetailDrawer').classList.remove('pointer-events-none');
  $('drawerBackdrop').classList.remove('pointer-events-none', 'opacity-0');
  $('drawerPanel').classList.remove('translate-x-full');
}
function closeTutorDrawer() {
  $('drawerBackdrop').classList.add('opacity-0');
  $('drawerPanel').classList.add('translate-x-full');
  setTimeout(() => { $('tutorDetailDrawer').classList.add('pointer-events-none'); $('drawerBackdrop').classList.add('pointer-events-none'); }, 300);
}
function renderDrawer(t) {
  const badge = {tersedia: '🟢 Tersedia', terbatas: '🟠 ' + t.badge, penuh: '🔴 Jadwal Penuh'};
  $('dCode').textContent = 'ID Tutor: ' + t.code;
  $('dInitials').textContent = t.initials;
  $('dName').textContent = t.name;
  $('dHeadline').textContent = t.headline || '-';
  $('dEducation').textContent = t.education || '';
  $('dBadge').textContent = badge[t.availability] || t.badge;
  $('dRating').textContent = t.reviews > 0 ? '★ ' + t.rating + ' (' + t.reviews + ' ulasan)' : 'Belum ada ulasan';
  $('dPhone').textContent = t.phone_fmt;
  $('dEmail').textContent = t.email || '-';
  $('dWa').href = t.wa;
  $('dSubjects').innerHTML = t.subjects.length
    ? t.subjects.map(s => '<span class="px-3 py-1.5 rounded-lg bg-surface-container-high text-on-surface text-xs font-medium">' + esc(s) + '</span>').join('')
    : '<span class="text-xs text-slate-400">Belum diisi</span>';
  $('dMethods').innerHTML = t.method_labels.map(m => '<span class="px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold">' + esc(m) + '</span>').join('');
  $('dArea').textContent = t.area || 'Wilayah belum diisi';
  $('dLoadText').textContent = t.load + '/' + t.max_sessions + ' sesi (' + t.load_pct + '%)';
  $('dLoadBar').style.width = Math.min(100, t.load_pct) + '%';
  $('dAgenda').innerHTML = t.agenda.length ? t.agenda.map(a =>
    '<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between gap-3"><div class="flex flex-col min-w-0"><span class="text-xs font-bold text-on-surface">' + esc(a.when) + '</span><span class="text-xs text-on-surface-variant truncate">' + esc(a.who) + '</span></div><span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-white text-primary shrink-0">' + esc(a.method) + '</span></div>'
  ).join('') : '<div class="text-xs text-slate-400 p-2">Belum ada sesi terjadwal.</div>';
  $('dStudentTitle').textContent = 'Siswa Aktif Bimbingan (' + t.students.length + ' Siswa)';
  $('dStudents').innerHTML = t.students.length ? t.students.map(s =>
    '<div class="p-3 bg-white rounded-xl border border-slate-100 flex items-center justify-between gap-3"><div class="flex items-center gap-3 min-w-0"><div class="w-8 h-8 rounded-full bg-primary-container/10 text-primary flex items-center justify-center font-bold text-[12px] shrink-0">' + esc(s.initials) + '</div><div class="flex flex-col min-w-0"><span class="text-xs font-semibold text-on-surface truncate">' + esc(s.name) + '</span><span class="text-[12px] text-on-surface-variant truncate">' + esc(s.info) + '</span></div></div><span class="px-2.5 py-1 rounded-full bg-surface-container-low text-[11px] font-semibold shrink-0">' + esc(s.freq) + '</span></div>'
  ).join('') : '<div class="text-xs text-slate-400 p-2">Belum ada siswa.</div>';
  $('drawerBody').scrollTop = 0;
}
function plotSession() { if (cur) location.href = URL_PLOT + '?tutor=' + cur.id; }
async function deactivateTutor() {
  if (!cur || !confirm('Nonaktifkan ' + cur.name + '? Siswa yang diampu akan dilepas dari tutor ini.')) return;
  try { const j = await OPC.del(URL_BASE + '/' + cur.id); closeTutorDrawer(); OPC.done(j, 'reload'); } catch (e) {}
}

/* ---------- Modal tambah / ubah ---------- */
function openTutorForm(t) {
  const f = $('tutorForm'); f.reset();
  editingId = t ? t.id : null;
  $('mTitle').textContent = t ? 'Ubah Data Tutor' : 'Tambah Tutor / Guru Pengajar';
  $('mIcon').textContent = t ? 'edit' : 'person_add';
  const set = (n, v) => { f.elements[n].value = v ?? ''; };
  if (t) {
    set('name', t.name); set('code', t.code); set('phone', t.phone); set('email', t.email);
    set('headline', t.headline); set('education', t.education); set('subjects', t.subjects.join(', ')); set('area', t.area);
    f.querySelectorAll('[name=methods]').forEach(c => c.checked = t.methods.includes(c.value));
    f.elements['max_sessions'].value = t.max_sessions;
  } else {
    f.elements['max_sessions'].value = 20;
  }
  $('sessionVal').textContent = f.elements['max_sessions'].value + ' Sesi';
  $('tutorModal').classList.remove('pointer-events-none', 'opacity-0');
}
function closeTutorForm() {
  $('tutorModal').classList.add('opacity-0');
  setTimeout(() => $('tutorModal').classList.add('pointer-events-none'), 200);
}
async function submitTutor(e) {
  e.preventDefault();
  const f = e.target, fd = new FormData(f), btn = $('mSubmit');
  const payload = {
    name: (fd.get('name') || '').trim(), code: (fd.get('code') || '').trim(), phone: (fd.get('phone') || '').trim(),
    email: (fd.get('email') || '').trim(), headline: (fd.get('headline') || '').trim(), education: (fd.get('education') || '').trim(),
    subjects: (fd.get('subjects') || '').trim(), area: (fd.get('area') || '').trim(),
    methods: fd.getAll('methods').join(','), max_sessions: parseInt(fd.get('max_sessions'), 10),
  };
  if (!payload.name || !payload.phone || !payload.email) { OPC.toast('Nama, WhatsApp, dan email wajib diisi.', false); return; }
  btn.disabled = true;
  try {
    const j = editingId ? await OPC.put(URL_BASE + '/' + editingId, payload) : await OPC.post(URL_STORE, payload);
    closeTutorForm(); closeTutorDrawer(); OPC.done(j, 'reload');
  } catch (err) { /* pesan error sudah ditampilkan OPC */ }
  btn.disabled = false;
}

/* ---------- Pencarian & filter ---------- */
(function () {
  const cards = [...document.querySelectorAll('[data-card]')];
  const q = $('fSearch'), fs = $('fSubject'), fa = $('fAvail'), fm = $('fMethod');
  const run = () => {
    const v = q.value.trim().toLowerCase(); let n = 0;
    cards.forEach(c => {
      const ok = (!v || c.dataset.search.includes(v))
        && (!fs.value || c.dataset.subjects.split('|').includes(fs.value))
        && (!fa.value || c.dataset.avail === fa.value)
        && (!fm.value || c.dataset.methods.split(',').includes(fm.value));
      c.style.display = ok ? '' : 'none'; if (ok) n++;
    });
    $('shownCount').textContent = n;
    $('noResult').classList.toggle('hidden', n > 0 || cards.length === 0);
  };
  q.addEventListener('input', run); [fs, fa, fm].forEach(s => s.addEventListener('change', run));
})();
document.addEventListener('keydown', e => { if (e.key === 'Escape') { closeTutorForm(); closeTutorDrawer(); } });
</script>
</body></html>