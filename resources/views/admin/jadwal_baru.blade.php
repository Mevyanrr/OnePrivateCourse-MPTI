{{-- resources/views/admin/jadwal_baru.blade.php --}}
@extends('portal')
@section('title', 'Tambah Jadwal Baru')

@section('topbar')
    <div class="crumb">
        <span>Operasional Cabang</span><span>›</span><span>Jadwal &amp; Sesi Les</span><span>›</span><b>Tambah Jadwal Baru</b>
    </div>
@endsection

@section('topbar-right')
    @php $namaAdmin = auth()->user()->name; @endphp
    <div class="userbox">
        <div class="who"><b>{{ $namaAdmin }}</b><small>Admin Cabang</small></div>
        <div class="avatar-c">{{ collect(explode(' ', $namaAdmin))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->join('') }}</div>
    </div>
@endsection

@section('content')
{{-- Reset ringan pengganti preflight Tailwind, hanya berlaku di area halaman ini --}}
<style>
    :where(.jb) *, :where(.jb) ::before, :where(.jb) ::after { box-sizing: border-box; border-width: 0; border-style: solid; border-color: #e5e7eb; }
    :where(.jb) :is(h1,h2,h3,h4,p) { margin: 0; font-size: inherit; font-weight: inherit; }
    :where(.jb) button { background-color: transparent; background-image: none; font-family: inherit; font-size: 100%; line-height: inherit; color: inherit; margin: 0; padding: 0; cursor: pointer; }
    :where(.jb) :is(input,select,textarea) { font-family: inherit; font-size: 100%; margin: 0; }
    :where(.jb) a { color: inherit; text-decoration: inherit; }
    .jb { font-family: 'Plus Jakarta Sans', sans-serif; }
    .jb .fld { width: 100%; height: 44px; padding: 0 12px; border-radius: 12px; border: 1px solid rgba(195,198,215,.7); background: #fff; font-size: 12px; font-weight: 600; color: #131b2e; }
    .jb .fld:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 2px rgba(37,99,235,.15); }
    .jb textarea.fld { height: auto; min-height: 72px; padding: 10px 12px; font-weight: 500; line-height: 1.5; resize: vertical; }
    .jb button:disabled { cursor: not-allowed; }
</style>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>

<div class="jb flex flex-col w-full max-w-5xl mx-auto gap-8 text-on-surface antialiased">

<!-- =================================================================== -->
<!-- FORM 1: TAMBAH SESI LES                                             -->
<!-- =================================================================== -->
<div id="formTambah" class="flex flex-col bg-surface-container-lowest rounded-2xl border border-outline-variant/40 shadow-xl overflow-hidden">

    <!-- Header -->
    <div class="p-6 border-b border-outline-variant/30 flex items-start justify-between gap-4">
        <div class="flex items-start gap-3.5">
            <div class="w-10 h-10 rounded-xl bg-secondary-container/50 text-secondary border border-secondary/20 flex items-center justify-center shrink-0 mt-0.5">
                <span class="material-symbols-outlined text-[24px]">event_available</span>
            </div>
            <div>
                <h2 class="text-lg font-bold text-on-surface">Tambah Sesi Les Baru</h2>
                <p class="text-xs text-on-surface-variant mt-1 leading-relaxed">Alokasikan sesi privat siswa dengan validasi ketersediaan tutor dan jadwal.</p>
            </div>
        </div>
        <button id="btnTutup" class="text-on-surface-variant hover:text-on-surface p-1.5 rounded-lg hover:bg-surface-container transition-colors shrink-0" title="Tutup" type="button">
            <span class="material-symbols-outlined text-[20px]">close</span>
        </button>
    </div>

    <!-- Body -->
    <div class="p-6 grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">

        <!-- Kolom kiri: form -->
        <div class="lg:col-span-7 flex flex-col gap-4">

            <!-- Siswa -->
            <div class="flex flex-col gap-1.5">
                <label for="selSiswa" class="text-xs text-on-surface font-bold flex items-center justify-between">
                    <span>Pilih Siswa &amp; Lokasi Domisili</span>
                    <span id="stuCode" class="text-[11px] text-primary font-medium tracking-wide"></span>
                </label>
                <select id="selSiswa" class="fld"></select>
                <div class="p-3 bg-surface-container-low rounded-xl border border-outline-variant/40 flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                        <div id="stuAv" class="w-9 h-9 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center font-bold text-xs shrink-0">-</div>
                        <div class="min-w-0">
                            <div id="stuName" class="text-xs font-bold text-on-surface truncate">-</div>
                            <div id="stuAddr" class="text-[11px] text-on-surface-variant truncate">-</div>
                        </div>
                    </div>
                    <span id="stuBadge" class="px-2.5 py-1 rounded-md bg-primary/10 text-primary text-[11px] font-semibold shrink-0 whitespace-nowrap">-</span>
                </div>
            </div>

            <!-- Tutor -->
            <div class="flex flex-col gap-1.5">
                <label for="selTutor" class="text-xs text-on-surface font-bold flex items-center justify-between">
                    <span>Pilih Tutor Pengajar</span>
                    <span class="text-[11px] text-secondary font-semibold flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary inline-block"></span>
                        <span id="tutorAvail">-</span>
                    </span>
                </label>
                <select id="selTutor" class="fld"></select>
                <div id="tutorSpec" class="text-[11px] text-on-surface-variant px-1 truncate"></div>
            </div>

            <!-- Mapel & paket -->
            <div class="flex flex-col gap-1.5">
                <label class="text-xs text-on-surface font-bold">Mata Pelajaran &amp; Paket Kursus</label>
                <div class="p-3 bg-surface-container-low rounded-xl border border-outline-variant/40 flex items-center gap-2 text-on-surface min-w-0">
                    <span class="material-symbols-outlined text-[18px] text-primary shrink-0">menu_book</span>
                    <span id="program" class="text-xs font-semibold truncate">-</span>
                </div>
            </div>

            <!-- Tanggal & waktu -->
            <div class="grid grid-cols-2 gap-3">
                <div class="flex flex-col gap-1.5">
                    <label for="inTanggal" class="text-xs text-on-surface font-bold">Tanggal Sesi</label>
                    <input id="inTanggal" type="date" class="fld"/>
                    <div id="tglLabel" class="text-[11px] text-on-surface-variant px-1"></div>
                </div>
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs text-on-surface font-bold flex items-center justify-between">
                        <span>Waktu Pelaksanaan</span>
                        <span id="durasi" class="text-[11px] font-bold text-on-surface-variant bg-surface-container px-1.5 py-0.5 rounded">90m</span>
                    </label>
                    <div class="grid grid-cols-2 gap-2">
                        <input id="inMulai" type="time" class="fld" aria-label="Jam mulai"/>
                        <input id="inSelesai" type="time" class="fld" aria-label="Jam selesai"/>
                    </div>
                </div>
            </div>

            <!-- Metode & frekuensi -->
            <div class="grid grid-cols-2 gap-3">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs text-on-surface font-bold">Metode Belajar</label>
                    <div class="grid grid-cols-2 gap-1 bg-surface-container-low p-1 rounded-xl border border-outline-variant/30">
                        <button type="button" data-method="home_visit" class="tg py-1.5 rounded-lg text-xs font-bold flex items-center justify-center gap-1.5">
                            <span class="material-symbols-outlined text-[15px]">home</span> Home Visit
                        </button>
                        <button type="button" data-method="online" class="tg py-1.5 rounded-lg text-xs font-bold flex items-center justify-center gap-1.5">
                            <span class="material-symbols-outlined text-[15px]">videocam</span> Zoom
                        </button>
                    </div>
                </div>
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs text-on-surface font-bold">Frekuensi Sesi</label>
                    <div class="grid grid-cols-2 gap-1 bg-surface-container-low p-1 rounded-xl border border-outline-variant/30">
                        <button type="button" data-repeat="sekali" class="tg py-1.5 rounded-lg text-xs font-bold">Sekali Saja</button>
                        <button type="button" data-repeat="rutin" id="btnRutin" class="tg py-1.5 rounded-lg text-xs font-bold">Rutin</button>
                    </div>
                </div>
            </div>

            <!-- Catatan -->
            <div class="flex flex-col gap-1.5">
                <label for="inCatatan" class="text-xs text-on-surface font-bold">Catatan Pengajaran</label>
                <textarea id="inCatatan" class="fld" placeholder="Catatan pengajaran..."></textarea>
            </div>
        </div>

        <!-- Kolom kanan: validasi sistem -->
        <div id="panelValidasi" class="lg:col-span-5 flex flex-col justify-between rounded-xl bg-surface-container-low/80 border border-secondary/40 p-5">
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

                <div id="hasilBox" class="p-3.5 rounded-xl bg-surface-container-lowest border border-secondary-container shadow-xs flex flex-col gap-1.5">
                    <div class="flex items-center gap-2">
                        <span id="hasilIcon" class="material-symbols-outlined text-secondary text-[22px]">check_circle</span>
                        <span id="hasilJudul" class="text-xs font-bold text-secondary">Memeriksa jadwal...</span>
                    </div>
                    <p id="hasilPesan" class="text-[11px] text-on-surface-variant leading-relaxed"></p>
                </div>

                <div class="flex flex-col gap-3 pt-1 text-[11px]">
                    <div class="flex items-start gap-2.5 text-on-surface">
                        <span class="material-symbols-outlined text-secondary text-[16px] shrink-0 mt-0.5">done_all</span>
                        <span class="leading-relaxed"><strong>Ketersediaan Tutor:</strong> <span id="chk0">-</span></span>
                    </div>
                    <div class="flex items-start gap-2.5 text-on-surface">
                        <span class="material-symbols-outlined text-secondary text-[16px] shrink-0 mt-0.5">done_all</span>
                        <span class="leading-relaxed"><strong>Beban Tutor:</strong> <span id="chk1">-</span></span>
                    </div>
                    <div class="flex items-start gap-2.5 text-on-surface">
                        <span class="material-symbols-outlined text-secondary text-[16px] shrink-0 mt-0.5">done_all</span>
                        <span class="leading-relaxed"><strong>Beban Siswa:</strong> <span id="chk2">-</span></span>
                    </div>
                    <div class="flex items-start gap-2.5 text-on-surface">
                        <span class="material-symbols-outlined text-secondary text-[16px] shrink-0 mt-0.5">done_all</span>
                        <span class="leading-relaxed"><strong>Estimasi Perjalanan:</strong> <span id="chk3">-</span></span>
                    </div>
                </div>
            </div>

            <div class="mt-5 pt-3 border-t border-outline-variant/20 flex items-center justify-between text-[11px] text-on-surface-variant">
                <span>Algoritma Lentera v2.4</span>
                <span class="text-secondary font-bold">Tingkat Keyakinan 100%</span>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="p-4 px-6 bg-surface-container-low border-t border-outline-variant/30 flex items-center justify-between">
        <div class="flex items-center gap-1.5 text-on-surface-variant text-xs">
            <span class="material-symbols-outlined text-[16px] text-secondary">lock</span>
            <span>Alokasi ruangan &amp; sesi otomatis dikunci</span>
        </div>
        <div class="flex items-center gap-3">
            <button id="btnBatal" class="h-10 px-5 rounded-xl border border-outline-variant/70 hover:bg-surface-container-high text-xs font-bold text-on-surface transition-colors" type="button">Batal</button>
            <button id="btnSimpan" class="h-10 px-5 rounded-xl bg-primary-container hover:bg-primary text-on-primary text-xs font-bold flex items-center gap-2 shadow-sm transition-colors disabled:opacity-50" type="button">
                <span class="material-symbols-outlined text-[18px]">save</span>
                <span>Simpan Jadwal Sesi</span>
            </button>
        </div>
    </div>
</div>

<!-- =================================================================== -->
<!-- FORM 2: UBAH JADWAL (hanya tampil jika $edit ada / ada bentrok)      -->
<!-- =================================================================== -->
<div id="formUbah" class="hidden flex-col bg-surface-container-lowest rounded-2xl border border-error/50 shadow-xl overflow-hidden">

    <div class="p-6 border-b border-outline-variant/30 flex items-start justify-between gap-4">
        <div class="flex items-start gap-3.5">
            <div class="w-10 h-10 rounded-xl bg-error-container/60 text-error border border-error/20 flex items-center justify-center shrink-0 mt-0.5">
                <span class="material-symbols-outlined text-[24px]">event_busy</span>
            </div>
            <div>
                <div class="flex items-center gap-2.5 flex-wrap">
                    <h2 class="text-lg font-bold text-on-surface">Ubah Jadwal Sesi Les</h2>
                    <span class="px-2.5 py-0.5 rounded-full bg-error-container text-error text-xs font-bold border border-error/30">Bentrok Terdeteksi</span>
                </div>
                <p class="text-xs text-on-surface-variant mt-1 leading-relaxed">Reschedule sesi yang bentrok dengan rekomendasi solusi otomatis.</p>
            </div>
        </div>
        <button id="btnTutup2" class="text-on-surface-variant hover:text-on-surface p-1.5 rounded-lg hover:bg-surface-container transition-colors shrink-0" title="Tutup" type="button">
            <span class="material-symbols-outlined text-[20px]">close</span>
        </button>
    </div>

    <div class="px-6 py-3 bg-error-container/20 border-b border-error/20 flex flex-wrap items-center justify-between gap-3 text-xs">
        <div class="flex items-center gap-2 min-w-0">
            <span class="font-bold text-on-surface-variant shrink-0">Jadwal Lama:</span>
            <span id="uLama" class="line-through text-outline truncate font-medium">-</span>
        </div>
        <span class="material-symbols-outlined text-error text-[18px] shrink-0">arrow_forward</span>
        <div class="flex items-center gap-2 min-w-0">
            <span class="font-bold text-error shrink-0">Usulan Baru:</span>
            <span id="uBaru" class="px-2.5 py-1 bg-error-container text-error rounded-lg font-bold truncate border border-error/30">Pilih slot di bawah</span>
        </div>
    </div>

    <div class="p-6 grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
        <div class="lg:col-span-7 flex flex-col gap-4">
            <div class="flex flex-col gap-1.5">
                <label class="text-xs text-on-surface font-bold flex items-center justify-between">
                    <span>Siswa Terdaftar</span>
                    <span id="uCode" class="text-[11px] text-on-surface-variant font-medium tracking-wide"></span>
                </label>
                <div class="p-3 bg-surface-container-low rounded-xl border border-outline-variant/40 flex items-center gap-3 min-w-0">
                    <div id="uStuAv" class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold text-xs shrink-0">-</div>
                    <div class="min-w-0">
                        <div id="uStuName" class="text-xs font-bold text-on-surface truncate">-</div>
                        <div id="uSchool" class="text-[11px] text-on-surface-variant truncate">-</div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs text-on-surface font-bold">Tutor Terpilih</label>
                <div class="p-3 bg-surface-container-lowest rounded-xl border border-error/50 flex items-center justify-between shadow-xs">
                    <div class="flex items-center gap-3 min-w-0">
                        <div id="uTutAv" class="w-9 h-9 rounded-full bg-error-container text-error flex items-center justify-center font-bold text-xs shrink-0">-</div>
                        <div class="min-w-0">
                            <div id="uTutName" class="text-xs font-bold text-on-surface truncate">-</div>
                            <div id="uTutHead" class="text-[11px] text-error font-medium truncate">-</div>
                        </div>
                    </div>
                    <span class="material-symbols-outlined text-error text-[20px] shrink-0">warning</span>
                </div>
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="uAlasan" class="text-xs text-on-surface font-bold flex items-center justify-between">
                    <span>Alasan Perubahan Jadwal <span class="text-error">*</span></span>
                    <span class="text-[11px] text-on-surface-variant font-medium">Wajib diisi</span>
                </label>
                <textarea id="uAlasan" class="fld" placeholder="Tulis alasan perubahan jadwal..."></textarea>
            </div>

            <div class="p-3 rounded-xl bg-surface-container-low border border-outline-variant/30 flex items-start gap-2.5">
                <span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">info</span>
                <p class="text-[11px] text-on-surface-variant leading-relaxed">
                    Perubahan langsung diperbarui di sistem dan notifikasi otomatis dikirimkan ke tutor &amp; orang tua.
                </p>
            </div>
        </div>

        <div class="lg:col-span-5 flex flex-col justify-between rounded-xl bg-error-container/15 border border-error/30 p-5">
            <div class="flex flex-col gap-3.5">
                <div class="p-3.5 rounded-xl bg-surface-container-lowest border border-error/40 shadow-xs flex flex-col gap-1.5">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-error text-[20px]">warning</span>
                        <span class="text-xs font-bold text-error">Jadwal Bentrok Ditemukan!</span>
                    </div>
                    <p id="uKonflik" class="text-[11px] text-on-surface leading-relaxed"></p>
                </div>
                <div class="flex flex-col gap-2 pt-1">
                    <span class="text-xs font-bold text-on-surface flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-primary text-[16px]">auto_fix_high</span>
                        Pilih Rekomendasi Slot Pengganti (Tersedia):
                    </span>
                    <div id="uSlots" class="flex flex-col gap-2"></div>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-error/20 flex items-center justify-between text-[11px]">
                <span class="text-error font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-[14px]">error</span> Harus diselesaikan
                </span>
                <span class="text-on-surface-variant">Pilih salah satu slot di atas</span>
            </div>
        </div>
    </div>

    <div class="p-4 px-6 bg-surface-container-low border-t border-outline-variant/30 flex items-center justify-between">
        <div class="flex items-center gap-1.5 text-error text-xs font-semibold">
            <span class="material-symbols-outlined text-[16px]">error_outline</span>
            <span>Pilih slot pengganti untuk mengaktifkan tombol simpan</span>
        </div>
        <div class="flex items-center gap-3">
            <button id="btnBatal2" class="h-10 px-5 rounded-xl border border-outline-variant/70 hover:bg-surface-container-high text-xs font-bold text-on-surface transition-colors" type="button">Batal</button>
            <button id="btnSimpan2" class="h-10 px-5 rounded-xl bg-primary-container hover:bg-primary text-on-primary text-xs font-bold flex items-center gap-2 shadow-sm transition-colors disabled:opacity-50" type="button" disabled>
                <span class="material-symbols-outlined text-[18px]">save</span>
                <span>Simpan Jadwal</span>
            </button>
        </div>
    </div>
</div>

</div>
@endsection

@push('scripts')
<script>
window.tailwind = window.tailwind || {};
window.__twcfg = tailwind.config = {
  darkMode: "class",
  corePlugins: { preflight: false },
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
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>tailwind.config = window.__twcfg;</script>
<script src="{{ asset('js/opc.js') }}"></script>
<script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});

