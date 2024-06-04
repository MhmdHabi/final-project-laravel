<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Dosen\BiodataController;
use App\Http\Controllers\Dosen\JadwalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Mahasiswa\DashboardController;
use App\Http\Controllers\Mahasiswa\KhsController;
use App\Http\Controllers\Mahasiswa\KrsController;
use App\Http\Controllers\Mahasiswa\PerpustakaanController;
use App\Http\Controllers\Mahasiswa\Kontrak_matkulController;
use App\Http\Controllers\Mahasiswa\ProfilController;
use App\Http\Controllers\Mahasiswa\PresensiController;
use App\Http\Controllers\Mahasiswa\TagihanController;
use App\Http\Controllers\Mahasiswa\TranskipController;
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

Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/Login/mahasiswa', [HomeController::class, 'loginMahasiswa'])->name('login.mahasiswa');
Route::get('/login/dosen', [HomeController::class, 'loginDosen'])->name('login.dosen');
Route::get('/login/admin', [HomeController::class, 'loginAdmin'])->name('login.admin');

Route::prefix('dashboard')->group(function () {

    //mahasiswa
    Route::prefix('mahasiswa')->group(function () {
        Route::get('/beranda', [DashboardController::class, 'index'])->name('mahasiswa.beranda');
        Route::get('/presensi', [PresensiController::class, 'index'])->name('mahasiswa.presensi');
        Route::get('/profil', [ProfilController::class, 'index'])->name('mahasiswa.profil');
        Route::get('/krs', [KrsController::class, 'index'])->name('mahasiswa.krs');
        Route::get('/khs', [KhsController::class, 'index'])->name('mahasiswa.khs');
        Route::get('/transkip', [TranskipController::class, 'index'])->name('mahasiswa.transkip');
        Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('mahasiswa.perpustakaan');
        Route::get('/perpustakaan/pinjam_buku', [PerpustakaanController::class, 'pinjamBuku'])->name('mahasiswa.pinjam_buku');
        Route::get('/kontrak_matkul', [Kontrak_matkulController::class, 'index'])->name('mahasiswa.kontrak_matkul');
        Route::get('/tagihan_mahasiswa', [TagihanController::class, 'index'])->name('mahasiswa.tagihan');
        Route::get('/tagihan_mahasiswa/konfirm_pembayaran', [TagihanController::class, 'konfirm_pembayaran'])->name('mahasiswa.konfirm_pembayaran');
    });

    // dosen
    Route::prefix('dosen')->group(function () {
        Route::get('/jadwal_mengajar', [JadwalController::class, 'index'])->name('dosen.mengajar');
        Route::get('/profil', [BiodataController::class, 'index'])->name('dosen.profil');
    });

    // admin
    Route::prefix('admin')->group(function () {

        // CRUD Mahasiswa
        Route::prefix('/')->group(function () {
            Route::get('/data_mahasiswa', [MahasiswaController::class, 'index'])->name('admin.data_mahasiswa');
            Route::get('/data_mahasiswa/add', [MahasiswaController::class, 'addMahasiswa'])->name('admin.data_mahasiswa.add');
            Route::post('/data_mahasiswa/store', [MahasiswaController::class, 'storeMahasiswa'])->name('admin.data_mahasiswa.store');
            Route::get('/data_mahasiswa/edit', [MahasiswaController::class, 'editMahasiswa'])->name('admin.data_mahasiswa.edit');
            Route::put('/data_mahasiswa/update/{id}', [MahasiswaController::class, 'updateMahasiswa'])->name('admin.data_mahasiswa.update');
            Route::post('/data_mahasiswa/delete/{id}', [MahasiswaController::class, 'deleteMahasiswa'])->name('admin.data_mahasiswa.delete');
            Route::get('/data_mahasiswa/detail', [MahasiswaController::class, 'detailMahasiswa'])->name('admin.data_mahasiswa.detail');
        });

        // CRUD Dosen
        Route::prefix('/')->group(function () {
            Route::get('/data_dosen', [DosenController::class, 'index'])->name('admin.data_dosen');
            Route::get('/data_dosen/add', [DosenController::class, 'addDosen'])->name('admin.data_dosen.add');
            Route::post('/data_dosen/store', [DosenController::class, 'storeDosen'])->name('admin.data_dosen.store');
            Route::get('/data_dosen/edit/', [DosenController::class, 'editDosen'])->name('admin.data_dosen.edit');
            Route::put('/data_dosen/update/{id}', [DosenController::class, 'updateDosen'])->name('admin.data_dosen.update');
            Route::post('/data_dosen/delete/{id}', [DosenController::class, 'deleteDosen'])->name('admin.data_dosen.delete');
            Route::get('/data_dosen/detail', [DosenController::class, 'detailDosen'])->name('admin.data_dosen.detail');
        });

        Route::get('/konfirmasi_pembayaran', [AdminController::class, 'konfirmasiPembayaran'])->name('admin.konfirmasi_pembayaran');
        Route::get('/konfirmasi_perpustakaan', [AdminController::class, 'konfirmasiPerpustakaan'])->name('admin.konfirmasi_perpustakaan');
    });
});
