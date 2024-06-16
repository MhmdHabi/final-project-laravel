<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $krsRecords = $user->krs;

        $ipData = [];

        $totalSemesters = $krsRecords->count();

        for ($i = 1; $i <= $totalSemesters; $i++) {
            $matkulKrs = $krsRecords[$i - 1]->matkulKrs()->where('status', 'Disetujui')->get();

            $averageNilai = $matkulKrs->avg('nilai');

            $ipData[] = [
                'semester' => 'Semester ' . $i,
                'ip' => $averageNilai
            ];
        }

        usort($ipData, function ($a, $b) {
            return $a['semester'] <=> $b['semester'];
        });

        return view('dashboard.mahasiswa.beranda', compact('ipData'));
    }
}
