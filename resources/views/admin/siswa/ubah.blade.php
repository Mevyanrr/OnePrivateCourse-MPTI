{{-- resources/views/admin/siswa_ubah.blade.php --}}
@extends('portal')
@section('title', 'Ubah Data Siswa - ' . $student->name)

@section('topbar')
    <div class="crumb">
        <span>Operasional Cabang</span><span>›</span><span>Database Siswa</span><span>›</span><b>Ubah Data Siswa</b>
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
    :where(.jb) table { border-collapse: collapse; border-color: inherit; }
    .jb { font-family: 'Plus Jakarta Sans', sans-serif; }
    .material-symbols-outlined{font-variation-settings:'FILL' 0,'wght' 400;}
</style>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>

<div class="jb flex flex-col w-full max-w-[1400px] mx-auto text-on-surface antialiased">
<div class="flex flex-col w-full">

<!-- Top Section / Breadcrumbs & Action Header -->
<div class="flex flex-col gap-3 pb-6 border-b border-outline-variant/30">
<div class="flex flex-wrap items-center justify-between gap-4">
<div class="flex items-center gap-2 font-label-md text-slate-500">
<span>Operasional Cabang</span>
<span class="text-slate-400">/</span>
<span>Database Siswa</span>
<span class="text-slate-400">/</span>
<span class="font-semibold text-primary">Ubah Data Siswa</span>
</div>
<div class="flex items-center gap-3">
<div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200/80 font-label-md">
<span class="relative flex h-2 w-2">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
<span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-600"></span>
</span>
<span>Status Formulir: Mode Pengisian Aktif</span>
</div>
</div>
</div>
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pt-1">
<div>
<h1 class="font-headline-lg text-slate-900 tracking-tight">Ubah Data Siswa</h1>
<p class="font-body-md text-slate-500 mt-1">Perbarui profil siswa, konfigurasi program bimbingan, jadwal rutin sesi belajar, dan skema pembayaran bimbingan belajar.</p>
</div>
<div class="flex items-center gap-2.5 shrink-0">
<button class="px-4 py-2 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 font-label-lg transition-colors shadow-sm inline-flex items-center gap-1.5" type="button">
<span class="material-symbols-outlined text-[18px] text-slate-500">arrow_back</span>
<span>Batal &amp; Kembali</span>
</button>
<button class="px-4 py-2 rounded-xl border border-blue-200 bg-blue-50/70 hover:bg-blue-100/60 text-primary font-label-lg transition-colors inline-flex items-center gap-1.5" type="button">
<span class="material-symbols-outlined text-[18px]">bookmark</span>
<span>Simpan Sebagai Draft</span>
</button>
</div>
</div>
</div>

<div class="gap-8 pb-24 w-full">
<div class="flex flex-col gap-6 w-full mt-6">

