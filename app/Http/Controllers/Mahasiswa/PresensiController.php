<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\Matkul;
use App\Models\PresensiDosen;
use App\Models\PresensiMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function index()
    {
        $mahasiswaId = Auth::user()->id;

        $krs = Krs::where('mahasiswa_id', $mahasiswaId)
            ->latest()
            ->first();

        if (!$krs) {
            $mataKuliah = null;
            return view('dashboard.mahasiswa.presensi', compact('mataKuliah'))
                ->with('error', 'Tidak ada data KRS yang tersedia.');
        }

        if ($krs->status !== 'Disetujui') {
            $mataKuliah = null;
            return view('dashboard.mahasiswa.presensi', compact('mataKuliah'))
                ->with('error', 'KRS terbaru belum disetujui.');
        }

        $presensi = PresensiDosen::where('is_open', true)->first();

        $mataKuliah = $krs->matkulKrs()->with('matkul.dosen', 'matkul.presensiDosen')->get();

        return view('dashboard.mahasiswa.presensi', compact('mataKuliah', 'presensi'));
    }

    public function presensiMhs(Request $request)
    {
        $request->validate([
            'matkul_id' => 'required|exists:matkuls,id',
        ]);

        $mahasiswaId = Auth::id();
        $matkul = Matkul::findOrFail($request->matkul_id);

        PresensiMahasiswa::create([
            'matkul_id' => $request->matkul_id,
            'mahasiswa_id' => $mahasiswaId,
            'waktu_absen' => now(),
        ]);

        $message = "Absensi {$matkul->nama_mk} berhasil.";

        return redirect()->back()->with('success', $message);
    }
}
