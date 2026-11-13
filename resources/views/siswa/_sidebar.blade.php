@php
    // Menu aktif
    $active = $active ?? 'beranda';

    // Informasi WhatsApp admin
    $wa = preg_replace('/\D+/', '', (string) config('opc.whatsapp', '62895376551818'));

    $userName = auth()->user()->name ?? 'Pengguna';
    $childName = isset($child) ? $child->name : '';

    $waUrl = fn ($message) => 'https://wa.me/' . $wa . '?text=' . rawurlencode($message);

    // Badge jumlah sesi berdasarkan siswa aktif
    $nSesi = 0;

    if (isset($child) && $child) {
        $nSesi = \App\Models\Attendance::whereHas('session', function ($query) use ($child) {
            $query->where('student_id', $child->id);
        })
        ->where('status', '!=', 'belum')
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

            {{-- PROFIL SISWA (membuka popup, tidak pindah halaman) --}}
            <a
                href="#"
                id="btn-profil-siswa"
                class="flex items-center justify-between px-3 py-2.5 rounded-xl transition-colors text-slate-600 hover:bg-slate-50 hover:text-slate-900"
            >
                <span class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px] text-slate-400">
                        badge
                    </span>

                    Profil Siswa
                </span>
            </a>

        </nav>
    </div>

    {{-- TOMBOL KELUAR --}}
    <form method="POST" action="{{ route('logout') }}" class="mt-4">
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
</aside>

{{-- POPUP PROFIL SISWA --}}
@if (isset($child) && $child)
<div id="profil-siswa-modal" class="hidden fixed inset-0 z-[70] items-center justify-center bg-slate-900/40 p-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden max-h-[90vh] flex flex-col">

        <div class="px-6 py-4 flex items-center justify-between border-b border-slate-100 shrink-0">
            <div>
                <div class="text-sm font-bold text-slate-900">Profil Siswa</div>
                <div class="text-[11px] text-slate-400">Data tercatat di administrasi cabang.</div>
            </div>

            <button type="button" id="btn-profil-tutup" class="w-8 h-8 rounded-lg hover:bg-slate-100 text-slate-500 flex items-center justify-center" aria-label="Tutup">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>

        <div class="px-6 py-5 overflow-y-auto space-y-4">

            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-lg shrink-0">
                    {{ mb_strtoupper(mb_substr($child->name, 0, 1)) }}
                </div>

                <div class="min-w-0">
                    <div class="text-sm font-bold text-slate-900 truncate">{{ $child->name }}</div>
                    <div class="text-xs text-slate-500">{{ $child->grade ?: '-' }}</div>
                </div>
            </div>

            <dl class="grid grid-cols-3 gap-y-3 text-xs">
                <dt class="text-slate-400">Sekolah</dt>
                <dd class="col-span-2 font-semibold text-slate-800">{{ $child->school ?: '-' }}</dd>

                <dt class="text-slate-400">Program</dt>
                <dd class="col-span-2 font-semibold text-slate-800">{{ $child->program ?: '-' }}</dd>

                <dt class="text-slate-400">Tutor</dt>
                <dd class="col-span-2 font-semibold text-slate-800">{{ $child->tutor->name ?? '-' }}</dd>

                <dt class="text-slate-400">Paket</dt>
                <dd class="col-span-2 font-semibold text-slate-800">{{ $child->package ?: '-' }}</dd>

                <dt class="text-slate-400">Alamat</dt>
                <dd class="col-span-2 font-semibold text-slate-800">{{ $child->address ?: '-' }}</dd>
            </dl>
        </div>

        <div class="px-6 py-4 border-t border-slate-100 flex justify-end shrink-0">
            <button type="button" id="btn-profil-selesai" class="h-9 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold">
                Tutup
            </button>
        </div>
    </div>
</div>
@endif

<script>
(function () {
    var link = document.getElementById('btn-profil-siswa');
    var modal = document.getElementById('profil-siswa-modal');
    if (!link) return;

    function open() { if (modal) { modal.classList.remove('hidden'); modal.classList.add('flex'); } }
    function close() { if (modal) { modal.classList.add('hidden'); modal.classList.remove('flex'); } }

    link.addEventListener('click', function (e) { e.preventDefault(); open(); });

    if (modal) {
        modal.addEventListener('click', function (e) { if (e.target === modal) close(); });
        ['btn-profil-tutup', 'btn-profil-selesai'].forEach(function (id) {
            var b = document.getElementById(id);
            if (b) b.addEventListener('click', close);
        });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') close(); });
    }
})();
</script>