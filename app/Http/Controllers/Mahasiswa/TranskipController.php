<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TranskipController extends Controller
{
    public function index()
    {
        return view('dashboard.mahasiswa.transkip');
    }
}
