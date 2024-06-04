<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalController extends Controller
{
    public function index()
    {
        return view('dashboard.dosen.jadwal_mengajar');
    }
}
