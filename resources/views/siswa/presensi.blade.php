<!DOCTYPE html><html lang="id"><head><meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="web_dashboard" name="shell-type">
<title>Presensi &amp; Catatan Belajar - One Private Course</title>
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
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
            "primary": "#2563eb",
            "primary-container": "#1d4ed8",
            "primary-fixed": "#dbeafe",
            "primary-fixed-dim": "#bfdbfe",
            "on-primary": "#ffffff",
            "on-primary-fixed": "#1e3a8a",
            "secondary": "#0d9488",
            "secondary-container": "#ccfbf1",
            "on-secondary-container": "#115e59",
            "secondary-fixed": "#99f6e4",
            "secondary-fixed-dim": "#5eead4",
            "tertiary": "#4f46e5",
            "tertiary-container": "#e0e7ff",
            "tertiary-fixed": "#e0e7ff",
            "on-tertiary-fixed": "#312e81",
            "surface": "#f8fafc",
            "surface-container-lowest": "#ffffff",
            "surface-container-low": "#f1f5f9",
            "surface-container": "#e2e8f0",
            "surface-container-high": "#cbd5e1",
            "on-surface": "#0f172a",
            "on-surface-variant": "#64748b",
            "outline": "#94a3b8",
            "outline-variant": "#e2e8f0",
            "error": "#ef4444",
            "error-container": "#fee2e2"
          },
          borderRadius: {
            "DEFAULT": "0.375rem",
            "lg": "0.625rem",
            "xl": "0.875rem",
            "2xl": "1.25rem",
            "full": "9999px"
          },
          fontFamily: {
            sans: ["Plus Jakarta Sans", "sans-serif"]
          }
        }
      }
    };
  </script>
</head>
<body class="bg-surface text-on-surface antialiased min-h-screen flex flex-col font-sans selection:bg-primary-fixed selection:text-primary">
<!-- LEFT SIDEBAR -->
<aside class="fixed left-0 top-0 h-full w-64 bg-surface-container-lowest z-50 flex flex-col justify-between border-r border-outline-variant/60 shadow-[0_2px_12px_rgba(15,23,42,0.03)]">
<div class="flex flex-col">
<!-- Logo Branding -->
<div class="h-16 px-6 flex items-center gap-3 border-b border-outline-variant/50">
<div class="w-9 h-9 rounded-xl bg-primary text-on-primary flex items-center justify-center shrink-0 shadow-sm shadow-primary/20">
<span class="material-symbols-outlined text-[20px]">school</span>
</div>
<div class="flex flex-col leading-tight">
<span class="font-bold text-[16px] text-on-surface tracking-tight">One Private</span>
<span class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wider">Portal Edukasi</span>
</div>
</div>
<!-- Navigation Menu -->
<div class="px-4 pt-6">
<div class="px-3 mb-2 text-[11px] font-bold text-on-surface-variant/80 tracking-wider uppercase">Menu Utama</div>
<nav class="flex flex-col gap-1.5">
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-on-surface-variant text-[14px] font-semibold hover:bg-surface-container-low hover:text-on-surface transition-colors" href="#">
<span class="material-symbols-outlined text-[20px]">grid_view</span>
<span class="">Beranda</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-on-surface-variant text-[14px] font-semibold hover:bg-surface-container-low hover:text-on-surface transition-colors" href="#">
<span class="material-symbols-outlined text-[20px]">calendar_month</span>
<span class="">Jadwal Les</span>
</a>
<a aria-current="page" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl bg-primary text-on-primary text-[14px] font-bold shadow-md shadow-primary/25 transition-all" href="#">
<span class="material-symbols-outlined text-[20px]">fact_check</span>
<span class="">Presensi &amp; Catatan</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-on-surface-variant text-[14px] font-semibold hover:bg-surface-container-low hover:text-on-surface transition-colors" href="#">
<span class="material-symbols-outlined text-[20px]">receipt_long</span>
<span class="">Riwayat Tagihan</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-on-surface-variant text-[14px] font-semibold hover:bg-surface-container-low hover:text-on-surface transition-colors" href="#">
<span class="material-symbols-outlined text-[20px]">account_circle</span>
<span class="">Profil Siswa</span>
</a>
</nav>
</div>
</div>
<!-- Bottom Help Card -->
<div class="p-4 m-3 rounded-2xl bg-surface-container-low/70 border border-outline-variant/60">
<div class="flex items-center gap-2 text-primary font-bold text-[13px] mb-1">
<span class="material-symbols-outlined text-[18px]">support_agent</span>
<span class="">Bantuan Admin</span>
</div>
<p class="text-[12px] text-on-surface-variant leading-relaxed mb-3">
        Punya kendala belajar atau administrasi les?
      </p>
