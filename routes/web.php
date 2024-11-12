<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KetersediaanRuanganController;

Route::get('/', function () {
    // return view('login'); 
    return view('welcome'); 
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

// BAGIAN AKADEMIK
Route::get('/dashboard_BA', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/login', function () {
    return redirect()->route('dashboard_BA');
})->name('proses_login');

Route::get('/dashboard_BA', function () {
    return view('dashboard_BA'); 
})->name('dashboard_BA');

Route::get('/manajemen_ruang', [RuanganController::class, 'showManajemenRuang'])->name('manajemen_ruang');
Route::get('/ruangan/gedung', [RuanganController::class, 'getRuangByGedung']);
Route::get('/ketersediaan_ruang', [KetersediaanRuanganController::class, 'index'])->name('ketersediaan_ruang');
Route::post('/ketersediaan_ruang', [KetersediaanRuanganController::class, 'store'])->name('ketersediaan_ruang.store');
Route::post('/ruangan/atur-kapasitas', [RuanganController::class, 'aturKapasitas'])->name('ruangan.aturKapasitas');
Route::delete('/ruangan/{id_ruang}', [RuanganController::class, 'hapus'])->name('ruangan.hapus');

// DEKAN
// KAPRODI

// MAHASISWA
Route::get('/dashboard_mhs', function () {
    return view('dashboard_mhs'); 
})->name('dashboard_mhs');

// PEMBIMBING AKADEMIK