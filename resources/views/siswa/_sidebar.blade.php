
@php
    // Menu aktif
    $active = $active ?? 'beranda';

    // Informasi WhatsApp admin
    $wa = preg_replace('/\D+/', '', (string) config('opc.whatsapp', '62895376551818'));

    $userName = auth()->user()->name ?? 'Pengguna';
    $childName = isset($child) ? $child->name : '';

    $waUrl = fn ($message) => 'https://wa.me/' . $wa . '?text=' . rawurlencode($message);

    // Inisialisasi badge
    $nSesi = 0;
    $nTagihan = 0;
    $nNotif = 0;

    // Menghitung badge berdasarkan siswa aktif
    if (isset($child) && $child) {
        $nSesi = \App\Models\Attendance::whereHas('session', function ($query) use ($child) {
            $query->where('student_id', $child->id);
        })
        ->where('status', '!=', 'belum')
        ->count();

        $nTagihan = $child->payments()
            ->where('status', 'belum')
            ->count();

        $nNotif = \App\Models\LessonSession::where('student_id', $child->id)
            ->whereDate('date', '>=', today())
            ->where('status', '!=', 'batal')
            ->where('parent_confirmed', false)
            ->count();
    }

    // Konfigurasi menu sidebar
    $menu = [
        [
            'key' => 'beranda',
            'label' => 'Beranda',
            'icon' => 'dashboard',
            'url' => route('portal.beranda'),
            'badge' => null,
        ],
        [
            'key' => 'jadwal',
            'label' => 'Jadwal Les',
            'icon' => 'calendar_month',
            'url' => route('portal.jadwal'),
            'badge' => null,
        ],
        [
            'key' => 'presensi',
            'label' => 'Presensi & Catatan',
            'icon' => 'fact_check',
            'url' => route('portal.presensi'),
            'badge' => $nSesi > 0 ? $nSesi . ' Sesi' : null,
        ],
        [
            'key' => 'tagihan',
            'label' => 'Riwayat Tagihan',
            'icon' => 'receipt_long',
            'url' => route('portal.tagihan'),
            'badge' => null,
        ],
        [
            'key' => 'profil',
            'label' => 'Profil Siswa',
            'icon' => 'badge',
            'url' => '#',
            'badge' => null,
        ],
    ];
@endphp

<aside
    id="sidebar"
    class="fixed left-0 top-0 h-full w-64 bg-white border-r border-slate-200/80 z-50 flex flex-col justify-between p-4 overflow-y-auto"
    aria-label="Navigasi utama"
>
    <div>
        {{-- BRAND / LOGO --}}
        <a
            href="{{ route('portal.beranda') }}"
            class="flex items-center gap-3 px-2 py-2 mb-4"
        >
            <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shrink-0 shadow-sm shadow-blue-500/25">
                <span class="material-symbols-outlined text-white text-[22px]">
                    school
                </span>
            </div>

            <div class="flex flex-col min-w-0">
                <span class="font-bold text-slate-900 text-[15px] leading-snug tracking-tight">
                    One Private Course
                </span>

                <span class="text-[11px] text-slate-400 font-medium truncate">
                    Sistem Manajemen Bimbel &amp; Les
                </span>
            </div>
        </a>

        {{-- TOMBOL KONFIRMASI BAYAR --}}
        <a
            href="{{ $waUrl('Halo Admin, saya ' . $userName . ' ingin konfirmasi pembayaran les' . ($childName ? ' ' . $childName : '') . '.') }}"
            target="_blank"
            rel="noopener noreferrer"
            class="w-full h-10 mb-5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-xl flex items-center justify-center gap-2 transition-all shadow-sm shadow-blue-600/25"
        >
            <span class="material-symbols-outlined text-[18px]">
                add_circle
            </span>

            Konfirmasi Bayar
        </a>

        {{-- MENU NAVIGASI --}}
        <nav class="flex flex-col gap-1 text-xs font-medium">

            @foreach ($menu as $item)
                @php
                    $isActive = $active === $item['key'];
                @endphp

                <a
                    href="{{ $item['url'] }}"
                    class="flex items-center justify-between px-3 py-2.5 rounded-xl transition-colors
                    {{ $isActive
                        ? 'bg-blue-50 text-blue-700 font-semibold'
                        : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'
                    }}"
                    @if ($isActive) aria-current="page" @endif
                >
                    <span class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-[20px]
                            {{ $isActive ? 'text-blue-600' : 'text-slate-400' }}">
                            {{ $item['icon'] }}
                        </span>

                        {{ $item['label'] }}
                    </span>

                    @if ($isActive)
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                    @elseif ($item['badge'])
                        <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-500 text-[11px] font-semibold">
                            {{ $item['badge'] }}
                        </span>
                    @endif
                </a>
            @endforeach

            {{-- PEMISAH MENU --}}
            <div class="border-t border-slate-100 my-2 mx-1"></div>

            {{-- TAGIHAN BERJALAN --}}
            <a
                href="{{ route('portal.tagihan') }}"
                class="flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors"
            >
                <span class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px] text-amber-500">
                        pending_actions
                    </span>

                    Tagihan Berjalan
                </span>

                @if ($nTagihan > 0)
                    <span class="w-6 h-6 rounded-full bg-amber-50 text-amber-600 border border-amber-200/60 text-[11px] font-bold flex items-center justify-center">
                        {{ $nTagihan }}
                    </span>
                @endif
            </a>

            {{-- NOTIFIKASI MASUK --}}
            <a
                href="{{ route('portal.jadwal') }}"
                class="flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors"
            >
                <span class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px] text-blue-500">
                        notifications
                    </span>

                    Notifikasi Masuk
                </span>

                @if ($nNotif > 0)
                    <span class="w-6 h-6 rounded-full bg-blue-50 text-blue-600 border border-blue-200/60 text-[11px] font-bold flex items-center justify-center">
                        {{ $nNotif }}
                    </span>
                @endif
            </a>

        </nav>
    </div>

    {{-- BAGIAN BAWAH SIDEBAR --}}
    <div class="flex flex-col gap-2 mt-6">

        {{-- BANTUAN CABANG --}}
        <a
            href="https://wa.me/{{ $wa }}"
            target="_blank"
            rel="noopener noreferrer"
            class="p-3 bg-slate-50 rounded-xl border border-slate-200/60 flex items-center gap-3 hover:bg-slate-100 transition-colors"
        >
            <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-600 flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-[18px]">
                    support_agent
                </span>
            </div>

            <div class="flex flex-col min-w-0">
                <span class="text-[11px] font-semibold text-slate-800 truncate">
                    Bantuan Cabang
                </span>

                <span class="text-[10px] text-blue-600">
                    WhatsApp Admin
                </span>
            </div>
        </a>

        {{-- TOMBOL KELUAR --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="w-full flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 text-xs font-semibold transition-colors"
            >
                <span class="material-symbols-outlined text-[18px]">
                    logout
                </span>

                Keluar
            </button>
        </form>

    </div>
</aside>
