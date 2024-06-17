<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\MatkulKrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class KhsController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswaId = Auth::user()->id;

        $status = Krs::where('mahasiswa_id', $mahasiswaId)
            ->where('status', 'Disetujui')
            ->latest()
            ->first();

        if ($status && $status->status === 'Disetujui') {
            $latestKhs = Krs::where('mahasiswa_id', $mahasiswaId)
                ->latest()
                ->first();

            if ($latestKhs) {
                $khs = MatkulKrs::where('krs_id', $latestKhs->id)->get();

                $ipk = 0;
                $totalNilai = 0;
                $totalSKS = 0;

                $khs->each(function ($khsan) use (&$totalNilai, &$totalSKS) {
                    $nilai = $khsan->nilai;
                    if ($nilai !== null) {
                        if ($nilai >= 3.75 && $nilai <= 4.00) {
                            $khsan->grade = 'A';
                        } elseif ($nilai >= 3.50 && $nilai < 3.75) {
                            $khsan->grade = 'A-';
                        } elseif ($nilai >= 3.00 && $nilai < 3.50) {
                            $khsan->grade = 'B+';
                        } elseif ($nilai >= 2.75 && $nilai < 3.00) {
                            $khsan->grade = 'B';
                        } elseif ($nilai >= 2.50 && $nilai < 2.75) {
                            $khsan->grade = 'B-';
                        } elseif ($nilai >= 2.00 && $nilai < 2.50) {
                            $khsan->grade = 'C';
                        } elseif ($nilai >= 1.50 && $nilai < 2.00) {
                            $khsan->grade = 'D';
                        } else {
                            $khsan->grade = 'E';
                        }

                        $totalNilai += $nilai * $khsan->matkul->sks;
                        $totalSKS += $khsan->matkul->sks;
                    } else {
                        $khsan->grade = null;
                    }
                });

                if ($totalSKS > 0) {
                    $ipk = $totalNilai / $totalSKS;
                }

                if ($request->get('export') == 'pdf') {
                    $data = [
                        'khs' => $khs,
                        'status' => $status,
                        'ipk' => $ipk,
                    ];

                    $pdf = Pdf::loadView('dashboard.mahasiswa.pdf.khsmahasiswa', $data);
                    return $pdf->stream('KHS_Mahasiswa.pdf');
                }

                return view('dashboard.mahasiswa.khs', compact('khs', 'status', 'ipk'));
            }
        } else {
            return view('dashboard.mahasiswa.khs', compact('status'))
                ->with('error', 'Kontrak Matkul belum disetujui.');
        }
    }

    public function pdf(Request $request)
    {
        return redirect()->route('mahasiswa.khs.index', ['export' => 'pdf']);
    }
}
