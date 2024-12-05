<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DekanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\BagianAkademikController;
use App\Http\Controllers\PembimbingAkademikController;
use App\Http\Controllers\KetersediaanRuanganController;

Route::get('/', function () {
    return view('auth.login');
});

// Rute untuk login dan logout
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk Pemilihan Peran Dosen
Route::get('/select-role', [AuthController::class, 'selectRole'])->name('select.role')->middleware('auth');
Route::post('/select-role', [AuthController::class, 'processRole'])->name('process.role')->middleware('auth');

// Rute untuk Mahasiswa
Route::prefix('mahasiswa')->middleware('auth')->group(function () {
    Route::get('/dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
    Route::get('/irs', [MahasiswaController::class, 'showIRS'])->name('mahasiswa.irs');
    Route::post('/irs', [MahasiswaController::class, 'submitIRS'])->name('irs.submit');
    Route::get('/detail_irs_khs', [MahasiswaController::class, 'showDetail'])->name('mahasiswa.detail-irs-khs');
    // Route::get('/registrasi', [MahasiswaController::class, 'showRegistrasi'])->name('mahasiswa.registrasi');
    Route::post('/registrasi-submit', [MahasiswaController::class, 'submitRegistrasi'])->name('registrasi.submit');
});

// Dekan
Route::prefix('dekan')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DekanController::class, 'index'])->name('dekan.dashboard');
    Route::get('/verifikasi-ruangan', [DekanController::class, 'verifikasiRuangan'])->name('verifikasi.ruangan');
    Route::patch('/verifikasi/ruangan-prodi/{id_prodi}', [DekanController::class, 'submitVerifRuangByProdi'])->name('verifikasi.ruangan.prodi.submit');
    Route::patch('/verifikasi-ruangan/{id_ruang}', [DekanController::class, 'verifikasiRuang'])->name('verifikasi.ruangan.submit');
    Route::get('/verifikasi-jadwal', [DekanController::class, 'verifikasiJadwal'])->name('verifikasi.jadwal');
    Route::patch('/verifikasi-jadwal/{id_jadwal}', [DekanController::class, 'verifikasiJadwalSubmit'])->name('verifikasi.jadwal.submit');
});


// Rute untuk Kaprodi
Route::prefix('kaprodi')->middleware('auth')->group(function () {
    Route::get('/dashboard', [KaprodiController::class, 'index'])->name('kaprodi.dashboard');

    Route::get('/atur-jadwal', [KaprodiController::class, 'aturJadwal'])->name('kaprodi.atur-jadwal');
    Route::post('/store-jadwal', [KaprodiController::class, 'storeJadwal'])->name('kaprodi.store-jadwal');

    Route::get('/atur-matakuliah', [KaprodiController::class, 'aturMatakuliah'])->name('kaprodi.atur-matakuliah'); //index
    Route::post('/atur-matakuliah', [KaprodiController::class, 'updateMatakuliah'])->name('kaprodi.matakuliah.update');
    Route::post('/store-matakuliah', [KaprodiController::class, 'storeMatakuliah'])->name('kaprodi.store-matakuliah');
    Route::delete('/delete-matakuliah/{kode_mk}', [KaprodiController::class, 'deleteMatakuliah'])->name('kaprodi.delete-matakuliah');

    Route::get('/list-matakuliah', [KaprodiController::class, 'listMatakuliah'])->name('kaprodi.list-matakuliah');
    Route::post('/update-matakuliah/{kode_mk}', [KaprodiController::class, 'updateMatakuliah'])->name('kaprodi.update-matakuliah');
});

// Rute untuk Bagian Akademik
Route::prefix('bagianAkademik')->middleware('auth')->group(function () {
    Route::get('/dashboard', [BagianAkademikController::class, 'index'])->name('bagianAkademik.dashboard');
    Route::get('/manajemen_ruang', [RuanganController::class, 'showManajemenRuang'])->name('bagianAkademik.manajemen_ruang');
    Route::get('/ketersediaan_ruang', [RuanganController::class, 'index'])->name('ketersediaan_ruang');
    Route::post('/update_kapasitas{id}', [RuanganController::class, 'update'])->name('bagianAkademik.ruangan.update');
});

// Rute untuk Ketersediaan Ruang

// Rute untuk Manajemen Ruangan
Route::prefix('ruangan')->middleware('auth')->group(function () {
    // Daftar Ruangan
    Route::get('/', [RuanganController::class, 'index'])->name('ruangan.index');
    // Mendapatkan ruangan berdasarkan prodi
    Route::get('/prodi', [RuanganController::class, 'getRuangByProdi'])->name('ruangan.getRuanganByProdi');
    // Mendapatkan ruangan berdasarkan gedung
    Route::get('/gedung', [RuanganController::class, 'getRuangByGedung'])->name('ruangan.getRuanganByGedung');
    // Route::get('/getRuanganByGedung/{gedung}', [RuanganController::class, 'getRuangByGedung']);

    // Atur Kapasitas Ruang
    Route::post('/atur-kapasitas', [RuanganController::class, 'aturKapasitas'])->name('ruangan.aturKapasitas');

    // Hapus Kapasitas Ruang
    Route::delete('/{id_ruang}', [RuanganController::class, 'hapus'])->name('ruangan.hapus');
});

// Pembimbing Akademik
Route::prefix('pembimbing-akademik')->middleware('auth')->group(function () {
    Route::get('/dashboard', [PembimbingAkademikController::class, 'index'])->name('pembimbingAkademik.dashboard');
    Route::get('/irs-mahasiswa', [PembimbingAkademikController::class, 'irsMahasiswa'])->name('pembimbingAkademik.irs-mahasiswa');
    Route::get('/irs-detail/{id_irs}', [PembimbingAkademikController::class, 'irsDetail'])->name('pembimbingAkademik.irs-detail');
    Route::post('/irs-verifikasi', [PembimbingAkademikController::class, 'verifikasiIrs'])->name('pembimbingAkademik.irs.verifikasi');
    Route::get('/jadwal-mengajar', [PembimbingAkademikController::class, 'jadwalMengajar'])->name('pembimbingAkademik.jadwal-mengajar');
});