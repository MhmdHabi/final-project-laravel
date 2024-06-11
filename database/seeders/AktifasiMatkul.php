<?php

namespace Database\Seeders;

use App\Models\AktifasiMatkul as ModelsAktifasiMatkul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AktifasiMatkul extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsAktifasiMatkul::create([
            'is_open' => false
        ]);
    }
}
