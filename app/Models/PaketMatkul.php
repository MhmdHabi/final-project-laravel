<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketMatkul extends Model
{
    use HasFactory;

    public function matkul()
    {
        return $this->belongsToMany(Matkul::class, 'matkul_pakets', 'paket_id', 'matkul_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
