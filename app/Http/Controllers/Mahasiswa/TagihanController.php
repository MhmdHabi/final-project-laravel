<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function index()
    {
        return view('dashboard.mahasiswa.tagihan');
    }

    public function konfirm_pembayaran()
    {
        return view('dashboard.mahasiswa.konfirmasi_pembayaran');
    }
}
