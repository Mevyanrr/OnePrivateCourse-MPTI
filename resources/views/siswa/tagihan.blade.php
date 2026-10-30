<!DOCTYPE html>

<html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Status &amp; Riwayat Pembayaran - One Private Course</title>
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
<!-- SIDEBAR (Matching Reference Structure 1:1) -->
<aside class="fixed left-0 top-0 h-full w-64 bg-white border-r border-slate-200/80 z-50 flex flex-col justify-between p-4">
<div class="flex flex-col">
<!-- Brand Header -->
<div class="flex items-center gap-3 px-2 py-2 mb-4">
<div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shrink-0 shadow-sm shadow-blue-500/25">
<span class="material-symbols-outlined text-white text-[22px]">school</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-bold text-slate-900 text-[15px] leading-snug tracking-tight">One Private Course</span>
<span class="text-[11px] text-slate-400 font-medium truncate">Sistem Manajemen Bimbel &amp; Les</span>
</div>
</div>
<!-- Quick Action Button -->
<div class="mb-5">
<button class="w-full h-10 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-xl flex items-center justify-center gap-2 transition-all shadow-sm shadow-blue-600/25" onclick="showToast('Membuka form konfirmasi pembayaran...', 'account_balance_wallet')" type="button">
<span class="material-symbols-outlined text-[18px]">add_circle</span>
<span>+ Konfirmasi Bayar</span>
</button>
</div>
<!-- Navigation Links -->
<nav class="flex flex-col gap-1">
<a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="#">
<span class="material-symbols-outlined text-[20px] text-slate-400">dashboard</span>
<span>Beranda</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="#">
<span class="material-symbols-outlined text-[20px] text-slate-400">calendar_month</span>
<span>Jadwal Les</span>
</a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="#">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[20px] text-slate-400">assignment_turned_in</span>
<span>Presensi &amp; Catatan</span>
</div>
<span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-500 text-[11px] font-semibold">8 Sesi</span>
</a>
<!-- Active Page: Riwayat Tagihan / Pembayaran -->
<a class="flex items-center justify-between px-3 py-2.5 rounded-xl bg-blue-50/80 text-blue-700 font-semibold text-xs transition-colors mt-0.5" href="#">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[20px] text-blue-600">receipt_long</span>
<span>Riwayat Tagihan</span>
</div>
<span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="#">
<span class="material-symbols-outlined text-[20px] text-slate-400">account_box</span>
<span>Profil Siswa</span>
</a>
<div class="border-t border-slate-100 my-2 mx-1"></div>
<a class="flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="#">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[20px] text-amber-500">pending_actions</span>
<span>Tagihan Berjalan</span>
</div>
<span class="px-2 py-0.5 rounded-full bg-amber-50 text-amber-600 border border-amber-200/60 text-[11px] font-bold">1</span>
</a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors text-xs font-medium" href="#">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[20px] text-blue-500">notifications</span>
<span>Notifikasi Masuk</span>
</div>
<span class="px-2 py-0.5 rounded-full bg-blue-50 text-blue-600 border border-blue-200/60 text-[11px] font-bold">2</span>
</a>
</nav>
</div>
<!-- Sidebar Bottom Help Badge -->
<div class="p-3 bg-slate-50/80 rounded-xl border border-slate-200/70 flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-blue-100/80 text-blue-600 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">support_agent</span>
</div>
<div class="flex flex-col min-w-0">
<span class="text-[11px] font-semibold text-slate-800 truncate">Bantuan Cabang</span>
<a class="text-[10px] text-blue-600 hover:underline font-medium" href="https://wa.me/6281234567890" target="_blank">WhatsApp Admin</a>
</div>
</div>
</aside>
<!-- MAIN VIEWPORT -->
<div class="pl-64 flex-1 flex flex-col min-w-0">
<!-- Top Navigation Header (Matching SCREEN_4 Breadcrumb & Profile Bar) -->
<header class="h-16 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 sticky top-0 z-40">
<div class="flex items-center gap-2 text-xs">
<span class="text-slate-500 font-medium">Dashboard</span>
<span class="text-slate-300 font-medium">&gt;</span>
<span class="font-semibold text-blue-600">Status &amp; Riwayat Pembayaran</span>
</div>
<!-- Right Profile & Child Switchers -->
<div class="flex items-center gap-4">
<!-- Child Profile Toggle Buttons -->
<div class="inline-flex p-1 bg-slate-100 rounded-xl gap-1 text-xs">
<button class="bg-white text-blue-600 font-semibold px-2.5 py-1 rounded-lg shadow-sm transition-colors flex items-center gap-1.5" id="top-btn-aisyah" onclick="switchProfile('aisyah')" type="button">
<span class="w-2 h-2 rounded-full bg-emerald-500"></span>
<span>Aisyah Putri (SMP 8)</span>
</button>
<button class="text-slate-600 hover:text-slate-900 px-2.5 py-1 rounded-lg font-medium transition-colors flex items-center gap-1.5" id="top-btn-farhan" onclick="switchProfile('farhan')" type="button">
<span class="w-2 h-2 rounded-full bg-amber-500"></span>
<span>Farhan Nugraha (SMA 12)</span>
</button>
</div>
<!-- Notification Icon -->
<div class="relative w-8 h-8 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center cursor-pointer transition-colors" onclick="showToast('2 tagihan &amp; notifikasi baru', 'notifications')">
<span class="material-symbols-outlined text-[18px]">notifications</span>
<span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-amber-500 ring-2 ring-white"></span>
</div>
<!-- Parent User Profile Pill (SCREEN_4 Avatar Style) -->
<div class="flex items-center gap-3 pl-3 border-l border-slate-200/80">
<div class="text-right flex flex-col">
<span class="text-xs font-semibold text-slate-800 leading-tight">Ibu Nabila Kusumawardhani</span>
<span class="text-[11px] text-slate-400">nabila.wardhani@gmail.com</span>
</div>
<div class="w-9 h-9 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-xs border border-blue-200/80 shadow-xs">
  IN