const LIST = {!! json_encode(route('admin.jadwal')) !!};
const API = {!! json_encode(url('/admin/jadwal')) !!};
const STUDENTS = {!! json_encode($studentsJson) !!} || [];
const TUTORS = {!! json_encode($tutorsJson) !!} || [];
const EDIT = {!! json_encode($edit) !!};

const $ = id => document.getElementById(id);
const DAYS = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
const MON = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
const dayN = d => DAYS[new Date(d + 'T00:00:00').getDay()];
const dlabel = d => { const x = new Date(d + 'T00:00:00'); return dayN(d) + ', ' + x.getDate() + ' ' + MON[x.getMonth()] + ' ' + x.getFullYear(); };
const mins = (a, b) => { const f = s => (+s.split(':')[0]) * 60 + (+s.split(':')[1]); return f(b) - f(a); };
const initials = n => (n || '').split(' ').filter(Boolean).map(w => w[0].toUpperCase()).slice(0, 2).join('');
const goList = () => OPC.go(LIST);

// toggle button: aktif = biru, nonaktif = abu
function setToggle(btns, activeBtn) {
  btns.forEach(b => {
    const on = b === activeBtn;
    b.classList.toggle('bg-primary-container', on);
    b.classList.toggle('text-on-primary', on);
    b.classList.toggle('shadow-sm', on);
    b.classList.toggle('text-on-surface-variant', !on);
  });
}

