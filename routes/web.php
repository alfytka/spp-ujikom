<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KompetensiKeahlianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ManageSiswaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FeatureController::class, 'login'])->name('login');
Route::post('/login', [FeatureController::class, 'loginPost']);
Route::post('/logout', [FeatureController::class, 'logout']);

Route::middleware(['admin'])->group(function() {
    Route::get('/dashboard', [FeatureController::class, 'dashboard']);
    Route::resource('/dataprodi', KompetensiKeahlianController::class);
    Route::resource('/datakelas', KelasController::class);
    Route::resource('/datasiswa', SiswaController::class);
    Route::resource('/dataspp', SppController::class);
    Route::resource('/datapetugas', PetugasController::class);
    Route::resource('/dataadmin', AdminController::class);

    Route::get('/datasiswa/{id}/upload-photo', [SiswaController::class, 'uploadPhoto']);
    Route::put('/datasiswa/{id}/upload-photo', [SiswaController::class, 'sendPhoto']);
    Route::get('/datapetugas/{id}/upload-photo', [PetugasController::class, 'uploadPhoto']);
    Route::put('/datapetugas/{id}/upload-photo', [PetugasController::class, 'sendPhoto']);
    Route::get('/dataadmin/{id}/upload-photo', [AdminController::class, 'uploadPhoto']);
    Route::put('/dataadmin/{id}/upload-photo', [AdminController::class, 'sendPhoto']);
    
    Route::resource('/datapembayaran', PembayaranController::class);
    Route::get('/entri-pembayaran', [PembayaranController::class, 'create']);
    Route::get('/entri-pembayaran/{id}/detail-siswa', [PembayaranController::class, 'idSiswa']);
    Route::get('/datapembayaran/{id}/proses', [PembayaranController::class, 'prosesPembayaran']);
    Route::get('/datapembayaran/{id}/paybysiswa', [PembayaranController::class, 'editPembayaranBySiswa']);
    Route::put('/datapembayaran/{id}/proses', [PembayaranController::class, 'updateProses']);
    Route::get('/datapembayaran/{id}/{idsiswa}', [PembayaranController::class, 'show']);
    Route::get('/datapembayaran/{id}/{idsiswa}/print-pembayaran', [PembayaranController::class, 'printPembayaran']);
    
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
    Route::get('/history/{id}/{idsiswa}', [HistoryController::class, 'show'])->name('history.show');
    
    Route::resource('/laporan', LaporanController::class);

    Route::get('/pengaturan', [FeatureController::class, 'pengaturan']);
    Route::put('/pengaturan/{id}', [FeatureController::class, 'update'])->name('updateSekolah');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'editProfile']);
    Route::put('/profile/{id}', [ProfileController::class, 'update']);
    Route::get('/profile/ubahpassword', [ProfileController::class, 'ubahPassword']);
    Route::put('/profile/ubahpassword/{id}', [ProfileController::class, 'changePassword']);
    Route::get('/datakelas/delete/{id}', [KelasController::class, 'destroy'])->name('delete');
});

Route::get('/profile-siswa', [ManageSiswaController::class, 'profile'])->name('profile-siswa.index');
Route::get('/profile-siswa/edit', [ManageSiswaController::class, 'edit']);
Route::put('/profile-siswa/{id}', [ManageSiswaController::class, 'update']);
Route::get('/profile-siswa/password', [ManageSiswaController::class, 'passwordSiswa']);
Route::put('/profile-siswa/password/{id}', [ManageSiswaController::class, 'changePassword']);

Route::get('/siswa/{id}/beranda', [ManageSiswaController::class, 'beranda'])->name('beranda');
Route::get('/siswa/{id}/entri-pembayaran', [ManageSiswaController::class, 'entriPembayaranSiswa']);
Route::post('/siswa/{id}/entri-pembayaran', [ManageSiswaController::class, 'postEntriPembayaran']);
Route::get('/siswa/{id}/riwayat-pembayaran', [ManageSiswaController::class, 'indexHistory'])->name('riwayat');
Route::get('/siswa/{id}/fyi', [ManageSiswaController::class, 'fyi']);

Route::view('cek', 'admin.datapembayaran.print-pembayaran');
