<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Matkul;
use App\Models\PresensiDosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiDosenController extends Controller
{
    public function index()
    {
        $dosenId = Auth::user()->id;

        $matkuls = Matkul::where('dosen_id', $dosenId)->get();

        return view('dashboard.dosen.presensi_dosen', compact('matkuls'));
    }

    public function toggleAbsensi($id)
    {
        $absensi = PresensiDosen::firstOrCreate(['matkul_id' => $id]);
        $absensi->is_open = !$absensi->is_open;
        $absensi->save();
        $namaMatkul = $absensi->matkul->nama_mk;
        $message = $absensi->is_open ? "Presensi $namaMatkul dibuka." : "Presensi $namaMatkul ditutup.";

        return redirect()->back()->with($absensi->is_open ? 'success' : 'error', $message);
    }

    public function rekapAbsen($id)
    {
        $dosenId = Auth::user()->id;

        $matkul = Matkul::where('id', $id)
            ->where('dosen_id', $dosenId)
            ->with('presensiMahasiswa.mahasiswa')
            ->first();

        $presensiMahasiswa = $matkul->presensiMahasiswa;

        $kehadiranPerMahasiswa = $presensiMahasiswa->groupBy('mahasiswa_id')->map(function ($presensi) {
            return $presensi->count();
        });

        $mhs = $presensiMahasiswa->pluck('mahasiswa_id')->unique();
        $mahasiswa = User::whereIn('id', $mhs)->get();

        return view('dashboard.dosen.presensi_detail', compact('matkul', 'kehadiranPerMahasiswa', 'mahasiswa'));
    }
}
