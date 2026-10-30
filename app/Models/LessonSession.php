<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonSession extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['date' => 'date', 'tutor_confirmed' => 'boolean', 'parent_confirmed' => 'boolean'];
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }

    /** Status tampilan: selesai / berjalan / belum (dihitung dari jam bila belum diubah manual). */
    public function liveStatus(): string
    {
        if ($this->status === 'batal') {
            return 'batal';
        }
        if ($this->status === 'selesai') {
            return 'selesai';
        }
        $start = $this->date->copy()->setTimeFromTimeString($this->start_time);
        $end   = $this->date->copy()->setTimeFromTimeString($this->end_time);
        if (now()->gte($end)) {
            return 'selesai';
        }
        if (now()->gte($start)) {
            return 'berjalan';
        }
        return 'belum';
    }

    /** Cek bentrok tutor / siswa pada rentang waktu yang sama. */
    public static function conflicts(int $tutorId, int $studentId, string $date, string $start, string $end, ?int $ignoreId = null)
    {
        return static::with(['student', 'tutor'])
            ->whereDate('date', $date)
            ->where('status', '!=', 'batal')
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->where(fn ($q) => $q->where('tutor_id', $tutorId)->orWhere('student_id', $studentId))
            ->where('start_time', '<', $end)
            ->where('end_time', '>', $start)
            ->get();
    }
}
