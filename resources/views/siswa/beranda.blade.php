<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Beranda - One Private Course</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..24,400..600,0..1,-25..0&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com?plugins=forms"></script>
<style>
  body { font-family: 'Plus Jakarta Sans', sans-serif; overscroll-behavior: none; }
  ::-webkit-scrollbar { display: none; }
</style>
</head>
<body class="bg-[#f8faff] text-slate-800 antialiased min-h-screen flex">

@include('siswa._sidebar', ['active' => 'beranda'])

<div class="pl-64 flex-1 min-w-0">
  <header class="h-14 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 sticky top-0 z-40">
    <div class="flex items-center gap-2 text-xs text-slate-500">
      <span class="material-symbols-outlined text-blue-600 text-[18px]">school</span>
      Profil aktif:
      <strong class="text-blue-700">{{ $child->name }}</strong>
      <span>({{ $child->grade }})</span>
    </div>
    <div class="flex items-center gap-3">
      @if($children->count() > 1)
        <div class="flex gap-1.5">
          @foreach($children as $c)
            <a href="{{ route('portal.beranda', ['anak' => $c->id]) }}"
               class="px-3 py-1 rounded-lg text-xs font-semibold border {{ $c->id === $child->id ? 'bg-blue-600 text-white border-blue-600' : 'border-slate-200 text-slate-600 hover:bg-slate-50' }}">{{ $c->name }}</a>
          @endforeach
        </div>
      @endif
      <div class="text-right">
        <div class="text-xs font-semibold text-slate-800 leading-tight">{{ $greet }}</div>
        <div class="text-[11px] text-slate-400">Wali Murid</div>
      </div>
    </div>
  </header>

  <main class="p-8 max-w-[1200px] mx-auto">
    <div class="mb-6">
      <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Selamat datang, {{ $greet }}</h1>
      <p class="text-xs text-slate-500 mt-1">Pantau perkembangan belajar, kehadiran, dan jadwal les {{ $child->name }}.</p>
    </div>

    {{-- Profil siswa --}}
    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm mb-6 flex items-center gap-4">
      <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-xl">{{ mb_strtoupper(mb_substr($child->name, 0, 1)) }}</div>
      <div class="flex-1">
        <div class="text-base font-bold text-slate-900">{{ $child->name }}</div>
        <div class="text-xs text-slate-500">
          {{ $child->grade }}@if($child->program) · {{ $child->program }}@endif
          @if($child->school) · {{ $child->school }}@endif
        </div>
      </div>
      @if($child->tutor)
        <div class="text-right">
          <div class="text-[11px] text-slate-400">Tutor</div>
          <div class="text-xs font-semibold text-slate-800">{{ $child->tutor->name }}</div>
        </div>
      @endif
    </div>

    {{-- Perlu konfirmasi --}}
    @if($next)
      <div class="bg-amber-50 border border-amber-200 rounded-2xl p-4 mb-6 flex items-center justify-between gap-4" id="pending-box">
        <div class="flex items-start gap-3">
          <span class="material-symbols-outlined text-amber-600">pending_actions</span>
          <div>
            <div class="text-sm font-bold text-amber-800">{{ $pendingCount }} jadwal sesi menunggu konfirmasi Anda</div>
            <div class="text-xs text-amber-700 mt-0.5">
              {{ \App\Support\Fmt::dateShort($next->date) }}, {{ \App\Support\Fmt::hhmm($next->start_time) }} – {{ \App\Support\Fmt::hhmm($next->end_time) }}
              @if($next->tutor) · bersama {{ $next->tutor->name }}@endif
            </div>
          </div>
        </div>
        <div class="flex gap-2 shrink-0">
          <a href="{{ route('portal.jadwal') }}" class="px-3 py-2 text-xs font-semibold rounded-xl border border-amber-300 text-amber-800 hover:bg-amber-100">Ajukan Reschedule</a>
          <button type="button" id="btn-konfirmasi" data-url="{{ route('portal.jadwal.konfirmasi', $next->id) }}" class="px-3 py-2 text-xs font-semibold rounded-xl bg-blue-600 hover:bg-blue-700 text-white">Konfirmasi Jadwal</button>
        </div>
      </div>
    @endif

    {{-- Statistik --}}
    <div class="grid grid-cols-3 gap-4 mb-6">
      <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm">
        <div class="text-xs font-medium text-slate-500 mb-2">Kehadiran</div>
        <div class="text-2xl font-bold text-slate-900">{{ $att['pct'] }}%</div>
        <div class="text-xs {{ $att['pct'] >= 85 ? 'text-emerald-600' : 'text-amber-600' }} font-medium mt-1">{{ $att['label'] }} · {{ $att['hadir'] }} dari {{ $att['total'] }} sesi</div>
      </div>
      <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm">
        <div class="text-xs font-medium text-slate-500 mb-2">Sesi Pekan Ini</div>
        <div class="text-2xl font-bold text-slate-900">{{ $week['done'] }}<span class="text-sm text-slate-400 font-medium"> / {{ $week['total'] }}</span></div>
        <div class="text-xs text-slate-500 font-medium mt-1">{{ $week['plan'] }} sesi lagi direncanakan</div>
      </div>
      <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm">
        <div class="text-xs font-medium text-slate-500 mb-2">Kuota Bulan Ini</div>
        <div class="text-2xl font-bold text-slate-900">{{ $quota['used'] }}<span class="text-sm text-slate-400 font-medium"> / {{ $quota['total'] }} sesi</span></div>
        <div class="w-full h-1.5 bg-slate-100 rounded-full mt-2 overflow-hidden"><div class="h-full bg-blue-600 rounded-full" style="width: {{ $quota['pct'] }}%"></div></div>
      </div>
    </div>

    {{-- Sesi berikutnya --}}
    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm mb-6">
      <div class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-3">Sesi Berikutnya</div>
      @if($hero)
        <div class="flex items-center justify-between gap-4">
          <div>
            <div class="text-base font-bold text-slate-900">{{ $hero->subject ?: 'Sesi Les Privat' }}</div>
            @if($hero->topic)<div class="text-xs text-slate-500 mt-0.5">{{ $hero->topic }}</div>@endif
            <div class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-3 text-xs text-slate-600">
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-slate-400">event</span>{{ \App\Support\Fmt::dateShort($hero->date) }}</span>
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-slate-400">schedule</span>{{ \App\Support\Fmt::hhmm($hero->start_time) }} – {{ \App\Support\Fmt::hhmm($hero->end_time) }}</span>
              @if($hero->tutor)<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-slate-400">person</span>{{ $hero->tutor->name }}</span>@endif
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-slate-400">{{ $hero->method === 'online' ? 'videocam' : 'home' }}</span>{{ $hero->method === 'online' ? 'Online' : 'Home Visit' }}@if($hero->location) · {{ $hero->location }}@endif</span>
            </div>
          </div>
          <a href="{{ route('portal.jadwal') }}" class="px-3 py-2 text-xs font-semibold rounded-xl border border-slate-200 text-slate-700 hover:bg-slate-50 shrink-0">Lihat Jadwal</a>
        </div>
      @else
        <div class="text-xs text-slate-400">Belum ada sesi terjadwal.</div>
      @endif
    </div>

    {{-- Riwayat --}}
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden mb-6">
      <div class="px-5 py-4 flex items-center justify-between border-b border-slate-100">
        <div class="text-sm font-bold text-slate-900">Riwayat Pertemuan Terakhir</div>
        <a href="{{ route('portal.presensi') }}" class="text-xs font-semibold text-blue-600 hover:underline">Lihat semua ({{ $histTotal }})</a>
      </div>
      @forelse($history as $a)
        <div class="px-5 py-3.5 flex items-center justify-between gap-4 {{ !$loop->last ? 'border-b border-slate-100' : '' }}">
          <div>
            <div class="text-xs font-bold text-slate-800">{{ $a->session->subject ?: 'Sesi Les' }}@if($a->session->topic) <span class="font-medium text-slate-500">· {{ $a->session->topic }}</span>@endif</div>
            <div class="text-[11px] text-slate-400 mt-0.5">
              {{ \App\Support\Fmt::dateShort($a->session->date) }}
              @if($a->session->tutor) · {{ $a->session->tutor->name }}@endif
              · {{ $a->extra }}
            </div>
          </div>
          <span class="px-2.5 py-1 rounded-full text-[11px] font-medium shrink-0 {{ $a->status === 'hadir' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200/60' : 'bg-amber-50 text-amber-700 border border-amber-200/60' }}">{{ $a->label }}</span>
        </div>
      @empty
        <div class="px-5 py-8 text-center text-xs text-slate-400">Belum ada riwayat pertemuan.</div>
      @endforelse
    </div>

    <footer class="text-center text-xs text-slate-400 py-4">© 2026 One Private Course</footer>
  </main>
</div>

<div id="toast" class="hidden fixed bottom-6 right-6 bg-emerald-600 text-white text-sm font-semibold px-5 py-3 rounded-xl shadow-lg z-[100]"></div>

<script>
const btn = document.getElementById('btn-konfirmasi');
if (btn) btn.addEventListener('click', async () => {
  btn.disabled = true;
  try {
    const r = await fetch(btn.dataset.url, {
      method: 'POST',
      headers: {'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content, 'Accept': 'application/json'}
    });
    const j = await r.json();
    const t = document.getElementById('toast');
    t.textContent = j.message || 'Berhasil.';
    t.classList.remove('hidden');
    setTimeout(() => location.reload(), 1200);
  } catch (e) { btn.disabled = false; alert('Gagal mengonfirmasi jadwal.'); }
});
</script>
</body>
</html>