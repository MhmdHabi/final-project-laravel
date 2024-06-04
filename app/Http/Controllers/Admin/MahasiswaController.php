<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.mahasiswa.mahasiswa');
    }
    public function addMahasiswa()
    {
        return view('dashboard.admin.mahasiswa.mahasiswa_add');
    }
    public function editMahasiswa()
    {
        return view('dashboard.admin.mahasiswa.mahasiswa_edit');
    }
    public function detailMahasiswa()
    {
        return view('dashboard.admin.mahasiswa.mahasiswa_detail');
    }
}
