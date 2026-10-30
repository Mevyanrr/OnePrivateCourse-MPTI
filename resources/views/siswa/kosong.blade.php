<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Selamat Datang - One Private Course</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/auth/auth.css') }}" rel="stylesheet">
</head>
<body class="auth auth--register">
@php $wa = config('opc.whatsapp', '6281198760001'); @endphp
<div class="auth-page">
  <div class="auth-decor" aria-hidden="true"><img class="watermark" src="{{ asset('assets/auth/fc2cb7338589f15fa181eca0713e79d9.svg') }}" alt=""></div>
  <header class="auth-header">
    <span class="brand">
      <span class="brand__logo"><img src="{{ asset('assets/auth/4f8158de35fb87d96126a933e207eba8.svg') }}" width="22" height="18" alt=""></span>
      <span><span class="brand__name">One Private Course</span><span class="brand__tag">Sistem Manajemen Bimbel &amp; Les Privat</span></span>
    </span>
  </header>
  <main class="auth-main">
    <section class="card card--register">
      <div class="card__head">
        <div class="pill pill--round"><img src="{{ asset('assets/auth/f806e8a40053bf48fbd2f12c91c3cfd1.svg') }}" width="27.5" height="20" alt=""></div>
        <h1 class="card__title">Selamat datang, {{ $user->name }}</h1>
        <p class="card__sub">Akun kamu sudah aktif, tetapi belum terhubung ke data siswa. Hubungi admin cabang agar siswa dihubungkan ke akun ini, lalu muat ulang halaman.</p>
      </div>
      @if (session('success'))<div class="alert alert--ok" role="status">{{ session('success') }}</div>@endif
      <a class="btn" href="https://wa.me/{{ $wa }}?text={{ rawurlencode('Halo Admin, saya baru mendaftar sebagai wali murid ('.$user->name.'). Mohon hubungkan akun saya dengan data siswa.') }}" target="_blank" rel="noopener">Hubungi Admin Cabang</a>
      <form method="POST" action="{{ route('logout') }}" class="card__foot" style="flex-direction:row;justify-content:center">
        @csrf
        <button type="submit" style="background:none;border:0;padding:0;font-family:inherit;font-weight:600;font-size:12px;line-height:18px;color:var(--blue-d);cursor:pointer">Keluar dari akun</button>
      </form>
    </section>
  </main>
</div>
</body>
</html>
