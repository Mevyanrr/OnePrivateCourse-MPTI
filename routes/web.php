
<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Portal\PortalController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// ======================================================
// 1. AUTHENTICATION
// ======================================================

Route::middleware('guest')->group(function () {

    // Halaman Login
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    // Proses Login
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

    // Halaman Register
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    // Proses Register
    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.post');
});


// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ======================================================
// 2. HOME / HALAMAN UTAMA
// ======================================================

Route::get('/', function () {

    return Auth::check()
        ? redirect(RoleMiddleware::home())
        : redirect()->route('login');

})->name('home');


// ======================================================
// 3. ADMIN
// ======================================================

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        // ----------------------------------------------
        // DASHBOARD
        // ----------------------------------------------

        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])
            ->name('dashboard');


        // ----------------------------------------------
        // DATA SISWA
        // ----------------------------------------------

        Route::get('/siswa', [Admin\StudentController::class, 'index'])
            ->name('siswa');

        Route::get('/siswa/baru', [Admin\StudentController::class, 'create'])
            ->name('siswa.baru');

        Route::post('/siswa', [Admin\StudentController::class, 'store'])
            ->name('siswa.simpan');

        Route::get('/siswa/{student}', [Admin\StudentController::class, 'show'])
            ->whereNumber('student')
            ->name('siswa.show');

        Route::get('/siswa/{student}/ubah', [Admin\StudentController::class, 'edit'])
            ->whereNumber('student')
            ->name('siswa.ubah');

        Route::put('/siswa/{student}', [Admin\StudentController::class, 'update'])
            ->whereNumber('student')
            ->name('siswa.perbarui');

        Route::delete('/siswa/{student}', [Admin\StudentController::class, 'destroy'])
            ->whereNumber('student')
            ->name('siswa.hapus');


        // ----------------------------------------------
        // DATA TUTOR
        // ----------------------------------------------

        Route::get('/tutor', [Admin\TutorController::class, 'index'])
            ->name('tutor');

        Route::post('/tutor', [Admin\TutorController::class, 'store'])
            ->name('tutor.simpan');

        Route::get('/tutor/{tutor}', [Admin\TutorController::class, 'show'])
            ->whereNumber('tutor')
            ->name('tutor.show');

        Route::put('/tutor/{tutor}', [Admin\TutorController::class, 'update'])
            ->whereNumber('tutor')
            ->name('tutor.perbarui');

        Route::delete('/tutor/{tutor}', [Admin\TutorController::class, 'destroy'])
            ->whereNumber('tutor')
            ->name('tutor.hapus');


        // ----------------------------------------------
        // JADWAL LES
        // ----------------------------------------------

        Route::get('/jadwal', [Admin\ScheduleController::class, 'index'])
            ->name('jadwal');

        Route::get('/jadwal/baru', [Admin\ScheduleController::class, 'create'])
            ->name('jadwal.baru');

        Route::post('/jadwal/cek', [Admin\ScheduleController::class, 'cek'])
            ->name('jadwal.cek');

        Route::post('/jadwal', [Admin\ScheduleController::class, 'store'])
            ->name('jadwal.simpan');

        Route::put('/jadwal/{session}', [Admin\ScheduleController::class, 'update'])
            ->whereNumber('session')
            ->name('jadwal.perbarui');

        Route::post('/jadwal/{session}/batal', [Admin\ScheduleController::class, 'cancel'])
            ->whereNumber('session')
            ->name('jadwal.batal');


        // ----------------------------------------------
        // PRESENSI
        // ----------------------------------------------

        Route::get('/presensi', [Admin\AttendanceController::class, 'index'])
            ->name('presensi');

        Route::post('/presensi', [Admin\AttendanceController::class, 'store'])
            ->name('presensi.simpan');


        // ----------------------------------------------
        // PEMBAYARAN
        // ----------------------------------------------

        Route::get('/pembayaran', [Admin\PaymentController::class, 'index'])
            ->name('pembayaran');

        Route::post('/pembayaran/{payment}/lunas', [Admin\PaymentController::class, 'pay'])
            ->whereNumber('payment')
            ->name('pembayaran.lunas');

        Route::get('/pembayaran/{payment}/kuitansi', [Admin\PaymentController::class, 'receipt'])
            ->whereNumber('payment')
            ->name('pembayaran.kuitansi');


        // ----------------------------------------------
        // KONFIRMASI SESI
        // ----------------------------------------------

        Route::get('/konfirmasi', [Admin\ConfirmationController::class, 'index'])
            ->name('konfirmasi');

        Route::post('/konfirmasi/reminder', [Admin\ConfirmationController::class, 'reminder'])
            ->name('konfirmasi.reminder');

        Route::post('/konfirmasi/{session}/tutor', [Admin\ConfirmationController::class, 'tutor'])
            ->whereNumber('session')
            ->name('konfirmasi.tutor');

        Route::post('/konfirmasi/{session}/ortu', [Admin\ConfirmationController::class, 'ortu'])
            ->whereNumber('session')
            ->name('konfirmasi.ortu');


        // ----------------------------------------------
        // EXPORT DATA
        // ----------------------------------------------

        Route::get('/export/{type}', [Admin\ExportController::class, 'csv'])
            ->name('export');

    });


