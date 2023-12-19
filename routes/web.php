<?php

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
    return view('pages.index');
});

Route::get('/obat',[ObatController::class,'index'])->name('obat.index');
Route::get('/obat/tambah',[ObatController::class,'create'])->name('obat.create');
Route::get('/obat/{obat}',[ObatController::class,'edit'])->name('obat.edit');
Route::post('/obat/tambah',[ObatController::class,'store'])->name('obat.store');
Route::put('/obat/{obat}',[ObatController::class,'update'])->name('obat.update');
Route::delete('/obat/{obat}',[ObatController::class,'destroy'])->name('obat.delete');
