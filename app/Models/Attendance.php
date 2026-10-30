<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['submitted_at' => 'datetime'];
    }

    public function session()
    {
        return $this->belongsTo(LessonSession::class, 'lesson_session_id');
    }
}
