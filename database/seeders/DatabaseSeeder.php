<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CreateRole::class,
            UserSeeder::class,
            BookSeeder::class,
            AktifasiMatkul::class,
            MatkulSeeder::class,
            TASeeder::class,
            PaketMatkulSeeder::class,
            MatkulPaketSeeder::class,
            DosenPASeeder::class
        ]);
    }
}
