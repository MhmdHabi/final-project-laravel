<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = User::select('id', 'nim', 'name', 'email', 'no_hp', 'gender', 'alamat', 'jurusan', 'status_kuliah')
            ->whereNotNull('nim')
            ->get();
        return $query;
    }

    public function headings(): array
    {
        $heading = [
            'ID',
            'NIM',
            'Nama',
            'Email',
            'Nomor Hp',
            'Jenis Kelamin',
            'Alamat',
            'Jurusan',
            'Status Kuliah',
        ];
        return $heading;
    }
}
