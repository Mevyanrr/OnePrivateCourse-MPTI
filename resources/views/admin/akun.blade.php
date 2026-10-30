<!DOCTYPE html>

<html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Akun &amp; Hak Akses - One Private Course</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..24,400..600,0..1,-25..0&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<style>
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      overscroll-behavior: none;
    }
    ::-webkit-scrollbar {
      display: none;
    }
  </style>
</head>
<body class="bg-[#f8faff] text-slate-800 antialiased min-h-screen flex">
<!-- SIDEBAR (Matching Reference Structure) -->
<aside class="fixed left-0 top-0 h-full w-64 bg-white border-r border-slate-200/80 z-50 flex flex-col justify-between p-4">
<div class="flex flex-col">
<!-- Brand Header -->
<div class="flex items-center gap-3 px-2 py-2 mb-4">
<div class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center shrink-0 shadow-sm shadow-blue-500/30">
<span class="material-symbols-outlined text-white text-[20px]">school</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-bold text-slate-800 text-[15px] leading-snug tracking-tight">One Private Course</span>
<span class="text-[11px] text-slate-400 font-medium">Sistem Manajemen Bimbel</span>
</div>
</div>
<!-- Quick Action Button -->
<div class="mb-4">
<button class="w-full h-10 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-xl flex items-center justify-center gap-2 transition-all shadow-sm shadow-blue-600/25" type="button">
<span class="material-symbols-outlined text-[18px]">add_circle</span>
<span>+ Tambah Sesi Les</span>
</button>
</div>
<!-- Navigation Links -->
<nav class="flex flex-col gap-1">
<a class="flex items-center gap-3 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="{{ route('admin.dashboard') }}">
<span class="material-symbols-outlined text-[19px] text-slate-400">dashboard</span>
<span>Dashboard Ringkasan</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="{{ route('admin.jadwal') }}">
<span class="material-symbols-outlined text-[19px] text-slate-400">calendar_month</span>
<span>Jadwal &amp; Sesi Les</span>
</a>
<a class="flex items-center justify-between px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="{{ route('admin.siswa') }}">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[19px] text-slate-400">group</span>
<span>Database Siswa</span>
</div>
<span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-500 text-[11px] font-semibold">74</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="{{ route('admin.tutor') }}">
<span class="material-symbols-outlined text-[19px] text-slate-400">badge</span>
<span>Tutor &amp; Guru Pengajar</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="{{ route('admin.presensi') }}">
<span class="material-symbols-outlined text-[19px] text-slate-400">fact_check</span>
<span>Presensi &amp; Laporan</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="{{ route('admin.pembayaran') }}">
<span class="material-symbols-outlined text-[19px] text-slate-400">receipt_long</span>
<span>Invoicing &amp; Honorarium</span>
</a>
<div class="border-t border-slate-100 my-2 mx-1"></div>
<a class="flex items-center justify-between px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="{{ route('admin.konfirmasi') }}">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[19px] text-amber-500">pending_actions</span>
<span>Konfirmasi Sesi</span>
</div>
<span class="px-2 py-0.5 rounded-full bg-amber-50 text-amber-600 border border-amber-200/60 text-[11px] font-bold">{{ $nav['confirm'] }}</span>
</a>
<a class="flex items-center justify-between px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="{{ route('admin.konfirmasi') }}">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[19px] text-blue-500">notifications</span>
<span>Notifikasi Masuk</span>
</div>
<span class="px-2 py-0.5 rounded-full bg-blue-50 text-blue-600 border border-blue-200/60 text-[11px] font-bold">{{ $nav['notif'] }}</span>
</a>
<!-- Active Page: Akun & Hak Akses -->
<a class="flex items-center justify-between px-3 py-2 rounded-xl bg-blue-50/80 text-blue-700 font-semibold text-xs transition-colors mt-0.5" href="{{ route('admin.akun') }}">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[19px] text-blue-600">manage_accounts</span>
<span>Akun &amp; Hak Akses</span>
</div>
<span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
</a>
</nav>
</div>
<!-- Sidebar Bottom Help Badge -->
<div class="p-3 bg-slate-50 rounded-xl border border-slate-200/60 flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-600 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">support_agent</span>
</div>
<div class="flex flex-col min-w-0">
<span class="text-[11px] font-semibold text-slate-800 truncate">Bantuan Cabang</span>
<span class="text-[10px] text-slate-400">One Private v2.4</span>
</div>
</div>
</aside>
<!-- MAIN VIEWPORT -->
<div class="pl-64 flex-1 flex flex-col min-w-0">
<!-- Top Navigation Header -->
<header class="h-14 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 sticky top-0 z-40">
<div class="flex items-center gap-2 text-xs">
<span class="text-slate-400">Dashboard</span>
<span class="text-slate-300 font-medium">&gt;</span>
<span class="font-semibold text-blue-600">Akun &amp; Hak Akses</span>
</div>
<!-- Right User Profile Pill -->
<div class="flex items-center gap-3">
<div class="text-right flex flex-col">
<span class="text-xs font-semibold text-slate-800 leading-tight">Admin Operasional</span>
<span class="text-[11px] text-slate-400">admin@oneprivate.id</span>
</div>
<div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-xs border border-blue-200/60">
          AO
        </div>
