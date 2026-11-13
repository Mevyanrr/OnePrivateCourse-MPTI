<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaAccountSeeder extends Seeder
{
    /**
     * Membuat akun login siswa untuk Syumaylah (students.id = 2) dan
     * menghubungkannya lewat students.user_id.
     *
     * GANTI password sebelum dipakai di produksi.
     */
    public function run(): void
    {
        $student = DB::table('students')->where('id', 2)->first();
        if (!$student) {
            $this->command?->warn('Siswa id=2 tidak ditemukan, seeder dilewati.');
            return;
        }

        DB::transaction(function () use ($student) {
            $user = DB::table('users')->where('username', 'syumaylah')->first();

            if (!$user) {
                $userId = DB::table('users')->insertGetId([
                    'name'       => $student->name,
                    'username'   => 'syumaylah',
                    'role'       => 'siswa',
                    'role_label' => 'Siswa',
                    'status'     => 'aktif',
                    'code'       => 'SSW-' . str_pad((string) $student->id, 5, '0', STR_PAD_LEFT),
                    'password'   => Hash::make('GantiPasswordIni123'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                $userId = $user->id;
            }

            DB::table('students')->where('id', $student->id)->update(['user_id' => $userId]);
        });
    }
}
