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

        // Jika permintaan untuk export PDF, maka persiapkan data untuk ditampilkan dalam PDF
        if ($request->get('export') == 'pdf') {
            // Ambil data yang diperlukan untuk PDF
            $data = [
                'krs' => $krs,
                'latestKrs' => $latestKrs,
                'mahasiswaId' => $mahasiswaId,
            ];

            // Load view 'khsmahasiswa.blade.php' dengan data yang diperlukan
            $pdf = Pdf::loadView('dashboard.mahasiswa.pdf.khsmahasiswa', $data);

            // Unduh file PDF dengan nama 'krs.pdf'
            return $pdf->stream('krs.pdf');
        }

        // Jika bukan permintaan untuk export PDF, tampilkan halaman krs.blade.php dengan data krs
        return view('dashboard.mahasiswa.krs', compact('krs'));
    }
}
