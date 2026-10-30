<?php

namespace App\Providers;

use App\Models\LessonSession;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer(['admin.*', 'siswa.*'], function ($view) {
            $nav = ['students' => 0, 'confirm' => 0, 'notif' => 0];
            try {
                if (Auth::check()) {
                    $nav['students'] = Student::where('status', 'aktif')->count();
                    $nav['confirm'] = LessonSession::whereDate('date', '>=', today())->where('status', '!=', 'batal')
                        ->where(fn ($q) => $q->where('tutor_confirmed', false)->orWhere('parent_confirmed', false))->count();
                    $nav['notif'] = $nav['confirm'];
                }
            } catch (\Throwable $e) {
                // abaikan saat tabel belum dimigrasi
            }
            $view->with('nav', $nav);
        });
    }
}
