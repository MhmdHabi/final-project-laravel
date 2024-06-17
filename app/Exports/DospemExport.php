<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DospemExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = User::select('id', 'nidn', 'name', 'email', 'jabatan')
            ->whereNotNull('nidn')
            ->get();
        return $query;
    }

    public function headings(): array
    {
        $heading = [
            'ID',
            'NIDN',
            'Nama',
            'Email',
            'Nomor Hp',
            'Jabatan Akademik',
        ];
        return $heading;
    }
}
