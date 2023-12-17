<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/beranda', function () {
    return view('dashboard');
});

Route::post('/login', [AuthController::class, 'auth']);
Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugas.create');
Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
Route::get('/tugas/{id}', [TugasController::class, 'show'])->name('tugas.show');
Route::get('/tugas/{id}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
Route::post('/tugas/{id}', [TugasController::class, 'update']);
Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');
Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');

Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
Route::get('/dosen/{id}', [DosenController::class, 'show'])->name('dosen.show');
Route::get('/dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
Route::post('/dosen/{id}', [DosenController::class, 'update']);
Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
// Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
Route::get('/dosen', [DosenController::class, 'profil'])->name('dosen.profil');

Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::post('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/profil', [MahasiswaController::class, 'profil'])->name('mahasiswa.profil');
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/tugasmhs', function () {
    return view('tugas.mahasiswa.mahasiswa');
});
