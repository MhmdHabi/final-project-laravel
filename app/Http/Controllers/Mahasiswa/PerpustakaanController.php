<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Pinjam;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PerpustakaanController extends Controller
{
    public function index()
    {
        $mahasiswaId = Auth::id();

        $pinjam = Pinjam::where('mahasiswa_id', $mahasiswaId)->orderBy('created_at', 'desc')->get();

        return view('dashboard.mahasiswa.perpustakaan', compact('pinjam'));
    }

    public function pinjamBuku()
    {
        $buku = Buku::all();

        return view('dashboard.mahasiswa.pinjam_buku', compact('buku'));
    }

    public function bukuDipinjam(Request $request)
    {
        $bukuSedangDipinjam = Pinjam::where('mahasiswa_id', auth()->id())
            ->whereIn('status', ['Dipinjam', 'Menunggu'])
            ->pluck('buku_id')
            ->toArray();

        if ($request->has('buku_id') && !empty($request->buku_id)) {
            $waktuPeminjaman = Carbon::now();
            $waktuPengembalian = $waktuPeminjaman->copy()->addDays(3)->setTimezone('Asia/Jakarta');

            foreach ($request->buku_id as $bukuId) {
                if (in_array($bukuId, $bukuSedangDipinjam)) {
                    return redirect()->back()->with('error', 'Anda sedang meminjam buku ini atau menunggu konfirmasi.');
                }

                $buku = Buku::find($bukuId);

                if ($buku && $buku->stok > 0) {
                    Pinjam::create([
                        'mahasiswa_id' => auth()->id(),
                        'buku_id' => $bukuId,
                        'status' => 'Menunggu',
                        'waktu_peminjaman' => $waktuPeminjaman,
                        'waktu_pengembalian' => $waktuPengembalian,
                    ]);
                } else {
                    return redirect()->back()->with('error', "Stok buku '{$buku->judul}' sedang kosong.");
                }
            }

            return redirect()->route('mahasiswa.perpustakaan')->with('success', 'Peminjaman berhasil diajukan.');
        } else {
            return redirect()->back()->with('error', 'Pilih setidaknya satu buku untuk dipinjam.');
        }
    }
}
