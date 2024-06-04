<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function loginMahasiswa()
    {
        return view('auth.login_mahasiswa');
    }
    public function loginDosen()
    {
        return view('auth.login_dosen');
    }
    public function loginAdmin()
    {
        return view('auth.login_admin');
    }
}
