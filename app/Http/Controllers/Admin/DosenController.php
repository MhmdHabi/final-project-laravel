<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.dosen.dosen');
    }
    public function addDosen()
    {
        return view('dashboard.admin.dosen.dosen_add');
    }
    public function editDosen()
    {
        return view('dashboard.admin.dosen.dosen_edit');
    }
    public function detailDosen()
    {
        return view('dashboard.admin.dosen.dosen_detail');
    }
}
