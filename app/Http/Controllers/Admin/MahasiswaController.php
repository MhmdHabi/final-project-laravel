<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = User::whereNotNull('nim')->get();

        return view('dashboard.admin.mahasiswa.mahasiswa', compact('mahasiswa'));
    }
    public function addMahasiswa()
    {
        return view('dashboard.admin.mahasiswa.mahasiswa_add');
    }

    public function storeMahasiswa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|integer|unique:users,nim',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required',
            'jurusan' => 'required|string',
            'role' => 'required|in:mahasiswa,dosen,admin',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.data_mahasiswa.add')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'jurusan' => $request->jurusan,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('admin.data_mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function editMahasiswa($id)
    {
        $mahasiswa = User::findOrFail($id);
        return view('dashboard.admin.mahasiswa.mahasiswa_edit', compact('mahasiswa'));
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|integer|unique:users,nim,' . $id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'gender' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'tgl_lahir' => 'required|date',
            'agama' => 'required|string',
            'alamat' => 'required|string',
            'jurusan' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $mahasiswa = User::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($mahasiswa->image && Storage::exists($mahasiswa->image)) {
                Storage::delete($mahasiswa->image);
            }


            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('public/image_mahasiswa', $fileName);
            $mahasiswa->image = $imagePath;
        }

        $mahasiswa->update([
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'no_hp' => $request->no_hp,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'jurusan' => $request->jurusan,
            'password' => $request->password ? Hash::make($request->password) : $mahasiswa->password,
        ]);

        return redirect()->route('admin.data_mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    public function detailMahasiswa($id)
    {
        $mahasiswa = User::findOrFail($id);

        return view('dashboard.admin.mahasiswa.mahasiswa_detail', compact('mahasiswa'));
    }

    public function deleteMahasiswa($id)
    {
        $mahasiswa = User::findOrFail($id);
        if ($mahasiswa->image && Storage::exists($mahasiswa->image)) {
            Storage::delete($mahasiswa->image);
        }

        $mahasiswa->delete();

        return redirect()->route('admin.data_mahasiswa')->with('success', 'Mahasiswa berhasil dihapus');
    }
}
