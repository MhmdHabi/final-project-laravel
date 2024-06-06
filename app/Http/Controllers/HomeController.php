<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    // Login Mahasiswa
    public function formLoginMahasiswa()
    {
        return view('auth.login_mahasiswa');
    }

    public function loginMahasiswa(Request $request)
    {
        $credentials = $request->only('nim', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->hasRole('mahasiswa')) {
                return redirect()->route('mahasiswa.beranda');
            }
        }

        return back()->withErrors([
            'password' => 'NIM atau Password kurang tepat.',
        ]);
    }

    // Login Dosen
    public function formLoginDosen()
    {
        return view('auth.login_dosen');
    }

    public function loginDosen(Request $request)
    {
        $credentials = $request->only('nidn', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->hasRole('dosen')) {
                return redirect()->route('dosen.mengajar');
            }
        }

        return back()->withErrors([
            'password' => 'NIDN atau Password kurang tepat.',
        ]);
    }

    // Login Admin
    public function formloginAdmin()
    {
        return view('auth.login_admin');
    }

    public function loginAdmin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.data_mahasiswa');
            }
        }

        return back()->withErrors([
            'password' => 'Username atau Password kurang tepat.',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('dashboard');
    }
}
