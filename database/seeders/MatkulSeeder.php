<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matkuls')->insert([
            ['kode_mk' => 'IF101', 'nama_mk' => 'Pengantar Teknik Informatika', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '101', 'dosen_id' => 1, 'jadwal' => '2024-08-01 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF102', 'nama_mk' => 'Algoritma dan Pemrograman', 'sks' => 4, 'kelas' => 'A', 'ruangan' => '102', 'dosen_id' => 2, 'jadwal' => '2024-08-01 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF103', 'nama_mk' => 'Struktur Data', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '103', 'dosen_id' => 3, 'jadwal' => '2024-08-02 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF104', 'nama_mk' => 'Basis Data', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '104', 'dosen_id' => 1, 'jadwal' => '2024-08-02 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF105', 'nama_mk' => 'Jaringan Komputer', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '105', 'dosen_id' => 2, 'jadwal' => '2024-08-03 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF106', 'nama_mk' => 'Sistem Operasi', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '106', 'dosen_id' => 3, 'jadwal' => '2024-08-03 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF107', 'nama_mk' => 'Pemrograman Web', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '107', 'dosen_id' => 1, 'jadwal' => '2024-08-04 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF108', 'nama_mk' => 'Kecerdasan Buatan', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '108', 'dosen_id' => 2, 'jadwal' => '2024-08-04 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF109', 'nama_mk' => 'Pemrograman Berbasis Objek', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '109', 'dosen_id' => 3, 'jadwal' => '2024-08-05 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF110', 'nama_mk' => 'Interaksi Manusia dan Komputer', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '110', 'dosen_id' => 1, 'jadwal' => '2024-08-05 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF111', 'nama_mk' => 'Keamanan Komputer', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '111', 'dosen_id' => 2, 'jadwal' => '2024-08-06 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF112', 'nama_mk' => 'Rekayasa Perangkat Lunak', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '112', 'dosen_id' => 3, 'jadwal' => '2024-08-06 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF113', 'nama_mk' => 'Grafika Komputer', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '113', 'dosen_id' => 1, 'jadwal' => '2024-08-07 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF114', 'nama_mk' => 'Pemrograman Mobile', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '114', 'dosen_id' => 2, 'jadwal' => '2024-08-07 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF115', 'nama_mk' => 'Sistem Informasi', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '115', 'dosen_id' => 3, 'jadwal' => '2024-08-08 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF116', 'nama_mk' => 'Manajemen Proyek TI', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '116', 'dosen_id' => 1, 'jadwal' => '2024-08-08 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF117', 'nama_mk' => 'Big Data', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '117', 'dosen_id' => 2, 'jadwal' => '2024-08-09 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF118', 'nama_mk' => 'Pemrograman Jaringan', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '118', 'dosen_id' => 3, 'jadwal' => '2024-08-09 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF119', 'nama_mk' => 'Analisis dan Desain Sistem', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '119', 'dosen_id' => 1, 'jadwal' => '2024-08-10 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF120', 'nama_mk' => 'Etika Profesi TI', 'sks' => 2, 'kelas' => 'A', 'ruangan' => '120', 'dosen_id' => 2, 'jadwal' => '2024-08-10 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF121', 'nama_mk' => 'Machine Learning', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '121', 'dosen_id' => 3, 'jadwal' => '2024-08-11 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF122', 'nama_mk' => 'Cloud Computing', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '122', 'dosen_id' => 1, 'jadwal' => '2024-08-11 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF123', 'nama_mk' => 'Blockchain Technology', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '123', 'dosen_id' => 2, 'jadwal' => '2024-08-12 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF124', 'nama_mk' => 'Cybersecurity', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '124', 'dosen_id' => 3, 'jadwal' => '2024-08-12 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF125', 'nama_mk' => 'Internet of Things', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '125', 'dosen_id' => 1, 'jadwal' => '2024-08-13 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF126', 'nama_mk' => 'Quantum Computing', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '126', 'dosen_id' => 2, 'jadwal' => '2024-08-13 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF127', 'nama_mk' => 'Data Science', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '127', 'dosen_id' => 3, 'jadwal' => '2024-08-14 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF128', 'nama_mk' => 'Deep Learning', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '128', 'dosen_id' => 1, 'jadwal' => '2024-08-14 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF129', 'nama_mk' => 'Software Architecture', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '129', 'dosen_id' => 2, 'jadwal' => '2024-08-15 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF130', 'nama_mk' => 'Natural Language Processing', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '130', 'dosen_id' => 3, 'jadwal' => '2024-08-15 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF131', 'nama_mk' => 'Computer Vision', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '131', 'dosen_id' => 1, 'jadwal' => '2024-08-16 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF132', 'nama_mk' => 'Augmented Reality', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '132', 'dosen_id' => 2, 'jadwal' => '2024-08-16 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF133', 'nama_mk' => 'Game Development', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '133', 'dosen_id' => 3, 'jadwal' => '2024-08-17 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF134', 'nama_mk' => 'Digital Forensics', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '134', 'dosen_id' => 1, 'jadwal' => '2024-08-17 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF135', 'nama_mk' => 'Parallel Computing', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '135', 'dosen_id' => 2, 'jadwal' => '2024-08-18 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF136', 'nama_mk' => 'Distributed Systems', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '136', 'dosen_id' => 3, 'jadwal' => '2024-08-18 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF137', 'nama_mk' => 'Robotics', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '137', 'dosen_id' => 1, 'jadwal' => '2024-08-19 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF138', 'nama_mk' => 'Computational Geometry', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '138', 'dosen_id' => 2, 'jadwal' => '2024-08-19 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF139', 'nama_mk' => 'Bioinformatics', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '139', 'dosen_id' => 3, 'jadwal' => '2024-08-20 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF140', 'nama_mk' => 'Information Retrieval', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '140', 'dosen_id' => 1, 'jadwal' => '2024-08-20 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF020', 'nama_mk' => 'KKN', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '002', 'dosen_id' => 2, 'jadwal' => '2024-08-20 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF141', 'nama_mk' => 'Natural Language Understanding', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '141', 'dosen_id' => 3, 'jadwal' => '2024-08-21 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF142', 'nama_mk' => 'Computational Neuroscience', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '142', 'dosen_id' => 1, 'jadwal' => '2024-08-21 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF143', 'nama_mk' => 'Humanoid Robotics', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '143', 'dosen_id' => 2, 'jadwal' => '2024-08-22 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF144', 'nama_mk' => 'Cloud Security', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '144', 'dosen_id' => 3, 'jadwal' => '2024-08-22 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF145', 'nama_mk' => 'Information Visualization', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '145', 'dosen_id' => 1, 'jadwal' => '2024-08-23 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF146', 'nama_mk' => 'Cyber-Physical Systems', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '146', 'dosen_id' => 2, 'jadwal' => '2024-08-23 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF147', 'nama_mk' => 'Fuzzy Logic', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '147', 'dosen_id' => 3, 'jadwal' => '2024-08-24 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF010', 'nama_mk' => 'Magang', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '001', 'dosen_id' => 1, 'jadwal' => '2024-08-19 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF148', 'nama_mk' => 'Evolutionary Computing', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '148', 'dosen_id' => 2, 'jadwal' => '2024-08-24 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF149', 'nama_mk' => 'Geographic Information Systems', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '149', 'dosen_id' => 3, 'jadwal' => '2024-08-25 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF150', 'nama_mk' => 'Embedded Systems', 'sks' => 3, 'kelas' => 'A', 'ruangan' => '150', 'dosen_id' => 4, 'jadwal' => '2024-08-25 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['kode_mk' => 'IF030', 'nama_mk' => 'Skripsi', 'sks' => 4, 'kelas' => 'A', 'ruangan' => '003', 'dosen_id' => 2, 'jadwal' => '2024-08-20 11:00:00', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