<!-- Bagian 1 -->
<section class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex flex-col gap-5">
<div class="flex items-center justify-between pb-3 border-b border-slate-100">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-blue-50 text-primary flex items-center justify-center font-bold text-sm">01</div>
<div>
<h2 class="font-headline-sm text-slate-900 leading-tight">Identitas &amp; Biodata Siswa</h2>
<p class="font-body-sm text-slate-500">Informasi pokok kesiswaan dan latar belakang akademik formal</p>
</div>
</div>
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-label-sm border border-emerald-200/60"><span class="material-symbols-outlined text-[14px]">done</span> Data Lengkap</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div class="flex flex-col gap-1.5 md:col-span-2">
<div class="flex items-center justify-between"><label class="font-label-md text-slate-700">Nama Lengkap Siswa</label><span class="font-label-sm text-rose-500 font-semibold">Wajib Diisi</span></div>
<div class="relative">
<input class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-900 font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all" placeholder="Contoh: Aisyah Putri Rahmawati" type="text" value="">
<span class="material-symbols-outlined absolute right-3.5 top-3 text-[18px] text-emerald-500">check_circle</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-slate-700">Jenjang &amp; Tingkat Kelas</label>
<div class="relative">
<select class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 appearance-none pr-10">
<option selected="" value="smp-8">Kelas 8 • SMP (Sekolah Menengah Pertama)</option>
<option value="sd-4">Kelas 4 • SD</option>
<option value="sd-5">Kelas 5 • SD</option>
<option value="sd-6">Kelas 6 • SD</option>
<option value="smp-7">Kelas 7 • SMP</option>
<option value="smp-9">Kelas 9 • SMP</option>
<option value="sma-10">Kelas 10 • SMA</option>
<option value="sma-11">Kelas 11 • SMA</option>
<option value="sma-12">Kelas 12 • SMA</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-3 text-[20px] text-slate-400 pointer-events-none">expand_more</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-slate-700">Asal Sekolah</label>
<input class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10" placeholder="Nama sekolah asal" type="text" value="">
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-slate-700">Jenis Kelamin</label>
<div class="grid grid-cols-2 gap-2">
<label class="flex items-center justify-center gap-2 p-2.5 rounded-xl border-2 border-primary bg-blue-50/40 text-primary cursor-pointer font-label-md transition-all"><input checked="" class="accent-primary" name="gender" type="radio" value="p"><span>Perempuan</span></label>
<label class="flex items-center justify-center gap-2 p-2.5 rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 cursor-pointer font-label-md transition-all"><input class="accent-primary" name="gender" type="radio" value="l"><span>Laki-laki</span></label>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-slate-700">Tanggal Lahir Siswa</label>
<div class="relative"><input class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10" type="date" value=""></div>
</div>
<div class="flex flex-col gap-1.5 md:col-span-2">
<div class="flex items-center justify-between"><label class="font-label-md text-slate-700">Nomor WhatsApp Siswa (Opsional)</label><span class="font-label-sm text-slate-400">Boleh dikosongkan bila dipusatkan ke wali</span></div>
<input class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10" placeholder="+62 8xx-xxxx-xxxx" type="text">
</div>
</div>
</section>

<!-- Bagian 2 -->
<section class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex flex-col gap-5">
<div class="flex items-center justify-between pb-3 border-b border-slate-100">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-blue-50 text-primary flex items-center justify-center font-bold text-sm">02</div>
<div>
<h2 class="font-headline-sm text-slate-900 leading-tight">Kontak Wali &amp; Alamat Belajar</h2>
<p class="font-body-sm text-slate-500">Penanggung jawab legal, nomor komunikasi resmi, dan alamat home visit</p>
</div>
</div>
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-label-sm border border-emerald-200/60"><span class="material-symbols-outlined text-[14px]">done</span> Data Lengkap</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-slate-700">Hubungan Wali</label>
<div class="flex items-center gap-2">
<button class="px-3 py-2 rounded-xl border-2 border-primary bg-blue-50/50 text-primary font-label-md" type="button">Ibu Kandung</button>
<button class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 font-label-md" type="button">Ayah Kandung</button>
<button class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 font-label-md" type="button">Wali Murid</button>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-slate-700">Nama Lengkap Orang Tua / Wali</label>
<input class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10" type="text" value="">
</div>
<div class="flex flex-col gap-1.5 md:col-span-2">
<label class="font-label-md text-slate-700">Nomor WhatsApp Aktif Wali</label>
<div class="relative">
<input class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 pr-48" type="text" value="">
<div class="absolute right-2 top-2"><span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-label-sm border border-emerald-200/80"><span class="material-symbols-outlined text-[15px] text-emerald-600">verified</span><span>Nomor Terverifikasi WhatsApp</span></span></div>
</div>
</div>
<div class="md:col-span-2 flex flex-col gap-2">
<label class="font-label-md text-slate-700">Metode Pembelajaran Utama</label>
<div class="grid grid-cols-1 md:grid-cols-3 gap-3">
<div class="p-3.5 rounded-xl border-2 border-primary bg-blue-50/30 flex flex-col justify-between cursor-pointer transition-all">
<div class="flex items-center justify-between mb-2"><span class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center"><span class="material-symbols-outlined text-[18px]">home_pin</span></span><span class="material-symbols-outlined text-primary text-[20px]">radio_button_checked</span></div>
<div><h4 class="font-label-lg text-slate-900 font-bold">Home Visit</h4><p class="font-body-sm text-slate-500 mt-0.5">Tutor datang ke lokasi murid untuk tatap muka intensif.</p></div>
</div>
<div class="p-3.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50/70 flex flex-col justify-between cursor-pointer transition-all">
<div class="flex items-center justify-between mb-2"><span class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center"><span class="material-symbols-outlined text-[18px]">videocam</span></span><span class="material-symbols-outlined text-slate-300 text-[20px]">radio_button_unchecked</span></div>
<div><h4 class="font-label-lg text-slate-700 font-bold">Online Private</h4><p class="font-body-sm text-slate-500 mt-0.5">Sesi interaktif via Zoom / Google Meet HD.</p></div>
</div>
<div class="p-3.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50/70 flex flex-col justify-between cursor-pointer transition-all">
<div class="flex items-center justify-between mb-2"><span class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center"><span class="material-symbols-outlined text-[18px]">domain</span></span><span class="material-symbols-outlined text-slate-300 text-[20px]">radio_button_unchecked</span></div>
<div><h4 class="font-label-lg text-slate-700 font-bold">Studio Cabang</h4><p class="font-body-sm text-slate-500 mt-0.5">Belajar di ruang kelas private Cabang Tebet.</p></div>
</div>
</div>
</div>
<div class="flex flex-col gap-1.5 md:col-span-2">
<label class="font-label-md text-slate-700">Alamat Lengkap Sesi Belajar (Khusus Home Visit)</label>
<input class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10" type="text" value="">
</div>
<div class="flex flex-col gap-1.5 md:col-span-2">
<label class="font-label-md text-slate-700">Kelurahan, Kecamatan, &amp; Wilayah Kota</label>
<input class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10" type="text" value="">
</div>
<div class="flex flex-col gap-1.5 md:col-span-2">
<label class="font-label-md text-slate-700">Catatan Petunjuk Lokasi / Patokan Rumah</label>
<input class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10" type="text" value="">
</div>
</div>
</section>

