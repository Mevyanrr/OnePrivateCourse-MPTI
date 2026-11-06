{{-- resources/views/admin/akun.blade.php --}}
@extends('portal')
@section('title', 'Akun & Hak Akses')

@section('topbar')
    <div class="crumb">
        <span>Operasional Cabang</span><span>›</span><b>Akun &amp; Hak Akses</b>
    </div>
@endsection

@section('topbar-right')
    @php $namaAdmin = auth()->user()->name; @endphp
    <div class="userbox">
        <div class="who"><b>{{ $namaAdmin }}</b><small>{{ auth()->user()->email }}</small></div>
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

<!-- KPI 4-Card Summary Grid -->
<div class="grid grid-cols-4 gap-4 mb-6">
<div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm relative flex flex-col justify-between">
<div class="flex items-center justify-between mb-2"><span class="text-xs font-medium text-slate-500">Total Akun</span><div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center"><span class="material-symbols-outlined text-[18px]">group</span></div></div>
<div class="flex items-baseline gap-1.5 mb-2"><span class="text-2xl font-bold text-slate-900 leading-none">{{ $k['total'] }}</span><span class="text-xs text-slate-400 font-medium">Akun</span></div>
<div class="text-xs text-emerald-600 font-medium flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">check</span><span>{{ $k['aktifPct'] }}% Kredensial aktif</span></div>
</div>
<div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm relative flex flex-col justify-between">
<div class="flex items-center justify-between mb-2"><span class="text-xs font-medium text-slate-500">Akun Aktif</span><div class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center"><span class="material-symbols-outlined text-[18px]">verified_user</span></div></div>
<div class="flex items-baseline gap-1.5 mb-2"><span class="text-2xl font-bold text-slate-900 leading-none">{{ $k['aktif'] }}</span><span class="text-xs text-slate-400 font-medium">Akun</span></div>
<div class="text-xs text-slate-500 font-medium"><span>{{ $k['aktifPct'] }}% Siap Operasional</span></div>
</div>
<div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm relative flex flex-col justify-between">
<div class="flex items-center justify-between mb-2"><span class="text-xs font-medium text-slate-500">Perlu Verifikasi</span><div class="w-8 h-8 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center"><span class="material-symbols-outlined text-[18px]">lock_reset</span></div></div>
<div class="flex items-baseline gap-1.5 mb-2"><span class="text-2xl font-bold text-blue-600 leading-none">{{ $k['perlu'] }}</span><span class="text-xs text-slate-400 font-medium">Akun</span></div>
<div class="text-xs text-blue-600 font-medium flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span><span>{{ $k['perlu'] }} Menunggu Reset/OTP</span></div>
</div>
<div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm relative flex flex-col justify-between">
<div class="flex items-center justify-between mb-2"><span class="text-xs font-medium text-slate-500">Dinonaktifkan</span><div class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center"><span class="material-symbols-outlined text-[18px]">archive</span></div></div>
<div class="flex items-baseline gap-1.5 mb-2"><span class="text-2xl font-bold text-slate-800 leading-none">{{ $k['nonaktif'] }}</span><span class="text-xs text-slate-400 font-medium">Akun</span></div>
<div class="text-xs text-amber-600 font-medium"><span>Arsip siswa lulus bimbingan</span></div>
</div>
</div>