</div>
</div>
</div>
</header>
<!-- Page Content Container -->
<main class="p-8 max-w-[1440px] w-full mx-auto">
<!-- Title & CTA Bar -->
<div class="flex items-start justify-between gap-4 mb-6">
<div>
<h1 class="text-2xl font-bold text-slate-900 tracking-tight">Status &amp; Riwayat Pembayaran</h1>
<p class="text-xs text-slate-500 mt-1">Kelola tagihan les berkala, verifikasi kuitansi pembayaran resmi, dan konfirmasi bukti transfer via WhatsApp admin.</p>
</div>
<button class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl px-4 py-2.5 text-xs font-semibold shadow-sm shadow-blue-600/20 flex items-center gap-1.5 transition-colors shrink-0" onclick="showToast('Membuka formulir konfirmasi transfer...', 'add_circle')" type="button">
<span class="material-symbols-outlined text-[18px]">add_circle</span>
<span>+ Konfirmasi Bayar</span>
</button>
</div>
<!-- 4 KPI Cards (Identical Layout & Styling to SCREEN_4) -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
<!-- Card 1: Total Tagihan Aktif -->
<div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm relative flex flex-col justify-between">
<div class="flex items-center justify-between mb-3">
<span class="text-xs font-medium text-slate-500">Total Tagihan Aktif</span>
<div class="w-9 h-9 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[19px]">receipt_long</span>
</div>
</div>
<div class="flex items-baseline gap-1.5 mb-2">
<span class="text-2xl font-bold text-slate-900 leading-none tracking-tight">{{ \App\Support\Fmt::rupiah($k["active"]) }}</span>
</div>
<div class="text-xs text-emerald-600 font-medium flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">check</span>
<span>✓ {{ $k["periods"] }}</span>
</div>
</div>
<!-- Card 2: Sudah Diverifikasi (Lunas) -->
<div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm relative flex flex-col justify-between">
<div class="flex items-center justify-between mb-3">
<span class="text-xs font-medium text-slate-500">Sudah Diverifikasi (Lunas)</span>
<div class="w-9 h-9 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[19px]">verified_user</span>
</div>
</div>
<div class="flex items-baseline gap-1.5 mb-2">
<span class="text-2xl font-bold text-emerald-600 leading-none tracking-tight">{{ \App\Support\Fmt::rupiah($k["paid"]) }}</span>
</div>
<div class="text-xs text-slate-500 font-medium flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
<span>{{ $k["paidNote"] }}</span>
</div>
</div>
<!-- Card 3: Menunggu Pembayaran -->
<div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm relative flex flex-col justify-between">
<div class="flex items-center justify-between mb-3">
<span class="text-xs font-medium text-slate-500">Menunggu Pembayaran</span>
<div class="w-9 h-9 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[19px]">schedule</span>
</div>
</div>
<div class="flex items-baseline gap-1.5 mb-2">
<span class="text-2xl font-bold text-amber-600 leading-none tracking-tight">{{ \App\Support\Fmt::rupiah($k["unpaid"]) }}</span>
</div>
<div class="text-xs text-amber-600 font-medium flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
<span>{{ $k["unpaidNote"] }}</span>
</div>
</div>
<!-- Card 4: Sisa Kuota Belajar -->
<div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm relative flex flex-col justify-between">
<div class="flex items-center justify-between mb-3">
<span class="text-xs font-medium text-slate-500">Sisa Kuota Belajar</span>
<div class="w-9 h-9 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[19px]">menu_book</span>
</div>
</div>
<div class="flex items-baseline gap-1.5 mb-2">
<span class="text-2xl font-bold text-blue-600 leading-none tracking-tight">{{ max(0, $k["quotaLeft"]) }} / {{ $k["quotaTotal"] }}</span>
<span class="text-xs text-slate-400 font-medium">Sesi</span>
</div>
<div class="text-xs text-blue-600 font-medium flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
<span>• {{ $child->program }}</span>
</div>
</div>
</div>
<!-- 2 Kartu Tagihan Periode Berjalan (Rapi & Selaras) -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-6" id="cards-overview">
@forelse($cards as $pc)

