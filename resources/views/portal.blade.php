<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') · One Private Course</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/portal.css'])

    @stack('styles')
</head>

<body>

    <div class="shell">

        {{-- sidebar untuk admin dan siswa (tampil sesuai role yang login) --}}
        @auth
            @if(auth()->user()->role === 'admin')
                <x-sidebar />
            @else
                <x-student-sidebar />
            @endif
        @endauth

        {{-- konten utama --}}
        <div class="main">

            {{-- topbar --}}
            <header class="topbar">

                <div style="display: flex; align-items: center;">

                    {{-- tombol buka sidebar --}}
                    <button
                        class="sb-toggle"
                        type="button"
                        aria-label="Buka menu"
                        onclick="document.getElementById('sidebar').classList.toggle('open')"
                    >
                        <x-icon name="grid" />
                    </button>

                    @yield('topbar')

                </div>

                @yield('topbar-right')

            </header>

            {{-- isi halaman --}}
            <main class="page">
                @yield('content')
            </main>

        </div>

    </div>

    {{-- menu logout di kotak user (pojok kanan atas) --}}
    <style>
        .user-menu {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            min-width: 160px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
            padding: 6px;
            display: none;
            z-index: 9999;
        }
        .user-menu.show { display: block; }
        .user-menu button {
            width: 100%;
            text-align: left;
            background: none;
            border: 0;
            padding: 10px 12px;
            border-radius: 8px;
            font: inherit;
            font-weight: 600;
            color: #dc2626;
            cursor: pointer;
        }
        .user-menu button:hover { background: #fef2f2; }
    </style>

    <form id="logoutForm" method="POST"
          action="{{ \Illuminate\Support\Facades\Route::has('logout') ? route('logout') : url('/logout') }}"
          style="display:none">
        @csrf
    </form>

    <script>
        (function () {
            var who = document.querySelector('.topbar .who');
            if (!who) return;

            var box = who.parentElement;
            box.style.position = 'relative';
            box.style.cursor = 'pointer';

            var menu = document.createElement('div');
            menu.className = 'user-menu';
            menu.innerHTML = '<button type="button">Logout</button>';
            box.appendChild(menu);

            // capture + stopPropagation supaya tidak bentrok dengan handler lama di opc.js
            document.addEventListener('click', function (e) {
                if (menu.contains(e.target)) {
                    e.stopPropagation();
                    document.getElementById('logoutForm').submit();
                    return;
                }
                if (box.contains(e.target)) {
                    e.stopPropagation();
                    menu.classList.toggle('show');
                    return;
                }
                menu.classList.remove('show');
            }, true);
        })();
    </script>

    @stack('scripts')

</body>
</html>