<a class="flex items-center justify-center gap-2 w-full py-2 px-3 rounded-xl bg-emerald-600 text-white text-[12px] font-bold hover:bg-emerald-700 transition-all shadow-sm" href="https://wa.me/" target="_blank">
<span class="material-symbols-outlined text-[15px]">chat</span>
<span class="">WhatsApp Konsultasi</span>
</a>
</div>
</aside>
<!-- MAIN CONTAINER (HEADER + CONTENT) -->
<div class="pl-64 flex flex-col min-h-screen">
<!-- TOP NAVIGATION BAR -->
<header class="fixed top-0 left-64 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-md border-b border-outline-variant/60 z-40 flex items-center justify-between px-8">
<div class="flex items-center gap-4">
<div class="flex flex-col">
<span class="text-[14px] font-bold text-on-surface">One Private Course</span>
<span class="text-[11px] text-on-surface-variant font-medium">Portal Orang Tua &amp; Siswa</span>
</div>
<div class="h-5 w-px bg-outline-variant"></div>
<!-- Profile Active Dropdown Badge -->
<button class="flex items-center gap-2 px-3 py-1.5 rounded-full bg-secondary-container/60 text-on-secondary-container text-[12px] font-bold border border-secondary/20 hover:bg-secondary-container transition-colors" type="button">
<span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
<span class="">Profil Aktif: Aisyah Putri (Kelas 8 SMP)</span>
<span class="material-symbols-outlined text-[16px] -mr-0.5">arrow_drop_down</span>
</button>
</div>
<div class="flex items-center gap-4">
<!-- Notification Bell -->
<button aria-label="Notifikasi" class="relative w-9 h-9 rounded-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" type="button">
<span class="material-symbols-outlined text-[20px]">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-error ring-2 ring-surface-container-lowest"></span>
</button>
<div class="h-5 w-px bg-outline-variant"></div>
<!-- User Profile Pill -->
<div class="flex items-center gap-3">
<div class="flex flex-col text-right leading-tight">
<span class="text-[13px] font-bold text-on-surface">{{ \App\Support\Fmt::shortName(auth()->user()->name) !== "" ? preg_replace("/\s+(Kusumawardhani|Syakieb)$/", "", auth()->user()->name) : "" }}</span>
<span class="text-[11px] text-on-surface-variant">Wali Murid • {{ auth()->user()->branch }}</span>
</div>
<div class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold text-[13px] shadow-sm shadow-primary/20">
<span class="material-symbols-outlined text-[18px]">person</span>
</div>
</div>
</div>
</header>
<!-- MAIN BODY CONTENT -->
<main class="pt-16 px-8 py-8 w-full max-w-[1440px] mx-auto flex flex-col gap-6">
<!-- PAGE HEADER & CHILD SWITCHER BAR -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-2 border-b border-outline-variant/40">
<div class="flex flex-col gap-1">
<!-- Breadcrumb -->
<nav class="flex items-center gap-1.5 text-xs text-slate-500 font-medium">
<span class="">Portal Orang Tua &amp; Siswa</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-primary font-bold">Presensi &amp; Catatan Belajar</span>
</nav>
<!-- Title -->
<h1 class="text-2xl font-bold tracking-tight text-slate-900 mt-0.5">
            Presensi &amp; Evaluasi Belajar
          </h1>
<p class="text-xs text-slate-500 max-w-2xl">
            Verifikasi kehadiran siswa dan pantau catatan progres belajar tiap sesi secara transparan dan terintegrasi langsung dengan tutor.
          </p>
</div>
<!-- Child Switcher Pills -->
<div class="flex items-center gap-2 self-start md:self-auto flex-wrap">
<button class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-primary text-white font-bold text-[12px] shadow-sm shadow-primary/20 hover:opacity-95 transition-opacity" type="button">
<span class="">🌟</span>
<span class="">Aisyah Putri (Kelas 8 SMP • Reguler)</span>
</button>
<button class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-surface-container-lowest text-on-surface-variant font-semibold text-[12px] border border-outline-variant hover:bg-surface-container-low hover:text-on-surface transition-colors" type="button">
<span class="">👦</span>
<span class="">Farhan Nugraha (Kelas 12 SMA • UTBK)</span>
</button>
<button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full bg-surface-container-low text-primary font-bold text-[12px] hover:bg-primary-fixed transition-colors" type="button">
<span class="material-symbols-outlined text-[15px]">add</span>
<span class="">Tambah Anak</span>
</button>
</div>
</div>
<!-- MAIN 2-COLUMN DASHBOARD GRID -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
<!-- LEFT MAIN COLUMN (~68% width / 8 cols) -->
<div class="lg:col-span-8 flex flex-col gap-6">
<!-- 1. ACTIVE ONGOING SESSION CARD (Gradient High-Contrast Hero) -->
<div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-primary via-blue-600 to-indigo-700 text-white p-6 shadow-md shadow-primary/10">
<!-- Background glow accents -->
<div class="absolute -top-12 -right-12 w-48 h-48 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
<div class="absolute -bottom-8 -left-8 w-40 h-40 bg-secondary/20 rounded-full blur-xl pointer-events-none"></div>
<div class="relative z-10 flex flex-col gap-4">
<!-- Live Indicator & Schedule Pill -->
<div class="flex flex-wrap items-center justify-between gap-3">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/20 backdrop-blur-md text-white text-[12px] font-bold border border-white/25">
<span class="relative flex h-2 w-2">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
<span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-400"></span>
</span>
<span class="">{{ $live && $live->liveStatus() === "berjalan" ? "Sesi Berlangsung Sekarang" : "Sesi Terdekat / Terakhir" }}</span>
</div>
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-black/20 text-white/90 text-[12px] font-medium backdrop-blur-sm">
<span class="material-symbols-outlined text-[15px]">schedule</span>
<span class="">{{ $live ? \App\Support\Fmt::dateShort($live->date) . " • " . \App\Support\Fmt::hhmm($live->start_time) . " – " . \App\Support\Fmt::hhmm($live->end_time) . " WIB" : "-" }}</span>
</div>
</div>
<!-- Subject & Topic Header -->
<div class="flex flex-col gap-1">
<div class="flex items-center gap-2 text-white/80 text-[11px] font-bold uppercase tracking-wider">
<span class="px-2 py-0.5 rounded bg-white/15">{{ $child->program }}</span>
<span class="">• Pertemuan ke-{{ $live->session_no ?? 1 }}</span>
</div>
<h2 class="text-[22px] font-bold text-white tracking-tight">{{ $live->subject ?? "-" }}</h2>
<div class="flex items-center gap-2 text-[13px] text-white/90 mt-0.5">
<span class="material-symbols-outlined text-[17px] text-white/80 shrink-0">menu_book</span>
<span class=""><strong class="font-semibold text-white">Fokus Materi:</strong> {{ $live->topic ?? ($live->subject ?? "-") }}</span>
</div>
</div>
<!-- Tutor Info Pill -->
<div class="flex flex-wrap items-center justify-between gap-3 p-3 rounded-xl bg-white/10 backdrop-blur-md border border-white/15">
<div class="flex items-center gap-3">
<div class="relative">
<img class="w-11 h-11 rounded-full object-cover ring-2 ring-white/50" data-alt="Portrait of Kak Rina M.Pd tutor with pastel hijab and friendly smile" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4QsYlO7pln4n2Uj1NWUKBhMin7XJ2ICKNQopAPBpDuWzpmbUfRimL2E1oEIw_yqatE0N5sN-_E9Huo2pRs2KP7OBTMs8P8izFWNaiLQFSqn7dBwMrQIzPHnVnMszOt297tgl8rkCtYpeqxUccz_ccSuCugAnHj61sC24mUTAlKJv1iv3_P86masGNeecjeILEYJKhQ649SLvQM_5J18GRYrSBJUFQuoqtzzUWueUFpEd56BCEPYu_hg">
<span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-400 rounded-full ring-2 ring-blue-700" title="Tutor Sedang di Lokasi"></span>
</div>
<div class="flex flex-col leading-tight">
<div class="flex items-center gap-1.5">
<span class="font-bold text-[14px] text-white">{{ $live->tutor->name ?? "-" }}</span>
<span class="inline-flex items-center gap-0.5 px-1.5 py-0.2 rounded bg-amber-400/20 text-amber-300 text-[11px] font-bold">
<span class="material-symbols-outlined text-[13px]" style="font-variation-settings: 'FILL' 1;">star</span> 4.9
                      </span>