@if($pc->status === 'lunas')
<div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm relative flex flex-col justify-between transition-all" id="card-{{ $pc->id }}">
<div>
<div class="flex items-center justify-between pb-3 border-b border-slate-100">
<div>
<div class="flex items-center gap-2 mb-1">
<span class="text-[11px] font-bold text-emerald-600 uppercase tracking-wider">Periode Berjalan</span>
<span class="w-1 h-1 rounded-full bg-slate-300"></span>
<span class="text-[11px] text-slate-500">{{ $pc->student->program }}</span>
</div>
<h3 class="text-base font-bold text-slate-900">Tagihan Les: {{ $pc->period }}</h3>
<p class="text-xs text-slate-500 mt-0.5">Siswa: <span class="font-semibold text-slate-800">{{ $pc->student->name }}</span> ({{ $pc->student->grade }} - {{ $pc->student->school }})</p>
</div>
<div class="flex flex-col items-end">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/60 font-semibold text-xs shadow-xs">
<span class="material-symbols-outlined text-[15px]">verified</span>
<span>Lunas Diverifikasi</span>
</span>
<span class="text-[10px] text-slate-400 font-mono mt-1">{{ $pc->receipt_no ?: "-" }}</span>
</div>
</div>
<div class="grid grid-cols-3 gap-3 my-4 p-3.5 bg-slate-50/70 rounded-xl border border-slate-100 text-xs">
<div>
<span class="text-[11px] text-slate-400 block mb-0.5">Total Biaya Les</span>
<span class="text-base font-bold text-slate-800">{{ \App\Support\Fmt::rupiah($pc->amount) }}</span>
<span class="text-[10px] text-emerald-600 block mt-0.5">✓ Bebas biaya PPN</span>
</div>
<div>
<span class="text-[11px] text-slate-400 block mb-0.5">Keterlaksanaan Sesi</span>
<span class="text-base font-bold text-slate-800">{{ $pc->used }} / 8 Sesi</span>
<div class="w-full bg-slate-200 h-1.5 rounded-full overflow-hidden mt-1">
<div class="bg-emerald-500 h-full rounded-full" style="width: {{ min(100, (int) round($pc->used / 8 * 100)) }}%"></div>
</div>
</div>
<div>
<span class="text-[11px] text-slate-400 block mb-0.5">Verifikasi Kasir</span>
<span class="font-semibold text-slate-700 block">{{ $pc->paid_at ? \App\Support\Fmt::dateShort($pc->paid_at) : "-" }}</span>
<span class="text-[10px] text-slate-400">Admin Kasir</span>
</div>
</div>
<div class="text-xs text-slate-500 flex items-center justify-between pb-3">
<span>Cakupan: {{ $pc->used }} sesi terlaksana</span>
<span class="text-emerald-600 font-medium">{{ \App\Support\Fmt::method($pc->student->method) }}</span>
</div>
</div>
<div class="pt-3 border-t border-slate-100 flex items-center justify-between">
<span class="text-[11px] text-slate-400 flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px] text-emerald-600">verified_user</span>
<span>Kuitansi resmi sah &amp; terdaftar</span>
</span>
<button class="px-3.5 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-xl text-xs font-semibold flex items-center gap-1.5 transition-colors border border-blue-200/60" onclick="showToast('Mengunduh Kuitansi {{ $pc->receipt_no ?: "-" }} (PDF)...', 'download')" type="button">
<span class="material-symbols-outlined text-[15px]">download</span>
<span>Unduh Kuitansi PDF</span>
</button>
</div>
</div>

