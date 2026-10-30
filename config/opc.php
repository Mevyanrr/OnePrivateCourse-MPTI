<?php

return [
    // Pendaftaran mandiri (/register): false = akun langsung aktif & masuk dashboard.
    // Set REGISTER_REQUIRES_APPROVAL=true di .env bila akun baru harus diaktifkan admin dulu
    // (sangat disarankan di production karena pilihan "Admin / Staf" terbuka untuk umum).
    'register_requires_approval' => env('REGISTER_REQUIRES_APPROVAL', false),
    'register_max_per_hour'      => (int) env('REGISTER_MAX_PER_HOUR', 5),

    // Batas percobaan login salah per (identitas + IP) sebelum dikunci sementara.
    'login_max_attempts'    => (int) env('LOGIN_MAX_ATTEMPTS', 5),
    'login_lockout_seconds' => (int) env('LOGIN_LOCKOUT_SECONDS', 60),

    // Tombol "Akses Demo Cepat" di halaman login (default: hanya saat APP_ENV=local).
    'show_demo' => env('AUTH_SHOW_DEMO', env('APP_ENV') === 'local'),

    // Nomor WhatsApp admin cabang (format internasional tanpa +).
    'whatsapp' => env('OPC_WHATSAPP', '6281198760001'),
];
