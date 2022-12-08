<?php

use App\Http\Controllers\KasirController;
use App\Http\Controllers\LoginController;
use App\Models\Gerai;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PenjualController;
use App\Models\Penjual;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('HalamanAwal', [
        'title' => "Halaman Awal"
    ]);
});
Route::Post('/', function () {
    return view('HalamanAwal', [
        'title' => "Halaman Awal"
    ]);
});

Route::get('/Gerai', [PembeliController::class, 'index']);
Route::get('Gerai/{menu:idMenu}', [PembeliController::class, 'showMenu']);

Route::get('/HalamanUtamaPembeli', [LoginController::class, 'loginAsGuest']);
Route::get('/LoginPenjual', [LoginController::class, 'showLoginAsPenjual']);
Route::get('/LoginKasir', [LoginController::class, 'showLoginAsKasir']);

Route::post('/Login', [LoginController::class, 'loginAsPenjual']);
Route::post('/Login/penjual', [LoginController::class, 'loginAsPenjual']);
Route::post('/Login/kasir', [LoginController::class, 'loginAsKasir']);

Route::get('/HalamanUtamaPenjual', [PenjualController::class, 'showHalamanUtamaPenjual']);
Route::get('/HalamanUtamaKasir', [KasirController::class, 'showHalamanUtamaKasir']);

// Route::post('/Login', [LoginController::class, 'index']);

Route::get('/HalamanUtamaPembeli/{gerai:idGerai}', [PembeliController::class, 'showDaftarMenu']);
Route::get('/{gerai:idGerai}/{menu:idMenu}', [PembeliController::class, 'showHalaman']);