<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Hubungkan siswa ke akun login (role 'siswa')
        if (!Schema::hasColumn('students', 'user_id')) {
            Schema::table('students', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->unique()
                    ->constrained('users')->nullOnDelete();
            });
        }

        // Konfirmasi dari sisi siswa
        if (!Schema::hasColumn('lesson_sessions', 'student_confirmed')) {
            Schema::table('lesson_sessions', function (Blueprint $table) {
                $table->boolean('student_confirmed')->default(false);
            });
        }

        // Pengajuan ganti waktu (menunggu persetujuan admin/tutor)
        if (!Schema::hasTable('reschedule_requests')) {
            Schema::create('reschedule_requests', function (Blueprint $table) {
                $table->id();
                $table->foreignId('lesson_session_id')->constrained('lesson_sessions')->cascadeOnDelete();
                $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
                $table->foreignId('requested_by')->constrained('users');
                $table->date('requested_date');
                $table->time('requested_start');
                $table->time('requested_end');
                $table->text('reason')->nullable();
                $table->string('status', 20)->default('menunggu'); // menunggu | disetujui | ditolak
                $table->timestamps();

                $table->index('lesson_session_id');
            });
        }

        Schema::table('lesson_sessions', function (Blueprint $table) {
            $table->index(['student_id', 'date'], 'lesson_sessions_student_date_idx');
        });
    }

    public function down(): void
    {
        Schema::table('lesson_sessions', function (Blueprint $table) {
            $table->dropIndex('lesson_sessions_student_date_idx');
        });
        Schema::dropIfExists('reschedule_requests');

        if (Schema::hasColumn('lesson_sessions', 'student_confirmed')) {
            Schema::table('lesson_sessions', fn (Blueprint $t) => $t->dropColumn('student_confirmed'));
        }
        if (Schema::hasColumn('students', 'user_id')) {
            Schema::table('students', function (Blueprint $t) {
                $t->dropConstrainedForeignId('user_id');
            });
        }
    }
};
