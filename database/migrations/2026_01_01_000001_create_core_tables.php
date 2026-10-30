```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel tutor
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
            $t->text('subjects')->nullable();
            $t->string('area')->nullable();
            $t->string('methods')->default('home_visit,online');
            $t->unsignedInteger('max_sessions')->default(20);
            $t->string('status')->default('aktif');
            $t->timestamps();
        });

        // Tabel siswa
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
            $t->string('method')->default('home_visit');
            $t->text('address')->nullable();
            $t->string('area')->nullable();
            $t->text('address_note')->nullable();
            $t->string('program')->nullable();
            $t->foreignId('tutor_id')->nullable()->constrained()->nullOnDelete();
            $t->unsignedInteger('duration')->default(90);
            $t->string('package')->nullable();
            $t->string('billing_scheme')->default('monthly');
            $t->unsignedBigInteger('price')->default(0);
            $t->text('goals')->nullable();
            $t->string('status')->default('aktif');
            $t->date('joined_at')->nullable();
            $t->foreignId('parent_user_id')->nullable()->constrained('users')->nullOnDelete();
            $t->timestamps();
        });

        // Tabel jadwal
        Schema::create('schedule_slots', function (Blueprint $t) {
            $t->id();
            $t->foreignId('student_id')->constrained()->cascadeOnDelete();
            $t->foreignId('tutor_id')->nullable()->constrained()->nullOnDelete();
            $t->string('day');
            $t->time('start_time');
            $t->time('end_time');
            $t->timestamps();
        });

        // Tabel sesi pembelajaran
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
            $t->string('status')->default('terjadwal');
            $t->boolean('tutor_confirmed')->default(false);
            $t->boolean('parent_confirmed')->default(false);
            $t->unsignedInteger('session_no')->nullable();
            $t->text('notes')->nullable();
            $t->string('reschedule_reason')->nullable();
            $t->timestamps();
            $t->index(['date', 'tutor_id']);
        });

        // Tabel absensi
        Schema::create('attendances', function (Blueprint $t) {
            $t->id();
            $t->foreignId('lesson_session_id')
                ->constrained('lesson_sessions')
                ->cascadeOnDelete();
            $t->string('status')->default('belum');
            $t->unsignedTinyInteger('understanding')->nullable();
            $t->text('journal')->nullable();
            $t->text('note')->nullable();
            $t->string('submitted_by')->nullable();
            $t->timestamp('submitted_at')->nullable();
            $t->timestamps();
        });

        // Tabel pembayaran
        Schema::create('payments', function (Blueprint $t) {
            $t->id();
            $t->foreignId('student_id')->constrained()->cascadeOnDelete();
            $t->string('invoice_no')->nullable();
            $t->string('period');
            $t->unsignedBigInteger('amount');
            $t->string('status')->default('belum');
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
        Schema::dropIfExists('payments');
        Schema::dropIfExists('attendances');
        Schema::dropIfExists('lesson_sessions');
        Schema::dropIfExists('schedule_slots');
        Schema::dropIfExists('students');
        Schema::dropIfExists('tutors');
    }
};
