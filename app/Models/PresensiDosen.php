<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiDosen extends Model
{
    use HasFactory;

    protected $table = 'presensi_dosens';

    protected $fillable = ['matkul_id', 'is_open'];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'matkul_id', 'id');
    }
}
