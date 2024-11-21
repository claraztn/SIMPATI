<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\DosenSeeder;
use Database\Seeders\FakultasSeeder;
use Database\Seeders\MahasiswaSeeder;
use Database\Seeders\ProgramStudiSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class, 
            FakultasSeeder::class,
            ProgramStudiSeeder::class,
            DosenSeeder::class,
            MahasiswaSeeder::class,
            RuanganSeeder::class,
            MataKuliahSeeder::class,
            DosenMataKuliahSeeder::class,
            KelasSeeder::class,
            JadwalSeeder::class,
            IRSSeeder::class,
            KHSSeeder::class,
        ]);
    }
}