</div>
<span class="text-[12px] text-white/80">{{ $live->tutor->headline ?? "-" }}</span>
</div>
</div>
<div class="flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-white/15 text-[11px] font-semibold text-white/90">
<span class="material-symbols-outlined text-[15px]">home_pin</span>
<span class="">{{ $live ? \App\Support\Fmt::method($live->method) . ($live->location ? " (" . $live->location . ")" : "") : "-" }}</span>
</div>
</div>
<!-- Buttons Bar -->
<div class="flex flex-wrap items-center justify-between gap-3 pt-1">
<div class="flex items-center gap-2.5">
<button class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white text-primary text-[13px] font-bold shadow-sm hover:bg-slate-50 transition-all active:scale-95" onclick="document.getElementById('absensi-form-card').scrollIntoView({ behavior: 'smooth' });" type="button">
<span class="material-symbols-outlined text-[18px]">fact_check</span>
<span class="">Isi Absensi Sekarang</span>
</button>
<a class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-emerald-600 text-white text-[13px] font-semibold hover:bg-emerald-700 transition-all shadow-sm" href="{{ \App\Support\Fmt::waLink($live->tutor->phone ?? "") }}" target="_blank">
<span class="material-symbols-outlined text-[16px]">chat</span>
<span class="">Hubungi Tutor via WhatsApp</span>
</a>
</div>
<span class="text-[11px] text-white/80 font-medium">Batas pengisian: {{ $live ? \Carbon\Carbon::parse($live->date->toDateString() . " " . $live->end_time)->addHours(2)->format("H:i") : "-" }} WIB (2 jam pasca sesi)</span>
</div>
</div>
</div>
<!-- 2. FORMULIR VERIFIKASI KEHADIRAN (INTERACTIVE FORM) -->
<div class="rounded-2xl bg-surface-container-lowest border border-outline-variant/60 p-6 shadow-sm flex flex-col gap-5" id="absensi-form-card">
<!-- Header section -->
<div class="flex items-start justify-between gap-4 pb-3 border-b border-outline-variant/40">
<div class="flex flex-col gap-0.5">
<div class="flex items-center gap-1.5 text-primary text-[11px] font-bold uppercase tracking-wider">
<span class="material-symbols-outlined text-[16px]">edit_note</span>
<span class="">Formulir Verifikasi Kehadiran</span>
</div>
<h3 class="text-[18px] font-bold text-on-surface">Konfirmasi Kehadiran Sesi</h3>
<p class="text-[12px] text-on-surface-variant">Sesi {{ $live->subject ?? "-" }} • {{ $live ? \App\Support\Fmt::dateShort($live->date) . " (" . \App\Support\Fmt::range($live->start_time, $live->end_time) . ")" : "-" }}</p>
</div>
<span class="px-3 py-1 rounded-full bg-surface-container-low border border-outline-variant/60 text-[12px] font-bold text-on-surface-variant">Sesi #{{ $live->session_no ?? 1 }}</span>
</div>
<form class="flex flex-col gap-5" id="absenForm">
<!-- Selector 3 Status Kehadiran -->
<div class="flex flex-col gap-2">
<label class="text-[13px] font-bold text-on-surface">Pilih Status Kehadiran Ananda:</label>
<div class="grid grid-cols-1 md:grid-cols-3 gap-3">
<!-- HADIR TUNTAS -->
<label class="relative flex flex-col p-4 rounded-xl border-2 border-secondary bg-secondary-container/20 cursor-pointer transition-all hover:bg-secondary-container/30">
<input checked="" class="peer sr-only" name="attendance_status" type="radio" value="hadir">
<div class="flex items-center justify-between mb-2">
<div class="w-8 h-8 rounded-lg bg-secondary text-white flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
</div>
<div class="w-5 h-5 rounded-full bg-secondary text-white flex items-center justify-center text-[12px]">
<span class="material-symbols-outlined text-[13px] font-bold">check</span>
</div>
</div>
<span class="text-[14px] font-bold text-on-surface">Hadir Tuntas</span>
<span class="text-[11px] text-on-surface-variant mt-1 leading-snug">Siswa mengikuti sesi belajar dari awal sampai selesai tepat waktu.</span>
</label>
<!-- IZIN BERHALANGAN -->
<label class="relative flex flex-col p-4 rounded-xl border border-outline-variant bg-surface-container-low/50 cursor-pointer transition-all hover:border-amber-400 hover:bg-amber-50/50">
<input class="peer sr-only" name="attendance_status" type="radio" value="izin">
<div class="flex items-center justify-between mb-2">
<div class="w-8 h-8 rounded-lg bg-amber-100 text-amber-800 flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">event_busy</span>
</div>
<div class="w-5 h-5 rounded-full border-2 border-outline-variant flex items-center justify-center"></div>
</div>
<span class="text-[14px] font-bold text-on-surface">Izin Berhalangan</span>
<span class="text-[11px] text-on-surface-variant mt-1 leading-snug">Ada keperluan mendadak, diajukan reschedule sesi pengganti.</span>
</label>
<!-- SAKIT -->
<label class="relative flex flex-col p-4 rounded-xl border border-outline-variant bg-surface-container-low/50 cursor-pointer transition-all hover:border-tertiary hover:bg-tertiary-fixed/30">
<input class="peer sr-only" name="attendance_status" type="radio" value="sakit">
<div class="flex items-center justify-between mb-2">
<div class="w-8 h-8 rounded-lg bg-tertiary-fixed text-on-tertiary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">medical_services</span>
</div>
<div class="w-5 h-5 rounded-full border-2 border-outline-variant flex items-center justify-center"></div>
</div>
<span class="text-[14px] font-bold text-on-surface">Sakit</span>
<span class="text-[11px] text-on-surface-variant mt-1 leading-snug">Kondisi siswa kurang fit untuk belajar hari ini.</span>
</label>
</div>
</div>
<!-- Rating Evaluasi Pemahaman Siswa -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-3 p-4 rounded-xl bg-surface-container-low/70 border border-outline-variant/60">
<div class="flex flex-col">
<span class="text-[13px] font-bold text-on-surface">Tingkat Pemahaman Siswa Hari Ini</span>
<span class="text-[11px] text-on-surface-variant">Berdasarkan hasil latihan kuis dan observasi selama belajar</span>
</div>
<div class="flex items-center gap-1.5 bg-surface-container-lowest px-3 py-1.5 rounded-lg border border-outline-variant shadow-sm self-start md:self-auto">
<div class="flex items-center gap-1 text-amber-500">
<button class="hover:scale-110 transition-transform" type="button"><span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span></button>
<button class="hover:scale-110 transition-transform" type="button"><span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span></button>
<button class="hover:scale-110 transition-transform" type="button"><span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span></button>
<button class="hover:scale-110 transition-transform" type="button"><span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span></button>
<button class="hover:scale-110 transition-transform" type="button"><span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span></button>
</div>
<span class="text-[12px] font-bold text-on-surface ml-1">5/5 (Sangat Paham)</span>
</div>
</div>
<!-- Catatan Orang Tua -->
<div class="flex flex-col gap-1.5">
<div class="flex justify-between items-center text-[12px]">
<label class="font-bold text-on-surface flex items-center gap-1">
<span class="">Catatan &amp; Masukan Wali Murid</span>
<span class="text-on-surface-variant font-normal">(Opsional)</span>
</label>
<span class="text-on-surface-variant">Maksimal 300 karakter</span>
</div>
<textarea class="w-full bg-surface-container-low/50 border border-outline-variant rounded-xl p-3 text-[13px] text-on-surface placeholder:text-outline focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="Contoh: Ananda Aisyah sangat antusias hari ini. Mohon Kak Rina memperbanyak latihan makhraj huruf 'Ain dan Ha untuk persiapan ujian..." rows="3"></textarea>
</div>
<!-- Form Buttons -->
<div class="flex items-center justify-end gap-3 pt-1">
<button class="px-4 py-2 rounded-xl bg-surface-container-low text-on-surface-variant text-[13px] font-semibold hover:bg-surface-container transition-colors" type="button">
                  Batal / Nanti Saja
                </button>
