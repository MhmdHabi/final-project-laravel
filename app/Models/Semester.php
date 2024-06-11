<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semesters';

    protected $fillable = [
        'akademik_id',
        'semester'
    ];

    public function paketMatkuls()
    {
        return $this->hasMany(PaketMatkul::class);
    }

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }
}
