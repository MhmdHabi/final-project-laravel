<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TranskipController extends Controller
{
    public function index()
    {
        $mahasiswaId = Auth::user()->id;

        $latestKrs = Krs::where('mahasiswa_id',  $mahasiswaId)->get();

        if ($latestKrs) {
            $transkip = Krs::with('matkulKrs.matkul')
                ->where('mahasiswa_id',  $mahasiswaId)
                ->get();

            $totalSKS = 0;
            $totalNilai = 0;

            foreach ($transkip as $krs) {
                foreach ($krs->matkulKrs as $khsan) {
                    $nilai = $khsan->nilai;
                    $sks = $khsan->matkul->sks;

                    if ($nilai !== null) {
                        $totalSKS += $sks;
                        $totalNilai += $nilai * $sks;
                    }
                }
            }

            if ($totalSKS > 0) {
                $nilai = $totalNilai / $totalSKS;
            } else {
                $nilai = 0;
            }


            $semester = Krs::where('mahasiswa_id',  $mahasiswaId)
                ->latest()
                ->first();

            return view('dashboard.mahasiswa.transkip', [
                'mahasiswa' => Auth::user(),
                'transkip' => $transkip,
                'totalSKS' => $totalSKS,
                'nilai' => $nilai,
                'semester' => $semester,
            ]);
        } else {
            return redirect()->back()->with('error', 'Data transkrip tidak ditemukan.');
        }
    }
}