<button class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold shadow-md shadow-primary/20 transition-all active:scale-95" type="submit">
<span class="material-symbols-outlined text-[17px]">send</span>
<span class="">Kirim Presensi</span>
</button>
</div>
</form>
</div>
<!-- 3. SUCCESS NOTIFICATION BANNER (Showcased State) -->
<div class="rounded-2xl bg-secondary-container/30 border border-secondary/30 p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-4" id="success-state-banner">
<div class="flex items-start gap-3.5">
<div class="w-10 h-10 rounded-xl bg-secondary text-white flex items-center justify-center shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[22px]">verified</span>
</div>
<div class="flex flex-col gap-0.5">
<div class="flex items-center gap-2">
<span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-container text-[11px] font-bold">
                    Hadir Terverifikasi
                  </span>
<span class="text-[11px] text-secondary font-semibold">Tercatat di Sistem</span>
</div>
<h4 class="text-[15px] font-bold text-on-surface">Presensi Berhasil Disimpan &amp; Diverifikasi</h4>
<p class="text-[12px] text-on-surface-variant">
                  Tercatat pada <strong class="text-on-surface font-semibold">Rabu, 22 Okt 2026 • 17:15 WIB</strong> oleh <span class="text-primary font-bold">Ibu Nabila (Wali Murid)</span>. Catatan evaluasi telah dikirim ke tutor.
                </p>