</div>
</header>
<!-- Page Content Container -->
<main class="p-8 max-w-[1400px] w-full mx-auto">
<!-- Title & CTA Bar -->
<div class="flex items-start justify-between gap-4 mb-6">
<div>
<h1 class="text-2xl font-bold text-slate-900 tracking-tight">Akun &amp; Hak Akses</h1>
<p class="text-xs text-slate-500 mt-1">Kelola kredensial login, peran pengguna (Admin, Tutor, Wali Murid), serta pengaturan keamanan sistem bimbingan.</p>
</div>
<button class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl px-4 py-2 text-xs font-semibold shadow-sm shadow-blue-500/20 flex items-center gap-1.5 transition-colors shrink-0" type="button">
<span class="material-symbols-outlined text-[17px]">person_add</span>
<span>Buat Akun Baru</span>
</button>
</div>
<!-- KPI 4-Card Summary Grid (Matching Reference) -->
<div class="grid grid-cols-4 gap-4 mb-6">
<!-- Card 1 -->
<div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm relative flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="text-xs font-medium text-slate-500">Total Akun</span>
<div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">group</span>
</div>
</div>
<div class="flex items-baseline gap-1.5 mb-2">
<span class="text-2xl font-bold text-slate-900 leading-none">{{ $k['total'] }}</span>
<span class="text-xs text-slate-400 font-medium">Akun</span>
</div>
<div class="text-xs text-emerald-600 font-medium flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">check</span>
<span>{{ $k['aktifPct'] }}% Kredensial aktif</span>
</div>
</div>
<!-- Card 2 -->
<div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm relative flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="text-xs font-medium text-slate-500">Akun Aktif</span>
<div class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">verified_user</span>
</div>
</div>
<div class="flex items-baseline gap-1.5 mb-2">
<span class="text-2xl font-bold text-slate-900 leading-none">{{ $k['aktif'] }}</span>
<span class="text-xs text-slate-400 font-medium">Akun</span>
</div>
<div class="text-xs text-slate-500 font-medium">
<span>{{ $k['aktifPct'] }}% Siap Operasional</span>
</div>
</div>
<!-- Card 3 -->
<div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm relative flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="text-xs font-medium text-slate-500">Perlu Verifikasi</span>
<div class="w-8 h-8 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">lock_reset</span>
</div>
</div>
<div class="flex items-baseline gap-1.5 mb-2">
<span class="text-2xl font-bold text-blue-600 leading-none">{{ $k['perlu'] }}</span>
<span class="text-xs text-slate-400 font-medium">Akun</span>
</div>
<div class="text-xs text-blue-600 font-medium flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
<span>{{ $k['perlu'] }} Menunggu Reset/OTP</span>
</div>
</div>
<!-- Card 4 -->
<div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm relative flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<span class="text-xs font-medium text-slate-500">Dinonaktifkan</span>
<div class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">archive</span>
</div>
</div>
<div class="flex items-baseline gap-1.5 mb-2">
<span class="text-2xl font-bold text-slate-800 leading-none">{{ $k['nonaktif'] }}</span>
<span class="text-xs text-slate-400 font-medium">Akun</span>
</div>
<div class="text-xs text-amber-600 font-medium">
<span>Arsip siswa lulus bimbingan</span>
</div>
</div>
</div>
<!-- Filter & Search Toolbar Container (Matching Reference Layout) -->
<div class="bg-white rounded-2xl border border-slate-200/80 p-3.5 shadow-sm mb-6 flex flex-col gap-3">
<!-- Segmented Tab Pills & View Mode -->
<div class="flex items-center justify-between gap-4">
<div class="inline-flex p-1 bg-slate-100 rounded-xl gap-1">
<button class="bg-white text-blue-600 font-semibold px-3 py-1.5 rounded-lg text-xs shadow-xs transition-colors" type="button">Semua Akun</button>
<button class="text-slate-600 hover:text-slate-900 px-3 py-1.5 rounded-lg text-xs font-medium transition-colors" type="button">Admin</button>
<button class="text-slate-600 hover:text-slate-900 px-3 py-1.5 rounded-lg text-xs font-medium transition-colors" type="button">Tutor</button>
<button class="text-slate-600 hover:text-slate-900 px-3 py-1.5 rounded-lg text-xs font-medium transition-colors" type="button">Wali Murid</button>
<button class="text-slate-600 hover:text-slate-900 px-3 py-1.5 rounded-lg text-xs font-medium transition-colors" type="button">Nonaktif</button>
</div>
<div class="flex items-center gap-1.5 text-xs text-slate-500">
<span>Tampilan:</span>
<div class="inline-flex border border-slate-200 rounded-lg p-0.5 bg-slate-50">
<button class="flex items-center gap-1 px-2.5 py-1 bg-white rounded-md text-blue-600 font-semibold shadow-xs" type="button">
<span class="material-symbols-outlined text-[15px]">table_rows</span>
<span>Tabel</span>
</button>
<button class="flex items-center gap-1 px-2.5 py-1 text-slate-500 hover:text-slate-800 font-medium transition-colors" type="button">
<span class="material-symbols-outlined text-[15px]">grid_view</span>
<span>Kartu</span>
</button>
</div>
</div>
</div>
<!-- Search Bar and Dropdowns -->
<div class="flex items-center gap-2.5">
<!-- Search Input -->
<div class="relative flex-1">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">search</span>
<input class="w-full pl-9 pr-3 py-2 bg-white border border-slate-200 rounded-xl text-xs text-slate-700 placeholder:text-slate-400 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Cari nama pengguna, email, no. whatsapp..." type="text"/>
</div>
<!-- Dropdowns -->
<div class="relative">
<select class="appearance-none bg-white border border-slate-200 rounded-xl px-3 py-2 pr-7 text-xs text-slate-700 focus:outline-none focus:border-blue-500 cursor-pointer">
<option>Semua Peran</option>
<option>Super Admin</option>
<option>Admin Keuangan</option>
<option>Tutor Pengajar</option>
<option>Wali Murid</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 text-[16px] pointer-events-none">expand_more</span>
</div>
<div class="relative">
<select class="appearance-none bg-white border border-slate-200 rounded-xl px-3 py-2 pr-7 text-xs text-slate-700 focus:outline-none focus:border-blue-500 cursor-pointer">
<option>Semua Status</option>
<option>Aktif</option>
<option>Nonaktif</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 text-[16px] pointer-events-none">expand_more</span>
</div>
<div class="relative">
<select class="appearance-none bg-white border border-slate-200 rounded-xl px-3 py-2 pr-7 text-xs text-slate-700 focus:outline-none focus:border-blue-500 cursor-pointer">
<option>Cabang Tebet</option>
<option>Cabang Kemang</option>
<option>Cabang Bintaro</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 text-[16px] pointer-events-none">expand_more</span>
</div>
<!-- Filter Button Icon -->
<button class="w-9 h-9 border border-slate-200 rounded-xl text-slate-500 hover:text-slate-700 hover:bg-slate-50 flex items-center justify-center transition-colors shrink-0" title="Filter Tambahan" type="button">
<span class="material-symbols-outlined text-[18px]">tune</span>
</button>
</div>
</div>
<!-- DATA TABLE (Exact Grid & Styling Matching Reference) -->
<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden mb-6">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-slate-50/70 border-b border-slate-100 text-[11px] font-semibold uppercase tracking-wider text-slate-500">
<th class="py-3.5 px-4">PENGGUNA &amp; ID</th>
<th class="py-3.5 px-4">KONTAK &amp; WHATSAPP</th>
<th class="py-3.5 px-4">PERAN SISTEM</th>
<th class="py-3.5 px-4">KELAS / SISWA TERKAIT</th>
<th class="py-3.5 px-4">STATUS</th>
<th class="py-3.5 px-4 text-right">AKSI</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 text-xs">
@forelse($users as $u)
<tr data-id="{{ $u->id }}" data-role="{{ $u->role }}" data-status="{{ $u->status }}" data-branch="{{ $u->branch }}" class="hover:bg-slate-50/50 transition-colors">
<td class="py-3.5 px-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 font-bold text-xs flex items-center justify-center shrink-0">{{ \App\Support\Fmt::initials($u->name) }}</div>
<div class="flex flex-col">
<span class="font-bold text-slate-800 text-xs">{{ $u->name }}</span>
<span class="text-[11px] text-slate-400">{{ $u->code ?: "USR-" . $u->id }}</span>
</div>
</div>
</td>
<td class="py-3.5 px-4 whitespace-nowrap">
<div class="flex flex-col">
<span class="text-slate-700 font-medium text-xs">{{ $u->email ?: "-" }}</span>
<span class="text-[11px] text-emerald-600 font-medium flex items-center gap-1 mt-0.5">
<span class="material-symbols-outlined text-[12px]">chat</span> {{ $u->phone ?: "-" }}
                    </span>
