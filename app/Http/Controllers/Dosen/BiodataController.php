<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BiodataController extends Controller
{
    public function index()
    {
        $dosen = Auth::user();

        return view('dashboard.dosen.profil', compact('dosen'));
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

        $dosen = User::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($dosen->image && Storage::exists($dosen->image)) {
                Storage::delete($dosen->image);
            }
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('public/image_dosen', $fileName);
            $dosen->image = $imagePath;
        }

        $dosen->update([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => $request->password ? Hash::make($request->password) : $dosen->password,
        ]);

        return redirect()->back()->with('success', 'Data dosen berhasil diperbarui');
    }
}
