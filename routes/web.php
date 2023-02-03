<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KompetensiKeahlianController;
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

Route::get('/login', function () {
    return view('admin.login');
});

Route::get('/edit-kelas', function () {
    return view('admin.datakelas.edit-kelas');
})->name('edit-kelas');

Route::get('/profile', function () {
    return view('admin.profile');
})->name('profile');

// Route::view('/datasiswa', 'admin.datasiswa.index-siswa');

Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::resource('/dataprodi', KompetensiKeahlianController::class);
Route::resource('/datakelas', KelasController::class);
Route::resource('/datasiswa', SiswaController::class);
Route::resource('/dataspp', SppController::class);