</div>
</td>

@if($u->role === 'wali')
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="px-2.5 py-1 rounded-lg bg-teal-50 text-teal-700 border border-teal-200/50 font-medium text-[11px] inline-flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span> Wali Murid
                  </span>
</td>
@elseif($u->role === 'tutor')
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-200/50 font-medium text-[11px] inline-flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span> Tutor Pengajar
                  </span>
</td>
@elseif(str_contains((string) $u->role_label, 'Super'))
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="px-2.5 py-1 rounded-lg bg-blue-600 text-white font-semibold text-[11px] inline-flex items-center gap-1 shadow-xs">
<span class="material-symbols-outlined text-[13px]">shield</span> {{ $u->role_label }}
                  </span>
</td>
@else
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="px-2.5 py-1 rounded-lg bg-indigo-50 text-indigo-700 border border-indigo-200/50 font-medium text-[11px] inline-flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span> {{ $u->role_label ?: "Admin" }}
                  </span>
</td>
@endif


@if($u->role === 'wali')
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-200/50 text-[11px] font-medium">
<span class="material-symbols-outlined text-[13px]">school</span> {{ $u->children->first()->name ?? "-" }}
                  </span>
</td>
@elseif($u->role === 'tutor')
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 border border-sky-200/50 text-[11px] font-medium">
<span class="material-symbols-outlined text-[13px]">groups</span> {{ $u->tutor ? $u->tutor->students()->where("status", "aktif")->count() : 0 }} Siswa Aktif
                  </span>
