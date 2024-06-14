<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Matkul;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $dosen = Auth::user()->id;

        $jadwal = Matkul::where('dosen_id', $dosen)->get();

        return view('dashboard.dosen.jadwal_mengajar', compact('jadwal'));
    }
}
