<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatkulPaket extends Model
{
    use HasFactory;

    protected $table = 'matkul_pakets';

    protected $fillable = [
        'paket_id',
        'matkul_id',
    ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'matkul_id');
    }

    public function paketMatkul()
    {
        return $this->belongsTo(PaketMatkul::class, 'paket_id');
    }
}
