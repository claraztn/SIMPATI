<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'student01',
            'email' => 'student01@example.com',
            'password' => Hash::make('password123'),
            'role' => 'Mahasiswa', 
        ]);

        User::create([
            'username' => 'lecturer01',
            'email' => 'lecturer01@example.com',
            'password' => Hash::make('password123'),
            'role' => 'Dosen',
        ]);

        User::create([
            'username' => 'lecturer02',
            'email' => 'lecturer02@example.com',
            'password' => Hash::make('password123'),
            'role' => 'Dosen',
        ]);

        User::create([
            'username' => 'lecturer03',
            'email' => 'lecturer03@example.com',
            'password' => Hash::make('password123'),
            'role' => 'Dosen',
        ]);

        User::create([
            'username' => 'academic01',
            'email' => 'academic01@example.com',
            'password' => Hash::make('password123'),
            'role' => 'BagianAkademik',
        ]);

        // Add more users as needed
    }
}
