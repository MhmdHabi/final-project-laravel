<?php

use App\Http\Controllers\Mahasiswa\DashboardController;
use App\Http\Controllers\Mahasiswa\KhsController;
use App\Http\Controllers\Mahasiswa\KrsController;
use App\Http\Controllers\Mahasiswa\PerpustakaanController;
use App\Http\Controllers\Mahasiswa\Kontrak_matkulController;
use App\Http\Controllers\Mahasiswa\ProfilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::prefix('dashboard')->group(function () {

    //mahasiswa
    Route::prefix('mahasiswa')->group(function () {
        Route::get('/beranda', [DashboardController::class, 'index'])->name('mahasiswa.beranda');
        Route::get('/profil', [ProfilController::class, 'index'])->name('mahasiswa.profil');
        Route::get('/krs', [KrsController::class, 'index'])->name('mahasiswa.krs');
        Route::get('/khs', [KhsController::class, 'index'])->name('mahasiswa.khs');
        Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('mahasiswa.perpustakaan');
        Route::get('/kontrak_matkul', [Kontrak_matkulController::class, 'index'])->name('mahasiswa.kontrak_matkul');
    });

    // dosen

    // admin
});
