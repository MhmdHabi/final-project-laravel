<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'semester_id',
        'dospem_id',
        'status',
        'ipk',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function matkul()
    {
        return $this->belongsToMany(Matkul::class, 'matkul_krs', 'krs_id', 'matkul_id');
    }

    public function dosenPA()
    {
        return $this->belongsTo(DosenPA::class, 'mahasiswa_id', 'mahasiswa_id');
    }
}
