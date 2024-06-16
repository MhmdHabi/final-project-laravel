<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Matkul;
use App\Models\MatkulKrs;
use Illuminate\Support\Facades\Auth;

class InputNilaiController extends Controller
{
    public function index()
    {
        $dosenId = Auth::user()->id;

        $matkuls = Matkul::where('dosen_id', $dosenId)->get();

        return view('dashboard.dosen.input_nilai', compact('matkuls'));
    }

    public function inputDetail($id)
    {
        $dosenId = Auth::user()->id;

        $matkul = Matkul::where('id', $id)
            ->where('dosen_id', $dosenId)
            ->with('matkulKrs.krs.mahasiswa')
            ->first();

        return view('dashboard.dosen.input_detail', compact('matkul'));
    }

    public function inputNilai(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:matkul_krs,id',
            'nilai' => 'nullable|numeric|min:0|max:100',
        ]);

        $matkulKrs = MatkulKrs::findOrFail($request->input('id'));

        if ($request->has('nilai')) {
            $matkulKrs->nilai = $request->input('nilai');
            $matkulKrs->save();
        }

        return redirect()->route('dosen.input.detail', ['id' => $matkulKrs->matkul_id])->with('success', 'Nilai berhasil disimpan.');
    }
}
