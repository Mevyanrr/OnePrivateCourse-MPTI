<!DOCTYPE html>

<html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="web_dashboard" name="shell-type"/>
<title>One Private Course - Sistem Alokasi Sesi Les</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<style>
    @@layer base {
      html, body {
        margin: 0;
        padding: 0;
        font-family: 'Plus Jakarta Sans', sans-serif;
      }
      body {
        overscroll-behavior: none;
      }
    }
    ::-webkit-scrollbar {
      display: none;
    }
  </style>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "tertiary-fixed": "#e1e0ff",
            "on-secondary-fixed-variant": "#005049",
            "surface-dim": "#d2d9f4",
            "on-tertiary-container": "#f1eeff",
            "outline-variant": "#c3c6d7",
            "on-background": "#131b2e",
            "primary-container": "#2563eb",
            "primary-fixed-dim": "#b4c5ff",
            "tertiary-fixed-dim": "#c0c1ff",
            "surface-variant": "#dae2fd",
            "surface-container": "#eaedff",
            "background": "#faf8ff",
            "error-container": "#ffdad6",
            "on-surface": "#131b2e",
            "primary": "#004ac6",
            "primary-fixed": "#dbe1ff",
            "on-tertiary-fixed": "#07006c",
            "inverse-surface": "#283044",
            "surface-container-lowest": "#ffffff",
            "on-secondary-container": "#006f66",
            "tertiary": "#3e3fcc",
            "on-tertiary-fixed-variant": "#2f2ebe",
            "on-secondary": "#ffffff",
            "inverse-on-surface": "#eef0ff",
            "on-error-container": "#93000a",
            "surface": "#faf8ff",
            "on-tertiary": "#ffffff",
            "on-surface-variant": "#434655",
            "on-primary-container": "#eeefff",
            "surface-container-high": "#e2e7ff",
            "on-primary-fixed-variant": "#003ea8",
            "surface-tint": "#0053db",
            "secondary-fixed-dim": "#6bd8cb",
            "on-primary-fixed": "#00174b",
            "error": "#ba1a1a",
            "surface-container-highest": "#dae2fd",
            "secondary-container": "#86f2e4",
            "tertiary-container": "#585be6",
            "secondary-fixed": "#89f5e7",
            "inverse-primary": "#b4c5ff",
            "on-secondary-fixed": "#00201d",
            "outline": "#737686",
            "secondary": "#006a61",
            "on-primary": "#ffffff",
            "surface-container-low": "#f2f3ff",
            "on-error": "#ffffff",
            "surface-bright": "#faf8ff"
          },
          fontFamily: {
            sans: ["Plus Jakarta Sans", "sans-serif"]
          }
        }
      }
    };
  </script>
</head>
<body class="bg-surface font-sans text-on-surface antialiased">
<!-- Fixed Left Sidebar -->
<aside class="fixed left-0 top-0 h-full w-[258px] bg-surface-container-lowest border-r border-outline-variant/40 z-50 flex flex-col justify-between py-5">
<div class="flex flex-col">
<div class="px-5 flex items-center gap-3 mb-6">
<div class="w-10 h-10 rounded-xl bg-primary-container flex items-center justify-center shrink-0 shadow-sm shadow-primary/20">
<span class="material-symbols-outlined text-on-primary text-[22px]">school</span>
</div>
<div class="flex flex-col min-w-0">
<span class="text-sm font-bold text-primary-container truncate tracking-tight">One Private Course</span>
<span class="text-[11px] text-on-surface-variant font-medium truncate">Sistem Manajemen Bimbel</span>
</div>
</div>
<div class="px-5 mb-5">
<button class="w-full h-10 bg-primary-container hover:bg-primary text-on-primary text-sm font-semibold rounded-lg flex items-center justify-center gap-2 transition-colors shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>Tambah Sesi Les</span>
</button>
</div>
<nav class="flex flex-col gap-1 px-3">
<a class="flex items-center justify-between px-3 py-2.5 rounded-lg bg-surface-container-low text-primary-container font-semibold transition-colors" href="{{ route('admin.dashboard') }}">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[20px]">grid_view</span>
<span class="text-sm">Dashboard Ringkasan</span>
</div>
<span class="w-2 h-2 rounded-full bg-primary-container shrink-0"></span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" href="{{ route('admin.jadwal') }}">
<span class="material-symbols-outlined text-[20px]">calendar_month</span>
<span class="text-sm font-medium">Jadwal &amp; Sesi Les</span>
</a>
<a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" href="{{ route('admin.siswa') }}">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[20px]">group</span>
<span class="text-sm font-medium">Database Siswa</span>
</div>
<span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface text-[11px] font-semibold">{{ $nav['students'] }}</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" href="{{ route('admin.tutor') }}">
<span class="material-symbols-outlined text-[20px]">person_apron</span>
<span class="text-sm font-medium">Tutor &amp; Guru Pengajar</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" href="{{ route('admin.presensi') }}">
<span class="material-symbols-outlined text-[20px]">assignment_turned_in</span>
<span class="text-sm font-medium">Presensi &amp; Laporan</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" href="{{ route('admin.pembayaran') }}">
<span class="material-symbols-outlined text-[20px]">payments</span>
<span class="text-sm font-medium">Pembayaran</span>
</a>
<div class="border-t border-outline-variant/30 my-2 mx-1"></div>
<a class="flex items-center justify-between px-3 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" href="{{ route('admin.konfirmasi') }}">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[20px]">pending_actions</span>
<span class="text-sm font-medium">Konfirmasi Sesi</span>
</div>
<span class="px-2 py-0.5 rounded-full bg-error-container text-error text-[11px] font-bold">{{ $nav['confirm'] }}</span>
</a>
</nav>
</div>
<div class="px-5 pt-3">
<div class="p-3 bg-surface-container-low rounded-xl flex items-center gap-3 border border-outline-variant/30">
<span class="material-symbols-outlined text-primary-container text-[20px]">support_agent</span>
<div class="flex flex-col min-w-0">
<span class="text-xs font-bold text-on-surface truncate">Bantuan Cabang</span>
<span class="text-[11px] text-on-surface-variant truncate">Lentera OS v2.4 LTS</span>
</div>
</div>
</div>
</aside>
<!-- Main Content Wrapper -->
<div class="pl-[258px]">
<!-- Top Bar -->
<header class="fixed top-0 left-[258px] right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md border-b border-outline-variant/40 z-40 flex items-center justify-between px-8">
<div class="flex items-center gap-2 text-sm">
<span class="text-on-surface-variant">Operasional Cabang</span>
<span class="text-outline-variant font-light">/</span>
<span class="text-on-surface font-semibold">Dashboard Ringkasan</span>
</div>
<div class="flex items-center gap-4">
<div class="text-right flex flex-col">
<span class="text-xs font-bold text-on-surface">{{ auth()->user()->name }}</span>
<span class="text-[11px] text-on-surface-variant">Admin Cabang Tebet</span>
</div>
<div class="w-9 h-9 rounded-full bg-primary/10 text-primary border border-primary/20 flex items-center justify-center font-bold text-xs">
          AP
        </div>
