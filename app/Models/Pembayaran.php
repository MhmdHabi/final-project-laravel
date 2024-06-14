<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'tagihan',
        'jenis_tagihan',
        'metode_transfer',
        'rekening_tujuan',
        'tanggal_transfer',
        'nominal',
        'deskripsi',
        'tahun_ajaran',
        'bukti_pembayaran',
        'status_pembayaran',
        'status_konfirmasi',
    ];

    // Relasi dengan model Mahasiswa (jika menggunakan)
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }
}