</div>
</div>
<button class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-surface-container-lowest text-secondary text-[12px] font-bold border border-secondary/30 shadow-sm hover:bg-secondary-container/50 transition-colors shrink-0" type="button">
<span class="material-symbols-outlined text-[16px]">download</span>
<span class="">Unduh Ringkasan Sesi</span>
</button>
</div>
<!-- 4. RIWAYAT PERTEMUAN & CATATAN BELAJAR -->
<div class="rounded-2xl bg-surface-container-lowest border border-outline-variant/60 p-6 shadow-sm flex flex-col gap-5">
<!-- Header & Filter Bar -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-3">
<div class="flex flex-col">
<div class="flex items-center gap-2 text-on-surface">
<span class="material-symbols-outlined text-[20px] text-primary">history_edu</span>
<h3 class="text-[18px] font-bold">Riwayat Pertemuan &amp; Catatan Belajar</h3>
</div>
<p class="text-[12px] text-on-surface-variant">Daftar sesi yang telah terlaksana beserta jurnal materi dan nilai evaluasi</p>
</div>
<!-- Month & Tab Filters -->
<div class="flex flex-wrap items-center gap-2">
<div class="relative">
<select class="appearance-none bg-surface-container-low text-on-surface text-[12px] font-bold px-3 py-1.5 pr-7 rounded-lg border border-outline-variant cursor-pointer focus:outline-none">
<option selected="">Oktober 2026</option>
<option>September 2026</option>
<option>Agustus 2026</option>
</select>
<span class="material-symbols-outlined text-[16px] text-on-surface-variant absolute right-1.5 top-2 pointer-events-none">expand_more</span>
</div>
<div class="flex items-center p-0.5 rounded-lg bg-surface-container-low border border-outline-variant/60">
<button class="px-2.5 py-1 rounded-md bg-surface-container-lowest text-primary text-[11px] font-bold shadow-sm">Semua</button>
<button class="px-2.5 py-1 rounded-md text-on-surface-variant hover:text-on-surface text-[11px] font-semibold">Hadir ({{ $stat["hadir"] }})</button>
<button class="px-2.5 py-1 rounded-md text-on-surface-variant hover:text-on-surface text-[11px] font-semibold">Izin ({{ $stat["izin"] }})</button>
<button class="px-2.5 py-1 rounded-md text-on-surface-variant hover:text-on-surface text-[11px] font-semibold">Sakit ({{ $stat["sakit"] }})</button>
</div>
</div>
</div>
<!-- Attendance Progress Tracker Bar -->
<div class="p-4 rounded-xl bg-surface-container-low/70 border border-outline-variant/60 flex flex-col md:flex-row md:items-center justify-between gap-4">
<div class="flex flex-col gap-1.5 flex-1 max-w-sm">
<div class="flex justify-between items-center text-[12px]">
<span class="font-bold text-on-surface">Tingkat Kehadiran Paket Les</span>
<span class="text-secondary font-bold">{{ $stat["hadir"] }} dari {{ $stat["total"] }} Sesi Hadir ({{ $stat["pct"] }}%)</span>
</div>
<div class="w-full h-2 bg-surface-container-high rounded-full overflow-hidden">
<div class="h-full bg-secondary rounded-full" style="width: {{ $stat["pct"] }}%"></div>
</div>
</div>
<div class="flex items-center gap-5 text-[12px] text-on-surface-variant">
<div class="flex flex-col">
<span class="text-on-surface font-bold text-[13px]">2 Sesi Tersisa</span>
<span class="text-[11px]">Berlaku s/d 31 Okt 2026</span>
</div>
<div class="h-7 w-px bg-outline-variant"></div>
<div class="flex flex-col">
<span class="text-primary font-bold text-[13px]">1 Sesi Pengganti</span>
<span class="text-[11px]">Status: Dijadwalkan</span>
</div>
</div>
</div>
<!-- Sessions List -->
<div class="flex flex-col gap-3">

@forelse($history as $a)

@if($a->status === 'hadir')
<!-- Item 1: Hadir Tahsin -->
<div class="flex flex-col md:flex-row items-start md:items-center justify-between p-3.5 rounded-xl border border-outline-variant/60 bg-surface-container-lowest hover:bg-surface-container-low/50 transition-colors gap-3">
<div class="flex items-start gap-3">
<div class="w-10 h-10 rounded-xl bg-secondary-container/70 text-secondary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">menu_book</span>
</div>
<div class="flex flex-col gap-0.5">
<div class="flex flex-wrap items-center gap-2">
<span class="text-[13px] font-bold text-on-surface">{{ $a->session->topic ?: $a->session->subject }}</span>
<span class="px-2 py-0.2 rounded-full bg-secondary-fixed text-on-secondary-container text-[11px] font-bold">{{ $a->label }}</span>
<span class="text-[11px] text-on-surface-variant">{{ \App\Support\Fmt::dateShort($a->session->date) }} • {{ \App\Support\Fmt::range($a->session->start_time, $a->session->end_time) }}</span>
</div>
<p class="text-[12px] text-on-surface-variant">
<span class="font-semibold text-on-surface">Tutor: {{ $a->session->tutor->name ?? "-" }}</span> • 
                      <span class="italic text-on-surface-variant/90">"{{ $a->journal ?: "-" }}"</span>
