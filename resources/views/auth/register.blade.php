<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Daftar Akun - One Private Course</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/auth/auth.css') }}" rel="stylesheet">
</head>
<body class="auth auth--register">
@php
    $role = old('role', 'admin') === 'wali' ? 'wali' : 'admin';
    $wa = config('opc.whatsapp', '6281198760001');
    $a = fn ($f) => asset('assets/auth/'.$f);
    $svg = fn ($f) => file_get_contents(public_path('assets/auth/'.$f));
@endphp
<div class="auth-page">

  <div class="auth-decor" aria-hidden="true">
    <img class="watermark" src="{{ $a('fc2cb7338589f15fa181eca0713e79d9.svg') }}" alt="">
  </div>

  <header class="auth-header">
    <a class="brand" href="{{ route('login') }}">
      <span class="brand__logo"><img src="{{ $a('4f8158de35fb87d96126a933e207eba8.svg') }}" width="22" height="18" alt=""></span>
      <span>
        <span class="brand__name">One Private Course</span>
        <span class="brand__tag">Sistem Manajemen Bimbel &amp; Les Privat</span>
      </span>
    </a>
    <div class="hdr-actions">
      <a class="hdr-link" href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener">
        <img src="{{ $a('f484185211f2c9354f663da57ee3a773.svg') }}" width="15" height="15" alt=""><span class="hdr-link--text">Pusat Bantuan</span>
      </a>
      <a class="hdr-link hdr-link--outline" href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener">
        <img src="{{ $a('493d6a4fce6607f66c73baa7f377d087.svg') }}" width="15" height="15" alt=""><span class="hdr-link--text">Kontak Bimbel</span>
      </a>
    </div>
  </header>

  <main class="auth-main">
    <section class="card card--register" aria-labelledby="judul">
      <div class="card__head">
        <div class="pill pill--round"><img src="{{ $a('f806e8a40053bf48fbd2f12c91c3cfd1.svg') }}" width="27.5" height="20" alt=""></div>
        <h1 class="card__title" id="judul">Daftar Akun One Private Course</h1>
        <p class="card__sub">Registrasi akun baru untuk siswa/wali atau staf administrasi bimbel</p>
      </div>

      @if (session('error'))<div class="alert alert--bad" role="alert">{{ session('error') }}</div>@endif

      <form method="POST" action="{{ route('register.post') }}" class="form" data-auth novalidate>
        @csrf

        <div class="roles">
          <p class="roles__label" id="lbl-role">Pilih Peran Pendaftaran</p>
          <div class="tabs" role="radiogroup" aria-labelledby="lbl-role">
            <input type="radio" name="role" id="role-admin" value="admin" @checked($role === 'admin')>
            <label for="role-admin"><span class="mi" style="width:15px;height:13px">{!! $svg('03f4ad7476db2cad1efd02cc9c724274.svg') !!}</span>Admin / Staf</label>
            <input type="radio" name="role" id="role-wali" value="wali" @checked($role === 'wali')>
            <label for="role-wali"><span class="mi" style="width:12px;height:12px">{!! $svg('22cc7d6de9db84dca03408620b686c9e.svg') !!}</span>Siswa/Wali</label>
          </div>
          @error('role')<p class="err">{{ $message }}</p>@enderror
        </div>

        <div class="field">
          <label for="name">Nama Lengkap</label>
          <div class="f @error('name') is-err @enderror">
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Ahmad Fauzi" autocomplete="name" maxlength="255">
            <span class="ico"><img src="{{ $a('0ae260eadc43562c6677610e5bd9fa3c.svg') }}" width="13.3" height="13.3" alt=""></span>
          </div>
          @error('name')<p class="err" role="alert">{{ $message }}</p>@enderror
        </div>

        <div class="field">
          <label for="contact">Email / No. WhatsApp Aktif</label>
          <div class="f @error('contact') is-err @enderror">
            <input type="text" id="contact" name="contact" value="{{ old('contact') }}" placeholder="admin@oneprivate.id atau 08123456789" autocomplete="username" maxlength="255">
            <span class="ico"><img src="{{ $a('b59f78866e0cc931eac5daab5fe85ef4.svg') }}" width="16.7" height="13.3" alt=""></span>
          </div>
          @error('contact')<p class="err" role="alert">{{ $message }}</p>@else<p class="hint">Digunakan untuk verifikasi akun bimbel dan pengiriman notifikasi jadwal.</p>@enderror
        </div>

        <div class="field">
          <label for="password">Kata Sandi / Password</label>
          <div class="f @error('password') is-err @enderror">
            <input type="password" id="password" name="password" placeholder="Minimal 8 karakter kombinasi" autocomplete="new-password">
            <span class="ico"><img src="{{ $a('bb5ce865906b2c69dd9dc0da4cbde852.svg') }}" width="13.3" height="17.5" alt=""></span>
            <button type="button" class="eye" data-eye="password" aria-label="Tampilkan atau sembunyikan kata sandi" aria-pressed="false"><img src="{{ $a('4b9078381f7cbdcd88505a14410e9a26.svg') }}" width="18.3" height="12.5" alt=""></button>
          </div>
          @error('password')<p class="err" role="alert">{{ $message }}</p>@enderror
        </div>

        <div class="field">
          <label for="password_confirmation">Konfirmasi Kata Sandi</label>
          <div class="f">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi" autocomplete="new-password">
            <span class="ico"><img src="{{ $a('e0c4ebcf43583c529bfe40c6bf856899.svg') }}" width="16.7" height="16.7" alt=""></span>
            <button type="button" class="eye" data-eye="password_confirmation" aria-label="Tampilkan atau sembunyikan konfirmasi kata sandi" aria-pressed="false"><img src="{{ $a('cd7dde7640185ede2ba12a4984437701.svg') }}" width="18.3" height="12.5" alt=""></button>
          </div>
        </div>

        <div>
          <div class="agree">
            <input type="checkbox" id="terms" name="terms" value="1" @checked(old('terms'))>
            <label for="terms">Saya menyetujui <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener">Syarat &amp; Ketentuan</a> serta <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener">Kebijakan Privasi</a> bimbingan belajar.</label>
          </div>
          @error('terms')<p class="err" role="alert">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="btn">Daftar Sekarang</button>
      </form>

      <div class="card__foot">
        <p>Sudah memiliki akun?</p>
        <a href="{{ route('login') }}">Masuk ke Dashboard</a>
      </div>
    </section>
  </main>

  <footer class="auth-footer">
    <div class="auth-footer__in">
      <div class="copy">
        <img src="{{ $a('b5efdcbb6f6e6d9bb499618129428473.svg') }}" width="10.7" height="13.3" alt="">
        <span>© 2026 One Private Course Indonesia. Keamanan data terenkripsi.</span>
      </div>
      <nav class="flinks" aria-label="Tautan bawah">
        <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener">Panduan Aplikasi</a><span class="dot">•</span>
        <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener">Kebijakan Privasi</a><span class="dot">•</span>
        <a class="live" href="{{ url('/up') }}" target="_blank" rel="noopener"><i></i>Status Server</a>
      </nav>
    </div>
  </footer>
</div>
<script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>
