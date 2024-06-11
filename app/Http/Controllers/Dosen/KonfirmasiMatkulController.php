<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\MatkulKrs;
use Illuminate\Support\Facades\Auth;

class KonfirmasiMatkulController extends Controller
{

    public function index()
    {
        $dospem_id = Auth::user()->id;

        $krsList = Krs::whereHas('dosenPA', function ($query) use ($dospem_id) {
            $query->where('dospem_id', $dospem_id);
        })->orderByRaw("status = 'Menunggu' DESC")->get();

        return view('dashboard.dosen.konfirmasi_krs', compact('krsList'));
    }

    public function konfirmasi($id)
    {
        $matkulKrs = MatkulKrs::where('krs_id', $id)->get();
        $dospem = Krs::findOrFail($id);

        if ($matkulKrs->isEmpty()) {
            return redirect()->route('dosen.konfirmasi_krs')->with('error', 'Tidak ada KRS yang perlu dikonfirmasi.');
        }

        $krs = $matkulKrs->first()->krs;

        $menunggu = $matkulKrs->contains(function ($matkulKrs) {
            return $matkulKrs->status === 'Menunggu';
        });

        $disetujui = $matkulKrs->every(function ($matkulKrs) {
            return $matkulKrs->status === 'Disetujui';
        });

        $ditolak = $matkulKrs->every(function ($matkulKrs) {
            return $matkulKrs->status === 'Ditolak';
        });

        if ($menunggu) {
            $krs->status = 'Menunggu';
        } elseif ($disetujui) {
            $krs->status = 'Disetujui';
        } elseif ($ditolak) {
            $krs->status = 'Ditolak';
        } else {
            $krs->status = 'Menunggu';
        }


        $krs->save();


        $mahasiswa = $krs->mahasiswa;
        $semester = $krs->semester;
        $dosenPA = $dospem->dosenPA;

        return view('dashboard.dosen.konfirmasi_matkul', compact('mahasiswa', 'matkulKrs', 'semester', 'dosenPA'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|in:Disetujui,Ditolak',
        ]);

        $krs = MatkulKrs::findOrFail($id);

        $krs->status = $request->action;
        $krs->save();

        return redirect()->back()->with('success', 'KRS berhasil diperbarui');
    }

    public function deleteKrs($id)
    {
        $krs = Krs::findOrFail($id);

        $krs->delete();

        return redirect()->back()->with('success', 'KRS berhasil dihapus.');
    }
}
