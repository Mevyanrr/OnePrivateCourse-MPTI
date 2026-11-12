<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function sessions()
    {
        return $this->hasMany(LessonSession::class);
    }

    public function getSubjectListAttribute(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', (string) $this->subjects))));
    }

    /** Jumlah sesi per pekan (pekan berjalan, tidak batal). */
    public function weeklyLoad(): int
    {
        return $this->sessions()
            ->whereBetween('date', [now()->startOfWeek()->toDateString(), now()->endOfWeek()->toDateString()])
            ->where('status', '!=', 'batal')->count();
    }

    protected static function booted(): void
{
    static::saving(function (Tutor $tutor) {
        if (filled($tutor->code)) {
            $tutor->code = trim($tutor->code);
            return;
        }

        // Saat ubah data dan kode dikosongkan: pakai kode lama
        if ($tutor->exists && filled($tutor->getOriginal('code'))) {
            $tutor->code = $tutor->getOriginal('code');
            return;
        }

        // Tutor baru: buat kode otomatis OP-TUT-{tahun}-{urut}
        $prefix = 'OP-TUT-' . now()->year . '-';
        $last   = static::where('code', 'like', $prefix . '%')->max('code');
        $next   = $last ? ((int) substr($last, strlen($prefix))) + 1 : 1;
        $tutor->code = $prefix . str_pad($next, 3, '0', STR_PAD_LEFT);
    });
}
}
