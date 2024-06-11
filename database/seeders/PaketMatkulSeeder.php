<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketMatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('paket_matkuls')->insert([
            ['nama_paket' => 'Paket Semester 1'],
            ['nama_paket' => 'Paket Semester 2'],
            ['nama_paket' => 'Paket Semester 3'],
            ['nama_paket' => 'Paket Semester 4'],
            ['nama_paket' => 'Paket Semester 5'],
            ['nama_paket' => 'Paket Semester 6'],
            ['nama_paket' => 'Paket Semester 7'],
            ['nama_paket' => 'Paket Semester 8'],
        ]);
    }
}
