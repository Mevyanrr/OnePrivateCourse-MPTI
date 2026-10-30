# One Private Course — Laravel 12 + Supabase (PostgreSQL)

Desain dari Stitch/Figma (HTML) sudah diubah jadi Blade **tanpa mengubah tampilan**, dan semua tombol/form dihubungkan ke database Supabase.

## Struktur Blade
```
resources/views/
├── auth/            login.blade.php, register.blade.php
├── admin/           dashboard, jadwal, jadwal_baru, presensi, pembayaran, konfirmasi, tutor, akun, kuitansi
│   └── siswa/       index, baru, ubah, detail
└── siswa/           (portal siswa / orang tua) beranda, jadwal, presensi, tagihan
```

## Cara menjalankan
1. Butuh PHP >= 8.2 dengan ekstensi `pdo_pgsql`, plus Composer.
2. Install dependency:
   ```bash
   composer install
   ```
3. Buka file `.env`, isi koneksi Supabase (Dashboard > Project Settings > Database > Connection string):
   ```
   DB_CONNECTION=pgsql
   DB_HOST=aws-0-ap-southeast-1.pooler.supabase.com   # atau db.<ref>.supabase.co
   DB_PORT=5432                                       # pakai port 5432 (Session pooler / Direct), BUKAN 6543
   DB_DATABASE=postgres
   DB_USERNAME=postgres.<project-ref>                 # untuk Direct: postgres
   DB_PASSWORD=<password database>
   DB_SSLMODE=require
   ```
   (`APP_KEY` sudah terisi. Kalau perlu baru: `php artisan key:generate`.)
4. Buat tabel + isi data demo ke Supabase:
   ```bash
   php artisan migrate:fresh --seed
   ```
5. Jalankan:
   ```bash
   php artisan serve
   ```
   Buka http://127.0.0.1:8000

## Akun demo (password semua: `password123`)
| Peran | Login | Halaman |
|---|---|---|
| Admin | `admin.jaksel@oneprivate.com` (pilih Admin) | /admin/dashboard |
| Tutor | `rina.tutor@oneprivate.com` (pilih Tutor) | /admin/jadwal |
| Wali murid / siswa | `wali.demo@oneprivate.com` (pilih peran apa saja) | /portal/beranda |

Tombol "Demo Admin / Demo Tutor" di halaman login mengisi form otomatis.
Klik nama/avatar pengguna di header untuk **keluar** (logout).

## Catatan
- Tailwind, font, dan ikon diambil dari CDN (sama seperti desain asli) — butuh internet.
- Zona waktu default `Asia/Jakarta` (`APP_TIMEZONE`).
- Tabel: users, tutors, students, schedule_slots, lesson_sessions, attendances, payments.