</td>
@else
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="text-slate-600 text-xs">{{ str_contains((string) $u->role_label, "Super") ? "Akses Penuh Seluruh Sistem" : "Operasional Cabang " . $u->branch }}</span>
</td>
@endif


@if($u->status === 'aktif')
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/50 text-[11px] font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                  </span>
</td>
@else
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-600 border border-slate-200 text-[11px] font-medium">
<span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif
                  </span>
</td>
@endif


@if($u->id === auth()->id())
<td class="py-3.5 px-4 whitespace-nowrap text-right">
<span class="text-[11px] text-blue-600 font-semibold px-2 py-1 bg-blue-50 rounded-lg">Kredensial Utama</span>
</td>
@elseif($u->status === 'aktif')
<td class="py-3.5 px-4 whitespace-nowrap text-right">
<div class="inline-flex items-center gap-1.5">
<button class="px-2.5 py-1 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 text-[11px] font-semibold transition-colors" type="button" data-reset="{{ $u->id }}">Reset Sandi</button>
<button class="p-1 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</div>
</td>
@else
<td class="py-3.5 px-4 whitespace-nowrap text-right">
<div class="inline-flex items-center gap-1.5">
<button class="px-2.5 py-1 rounded-lg border border-emerald-200 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 text-[11px] font-semibold transition-colors" type="button" data-toggle="{{ $u->id }}">Aktifkan</button>
<button class="p-1 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</div>
</td>
@endif

