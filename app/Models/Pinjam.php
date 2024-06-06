<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    protected $table = 'pinjams';

    protected $fillable = [
        'mahasiswa_id',
        'buku_id',
        'waktu_peminjaman',
        'status',
        'waktu_pengembalian'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
