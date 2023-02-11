<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KompetensiKeahlianController;
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

Route::get('/dashboard', [FeatureController::class, 'dashboard']);
Route::resource('/dataprodi', KompetensiKeahlianController::class);
Route::resource('/datakelas', KelasController::class);
Route::resource('/datasiswa', SiswaController::class);
Route::resource('/dataspp', SppController::class);
Route::resource('/datapetugas', PetugasController::class);
Route::resource('/dataadmin', AdminController::class);

Route::resource('/datapembayaran', PembayaranController::class);
Route::post('/datapembayaran/create', [PembayaranController::class, 'getKelas'])->name('getKelas');
Route::post('/datapembayaran/create/siswa', [PembayaranController::class, 'getSiswa'])->name('getSiswa');


Route::resource('/history', HistoryController::class);
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'editProfile']);
Route::put('/profile/{id}', [ProfileController::class, 'update']);
Route::get('/profile/ubahpassword', [ProfileController::class, 'ubahPassword']);
Route::put('/profile/ubahpassword/{id}', [ProfileController::class, 'changePassword']);
Route::get('/datakelas/delete/{id}', [KelasController::class, 'destroy'])->name('delete');

Route::get('/profilesiswa', [ManageSiswaController::class, 'profile']);
Route::get('/profilesiswa/edit', [ManageSiswaController::class, 'editProfile']);
Route::get('/profilesiswa/ubahpassword', [ManageSiswaController::class, 'changePasswordSiswa']);

Route::view('/cek', 'siswa.datahistory.riwayat');