</p>
</div>
</div>
<div class="flex items-center gap-3 shrink-0 self-end md:self-center">
<div class="flex items-center gap-1 text-amber-500 text-[12px] font-bold">
<span class="material-symbols-outlined text-[15px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="text-on-surface">{{ $a->understanding ? number_format($a->understanding, 1) : "-" }}</span>
</div>
<button class="inline-flex items-center gap-1 text-[11px] font-bold text-primary hover:underline px-2.5 py-1.5 rounded-lg hover:bg-primary-fixed/50 transition-colors" type="button">
<span class="">Lihat Jurnal</span>
<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</button>
</div>
</div>

@else
<!-- Item 3: Izin Bahasa Inggris -->
<div class="flex flex-col md:flex-row items-start md:items-center justify-between p-3.5 rounded-xl border border-amber-200 bg-amber-50/50 hover:bg-amber-50 transition-colors gap-3">
<div class="flex items-start gap-3">
<div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">event_repeat</span>
</div>
<div class="flex flex-col gap-0.5">
<div class="flex flex-wrap items-center gap-2">
<span class="text-[13px] font-bold text-on-surface">{{ $a->session->topic ?: $a->session->subject }}</span>
<span class="px-2 py-0.2 rounded-full bg-amber-200 text-amber-900 text-[11px] font-bold">{{ $a->label }}</span>
<span class="text-[11px] text-on-surface-variant">{{ \App\Support\Fmt::dateShort($a->session->date) }} • {{ \App\Support\Fmt::range($a->session->start_time, $a->session->end_time) }}</span>
</div>
<p class="text-[12px] text-amber-900/90">
<span class="font-semibold text-amber-950">Tutor: {{ $a->session->tutor->name ?? "-" }}</span> • 
                      <span class="italic">"{{ $a->journal ?: "-" }}"</span>
</p>
</div>
</div>
<div class="flex items-center gap-3 shrink-0 self-end md:self-center">
<span class="px-2.5 py-1 rounded-md bg-white border border-amber-300 text-amber-800 text-[11px] font-bold">Rescheduled</span>
<button class="inline-flex items-center gap-1 text-[11px] font-bold text-amber-900 hover:underline px-2.5 py-1.5 rounded-lg hover:bg-amber-100 transition-colors" type="button">
<span class="">Detail</span>
<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</button>
</div>
</div>

@endif

@empty
<div class="text-xs text-slate-400 p-4">Belum ada riwayat.</div>
@endforelse
</div>
<!-- Pagination Bar -->
<div class="flex items-center justify-between pt-2 border-t border-outline-variant/40 text-on-surface-variant text-[12px]">
<span class="">Menampilkan {{ $history->count() }} dari {{ $stat["total"] }} sesi terlaksana</span>
<div class="flex items-center gap-1">
<button class="w-8 h-8 rounded-lg bg-primary text-white font-bold text-[12px]">{{ $stat["sakit"] }}</button>
<button class="w-8 h-8 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container font-semibold text-[12px]">2</button>
<button class="w-8 h-8 rounded-lg bg-surface-container-low text-on-surface hover:bg-surface-container flex items-center justify-center text-[12px]">
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- 5. SUBTLE NEXT SESSION NOTIFICATION CARD -->
<div class="rounded-2xl bg-surface-container-low/60 border border-outline-variant/60 p-5 flex items-center justify-between gap-4">
<div class="flex items-center gap-3.5">
<div class="w-10 h-10 rounded-xl bg-surface-container-lowest text-primary flex items-center justify-center shrink-0 border border-outline-variant shadow-sm">
<span class="material-symbols-outlined text-[20px]">calendar_today</span>
</div>
<div class="flex flex-col">
<span class="text-[13px] font-bold text-on-surface">Jadwal Sesi Selanjutnya</span>
<span class="text-[12px] text-on-surface-variant">{{ $nextS ? \App\Support\Fmt::dateShort($nextS->date) . " • " . \App\Support\Fmt::hhmm($nextS->start_time) . " WIB (" . $nextS->subject . " bersama " . ($nextS->tutor->name ?? "-") . ")" : "Belum ada jadwal berikutnya" }}</span>
</div>
</div>
<a class="inline-flex items-center gap-1 text-primary text-[12px] font-bold hover:underline shrink-0" href="#">
<span class="">Buka Kalender</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
<!-- RIGHT SIDEBAR COLUMN (~32% width / 4 cols) -->
<div class="lg:col-span-4 flex flex-col gap-6">
<!-- WIDGET 1: RINGKASAN STATISTIK PRESENSI -->
<div class="rounded-2xl bg-surface-container-lowest border border-outline-variant/60 p-6 shadow-sm flex flex-col gap-4">
<div class="flex items-center justify-between">
<h3 class="text-[16px] font-bold text-on-surface">Statistik Presensi</h3>
<span class="text-[11px] font-bold text-primary bg-primary-fixed px-2.5 py-0.5 rounded-full">{{ mb_substr(\App\Support\Fmt::period(), 0, 3) }} {{ now()->year }}</span>
</div>
<!-- Donut / Circular Gauge Visual -->
<div class="flex items-center gap-4 p-4 bg-surface-container-low/60 rounded-xl border border-outline-variant/50">
<div class="relative w-20 h-20 shrink-0 flex items-center justify-center">
<svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
<path class="text-surface-container-high" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5"></path>
<path class="text-secondary" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="{{ $stat["pct"] }}, 100" stroke-linecap="round" stroke-width="3.5"></path>
</svg>
<div class="absolute flex flex-col items-center">
<span class="text-[18px] font-extrabold text-on-surface leading-none">{{ $stat["pct"] }}%</span>
<span class="text-[9px] font-bold text-on-surface-variant uppercase mt-0.5">Hadir</span>
</div>
</div>
<div class="flex flex-col gap-1">
<span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-secondary bg-secondary-container/60 px-2 py-0.5 rounded w-fit">
<span class="material-symbols-outlined text-[13px]">check_circle</span>
<span class="">{{ $stat["pct"] >= 85 ? "Sangat Baik" : "Perlu Ditingkatkan" }}</span>
</span>
<p class="text-[12px] text-on-surface-variant leading-snug">
                  Tingkat kehadiran di atas ambang batas standar (85%).
                </p>