<!-- Bagian 3 -->
<section class="bg-white rounded-2xl p-6 border-2 border-primary/30 shadow-md flex flex-col gap-5 relative">
<div class="absolute -top-3.5 right-6"><span class="px-3 py-1 rounded-full bg-primary text-white font-label-sm shadow-sm flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px]">edit_calendar</span><span>Sedang Dikonfigurasi</span></span></div>
<div class="flex items-center gap-2.5 pb-3 border-b border-slate-100">
<div class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center font-bold text-sm shadow-sm shadow-primary/25">03</div>
<div>
<h2 class="font-headline-sm text-slate-900 leading-tight">Akademik, Tutor &amp; Jadwal Rutin Les</h2>
<p class="font-body-sm text-slate-500">Penentuan mata pelajaran, kurikulum bimbingan, tutor pilihan, serta slot waktu sesi</p>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
<div class="flex flex-col gap-1.5 md:col-span-2">
<label class="font-label-md text-slate-700">Program Pilihan / Mata Pelajaran</label>
<div class="relative">
<input class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 font-body-md font-semibold focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10" type="text" value="">
<button class="absolute right-2.5 top-2.5 text-xs text-primary font-semibold hover:underline" type="button">Ganti Program</button>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-slate-700">Durasi Per Sesi</label>
<div class="flex items-center gap-2"><span class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-label-md flex items-center justify-between"><span>90 Menit</span><span class="material-symbols-outlined text-[18px] text-slate-400">timer</span></span></div>
</div>
<div class="flex flex-col gap-1.5 md:col-span-3">
<label class="font-label-md text-slate-700">Jenis Paket Les</label>
<div class="p-3.5 rounded-xl border border-blue-200 bg-blue-50/40 flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary text-[24px]">verified</span>
<div><p class="font-label-lg text-slate-900 font-bold">Paket Reguler Bulanan (8 Sesi / Bulan)</p><p class="font-body-sm text-slate-500">2 kali pertemuan dalam 1 minggu, garansi bimbingan tuntas dan laporan rutin tutor</p></div>
</div>
<span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 font-label-md font-bold">Rp 1.450.000 / bln</span>
</div>
</div>
</div>

