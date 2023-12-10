<?php

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

Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugas.create');
Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
Route::get('/tugas/{id}', [TugasController::class, 'show'])->name('tugas.show');
Route::get('/tugas/{id}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
Route::put('/tugas/{id}', [TugasController::class, 'update'])->name('tugas.update');
Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');
Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');

Route::resource('dosen', DosenController::class);
Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/tugasmhs', function () {
    return view('tugas.mahasiswa.mahasiswa');
});
