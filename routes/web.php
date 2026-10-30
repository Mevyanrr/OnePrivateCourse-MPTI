<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Portal\PortalController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => Auth::check() ? redirect(RoleMiddleware::home()) : redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/* ===================== PANEL ADMIN / TUTOR ===================== */
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin,tutor'])->group(function () {
    Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // Siswa
    Route::get('siswa', [Admin\StudentController::class, 'index'])->name('siswa');
    Route::get('siswa/baru', [Admin\StudentController::class, 'create'])->name('siswa.baru');
    Route::post('siswa', [Admin\StudentController::class, 'store'])->name('siswa.simpan');
    Route::get('siswa/{student}', [Admin\StudentController::class, 'show'])->name('siswa.show')->whereNumber('student');
    Route::get('siswa/{student}/ubah', [Admin\StudentController::class, 'edit'])->name('siswa.ubah')->whereNumber('student');
    Route::put('siswa/{student}', [Admin\StudentController::class, 'update'])->name('siswa.perbarui')->whereNumber('student');
    Route::delete('siswa/{student}', [Admin\StudentController::class, 'destroy'])->name('siswa.hapus')->whereNumber('student');

    // Tutor
    Route::get('tutor', [Admin\TutorController::class, 'index'])->name('tutor');
    Route::post('tutor', [Admin\TutorController::class, 'store'])->name('tutor.simpan');
    Route::get('tutor/{tutor}', [Admin\TutorController::class, 'show'])->whereNumber('tutor');
    Route::put('tutor/{tutor}', [Admin\TutorController::class, 'update'])->whereNumber('tutor');
    Route::delete('tutor/{tutor}', [Admin\TutorController::class, 'destroy'])->whereNumber('tutor');

    // Jadwal
    Route::get('jadwal', [Admin\ScheduleController::class, 'index'])->name('jadwal');
    Route::get('jadwal/baru', [Admin\ScheduleController::class, 'create'])->name('jadwal.baru');
    Route::post('jadwal/cek', [Admin\ScheduleController::class, 'cek']);
    Route::post('jadwal', [Admin\ScheduleController::class, 'store']);
    Route::put('jadwal/{session}', [Admin\ScheduleController::class, 'update'])->whereNumber('session');
    Route::post('jadwal/{session}/batal', [Admin\ScheduleController::class, 'cancel'])->whereNumber('session');

    // Presensi
    Route::get('presensi', [Admin\AttendanceController::class, 'index'])->name('presensi');
    Route::post('presensi', [Admin\AttendanceController::class, 'store']);

    // Pembayaran
    Route::get('pembayaran', [Admin\PaymentController::class, 'index'])->name('pembayaran');
    Route::post('pembayaran/{payment}/lunas', [Admin\PaymentController::class, 'pay'])->whereNumber('payment');
    Route::get('pembayaran/{payment}/kuitansi', [Admin\PaymentController::class, 'receipt'])->whereNumber('payment');

    // Konfirmasi sesi
    Route::get('konfirmasi', [Admin\ConfirmationController::class, 'index'])->name('konfirmasi');
    Route::post('konfirmasi/reminder', [Admin\ConfirmationController::class, 'reminder']);
    Route::post('konfirmasi/{session}/tutor', [Admin\ConfirmationController::class, 'tutor'])->whereNumber('session');
    Route::post('konfirmasi/{session}/ortu', [Admin\ConfirmationController::class, 'ortu'])->whereNumber('session');

    Route::get('export/{type}', [Admin\ExportController::class, 'csv'])->name('export');
});

// Akun & hak akses: khusus admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('akun', [Admin\AccountController::class, 'index'])->name('akun');
    Route::post('akun', [Admin\AccountController::class, 'store']);
    Route::get('akun/{user}', [Admin\AccountController::class, 'show'])->whereNumber('user');
    Route::put('akun/{user}', [Admin\AccountController::class, 'update'])->whereNumber('user');
    Route::delete('akun/{user}', [Admin\AccountController::class, 'destroy'])->whereNumber('user');
    Route::post('akun/{user}/reset', [Admin\AccountController::class, 'reset'])->whereNumber('user');
    Route::post('akun/{user}/toggle', [Admin\AccountController::class, 'toggle'])->whereNumber('user');
});

/* ===================== PORTAL ORANG TUA / SISWA ===================== */
Route::prefix('portal')->name('portal.')->middleware(['auth', 'role:wali,admin'])->group(function () {
    Route::get('beranda', [PortalController::class, 'beranda'])->name('beranda');
    Route::get('jadwal', [PortalController::class, 'jadwal'])->name('jadwal');
    Route::get('presensi', [PortalController::class, 'presensi'])->name('presensi');
    Route::get('tagihan', [PortalController::class, 'tagihan'])->name('tagihan');
    Route::post('jadwal/{session}/konfirmasi', [PortalController::class, 'konfirmasi'])->whereNumber('session');
    Route::post('jadwal/{session}/reschedule', [PortalController::class, 'reschedule'])->whereNumber('session');
    Route::post('presensi/{session}', [PortalController::class, 'presensiStore'])->whereNumber('session');
    Route::get('kuitansi/{payment}', [PortalController::class, 'kuitansi'])->name('kuitansi')->whereNumber('payment');
});
