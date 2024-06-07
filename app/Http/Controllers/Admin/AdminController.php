<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Pinjam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::whereHas('roles', function ($query) {
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
    public function bukuadd()
    {
        return view('dashboard.admin.admin.buku_add');
    }

    public function storeAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255|',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:mahasiswa,dosen,admin',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.data_admin.add')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('admin.data_admin')->with('success', 'Admin berhasil ditambahkan');
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

        $admin = User::findOrFail($id);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
        ]);
        return redirect()->route('admin.data_admin')->with('success', 'Data admin berhasil diperbarui');
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
        return view('dashboard.admin.admin.konfirmasi_pembayaran');
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
            return redirect()->route('admin.buku_add')
                ->withErrors($validator)
                ->withInput();
        }

        $buku = Buku::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
        ]);

        return redirect()->route('admin.data_buku')->with('success', 'Buku berhasil ditambahkan');
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

        $buuku = Buku::findOrFail($id);

        $buuku->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
        ]);
        return redirect()->route('admin.data_buku')->with('success', 'Data buku berhasil diperbarui');
    }

    public function bukuDelete($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return redirect()->route('admin.data_buku')->with('success', 'Buku berhasil dihapus');
    }
}
