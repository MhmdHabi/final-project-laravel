<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktifasiMatkul extends Model
{
    use HasFactory;

    protected $table = 'aktifasi_matkuls';

    protected $fillable = [
        'is_open',
    ];
}