// ================= FORM 1: TAMBAH =================
(function () {
  const selS = $('selSiswa'), selT = $('selTutor');
  const st = {
    student: STUDENTS[0] || null,
    tutor: TUTORS[0] || null,
    date: {!! json_encode(now()->addDay()->toDateString()) !!},
    start: '16:00', end: '17:30',
    method: 'home_visit', repeat: 'sekali', ok: false
  };

  // opsi dropdown
  selS.innerHTML = STUDENTS.length
    ? STUDENTS.map(s => '<option value="' + s.id + '">' + s.name + ' (' + s.grade + ')</option>').join('')
    : '<option value="">Belum ada siswa</option>';
  selT.innerHTML = TUTORS.length
    ? TUTORS.map(t => '<option value="' + t.id + '">' + t.name + '</option>').join('')
    : '<option value="">Belum ada tutor</option>';

  // pre-select dari URL (?student=..&tutor=..) atau dari tutor milik siswa
  const q = new URLSearchParams(location.search);
  if (q.get('student')) st.student = STUDENTS.find(s => String(s.id) === q.get('student')) || st.student;
  if (q.get('tutor')) st.tutor = TUTORS.find(t => String(t.id) === q.get('tutor')) || st.tutor;
  else if (st.student && st.student.tutor_id) st.tutor = TUTORS.find(t => t.id === st.student.tutor_id) || st.tutor;
  if (st.student) st.method = st.student.method === 'online' ? 'online' : 'home_visit';

  const methodBtns = [...document.querySelectorAll('[data-method]')];
  const repeatBtns = [...document.querySelectorAll('[data-repeat]')];

  function paint() {
    const s = st.student, t = st.tutor;
    if (s) {
      selS.value = s.id;
      $('stuCode').textContent = 'ID: ' + (s.code || '-');
      $('stuAv').textContent = s.initials || initials(s.name);
      $('stuName').textContent = s.name + ' (' + s.grade + ')';
      $('stuAddr').textContent = s.address || '-';
      $('stuBadge').textContent = (s.method === 'online' ? 'Online' : 'Home Visit') + (s.area ? ' - ' + s.area : '');
      $('program').textContent = s.program || '-';
    }
    if (t) {
      selT.value = t.id;
      $('tutorSpec').textContent = t.headline ? 'Spesialisasi: ' + t.headline : '';
    }
    $('inTanggal').value = st.date;
    $('inMulai').value = st.start;
    $('inSelesai').value = st.end;
    $('tglLabel').textContent = st.date ? dlabel(st.date) : '';
    $('durasi').textContent = (st.start && st.end ? mins(st.start, st.end) : 0) + 'm';
    $('btnRutin').textContent = st.date ? 'Rutin ' + dayN(st.date) : 'Rutin';
    setToggle(methodBtns, methodBtns.find(b => b.dataset.method === st.method));
    setToggle(repeatBtns, repeatBtns.find(b => b.dataset.repeat === st.repeat));
  }

  // live check ke server
  let seq = 0;
  async function live() {
    if (!st.student || !st.tutor || !st.date || !st.start || !st.end) return;
    const my = ++seq;
    let r;
    try {
      r = await OPC.post(API + '/cek', {
        student_id: st.student.id, tutor_id: st.tutor.id,
        date: st.date, start_time: st.start, end_time: st.end
      });
    } catch (e) { return; }
    if (my !== seq) return;
    st.ok = !!r.ok;

    $('hasilJudul').textContent = r.ok ? 'Jadwal Aman & Siap Disimpan' : 'Jadwal Bentrok!';
    $('hasilJudul').className = 'text-xs font-bold ' + (r.ok ? 'text-secondary' : 'text-error');
    $('hasilIcon').textContent = r.ok ? 'check_circle' : 'warning';
    $('hasilIcon').className = 'material-symbols-outlined text-[22px] ' + (r.ok ? 'text-secondary' : 'text-error');
    $('hasilBox').className = 'p-3.5 rounded-xl bg-surface-container-lowest shadow-xs flex flex-col gap-1.5 border ' + (r.ok ? 'border-secondary-container' : 'border-error/40');
    $('hasilPesan').textContent = r.message || '';
    (r.checks || []).forEach((c, i) => { const e = $('chk' + i); if (e) e.textContent = c; });
    if (r.avail) $('tutorAvail').textContent = r.avail;
    $('btnSimpan').disabled = !r.ok;
  }

  const refresh = () => { paint(); live(); };

  selS.addEventListener('change', () => {
    const s = STUDENTS.find(x => String(x.id) === selS.value);
    if (!s) return;
    st.student = s;
    if (s.tutor_id) st.tutor = TUTORS.find(t => t.id === s.tutor_id) || st.tutor;
    st.method = s.method === 'online' ? 'online' : 'home_visit';
    refresh();
  });
  selT.addEventListener('change', () => {
    const t = TUTORS.find(x => String(x.id) === selT.value);
    if (t) { st.tutor = t; refresh(); }
  });
  $('inTanggal').addEventListener('change', e => { if (e.target.value) { st.date = e.target.value; refresh(); } });
  $('inMulai').addEventListener('change', e => { if (e.target.value) { st.start = e.target.value; refresh(); } });
  $('inSelesai').addEventListener('change', e => { if (e.target.value) { st.end = e.target.value; refresh(); } });
  methodBtns.forEach(b => b.addEventListener('click', () => { st.method = b.dataset.method; paint(); }));
  repeatBtns.forEach(b => b.addEventListener('click', () => { st.repeat = b.dataset.repeat; paint(); }));

  $('btnTutup').addEventListener('click', goList);
  $('btnBatal').addEventListener('click', goList);
  $('btnSimpan').addEventListener('click', async () => {
    if (!st.student || !st.tutor) return OPC.toast('Pilih siswa dan tutor dulu.', false);
    try {
      const j = await OPC.post(API, {
        student_id: st.student.id, tutor_id: st.tutor.id,
        date: st.date, start_time: st.start, end_time: st.end,
        method: st.method, repeat: st.repeat,
        notes: $('inCatatan').value.trim()
      });
      OPC.done(j, LIST);
    } catch (e) {}
  });

  $('btnSimpan').disabled = true;
  refresh();
})();

