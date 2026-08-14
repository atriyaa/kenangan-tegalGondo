<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Default
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // 2. Akun User Biasa
        User::updateOrCreate(
            ['email' => 'anggota1@gmail.com'],
            [
                'name' => 'anggota',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ]
        );

        // 3. Data Initial Pengurus/Volunteer
        Member::create([
            'nama' => 'Ivan Nadhif Widyano',
            'jabatan' => 'Ketua Volunteer Desa',
            'deskripsi' => 'Penggerak kegiatan pemuda dan dokumentasi kebudayaan desa.',
            'urutan' => 1,
        ]);
    }
}