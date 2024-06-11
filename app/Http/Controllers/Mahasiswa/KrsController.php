<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\MatkulKrs;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        $krs = MatkulKrs::all();
        return view('dashboard.mahasiswa.krs', compact('krs'));
    }
}