</div>
</div>
<!-- Detailed Grid Counters -->
<div class="grid grid-cols-3 gap-2 text-center">
<div class="p-3 rounded-xl bg-surface-container-low/70 border border-outline-variant/40">
<span class="text-[20px] font-extrabold text-secondary block leading-none mb-1">{{ $stat["hadir"] }}</span>
<span class="text-[11px] font-semibold text-on-surface-variant">Sesi Hadir</span>
</div>
<div class="p-3 rounded-xl bg-surface-container-low/70 border border-outline-variant/40">
<span class="text-[20px] font-extrabold text-amber-600 block leading-none mb-1">{{ $stat["izin"] }}</span>
<span class="text-[11px] font-semibold text-on-surface-variant">Izin Sakit</span>
</div>
<div class="p-3 rounded-xl bg-surface-container-low/70 border border-outline-variant/40">
<span class="text-[20px] font-extrabold text-primary block leading-none mb-1">1</span>
<span class="text-[11px] font-semibold text-on-surface-variant">Reschedule</span>
</div>
</div>
<!-- Academic Note -->
<div class="flex items-center gap-3 p-3 rounded-xl bg-primary-fixed/40 border border-primary-fixed">
<span class="material-symbols-outlined text-primary text-[22px] shrink-0">workspace_premium</span>
<div class="flex flex-col">
<span class="text-[12px] font-bold text-on-primary-fixed">Konsistensi Tinggi</span>
<span class="text-[11px] text-on-surface-variant">Target hafalan juz 30 sesuai rencana kurikulum.</span>
</div>
</div>
</div>
<!-- WIDGET 2: PANDUAN PRESENSI (SOP) -->
<div class="rounded-2xl bg-surface-container-lowest border border-outline-variant/60 p-6 shadow-sm flex flex-col gap-4">
<div class="flex items-center gap-2 text-on-surface">
<span class="material-symbols-outlined text-primary text-[20px]">info</span>
<h3 class="text-[16px] font-bold">Panduan Presensi</h3>
</div>
<div class="flex flex-col gap-3.5">
<div class="flex items-start gap-3">
<div class="w-6 h-6 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-bold text-[12px] shrink-0 mt-0.5">
                  1
                </div>
<div class="flex flex-col leading-snug">
<span class="text-[13px] font-bold text-on-surface">Jendela Waktu Pengisian</span>
<p class="text-[12px] text-on-surface-variant mt-0.5">
                    Presensi dapat diisi sejak sesi dimulai hingga maksimal <strong class="text-on-surface font-semibold">2 jam</strong> setelah sesi berakhir.
                  </p>
</div>
</div>
<div class="flex items-start gap-3">
<div class="w-6 h-6 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-bold text-[12px] shrink-0 mt-0.5">
                  2
                </div>
<div class="flex flex-col leading-snug">
<span class="text-[13px] font-bold text-on-surface">Konfirmasi Izin &amp; Sakit</span>
<p class="text-[12px] text-on-surface-variant mt-0.5">
                    Jika berhalangan, kabari selambatnya <strong class="text-on-surface font-semibold">3 jam sebelum jadwal</strong> agar hak sesi pengganti tetap aktif.
                  </p>
</div>
</div>
<div class="flex items-start gap-3">
<div class="w-6 h-6 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-bold text-[12px] shrink-0 mt-0.5">
                  3
                </div>
<div class="flex flex-col leading-snug">
<span class="text-[13px] font-bold text-on-surface">Rekap Otomatis Honor Guru</span>
<p class="text-[12px] text-on-surface-variant mt-0.5">
                    Data kehadiran orang tua langsung terintegrasi dengan administrasi pencairan honor guru secara transparan.
                  </p>
</div>
</div>
</div>
</div>
<!-- WIDGET 3: KOORDINATOR CABANG / BANTUAN -->
<div class="rounded-2xl bg-surface-container-lowest border border-outline-variant/60 p-6 shadow-sm flex flex-col gap-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-secondary-container text-secondary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[22px]">contact_support</span>
</div>
<div class="flex flex-col">
<span class="text-[14px] font-bold text-on-surface">Koordinator Cabang</span>
<span class="text-[11px] text-on-surface-variant">Cabang Tebet &amp; Pancoran</span>
</div>
</div>
<p class="text-[12px] text-on-surface-variant leading-relaxed">
              Ada kendala perubahan jadwal tutor atau ingin reschedule sesi manual? Tim cabang siap membantu.
            </p>