<div class="flex flex-col gap-2 pt-2">
<div class="flex items-center justify-between">
<label class="font-label-md text-slate-700">Tutor Pendamping Terpilih</label>
<button class="text-xs font-semibold text-primary hover:underline flex items-center gap-1" type="button"><span class="material-symbols-outlined text-[15px]">swap_horiz</span> Ganti Tutor Lain</button>
</div>
<div class="p-3.5 rounded-xl border border-slate-200 bg-slate-50/70 flex flex-col md:flex-row md:items-center justify-between gap-3">
<div class="flex items-center gap-3.5">
<div class="w-11 h-11 rounded-xl bg-indigo-600 text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-sm">{{ \App\Support\Fmt::initials($student->tutor->name ?? "-") }}</div>
<div>
<div class="flex items-center gap-2"><h4 class="font-label-lg text-slate-900 font-bold">{{ $student->tutor->name ?? "-" }}</h4><span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[11px] font-bold">Tersedia &amp; Cocok</span></div>
<p class="font-body-sm text-slate-500">{{ $student->tutor->headline ?? "-" }} • Rating {{ $student->tutor->rating ?? "-" }}/5.0</p>
</div>
</div>
<div class="flex items-center gap-2"><span class="text-xs text-slate-500">Area Cakupan: <strong>{{ $student->tutor->area ?? "-" }}</strong></span></div>
</div>
</div>

<div class="flex flex-col gap-2.5 pt-2">
<div class="flex items-center justify-between">
<div>
<label class="font-label-md text-slate-700">Konfigurasi Slot Jadwal Rutin Mingguan ({{ $student->slots->count() }} Sesi/Minggu)</label>
<p class="font-body-sm text-slate-400">Jadwal ini akan otomatis dibuat berulang tiap pekan pada kalender cabang</p>
</div>
</div>
<div class="flex flex-col gap-2">
@foreach($student->slots as $sl)
<div class="p-3.5 rounded-xl border border-slate-200 bg-white flex flex-col md:flex-row md:items-center justify-between gap-3 hover:border-slate-300 transition-colors">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-xs shrink-0">H{{ $loop->iteration }}</div>
<div>
<div class="flex items-center gap-2">
<span class="font-label-lg text-slate-900 font-bold">Setiap Hari {{ $sl->day }}</span>
<span class="font-label-md text-slate-500">• {{ \App\Support\Fmt::hhmm($sl->start_time) }} - {{ \App\Support\Fmt::hhmm($sl->end_time) }} WIB</span>
</div>
<p class="font-body-sm text-slate-400">Metode: {{ \App\Support\Fmt::method($student->method) }} ({{ $student->area }}) • Tutor: {{ $student->tutor->name ?? "-" }}</p>
</div>
</div>
<div class="flex items-center gap-3">
<span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/80 font-label-sm inline-flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">check_circle</span><span>Tidak Ada Bentrok (Aman)</span></span>
<button class="text-slate-400 hover:text-slate-600 p-1" type="button"><span class="material-symbols-outlined text-[18px]">edit</span></button>
</div>
</div>
@endforeach
<button class="w-full py-2.5 border border-dashed border-blue-300 text-primary bg-blue-50/50 hover:bg-blue-50 rounded-xl font-label-md font-semibold transition-all flex items-center justify-center gap-2 mt-1" type="button"><span class="material-symbols-outlined text-[18px]">add_circle</span><span>+ Tambah Hari / Jadwal Tambahan</span></button>
</div>
</div>
</section>

