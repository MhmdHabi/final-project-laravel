<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\DosenPA;
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
        $dosen_pa = DosenPA::where('mahasiswa_id', $mahasiswa->id)->with('dosen')->first();
        $dosen = Auth::user();
        return view('dashboard.mahasiswa.profil', compact('mahasiswa', 'dosen_pa', 'dosen'));
    }

    public function profilUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'password' => 'nullable|min:8',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
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
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => $request->password ? Hash::make($request->password) : $mahasiswa->password,
        ]);

        return redirect()->back()->with('success', 'Data mahasiswa berhasil diperbarui');
    }
}
