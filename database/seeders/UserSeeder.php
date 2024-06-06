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

        $mahasiswa = User::create([
            'name' => 'Sisiswa',
            'email' => 'mahasiswa@example.com',
            'password' => Hash::make('mahasiswa'),
            'nim' => 987654321,
            'gender' => 'Laki-Laki',
            'no_hp' => '08123456789',
            'tgl_lahir' => '2000-01-01',
            'agama' => 'Islam',
            'alamat' => 'Alamat Mahasiswa',
            'status_kuliah' => 'Aktif',
        ]);
        $mahasiswa->assignRole($roleMahasiswa);

        $dosen = User::create([
            'name' => 'Pak Dosen',
            'email' => 'dosen@example.com',
            'password' => Hash::make('dosen'),
            'nidn' => 123456789,
            'gender' => 'Laki-Laki',
            'no_hp' => '08123456789',
            'tgl_lahir' => '1980-01-01',
            'agama' => 'Islam',
            'alamat' => 'Alamat Dosen',
            'jabatan' => 'Dosen',
        ]);
        $dosen->assignRole($roleDosen);

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
