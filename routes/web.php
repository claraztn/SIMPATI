<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KetersediaanRuanganController;

// Route untuk menampilkan halaman login
Route::get('/', function () {
    // return view('login'); 
    return view('welcome'); 
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route untuk memproses login dan redirect ke dashboard bagian akademik
Route::post('/login', function () {
    // Proses login (bisa ditambahkan logika autentikasi) dan redirect ke dashboard
    return redirect()->route('dashboard');
})->name('proses_login');

// Route untuk menampilkan halaman dashboard dekan
Route::get('/dashboard', function () {
    return view('dashboard'); // Tampilkan halaman dashboard
})->name('dashboard');

// Route untuk menampilkan halaman manajemen ruang menggunakan RuanganController
Route::get('/manajemen_ruang', [RuanganController::class, 'showManajemenRuang'])->name('manajemen_ruang');

// Route untuk mengambil data ruang berdasarkan gedung
Route::get('/ruangan/gedung', [RuanganController::class, 'getRuangByGedung']);

// Route untuk halaman ketersediaan ruang
Route::get('/ketersediaan_ruang', [KetersediaanRuanganController::class, 'index'])->name('ketersediaan_ruang');

// Route untuk menyimpan data ketersediaan ruang
Route::post('/ketersediaan_ruang', [KetersediaanRuanganController::class, 'store'])->name('ketersediaan_ruang.store');

Route::post('/ruangan/atur-kapasitas', [RuanganController::class, 'aturKapasitas'])->name('ruangan.aturKapasitas');
