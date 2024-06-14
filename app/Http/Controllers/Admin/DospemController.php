<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DosenPA;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DospemController extends Controller
{
    public function index()
    {
        $dosen = DosenPA::with('dosen')->get()->pluck('dosen')->unique();

        return view('dashboard.admin.dospem.dospem', compact('dosen'));
    }

    public function infoDospem($id)
    {
        $dospem = User::findOrFail($id);
        $mahasiswa = $dospem->dospem()->orderBy('created_at', 'desc')->get();

        return view('dashboard.admin.dospem.dospem_detail', compact('dospem', 'mahasiswa'));
    }

    public function addDospem()
    {
        $dosen = User::whereNotNull('nidn')->get();

        $mahasiswa = User::whereNotNull('nim')
            ->whereDoesntHave('dosenPA')
            ->get();

        return view('dashboard.admin.dospem.dospem_add', compact('dosen', 'mahasiswa'));
    }

    public function storeDospem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dospem_id' => 'required',
            'mahasiswa_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.data_dospem.add')
                ->withErrors($validator)
                ->withInput();
        }

        DosenPA::create([
            'dospem_id' => $request->dospem_id,
            'mahasiswa_id' => $request->mahasiswa_id,
        ]);

        return redirect()->route('admin.data_dospem')->with('success', 'Mahasiswa Dosen Pembimbing berhasil ditambahkan');
    }

    public function editDospem($id)
    {
        $mahasiswa = User::findOrFail($id);
        $dosenPA = DosenPA::where('mahasiswa_id', $id)->firstOrFail();
        $dosen = User::whereNotNull('nidn')->get();

        session()->put('kembali', url()->previous());

        return view('dashboard.admin.dospem.dospem_edit', compact('dosenPA', 'dosen', 'mahasiswa'));
    }

    public function updateDospem(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'dospem_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.data_dospem.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $dosenPA = DosenPA::where('mahasiswa_id', $id)->firstOrFail();
        $dosenPA->dospem_id = $request->dospem_id;
        $dosenPA->save();

        $kembali = session()->get('kembali', route('admin.data_dospem'));

        return redirect($kembali)->with('success', 'Data Dosen Pembimbing berhasil diperbarui');
    }

    public function deleteMhs($id)
    {
        $dosenPA = DosenPA::where('mahasiswa_id', $id)->firstOrFail();
        $dosenPA->delete();

        return redirect()->back()->with('success', 'Mahasiswa berhasil dihapus');
    }

    public function deleteDospem($id)
    {
        $dosenPA = DosenPA::where('dospem_id', $id)->firstOrFail();
        $dosenPA->delete();

        return redirect()->route('admin.data_dospem')->with('success', 'Dosen Pembimbing berhasil dihapus');
    }
}
