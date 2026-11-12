<aside id="sidebar" class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col justify-between min-h-screen">
    <div class="p-6">
        <!-- Logo / Brand Aplikasi -->
        <div class="flex items-center gap-3 mb-8">
            <div class="bg-indigo-600 text-white p-2 rounded-lg font-bold text-xl">MP</div>
            <span class="text-xl font-bold text-gray-800">Portal Siswa</span>
        </div>

        <!-- Informasi Profil Siswa (Dari Database) -->
        <div class="mb-6 p-3 bg-gray-50 rounded-xl border border-gray-100 flex items-center gap-3">
            <img class="w-10 h-10 rounded-full object-cover border"
                 src="{{ $student && $student->avatar ? asset('storage/' . $student->avatar) : asset('images/default-avatar.png') }}"
                 alt="Foto Profil">
            <div class="overflow-hidden">
                <h4 class="text-sm font-semibold text-gray-800 truncate">
                    {{ $student->name ?? Auth::user()->name ?? 'Siswa' }}
                </h4>
                <p class="text-xs text-gray-500 truncate">
                    {{ Auth::user()->email ?? '-' }}
                </p>
            </div>
        </div>

        <!-- Menu Navigasi Siswa (Reusable) -->
        <nav class="space-y-1">
            <!-- Dashboard -->
            <a href="{{ route('portal.dashboard') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('portal.dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dashboard
            </a>

            <!-- Jadwal Belajar -->
            <a href="{{ route('portal.schedules.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('portal.schedules.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Jadwal & Sesi
            </a>

            <!-- Kehadiran / Absensi -->
            <a href="{{ route('portal.attendances.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('portal.attendances.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                Kehadiran
            </a>

            <!-- Pembayaran -->
            <a href="{{ route('portal.payments.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('portal.payments.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                Riwayat Pembayaran
            </a>
        </nav>
    </div>

    <!-- Tombol Logout / Keluar di Bagian Bawah -->
    <div class="p-4 border-t border-gray-100">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-red-600 hover:bg-red-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar
            </button>
        </form>
    </div>
</aside>
