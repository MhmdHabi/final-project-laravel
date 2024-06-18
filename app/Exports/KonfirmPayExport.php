<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KonfirmPayExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = Pembayaran::select('id', 'mahasiswa_id', 'nominal', 'rekening_tujuan', 'metode_transfer', 'tanggal_transfer', 'semester', 'status_konfirmasi')
            ->get();
        return $query;
    }

    public function headings(): array
    {
        $heading = [
            'ID',
            'Nama Mahasiswa',
            'Nominal',
            'Rekening',
            'Metode Transfer',
            'Semester',
            'Status Konfirmasi',
        ];
        return $heading;
    }
}
