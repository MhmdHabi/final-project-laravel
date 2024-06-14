<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DosenExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = User::select('id', 'nidn', 'name', 'email', 'no_hp', 'gender', 'jabatan', 'alamat')
            ->whereNotNull('nidn')
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
            'Jabatan Akademik',
            'Alamat'
        ];
        return $heading;
    }
}
