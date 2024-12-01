<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\RuanganController;
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\IrsController;
// use App\Http\Controllers\KetersediaanRuanganController;



// Route::get('/', function () {
//     return view('auth.login'); 
// });


// Route::get('/', function () {
//     return view('login'); 
//     // return view('welcome'); 
// });



// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

// // BAGIAN AKADEMIK
// Route::get('/dashboard_BA', [DashboardController::class, 'index'])->name('dashboard');

// Route::post('/login', function () {
//     return redirect()->route('dashboard_BA');
// })->name('proses_login');

// Route::get('/dashboard_BA', function () {
//     return view('dashboard_BA'); 
// })->name('dashboard_BA');

// Route::get('/manajemen_ruang', [RuanganController::class, 'showManajemenRuang'])->name('manajemen_ruang');
// Route::get('/ruangan/gedung', [RuanganController::class, 'getRuangByGedung']);
// Route::get('/ketersediaan_ruang', [KetersediaanRuanganController::class, 'index'])->name('ketersediaan_ruang');
// Route::post('/ketersediaan_ruang', [KetersediaanRuanganController::class, 'store'])->name('ketersediaan_ruang.store');
// Route::post('/ruangan/atur-kapasitas', [RuanganController::class, 'aturKapasitas'])->name('ruangan.aturKapasitas');
// Route::delete('/ruangan/{id_ruang}', [RuanganController::class, 'hapus'])->name('ruangan.hapus');

// DEKAN
// KAPRODI

// MAHASISWA
// Route::get('/dashboard_mhs', function () {
//     return view('dashboard_mhs'); 
// })->name('dashboard_mhs');

// Route::get('/buat_IRS', [IrsController::class, 'BuatIRS'])->name('buat_IRS');

// PEMBIMBING AKADEMIK

// ====== Baru

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\MahasiswaController;
// use App\Http\Controllers\DekanController;
// use App\Http\Controllers\DosenWaliController;
// use App\Http\Controllers\KaprodiController;
// use App\Http\Controllers\BagianAkademikController;
// use App\Http\Controllers\RuanganController;
// use App\Http\Controllers\JadwalController;
// use App\Http\Controllers\IrsController;

// // Halaman Login
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// // Rute Pemilihan Peran untuk Dosen
// Route::middleware(['auth'])->group(function () {
//     Route::get('/select-role', [AuthController::class, 'selectRole'])->name('select.role');
//     Route::post('/select-role', [AuthController::class, 'processRole'])->name('process.role');
// });

// // Rute untuk Mahasiswa
// Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
//     Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
//     Route::get('/mahasiswa/irs', [MahasiswaController::class, 'showIRS'])->name('mahasiswa.irs');
//     Route::post('/mahasiswa/irs', [MahasiswaController::class, 'submitIRS'])->name('irs.submit');
//     Route::get('/mahasiswa/registrasi', [MahasiswaController::class, 'showRegistrasi'])->name('mahasiswa.registrasi');
//     Route::post('/mahasiswa/registrasi', [MahasiswaController::class, 'submitRegistrasi'])->name('registrasi.submit');
// });

// // Rute untuk Dekan
// Route::middleware(['auth', 'role:dekan'])->group(function () {
//     Route::get('/dekan/dashboard', [DekanController::class, 'index'])->name('dekan.dashboard');
//     Route::get('/dekan/verifikasi-ruangan', [DekanController::class, 'verifikasiRuangan'])->name('verifikasi.ruangan');
//     Route::get('/dekan/verifikasi-jadwal', [DekanController::class, 'verifikasiJadwal'])->name('verifikasi.jadwal');
// });

// // Rute untuk Dosen Wali
// Route::middleware(['auth', 'role:dosen_wali'])->group(function () {
//     Route::get('/dosen-wali/dashboard', [DosenWaliController::class, 'index'])->name('dosen_wali.dashboard');
//     Route::get('/dosen-wali/memantau-mahasiswa', [DosenWaliController::class, 'monitorMahasiswa'])->name('dosen_wali.monitor_mahasiswa');
// });

// // Rute untuk Kaprodi
// Route::middleware(['auth', 'role:kaprodi'])->group(function () {
//     Route::get('/kaprodi/dashboard', [KaprodiController::class, 'index'])->name('kaprodi.dashboard');
//     Route::get('/kaprodi/verifikasi-kurikulum', [KaprodiController::class, 'verifikasiKurikulum'])->name('kaprodi.verifikasi_kurikulum');
// });

// // Rute untuk Bagian Akademik
// Route::middleware(['auth', 'role:bagian_akademik'])->group(function () {
//     Route::get('/bagianAkademik/dashboard', [BagianAkademikController::class, 'index'])->name('bagianAkademik.dashboard');
//     Route::get('/bagianAkademik/kelola-ruangan', [BagianAkademikController::class, 'kelolaRuangan'])->name('bagianAkademik.kelola_ruangan');
// });

// // Rute Umum untuk Semua Role
// Route::middleware(['auth'])->group(function () {
//     Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
//     Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
// });


// TESSS

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\MahasiswaController;
// use App\Http\Controllers\DekanController;
// use App\Http\Controllers\DosenWaliController;
// use App\Http\Controllers\KaprodiController;
// use App\Http\Controllers\BagianAkademikController;
// use App\Http\Controllers\RuanganController;
// use App\Http\Controllers\JadwalController;



// Route::get('/login', function () {
//         return view('auth.login'); 
//     })->name('login');

// Route::get('/login', [AuthController::class, 'index'])->name('login');

// Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// // Pemilihan Peran untuk Dosen
// Route::get('/select-role', [AuthController::class, 'selectRole'])->name('select.role');
// Route::post('/select-role', [AuthController::class, 'processRole'])->name('process.role');