@else
<!-- Card 2: Menunggu Pembayaran (Farhan Nugraha - November 2026) -->
<div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm relative flex flex-col justify-between transition-all" id="card-{{ $pc->id }}">
<div>
<div class="flex items-center justify-between pb-3 border-b border-slate-100">
<div>
<div class="flex items-center gap-2 mb-1">
<span class="text-[11px] font-bold text-amber-600 uppercase tracking-wider">Menunggu Pelunasan</span>
<span class="w-1 h-1 rounded-full bg-slate-300"></span>
<span class="text-[11px] text-slate-500">{{ $pc->student->program }}</span>
</div>
<h3 class="text-base font-bold text-slate-900">Tagihan Periode: {{ $pc->period }}</h3>
<p class="text-xs text-slate-500 mt-0.5">Siswa: <span class="font-semibold text-slate-800">{{ $pc->student->name }}</span> ({{ $pc->student->grade }} - {{ $pc->student->school }})</p>
</div>
<div class="flex flex-col items-end">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 border border-amber-200/60 font-semibold text-xs shadow-xs">
<span class="material-symbols-outlined text-[15px]">pending</span>
<span>Belum Dibayar</span>
</span>
<span class="text-[10px] text-amber-600 font-semibold mt-1">Jatuh Tempo: {{ $pc->due_date ? \App\Support\Fmt::dateShort($pc->due_date) : "-" }}</span>
</div>
</div>
<!-- Nominal & Account Info -->
<div class="my-4 p-3.5 bg-slate-50/70 rounded-xl border border-slate-100 text-xs">
<div class="flex items-center justify-between mb-3">
<div>
<span class="text-[11px] text-slate-400 block">Nominal Tagihan Periode Ini</span>
<span class="text-lg font-bold text-amber-600">{{ \App\Support\Fmt::rupiah($pc->amount) }}</span>
</div>
<div class="text-right">
<span class="text-[11px] text-slate-400 block">Metode Pembayaran</span>
<span class="font-semibold text-slate-700">Transfer Bank Resmi</span>
</div>
</div>
<!-- Bank Accounts Mini List -->
<div class="grid grid-cols-2 gap-2 text-[11px]">
<div class="p-2.5 bg-white rounded-lg border border-slate-200/80 flex items-center justify-between">
<div>
<span class="font-bold text-blue-600">MANDIRI:</span>
<span class="font-mono text-slate-700 ml-1">124-00-1928374-1</span>
</div>
<button class="text-blue-600 hover:text-blue-800 font-semibold text-[10px] ml-1 px-1.5 py-0.5 rounded bg-blue-50" onclick="copyText('1240019283741', 'No. Rekening Mandiri')" type="button">Salin</button>
</div>
<div class="p-2.5 bg-white rounded-lg border border-slate-200/80 flex items-center justify-between">
<div>
<span class="font-bold text-blue-600">BCA:</span>
<span class="font-mono text-slate-700 ml-1">542-019-2831</span>
</div>
<button class="text-blue-600 hover:text-blue-800 font-semibold text-[10px] ml-1 px-1.5 py-0.5 rounded bg-blue-50" onclick="copyText('5420192831', 'No. Rekening BCA')" type="button">Salin</button>
</div>
</div>
<div class="mt-2 text-[10px] text-slate-400 flex items-center justify-between">
<span>a.n. PT One Private Edukasi</span>
<span class="text-slate-500 font-mono">Format: SPP_{{ $pc->student->name }}_{{ $pc->period }}</span>
</div>
</div>
</div>
<div class="pt-3 border-t border-slate-100 flex items-center justify-between">
<span class="text-[11px] text-slate-400 flex items-center gap-1">
<span class="material-symbols-outlined text-[15px] text-amber-500">info</span>
<span>Verifikasi WhatsApp &lt; 2 jam</span>
</span>
<a class="px-3.5 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-semibold flex items-center gap-1.5 transition-colors shadow-xs" href="{{ \App\Support\Fmt::waLink("081198760001", "Halo Admin Keuangan One Private, saya ingin mengonfirmasi bukti transfer " . $pc->student->name . " sebesar " . \App\Support\Fmt::rupiah($pc->amount) . ".") }}" target="_blank">
<span class="material-symbols-outlined text-[15px]">chat</span>
<span>Konfirmasi Bukti Transfer via WhatsApp</span>
</a>
</div>
</div>
</div>

