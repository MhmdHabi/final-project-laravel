<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = User::whereNotNull('nidn')->get();

        return view('dashboard.admin.dosen.dosen', compact('dosen'));
    }
    public function addDosen()
    {
        return view('dashboard.admin.dosen.dosen_add');
    }

    public function storeDosen(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nidn' => 'required|integer|unique:users,nidn',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required|string',
            'role' => 'required|in:mahasiswa,dosen,admin',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.data_dosen.add')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'nidn' => $request->nidn,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('admin.data_dosen')->with('success', 'Dosen added successfully');
    }
    public function editDosen($id)
    {
        $dosen = User::findOrFail($id);
        return view('dashboard.admin.dosen.dosen_edit', compact('dosen'));
    }

    public function updateDosen(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nidn' => 'required|integer|unique:users,nidn,' . $id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'gender' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'tgl_lahir' => 'required|date',
            'agama' => 'required|string',
            'alamat' => 'required|string',
            'jabatan' => 'required|string',
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

            // Upload gambar baru
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('public/image_dosen', $fileName);
            $dosen->image = $imagePath;
        }

        $dosen->update([
            'nidn' => $request->nidn,
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'no_hp' => $request->no_hp,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
            'password' => $request->password ? Hash::make($request->password) : $dosen->password,
        ]);

        return redirect()->route('admin.data_dosen')->with('success', 'Data dosen berhasil diperbarui');
    }
    public function detailDosen($id)
    {
        $dosen = User::findOrFail($id);
        return view('dashboard.admin.dosen.dosen_detail', compact('dosen'));
    }

    public function deleteDosen($id)
    {
        $dosen = User::findOrFail($id);

        if ($dosen->image && Storage::exists($dosen->image)) {
            Storage::delete($dosen->image);
        }

        $dosen->delete();

        return redirect()->route('admin.data_dosen')->with('success', 'Dosen berhasil dihapus');
    }
}
