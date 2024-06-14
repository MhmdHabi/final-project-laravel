<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\AktifasiMatkul;
use App\Models\DosenPA;
use App\Models\Krs;
use App\Models\Matkul;
use App\Models\MatkulKrs;
use App\Models\MatkulPaket;
use Illuminate\Http\Request;

class Kontrak_matkulController extends Controller
{
    public function formMatkul()
    {
        $user = auth()->user();

        $status = AktifasiMatkul::first();

        $krsTerakhir = $user->krs()->orderBy('semester_id', 'desc')->first();

        $semesterPaket = $krsTerakhir ? ($krsTerakhir->semester_id + 1) : 1;

        $paket = MatkulPaket::where('paket_id', $semesterPaket)->get();

        return view('dashboard.mahasiswa.kontrak_matkul', compact('paket', 'status', 'semesterPaket'));
    }

    public function submitKRS(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required',
            'status' => 'required',
            'matkul_id' => 'required|array|min:1',
        ]);

        $totalSKS = 0;
        foreach ($request->matkul_id as $matkulId) {
            $matkul = Matkul::find($matkulId);
            $totalSKS += $matkul->sks;
        }

        if ($totalSKS > 24) {
            return redirect()->back()->with('error', 'Total SKS tidak boleh melebihi 24.');
        }

        $user = auth()->user();
        $mahasiswa_id = $user->id;

        $krsTerakhir = $user->krs()->orderBy('semester_id', 'desc')->first();

        $semesterPaket = $krsTerakhir ? ($krsTerakhir->semester_id + 1) : 1;

        $dosenPA = DosenPA::where('mahasiswa_id', $mahasiswa_id)->first();

        if (!$dosenPA) {
            return redirect()->route('mahasiswa.krs')->with('error', 'Dosen pembimbing tidak ditemukan.');
        }

        $krs = Krs::create([
            'mahasiswa_id' => $mahasiswa_id,
            'semester_id' => $semesterPaket,
            'dospem_id' => $dosenPA->id,
            'status' => $request->status,
        ]);


        foreach ($request->matkul_id as $matkulId) {
            MatkulKrs::create([
                'krs_id' => $krs->id,
                'matkul_id' => $matkulId,
                'status' => 'Menunggu'
            ]);
        }


        return redirect()->route('mahasiswa.krs')->with('success', 'KRS berhasil diajukan.');
    }
}