@endif

@empty
<div class="text-xs text-slate-400 p-4">Belum ada tagihan.</div>
@endforelse
</div><!-- Toolbar Filter Container (SCREEN_4 Styled Toolbar) -->
<div class="bg-white rounded-2xl border border-slate-200/80 p-3.5 shadow-sm mb-6 flex flex-col gap-3">
<!-- Segmented Tab Pills & View Mode -->
<div class="flex items-center justify-between gap-4">
<div class="inline-flex p-1 bg-slate-100 rounded-xl gap-1">
<button class="bg-white text-blue-600 font-semibold px-3 py-1.5 rounded-lg text-xs shadow-xs transition-colors" id="tab-all" onclick="filterCategory('all')" type="button">Semua Tagihan</button>
<button class="text-slate-600 hover:text-slate-900 px-3 py-1.5 rounded-lg text-xs font-medium transition-colors" id="tab-lunas" onclick="filterCategory('lunas')" type="button">Lunas Diverifikasi</button>
<button class="text-slate-600 hover:text-slate-900 px-3 py-1.5 rounded-lg text-xs font-medium transition-colors" id="tab-pending" onclick="filterCategory('pending')" type="button">Menunggu Pembayaran</button>
<button class="text-slate-600 hover:text-slate-900 px-3 py-1.5 rounded-lg text-xs font-medium transition-colors" id="tab-history" onclick="filterCategory('history')" type="button">Riwayat Transaksi</button>
</div>
<div class="flex items-center gap-1.5 text-xs text-slate-500">
<span>Tampilan:</span>
<div class="inline-flex border border-slate-200 rounded-lg p-0.5 bg-slate-50">
<button class="flex items-center gap-1 px-2.5 py-1 bg-white rounded-md text-blue-600 font-semibold shadow-xs" type="button">
<span class="material-symbols-outlined text-[15px]">table_rows</span>
<span>Tabel</span>
</button>
<button class="flex items-center gap-1 px-2.5 py-1 text-slate-500 hover:text-slate-800 font-medium transition-colors" onclick="showToast('Beralih ke tampilan kartu', 'grid_view')" type="button">
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
<input class="w-full pl-9 pr-3 py-2 bg-white border border-slate-200 rounded-xl text-xs text-slate-700 placeholder:text-slate-400 focus:outline-none focus:border-blue-500 transition-colors" id="table-search" oninput="searchTable(this.value)" placeholder="Cari no. kuitansi, nama siswa, atau bulan..." type="text"/>
</div>
<!-- Dropdowns -->
<div class="relative">
<select class="appearance-none bg-white border border-slate-200 rounded-xl px-3 py-2 pr-7 text-xs text-slate-700 focus:outline-none focus:border-blue-500 cursor-pointer" id="filter-student" onchange="filterStudent(this.value)"><option value="all">Semua Siswa</option>
@foreach($children as $c)<option value="{{ $c->name }}">{{ $c->name }} ({{ $c->grade }})</option>@endforeach
</select>
<span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 text-[16px] pointer-events-none">expand_more</span>
</div>
<div class="relative">
<select class="appearance-none bg-white border border-slate-200 rounded-xl px-3 py-2 pr-7 text-xs text-slate-700 focus:outline-none focus:border-blue-500 cursor-pointer">
<option>Tahun Ajaran 2026/2027</option>
<option>Tahun Ajaran 2025/2026</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 text-[16px] pointer-events-none">expand_more</span>
</div>
<!-- Filter Button Icon -->
<button class="w-9 h-9 border border-slate-200 rounded-xl text-slate-500 hover:text-slate-700 hover:bg-slate-50 flex items-center justify-center transition-colors shrink-0" onclick="showToast('Membuka filter lanjutan...', 'tune')" title="Filter Tambahan" type="button">
<span class="material-symbols-outlined text-[18px]">tune</span>
</button>
</div>
</div>
<!-- DATA TABLE (Format & Styling Identik SCREEN_4) -->
<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden mb-6">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-semibold uppercase tracking-wider text-slate-500">
<th class="py-3.5 px-4">NO. KUITANSI / INVOICE</th>
<th class="py-3.5 px-4">SISWA &amp; KELAS</th>
<th class="py-3.5 px-4">PAKET / PROGRAM</th>
<th class="py-3.5 px-4">SESI BELAJAR</th>
<th class="py-3.5 px-4">NOMINAL</th>
<th class="py-3.5 px-4">STATUS</th>
<th class="py-3.5 px-4 text-right">AKSI</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 text-xs" id="invoice-table-body">
@foreach($rows as $pc)

