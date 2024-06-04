<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        return view('dashboard.dosen.profil');
    }
}
