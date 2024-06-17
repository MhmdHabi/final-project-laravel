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

        $latestKrs = Krs::where('mahasiswa_id', $mahasiswaId)->latest()->first();

        if (!$latestKrs) {
            $krs = collect();
        } else {
            $krs = MatkulKrs::where('krs_id', $latestKrs->id)->get();
        }
        if ($request->get('export') == 'pdf') {
            $data = [
                'krs' => $krs,
                'latestKrs' => $latestKrs,
                'mahasiswaId' => $mahasiswaId,
            ];

           
            $pdf = Pdf::loadView('dashboard.mahasiswa.pdf.khsmahasiswa', $data);
            return $pdf->stream('krs.pdf');
        }
        return view('dashboard.mahasiswa.krs', compact('krs'));
    }
}
