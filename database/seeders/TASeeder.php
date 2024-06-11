<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tahun_akademiks')->insert([
            ['tahun_akademik' => '2020/2021'],
            ['tahun_akademik' => '2021/2022'],
            ['tahun_akademik' => '2022/2023'],
            ['tahun_akademik' => '2023/2024'],
            ['tahun_akademik' => '2024/2025'],
            ['tahun_akademik' => '2025/2026'],
            ['tahun_akademik' => '2026/2027'],
            ['tahun_akademik' => '2027/2028'],
            ['tahun_akademik' => '2028/2029'],
            ['tahun_akademik' => '2029/2030'],
            ['tahun_akademik' => '2030/2031'],
            ['tahun_akademik' => '2031/2032'],
            ['tahun_akademik' => '2032/2033'],
            ['tahun_akademik' => '2033/2034'],
            ['tahun_akademik' => '2034/2035'],
            ['tahun_akademik' => '2035/2036'],
            ['tahun_akademik' => '2036/2037'],
            ['tahun_akademik' => '2037/2038'],
            ['tahun_akademik' => '2038/2039'],
            ['tahun_akademik' => '2039/2040'],
        ]);
    }
}
