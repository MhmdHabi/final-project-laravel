<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\DospemController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Dosen\BiodataController;
use App\Http\Controllers\Dosen\JadwalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dosen\KonfirmasiMatkulController;
use App\Http\Controllers\Mahasiswa\DashboardController;
use App\Http\Controllers\Mahasiswa\KhsController;
use App\Http\Controllers\Mahasiswa\KrsController;
use App\Http\Controllers\Mahasiswa\PerpustakaanController;
use App\Http\Controllers\Mahasiswa\Kontrak_matkulController;
use App\Http\Controllers\Mahasiswa\ProfilController;
use App\Http\Controllers\Mahasiswa\PresensiController;
use App\Http\Controllers\Mahasiswa\TagihanController;
use App\Http\Controllers\Mahasiswa\TranskipController;
use App\Http\Controllers\Mahasiswa\PdfController;
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
        Route::get('/kontrak_matkul', [Kontrak_matkulController::class, 'formMatkul'])->name('mahasiswa.kontrak_matkul');
        Route::post('/submit/krs', [Kontrak_matkulController::class, 'submitKRS'])->name('post.mahasiswa.krs');
        Route::get('/tagihan_mahasiswa', [TagihanController::class, 'index'])->name('mahasiswa.tagihan');
        Route::get('/tagihan_mahasiswa/konfirm_pembayaran', [TagihanController::class, 'konfirm_pembayaran'])->name('mahasiswa.konfirm_pembayaran');
        Route::post('/konfirmasi_pembayaran', [TagihanController::class, 'pembayaranStore'])->name('mahasiswa.konfirmasi_pembayaran.store');
        Route::get('/krs/pdf', [PdfController::class, 'index'])->name('mahasiswa.pdf');
    });

    // dosen
    Route::prefix('dosen')->middleware(['auth', 'role:dosen'])->group(function () {
        Route::get('/jadwal_mengajar', [JadwalController::class, 'index'])->name('dosen.mengajar');
        Route::get('/profil', [BiodataController::class, 'index'])->name('dosen.profil');
        Route::put('/profil/update/{id}', [BiodataController::class, 'profilUpdate'])->name('dosen.update');
        Route::get('/konfirmasi_krs', [KonfirmasiMatkulController::class, 'index'])->name('dosen.konfirmasi_krs');
        Route::get('/konfirmasi_krs/{id}', [KonfirmasiMatkulController::class, 'konfirmasi'])->name('dosen.konfirmasi_krs_detail');
        Route::post('/konfirmasi_krs/{id}', [KonfirmasiMatkulController::class, 'update'])->name('post.dosen.konfirmasi_krs');
        Route::delete('/krs/{id}', [KonfirmasiMatkulController::class, 'deleteKrs'])->name('hapus.krs');
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
            Route::get('/datatable_mahasiswa', [MahasiswaController::class, 'getdatatable'])->name('admin.mahasiswa.get_datatable');
            Route::get('/export_mahasiswa', [MahasiswaController::class, 'exportMahasiswa'])->name('export.mahasiswa');
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
            Route::get('/export_dosen', [DosenController::class, 'exportDosen'])->name('export.dosen');
        });

        // CRUD Dospem
        Route::prefix('/')->group(function () {
            Route::get('/data_dospem', [DospemController::class, 'index'])->name('admin.data_dospem');
            Route::get('/data_dospem/info/{id}', [DospemController::class, 'infoDospem'])->name('admin.data_dospem.info');
            Route::get('/data_dospem/add', [DospemController::class, 'addDospem'])->name('admin.data_dospem.add');
            Route::post('/data_dospem/store', [DospemController::class, 'storeDospem'])->name('admin.data_dospem.store');
            Route::get('/data_dospem/edit/{id}', [DospemController::class, 'editDospem'])->name('admin.data_dospem.edit');
            Route::put('/data_dospem/update/{id}', [DospemController::class, 'updateDospem'])->name('admin.data_dospem.update');
            Route::delete('/data_dospem/delete_dospem/{id}', [DospemController::class, 'deleteDospem'])->name('admin.data_dospem.delete_dospem');
            Route::delete('/data_dospem/delete_mhs/{id}', [DospemController::class, 'deleteMhs'])->name('admin.data_dospem.delete_mhs');
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
        Route::post('/konfirmasi_pembayaran/{id}', [AdminController::class, 'konfirmasiTagihan'])->name('post.admin.konfirmasi_pembayaran');
        Route::get('/konfirmasi/lihat/{id}', [AdminController::class, 'lihatGambar'])->name('konfirmasi.lihat');
        Route::get('/data_buku', [AdminController::class, 'dataBuku'])->name('admin.data_buku');
        Route::get('/data_buku/buku_add', [AdminController::class, 'bukuAdd'])->name('admin.data_buku.add');
        Route::post('/data_buku/buku_store', [AdminController::class, 'bukuStore'])->name('admin.data_buku.store');
        Route::get('/data_buku/buku_edit/{id}', [AdminController::class, 'bukuEdit'])->name('admin.data_buku.edit');
        Route::put('/data_buku/buku_update/{id}', [AdminController::class, 'bukuUpdate'])->name('admin.data_buku.update');
        Route::post('/data_buku/buku_delete/{id}', [AdminController::class, 'bukuDelete'])->name('admin.data_buku.delete');
        Route::get('/konfirmasi_perpustakaan', [AdminController::class, 'konfirmasiPerpustakaan'])->name('admin.konfirmasi_perpustakaan');
        Route::post('/konfirmasi_perpustakaan/{id}', [AdminController::class, 'konfirmasiBuku'])->name('post.admin.konfirmasi_perpustakaan');
        Route::get('/pembukaan_matkul', [AdminController::class, 'pembukaanMatkul'])->name('admin.pembukaan_matkul');
        Route::get('/toggle_aktif', [AdminController::class, 'toggle'])->name('admin.toggle_aktif');
    });

    Route::post('logout', [HomeController::class, 'logout'])->name('logout');
});
