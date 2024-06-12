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
        $mahasiswa = User::whereNotNull('nim')->orderBy('created_at', 'desc')->get();

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
            'tgl_lahir' => 'required|date',
            'agama' => 'required|string',
            'jurusan' => 'required|string',
            'status_kuliah' => 'required',
            'role' => 'required|in:mahasiswa,dosen,admin',
            'status_kuliah' => 'required|in:aktif,non-aktif',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
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
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'jurusan' => $request->jurusan,
            'status_kuliah' => $request->status_kuliah,
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
            'status_kuliah' => 'required|in:aktif,non-aktif',
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
            'status_kuliah' => $request->status_kuliah,
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
    public function getdatatable(Request $request)
    {
        $query = User::query()->whereNotNull('nim');
        if ($request->filled('status_kuliah')) {
            $query->where('status_kuliah', $request->status_kuliah);
        }
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $editUrl = route('admin.data_mahasiswa.edit', ['id' => $row->id]);
                $detailUrl = route('admin.data_mahasiswa.detail', ['id' => $row->id]);
                $deleteUrl = route('admin.data_mahasiswa.delete', ['id' => $row->id]);
                return ' <a href="' . $editUrl . '"><button class="px-4 py-2 bg-blue-500 text-white rounded-md w-full mb-2">Edit</button></a>
                    <a href="' . $detailUrl . '"><button class="px-4 py-2 bg-amber-500 text-white rounded-md w-full mb-2">Detail</button></a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md w-full">Delete</button>
                    </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
