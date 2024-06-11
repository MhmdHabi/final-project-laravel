<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatkulKrs extends Model
{
    use HasFactory;

    protected $fillable = [
        'krs_id',
        'matkul_id',
        'status'
    ];

    public function krs()
    {
        return $this->belongsTo(Krs::class, 'krs_id');
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'matkul_id');
    }
}
