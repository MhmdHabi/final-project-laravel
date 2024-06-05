<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('dashboard');
        }

        if (!Auth::user()->hasRole($role)) {
            switch ($role) {
                case 'admin':
                    return redirect()->route('admin.data_mahasiswa');
                    break;
                case 'dosen':
                    return redirect()->route('dosen.mengajar');
                    break;
                case 'mahasiswa':
                    return redirect()->route('mahasiswa.beranda');
                    break;
                default:
                    return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}