<!-- Bagian 4 -->
<section class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex flex-col gap-5">
<div class="flex items-center gap-2.5 pb-3 border-b border-slate-100">
<div class="w-8 h-8 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center font-bold text-sm">04</div>
<div>
<h2 class="font-headline-sm text-slate-900 leading-tight">Skema Pembayaran &amp; Target Pedagogik Khusus</h2>
<p class="font-body-sm text-slate-500">Mekanisme billing tagihan, target capaian belajar anak, dan profil karakter</p>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div class="md:col-span-2 flex flex-col gap-1.5">
<label class="font-label-md text-slate-700">Skema &amp; Metode Billing Tagihan</label>
<div class="grid grid-cols-1 md:grid-cols-2 gap-3">
<div class="p-3.5 rounded-xl border-2 border-primary bg-blue-50/30 flex items-start justify-between cursor-pointer">
<div><p class="font-label-lg text-slate-900 font-bold">Bulanan Otomatis (Monthly Auto-Invoice)</p><p class="font-body-sm text-slate-500 mt-0.5">Tagihan diterbitkan setiap tanggal 1 via WhatsApp Billing</p><span class="font-label-md text-primary font-bold mt-2 inline-block">Rp 1.450.000 / bln (8 Pertemuan)</span></div>
<span class="material-symbols-outlined text-primary text-[20px]">radio_button_checked</span>
</div>
<div class="p-3.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 flex items-start justify-between cursor-pointer">
<div><p class="font-label-lg text-slate-700 font-bold">Per Sesi (Post-Paid Pay as You Go)</p><p class="font-body-sm text-slate-500 mt-0.5">Dihitung otomatis sesuai sesi hadir tiap akhir pekan</p><span class="font-label-md text-slate-600 font-semibold mt-2 inline-block">Rp 195.000 / sesi</span></div>
<span class="material-symbols-outlined text-slate-300 text-[20px]">radio_button_unchecked</span>
</div>
</div>
</div>
<div class="md:col-span-2 flex flex-col gap-1.5">
<label class="font-label-md text-slate-700">Target Kurikulum Utama Siswa</label>
<input class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 font-medium" type="text" value="">
</div>
<div class="md:col-span-2 flex flex-col gap-1.5">
<label class="font-label-md text-slate-700">Observasi Karakter &amp; Gaya Belajar Siswa (Catatan Pedagogik)</label>
<textarea class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 leading-relaxed" rows="3"></textarea>
</div>
</div>
</section>

</div>
</div>

<!-- Floating Bottom Action Bar -->
<div class="fixed bottom-0 left-64 right-0 z-30 bg-white/95 backdrop-blur-md border-t border-slate-200 px-8 py-3.5 shadow-lg">
<div class="max-w-[1400px] mx-auto flex items-center gap-4 justify-end">
<div class="flex items-center gap-3">
<button class="px-5 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 font-label-lg font-semibold transition-colors" type="button">Kembali</button>
<button class="px-6 py-2.5 rounded-xl bg-primary hover:bg-blue-700 text-white font-label-lg font-semibold transition-all shadow-md shadow-primary/25 flex items-center gap-2" type="button"><span>Simpan &amp; Daftarkan Siswa</span><span class="material-symbols-outlined text-[18px]">check</span></button>
</div>
</div>
</div>

</div>
</div>
@endsection

