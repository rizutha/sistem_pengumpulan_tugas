<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengumpulanController;
use App\Http\Controllers\TugasController;
use App\Models\Dosen;
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

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [AuthController::class, 'auth']);
Route::get('/beranda', function () {
    return view('dashboard');
});
Route::group(['middleware' => 'checkRole:admin'], function () {

    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.detail');
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::get('/dosen/{id}', [DosenController::class, 'show'])->name('dosen.show');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');

});
Route::group(['middleware' => 'checkRole:dosen'], function () {

    Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugas.create');
    Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
    Route::get('/tugas/{id}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
    Route::post('/tugas/{id}/update', [TugasController::class, 'update']);
    Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');
    Route::get('/profildsn', [DosenController::class, 'showProfil'])->name('profildsn');
    Route::get('datamhs', [DosenController::class, 'showMahasiswa'])->name('datamhs');
    Route::get('/detailmhs/{id}', [DosenController::class, 'detail'])->name('detailmhs');

});
Route::group(['middleware' => 'checkRole:mahasiswa'], function () {

    Route::get('/tugasmhs', [TugasController::class, 'detail'])->name('tugasmhs');
    Route::get('/profilmhs', [MahasiswaController::class, 'showProfil'])->name('profilmhs');
    Route::post('/pengumpulan', [PengumpulanController::class, 'create'])->name('pengumpulan.create');

});

// ...

// Rute untuk menampilkan halaman index pengumpulan
Route::get('/pengumpulan', [PengumpulanController::class, 'index'])->name('pengumpulan.index');

// Rute untuk menampilkan formulir submit tugas
Route::get('/pengumpulan/create', [PengumpulanController::class, 'create'])->name('pengumpulan.create');

// Rute untuk memproses submit tugas
Route::post('/pengumpulan/create', [PengumpulanController::class, 'store'])->name('pengumpulan.store');

// Rute untuk menampilkan halaman edit pengumpulan
Route::get('/pengumpulan/{id}/edit', [PengumpulanController::class, 'edit'])->name('pengumpulan.edit');

// Rute untuk memproses edit pengumpulan
Route::put('/pengumpulan/{id}', [PengumpulanController::class, 'update'])->name('pengumpulan.update');

// ...

Route::get('/logout', [AuthController::class, 'logout']);