<!-- Filter & Search Toolbar -->
<div class="bg-white rounded-2xl border border-slate-200/80 p-3.5 shadow-sm mb-6 flex flex-col gap-3">
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
<button class="flex items-center gap-1 px-2.5 py-1 bg-white rounded-md text-blue-600 font-semibold shadow-xs" type="button"><span class="material-symbols-outlined text-[15px]">table_rows</span><span>Tabel</span></button>
<button class="flex items-center gap-1 px-2.5 py-1 text-slate-500 hover:text-slate-800 font-medium transition-colors" type="button"><span class="material-symbols-outlined text-[15px]">grid_view</span><span>Kartu</span></button>
</div>
</div>
</div>
<div class="flex items-center gap-2.5">
<div class="relative flex-1">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">search</span>
<input class="w-full pl-9 pr-3 py-2 bg-white border border-slate-200 rounded-xl text-xs text-slate-700 placeholder:text-slate-400 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Cari nama pengguna, email, no. whatsapp..." type="text"/>
</div>
<div class="relative">
<select class="appearance-none bg-white border border-slate-200 rounded-xl px-3 py-2 pr-7 text-xs text-slate-700 focus:outline-none focus:border-blue-500 cursor-pointer">
<option>Semua Peran</option><option>Super Admin</option><option>Admin Keuangan</option><option>Tutor Pengajar</option><option>Wali Murid</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 text-[16px] pointer-events-none">expand_more</span>
</div>
<div class="relative">
<select class="appearance-none bg-white border border-slate-200 rounded-xl px-3 py-2 pr-7 text-xs text-slate-700 focus:outline-none focus:border-blue-500 cursor-pointer">
<option>Semua Status</option><option>Aktif</option><option>Nonaktif</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 text-[16px] pointer-events-none">expand_more</span>
</div>
<div class="relative">
<select class="appearance-none bg-white border border-slate-200 rounded-xl px-3 py-2 pr-7 text-xs text-slate-700 focus:outline-none focus:border-blue-500 cursor-pointer">
<option>Cabang Tebet</option><option>Cabang Kemang</option><option>Cabang Bintaro</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 text-[16px] pointer-events-none">expand_more</span>
</div>
<button class="w-9 h-9 border border-slate-200 rounded-xl text-slate-500 hover:text-slate-700 hover:bg-slate-50 flex items-center justify-center transition-colors shrink-0" title="Filter Tambahan" type="button"><span class="material-symbols-outlined text-[18px]">tune</span></button>
</div>
</div>

<!-- DATA TABLE -->
<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden mb-6">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-slate-50/70 border-b border-slate-100 text-[11px] font-semibold uppercase tracking-wider text-slate-500">
<th class="py-3.5 px-4">PENGGUNA &amp; ID</th><th class="py-3.5 px-4">KONTAK &amp; WHATSAPP</th><th class="py-3.5 px-4">PERAN SISTEM</th><th class="py-3.5 px-4">KELAS / SISWA TERKAIT</th><th class="py-3.5 px-4">STATUS</th><th class="py-3.5 px-4 text-right">AKSI</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 text-xs">
@forelse($users as $u)
<tr data-id="{{ $u->id }}" data-role="{{ $u->role }}" data-status="{{ $u->status }}" data-branch="{{ $u->branch }}" class="hover:bg-slate-50/50 transition-colors">
<td class="py-3.5 px-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 font-bold text-xs flex items-center justify-center shrink-0">{{ \App\Support\Fmt::initials($u->name) }}</div>
<div class="flex flex-col"><span class="font-bold text-slate-800 text-xs">{{ $u->name }}</span><span class="text-[11px] text-slate-400">{{ $u->code ?: "USR-" . $u->id }}</span></div>
</div>
</td>
<td class="py-3.5 px-4 whitespace-nowrap">
<div class="flex flex-col">
<span class="text-slate-700 font-medium text-xs">{{ $u->email ?: "-" }}</span>
<span class="text-[11px] text-emerald-600 font-medium flex items-center gap-1 mt-0.5"><span class="material-symbols-outlined text-[12px]">chat</span> {{ $u->phone ?: "-" }}</span>
</div>
</td>

@if($u->role === 'wali')
<td class="py-3.5 px-4 whitespace-nowrap"><span class="px-2.5 py-1 rounded-lg bg-teal-50 text-teal-700 border border-teal-200/50 font-medium text-[11px] inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span> Wali Murid</span></td>
@elseif($u->role === 'tutor')
<td class="py-3.5 px-4 whitespace-nowrap"><span class="px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-200/50 font-medium text-[11px] inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span> Tutor Pengajar</span></td>
@elseif(str_contains((string) $u->role_label, 'Super'))
<td class="py-3.5 px-4 whitespace-nowrap"><span class="px-2.5 py-1 rounded-lg bg-blue-600 text-white font-semibold text-[11px] inline-flex items-center gap-1 shadow-xs"><span class="material-symbols-outlined text-[13px]">shield</span> {{ $u->role_label }}</span></td>
@else
<td class="py-3.5 px-4 whitespace-nowrap"><span class="px-2.5 py-1 rounded-lg bg-indigo-50 text-indigo-700 border border-indigo-200/50 font-medium text-[11px] inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span> {{ $u->role_label ?: "Admin" }}</span></td>
@endif

