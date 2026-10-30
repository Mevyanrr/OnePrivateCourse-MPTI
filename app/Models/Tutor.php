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
}
