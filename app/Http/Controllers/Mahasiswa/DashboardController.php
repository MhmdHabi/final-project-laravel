<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data IP per semester
        $ipData = [
            ['semester' => 'Semester 1', 'ip' => 3.2],
            ['semester' => 'Semester 2', 'ip' => 3.5],
            ['semester' => 'Semester 3', 'ip' => 3.8],
            ['semester' => 'Semester 4', 'ip' => 3.6],
            ['semester' => 'Semester 5', 'ip' => 4]
        ];


        return view('dashboard.mahasiswa.beranda', compact('ipData'));
    }
}