<div class="flex items-center gap-3 p-3 rounded-xl bg-surface-container-low/70 border border-outline-variant/50">
<div class="relative">
<img class="w-10 h-10 rounded-full object-cover" data-alt="Portrait of Kak Arya Pratama, academic coordinator" src="https://lh3.googleusercontent.com/aida-public/AB6AXuALt81C0vDxCCnXJfp5bkTZUv2qFLmRfYkNVE-yFff6ny80YiiDiSF0fyZAu-Np7PXlSBexWE-Ilserlmy6B0bgnAtgmUlF7o_ahOq3xRT8FmIHy1bBmD5P89cVd3xMIwy_HZgJwHRM2LIJSjMoKVZcDfOAVsGfkO1W2XZVjrkYGiL-CYfEOe2rkwNH28s0V44w75Lp4dhygrCgNmpIz7GQo5h1Xn8KvEwVLrYiB8meMew6yAsXh9TYgg">
<span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-emerald-500 rounded-full ring-2 ring-white"></span>
</div>
<div class="flex flex-col min-w-0 flex-1">
<span class="text-[13px] font-bold text-on-surface truncate">Kak Arya Pratama</span>
<span class="text-[11px] text-secondary font-semibold">Online • Respon Cepat &lt;5 Menit</span>
</div>
</div>
<a class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-600 text-white text-[13px] font-bold shadow-md hover:bg-emerald-700 transition-all" href="https://wa.me/6281234567890" target="_blank">
<span class="material-symbols-outlined text-[17px]">chat</span>
<span class="">WhatsApp Kak Arya</span>
</a>
</div>
</div>
</div>
</main>
</div>


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

const LIVE = {!! json_encode($liveJson) !!};
const form = document.getElementById('absenForm');
if (form) {
  let stars = 5; const starBtns = [...form.querySelectorAll('button')].filter(b => b.querySelector('span') && b.querySelector('span').textContent.trim() === 'star');
  const paint = n => starBtns.forEach((b, i) => { b.style.opacity = i < n ? '1' : '.3'; }); paint(5);
  starBtns.forEach((b, i) => b.addEventListener('click', () => { stars = i + 1; paint(stars); const lab = [...form.querySelectorAll('span')].find(s => /\/5 \(/.test(s.textContent)); if (lab) lab.textContent = stars + '/5 (' + ['Perlu Bimbingan', 'Kurang Paham', 'Cukup Paham', 'Paham', 'Sangat Paham'][i] + ')'; }));
  form.addEventListener('submit', async e => { e.preventDefault(); if (!LIVE) return OPC.toast('Belum ada sesi yang bisa diisi.', false);
    const st = (form.querySelector('input[name=attendance_status]:checked') || {}).value;
    try { const j = await OPC.post({!! json_encode(url('/portal/presensi')) !!} + '/' + LIVE.id, {status: st, understanding: stars, note: form.querySelector('textarea').value});
      const b = document.getElementById('success-state-banner'); if (b) b.classList.remove('hidden'); OPC.toast(j.message, true); setTimeout(() => location.reload(), 1500); } catch (err) {} });
  OPC.find('Batal / Nanti Saja', {sel: 'button'}).forEach(b => b.addEventListener('click', () => OPC.go({!! json_encode(route('portal.beranda')) !!})));
}
OPC.on('Unduh Ringkasan Sesi', () => window.print(), {sel: 'button'});
document.querySelectorAll('[data-detail]').forEach(() => {});
document.querySelectorAll('button').forEach(b => { const t = OPC.label(b); if (t === 'Lihat Jurnal' || t === 'Detail') b.addEventListener('click', () => { const it = b.closest('div[class*="border"]'); const jr = it ? [...it.querySelectorAll('span')].find(s => s.textContent.startsWith('"') || s.textContent.startsWith('“')) : null; OPC.dialog({title: 'Jurnal Pertemuan', fields: [{name: 'j', label: 'Catatan tutor', type: 'textarea', value: jr ? jr.textContent : 'Belum ada jurnal.'}], submit: 'Tutup', onSubmit: async () => {}}); }); });
document.querySelectorAll('a').forEach(a => { if (a.href.includes('wa.me/6281234567890')) a.href = 'https://wa.me/6281198760001'; });
OPC.on('Hubungi Tutor via WhatsApp', () => {}, {sel: 'a', exact: false});
const fl = [...document.querySelectorAll('select')][0]; if (fl) fl.addEventListener('change', () => OPC.toast('Menampilkan riwayat ' + fl.value, true));
const hs = ['Semua', 'Hadir', 'Izin', 'Sakit']; const items = [...document.querySelectorAll('[class*="border"]')].filter(d => d.textContent.includes('Tutor:') && d.querySelector('button'));
hs.forEach(h => OPC.find(h, {sel: 'button', exact: false}).filter(b => b.parentElement.children.length >= 3 && /Semua|Hadir|Izin|Sakit/.test(b.parentElement.textContent)).forEach(b => b.addEventListener('click', () => items.forEach(i => { i.style.display = (h === 'Semua' || i.textContent.includes(h)) ? '' : 'none'; }))));
</script></body></html>