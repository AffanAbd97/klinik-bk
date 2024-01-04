<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\PoliController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;

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
    return view('welcome');
})->name('home');

Route::middleware('logedIn')->group(function () {

    ;
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('dashboard/admin')->middleware('dashboard:Admin')->group(function () {

        Route::get('/', [DashboardController::class, 'dashboardAdmin'])->name('admin.home');
        Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
        Route::get('/obat/tambah', [ObatController::class, 'create'])->name('obat.create');
        Route::get('/obat/{obat}', [ObatController::class, 'edit'])->name('obat.edit');
        Route::post('/obat/tambah', [ObatController::class, 'store'])->name('obat.store');
        Route::put('/obat/{obat}', [ObatController::class, 'update'])->name('obat.update');
        Route::delete('/obat/{obat}', [ObatController::class, 'destroy'])->name('obat.delete');

        Route::get('/poli', [PoliController::class, 'index'])->name('poli.index');
        Route::get('/poli/tambah', [PoliController::class, 'create'])->name('poli.create');
        Route::get('/poli/{poli}', [PoliController::class, 'edit'])->name('poli.edit');
        Route::post('/poli/tambah', [PoliController::class, 'store'])->name('poli.store');
        Route::put('/poli/{poli}', [PoliController::class, 'update'])->name('poli.update');
        Route::delete('/poli/{poli}', [PoliController::class, 'destroy'])->name('poli.delete');


        Route::get('/pasien', [DashboardController::class, 'pasienAdmin'])->name('admin.pasien');
        Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
        Route::get('/dokter/tambah', [DokterController::class, 'create'])->name('dokter.create');
        Route::get('/dokter/{dokter}', [DokterController::class, 'edit'])->name('dokter.edit');
        Route::post('/dokter/tambah', [DokterController::class, 'store'])->name('dokter.store');
        Route::put('/dokter/{dokter}', [DokterController::class, 'update'])->name('dokter.update');
        Route::delete('/dokter/{dokter}', [DokterController::class, 'destroy'])->name('dokter.delete');
    });

    Route::prefix('dashboard/dokter')->middleware('dashboard:Dokter')->group(function () {

        Route::get('/', [DashboardController::class, 'dashboardDokter'])->name('dokter.home');
        Route::get('/periksa', [PeriksaController::class, 'indexDokter'])->name('dokter.periksa');
        Route::get('/periksa/{detail}', [PeriksaController::class, 'createPeriksa'])->name('dokter.periksa.create');
        Route::post('/periksa/{detail}', [PeriksaController::class, 'savePeriksa'])->name('dokter.periksa.save');
        Route::get('/periksa/{periksa}/edit', [PeriksaController::class, 'editPeriksa'])->name('dokter.periksa.edit');
        Route::put('/periksa/{periksa}/edit', [PeriksaController::class, 'updatePeriksa'])->name('dokter.periksa.update');

        Route::get('/riwayat', [DashboardController::class, 'riwayatPasien'])->name('dokter.riwayat');

        Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
        Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
        Route::put('/jadwal/{jadwal}', [JadwalController::class, 'update'])->name('jadwal.update');

    });

    Route::prefix('dashboard/pasien')->middleware('dashboard:Pasien')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboardPasien'])->name('pasien.home');
        Route::get('/{daftarPoli}', [PeriksaController::class, 'index'])->name('pasien.periksa');
    });

});
//obat
Route::get('/auth/pasien', [LoginController::class, 'login_pasien'])->name('login.pasien');
Route::get('/auth/dokter', [LoginController::class, 'login_dokter'])->name('login.dokter');
Route::get('/auth/admin', [LoginController::class, 'login_admin'])->name('login.admin');
Route::get('/register/pasien', [LoginController::class, 'register'])->name('register.pasien');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register/pasien', [LoginController::class, 'save'])->name('save.pasien');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
