<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $table = 'matkuls';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'status',
        'kelas',
        'jadwal',
        'ruangan',
        'dosen_id'
    ];

    public function paketMatkul()
    {
        return $this->belongsToMany(PaketMatkul::class, 'matkul_pakets', 'matkul_id', 'paket_id');
    }

    public function krs()
    {
        return $this->belongsToMany(Krs::class, 'matkul_krs', 'matkul_id', 'krs_id');
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    public function krsan()
    {
        return $this->hasMany(Krs::class, 'matkul_id');
    }

    public function presensiDosen()
    {
        return $this->hasOne(PresensiDosen::class);
    }

    public function presensiMahasiswa()
    {
        return $this->hasMany(PresensiMahasiswa::class);
    }

    public function matkulKrs()
    {
        return $this->hasMany(MatkulKrs::class);
    }
}
