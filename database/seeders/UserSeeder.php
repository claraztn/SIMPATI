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
            'username' => 'Widiawati Sihaloho',
            'email' => 'widiasihaloho@students.undip.ac.id',
            'password' => Hash::make('widia'),
            'role' => 'Mahasiswa',
        ]);

        User::create([
            'username' => 'Kusworo Adi',
            'email' => 'kusworoadi@lecturer.undip.ac.id',
            'password' => Hash::make('kusworo'),
            'role' => 'Dosen',
        ]);

        User::create([ 
            'username' => 'Aris Sugiharto',
            'email' => 'arissugiharto@lecturer.undip.ac.id',
            'password' => Hash::make('aris'),
            'role' => 'Dosen',
        ]);

        User::create([
            'username' => 'Sutikno',
            'email' => 'sutikno@lecturer.undip.ac.id',
            'password' => Hash::make('sutikno'),
            'role' => 'Dosen',
        ]);

        User::create([
            'username' => 'Beny',
            'email' => 'beny@academic.undip.ac.id',
            'password' => Hash::make('beny'),
            'role' => 'BagianAkademik',
        ]);
    }
}