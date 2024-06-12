<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleMahasiswa = Role::firstOrCreate(['name' => 'mahasiswa']);
        $roleDosen = Role::firstOrCreate(['name' => 'dosen']);
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);

        $dosen1 = User::create([
            'name' => 'Pak Dosen 1',
            'email' => 'dosen1@example.com',
            'password' => Hash::make('dosen'),
            'nidn' => 123456789,
            'gender' => 'Laki-Laki',
            'no_hp' => '08123456789',
            'tgl_lahir' => '1980-01-01',
            'agama' => 'Islam',
            'alamat' => 'Alamat Dosen',
            'jabatan' => 'Dosen SI',
        ]);
        $dosen1->assignRole($roleDosen);

        $dosen2 = User::create([
            'name' => 'Pak Dosen 2',
            'email' => 'dosen2@example.com',
            'password' => Hash::make('dosen'),
            'nidn' => 123456788,
            'gender' => 'Laki-Laki',
            'no_hp' => '08123456789',
            'tgl_lahir' => '1980-01-01',
            'agama' => 'Islam',
            'alamat' => 'Alamat Dosen',
            'jabatan' => 'Dosen TI',
        ]);
        $dosen2->assignRole($roleDosen);

        $dosen3 = User::create([
            'name' => 'Bu Dosen 3',
            'email' => 'dosen3@example.com',
            'password' => Hash::make('dosen'),
            'nidn' => 123456787,
            'gender' => 'Perempuan',
            'no_hp' => '08123456789',
            'tgl_lahir' => '1980-01-01',
            'agama' => 'Islam',
            'alamat' => 'Alamat Dosen',
            'jabatan' => 'Dosen TI',
        ]);
        $dosen3->assignRole($roleDosen);

        $mahasiswa1 = User::create([
            'name' => 'Sisiswa 1',
            'email' => 'mahasiswa1@example.com',
            'password' => Hash::make('mahasiswa'),
            'nim' => 987654321,
            'gender' => 'Laki-Laki',
            'no_hp' => '08123456789',
            'tgl_lahir' => '2000-01-01',
            'agama' => 'Islam',
            'alamat' => 'Alamat Mahasiswa',
        ]);
        $mahasiswa5->assignRole($roleMahasiswa);

        $mahasiswa6 = User::create([
            'name' => 'Sisiswa 6',
            'email' => 'mahasiswa6@example.com',
            'password' => Hash::make('mahasiswa'),
            'nim' => 987654326,
            'gender' => 'Laki-Laki',
            'no_hp' => '08123456789',
            'tgl_lahir' => '2000-01-01',
            'agama' => 'Islam',
            'alamat' => 'Alamat Mahasiswa',
            'jurusan' => 'Teknik Informatika',
            'status_kuliah' => 'Aktif',
        ]);
        $mahasiswa6->assignRole($roleMahasiswa);


        $admin = User::create([
            'name' => 'SiAdmin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'username' => 'admin',
            'gender' => 'Laki-Laki',
            'no_hp' => '08123456789',
            'tgl_lahir' => '1990-01-01',
            'agama' => 'Islam',
            'alamat' => 'Alamat Admin',
        ]);
        $admin->assignRole($roleAdmin);
    }
}
