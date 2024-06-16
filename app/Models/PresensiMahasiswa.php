<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'presensi_mahasiswas';

    protected $fillable = [
        'matkul_id', 'mahasiswa_id', 'waktu_absen'
    ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'matkul_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id', 'id');
    }
}