// ================= FORM 2: UBAH (bentrok) =================
(function () {
  if (!EDIT) return;
  const box = $('formUbah');
  box.classList.remove('hidden');
  box.classList.add('flex');
  $('formTambah').style.display = 'none';

  let pick = null;
  $('uLama').textContent = dlabel(EDIT.date) + ' • ' + EDIT.start + ' - ' + EDIT.end + ' WIB';
  $('uCode').textContent = 'ID: ' + (EDIT.code || '-');
  $('uStuAv').textContent = initials(EDIT.student);
  $('uStuName').textContent = EDIT.student + ' (' + EDIT.grade + ')';
  $('uSchool').textContent = EDIT.school || '-';
  $('uTutAv').textContent = initials(EDIT.tutor);
  $('uTutName').textContent = EDIT.tutor;
  $('uTutHead').textContent = EDIT.tutor_head || '';
  $('uKonflik').textContent = EDIT.conflict_text || '';

  const wrap = $('uSlots');
  const slots = EDIT.slots || [];
  slots.forEach(s => {
    const c = document.createElement('div');
    c.className = 'p-3 rounded-xl bg-surface-container-lowest hover:bg-surface-container-high border border-outline-variant/60 cursor-pointer transition-all flex flex-col gap-1.5';
    c.innerHTML =
      '<div class="flex items-center justify-between gap-2">' +
        '<span class="text-xs font-bold text-on-surface truncate"></span>' +
        '<span class="px-2 py-0.5 rounded-full bg-primary/10 text-primary text-[10px] font-bold shrink-0"></span>' +
      '</div>' +
      '<div class="text-[11px] text-on-surface-variant truncate"></div>';
    c.children[0].children[0].textContent = s.label;
    c.children[0].children[1].textContent = s.tag;
    c.children[1].textContent = s.sub;
    c.addEventListener('click', () => {
      pick = s;
      [...wrap.children].forEach(x => x.style.outline = '');
      c.style.outline = '2px solid #2563eb';
      $('uBaru').textContent = s.label;
      $('btnSimpan2').disabled = false;
    });
    wrap.appendChild(c);
  });
  if (!slots.length) wrap.innerHTML = '<div class="text-[11px] text-on-surface-variant">Tidak ada slot pengganti tersedia.</div>';

  $('btnTutup2').addEventListener('click', goList);
  $('btnBatal2').addEventListener('click', goList);
  $('btnSimpan2').addEventListener('click', async () => {
    if (!pick) return OPC.toast('Pilih slot pengganti dulu.', false);
    try {
      const j = await OPC.put(API + '/' + EDIT.id, {
        date: pick.date, start_time: pick.start, end_time: pick.end,
        tutor_id: pick.tutor_id, reason: $('uAlasan').value.trim()
      });
      OPC.done(j, LIST);
    } catch (e) {}
  });
})();
</script>
@endpush