@if($u->role === 'wali')
<td class="py-3.5 px-4 whitespace-nowrap"><span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-200/50 text-[11px] font-medium"><span class="material-symbols-outlined text-[13px]">school</span> {{ $u->children->isEmpty() ? 'Belum tertaut' : $u->children->pluck('name')->implode(', ') }}</span></td>
@elseif($u->role === 'tutor')
<td class="py-3.5 px-4 whitespace-nowrap"><span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 border border-sky-200/50 text-[11px] font-medium"><span class="material-symbols-outlined text-[13px]">groups</span> {{ $u->tutor ? $u->tutor->students()->where("status", "aktif")->count() : 0 }} Siswa Aktif</span></td>
@else
<td class="py-3.5 px-4 whitespace-nowrap"><span class="text-slate-600 text-xs">{{ str_contains((string) $u->role_label, "Super") ? "Akses Penuh Seluruh Sistem" : "Operasional Cabang " . $u->branch }}</span></td>
@endif

@if($u->status === 'aktif')
<td class="py-3.5 px-4 whitespace-nowrap"><span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/50 text-[11px] font-medium"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif</span></td>
@else
<td class="py-3.5 px-4 whitespace-nowrap"><span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-600 border border-slate-200 text-[11px] font-medium"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif</span></td>
@endif

@if($u->id === auth()->id())
<td class="py-3.5 px-4 whitespace-nowrap text-right"><span class="text-[11px] text-blue-600 font-semibold px-2 py-1 bg-blue-50 rounded-lg">Kredensial Utama</span></td>
@elseif($u->status === 'aktif')
<td class="py-3.5 px-4 whitespace-nowrap text-right">
<div class="inline-flex items-center gap-1.5">
@if($u->role === 'wali')
<button class="px-2.5 py-1 rounded-lg border border-blue-200 bg-blue-50 hover:bg-blue-100 text-blue-700 text-[11px] font-semibold transition-colors" type="button" data-link="{{ $u->id }}" data-name="{{ $u->name }}">Tautkan Siswa</button>
@endif
<button class="px-2.5 py-1 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 text-[11px] font-semibold transition-colors" type="button" data-reset="{{ $u->id }}">Reset Sandi</button>
<button class="p-1 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors" type="button" data-more="{{ $u->id }}"><span class="material-symbols-outlined text-[18px]">more_vert</span></button>
</div>
</td>
@else
<td class="py-3.5 px-4 whitespace-nowrap text-right">
<div class="inline-flex items-center gap-1.5">
<button class="px-2.5 py-1 rounded-lg border border-emerald-200 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 text-[11px] font-semibold transition-colors" type="button" data-toggle="{{ $u->id }}">Aktifkan</button>
<button class="p-1 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors" type="button" data-more="{{ $u->id }}"><span class="material-symbols-outlined text-[18px]">more_vert</span></button>
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
<div class="p-4 bg-white border-t border-slate-100 flex items-center justify-between">
<span class="text-xs text-slate-500">Menampilkan <strong class="font-semibold text-slate-700">{{ $users->firstItem() ?? 0 }} – {{ $users->lastItem() ?? 0 }}</strong> dari <strong class="font-semibold text-slate-700">{{ $users->total() }}</strong> akun pengguna</span>
<div class="flex items-center gap-1.5">
<button {{ $users->onFirstPage() ? "disabled" : "" }} data-go="{{ $users->previousPageUrl() }}" class="px-3 py-1 text-xs border border-slate-200 rounded-lg text-slate-600 hover:bg-slate-50 transition-colors disabled:opacity-40" type="button">Sebelumnya</button>
@foreach(range(1, max(1, $users->lastPage())) as $pg)
@if($pg === $users->currentPage())
<button class="px-3 py-1 text-xs bg-blue-600 text-white font-semibold rounded-lg shadow-xs" type="button">{{ $pg }}</button>
@else
<button data-go="{{ $users->url($pg) }}" class="px-3 py-1 text-xs border border-slate-200 rounded-lg text-slate-600 hover:bg-slate-50 transition-colors" type="button">{{ $pg }}</button>
@endif
@endforeach
<button {{ $users->hasMorePages() ? "" : "disabled" }} data-go="{{ $users->nextPageUrl() }}" class="px-3 py-1 text-xs border border-slate-200 rounded-lg text-slate-600 hover:bg-slate-50 transition-colors" type="button">Selanjutnya</button>
</div>
</div>
</div>

