
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

        {{-- sidebar untuk admin dan siswa --}}
        <x-sidebar />

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

    @stack('scripts')

</body>
</html>
