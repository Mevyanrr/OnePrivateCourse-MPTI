<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Riwayat Tagihan - One Private Course</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..24,400..600,0..1,-25..0&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com?plugins=forms"></script>
<style>
  body { font-family: 'Plus Jakarta Sans', sans-serif; overscroll-behavior: none; }
  ::-webkit-scrollbar { display: none; }
</style>
</head>
<body class="bg-[#f8faff] text-slate-800 antialiased min-h-screen flex">

@include('siswa._sidebar', ['active' => 'tagihan'])

@php
  $wa  = config('opc.whatsapp', '62895376551818');
  $rp  = fn ($n) => 'Rp ' . number_format((int) $n, 0, ',', '.');
  $waText = fn ($s) => 'https://wa.me/' . $wa . '?text=' . rawurlencode($s);
@endphp

<div class="pl-64 flex-1 min-w-0">
  <header class="h-14 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 sticky top-0 z-40">
    <div class="flex items-center gap-2 text-xs text-slate-500">
      <span class="material-symbols-outlined text-blue-600 text-[18px]">school</span>
      Profil aktif: <strong class="text-blue-700">{{ $child->name }}</strong> <span>({{ $child->grade }})</span>
    </div>
    <div class="flex items-center gap-3">
      @if($children->count() > 1)
        <div class="flex gap-1.5">
          @foreach($children as $c)
            <a href="{{ route('portal.tagihan', ['anak' => $c->id]) }}"
               class="px-3 py-1 rounded-lg text-xs font-semibold border {{ $c->id === $child->id ? 'bg-blue-600 text-white border-blue-600' : 'border-slate-200 text-slate-600 hover:bg-slate-50' }}">{{ $c->name }}</a>
          @endforeach
        </div>
      @endif
      <div class="text-right">
        <div class="text-xs font-semibold text-slate-800 leading-tight">{{ auth()->user()->name }}</div>
        <div class="text-[11px] text-slate-400">Wali Murid</div>
      </div>
    </div>
  </header>

  <main class="p-8 max-w-[1200px] mx-auto">
    <div class="flex items-start justify-between gap-4 mb-6">
      <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Status &amp; Riwayat Pembayaran</h1>
        <p class="text-xs text-slate-500 mt-1">Lihat tagihan les, kuitansi resmi, dan konfirmasi pembayaran lewat WhatsApp admin.</p>
      </div>
      <a href="{{ $waText('Halo Admin, saya ' . auth()->user()->name . ' ingin konfirmasi pembayaran les ' . $child->name . '.') }}" target="_blank" rel="noopener"
         class="shrink-0 flex items-center gap-1.5 px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold shadow-sm">
        <span class="material-symbols-outlined text-[17px]">chat</span> Konfirmasi Bayar
      </a>
    </div>

    {{-- Ringkasan --}}
    <div class="grid grid-cols-4 gap-4 mb-6">
      <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm">
        <div class="text-xs font-medium text-slate-500 mb-2">Total Tagihan Aktif</div>
        <div class="text-xl font-bold text-slate-900">{{ $rp($k['active']) }}</div>
        <div class="text-[11px] text-slate-500 mt-1">{{ $k['periods'] }}</div>
      </div>
      <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm">
        <div class="text-xs font-medium text-slate-500 mb-2">Sudah Lunas</div>
        <div class="text-xl font-bold text-emerald-600">{{ $rp($k['paid']) }}</div>
        <div class="text-[11px] text-slate-500 mt-1">{{ $k['paidNote'] }}</div>
      </div>
      <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm">
        <div class="text-xs font-medium text-slate-500 mb-2">Menunggu Pembayaran</div>
        <div class="text-xl font-bold text-amber-600">{{ $rp($k['unpaid']) }}</div>
        <div class="text-[11px] text-slate-500 mt-1">{{ $k['unpaidNote'] }}</div>
      </div>
      <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm">
        <div class="text-xs font-medium text-slate-500 mb-2">Sisa Kuota Bulan Ini</div>
        <div class="text-xl font-bold text-blue-700">{{ $k['quotaLeft'] }}<span class="text-sm text-slate-400 font-medium"> / {{ $k['quotaTotal'] }} sesi</span></div>
        <div class="text-[11px] text-slate-500 mt-1">{{ $child->name }}</div>
      </div>
    </div>

    {{-- Tagihan yang perlu perhatian --}}
    @php $belum = $rows->where('status', 'belum'); @endphp
    @if($belum->isNotEmpty())
      <div class="grid grid-cols-2 gap-4 mb-6">
        @foreach($belum as $pc)
          <div class="bg-white rounded-2xl border border-amber-200 p-5 shadow-sm">
            <div class="flex items-start justify-between gap-3">
              <div>
                <div class="text-[11px] font-semibold uppercase tracking-wider text-amber-600">Menunggu pelunasan</div>
                <div class="text-base font-bold text-slate-900 mt-1">Tagihan {{ $pc->period }}</div>
                <div class="text-xs text-slate-500 mt-0.5">Siswa: <strong class="text-slate-700">{{ $pc->student->name }}</strong> ({{ $pc->student->grade }})</div>
              </div>
              <span class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 border border-amber-200/60 text-[11px] font-medium shrink-0">Belum dibayar</span>
            </div>
            <div class="flex items-end justify-between mt-4">
              <div>
                <div class="text-[11px] text-slate-400">Nominal</div>
                <div class="text-xl font-bold text-amber-600">{{ $rp($pc->amount) }}</div>
                @if($pc->due_date)<div class="text-[11px] text-slate-500 mt-0.5">Jatuh tempo: {{ \App\Support\Fmt::dateShort($pc->due_date) }}</div>@endif
              </div>
              <a href="{{ $waText('Halo Admin, saya ingin konfirmasi pembayaran tagihan ' . $pc->period . ' atas nama ' . $pc->student->name . ' (' . $rp($pc->amount) . ').') }}" target="_blank" rel="noopener"
                 class="px-3 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold">Konfirmasi via WhatsApp</a>
            </div>
          </div>
        @endforeach
      </div>
    @endif

    {{-- Riwayat --}}
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden mb-6">
      <div class="px-5 py-4 border-b border-slate-100 text-sm font-bold text-slate-900">Riwayat Tagihan</div>
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-slate-50/70 text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              <th class="py-3 px-5">Invoice</th>
              <th class="py-3 px-5">Siswa</th>
              <th class="py-3 px-5">Periode</th>
              <th class="py-3 px-5">Sesi Terpakai</th>
              <th class="py-3 px-5">Nominal</th>
              <th class="py-3 px-5">Status</th>
              <th class="py-3 px-5 text-right">Kuitansi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 text-xs">
            @forelse($rows as $pc)
              <tr class="hover:bg-slate-50/50">
                <td class="py-3.5 px-5 whitespace-nowrap">
                  <div class="font-semibold text-slate-800">{{ $pc->invoice_no ?: 'INV-' . $pc->id }}</div>
                  @if($pc->receipt_no)<div class="text-[11px] text-slate-400">{{ $pc->receipt_no }}</div>@endif
                </td>
                <td class="py-3.5 px-5 whitespace-nowrap">
                  <div class="font-semibold text-slate-800">{{ $pc->student->name }}</div>
                  <div class="text-[11px] text-slate-400">{{ $pc->student->grade }}</div>
                </td>
                <td class="py-3.5 px-5 whitespace-nowrap text-slate-700">{{ $pc->period }}</td>
                <td class="py-3.5 px-5 whitespace-nowrap text-slate-700">{{ $pc->used }} sesi</td>
                <td class="py-3.5 px-5 whitespace-nowrap font-semibold text-slate-900">{{ $rp($pc->amount) }}</td>
                <td class="py-3.5 px-5 whitespace-nowrap">
                  @if($pc->status === 'lunas')
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/50 text-[11px] font-medium"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Lunas</span>
                  @else
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-700 border border-amber-200/50 text-[11px] font-medium"><span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Menunggu</span>
                  @endif
                </td>
                <td class="py-3.5 px-5 whitespace-nowrap text-right">
                  @if($pc->status === 'lunas')
                    <a href="{{ route('portal.kuitansi', $pc->id) }}" target="_blank" class="px-2.5 py-1 rounded-lg border border-slate-200 text-slate-700 hover:bg-slate-50 text-[11px] font-semibold">Lihat</a>
                  @else
                    <span class="text-slate-300">-</span>
                  @endif
                </td>
              </tr>
            @empty
              <tr><td colspan="7" class="py-10 text-center text-xs text-slate-400">Belum ada tagihan.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="px-5 py-3 border-t border-slate-100 text-xs text-slate-500">Menampilkan {{ $rows->count() }} tagihan</div>
    </div>

    <footer class="text-center text-xs text-slate-400 py-4">© 2026 One Private Course</footer>
  </main>
</div>
</body>
</html>