@push('scripts')
<script>
window.tailwind = window.tailwind || {};
window.__twcfg = tailwind.config={"darkMode":"class","corePlugins":{"preflight":false},"theme":{"extend":{"boxShadow":{"xs":"0 1px 2px 0 rgb(0 0 0 / 0.05)"},"colors":{"on-tertiary-container":"#f1eeff","surface-dim":"#d2d9f4","secondary-fixed-dim":"#6bd8cb","on-primary":"#ffffff","background":"#faf8ff","surface-container-high":"#e2e7ff","tertiary":"#3e3fcc","primary":"#004ac6","on-surface":"#131b2e","inverse-primary":"#b4c5ff","primary-fixed":"#dbe1ff","surface-container-highest":"#dae2fd","surface-container-low":"#f2f3ff","error":"#ba1a1a","on-error-container":"#93000a","on-primary-container":"#eeefff","surface-container-lowest":"#ffffff","surface":"#faf8ff","secondary-fixed":"#89f5e7","outline-variant":"#c3c6d7","surface-tint":"#0053db","surface-container":"#eaedff","primary-container":"#2563eb","on-surface-variant":"#434655","outline":"#737686","surface-bright":"#faf8ff","tertiary-container":"#585be6","on-secondary":"#ffffff","on-tertiary-fixed-variant":"#2f2ebe","inverse-surface":"#283044","secondary-container":"#86f2e4","error-container":"#ffdad6","on-secondary-fixed-variant":"#005049","surface-variant":"#dae2fd","on-secondary-container":"#006f66","on-primary-fixed":"#00174b","tertiary-fixed":"#e1e0ff","secondary":"#006a61","inverse-on-surface":"#eef0ff","on-background":"#131b2e","tertiary-fixed-dim":"#c0c1ff","primary-fixed-dim":"#b4c5ff","on-tertiary":"#ffffff","on-tertiary-fixed":"#07006c","on-secondary-fixed":"#00201d","on-error":"#ffffff","on-primary-fixed-variant":"#003ea8"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","2xl":"1rem","full":"9999px"},"spacing":{"space-sm":"0.5rem","gutter-mobile":"1rem","space-lg":"1.5rem","space-md":"1rem","margin-mobile":"1rem","space-xl":"2rem","space-xs":"0.25rem","gutter":"1.5rem","margin":"2rem"},"fontFamily":{"sans":["Plus Jakarta Sans","sans-serif"],"label-md":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"label-lg":["Plus Jakarta Sans"],"body-md":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"display-lg-mobile":["Plus Jakarta Sans"],"headline-xl":["Plus Jakarta Sans"],"label-sm":["Plus Jakarta Sans"],"body-sm":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"]},"fontSize":{"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.02em","fontWeight":"600"}],"body-lg":["16px",{"lineHeight":"24px","fontWeight":"400"}],"display-lg":["40px",{"lineHeight":"48px","letterSpacing":"-0.02em","fontWeight":"700"}],"label-lg":["14px",{"lineHeight":"20px","letterSpacing":"0.01em","fontWeight":"600"}],"body-md":["14px",{"lineHeight":"20px","fontWeight":"400"}],"headline-md":["20px",{"lineHeight":"28px","fontWeight":"600"}],"headline-xl-mobile":["24px",{"lineHeight":"32px","letterSpacing":"-0.015em","fontWeight":"700"}],"headline-lg":["24px",{"lineHeight":"32px","letterSpacing":"-0.01em","fontWeight":"600"}],"display-lg-mobile":["30px",{"lineHeight":"38px","letterSpacing":"-0.02em","fontWeight":"700"}],"headline-xl":["32px",{"lineHeight":"40px","letterSpacing":"-0.015em","fontWeight":"700"}],"label-sm":["11px",{"lineHeight":"14px","letterSpacing":"0.03em","fontWeight":"600"}],"body-sm":["13px",{"lineHeight":"18px","fontWeight":"400"}],"headline-sm":["18px",{"lineHeight":"26px","fontWeight":"600"}]}}}};
</script>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>tailwind.config = window.__twcfg;</script>
<script src="{{ asset('js/opc.js') }}"></script>
<script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});
const S = {!! json_encode($payload) !!};
const TUTORS = {!! json_encode($tutorList) !!};
const LIST = {!! json_encode(route('admin.siswa')) !!};
// semua query form dibatasi ke .jb supaya input di topbar/portal nggak ikut ke-hitung
const ROOT = document.querySelector('.jb');
const inputs = [...ROOT.querySelectorAll('input[type=text]')];
const [iName, iSchool, iPhone, iGName, iGWa, iAddr, iArea, iNote, iProgram, iGoal] = inputs;
const phoneStudent = iPhone;
const gradeSel = ROOT.querySelector('select'); const dob = ROOT.querySelector('input[type=date]');
const notes = ROOT.querySelector('textarea');
// ---- hydrate
iName.value = S.name; iSchool.value = S.school; iGName.value = S.guardian_name || ''; iGWa.value = S.guardian_phone || '';
iAddr.value = S.address || ''; iArea.value = S.area || ''; iNote.value = S.address_note || ''; iProgram.value = S.program || ''; iGoal.value = S.goal || '';
if (phoneStudent) phoneStudent.value = S.phone || '';
notes.value = S.goals || ''; if (S.birth_date) dob.value = S.birth_date;
const nz = x => String(x).toLowerCase().replace(/[^a-z0-9]/g, '');
[...gradeSel.options].forEach(o => { if (nz(o.textContent).startsWith(nz(S.grade))) gradeSel.value = o.value || o.textContent; });
if (![...gradeSel.options].some(o => nz(o.textContent).startsWith(nz(S.grade)))) { const o = document.createElement('option'); o.textContent = S.grade; gradeSel.prepend(o); gradeSel.selectedIndex = 0; }
document.querySelectorAll('input[name=gender]').forEach(r => { r.checked = (S.gender === 'Laki-laki') ? r.value === 'l' : r.value === 'p'; });
// ---- pilihan
let rel = S.guardian_relation || 'Ibu Kandung';
const relBtns = ['Ibu Kandung', 'Ayah Kandung', 'Wali Murid'].map(t => OPC.find(t, {sel: 'button'})[0]);
const relApply = OPC.choice(relBtns, 0, k => { rel = ['Ibu Kandung', 'Ayah Kandung', 'Wali Murid'][k]; });
relApply(Math.max(0, ['Ibu Kandung', 'Ayah Kandung', 'Wali Murid'].indexOf(rel)));
let method = S.method;
const mCards = ['Home Visit', 'Online Private', 'Studio Cabang'].map(t => OPC.leaf(t).closest('div[class*=border]'));
const mKeys = ['home_visit', 'online', 'studio'];
OPC.choice(mCards, 0, k => { method = mKeys[k]; })(Math.max(0, mKeys.indexOf(method)));
let billing = S.billing_scheme;
const bCards = ['Bulanan Otomatis (Monthly Auto-Invoice)', 'Per Sesi (Post-Paid Pay as You Go)'].map(t => OPC.leaf(t).closest('div[class*=border]'));
OPC.choice(bCards, 0, k => { billing = ['monthly', 'per_session'][k]; })(billing === 'per_session' ? 1 : 0);
// ---- tutor
let tutorId = S.tutor_id;
OPC.find('Ganti Tutor Lain', {sel: 'button', exact: false}).forEach(b => b.addEventListener('click', () => {
  OPC.dialog({title: 'Ganti Tutor', fields: [{name: 'tutor', label: 'Tutor pendamping', type: 'select', value: tutorId, options: TUTORS.map(t => ({v: t.id, t: t.name + ' — ' + t.headline}))}], submit: 'Pilih',
    onSubmit: async v => { const t = TUTORS.find(x => String(x.id) === String(v.tutor)); tutorId = t.id;
      const card = b.parentElement.nextElementSibling;
      const h4 = card.querySelector('h4'); if (h4) h4.textContent = t.name;
      const ini = [...card.querySelectorAll('div')].find(d => d.children.length === 0 && /^[A-Z]{1,3}$/.test(d.textContent.trim())); if (ini) ini.textContent = t.initials;
      const pp = card.querySelector('p'); if (pp) pp.textContent = t.headline + ' • Rating ' + t.rating + '/5.0';
      const st = card.querySelector('strong'); if (st) st.textContent = t.area; }});
}));
OPC.find('Ganti Program', {sel: 'button'}).forEach(b => b.addEventListener('click', () => {
  OPC.dialog({title: 'Ganti Program', fields: [{name: 'program', label: 'Program / mata pelajaran', value: iProgram.value}], submit: 'Terapkan', onSubmit: async v => { iProgram.value = v.program; }});
}));
// ---- slot
function slotRows() { return [...ROOT.querySelectorAll('button')].filter(b => b.textContent.trim() === 'edit').map(b => b.parentElement.parentElement); }
function readSlot(r) { const sp = [...r.querySelectorAll('span')].map(s => s.textContent.trim()); const day = (sp.find(x => x.startsWith('Setiap Hari ')) || '').replace('Setiap Hari ', ''); const tm = ((sp.find(x => x.startsWith('•') && /\d\d:\d\d/.test(x)) || '').replace('•', '').replace('WIB', '').trim()).split('-').map(x => x.trim()); return {day: day, start: tm[0], end: tm[1]}; }
function setSlot(r, v) { const sp = [...r.querySelectorAll('span')]; const d = sp.find(x => x.textContent.trim().startsWith('Setiap Hari ')); if (d) d.textContent = 'Setiap Hari ' + v.day; const t = sp.find(x => x.textContent.trim().startsWith('•') && /\d\d:\d\d/.test(x.textContent)); if (t) t.textContent = '• ' + v.start + ' - ' + v.end + ' WIB'; }
function bindEdit() { ROOT.querySelectorAll('button').forEach(b => { if (b._e || b.textContent.trim() !== 'edit') return; b._e = 1; b.addEventListener('click', () => { const r = b.parentElement.parentElement; const cur = readSlot(r);
  OPC.dialog({title: 'Ubah Slot Jadwal', fields: [{name: 'day', label: 'Hari', type: 'select', value: cur.day, options: ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'].map(d => ({v: d, t: d}))}, {name: 'start', label: 'Jam mulai', type: 'time', value: cur.start}, {name: 'end', label: 'Jam selesai', type: 'time', value: cur.end}], submit: 'Simpan', onSubmit: async v => setSlot(r, v)}); }); }); }
bindEdit();
const slotTpl = slotRows()[0] ? slotRows()[0].cloneNode(true) : null;
OPC.find('Tambah Hari / Jadwal Tambahan', {sel: 'button', exact: false}).forEach(b => b.addEventListener('click', () => {
  OPC.dialog({title: 'Tambah Hari / Jadwal', fields: [{name: 'day', label: 'Hari', type: 'select', options: ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'].map(d => ({v: d, t: d}))}, {name: 'start', label: 'Jam mulai', type: 'time', value: '16:00'}, {name: 'end', label: 'Jam selesai', type: 'time', value: '17:30'}], submit: 'Tambah',
    onSubmit: async v => { if (!slotTpl) return; const rows = slotRows(); const r = slotTpl.cloneNode(true); setSlot(r, v); rows[rows.length - 1].after(r); r.querySelectorAll('button').forEach(x => x._e = 0); const h = [...r.querySelectorAll('div')].find(d => /^H\d+$/.test(d.textContent.trim()) && d.children.length === 0); if (h) h.textContent = 'H' + (rows.length + 1); bindEdit(); }});
}));
// ---- simpan
async function save(status) {
  const body = {name: iName.value.trim(), grade: gradeSel.selectedOptions[0].textContent.split('(')[0].replace(/\s*[•-]\s*/g, ' ').replace(/\s+/g, ' ').trim(), school: iSchool.value.trim(),
    gender: (document.querySelector('input[name=gender]:checked') || {}).value === 'l' ? 'Laki-laki' : 'Perempuan', birth_date: dob.value || null, phone: phoneStudent ? phoneStudent.value : null,
    guardian_relation: rel, guardian_name: iGName.value.trim(), guardian_phone: iGWa.value.trim(), method: method, address: iAddr.value.trim(), area: iArea.value.trim(), address_note: iNote.value.trim(),
    program: iProgram.value.trim(), tutor_id: tutorId, billing_scheme: billing, goals: notes.value.trim(), goal: iGoal.value.trim(), status: status, slots: slotRows().map(readSlot)};
  const j = await OPC.put({!! json_encode(route('admin.siswa.perbarui', $student)) !!}, body);
  OPC.done(j, {!! json_encode(route('admin.siswa.show', $student)) !!});
}
OPC.on('Simpan & Daftarkan Siswa', () => save('aktif').catch(() => {}), {sel: 'button', exact: false});
OPC.on('Simpan Sebagai Draft', () => save('nonaktif').catch(() => {}), {sel: 'button', exact: false});
OPC.on('Batal & Kembali', () => OPC.go(LIST), {sel: 'button', exact: false});
OPC.on('Kembali', () => OPC.go(LIST), {sel: 'button'});
</script>
@endpush