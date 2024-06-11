<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulPaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matkul_pakets')->insert([
            ['paket_id' => 1, 'matkul_id' => 1],
            ['paket_id' => 1, 'matkul_id' => 2],
            ['paket_id' => 1, 'matkul_id' => 3],
            ['paket_id' => 1, 'matkul_id' => 4],
            ['paket_id' => 1, 'matkul_id' => 5],
            ['paket_id' => 1, 'matkul_id' => 6],
            ['paket_id' => 1, 'matkul_id' => 7],
            ['paket_id' => 2, 'matkul_id' => 8],
            ['paket_id' => 2, 'matkul_id' => 9],
            ['paket_id' => 2, 'matkul_id' => 10],
            ['paket_id' => 2, 'matkul_id' => 11],
            ['paket_id' => 2, 'matkul_id' => 12],
            ['paket_id' => 2, 'matkul_id' => 13],
            ['paket_id' => 3, 'matkul_id' => 14],
            ['paket_id' => 3, 'matkul_id' => 15],
            ['paket_id' => 3, 'matkul_id' => 16],
            ['paket_id' => 3, 'matkul_id' => 17],
            ['paket_id' => 3, 'matkul_id' => 18],
            ['paket_id' => 3, 'matkul_id' => 19],
            ['paket_id' => 3, 'matkul_id' => 20],
            ['paket_id' => 4, 'matkul_id' => 21],
            ['paket_id' => 4, 'matkul_id' => 22],
            ['paket_id' => 4, 'matkul_id' => 23],
            ['paket_id' => 4, 'matkul_id' => 24],
            ['paket_id' => 4, 'matkul_id' => 35],
            ['paket_id' => 4, 'matkul_id' => 26],
            ['paket_id' => 4, 'matkul_id' => 27],
            ['paket_id' => 4, 'matkul_id' => 28],
            ['paket_id' => 5, 'matkul_id' => 29],
            ['paket_id' => 5, 'matkul_id' => 30],
            ['paket_id' => 5, 'matkul_id' => 31],
            ['paket_id' => 5, 'matkul_id' => 32],
            ['paket_id' => 5, 'matkul_id' => 33],
            ['paket_id' => 5, 'matkul_id' => 34],
            ['paket_id' => 6, 'matkul_id' => 35],
            ['paket_id' => 6, 'matkul_id' => 36],
            ['paket_id' => 6, 'matkul_id' => 37],
            ['paket_id' => 6, 'matkul_id' => 38],
            ['paket_id' => 6, 'matkul_id' => 39],
            ['paket_id' => 6, 'matkul_id' => 40],
            ['paket_id' => 6, 'matkul_id' => 41],
            ['paket_id' => 7, 'matkul_id' => 42],
            ['paket_id' => 7, 'matkul_id' => 43],
            ['paket_id' => 7, 'matkul_id' => 44],
            ['paket_id' => 7, 'matkul_id' => 45],
            ['paket_id' => 7, 'matkul_id' => 46],
            ['paket_id' => 7, 'matkul_id' => 47],
            ['paket_id' => 7, 'matkul_id' => 48],
            ['paket_id' => 7, 'matkul_id' => 49],
            ['paket_id' => 8, 'matkul_id' => 50],
            ['paket_id' => 8, 'matkul_id' => 51],
            ['paket_id' => 8, 'matkul_id' => 52],
            ['paket_id' => 8, 'matkul_id' => 53],
        ]);
    }
}
