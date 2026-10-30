<?php

return [
    // Pendaftaran mandiri (/register) harus diaktifkan admin dulu sebelum bisa login.
    // Set REGISTER_REQUIRES_APPROVAL=false di .env bila ingin akun baru langsung aktif.
    'register_requires_approval' => env('REGISTER_REQUIRES_APPROVAL', true),
    'register_max_per_hour'      => (int) env('REGISTER_MAX_PER_HOUR', 5),

    // Batas percobaan login salah per (identitas + IP) sebelum dikunci sementara.
    'login_max_attempts'   => (int) env('LOGIN_MAX_ATTEMPTS', 5),
    'login_lockout_seconds' => (int) env('LOGIN_LOCKOUT_SECONDS', 60),

    // Tombol "Akses Demo Cepat" di halaman login (default: hanya saat APP_ENV=local).
    'show_demo' => env('AUTH_SHOW_DEMO', env('APP_ENV') === 'local'),
];
