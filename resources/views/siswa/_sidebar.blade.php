@php
    $active = $active ?? 'beranda';
    $wa     = config('opc.whatsapp', '62895376551818');
    $waUrl  = fn ($s) => 'https://wa.me/' . $wa . '?text=' . rawurlencode($s);

    // Badge dihitung dari siswa aktif ($child dikirim PortalController ke semua halaman).
    $nSesi = $nTagihan = $nNotif = 0;
    if (isset($child)) {
        $nSesi = \App\Models\Attendance::whereHas('session', fn ($q) => $q->where('student_id', $child->id))
            ->where('status', '!=', 'belum')->count();
        $nTagihan = $child->payments()->where('status', 'belum')->count();
        $nNotif = \App\Models\LessonSession::where('student_id', $child->id)
            ->whereDate('date', '>=', today())->where('status', '!=', 'batal')
            ->where('parent_confirmed', false)->count();
    }

    $menu = [
        ['beranda',  'Beranda',            'dashboard',      route('portal.beranda'),  $nSesi > 0 && false ? '' : null],
        ['jadwal',   'Jadwal Les',         'calendar_month', route('portal.jadwal'),   null],
        ['presensi', 'Presensi & Catatan', 'fact_check',     route('portal.presensi'), $nSesi ? $nSesi . ' Sesi' : null],
        ['tagihan',  'Riwayat Tagihan',    'receipt_long',   route('portal.tagihan'),  null],
        ['profil',   'Profil Siswa',       'badge',          '#',                      null],
    ];
@endphp
<aside class="fixed left-0 top-0 h-full w-64 bg-white border-r border-slate-200/80 z-50 flex flex-col justify-between p-4 overflow-y-auto">
  <div>
    <div class="flex items-center gap-3 px-2 py-2 mb-4">
      <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shrink-0 shadow-sm shadow-blue-500/25">
        <span class="material-symbols-outlined text-white text-[22px]">school</span>
      </div>
      <div class="flex flex-col min-w-0">
        <span class="font-bold text-slate-900 text-[15px] leading-snug tracking-tight">One Private Course</span>
        <span class="text-[11px] text-slate-400 font-medium truncate">Sistem Manajemen Bimbel &amp; Les</span>
      </div>
    </div>

    <a href="{{ $waUrl('Halo Admin, saya ' . auth()->user()->name . ' ingin konfirmasi pembayaran les' . (isset($child) ? ' ' . $child->name : '') . '.') }}"
       target="_blank" rel="noopener"
       class="w-full h-10 mb-5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-xl flex items-center justify-center gap-2 transition-all shadow-sm shadow-blue-600/25">
      <span class="material-symbols-outlined text-[18px]">add_circle</span> + Konfirmasi Bayar
    </a>

    <nav class="flex flex-col gap-1 text-xs font-medium">
      @foreach($menu as [$key, $label, $icon, $url, $badge])
        @if($key === $active)
          <a href="{{ $url }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-semibold">
            <span class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px]">{{ $icon }}</span>{{ $label }}</span>
            <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
          </a>
        @else
          <a href="{{ $url }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors">
            <span class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px] text-slate-400">{{ $icon }}</span>{{ $label }}</span>
            @if($badge)<span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-500 text-[11px] font-semibold">{{ $badge }}</span>@endif
          </a>
        @endif
      @endforeach

      <div class="border-t border-slate-100 my-2 mx-1"></div>

      <a href="{{ route('portal.tagihan') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors">
        <span class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px] text-amber-500">pending_actions</span>Tagihan Berjalan</span>
        @if($nTagihan)<span class="w-6 h-6 rounded-full bg-amber-50 text-amber-600 border border-amber-200/60 text-[11px] font-bold flex items-center justify-center">{{ $nTagihan }}</span>@endif
      </a>
      <a href="{{ route('portal.jadwal') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors">
        <span class="flex items-center gap-3"><span class="material-symbols-outlined text-[20px] text-blue-500">notifications</span>Notifikasi Masuk</span>
        @if($nNotif)<span class="w-6 h-6 rounded-full bg-blue-50 text-blue-600 border border-blue-200/60 text-[11px] font-bold flex items-center justify-center">{{ $nNotif }}</span>@endif
      </a>
    </nav>
  </div>

  <div class="flex flex-col gap-2 mt-6">
    <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener" class="p-3 bg-slate-50 rounded-xl border border-slate-200/60 flex items-center gap-3 hover:bg-slate-100 transition-colors">
      <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-600 flex items-center justify-center shrink-0">
        <span class="material-symbols-outlined text-[18px]">support_agent</span>
      </div>
      <div class="flex flex-col min-w-0">
        <span class="text-[11px] font-semibold text-slate-800 truncate">Bantuan Cabang</span>
        <span class="text-[10px] text-blue-600">WhatsApp Admin</span>
      </div>
    </a>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 text-xs font-semibold">
        <span class="material-symbols-outlined text-[18px]">logout</span> Keluar
      </button>
    </form>
  </div>
</aside>