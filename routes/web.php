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
    Route::get('/dashboard', function () {
        return view('pages.index');
    })->name('dashboard');
    Route::get('/dashboard/admin/obat',[ObatController::class,'index'])->name('obat.index');
    Route::get('/dashboard/admin/obat/tambah',[ObatController::class,'create'])->name('obat.create');
    Route::get('/dashboard/admin/obat/{obat}',[ObatController::class,'edit'])->name('obat.edit');
    Route::post('/dashboard/admin/obat/tambah',[ObatController::class,'store'])->name('obat.store');
    Route::put('/dashboard/admin/obat/{obat}',[ObatController::class,'update'])->name('obat.update');
    Route::delete('/dashboard/admin/obat/{obat}',[ObatController::class,'destroy'])->name('obat.delete');
    
    Route::get('/dashboard/admin/poli',[PoliController::class,'index'])->name('poli.index');
    Route::get('/dashboard/admin/poli/tambah',[PoliController::class,'create'])->name('poli.create');
    Route::get('/dashboard/admin/poli/{poli}',[PoliController::class,'edit'])->name('poli.edit');
    Route::post('/dashboard/admin/poli/tambah',[PoliController::class,'store'])->name('poli.store');
    Route::put('/dashboard/admin/poli/{poli}',[PoliController::class,'update'])->name('poli.update');
    Route::delete('/dashboard/admin/poli/{poli}',[PoliController::class,'destroy'])->name('poli.delete');   
    

    Route::get('/dashboard/admin/dokter',[DokterController::class,'index'])->name('dokter.index');
    Route::get('/dashboard/admin/dokter/tambah',[DokterController::class,'create'])->name('dokter.create');
    Route::get('/dashboard/admin/dokter/{dokter}',[DokterController::class,'edit'])->name('dokter.edit');
    Route::post('/dashboard/admin/dokter/tambah',[DokterController::class,'store'])->name('dokter.store');
    Route::put('/dashboard/admin/dokter/{dokter}',[DokterController::class,'update'])->name('dokter.update');
    Route::delete('/dashboard/admin/dokter/{dokter}',[DokterController::class,'destroy'])->name('dokter.delete');  


    Route::get('/riwayat', function () {
        return view('pages.riwayat.index');
    })->name('riwayat');


    Route::get('/pasien', function () {
        return view('pages.pasien.index');
    })->name('pasien');

    Route::get('/dashboard/jadwal',[JadwalController::class,'index'])->name('jadwal.index');  
    Route::post('/dashboard/jadwal',[JadwalController::class,'store'])->name('jadwal.store'); 
    Route::put('/dashboard/jadwal/{jadwal}',[JadwalController::class,'update'])->name('jadwal.update'); 
    
    
    Route::get('/dashboard/dokter',[DashboardController::class,'dashboardDokter'])->name('dokter.home');  
    Route::get('/dashboard/pasien',[DashboardController::class,'dashboardPasien'])->name('pasien.home');  
    Route::get('/dashboard/admin',[DashboardController::class,'dashboardAdmin'])->name('admin.home');  
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');  

    Route::get('/dashboard/pasien/{daftarPoli}',[PeriksaController::class,'index'])->name('pasien.periksa');  

    Route::get('/dashboard/dokter/periksa',[PeriksaController::class,'indexDokter'])->name('dokter.periksa');  
    Route::get('/dashboard/dokter/periksa/{detail}',[PeriksaController::class,'createPeriksa'])->name('dokter.periksa.create');  
    Route::post('/dashboard/dokter/periksa/{detail}',[PeriksaController::class,'savePeriksa'])->name('dokter.periksa.save');  
    Route::get('/dashboard/dokter/periksa/{periksa}/edit',[PeriksaController::class,'editPeriksa'])->name('dokter.periksa.edit');  
    Route::put('/dashboard/dokter/periksa/{periksa}/edit',[PeriksaController::class,'updatePeriksa'])->name('dokter.periksa.update');  

    Route::get('/dashboard/dokter/riwayat',[DashboardController::class,'riwayatPasien'])->name('dokter.riwayat');  
});
//obat
Route::get('/auth/pasien',[LoginController::class,'login_pasien'])->name('login.pasien');
Route::get('/auth/dokter',[LoginController::class,'login_dokter'])->name('login.dokter');
Route::get('/auth/admin',[LoginController::class,'login_admin'])->name('login.admin');
Route::get('/register/pasien',[LoginController::class,'register'])->name('register.pasien');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register/pasien',[LoginController::class,'save'])->name('save.pasien');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