</tr>
@empty
<tr><td colspan="6" class="py-10 text-center text-xs text-slate-400">Tidak ada akun.</td></tr>
@endforelse
</tbody>
</table>
</div>
<!-- Table Pagination Footer (Matching Reference Layout) -->
<div class="p-4 bg-white border-t border-slate-100 flex items-center justify-between">
<span class="text-xs text-slate-500">
            Menampilkan <strong class="font-semibold text-slate-700">{{ $users->firstItem() ?? 0 }} – {{ $users->lastItem() ?? 0 }}</strong> dari <strong class="font-semibold text-slate-700">{{ $users->total() }}</strong> akun pengguna
          </span>
<div class="flex items-center gap-1.5">
<button {{ $users->onFirstPage() ? "disabled" : "" }} data-go="{{ $users->previousPageUrl() }}" class="px-3 py-1 text-xs border border-slate-200 rounded-lg text-slate-600 hover:bg-slate-50 transition-colors disabled:opacity-40" type="button">
              Sebelumnya
            </button>
@foreach(range(1, max(1, $users->lastPage())) as $pg)
@if($pg === $users->currentPage())
<button class="px-3 py-1 text-xs bg-blue-600 text-white font-semibold rounded-lg shadow-xs" type="button">{{ $pg }}</button>
@else
<button data-go="{{ $users->url($pg) }}" class="px-3 py-1 text-xs border border-slate-200 rounded-lg text-slate-600 hover:bg-slate-50 transition-colors" type="button">{{ $pg }}</button>
@endif
@endforeach
<button {{ $users->hasMorePages() ? "" : "disabled" }} data-go="{{ $users->nextPageUrl() }}" class="px-3 py-1 text-xs border border-slate-200 rounded-lg text-slate-600 hover:bg-slate-50 transition-colors" type="button">
              Selanjutnya
            </button>
</div>
</div>
</div>
<!-- Bottom Page Copyright Footer -->
<footer class="text-center text-xs text-slate-400 py-6">
        © 2026 One Private Course. Sistem Manajemen Bimbel &amp; Les Privat.
      </footer>
</main>
</div>
<script src="{{ asset('js/opc.js') }}"></script><script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});
const API = {!! json_encode(url('/admin/akun')) !!}; const Q = new URLSearchParams(location.search);
const ROLES = [{v: 'admin', t: 'Admin'}, {v: 'tutor', t: 'Tutor Pengajar'}, {v: 'wali', t: 'Wali Murid'}];
function form(u) { return [{name: 'name', label: 'Nama lengkap', value: u ? u.name : ''}, {name: 'email', label: 'Email', type: 'email', value: u ? u.email : ''}, {name: 'phone', label: 'No. WhatsApp', value: u ? u.phone : ''},
  {name: 'role', label: 'Peran', type: 'select', value: u ? u.role : 'admin', options: ROLES}, {name: 'role_label', label: 'Label peran (mis. Admin Keuangan)', value: u ? u.role_label : ''}, {name: 'branch', label: 'Cabang', type: 'select', value: u ? u.branch : 'Tebet', options: ['Tebet', 'Kemang', 'Bintaro'].map(x => ({v: x, t: 'Cabang ' + x}))}]; }
