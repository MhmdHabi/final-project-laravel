<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\MatkulKrs;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        // dibuat berdasarkan nim dan semester
        $krs = MatkulKrs::all();
        return view('dashboard.mahasiswa.krs', compact('krs'));
    }
}
