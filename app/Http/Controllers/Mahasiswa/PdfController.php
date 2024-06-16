<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DosenPA;
use App\Models\Krs;
use App\Models\MatkulKrs;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil data Dosen PA berdasarkan mahasiswa_id dari user
        $dosen_pa = DosenPA::where('mahasiswa_id', $user->id)->with('dosen')->first();

        // Ambil KRS terbaru dari mahasiswa
        $latestKrs = Krs::where('mahasiswa_id', $user->id)->latest()->first();

        if (!$latestKrs) {
            $krs = collect();
        } else {
            $krs = MatkulKrs::where('krs_id', $latestKrs->id)->get();
        }

        // Hitung total SKS yang diambil
        $totalSKS = $krs->sum('matkul.sks');



        // Data yang akan dikirimkan ke view PDF
        $data = [
            'title' => 'Kartu Rancangan Studi',
            'krs' => $krs,
            'totalSKS' => $totalSKS,
            'name' => $user->name,
            'nim' => $user->nim,
            'jurusan' => $user->jurusan,
            'dosen_pa' => $dosen_pa, // Masukkan $dosen_pa ke dalam data
        ];

        // Load view PDF dan download
        $pdf = PDF::loadView('dashboard.mahasiswa.krs_export_pdf', $data);
        $namaFile = 'kartu_rancangan_studi' . '_' . $user->name . '_' . $user->nim . '.pdf';
        return $pdf->stream($namaFile);
    }
}