@if($pc->status === 'lunas')
<tr class="hover:bg-slate-50/60 transition-colors" data-status="lunas" data-student="Aisyah Putri">
<td class="py-3.5 px-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 font-bold text-xs flex items-center justify-center shrink-0 border border-blue-200/60">{{ \App\Support\Fmt::initials($pc->student->name) }}</div>
<div class="flex flex-col">
<span class="font-bold text-slate-800 text-xs font-mono">{{ $pc->receipt_no ?: "-" }}</span>
<span class="text-[11px] text-slate-400">{{ $pc->invoice_no }}</span>
</div>
</div>
</td>
<td class="py-3.5 px-4 whitespace-nowrap">
<div class="flex flex-col">
<span class="font-bold text-slate-800 text-xs">{{ $pc->student->name }}</span>
<span class="text-[11px] text-slate-400">{{ $pc->student->grade }} • {{ $pc->student->school }}</span>
</div>
</td>
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-200/50 text-[11px] font-medium">
<span class="material-symbols-outlined text-[13px]">school</span> {{ $pc->student->program }}
</span>
</td>
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="text-slate-800 font-semibold text-xs">8 Sesi</span>
<span class="text-[11px] text-emerald-600 block font-medium">{{ $pc->used }} Selesai</span>
</td>
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="font-mono font-bold text-slate-800 text-xs">{{ \App\Support\Fmt::rupiah($pc->amount) }}</span>
</td>
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/60 text-[11px] font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Lunas
</span>
</td>
<td class="py-3.5 px-4 whitespace-nowrap text-right">
<div class="inline-flex items-center gap-1.5">
<button class="px-2.5 py-1 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 text-[11px] font-semibold transition-colors flex items-center gap-1 shadow-2xs" onclick="showToast('Mengunduh Kuitansi {{ $pc->receipt_no ?: "-" }}...', 'download')" type="button">
<span class="material-symbols-outlined text-[14px] text-blue-600">receipt_long</span>
<span>Unduh Kuitansi</span>
</button>
<button class="p-1 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</div>
</td>
</tr>
@else
<tr class="hover:bg-slate-50/60 transition-colors" data-status="pending" data-student="Farhan Nugraha">
<td class="py-3.5 px-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-amber-100 text-amber-700 font-bold text-xs flex items-center justify-center shrink-0 border border-amber-200/60">{{ \App\Support\Fmt::initials($pc->student->name) }}</div>
<div class="flex flex-col">
<span class="font-bold text-slate-800 text-xs font-mono">{{ $pc->invoice_no }}</span>
<span class="text-[11px] text-amber-600 font-medium">Belum Diterbitkan KWT</span>
</div>
</div>
</td>
<td class="py-3.5 px-4 whitespace-nowrap">
<div class="flex flex-col">
<span class="font-bold text-slate-800 text-xs">{{ $pc->student->name }}</span>
<span class="text-[11px] text-slate-400">{{ $pc->student->grade }} • {{ $pc->student->school }}</span>
</div>
</td>
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-indigo-50 text-indigo-700 border border-indigo-200/50 text-[11px] font-medium">
<span class="material-symbols-outlined text-[13px]">menu_book</span> {{ $pc->student->program }}
</span>
</td>
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="text-slate-800 font-semibold text-xs">{{ $pc->student->sessions()->count() }} Sesi</span>
<span class="text-[11px] text-slate-400 block font-medium">Jadwal Terbit</span>
</td>
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="font-mono font-bold text-amber-600 text-xs">{{ \App\Support\Fmt::rupiah($pc->amount) }}</span>
</td>
<td class="py-3.5 px-4 whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-700 border border-amber-200/60 text-[11px] font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Menunggu
</span>
</td>
<td class="py-3.5 px-4 whitespace-nowrap text-right">
<div class="inline-flex items-center gap-1.5">
<a class="px-2.5 py-1 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-[11px] font-semibold transition-colors flex items-center gap-1 shadow-xs" href="{{ \App\Support\Fmt::waLink("081198760001", "Halo Admin Keuangan, saya kirim bukti transfer " . $pc->student->name . ".") }}" target="_blank">
<span class="material-symbols-outlined text-[14px]">upload_file</span>
<span>Bayar / Konfirmasi</span>
</a>
<button class="p-1 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</div>
</td>
</tr>
@endif

