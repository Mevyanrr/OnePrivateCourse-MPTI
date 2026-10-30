<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['birth_date' => 'date', 'joined_at' => 'date'];
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_user_id');
    }

    public function sessions()
    {
        return $this->hasMany(LessonSession::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function slots()
    {
        return $this->hasMany(ScheduleSlot::class);
    }
}
