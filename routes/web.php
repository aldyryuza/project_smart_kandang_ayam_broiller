<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\pakanController;

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\tambahKandangController;
use App\Http\Controllers\detailInformasiController;
use App\Http\Controllers\iotController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\panenController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return view('home');
// });


// Routing Pakan
Route::get('/informasi-pakan', [pakanController::class, 'index'])->middleware('auth');
// Route::get('/tambah-pakan', [pakanController::class, 'create'])->middleware('auth');
Route::get('/pakan/edit/{id}', [pakanController::class, 'edit'])->middleware('auth');
Route::post('/update-pakan', [pakanController::class, 'update'])->middleware('auth');
Route::delete('/pakan/delete/{id}', [pakanController::class, 'destroy'])->middleware('auth');

Route::post('/upload-pakan', [pakanController::class, 'store'])->middleware('auth');



// Routing kandang
Route::get('/tambah-kandang', [tambahKandangController::class, 'create'])->middleware('auth');
Route::get('/data-kandang', [tambahKandangController::class, 'dataKandang'])->middleware('auth');
// Route::get('/detail-informasi-kandang', [tambahKandangController::class, 'show'])->middleware('auth');
Route::get('/home', [tambahKandangController::class, 'index'])->middleware('auth');
Route::get('/kandang/edit/{id}', [tambahKandangController::class, 'edit'])->middleware('auth');

Route::post('/upload-kandang', [tambahKandangController::class, 'store'])->middleware('auth');
Route::post('/update-kandang', [tambahKandangController::class, 'update'])->middleware('auth');
Route::delete('/kandang/delete/{id}', [tambahKandangController::class, 'destroy'])->middleware('auth');


// Routing Detail Informasi Kandang Ayam
Route::get('/detail/{id}', [detailInformasiController::class, 'index'])->middleware('auth');
// Route::get('/tambah-data-informasi-budidaya/{id}', [detailInformasiController::class, 'create'])->middleware('auth');
Route::get('/detail-informasi-harian/{id}', [detailInformasiController::class, 'edit'])->middleware('auth');
Route::post('/upload-detail-informasi', [detailInformasiController::class, 'store'])->middleware('auth');
Route::post('/update-detail-informasi', [detailInformasiController::class, 'update'])->middleware('auth');
Route::delete('/informasi-budidaya/delete/{id}', [detailInformasiController::class, 'destroy'])->middleware('auth');


// Routing Panen
Route::get('/tambah-data-panen/{id}', [panenController::class, 'create'])->middleware('auth');
Route::get('/edit-data-panen/{id}', [panenController::class, 'edit'])->middleware('auth');
Route::post('/upload/panen', [panenController::class, 'store'])->middleware('auth');
Route::post('/update/panen', [panenController::class, 'update'])->middleware('auth');
Route::delete('/panen/delete/{id}', [panenController::class, 'destroy'])->middleware('auth');



// Routing Perangkat
Route::get('/perangkat', [iotController::class, 'index'])->middleware('auth');
Route::post('/upload-perangkat', [iotController::class, 'store'])->middleware('auth');
Route::delete('/hapus-perangkat/{id}', [iotController::class, 'destroy'])->middleware('auth');






// Routing Untuk Login
Route::get('/', [LoginController::class, 'index'])->middleware('guest');

Route::post('/run', [LoginController::class, 'run'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');



// Routing dari Siswa

Route::get('/siswa', [SiswaController::class, 'index']);

Route::post('/tambah-siswa', [SiswaController::class, 'store'])->name('tambah-siswa');


Route::get('/siswa/{id}', [SiswaController::class, 'getId']);
Route::post('/siswa', [SiswaController::class, 'updateSiswa'])->name('update-siswa');
