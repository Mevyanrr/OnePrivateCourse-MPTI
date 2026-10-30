<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Masuk - One Private Course</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/auth/auth.css') }}" rel="stylesheet">
</head>
<body class="auth auth--login">
@php
    $role = old('role', 'admin') === 'wali' ? 'wali' : 'admin';
    $wa = config('opc.whatsapp', '6281198760001');
    $svg = fn ($f) => file_get_contents(public_path('assets/auth/'.$f)); // ikon di-inline agar warnanya ikut tab aktif
@endphp
<div class="auth-page">

  <div class="auth-decor" aria-hidden="true">
    <div class="blob blob--lav"></div>
    <div class="blob blob--mint"></div>
    <img class="cap" src="{{ asset('assets/auth/2bf5ec88fac4d12807ee8a7980859cf5.svg') }}" alt="">
    <img class="star" src="{{ asset('assets/auth/a2fdffc2ac4eceb3aa2c185b50427985.svg') }}" alt="">
    <img class="book" src="{{ asset('assets/auth/72895ec63f58efbf42781b4601286a0e.svg') }}" alt="">
  </div>

  <header class="auth-header">
    <a class="brand" href="{{ route('login') }}">
      <span class="brand__logo"><img src="{{ asset('assets/auth/369b9379e29f64f2c6e428e89da00d2c.svg') }}" width="22" height="18" alt=""></span>
      <span>
        <span class="brand__name">One Private Course</span>
        <span class="brand__tag">Sistem Manajemen Bimbel &amp; Les Privat</span>
      </span>
    </a>
    <a class="hdr-btn" href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener">
      <img src="{{ asset('assets/auth/b0f22bab601880e0a15306fc30920a69.svg') }}" width="15" height="14" alt="">
      <span>Bantuan &amp; Kontak Cabang</span>
    </a>
  </header>

  <main class="auth-main">
    <section class="card" aria-labelledby="judul">
      <div class="card__head">
        <div class="pill"><img src="{{ asset('assets/auth/72895ec63f58efbf42781b4601286a0e.svg') }}" width="27.5" height="20" alt=""></div>
        <h1 class="card__title" id="judul">Masuk ke One Private Course</h1>
        <p class="card__sub">Kelola operasional bimbingan, jadwal mengajar, dan presensi dalam satu pintu</p>
      </div>

      @if (session('success'))<div class="alert alert--ok" role="status">{{ session('success') }}</div>@endif
      @if (session('error'))<div class="alert alert--bad" role="alert">{{ session('error') }}</div>@endif

      <form method="POST" action="{{ route('login.post') }}" class="form login-form" data-auth novalidate>
        @csrf

        <div class="roles" style="margin-bottom:4px">
          <p class="roles__label" id="lbl-role">Pilih peran masuk</p>
          <div class="tabs" role="radiogroup" aria-labelledby="lbl-role">
            <input type="radio" name="role" id="role-admin" value="admin" @checked($role === 'admin')>
            <label for="role-admin"><span class="mi" style="width:12px;height:15px">{!! $svg('71246e60137bd00a8ee3e7c40e0487ee.svg') !!}</span>Admin</label>
            <input type="radio" name="role" id="role-wali" value="wali" @checked($role === 'wali')>
            <label for="role-wali"><span class="mi" style="width:12px;height:12px">{!! $svg('5824c516832ebb5b27d240bf3c554e4a.svg') !!}</span>Siswa/Wali</label>
          </div>
          <div class="note">
            <img src="{{ asset('assets/auth/32e70c6499e85432c882e5546b8b130f.svg') }}" width="13.3" height="13.3" alt="">
            <span id="role-note"
                  data-admin="Akses operasional cabang, absensi, dan penerbitan honorarium."
                  data-wali="Akses jadwal belajar, presensi sesi, dan tagihan pembayaran."
            >{{ $role === 'wali' ? 'Akses jadwal belajar, presensi sesi, dan tagihan pembayaran.' : 'Akses operasional cabang, absensi, dan penerbitan honorarium.' }}</span>
          </div>
          @error('role')<p class="err">{{ $message }}</p>@enderror
        </div>

        <div class="field">
          <label for="identifier">Email / No. WhatsApp / Username</label>
          <div class="f @error('identifier') is-err @enderror">
            <input type="text" id="identifier" name="identifier" value="{{ old('identifier') }}" placeholder="admin.jaksel@oneprivate.com" autocomplete="username" autofocus>
            <span class="ico"><img src="{{ asset('assets/auth/d6eabeb9ddeea5f2efa2d00235db970a.svg') }}" width="16.7" height="16.7" alt=""></span>
          </div>
          @error('identifier')<p class="err" role="alert">{{ $message }}</p>@enderror
        </div>

        <div class="field">
          <div class="field__row">
            <label for="password">Kata Sandi</label>
            <a class="field__link" href="https://wa.me/{{ $wa }}?text={{ rawurlencode('Halo Admin, saya lupa kata sandi akun One Private Course.') }}" target="_blank" rel="noopener">Lupa Sandi?</a>
          </div>
          <div class="f @error('password') is-err @enderror">
            <input type="password" id="password" name="password" placeholder="••••••••••••" autocomplete="current-password">
            <span class="ico"><img src="{{ asset('assets/auth/094eb7ce9ed2a8d494f4dc3a4ab7c6e1.svg') }}" width="13.3" height="17.5" alt=""></span>
            <button type="button" class="eye" data-eye="password" aria-label="Tampilkan atau sembunyikan kata sandi" aria-pressed="false">
              <img src="{{ asset('assets/auth/190920875191b12d30017fe55c89bee9.svg') }}" width="18.3" height="12.5" alt="">
            </button>
          </div>
          @error('password')<p class="err" role="alert">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="btn">Masuk ke Dashboard</button>
      </form>

      @if (config('opc.show_demo'))
        <div>
          <div class="divider">Akses demo cepat</div>
          <div class="demo">
            <button type="button" class="chip" data-demo data-role="admin" data-identifier="admin.jaksel@oneprivate.com" data-password="password123"><i></i>Demo Admin</button>
            <button type="button" class="chip chip--teal" data-demo data-role="wali" data-identifier="wali.demo@oneprivate.com" data-password="password123"><i></i>Demo Siswa/Wali</button>
          </div>
        </div>
      @endif

      <div class="card__foot">
        <p>Belum terdaftar sebagai siswa/wali atau staf baru?</p>
        <a href="{{ route('register') }}">Daftar Akun Baru <img src="{{ asset('assets/auth/8ddf313238f71bfeea2e8d8cbc805997.svg') }}" width="10.5" height="10.5" alt=""></a>
      </div>
    </section>
  </main>

  <footer class="auth-footer">
    <div class="copy">
      <img src="{{ asset('assets/auth/b3a85932dca6351853c019acca54adb1.svg') }}" width="14.7" height="14" alt="">
      <span>© 2026 One Private Course Indonesia. Keamanan data terenkripsi.</span>
    </div>
    <nav class="flinks" aria-label="Tautan bawah">
      <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener">Panduan Aplikasi</a><span class="dot">•</span>
      <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener">Kebijakan Privasi</a><span class="dot">•</span>
      <a href="{{ url('/up') }}" target="_blank" rel="noopener">Status Server</a>
    </nav>
  </footer>
</div>
<script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>
