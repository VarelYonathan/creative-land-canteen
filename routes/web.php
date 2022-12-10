<?php

use App\Http\Controllers\KasirController;
use App\Http\Controllers\LoginController;
use App\Models\Gerai;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PenjualController;
use App\Models\Penjual;
use App\Models\Kasir;

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

#Halaman Awal
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

#Ke Halaman Utama
Route::get('/HalamanUtamaPembeli', [LoginController::class, 'loginAsGuest']);
Route::get('/LoginPenjual', [LoginController::class, 'showLoginAsPenjual']);
Route::get('/LoginKasir', [LoginController::class, 'showLoginAsKasir']);

#Login
Route::post('/Login', [LoginController::class, 'loginAsPenjual']);
Route::post('/Login/penjual', [LoginController::class, 'loginAsPenjual']);
Route::post('/Login/kasir', [LoginController::class, 'loginAsKasir']);

#Halaman Utama Pembeli
Route::get('/Gerai', [PembeliController::class, 'index']);
Route::get('Gerai/{menu:idMenu}', [PembeliController::class, 'showMenu']);

#Halaman Utama Penjual
Route::get('/HalamanUtamaPenjual/{penjual:username}', [PenjualController::class, 'showHalamanUtamaPenjual']);
Route::get('/HalamanUtamaKasir', [KasirController::class, 'showHalamanUtamaKasir']);

#Daftar Menu dari gerai
Route::get('/HalamanUtamaPembeli/{gerai:idGerai}', [PembeliController::class, 'showDaftarMenu']);
// Route::get('/{gerai:idGerai}/{menu:idMenu}', [PembeliController::class, 'ShowDaftarMenu']);

#Tambah Menu - Penjual
Route::get('/Penjual/TambahMenu', [PenjualController::class, 'showHalamanTambahMenu']);
Route::post('/Penjual/TambahMenu', [PenjualController::class, 'tambahMenu']);
Route::get('/Penjual/Menu/{menu:idMenu}', [PenjualController::class, 'lihatMenu']);

//Halaman Menu - Penjual
Route::get('Penjual/Menu/Edit/{menu:idmenu}', [PenjualController::class, 'showHalamanEditMenu']);
Route::post('Penjual/HapusMenu/{menu:idmenu}', [PenjualController::class, 'hapusMenu']);
Route::post('Penjual/Menu/Edit/{menu:idmenu}', [PenjualController::class, 'editMenu']);

#Logout
Route::get('/Logout', [LoginController::class, 'logout']);