@endforeach
</tbody>
</table>
</div>
<!-- Table Pagination Footer (Identik SCREEN_4) -->
<div class="p-4 bg-white border-t border-slate-100 flex items-center justify-between">
<span class="text-xs text-slate-500" id="table-showing-text">
  Menampilkan <strong class="font-semibold text-slate-700">1 – 5</strong> dari <strong class="font-semibold text-slate-700">5</strong> transaksi
</span>
<div class="flex items-center gap-1.5">
<button class="px-3 py-1.5 text-xs border border-slate-200 rounded-lg text-slate-600 hover:bg-slate-50 transition-colors disabled:opacity-40" disabled="" type="button">
  Sebelumnya
</button>
<button class="bg-blue-600 text-white rounded-lg w-7 h-7 flex items-center justify-center text-xs font-semibold shadow-xs" type="button">1</button>
<button class="px-3 py-1.5 text-xs border border-slate-200 rounded-lg text-slate-600 hover:bg-slate-50 transition-colors disabled:opacity-40" disabled="" type="button">
  Selanjutnya
</button>
</div>
</div>
</div>
<!-- Bottom Page Copyright Footer (Persis SCREEN_4) -->
<footer class="text-center text-xs text-slate-400 py-6">
  © 2026 One Private Course. Sistem Manajemen Bimbel &amp; Les Privat.