<footer class="text-center text-xs text-slate-400 py-6">© 2026 One Private Course. Sistem Manajemen Bimbel &amp; Les Privat.</footer>
</div>
</div>
@endsection

@push('scripts')
<script>
window.tailwind = window.tailwind || {};
window.__twcfg = tailwind.config={"darkMode":"class","corePlugins":{"preflight":false},"theme":{"extend":{"boxShadow":{"xs":"0 1px 2px 0 rgb(0 0 0 / 0.05)"},"colors":{"on-tertiary-container":"#f1eeff","surface-dim":"#d2d9f4","secondary-fixed-dim":"#6bd8cb","on-primary":"#ffffff","background":"#faf8ff","surface-container-high":"#e2e7ff","tertiary":"#3e3fcc","primary":"#004ac6","on-surface":"#131b2e","inverse-primary":"#b4c5ff","primary-fixed":"#dbe1ff","surface-container-highest":"#dae2fd","surface-container-low":"#f2f3ff","error":"#ba1a1a","on-error-container":"#93000a","on-primary-container":"#eeefff","surface-container-lowest":"#ffffff","surface":"#faf8ff","secondary-fixed":"#89f5e7","outline-variant":"#c3c6d7","surface-tint":"#0053db","surface-container":"#eaedff","primary-container":"#2563eb","on-surface-variant":"#434655","outline":"#737686","surface-bright":"#faf8ff","tertiary-container":"#585be6","on-secondary":"#ffffff","on-tertiary-fixed-variant":"#2f2ebe","inverse-surface":"#283044","secondary-container":"#86f2e4","error-container":"#ffdad6","on-secondary-fixed-variant":"#005049","surface-variant":"#dae2fd","on-secondary-container":"#006f66","on-primary-fixed":"#00174b","tertiary-fixed":"#e1e0ff","secondary":"#006a61","inverse-on-surface":"#eef0ff","on-background":"#131b2e","tertiary-fixed-dim":"#c0c1ff","primary-fixed-dim":"#b4c5ff","on-tertiary":"#ffffff","on-tertiary-fixed":"#07006c","on-secondary-fixed":"#00201d","on-error":"#ffffff","on-primary-fixed-variant":"#003ea8"},"borderRadius":{"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","2xl":"1rem","full":"9999px"},"spacing":{"space-sm":"0.5rem","gutter-mobile":"1rem","space-lg":"1.5rem","space-md":"1rem","margin-mobile":"1rem","space-xl":"2rem","space-xs":"0.25rem","gutter":"1.5rem","margin":"2rem"},"fontFamily":{"sans":["Plus Jakarta Sans","sans-serif"],"label-md":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"label-lg":["Plus Jakarta Sans"],"body-md":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"display-lg-mobile":["Plus Jakarta Sans"],"headline-xl":["Plus Jakarta Sans"],"label-sm":["Plus Jakarta Sans"],"body-sm":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"]}}}};
</script>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>tailwind.config = window.__twcfg;</script>
<script src="{{ asset('js/opc.js') }}"></script>
<script>
OPC.userLogout({!! json_encode(auth()->user()->name) !!});
const API = {!! json_encode(url('/admin/akun')) !!}; const Q = new URLSearchParams(location.search);
const ROOT = document.querySelector('.jb');
const ROLES = [{v: 'admin', t: 'Admin'}, {v: 'wali', t: 'Wali Murid'}];
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
function esc(s) { return String(s ?? '').replace(/[&<>"']/g, c => ({'&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'}[c])); }
async function linkDialog(id, name) {
  let d; try { d = await OPC.req(API + '/' + id + '/siswa', undefined, 'GET'); } catch (x) { return; }
  const items = [...d.linked.map(s => ({...s, on: true})), ...d.available.map(s => ({...s, on: false}))];
  const ov = document.createElement('div');
  ov.className = 'fixed inset-0 z-[100] bg-slate-900/40 flex items-center justify-center p-4';
  ov.innerHTML = '<div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-5">'
    + '<h3 class="text-sm font-bold text-slate-900">Tautkan Siswa</h3>'
    + '<p class="text-xs text-slate-500 mt-1 mb-3">Wali: <strong>' + esc(name) + '</strong>. Centang siswa yang menjadi anak wali ini.</p>'
    + '<div class="max-h-72 overflow-y-auto border border-slate-200 rounded-xl divide-y divide-slate-100">'
    + (items.length ? items.map(s => '<label class="flex items-start gap-2.5 p-2.5 text-xs cursor-pointer hover:bg-slate-50">'
        + '<input type="checkbox" class="mt-0.5 rounded border-slate-300" value="' + s.id + '"' + (s.on ? ' checked' : '') + '>'
        + '<span><strong class="text-slate-800">' + esc(s.name) + '</strong> <span class="text-slate-400">' + esc(s.code) + ' · ' + esc(s.grade) + '</span>'
        + (s.guardian_name || s.guardian_phone ? '<br><span class="text-slate-400">Ortu: ' + esc(s.guardian_name || '-') + ' · ' + esc(s.guardian_phone || '-') + '</span>' : '')
        + '</span></label>').join('') : '<p class="p-4 text-xs text-slate-400 text-center">Tidak ada siswa yang tersedia.</p>')
    + '</div><div class="flex justify-end gap-2 mt-4">'
    + '<button type="button" data-x class="px-3 py-2 text-xs border border-slate-200 rounded-xl text-slate-600 hover:bg-slate-50">Batal</button>'
    + '<button type="button" data-ok class="px-3 py-2 text-xs bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl">Simpan</button></div></div>';
  document.body.appendChild(ov);
  ov.querySelector('[data-x]').onclick = () => ov.remove();
  ov.addEventListener('click', e => { if (e.target === ov) ov.remove(); });
  ov.querySelector('[data-ok]').onclick = async () => {
    const ids = [...ov.querySelectorAll('input:checked')].map(i => +i.value);
    try { const j = await OPC.post(API + '/' + id + '/siswa', {student_ids: ids}); ov.remove(); OPC.done(j, 'reload'); } catch (x) {}
  };
}
document.addEventListener('click', e => { const b = e.target.closest('[data-link]'); if (b) linkDialog(b.dataset.link, b.dataset.name); });
function nav(k, v) { const u = new URL(location.href); u.searchParams.delete('page'); v ? u.searchParams.set(k, v) : u.searchParams.delete(k); location.href = u.toString(); }
const tabs = ['Semua Akun', 'Admin', 'Tutor', 'Wali Murid', 'Nonaktif'].map(t => OPC.find(t, {sel: 'button'})[0]); const keys = ['all', 'admin', 'tutor', 'wali', 'nonaktif']; const cur = keys.indexOf({!! json_encode($tab) !!});
let ready = false; const ap = OPC.choice(tabs, 0, k => { if (ready) nav('tab', keys[k]); }); if (cur > 0) ap(cur); ready = true;
const sels = [...ROOT.querySelectorAll('select')]; const [sR, sS, sB] = sels;
const rmap = {'Super Admin': 'super', 'Admin Keuangan': 'keuangan', 'Tutor Pengajar': 'tutor', 'Wali Murid': 'wali'}; [...sR.options].forEach(o => { o.value = rmap[o.textContent] || ''; }); sR.value = Q.get('peran') || '';
[...sS.options].forEach(o => { o.value = o.textContent === 'Aktif' ? 'aktif' : o.textContent === 'Nonaktif' ? 'nonaktif' : ''; }); sS.value = Q.get('status') || '';
[...sB.options].forEach(o => { o.value = o.textContent.replace('Cabang ', ''); }); sB.value = Q.get('cabang') || sB.value;
sR.addEventListener('change', () => nav('peran', sR.value)); sS.addEventListener('change', () => nav('status', sS.value)); sB.addEventListener('change', () => nav('cabang', sB.value));
const qi = ROOT.querySelector('input[placeholder^="Cari nama pengguna"]'); qi.value = Q.get('q') || ''; qi.addEventListener('keydown', e => { if (e.key === 'Enter') { e.preventDefault(); nav('q', qi.value); } });
const rows = [...ROOT.querySelectorAll('tbody tr[data-id]')]; qi.addEventListener('input', () => { const v = qi.value.toLowerCase(); rows.forEach(r => r.style.display = r.textContent.toLowerCase().includes(v) ? '' : 'none'); });
ROOT.querySelectorAll('button[title="Filter Tambahan"]').forEach(b => b.addEventListener('click', () => { location.href = location.pathname; }));
OPC.on('Kartu', () => OPC.toast('Mode kartu menyusul — saat ini mode Tabel.', true), {sel: 'button'});
</script>
@endpush