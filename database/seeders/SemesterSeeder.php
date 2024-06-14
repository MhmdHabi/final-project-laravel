<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('semesters')->insert([
            ['akademik_id' => 1, 'semester' => 'Ganjil'],
            ['akademik_id' => 1, 'semester' => 'Genap'],
            ['akademik_id' => 2, 'semester' => 'Ganjil'],
            ['akademik_id' => 2, 'semester' => 'Genap'],
            ['akademik_id' => 3, 'semester' => 'Ganjil'],
            ['akademik_id' => 3, 'semester' => 'Genap'],
            ['akademik_id' => 4, 'semester' => 'Ganjil'],
            ['akademik_id' => 4, 'semester' => 'Genap'],
            ['akademik_id' => 5, 'semester' => 'Ganjil'],
            ['akademik_id' => 5, 'semester' => 'Genap'],
            ['akademik_id' => 6, 'semester' => 'Ganjil'],
            ['akademik_id' => 6, 'semester' => 'Genap'],
            ['akademik_id' => 7, 'semester' => 'Ganjil'],
            ['akademik_id' => 7, 'semester' => 'Genap'],
            ['akademik_id' => 8, 'semester' => 'Ganjil'],
            ['akademik_id' => 8, 'semester' => 'Genap'],
        ]);
    }
}