</footer>
</main>
</div>
<!-- Toast Notification -->
<div class="fixed bottom-6 right-6 z-50 transform translate-y-24 opacity-0 transition-all duration-300 pointer-events-none" id="toast-notification">
<div class="bg-slate-900 text-white px-4 py-3 rounded-xl shadow-xl flex items-center gap-2.5 text-xs font-semibold">
<span class="material-symbols-outlined text-emerald-400 text-[18px]" id="toast-icon">check_circle</span>
<span id="toast-message">Notifikasi</span>
</div>
</div>
<script>
  function showToast(message, icon = 'check_circle') {
    const toast = document.getElementById('toast-notification');
    const toastMsg = document.getElementById('toast-message');
    const toastIcon = document.getElementById('toast-icon');
    
    toastMsg.innerText = message;
    toastIcon.innerText = icon;

    toast.classList.remove('translate-y-24', 'opacity-0');
    toast.classList.add('translate-y-0', 'opacity-100');

    setTimeout(() => {
      toast.classList.add('translate-y-24', 'opacity-0');
      toast.classList.remove('translate-y-0', 'opacity-100');
    }, 3000);
  }

  function copyText(text, label) {
    navigator.clipboard.writeText(text).then(() => {
      showToast(`${label} (${text}) berhasil disalin!`, 'content_copy');
    }).catch(() => {
      showToast(`Salin: ${text}`, 'content_copy');
    });
  }

  function switchProfile(profile) {
    const btnAisyah = document.getElementById('top-btn-aisyah');
    const btnFarhan = document.getElementById('top-btn-farhan');
    const cardAisyah = document.getElementById('card-aisyah');
    const cardFarhan = document.getElementById('card-farhan');

    if (profile === 'aisyah') {
      btnAisyah.className = 'bg-white text-blue-600 font-semibold px-2.5 py-1 rounded-lg shadow-sm transition-colors flex items-center gap-1.5';
      btnFarhan.className = 'text-slate-600 hover:text-slate-900 px-2.5 py-1 rounded-lg font-medium transition-colors flex items-center gap-1.5';
      cardAisyah.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      cardAisyah.classList.add('ring-2', 'ring-blue-500');
      setTimeout(() => cardAisyah.classList.remove('ring-2', 'ring-blue-500'), 1400);
      showToast('Menampilkan data aktif: Aisyah Putri (SMP 8)', 'person');
    } else {
      btnFarhan.className = 'bg-white text-blue-600 font-semibold px-2.5 py-1 rounded-lg shadow-sm transition-colors flex items-center gap-1.5';
      btnAisyah.className = 'text-slate-600 hover:text-slate-900 px-2.5 py-1 rounded-lg font-medium transition-colors flex items-center gap-1.5';
      cardFarhan.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      cardFarhan.classList.add('ring-2', 'ring-amber-500');
      setTimeout(() => cardFarhan.classList.remove('ring-2', 'ring-amber-500'), 1400);
      showToast('Menampilkan data aktif: Farhan Nugraha (SMA 12)', 'person');
    }
  }

  function filterCategory(cat) {
    const tabs = ['tab-all', 'tab-lunas', 'tab-pending', 'tab-history'];
    tabs.forEach(t => {
      const el = document.getElementById(t);
      el.className = 'text-slate-600 hover:text-slate-900 px-3 py-1.5 rounded-lg text-xs font-medium transition-colors';
    });

    const activeTab = document.getElementById('tab-' + cat);
    if (activeTab) {
      activeTab.className = 'bg-white text-blue-600 font-semibold px-3 py-1.5 rounded-lg text-xs shadow-xs transition-colors';
    }

    const rows = document.querySelectorAll('#invoice-table-body tr');
    let visibleCount = 0;
    rows.forEach(r => {
      const status = r.getAttribute('data-status');
      if (cat === 'all' || cat === 'history') {
        r.style.display = '';
        visibleCount++;
      } else if (cat === 'lunas' && status === 'lunas') {
        r.style.display = '';
        visibleCount++;
      } else if (cat === 'pending' && status === 'pending') {
        r.style.display = '';
        visibleCount++;
      } else {
        r.style.display = 'none';
      }
    });

    document.getElementById('table-showing-text').innerHTML = `Menampilkan <strong class="font-semibold text-slate-700">1 – ${visibleCount}</strong> dari <strong class="font-semibold text-slate-700">${visibleCount}</strong> transaksi`;
  }

  function filterStudent(studentName) {
    const rows = document.querySelectorAll('#invoice-table-body tr');
    let visibleCount = 0;
    rows.forEach(r => {
      const student = r.getAttribute('data-student');
      if (studentName === 'all' || student === studentName) {
        r.style.display = '';
        visibleCount++;
      } else {
        r.style.display = 'none';
      }
    });
    document.getElementById('table-showing-text').innerHTML = `Menampilkan <strong class="font-semibold text-slate-700">1 – ${visibleCount}</strong> dari <strong class="font-semibold text-slate-700">${visibleCount}</strong> transaksi`;
  }

  function searchTable(query) {
    const q = query.toLowerCase().trim();
    const rows = document.querySelectorAll('#invoice-table-body tr');
    let visibleCount = 0;
    rows.forEach(r => {
      const text = r.textContent.toLowerCase();
      if (text.includes(q)) {
        r.style.display = '';
        visibleCount++;
      } else {
        r.style.display = 'none';
      }
    });
    document.getElementById('table-showing-text').innerHTML = `Menampilkan <strong class="font-semibold text-slate-700">1 – ${visibleCount}</strong> dari <strong class="font-semibold text-slate-700">${visibleCount}</strong> transaksi`;
  }
</script>
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

OPC.on('+ Konfirmasi Bayar', () => window.open('https://wa.me/6281198760001?text=' + encodeURIComponent('Halo Admin Keuangan, saya ingin mengonfirmasi pembayaran les.'), '_blank'), {sel: 'button', exact: false});
document.querySelectorAll('button').forEach(b => { if (OPC.label(b) === '' && b.textContent.trim() === 'more_vert') b.addEventListener('click', () => OPC.toast('Gunakan tombol Unduh Kuitansi / Konfirmasi via WhatsApp.', true)); });
</script></body></html>