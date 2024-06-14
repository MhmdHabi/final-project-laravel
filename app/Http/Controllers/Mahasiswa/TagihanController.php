<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagihanController extends Controller
{
    public function index()
    {
        $mahasiswa_id = auth()->user()->id;
        // Mengambil data pembayaran dengan status "menunggu", "diterima", atau "ditolak"
        $konfirmasiPembayaran = Pembayaran::where('mahasiswa_id', $mahasiswa_id)
            ->whereIn('status_konfirmasi', ['menunggu', 'diterima', 'ditolak'])
            ->get();

        return view('dashboard.mahasiswa.tagihan', [
            'konfirmasiPembayaran' => $konfirmasiPembayaran,
        ]);
    }


    public function konfirm_pembayaran()
    {
        return view('dashboard.mahasiswa.konfirmasi_pembayaran');
    }

    public function PembayaranStore(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'jenis_tagihan' => 'required',
            'rekening_tujuan' => 'required',
            'metode_transfer' => 'required',
            'nominal' => 'required|numeric',
            'tanggal_transfer' => 'required|date',
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'deskripsi' => 'nullable',
            'bukti_bayar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika validasi gagal, kembalikan dengan pesan error
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil ID mahasiswa yang sedang login
        $mahasiswa_id = auth()->user()->id;

        // Simpan data pembayaran ke dalam database
        $pembayaran = new Pembayaran();
        $pembayaran->mahasiswa_id = $mahasiswa_id; // Set ID mahasiswa
        $pembayaran->jenis_tagihan = $request->jenis_tagihan;
        $pembayaran->rekening_tujuan = $request->rekening_tujuan;
        $pembayaran->metode_transfer = $request->metode_transfer;
        $pembayaran->nominal = $request->nominal; // Pastikan ini sudah dalam format numerik
        $pembayaran->tanggal_transfer = $request->tanggal_transfer;
        $pembayaran->semester = $request->semester;
        $pembayaran->tahun_ajaran = $request->tahun_ajaran;
        $pembayaran->deskripsi = $request->deskripsi;

        if ($request->hasFile('bukti_bayar')) {
            $bukti_bayar = $request->file('bukti_bayar');
            $filename = time() . '_' . $bukti_bayar->getClientOriginalName();
            $bukti_bayar->storeAs('public/bukti_pembayaran', $filename);
            $pembayaran->bukti_pembayaran = 'bukti_pembayaran/' . $filename;
        }

        // Simpan perubahan
        $pembayaran->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('mahasiswa.tagihan')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }
}
