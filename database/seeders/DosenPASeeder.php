<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenPASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen_pa')->insert([
            [
                'mahasiswa_id' => 4,
                'dospem_id' => 1,
            ],
            [
                'mahasiswa_id' => 5,
                'dospem_id' => 2,
            ],
            [
                'mahasiswa_id' => 6,
                'dospem_id' => 3,
            ],
            [
                'mahasiswa_id' => 7,
                'dospem_id' => 1,
            ],
            [
                'mahasiswa_id' => 8,
                'dospem_id' => 2,
            ],
            [
                'mahasiswa_id' => 9,
                'dospem_id' => 3,
            ]
        ]);
    }
}
