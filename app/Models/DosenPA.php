<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPA extends Model
{
    use HasFactory;

    protected $table = 'dosen_pa';

    protected $fillable = [
        'mahasiswa_id',
        'dospem_id',
    ];

    public function krs()
    {
        return $this->hasMany(Krs::class, 'mahasiswa_id', 'mahasiswa_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'dospem_id');
    }
}
