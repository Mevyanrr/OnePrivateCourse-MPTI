<?php

namespace App\Services;

use App\Models\LessonSession;
use App\Models\Student;
use Carbon\Carbon;

class SessionGenerator
{
    private const DAY_MAP = ['Minggu' => 0, 'Senin' => 1, 'Selasa' => 2, 'Rabu' => 3, 'Kamis' => 4, 'Jumat' => 5, 'Sabtu' => 6];

    /** Buat sesi untuk beberapa pekan ke depan dari slot mingguan siswa. Mengembalikan [dibuat, dilewati(bentrok)]. */
    public function generate(Student $student, int $weeks = 4): array
    {
        $made = 0;
        $skipped = 0;
        $student->load('slots');
        $no = (int) LessonSession::where('student_id', $student->id)->max('session_no');

        foreach ($student->slots as $slot) {
            $dow = self::DAY_MAP[$slot->day] ?? null;
            if ($dow === null) {
                continue;
            }
            $date = Carbon::today();
            while ($date->dayOfWeek !== $dow) {
                $date->addDay();
            }
            for ($i = 0; $i < $weeks; $i++) {
                $d = $date->copy()->addWeeks($i)->toDateString();
                $tutorId = $slot->tutor_id ?: $student->tutor_id;
                $start = substr((string) $slot->start_time, 0, 5);
                $end = substr((string) $slot->end_time, 0, 5);

                $exists = LessonSession::where('student_id', $student->id)->whereDate('date', $d)->where('start_time', $start . ':00')->exists();
                if ($exists) {
                    continue;
                }
                if ($tutorId && LessonSession::conflicts($tutorId, $student->id, $d, $start, $end)->isNotEmpty()) {
                    $skipped++;
                    continue;
                }
                LessonSession::create([
                    'student_id' => $student->id, 'tutor_id' => $tutorId, 'subject' => $student->program, 'topic' => null,
                    'date' => $d, 'start_time' => $start, 'end_time' => $end, 'method' => $student->method,
                    'location' => $student->method === 'online' ? 'Zoom' : $student->area, 'session_no' => ++$no,
                ]);
                $made++;
            }
        }

        return [$made, $skipped];
    }
}