// // // Rute untuk Mahasiswa
// Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
// Route::get('/mahasiswa/irs', [MahasiswaController::class, 'showIRS'])->name('mahasiswa.irs');
// Route::post('/mahasiswa/irs', [MahasiswaController::class, 'submitIRS'])->name('irs.submit');
// Route::get('/mahasiswa/registrasi', [MahasiswaController::class, 'showRegistrasi'])->name('mahasiswa.registrasi');
// Route::post('/mahasiswa/registrasi', [MahasiswaController::class, 'submitRegistrasi'])->name('registrasi.submit');

// // Rute untuk Dekan
// Route::get('/dekan/dashboard', [DekanController::class, 'index'])->name('dekan.dashboard');
// Route::get('/dekan/verifikasi-ruangan', [DekanController::class, 'verifikasiRuangan'])->name('verifikasi.ruangan');
// Route::post('/dekan/verifikasi.ruangan/{id_ruang}', [DekanController::class, 'verifikasiRuangan'])->name('dekan.verifikasi.ruangan');
// Route::get('/dekan/verifikasi-jadwal', [DekanController::class, 'verifikasiJadwal'])->name('verifikasi.jadwal');

// // Rute untuk Dosen Wali
// // Route::get('/dosen-wali/dashboard', [DosenWaliController::class, 'index'])->name('dosen_wali.dashboard');
// // Route::get('/dosen-wali/memantau-mahasiswa', [DosenWaliController::class, 'monitorMahasiswa'])->name('dosen_wali.monitor_mahasiswa');

// // Rute untuk Kaprodi
// Route::get('/kaprodi/dashboard', [KaprodiController::class, 'index'])->name('kaprodi.dashboard');
// // Route::get('/kaprodi/verifikasi-kurikulum', [KaprodiController::class, 'verifikasiKurikulum'])->name('kaprodi.verifikasi_kurikulum');

// // Rute untuk Bagian Akademik
// Route::get('/bagianAkademik/dashboard', [BagianAkademikController::class, 'index'])->name('bagianAkademik.dashboard');
// Route::get('/bagianAkademik/manajemen_ruang', [BagianAkademikController::class, 'manajemenRuang'])->name('bagianAkademik.manajemen_ruangan');
// Route::get('/manajemen_ruang', [RuanganController::class, 'showManajemenRuang'])->name('manajemen_ruang');
// Route::get('/ruangan/gedung', [RuanganController::class, 'getRuangByGedung']);

// // Rute Umum untuk Semua Role
// Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
// Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');


// baru 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IrsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DekanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\DashboardController;
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
    Route::get('/registrasi', [MahasiswaController::class, 'showRegistrasi'])->name('mahasiswa.registrasi');
    Route::post('/registrasi', [MahasiswaController::class, 'submitRegistrasi'])->name('registrasi.submit');
});

// Dekan
Route::prefix('dekan')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DekanController::class, 'index'])->name('dekan.dashboard');
    Route::get('/verifikasi-ruangan', [DekanController::class, 'verifikasiRuangan'])->name('verifikasi.ruangan');
    Route::get('/verifikasi-jadwal', [DekanController::class, 'verifikasiJadwal'])->name('verifikasi.jadwal');
});


// Rute untuk Kaprodi
Route::prefix('kaprodi')->middleware('auth')->group(function () {
    Route::get('/dashboard', [KaprodiController::class, 'index'])->name('kaprodi.dashboard');
    Route::get('/atur-jadwal', [KaprodiController::class, 'aturJadwal'])->name('kaprodi.atur-jadwal');  
    Route::post('/store-jadwal', [KaprodiController::class, 'storeJadwal'])->name('kaprodi.store-jadwal');
    // Route::post('/ajukan-ke-dekan/{jadwal}', [KaprodiController::class, 'ajukanKeDekan'])->name('kaprodi.ajukan-ke-dekan');
});

// Rute untuk Bagian Akademik
Route::prefix('bagianAkademik')->middleware('auth')->group(function () {
    Route::get('/dashboard', [BagianAkademikController::class, 'index'])->name('bagianAkademik.dashboard');
    Route::get('/manajemen_ruang', [RuanganController::class, 'showManajemenRuang'])->name('bagianAkademik.manajemen_ruang');
});

// Rute untuk Ketersediaan Ruang
Route::get('/ketersediaan_ruang', [KetersediaanRuanganController::class, 'index'])->name('ketersediaan_ruang');
Route::post('/ketersediaan_ruang', [KetersediaanRuanganController::class, 'store'])->name('ketersediaan_ruang.store');

// Rute untuk Manajemen Ruangan
Route::prefix('ruangan')->middleware('auth')->group(function () {
    // Daftar Ruangan
    Route::get('/', [RuanganController::class, 'index'])->name('ruangan.index');
    // Mendapatkan ruangan berdasarkan prodi
    Route::get('/prodi', [RuanganController::class, 'getRuangByProdi']);
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
    Route::get('/jadwal-mengajar', [PembimbingAkademikController::class, 'jadwalMengajar'])->name('pembimbingAkademik.jadwal-mengajar');
});

// // Rute untuk Jadwal
// Route::prefix('jadwal')->middleware('auth')->group(function () {
//     Route::get('/', [JadwalController::class, 'index'])->name('jadwal.index');
// });

########### IRS ###########
// Route::resource('irs', IRSController::class);
Route::get('irs/show', [IrsController::class, 'show'])->name('irs.show');
Route::get('irs/showApproved', [IrsController::class, 'showApproved'])->name('irs.showApproved');
Route::get('irs', [IrsController::class, 'index'])->name('irs.index');

########### JADWAL ###########
Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal.index');


