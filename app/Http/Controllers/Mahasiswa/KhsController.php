<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\MatkulKrs;
use Illuminate\Http\Request;

class KhsController extends Controller
{
    public function index()
    {
        $khs = MatkulKrs::all();
        $status = Krs::where('status', 'Disetujui')->first();
        if ($status && $status->status === 'Disetujui') {
            return view('dashboard.mahasiswa.khs', compact('khs', 'status'));
        } else {
            return view('dashboard.mahasiswa.khs', compact('khs', 'status'))->with('error', 'Kontrak Matkul belum disetujui.');
        }
    }
}