</div>
</header>
<!-- Page Body -->
<main class="relative pt-16 bg-surface min-h-screen p-6 xl:p-8">
<div class="flex flex-col w-full">
<!-- Interactive Workbench Environment -->
<div class="relative w-full rounded-2xl overflow-hidden bg-surface-container-low shadow-sm border border-outline-variant/30">
<!-- BACKGROUND LAYER: Calendar Schedule Underlay -->
<div class="pointer-events-none select-none opacity-30 blur-[2px] p-6 grid grid-cols-12 gap-4 bg-surface-container-lowest">
<div class="col-span-12 flex items-center justify-between pb-4 border-b border-outline-variant/30">
<div class="flex items-center gap-3">
<span class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center font-bold text-primary">24</span>
<div>
<div class="text-lg font-bold text-on-surface">Oktober 2026 • Pekan 4</div>
<div class="text-xs text-on-surface-variant">Cabang Tebet Jakarta Selatan (Total 48 Sesi Aktif)</div>
</div>
</div>
<div class="flex items-center gap-2">
<span class="px-3 py-1.5 rounded-lg bg-surface-container text-xs font-semibold text-on-surface">Tampilan Pekan</span>
<span class="px-3 py-1.5 rounded-lg bg-surface-container text-xs font-semibold text-on-surface">Filter Tutor</span>
</div>
</div>
<div class="col-span-3 space-y-3">
<div class="text-xs font-bold text-on-surface-variant uppercase">Senin, 20 Okt</div>
<div class="p-3 rounded-lg bg-surface-container-high border-l-4 border-primary text-xs">
<div class="font-bold text-on-surface">09:00 - 10:30 WIB</div>
<div class="text-on-surface-variant">B. Inggris SMA • Kak Nadia</div>
</div>
</div>
<div class="col-span-3 space-y-3">
<div class="text-xs font-bold text-on-surface-variant uppercase">Selasa, 21 Okt</div>
<div class="p-3 rounded-lg bg-error-container/40 border-l-4 border-error text-xs">
<div class="font-bold text-error">16:00 - 17:30 WIB</div>
<div class="text-on-surface">Farhan Nugraha • Kak Fikri (Zoom)</div>
</div>
</div>
<div class="col-span-3 space-y-3">
<div class="text-xs font-bold text-on-surface-variant uppercase">Rabu, 22 Okt</div>
<div class="p-3 rounded-lg bg-surface-container border-l-4 border-secondary text-xs">
<div class="font-bold text-on-surface">15:00 - 16:30 WIB</div>
<div class="text-on-surface-variant">Kimia Medis • Kak Dimas</div>
</div>
</div>
<div class="col-span-3 space-y-3">
<div class="text-xs font-bold text-on-surface-variant uppercase">Kamis, 23 Okt</div>
<div class="p-3 rounded-lg bg-secondary-container/30 border-l-4 border-secondary text-xs">
<div class="font-bold text-secondary">16:00 - 17:30 WIB</div>
<div class="text-on-surface">Tahsin Al-Qur'an • Kak Rina M.Pd</div>
</div>
</div>
</div>
<!-- FOREGROUND MODAL WORKBENCH CANVAS OVERLAY -->
<div class="relative inset-0 bg-inverse-surface/35 backdrop-blur-sm p-4 lg:p-6 flex flex-col items-center justify-center">
<!-- Top Control & Status Information Bar -->
<div class="w-full max-w-5xl mb-6 flex flex-wrap items-center justify-between gap-4 bg-surface-container-lowest/95 backdrop-blur-md px-6 py-4 rounded-2xl border border-outline-variant/30 shadow-lg">
<div class="flex items-center gap-3.5">
<div class="w-10 h-10 rounded-xl bg-primary-container text-on-primary flex items-center justify-center shadow-sm shrink-0">
<span class="material-symbols-outlined text-[22px]">dynamic_form</span>
</div>
<div>
<div class="text-base font-bold text-on-surface leading-tight">
Sistem Alokasi &amp; Validasi Sesi Les
</div>
<div class="text-xs text-on-surface-variant mt-0.5">
Engine Deteksi Bentrok Otomatis (Real-time Smart Scheduler Lentera Edukasi v2.4)
</div>
</div>
</div>
<!-- Status Badges -->
<div class="flex items-center gap-2.5 flex-wrap">
<span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-secondary-container/40 text-secondary border border-secondary/20 text-xs font-semibold">
<span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
Atas: Skenario 1 (State Aman)
</span>
<span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-error-container/60 text-error border border-error/20 text-xs font-semibold">
<span class="w-2 h-2 rounded-full bg-error animate-ping"></span>
Bawah: Skenario 2 (Conflict Auto-Fix)
</span>
</div>
</div>
<!-- SIDE-BY-SIDE DUAL MODAL COMPARISON CONTAINER -->
<div class="w-full max-w-5xl flex flex-col gap-8">
<!-- =================================================================== -->
<!-- MODAL CARD 1: TAMBAH SESI LES (STATE AMAN - NO CONFLICT)           -->
<!-- =================================================================== -->
<div class="flex flex-col bg-surface-container-lowest rounded-2xl border border-outline-variant/40 shadow-xl overflow-hidden">
<!-- Modal 1 Header -->
<div class="p-6 border-b border-outline-variant/30 flex items-start justify-between gap-4">
<div class="flex items-start gap-3.5">
<div class="w-10 h-10 rounded-xl bg-secondary-container/50 text-secondary border border-secondary/20 flex items-center justify-center shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[24px]">event_available</span>
</div>
<div>
<div class="flex items-center gap-2.5 flex-wrap">
<h2 class="text-lg font-bold text-on-surface">Tambah Sesi Les Baru</h2>
<span class="px-2.5 py-0.5 rounded-full bg-secondary-container/60 text-on-secondary-container text-xs font-bold border border-secondary/20">
State Aman
</span>
</div>
<p class="text-xs text-on-surface-variant mt-1 leading-relaxed">
Alokasikan sesi privat siswa dengan validasi ketersediaan tutor dan jadwal.
</p>
</div>
</div>
<button class="text-on-surface-variant hover:text-on-surface p-1.5 rounded-lg hover:bg-surface-container transition-colors shrink-0" title="Tutup Dialog" type="button">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
<!-- Quick Scenario Header Anchor -->
<div class="px-6 py-2.5 bg-surface-container-low/50 border-b border-outline-variant/20 flex items-center justify-between text-xs">
<div class="flex items-center gap-2">
<span class="px-2.5 py-1 bg-surface-container-lowest text-primary font-bold rounded-lg border border-outline-variant/30 flex items-center gap-1.5 shadow-xs">
<span class="material-symbols-outlined text-[16px] text-secondary">check_circle</span>
1. Skenario Penambahan (Aman)
</span>
<span class="text-on-surface-variant font-medium">Mode: Input Langsung</span>
</div>
<div class="text-secondary font-bold flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-secondary"></span> Siap Diterbitkan
</div>
</div>
<!-- Modal 1 Body (7 cols Form : 5 cols Validator Card) -->
<div class="p-6 grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
<!-- Form Kolom Kiri (lg:col-span-7) -->
<div class="lg:col-span-7 flex flex-col gap-4">
<!-- Siswa Selector -->
<div class="flex flex-col gap-1.5">
<label class="text-xs text-on-surface font-bold flex items-center justify-between">
<span>Pilih Siswa &amp; Lokasi Domisili</span>
<span class="text-[11px] text-primary font-medium tracking-wide">ID: SIS-2026-0842</span>
</label>
<div class="p-3 bg-surface-container-lowest rounded-xl border border-outline-variant/60 flex items-center justify-between gap-3 shadow-xs">
<div class="flex items-center gap-3 min-w-0">
<div class="w-9 h-9 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center font-bold text-xs shrink-0">
AP
</div>
<div class="min-w-0">
<div class="text-xs font-bold text-on-surface truncate">Aisyah Putri (Kelas 8 SMP)</div>
<div class="text-[11px] text-on-surface-variant truncate">Jalan Tebet Barat Dalam VII No. 14</div>
</div>
</div>
<span class="px-2.5 py-1 rounded-md bg-primary/10 text-primary text-[11px] font-semibold shrink-0 whitespace-nowrap">
Home Visit - Tebet
</span>
</div>
</div>
<!-- Tutor Selector with Availability Badge -->
<div class="flex flex-col gap-1.5">
<label class="text-xs text-on-surface font-bold flex items-center justify-between">
<span>Pilih Tutor Pengajar</span>
<span class="text-[11px] text-secondary font-semibold flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-secondary inline-block"></span>
Tersedia (Sisa 4 slot pekan ini)
</span>
</label>
<div class="p-3 bg-surface-container-lowest rounded-xl border border-outline-variant/60 flex items-center justify-between shadow-xs">
<div class="flex items-center gap-3 min-w-0">
<div class="w-9 h-9 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center font-bold text-xs shrink-0">
KR
</div>
<div class="min-w-0">
<div class="text-xs font-bold text-on-surface truncate">Kak Rina M.Pd</div>
<div class="text-[11px] text-on-surface-variant truncate">Spesialisasi: Mengaji, Tahsin &amp; PAI</div>
</div>
</div>
<span class="material-symbols-outlined text-outline-variant text-[20px] shrink-0">expand_more</span>
</div>
</div>
<!-- Mata Pelajaran & Paket -->
<div class="flex flex-col gap-1.5">
<label class="text-xs text-on-surface font-bold">Mata Pelajaran &amp; Paket Kursus</label>
<div class="p-3 bg-surface-container-low rounded-xl border border-outline-variant/40 flex items-center justify-between gap-2">
<div class="flex items-center gap-2 text-on-surface min-w-0">
<span class="material-symbols-outlined text-[18px] text-primary shrink-0">menu_book</span>
<span class="text-xs font-semibold truncate">Mengaji &amp; Tahsin Al-Qur'an</span>
</div>
<span class="text-[11px] text-on-surface-variant font-medium bg-surface-container px-2.5 py-1 rounded-md shrink-0 whitespace-nowrap">
Paket Reguler (8 Sesi)
</span>
</div>
</div>
<!-- Tanggal & Jam Grid -->
<div class="grid grid-cols-2 gap-3">
<div class="flex flex-col gap-1.5">
<label class="text-xs text-on-surface font-bold">Tanggal Sesi</label>
<div class="p-2.5 bg-surface-container-lowest rounded-xl border border-outline-variant/60 flex items-center justify-between">
<span class="text-xs text-on-surface font-medium truncate">Kamis, 24 Okt 2026</span>
<span class="material-symbols-outlined text-outline-variant text-[18px] shrink-0">calendar_today</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="text-xs text-on-surface font-bold">Waktu Pelaksanaan</label>
<div class="p-2.5 bg-surface-container-lowest rounded-xl border border-outline-variant/60 flex items-center justify-between">
<span class="text-xs text-on-surface font-semibold truncate">16:00 - 17:30 WIB</span>
<span class="text-[11px] font-bold text-on-surface-variant bg-surface-container px-1.5 py-0.5 rounded shrink-0">90m</span>
</div>
</div>
</div>
<!-- Metode Belajar & Frekuensi Toggle -->
<div class="grid grid-cols-2 gap-3">
<div class="flex flex-col gap-1.5">
<label class="text-xs text-on-surface font-bold">Metode Belajar</label>
<div class="grid grid-cols-2 gap-1 bg-surface-container-low p-1 rounded-xl border border-outline-variant/30">
<div class="text-center py-1.5 rounded-lg bg-primary-container text-on-primary text-xs font-bold flex items-center justify-center gap-1.5 shadow-sm">
<span class="material-symbols-outlined text-[15px]">home</span> Home Visit
</div>
<div class="text-center py-1.5 rounded-lg text-on-surface-variant hover:text-on-surface text-xs font-medium flex items-center justify-center gap-1.5 cursor-pointer">
<span class="material-symbols-outlined text-[15px]">videocam</span> Zoom
</div>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="text-xs text-on-surface font-bold">Frekuensi Sesi</label>
<div class="grid grid-cols-2 gap-1 bg-surface-container-low p-1 rounded-xl border border-outline-variant/30">
<div class="text-center py-1.5 rounded-lg text-on-surface-variant hover:text-on-surface text-xs font-medium flex items-center justify-center cursor-pointer">
Sekali Saja
</div>
<div class="text-center py-1.5 rounded-lg bg-primary-container text-on-primary text-xs font-bold flex items-center justify-center shadow-sm">
Rutin Kamis
</div>
</div>
</div>
</div>
<!-- Catatan Pengajaran -->
<div class="flex flex-col gap-1.5">
<label class="text-xs text-on-surface font-bold">Catatan Pengajaran</label>
<div class="p-3 bg-surface-container-low rounded-xl border border-outline-variant/40 text-[11px] text-on-surface leading-relaxed">
Persiapan materi Juz 30 lanjutan surat Al-Infitar. Mohon tutor membawa modul bacaan tajwid cetak dari kantor cabang.
</div>
</div>
</div>
<!-- Panel Kanan (lg:col-span-5) - Live Check Aktif (State Aman) -->
<div class="lg:col-span-5 flex flex-col justify-between rounded-xl bg-surface-container-low/80 border border-secondary/40 p-5">
<div class="flex flex-col gap-4">
<div class="flex items-center justify-between border-b border-outline-variant/20 pb-3">
<div class="text-xs font-bold text-on-surface uppercase tracking-wider flex items-center gap-1.5">
<span class="material-symbols-outlined text-secondary text-[18px]">verified_user</span>
Validasi Sistem
</div>
<span class="flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-secondary-container/60 text-secondary text-[11px] font-bold border border-secondary/20">
<span class="w-1.5 h-1.5 rounded-full bg-secondary animate-pulse"></span>
Live Check Aktif
</span>
</div>
<!-- Green Success Result Box -->
<div class="p-3.5 rounded-xl bg-surface-container-lowest border border-secondary-container shadow-xs flex flex-col gap-1.5">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[22px]">check_circle</span>
<span class="text-xs font-bold text-secondary">Jadwal Aman &amp; Siap Disimpan</span>
</div>
<p class="text-[11px] text-on-surface-variant leading-relaxed">
Tidak ada bentrok. Jadwal tutor Kak Rina M.Pd dan siswa Aisyah Putri cocok serta berada dalam radius operasional cabang Tebet.
</p>
</div>
<!-- Checklist Detail Items -->
<div class="flex flex-col gap-3 pt-1 text-[11px]">
<div class="flex items-start gap-2.5 text-on-surface">
<span class="material-symbols-outlined text-secondary text-[16px] shrink-0 mt-0.5">done_all</span>
<span class="leading-relaxed"><strong>Ketersediaan Tutor:</strong> Slot Kamis 16:00 - 17:30 WIB terbuka penuh tanpa janji lain.</span>
</div>
<div class="flex items-start gap-2.5 text-on-surface">
<span class="material-symbols-outlined text-secondary text-[16px] shrink-0 mt-0.5">done_all</span>
<span class="leading-relaxed"><strong>Beban Tutor:</strong> 12/20 Sesi pekan ini (Aman - 60% kapasitas kerja tutor).</span>
</div>
<div class="flex items-start gap-2.5 text-on-surface">
<span class="material-symbols-outlined text-secondary text-[16px] shrink-0 mt-0.5">done_all</span>
<span class="leading-relaxed"><strong>Beban Siswa:</strong> Siswa bebas dari sesi privat mapel bimbel lainnya.</span>
</div>
<div class="flex items-start gap-2.5 text-on-surface">
<span class="material-symbols-outlined text-secondary text-[16px] shrink-0 mt-0.5">done_all</span>
<span class="leading-relaxed"><strong>Estimasi Perjalanan:</strong> Jarak 1.4 km (~15 mnt) dari sesi sebelumnya di Manggarai Selatan.</span>
</div>
</div>
</div>
<!-- Bottom Mini Info -->
<div class="mt-5 pt-3 border-t border-outline-variant/20 flex items-center justify-between text-[11px] text-on-surface-variant">
<span>Algoritma Lentera v2.4</span>
<span class="text-secondary font-bold">Tingkat Keyakinan 100%</span>
</div>
</div>
</div>
<!-- Modal 1 Footer -->
<div class="p-4 px-6 bg-surface-container-low border-t border-outline-variant/30 flex items-center justify-between">
<div class="flex items-center gap-1.5 text-on-surface-variant text-xs">
<span class="material-symbols-outlined text-[16px] text-secondary">lock</span>
<span>Alokasi ruangan &amp; sesi otomatis dikunci</span>
</div>
<div class="flex items-center gap-3">
<button class="h-10 px-5 rounded-xl border border-outline-variant/70 hover:bg-surface-container-high text-xs font-bold text-on-surface transition-colors" type="button">
Batal
</button>
<button class="h-10 px-5 rounded-xl bg-primary-container hover:bg-primary text-on-primary text-xs font-bold flex items-center gap-2 shadow-sm transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">save</span>
<span>Simpan Jadwal Sesi</span>
</button>
</div>
</div>
</div>
<!-- =================================================================== -->
<!-- MODAL CARD 2: UBAH JADWAL (STATE BENTROK / CONFLICT DETECTED)      -->
<!-- =================================================================== -->
<div class="flex flex-col bg-surface-container-lowest rounded-2xl border border-error/50 shadow-xl overflow-hidden">
<!-- Modal 2 Header -->
<div class="p-6 border-b border-outline-variant/30 flex items-start justify-between gap-4">
<div class="flex items-start gap-3.5">
<div class="w-10 h-10 rounded-xl bg-error-container/60 text-error border border-error/20 flex items-center justify-center shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[24px]">event_busy</span>
</div>
<div>
<div class="flex items-center gap-2.5 flex-wrap">
<h2 class="text-lg font-bold text-on-surface">Ubah Jadwal Sesi Les</h2>
<span class="px-2.5 py-0.5 rounded-full bg-error-container text-error text-xs font-bold border border-error/30 animate-pulse">
Bentrok Terdeteksi
</span>
</div>
<p class="text-xs text-on-surface-variant mt-1 leading-relaxed">
Reschedule sesi yang bentrok dengan rekomendasi solusi otomatis.
</p>
</div>
</div>
<button class="text-on-surface-variant hover:text-on-surface p-1.5 rounded-lg hover:bg-surface-container transition-colors shrink-0" title="Tutup Dialog" type="button">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
<!-- Comparative Schedule Transition Banner (Old vs Proposed New) -->
<div class="px-6 py-3 bg-error-container/20 border-b border-error/20 flex flex-wrap items-center justify-between gap-3 text-xs">
<div class="flex items-center gap-2 min-w-0">
<span class="font-bold text-on-surface-variant shrink-0">Jadwal Lama:</span>
<span class="line-through text-outline truncate font-medium">Selasa, 21 Okt 2026 • 16:00 - 17:30 WIB</span>
</div>
<span class="material-symbols-outlined text-error text-[18px] shrink-0">arrow_forward</span>
<div class="flex items-center gap-2 min-w-0">
<span class="font-bold text-error shrink-0">Usulan Baru:</span>
<span class="px-2.5 py-1 bg-error-container text-error rounded-lg font-bold truncate border border-error/30">Selasa, 21 Okt 2026 • 16:30 - 18:00 WIB</span>
</div>
</div>
<!-- Modal 2 Body (7 cols Form : 5 cols Real-Time Conflict Engine) -->
<div class="p-6 grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
<!-- Form Kolom Kiri (lg:col-span-7) -->
<div class="lg:col-span-7 flex flex-col gap-4">
<!-- Siswa Terdaftar -->
<div class="flex flex-col gap-1.5">
<label class="text-xs text-on-surface font-bold flex items-center justify-between">
<span>Siswa Terdaftar</span>
<span class="text-[11px] text-on-surface-variant font-medium tracking-wide">ID: SIS-2026-0719</span>
</label>
<div class="p-3 bg-surface-container-low rounded-xl border border-outline-variant/40 flex items-center justify-between gap-3">
<div class="flex items-center gap-3 min-w-0">
<div class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold text-xs shrink-0">
KP
</div>
<div class="min-w-0">
<div class="text-xs font-bold text-on-surface truncate">Kevin Pratama (Kelas 10 SMA - IPA)</div>
<div class="text-[11px] text-on-surface-variant truncate">SMA Negeri 8 Jakarta Selatan</div>
</div>
</div>
<span class="px-2.5 py-1 rounded-md bg-surface-container-high text-on-surface text-[11px] font-semibold shrink-0 whitespace-nowrap">
Reguler VIP
</span>
</div>
</div>
<!-- Tutor Terpilih (Conflict State) -->
<div class="flex flex-col gap-1.5">
<label class="text-xs text-on-surface font-bold flex items-center justify-between">
<span>Tutor Terpilih</span>
<span class="text-[11px] text-error font-bold flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-error inline-block"></span>
Jadwal Penuh / Potensi Bentrok
</span>
</label>
<div class="p-3 bg-surface-container-lowest rounded-xl border border-error/50 flex items-center justify-between shadow-xs">
<div class="flex items-center gap-3 min-w-0">
<div class="w-9 h-9 rounded-full bg-error-container text-error flex items-center justify-center font-bold text-xs shrink-0">
KF
</div>
<div class="min-w-0">
<div class="text-xs font-bold text-on-surface truncate">Kak Fikri S.Si</div>
<div class="text-[11px] text-error font-medium truncate">Spesialis: Fisika Terpadu &amp; Kalkulus</div>
</div>
</div>
<span class="material-symbols-outlined text-error text-[20px] shrink-0">warning</span>
</div>
</div>
<!-- Tanggal & Jam Baru (BENTROK) -->
<div class="grid grid-cols-2 gap-3">
<div class="flex flex-col gap-1.5">
<label class="text-xs text-on-surface font-bold">Tanggal Baru</label>
<div class="p-2.5 bg-surface-container-lowest rounded-xl border border-error/50 flex items-center justify-between">
<span class="text-xs text-on-surface font-semibold truncate">Selasa, 21 Okt 2026</span>
<span class="material-symbols-outlined text-error text-[18px] shrink-0">calendar_today</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="text-xs text-on-surface font-bold">Jam Baru</label>
<div class="p-2.5 bg-surface-container-lowest rounded-xl border border-error/50 flex items-center justify-between gap-1">
<span class="text-xs font-bold text-error truncate">16:30 - 18:00 WIB</span>
<span class="text-[11px] font-bold text-error bg-error-container px-2 py-0.5 rounded-md border border-error/20 shrink-0">Bentrok</span>
</div>
</div>
</div>
<!-- Alasan Perubahan Jadwal (Wajib) -->
<div class="flex flex-col gap-1.5">
<label class="text-xs text-on-surface font-bold flex items-center justify-between">
<span>Alasan Perubahan Jadwal <span class="text-error">*</span></span>
<span class="text-[11px] text-on-surface-variant font-medium">Wajib diisi</span>
</label>
<div class="p-3 bg-surface-container-low rounded-xl border border-outline-variant/40 text-[11px] text-on-surface leading-relaxed">
Permintaan orang tua siswa: Kevin ada kegiatan ekstra kurikuler basket sekolah hingga pukul 16:00 WIB di Senayan.
</div>
</div>
<!-- Notifikasi Otomatis Box -->
<div class="p-3 rounded-xl bg-surface-container-low border border-outline-variant/30 flex items-start gap-2.5">
<span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">info</span>
<p class="text-[11px] text-on-surface-variant leading-relaxed">
Perubahan langsung diperbarui di sistem dan notifikasi otomatis dikirimkan ke tutor &amp; orang tua via WhatsApp &amp; Aplikasi Mobile.
</p>
</div>
</div>
<!-- Panel Kanan (lg:col-span-5) - Real-time Conflict Engine & 3 Slots -->
<div class="lg:col-span-5 flex flex-col justify-between rounded-xl bg-error-container/15 border border-error/30 p-5">
<div class="flex flex-col gap-3.5">
<!-- Status Validasi Sistem Header -->
<div class="flex items-center justify-between border-b border-error/20 pb-2.5">
<div class="text-xs font-bold text-error uppercase tracking-wider flex items-center gap-1.5">
<span class="material-symbols-outlined text-error text-[18px]">report_problem</span>
Status Validasi Sistem
</div>
<span class="flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-error-container text-error text-[11px] font-bold border border-error/20">
<span class="w-1.5 h-1.5 rounded-full bg-error animate-ping"></span>
Bentrok Terdeteksi
</span>
</div>
<!-- Red Warning Alert Box -->
<div class="p-3.5 rounded-xl bg-surface-container-lowest border border-error/40 shadow-xs flex flex-col gap-1.5">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-error text-[20px]">warning</span>
<span class="text-xs font-bold text-error">Jadwal Bentrok Ditemukan!</span>
</div>
<p class="text-[11px] text-on-surface leading-relaxed">
Bentrok dengan sesi siswa <strong>Farhan Nugraha</strong> (16:00 - 17:30 WIB) pada tutor Kak Fikri S.Si (Tumpang tindih 60 menit &amp; waktu transisi tersisa 0 menit dari minimal 15 menit).
</p>
</div>
<!-- Interactive Replacement Slots Title -->
<div class="flex flex-col gap-2 pt-1">
<span class="text-xs font-bold text-on-surface flex items-center gap-1.5">
<span class="material-symbols-outlined text-primary text-[16px]">auto_fix_high</span>
Pilih Rekomendasi Slot Pengganti (Tersedia):
</span>
<!-- Slot 1 (Best Recommendation) -->
<div class="p-3 rounded-xl bg-surface-container-lowest hover:bg-surface-container-high border-2 border-primary/60 cursor-pointer transition-all flex flex-col gap-1.5 shadow-xs group">
<div class="flex items-center justify-between gap-2">
<span class="text-xs font-bold text-primary group-hover:text-primary-container flex items-center gap-1">
<span class="material-symbols-outlined text-[15px]">lightbulb</span>
Hari Ini: 18:00 - 19:30 WIB
</span>
<span class="px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container text-[10px] font-bold shrink-0">
Rekomendasi Terbaik
</span>
</div>
<div class="text-[11px] text-on-surface-variant flex items-center justify-between gap-2">
<span class="truncate">Tutor: Kak Fikri S.Si (Online Zoom)</span>
<span class="text-secondary font-bold shrink-0 whitespace-nowrap">Langsung Berlanjut</span>
</div>
</div>
<!-- Slot 2 -->
<div class="p-3 rounded-xl bg-surface-container-lowest hover:bg-surface-container-high border border-outline-variant/60 cursor-pointer transition-all flex flex-col gap-1.5">
<div class="flex items-center justify-between gap-2">
<span class="text-xs font-bold text-on-surface truncate">
Rabu, 22 Okt • 16:00 - 17:30 WIB
</span>
<span class="text-[10px] text-on-surface-variant bg-surface-container px-2 py-0.5 rounded font-semibold shrink-0">Slot Bebas</span>
</div>
<div class="text-[11px] text-on-surface-variant truncate">
Tutor: Kak Fikri S.Si (Online Zoom)
</div>
</div>
<!-- Slot 3 (Alternate Tutor) -->
<div class="p-3 rounded-xl bg-surface-container-lowest hover:bg-surface-container-high border border-outline-variant/60 cursor-pointer transition-all flex flex-col gap-1.5">
<div class="flex items-center justify-between gap-2">
<span class="text-xs font-bold text-on-surface truncate">
Selasa, 21 Okt • 16:30 - 18:00 WIB
</span>
<span class="px-2 py-0.5 rounded-full bg-primary/10 text-primary text-[10px] font-bold shrink-0">Tutor Pengganti</span>
</div>
<div class="text-[11px] text-on-surface-variant flex items-center justify-between gap-2">
<span class="truncate">Assign: Kak Nadia S.Pd (Fisika SMA)</span>
<span class="text-primary font-bold shrink-0 whitespace-nowrap">Keahlian Cocok</span>
</div>
</div>
</div>
</div>
<!-- Resolver Bottom Info -->
<div class="mt-4 pt-3 border-t border-error/20 flex items-center justify-between text-[11px]">
<span class="text-error font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">error</span> Harus diselesaikan
</span>
<span class="text-on-surface-variant">Pilih salah satu slot di atas</span>
</div>
</div>
</div>
<!-- Modal 2 Footer (Disabled Save State) -->
<div class="p-4 px-6 bg-surface-container-low border-t border-outline-variant/30 flex items-center justify-between">
<div class="flex items-center gap-1.5 text-error text-xs font-semibold">
<span class="material-symbols-outlined text-[16px]">error_outline</span>
<span>Selesaikan bentrok jadwal untuk mengaktifkan tombol simpan</span>
</div>
<div class="flex items-center gap-3">
<button class="h-10 px-5 rounded-xl border border-outline-variant/70 hover:bg-surface-container-high text-xs font-bold text-on-surface transition-colors" type="button">
Batal
</button>
<!-- Disabled Button -->
<div class="relative group">
<button class="h-10 px-5 rounded-xl bg-surface-container-highest text-outline text-xs font-bold flex items-center gap-2 cursor-not-allowed border border-outline-variant/30 opacity-70" disabled="" type="button">
<span class="material-symbols-outlined text-[18px]">save</span>
<span>Simpan Jadwal</span>
</button>
<div class="absolute bottom-full right-0 mb-2 hidden group-hover:flex items-center px-3 py-1.5 bg-inverse-surface text-inverse-on-surface text-[11px] rounded-lg whitespace-nowrap shadow-lg pointer-events-none">
Pilih rekomendasi slot aman terlebih dahulu
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Bottom Operational Legend Bar -->
<div class="w-full max-w-5xl mt-6 p-4 px-6 rounded-2xl bg-surface-container-lowest/90 backdrop-blur-sm border border-outline-variant/30 flex flex-wrap items-center justify-between gap-4">
<div class="flex items-center gap-6 text-on-surface-variant text-xs flex-wrap">
<span class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-secondary"></span>
<strong>Validasi Hijau:</strong> Tidak ada overlap tutor, siswa, maupun waktu mobilisasi antar sesi home visit.
</span>
<span class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-error"></span>
<strong>Validasi Merah:</strong> Engine mendeteksi slot tumpang tindih secara instan dan memblokir duplikasi jadwal.
</span>
</div>
<div class="flex items-center gap-2 text-xs">
<span class="text-primary font-bold">One Private Course Lentera OS</span>
<span class="text-outline-variant">•</span>
<span class="text-on-surface-variant">Branch Management Automation</span>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
<script src="{{ asset('js/opc.js') }}"></script><script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});
const LIST = {!! json_encode(route('admin.jadwal')) !!}, API = {!! json_encode(url('/admin/jadwal')) !!};
const STUDENTS = {!! json_encode($studentsJson) !!}, TUTORS = {!! json_encode($tutorsJson) !!}, EDIT = {!! json_encode($edit) !!};
const norm = OPC.norm;
function setText(el, t) { if (!el) return; [...el.childNodes].forEach(n => { if (n.nodeType === 3) n.remove(); }); el.appendChild(document.createTextNode(' ' + t + ' ')); }
function leafHas(txt, root) { return [...(root || document).querySelectorAll('*')].find(n => n.children.length === 0 && norm(n.textContent).includes(norm(txt))); }
function card(h2txt) { const h = [...document.querySelectorAll('h2')].find(x => x.textContent.includes(h2txt)); let n = h; while (n && !(n.parentElement && n.parentElement.children.length >= 2 && n.querySelector('button[title="Tutup Dialog"]') && n.querySelectorAll('h2').length === 1 && n.querySelector('label'))) n = n.parentElement; return n; }
const C1 = card('Tambah Sesi Les Baru'), C2 = card('Ubah Jadwal Sesi Les');
document.querySelectorAll('button[title="Tutup Dialog"]').forEach(b => b.addEventListener('click', () => OPC.go(LIST)));
const dayN = d => ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'][new Date(d + 'T00:00:00').getDay()];
const mon = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
const dlabel = d => { const x = new Date(d + 'T00:00:00'); return dayN(d) + ', ' + x.getDate() + ' ' + mon[x.getMonth()] + ' ' + x.getFullYear(); };
const mins = (a, b) => { const f = s => +s.split(':')[0] * 60 + +s.split(':')[1]; return f(b) - f(a); };
// ================= MODAL 1: tambah =================
(function () {
  if (!C1) return;
  const st = {student: STUDENTS[0], tutor: TUTORS[0], date: {!! json_encode(now()->addDay()->toDateString()) !!}, start: '16:00', end: '17:30', method: 'home_visit', repeat: 'sekali'};
  const q = new URLSearchParams(location.search);
  if (q.get('student')) st.student = STUDENTS.find(s => String(s.id) === q.get('student')) || st.student;
  if (q.get('tutor')) st.tutor = TUTORS.find(t => String(t.id) === q.get('tutor')) || st.tutor; else if (st.student && st.student.tutor_id) st.tutor = TUTORS.find(t => t.id === st.student.tutor_id) || st.tutor;
  if (st.student) st.method = st.student.method === 'online' ? 'online' : 'home_visit';
  const L = t => leafHas(t, C1);
  const el = {
    stuName: L('Aisyah Putri (Kelas 8 SMP)'), stuAddr: L('Jalan Tebet Barat Dalam VII'), stuId: L('ID: SIS-2026-0842'), stuBadge: L('Home Visit - Tebet'), stuAv: [...C1.querySelectorAll('div')].find(d => d.children.length === 0 && d.textContent.trim() === 'AP'),
    tName: L('Kak Rina M.Pd'), tSpec: L('Spesialisasi: Mengaji'), tAv: [...C1.querySelectorAll('div')].find(d => d.children.length === 0 && d.textContent.trim() === 'KR'), tAvail: leafHas('Tersedia (Sisa 4 slot', C1),
    prog: L('Mengaji & Tahsin Al-Qur\'an'), date: L('Kamis, 24 Okt 2026'), time: L('16:00 - 17:30 WIB'), dur: L('90m'), notes: [...C1.querySelectorAll('div')].find(d => d.children.length === 0 && d.textContent.includes('Persiapan materi Juz 30')),
  };
  if (el.notes) { el.notes.contentEditable = 'true'; el.notes.textContent = ''; el.notes.setAttribute('data-ph', 'Catatan pengajaran...'); el.notes.style.minHeight = '48px'; el.notes.style.outline = 'none'; }
  function paint() {
    const s = st.student, t = st.tutor; if (!s || !t) return;
    setText(el.stuName, s.name + ' (' + s.grade + ')'); setText(el.stuAddr, s.address || '-'); setText(el.stuId, 'ID: ' + s.code); setText(el.stuBadge, (s.method === 'online' ? 'Online' : 'Home Visit') + ' - ' + (s.area || '')); if (el.stuAv) el.stuAv.textContent = s.initials;
    setText(el.tName, t.name); setText(el.tSpec, 'Spesialisasi: ' + t.headline); if (el.tAv) el.tAv.textContent = t.initials; setText(el.prog, s.program || '-');
    setText(el.date, dlabel(st.date)); setText(el.time, st.start + ' - ' + st.end + ' WIB'); setText(el.dur, mins(st.start, st.end) + 'm');
    const rut = leafHas('Rutin', C1); if (rut) setText(rut, 'Rutin ' + dayN(st.date));
    live();
  }
  let seq = 0;
  async function live() {
    const my = ++seq; let r; try { r = await OPC.post(API + '/cek', {student_id: st.student.id, tutor_id: st.tutor.id, date: st.date, start_time: st.start, end_time: st.end}); } catch (e) { return; }
    if (my !== seq) return; st.ok = r.ok;
    const box = leafHas('Jadwal Aman', C1); if (box) setText(box, r.ok ? 'Jadwal Aman & Siap Disimpan' : 'Jadwal Bentrok!');
    const para = [...C1.querySelectorAll('p')].find(x => x.textContent.includes('Tidak ada bentrok') || x.textContent.includes('Bentrok')); if (para) para.textContent = r.message;
    const strongs = [...C1.querySelectorAll('strong')]; const items = ['Ketersediaan Tutor:', 'Beban Tutor:', 'Beban Siswa:', 'Estimasi Perjalanan:'];
    strongs.forEach(sg => { const k = items.indexOf(sg.textContent.trim()); if (k < 0) return; const rest = sg.parentElement; [...rest.childNodes].forEach(n => { if (n.nodeType === 3) n.remove(); }); rest.appendChild(document.createTextNode(' ' + r.checks[k])); });
    if (el.tAvail) setText(el.tAvail, r.avail);
    const sv = OPC.find('Simpan Jadwal Sesi', {root: C1, exact: false})[0]; if (sv) { sv.style.opacity = r.ok ? '1' : '.5'; }
  }
  const dayOpts = null;
  if (el.stuName) el.stuName.closest('div[class*=border]').style.cursor = 'pointer';
  const pick = (node, fn) => { if (node) { const b = node.closest('div[class*=border]') || node.parentElement; b.style.cursor = 'pointer'; b.addEventListener('click', fn); } };
  pick(el.stuName, () => OPC.dialog({title: 'Pilih Siswa', fields: [{name: 'id', label: 'Siswa', type: 'select', value: st.student.id, options: STUDENTS.map(s => ({v: s.id, t: s.name + ' — ' + s.grade}))}], submit: 'Pilih', onSubmit: async v => { st.student = STUDENTS.find(s => String(s.id) === v.id); if (st.student.tutor_id) st.tutor = TUTORS.find(t => t.id === st.student.tutor_id) || st.tutor; paint(); }}));
  pick(el.tName, () => OPC.dialog({title: 'Pilih Tutor', fields: [{name: 'id', label: 'Tutor', type: 'select', value: st.tutor.id, options: TUTORS.map(t => ({v: t.id, t: t.name + ' — ' + t.headline}))}], submit: 'Pilih', onSubmit: async v => { st.tutor = TUTORS.find(t => String(t.id) === v.id); paint(); }}));
  pick(el.date, () => OPC.dialog({title: 'Tanggal Sesi', fields: [{name: 'date', label: 'Tanggal', type: 'date', value: st.date}], submit: 'Terapkan', onSubmit: async v => { if (v.date) st.date = v.date; paint(); }}));
  pick(el.time, () => OPC.dialog({title: 'Waktu Pelaksanaan', fields: [{name: 'start', label: 'Jam mulai', type: 'time', value: st.start}, {name: 'end', label: 'Jam selesai', type: 'time', value: st.end}], submit: 'Terapkan', onSubmit: async v => { if (v.start && v.end) { st.start = v.start; st.end = v.end; } paint(); }}));
  const hv = leafHas('Home Visit', C1) && [...C1.querySelectorAll('div')].find(d => d.children.length === 1 && norm(d.textContent) === 'home home visit');
  const mEls = [...C1.querySelectorAll('div')].filter(d => ['home home visit', 'videocam zoom'].includes(norm(d.textContent)) && d.children.length === 1);
  if (mEls.length === 2) OPC.choice(mEls, 0, k => { st.method = ['home_visit', 'online'][k]; })(st.method === 'online' ? 1 : 0);
  const fEls = [...C1.querySelectorAll('div')].filter(d => d.children.length === 0 && ['sekali saja', 'rutin kamis'].includes(norm(d.textContent)));
  if (fEls.length === 2) OPC.choice(fEls, 0, k => { st.repeat = ['sekali', 'rutin'][k]; });
  OPC.find('Batal', {root: C1, sel: 'button'}).forEach(b => b.addEventListener('click', () => OPC.go(LIST)));
  OPC.find('Simpan Jadwal Sesi', {root: C1, sel: 'button', exact: false}).forEach(b => b.addEventListener('click', async () => {
    try { const j = await OPC.post(API, {student_id: st.student.id, tutor_id: st.tutor.id, date: st.date, start_time: st.start, end_time: st.end, method: st.method, repeat: st.repeat, notes: el.notes ? el.notes.textContent.trim() : ''}); OPC.done(j, LIST); } catch (e) {} }));
  paint();
})();
// ================= MODAL 2: ubah (konflik) =================
(function () {
  if (!C2) return; if (!EDIT) { C2.style.display = 'none'; return; }
  const L = t => leafHas(t, C2); let pickSlot = null;
  const old = L('Selasa, 21 Okt 2026 • 16:00 - 17:30 WIB'), nw = L('Selasa, 21 Okt 2026 • 16:30 - 18:00 WIB');
  setText(old, dlabel(EDIT.date) + ' • ' + EDIT.start + ' - ' + EDIT.end + ' WIB'); setText(nw, 'Pilih slot di bawah');
  setText(L('Kevin Pratama (Kelas 10 SMA - IPA)'), EDIT.student + ' (' + EDIT.grade + ')'); setText(L('SMA Negeri 8 Jakarta Selatan'), EDIT.school || '-'); setText(L('ID: SIS-2026-0719'), 'ID: ' + EDIT.code);
  setText(L('Kak Fikri S.Si'), EDIT.tutor); setText(L('Spesialis: Fisika Terpadu & Kalkulus'), EDIT.tutor_head);
  setText(L('16:30 - 18:00 WIB'), EDIT.start + ' - ' + EDIT.end + ' WIB'); setText(L('Selasa, 21 Okt 2026'), dlabel(EDIT.date));
  const reason = [...C2.querySelectorAll('div')].find(d => d.children.length === 0 && d.textContent.includes('Permintaan orang tua siswa')); if (reason) { reason.contentEditable = 'true'; reason.textContent = ''; reason.style.minHeight = '40px'; reason.style.outline = 'none'; }
  const warnP = [...C2.querySelectorAll('p')].find(x => x.textContent.includes('Bentrok dengan sesi siswa')); if (warnP) warnP.textContent = EDIT.conflict_text;
  const slotHead = [...C2.querySelectorAll('span')].find(s => s.textContent.includes('Pilih Rekomendasi Slot Pengganti')); const slotBox = slotHead.parentElement; const cards = [...slotBox.children].slice(1);
  (EDIT.slots || []).forEach((s, i) => { const c = cards[i]; if (!c) return; const lf = [...c.querySelectorAll('span,div')].filter(n => !n.classList.contains('material-symbols-outlined'));
    const spans = [...c.querySelectorAll('span')].filter(n => !n.classList.contains('material-symbols-outlined'));
    const top = spans.filter(n => n.parentElement === c.children[0] || n.parentElement.parentElement === c.children[0] && n.children.length === 0 || n.parentElement.parentElement === c);
    const texts = [...c.querySelectorAll('span, div')].filter(n => n.children.length === 0 || (n.querySelector('.material-symbols-outlined') && n.children.length === 1));
    const t0 = texts.find(n => /\d\d:\d\d/.test(n.textContent)); if (t0) setText(t0, s.label);
    const t1 = texts.find(n => /Rekomendasi|Slot Bebas|Tutor Pengganti/.test(n.textContent)); if (t1) setText(t1, s.tag);
    const t2 = texts.find(n => /Tutor: |Assign:/.test(n.textContent)); if (t2) setText(t2, s.sub);
    c.style.cursor = 'pointer'; c.addEventListener('click', () => { pickSlot = s; cards.forEach(x => x.style.outline = ''); c.style.outline = '2px solid #2563eb'; setText(nw, s.label); const sv = OPC.find('Simpan Jadwal', {root: C2, sel: 'button', exact: true})[0]; if (sv) { sv.disabled = false; sv.style.opacity = '1'; sv.style.cursor = 'pointer'; } }); });
  cards.slice((EDIT.slots || []).length).forEach(c => c.style.display = 'none');
  OPC.find('Batal', {root: C2, sel: 'button'}).forEach(b => b.addEventListener('click', () => OPC.go(LIST)));
  OPC.find('Simpan Jadwal', {root: C2, sel: 'button', exact: true}).forEach(b => b.addEventListener('click', async () => {
    if (!pickSlot) return OPC.toast('Pilih slot pengganti dulu.', false);
    try { const j = await OPC.put(API + '/' + EDIT.id, {date: pickSlot.date, start_time: pickSlot.start, end_time: pickSlot.end, tutor_id: pickSlot.tutor_id, reason: reason ? reason.textContent.trim() : ''}); OPC.done(j, LIST); } catch (e) {} }));
})();
</script></body></html>