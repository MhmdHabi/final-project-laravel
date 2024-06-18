<?php

namespace App\Http\Controllers\Admin;

use App\Exports\KonfirmPayExport;
use App\Http\Controllers\Controller;
use App\Models\AktifasiMatkul;
use App\Models\Buku;
use App\Models\Pembayaran;
use App\Models\Pinjam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::orderBy('created_at', 'desc')->whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        return view('dashboard.admin.admin.admin', compact('admins'));
    }

    public function addAdmin()
    {
        return view('dashboard.admin.admin.admin_add');
    }
    public function dataBuku()
    {
        $buku = Buku::all();
        return view('dashboard.admin.admin.data_buku', compact('buku'));
    }
    public function bukuAdd()
    {
        return view('dashboard.admin.admin.buku_add');
    }

    public function storeAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:mahasiswa,dosen,admin',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.data_admin.add')
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $user = User::create([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole($request->role);

            DB::commit();

            return redirect()->route('admin.data_admin')->with('success', 'Admin berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('admin.data_admin.add')
                ->withErrors(['error' => 'Gagal menambahkan admin: ' . $e->getMessage()])
                ->withInput();
        }
    }
    public function editAdmin($id)
    {
        $admin = User::findOrFail($id);
        return view('dashboard.admin.admin.admin_edit', compact('admin'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $admin = User::findOrFail($id);

            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => $request->password ? Hash::make($request->password) : $admin->password,
            ]);

            DB::commit();

            return redirect()->route('admin.data_admin')->with('success', 'Data admin berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors(['error' => 'Gagal memperbarui data admin: ' . $e->getMessage()])->withInput();
        }
    }

    public function deleteAdmin($id)
    {
        $admin = User::findOrFail($id);

        if ($admin->id === auth()->user()->id) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri');
        }

        if ($admin->image && Storage::exists($admin->image)) {
            Storage::delete($admin->image);
        }

        $admin->delete();

        return redirect()->route('admin.data_admin')->with('success', 'Admin berhasil dihapus');
    }

    public function konfirmasiPembayaran()
    {
        // Mengambil data konfirmasi pembayaran yang perlu dikonfirmasi oleh admin
        $konfirmasiPembayaran = Pembayaran::with('mahasiswa')->get();

        return view('dashboard.admin.admin.konfirmasi_pembayaran', [
            'konfirmasiPembayaran' => $konfirmasiPembayaran,
        ]);
    }

    public function konfirmasiPerpustakaan()
    {
        $peminjaman = Pinjam::orderBy('created_at', 'desc')->get();

        return view('dashboard.admin.admin.konfirmasi_perpustakaan', compact('peminjaman'));
    }

    public function konfirmasiBuku(Request $request, $id)
    {
        $pinjam = Pinjam::findOrFail($id);

        if ($request->action === 'approve') {
            $pinjam->status = 'Dipinjam';
            $pinjam->buku->decrement('stok');
        } elseif ($request->action === 'reject') {
            $pinjam->status = 'Dikembalikan';
            $pinjam->buku->increment('stok');

            $pinjam->delete();

            return redirect()->route('admin.konfirmasi_perpustakaan')->with('success', 'Buku telah dikembalikan dan data peminjaman dihapus.');
        }

        $pinjam->save();

        return redirect()->route('admin.konfirmasi_perpustakaan')->with('success', 'Konfirmasi berhasil dilakukan');
    }

    public function bukuStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'pengarang' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.data_buku.add')
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $buku = Buku::create([
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'deskripsi' => $request->deskripsi,
                'stok' => $request->stok,
            ]);

            DB::commit();

            return redirect()->route('admin.data_buku')->with('success', 'Buku berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('admin.data_buku.add')
                ->withErrors(['error' => 'Gagal menambahkan buku: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function bukuEdit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('dashboard.admin.admin.buku_edit', compact('buku'));
    }

    public function bukuUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'pengarang' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $buku = Buku::findOrFail($id);

            $buku->update([
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'deskripsi' => $request->deskripsi,
                'stok' => $request->stok,
            ]);

            DB::commit();

            return redirect()->route('admin.data_buku')->with('success', 'Data buku berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors(['error' => 'Gagal memperbarui data buku: ' . $e->getMessage()])->withInput();
        }
    }

    public function bukuDelete($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return redirect()->route('admin.data_buku')->with('success', 'Buku berhasil dihapus');
    }

    public function pembukaanMatkul()
    {
        return view('dashboard.admin.admin.pembukaan_matkul');
    }

    public function toggle()
    {
        $status = AktifasiMatkul::firstOrCreate([]);
        $status->is_open = !$status->is_open;
        $status->save();

        $message = $status->is_open ? 'Pemilihan mata kuliah dibuka.' : 'Pemilihan mata kuliah ditutup.';

        return redirect()->back()->with($status->is_open ? 'success' : 'error', $message);
    }

    public function konfirmasiTagihan(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        // Anda dapat mengambil status konfirmasi dari model Pembayaran atau KonfirmasiPembayaran
        // Asumsikan status_konfirmasi berada di model Pembayaran
        if ($request->status === 'Diterima') {
            $pembayaran->status_konfirmasi = 'Diterima';
        } elseif ($request->status === 'Ditolak') {
            $pembayaran->status_konfirmasi = 'Ditolak';
        }

        $pembayaran->save();

        return redirect()->back()->with('success', 'Status konfirmasi pembayaran berhasil diubah.');
    }

    public function lihatGambar($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        return view('dashboard.admin.admin.bukti_pembayaran', compact('pembayaran'));
    }

    public function exportPembayaran(Request $request)
    {
        return Excel::download(new KonfirmPayExport($request), 'Data Konfirmasi Pembayaran Mahasiswa.xlsx');
    }
}
