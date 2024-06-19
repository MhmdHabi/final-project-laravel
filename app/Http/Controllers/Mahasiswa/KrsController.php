<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\MatkulKrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class KrsController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswaId = Auth::user()->id;

        // Mengambil KRS terbaru
        $latestKrs = Krs::where('mahasiswa_id', $mahasiswaId)->latest()->first();

        if (!$latestKrs) {
            $krs = collect();
            $semesterId = null; // Default value jika tidak ada KRS
        } else {
            $krs = MatkulKrs::where('krs_id', $latestKrs->id)->get();
            $semesterId = $latestKrs->semester_id; // Ambil semester_id dari KRS terbaru
        }

        if ($request->get('export') == 'pdf') {
            $data = [
                'krs' => $krs,
                'latestKrs' => $latestKrs,
                'mahasiswaId' => $mahasiswaId,
                'semesterId' => $semesterId, 
            ];

        }

        return view('dashboard.mahasiswa.krs', compact('krs', 'semesterId'));
    }
}
