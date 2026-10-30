<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $t) {
            $t->id();
            $t->string('code')->nullable()->unique();
            $t->string('name');
            $t->string('email')->nullable()->unique();
            $t->string('phone')->nullable()->unique();
            $t->string('username')->nullable()->unique();
            $t->string('role')->default('admin');      // admin | tutor | wali
            $t->string('role_label')->nullable();      // Super Admin / Admin Keuangan / ...
            $t->string('status')->default('aktif');    // aktif | nonaktif
            $t->string('branch')->default('Tebet');
            $t->timestamp('email_verified_at')->nullable();
            $t->string('password');
            $t->rememberToken();
            $t->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $t) {
            $t->string('email')->primary();
            $t->string('token');
            $t->timestamp('created_at')->nullable();
        });

        Schema::create('tutors', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $t->string('code')->unique();
            $t->string('name');
            $t->string('headline')->nullable();
            $t->string('education')->nullable();
            $t->string('phone')->nullable();
            $t->string('email')->nullable();
            $t->decimal('rating', 2, 1)->default(4.8);
            $t->unsignedInteger('reviews')->default(0);
            $t->text('subjects')->nullable();           // dipisah koma
            $t->string('area')->nullable();
            $t->string('methods')->default('home_visit,online');
            $t->unsignedInteger('max_sessions')->default(20);
            $t->string('status')->default('aktif');
            $t->timestamps();
        });

        Schema::create('students', function (Blueprint $t) {
            $t->id();
            $t->string('code')->unique();
            $t->string('name');
            $t->string('grade');
            $t->string('school')->nullable();
            $t->string('gender')->nullable();
            $t->date('birth_date')->nullable();
            $t->string('phone')->nullable();
            $t->string('guardian_relation')->nullable();
            $t->string('guardian_name')->nullable();
            $t->string('guardian_phone')->nullable();
            $t->string('method')->default('home_visit'); // home_visit | online | studio
            $t->text('address')->nullable();
            $t->string('area')->nullable();
            $t->text('address_note')->nullable();
            $t->string('program')->nullable();
            $t->foreignId('tutor_id')->nullable()->constrained()->nullOnDelete();
            $t->unsignedInteger('duration')->default(90);
            $t->string('package')->nullable();
            $t->string('billing_scheme')->default('monthly'); // monthly | per_session
            $t->unsignedBigInteger('price')->default(0);
            $t->text('goals')->nullable();
            $t->string('status')->default('aktif');
            $t->date('joined_at')->nullable();
            $t->foreignId('parent_user_id')->nullable()->constrained('users')->nullOnDelete();
            $t->timestamps();
        });

        Schema::create('schedule_slots', function (Blueprint $t) {
            $t->id();
            $t->foreignId('student_id')->constrained()->cascadeOnDelete();
            $t->foreignId('tutor_id')->nullable()->constrained()->nullOnDelete();
            $t->string('day');            // Senin..Minggu
            $t->time('start_time');
            $t->time('end_time');
            $t->timestamps();
        });

        Schema::create('lesson_sessions', function (Blueprint $t) {
            $t->id();
            $t->foreignId('student_id')->constrained()->cascadeOnDelete();
            $t->foreignId('tutor_id')->nullable()->constrained()->nullOnDelete();
            $t->string('subject')->nullable();
            $t->string('topic')->nullable();
            $t->date('date');
            $t->time('start_time');
            $t->time('end_time');
            $t->string('method')->default('home_visit');
            $t->string('location')->nullable();
            $t->string('status')->default('terjadwal'); // terjadwal | berjalan | selesai | batal
            $t->boolean('tutor_confirmed')->default(false);
            $t->boolean('parent_confirmed')->default(false);
            $t->unsignedInteger('session_no')->nullable();
            $t->text('notes')->nullable();
            $t->string('reschedule_reason')->nullable();
            $t->timestamps();
            $t->index(['date', 'tutor_id']);
        });

        Schema::create('attendances', function (Blueprint $t) {
            $t->id();
            $t->foreignId('lesson_session_id')->constrained('lesson_sessions')->cascadeOnDelete();
            $t->string('status')->default('belum');   // belum | hadir | izin | sakit
            $t->unsignedTinyInteger('understanding')->nullable();
            $t->text('journal')->nullable();          // catatan tutor
            $t->text('note')->nullable();             // catatan wali
            $t->string('submitted_by')->nullable();
            $t->timestamp('submitted_at')->nullable();
            $t->timestamps();
        });

        Schema::create('payments', function (Blueprint $t) {
            $t->id();
            $t->foreignId('student_id')->constrained()->cascadeOnDelete();
            $t->string('invoice_no')->nullable();
            $t->string('period');                    // contoh: Oktober 2026
            $t->unsignedBigInteger('amount');
            $t->string('status')->default('belum');  // belum | lunas
            $t->string('method')->nullable();
            $t->date('due_date')->nullable();
            $t->date('paid_at')->nullable();
            $t->string('receipt_no')->nullable();
            $t->text('note')->nullable();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        foreach (['payments', 'attendances', 'lesson_sessions', 'schedule_slots', 'students', 'tutors', 'password_reset_tokens', 'users'] as $tbl) {
            Schema::dropIfExists($tbl);
        }
    }
};
