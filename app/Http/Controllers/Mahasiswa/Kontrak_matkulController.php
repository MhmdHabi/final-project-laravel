<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\AktifasiMatkul;
use App\Models\DosenPA;
use App\Models\Krs;
use App\Models\Matkul;
use App\Models\MatkulKrs;
use App\Models\MatkulPaket;
use App\Models\Semester;
use Illuminate\Http\Request;

class Kontrak_matkulController extends Controller
{
    public function formMatkul()
    {
        $status = AktifasiMatkul::first();
        $paket = MatkulPaket::get();

        return view('dashboard.mahasiswa.kontrak_matkul', compact('paket', 'status'));
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

        $currentSemester = Semester::orderBy('id', 'desc')->first();

        if (!$currentSemester) {
            $newAkademikId = 1;
        } else {
            if ($currentSemester->semester === 'Ganjil') {
                $newAkademikId = $currentSemester->akademik_id + 1;
                $newSemesterType = 'Genap';
            } else {
                $newAkademikId = $currentSemester->akademik_id;
                $newSemesterType = 'Ganjil';
            }
        }

        $newSemester = Semester::create([
            'akademik_id' => $newAkademikId,
            'semester' => $newSemesterType ?? 'Ganjil'
        ]);

        $mahasiswa_id = auth()->user()->id;

        $dosenPA = DosenPA::where('mahasiswa_id', $mahasiswa_id)->first();

        if (!$dosenPA) {
            return redirect()->route('mahasiswa.krs')->with('error', 'Dosen pembimbing tidak ditemukan.');
        }

        $krs = Krs::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $newSemester->id,
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