// ======================================================
// 4. AKUN DAN HAK AKSES ADMIN
// ======================================================

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        // Daftar akun
        Route::get('/akun', [Admin\AccountController::class, 'index'])
            ->name('akun');

        // Tambah akun
        Route::post('/akun', [Admin\AccountController::class, 'store'])
            ->name('akun.simpan');

        // Detail akun
        Route::get('/akun/{user}', [Admin\AccountController::class, 'show'])
            ->whereNumber('user')
            ->name('akun.show');

        // Update akun
        Route::put('/akun/{user}', [Admin\AccountController::class, 'update'])
            ->whereNumber('user')
            ->name('akun.perbarui');

        // Hapus akun
        Route::delete('/akun/{user}', [Admin\AccountController::class, 'destroy'])
            ->whereNumber('user')
            ->name('akun.hapus');

        // Reset password
        Route::post('/akun/{user}/reset', [Admin\AccountController::class, 'reset'])
            ->whereNumber('user')
            ->name('akun.reset');

        // Aktif/nonaktif akun
        Route::post('/akun/{user}/toggle', [Admin\AccountController::class, 'toggle'])
            ->whereNumber('user')
            ->name('akun.toggle');

        // Daftar siswa yang terhubung dengan akun wali
        Route::get('/akun/{user}/siswa', [Admin\AccountController::class, 'students'])
            ->whereNumber('user')
            ->name('akun.siswa');

        // Hubungkan akun wali dengan siswa
        Route::post('/akun/{user}/siswa', [Admin\AccountController::class, 'link'])
            ->whereNumber('user')
            ->name('akun.tautkan');

    });


// ======================================================
// 5. PORTAL ORANG TUA / WALI
// ======================================================

Route::prefix('portal')
    ->name('portal.')
    ->middleware(['auth', 'role:wali,admin'])
    ->group(function () {

        // ----------------------------------------------
        // BERANDA
        // ----------------------------------------------

        Route::get('/beranda', [PortalController::class, 'beranda'])
            ->name('beranda');


        // ----------------------------------------------
        // JADWAL LES
        // ----------------------------------------------

        Route::get('/jadwal', [PortalController::class, 'jadwal'])
            ->name('jadwal');


        // ----------------------------------------------
        // PRESENSI
        // ----------------------------------------------

        Route::get('/presensi', [PortalController::class, 'presensi'])
            ->name('presensi');


        // ----------------------------------------------
        // TAGIHAN
        // ----------------------------------------------

        Route::get('/tagihan', [PortalController::class, 'tagihan'])
            ->name('tagihan');


        // ----------------------------------------------
        // KONFIRMASI JADWAL
        // ----------------------------------------------

        Route::post('/jadwal/{session}/konfirmasi', [PortalController::class, 'konfirmasi'])
            ->whereNumber('session')
            ->name('jadwal.konfirmasi');


        // ----------------------------------------------
        // RESCHEDULE JADWAL
        // ----------------------------------------------

        Route::post('/jadwal/{session}/reschedule', [PortalController::class, 'reschedule'])
            ->whereNumber('session')
            ->name('jadwal.reschedule');


        // ----------------------------------------------
        // PENGISIAN PRESENSI
        // ----------------------------------------------

        Route::post('/presensi/{session}', [PortalController::class, 'presensiStore'])
            ->whereNumber('session')
            ->name('presensi.simpan');


        // ----------------------------------------------
        // KUITANSI PEMBAYARAN
        // ----------------------------------------------

        Route::get('/kuitansi/{payment}', [PortalController::class, 'kuitansi'])
            ->whereNumber('payment')
            ->name('kuitansi');

    });
