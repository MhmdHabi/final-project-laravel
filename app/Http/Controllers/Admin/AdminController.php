<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.admin.admin');
    }

    public function addAdmin()
    {
        return view('dashboard.admin.admin.admin_add');
    }
    public function editAdmin()
    {
        return view('dashboard.admin.admin.admin_edit');
    }
    public function konfirmasiPembayaran()
    {
        return view('dashboard.admin.admin.konfirmasi_pembayaran');
    }
    public function konfirmasiPerpustakaan()
    {
        return view('dashboard.admin.admin.konfirmasi_perpustakaan');
    }
}
