<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DosenPA;
use App\Models\Krs;
use App\Models\MatkulKrs;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Mengambil dosen pembimbing akademik
        $dosen_pa = DosenPA::where('mahasiswa_id', $user->id)->with('dosen')->first();

        // Mengambil KRS terbaru
        $latestKrs = Krs::where('mahasiswa_id', $user->id)->latest()->first();

        if (!$latestKrs) {
            $krs = collect();
            $semesterId = null; // Default value jika tidak ada KRS
        } else {
            $krs = MatkulKrs::where('krs_id', $latestKrs->id)->get();
            $semesterId = $latestKrs->semester_id; // Ambil semester_id dari KRS terbaru
        }

        // Menghitung total SKS
        $totalSKS = $krs->sum('matkul.sks');

        // Data yang akan dikirim ke view atau PDF
        $data = [
            'title' => 'Kartu Rancangan Studi',
            'krs' => $krs,
            'totalSKS' => $totalSKS,
            'name' => $user->name,
            'nim' => $user->nim,
            'jurusan' => $user->jurusan,
            'dosen_pa' => $dosen_pa,
            'semesterId' => $semesterId, // Tambahkan semester_id dalam data
        ];

        $pdf = Pdf::loadView('dashboard.mahasiswa.krs_export_pdf', $data);
        $namaFile = 'kartu_rancangan_studi' . '_' . $user->name . '_' . $user->nim . '.pdf';
        return $pdf->stream($namaFile);
    }

    public function transkipExport()
    {
        $mahasiswa = Auth::user();
        $transkip = Krs::where('mahasiswa_id', $mahasiswa->id)->with('matkulKrs.matkul')->get();

        $dosen_pa = DosenPA::where('mahasiswa_id', $mahasiswa->id)->with('dosen')->first();

        $totalSKS = $transkip->sum(function ($krs) {
            return $krs->matkulKrs->sum('matkul.sks');
        });

        // Hitung total nilai yang dikalikan dengan SKS
        $totalNilaiKaliSKS = $transkip->sum(function ($krs) {
            return $krs->matkulKrs->sum(function ($matkulKrs) {
                return $matkulKrs->nilai * $matkulKrs->matkul->sks;
            });
        });

        // Hitung IP dengan membagi total nilai kali SKS dengan total SKS
        $nilai = $totalSKS > 0 ? $totalNilaiKaliSKS / $totalSKS : 0;

        $data = [
            'mahasiswa' => $mahasiswa,
            'transkip' => $transkip,
            'totalSKS' => $totalSKS,
            'nilai' => $nilai,
            'dosen_pa' => $dosen_pa,
        ];

        $pdf = Pdf::loadView('dashboard.mahasiswa.transkip_export_pdf', $data);
        return $pdf->stream('transkip_' . $mahasiswa->nim . '.pdf');
    }
}
