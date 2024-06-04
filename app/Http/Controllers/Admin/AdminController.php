<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function konfirmasiPembayaran()
    {
        return view('dashboard.admin.admin.konfirmasi_pembayaran');
    }
    public function konfirmasiPerpustakaan()
    {
        return view('dashboard.admin.admin.konfirmasi_perpustakaan');
    }
}
