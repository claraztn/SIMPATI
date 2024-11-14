<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Clara Zita Nabilla',
            'email' => 'clarazitanabilla@students.undip.ac.id',
            'email_verified_at' => null,
            'password' => Hash::make('clara123'), // Hash the password for security
            'role' => 'mahasiswa',
            'remember_token' => null,
        ]);
    }
}
