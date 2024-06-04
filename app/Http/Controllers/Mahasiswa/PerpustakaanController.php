<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    public function index()
    {
        return view('dashboard.mahasiswa.perpustakaan');
    }

    public function pinjamBuku()
    {
        return view('dashboard.mahasiswa.pinjam_buku');
    }
}
