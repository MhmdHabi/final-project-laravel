<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::user();

        return view('dashboard.mahasiswa.profil', compact('mahasiswa'));
    }

    public function profilUpdate(Request $request, $id)
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

        return redirect()->back()->with('success', 'Data mahasiswa berhasil diperbarui');
    }
}
