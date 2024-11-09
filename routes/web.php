<?php

// use App\Http\Controllers\DashboardController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KetersediaanRuanganController;
use App\Http\Controllers\LoginController;

// Route untuk menampilkan halaman login
Route::get('/', function () {
    return view('login'); 
});

// Route::get('/account/login', [LoginController::class, 'index'])->name('account.login');
// Route::post('/account/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
// Route::get('/account/dashboard2', [DashboardController::class, 'index'])->name('account.dashboard');

// Route untuk memproses login dan redirect ke dashboard bagian akademik
Route::post('/login', function () {
    // Proses login (bisa ditambahkan logika autentikasi) dan redirect ke dashboard
    return redirect()->route('dashboard_bagAkademik');
})->name('process_login');

// Route untuk menampilkan halaman dashboard dekan
Route::get('/dashboard_bagAkademik', function () {
    return view('dashboard_bagAkademik'); // Tampilkan halaman dashboard
})->name('dashboard_bagAkademik');

// Route untuk menampilkan halaman manajemen ruang menggunakan RuanganController
Route::get('/manajemen_ruang', [RuanganController::class, 'showManajemenRuang'])->name('manajemen_ruang');

// Route untuk mengambil data ruang berdasarkan gedung
Route::get('/ruangan/gedung', [RuanganController::class, 'getRuangByGedung']);

// Route untuk halaman ketersediaan ruang
Route::get('/ketersediaan-ruang', [KetersediaanRuanganController::class, 'index'])->name('ketersediaan_ruang');

// Route untuk menyimpan data ketersediaan ruang
Route::post('/ketersediaan-ruang', [KetersediaanRuanganController::class, 'store'])->name('ketersediaan_ruang.store');

// Menambahkan route untuk mengambil ruang berdasarkan gedung
Route::get('/ruangan/gedung', [RuanganController::class, 'getRuangByGedung']);

// Route untuk menangani form pengisian
Route::post('/manajemen_ruang', [RuanganController::class, 'update'])->name('update_ruang');

// Route untuk mengambil data ruang berdasarkan gedung
Route::get('/ruangan/gedung', [RuanganController::class, 'getRuangByGedung']);

// Route untuk menangani form pengisian
Route::post('/manajemen_ruang', [RuanganController::class, 'update'])->name('update_ruang');