OPC.on('Buat Akun Baru', () => OPC.dialog({title: 'Buat Akun Baru', desc: 'Kata sandi awal dibuat otomatis dan ditampilkan sekali.', fields: form(null), submit: 'Buat Akun', onSubmit: async v => { const j = await OPC.post(API, v); alert((j.message || '') + '\n\nKata sandi awal: ' + j.password); OPC.done({}, 'reload'); }}), {exact: false});
document.addEventListener('click', async e => {
  const r = e.target.closest('[data-reset]'); if (r) { if (!confirm('Reset kata sandi akun ini?')) return; try { const j = await OPC.post(API + '/' + r.dataset.reset + '/reset', {}); alert(j.message + '\n\nKata sandi baru: ' + j.password); } catch (x) {} return; }
  const t = e.target.closest('[data-toggle]'); if (t) { try { const j = await OPC.post(API + '/' + t.dataset.toggle + '/toggle', {}); OPC.done(j, 'reload'); } catch (x) {} return; }
  const m = e.target.closest('[data-more]'); if (m) { const id = m.dataset.more; let u = {}; try { u = (await OPC.req(API + '/' + id, undefined, 'GET')).user; } catch (x) { return; }
    OPC.dialog({title: 'Aksi Akun', desc: u.name, fields: [{name: 'a', label: 'Tindakan', type: 'select', options: [{v: 'edit', t: 'Ubah data akun'}, {v: 'toggle', t: u.status === 'aktif' ? 'Nonaktifkan akun' : 'Aktifkan akun'}, {v: 'hapus', t: 'Hapus akun'}]}], submit: 'Lanjut',
      onSubmit: async v => { if (v.a === 'edit') OPC.dialog({title: 'Ubah Akun', fields: form(u), submit: 'Simpan', onSubmit: async f => { const j = await OPC.put(API + '/' + id, f); OPC.done(j, 'reload'); }});
        else if (v.a === 'toggle') { const j = await OPC.post(API + '/' + id + '/toggle', {}); OPC.done(j, 'reload'); }
        else if (confirm('Hapus akun ini permanen?')) { const j = await OPC.del(API + '/' + id); OPC.done(j, 'reload'); } }}); }
});
function nav(k, v) { const u = new URL(location.href); u.searchParams.delete('page'); v ? u.searchParams.set(k, v) : u.searchParams.delete(k); location.href = u.toString(); }
const tabs = ['Semua Akun', 'Admin', 'Tutor', 'Wali Murid', 'Nonaktif'].map(t => OPC.find(t, {sel: 'button'})[0]); const keys = ['all', 'admin', 'tutor', 'wali', 'nonaktif']; const cur = keys.indexOf({!! json_encode($tab) !!});
let ready = false; const ap = OPC.choice(tabs, 0, k => { if (ready) nav('tab', keys[k]); }); if (cur > 0) ap(cur); ready = true;
const sels = [...document.querySelectorAll('select')]; const [sR, sS, sB] = sels;
const rmap = {'Super Admin': 'super', 'Admin Keuangan': 'keuangan', 'Tutor Pengajar': 'tutor', 'Wali Murid': 'wali'}; [...sR.options].forEach(o => { o.value = rmap[o.textContent] || ''; }); sR.value = Q.get('peran') || '';
[...sS.options].forEach(o => { o.value = o.textContent === 'Aktif' ? 'aktif' : o.textContent === 'Nonaktif' ? 'nonaktif' : ''; }); sS.value = Q.get('status') || '';
[...sB.options].forEach(o => { o.value = o.textContent.replace('Cabang ', ''); }); sB.value = Q.get('cabang') || sB.value;
sR.addEventListener('change', () => nav('peran', sR.value)); sS.addEventListener('change', () => nav('status', sS.value)); sB.addEventListener('change', () => nav('cabang', sB.value));
const qi = document.querySelector('input[placeholder^="Cari nama pengguna"]'); qi.value = Q.get('q') || ''; qi.addEventListener('keydown', e => { if (e.key === 'Enter') { e.preventDefault(); nav('q', qi.value); } });
const rows = [...document.querySelectorAll('tbody tr[data-id]')]; qi.addEventListener('input', () => { const v = qi.value.toLowerCase(); rows.forEach(r => r.style.display = r.textContent.toLowerCase().includes(v) ? '' : 'none'); });
document.querySelectorAll('button[title="Filter Tambahan"]').forEach(b => b.addEventListener('click', () => { location.href = location.pathname; }));
OPC.on('Kartu', () => OPC.toast('Mode kartu menyusul — saat ini mode Tabel.', true), {sel: 'button'});
</script></body></html>