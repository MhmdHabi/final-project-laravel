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
Route::get('/login/mahasiswa', [HomeController::class, 'formLoginMahasiswa'])->name('login.mahasiswa');
Route::post('/login/mahasiswa', [HomeController::class, 'loginMahasiswa'])->name('post.login.mahasiswa');
Route::get('/login/dosen', [HomeController::class, 'formLoginDosen'])->name('login.dosen');
Route::post('/login/dosen', [HomeController::class, 'loginDosen'])->name('post.login.dosen');
Route::get('/login/admin', [HomeController::class, 'formLoginAdmin'])->name('login.admin');
Route::post('/login/admin', [HomeController::class, 'loginAdmin'])->name('post.login.admin');

Route::prefix('siakad')->group(function () {

    //mahasiswa
    Route::prefix('mahasiswa')->middleware(['auth', 'role:mahasiswa'])->group(function () {
        Route::get('/beranda', [DashboardController::class, 'index'])->name('mahasiswa.beranda');
        Route::get('/presensi', [PresensiController::class, 'index'])->name('mahasiswa.presensi');
        Route::get('/profil', [ProfilController::class, 'index'])->name('mahasiswa.profil');
        Route::put('/profil/update/{id}', [ProfilController::class, 'profilUpdate'])->name('mahasiswa.update');
        Route::get('/krs', [KrsController::class, 'index'])->name('mahasiswa.krs');
        Route::get('/khs', [KhsController::class, 'index'])->name('mahasiswa.khs');
        Route::get('/transkip', [TranskipController::class, 'index'])->name('mahasiswa.transkip');
        Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('mahasiswa.perpustakaan');
        Route::get('/perpustakaan/pinjam_buku', [PerpustakaanController::class, 'pinjamBuku'])->name('mahasiswa.pinjam_buku');
        Route::post('/perpustakaan/pinjam_buku', [PerpustakaanController::class, 'bukuDipinjam'])->name('post.mahasiswa.pinjam_buku');
        Route::get('/kontrak_matkul', [Kontrak_matkulController::class, 'index'])->name('mahasiswa.kontrak_matkul');
        Route::get('/tagihan_mahasiswa', [TagihanController::class, 'index'])->name('mahasiswa.tagihan');
        Route::get('/tagihan_mahasiswa/konfirm_pembayaran', [TagihanController::class, 'konfirm_pembayaran'])->name('mahasiswa.konfirm_pembayaran');
    });

    // dosen
    Route::prefix('dosen')->middleware(['auth', 'role:dosen'])->group(function () {
        Route::get('/jadwal_mengajar', [JadwalController::class, 'index'])->name('dosen.mengajar');
        Route::get('/profil', [BiodataController::class, 'index'])->name('dosen.profil');
    });

    // admin
    Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

        // CRUD Mahasiswa
        Route::prefix('/')->group(function () {
            Route::get('/data_mahasiswa', [MahasiswaController::class, 'index'])->name('admin.data_mahasiswa');
            Route::get('/data_mahasiswa/add', [MahasiswaController::class, 'addMahasiswa'])->name('admin.data_mahasiswa.add');
            Route::post('/data_mahasiswa/store', [MahasiswaController::class, 'storeMahasiswa'])->name('admin.data_mahasiswa.store');
            Route::get('/data_mahasiswa/edit/{id}', [MahasiswaController::class, 'editMahasiswa'])->name('admin.data_mahasiswa.edit');
            Route::put('/data_mahasiswa/update/{id}', [MahasiswaController::class, 'updateMahasiswa'])->name('admin.data_mahasiswa.update');
            Route::post('/data_mahasiswa/delete/{id}', [MahasiswaController::class, 'deleteMahasiswa'])->name('admin.data_mahasiswa.delete');
            Route::get('/data_mahasiswa/detail/{id}', [MahasiswaController::class, 'detailMahasiswa'])->name('admin.data_mahasiswa.detail');
            Route::get('/datatable_mahasiswa', [MahasiswaController::class, 'getDatatable'])->name('admin.mahasiswa.get_datatable');
        });

        // CRUD Dosen
        Route::prefix('/')->group(function () {
            Route::get('/data_dosen', [DosenController::class, 'index'])->name('admin.data_dosen');
            Route::get('/data_dosen/add', [DosenController::class, 'addDosen'])->name('admin.data_dosen.add');
            Route::post('/data_dosen/store', [DosenController::class, 'storeDosen'])->name('admin.data_dosen.store');
            Route::get('/data_dosen/edit/{id}', [DosenController::class, 'editDosen'])->name('admin.data_dosen.edit');
            Route::put('/data_dosen/update/{id}', [DosenController::class, 'updateDosen'])->name('admin.data_dosen.update');
            Route::post('/data_dosen/delete/{id}', [DosenController::class, 'deleteDosen'])->name('admin.data_dosen.delete');
            Route::get('/data_dosen/detail/{id}', [DosenController::class, 'detailDosen'])->name('admin.data_dosen.detail');
        });
        // CRUD Admin
        Route::prefix('/')->group(function () {
            Route::get('/data_admin', [AdminController::class, 'index'])->name('admin.data_admin');
            Route::get('/data_admin/add', [AdminController::class, 'addAdmin'])->name('admin.data_admin.add');
            Route::post('/data_admin/store', [AdminController::class, 'storeAdmin'])->name('admin.data_admin.store');
            Route::get('/data_admin/edit/{id}', [AdminController::class, 'editAdmin'])->name('admin.data_admin.edit');
            Route::put('/data_admin/update/{id}', [AdminController::class, 'updateAdmin'])->name('admin.data_admin.update');
            Route::post('/data_admin/delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.data_admin.delete');
        });

        Route::get('/konfirmasi_pembayaran', [AdminController::class, 'konfirmasiPembayaran'])->name('admin.konfirmasi_pembayaran');
        Route::get('/konfirmasi_perpustakaan', [AdminController::class, 'konfirmasiPerpustakaan'])->name('admin.konfirmasi_perpustakaan');
        Route::post('/konfirmasi_perpustakaan/{id}', [AdminController::class, 'konfirmasiBuku'])->name('post.admin.konfirmasi_perpustakaan');
    });

    Route::post('logout', [HomeController::class, 'logout'])->name('logout');
});
