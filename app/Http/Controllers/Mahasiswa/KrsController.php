<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\MatkulKrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KrsController extends Controller
{
    public function index()
    {
        $mahasiswaId = Auth::user()->id;

        $latestKrs = Krs::where('mahasiswa_id', $mahasiswaId)->latest()->first();

        if (!$latestKrs) {
            $krs = collect();
        } else {
            $krs = MatkulKrs::where('krs_id', $latestKrs->id)->get();
        }

        return view('dashboard.mahasiswa.krs', compact('krs'));
    }
}
