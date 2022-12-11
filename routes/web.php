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

#Login
Route::post('/Login', [LoginController::class, 'loginAsPenjual']);
Route::post('/Login/penjual', [LoginController::class, 'loginAsPenjual']);
Route::post('/Login/kasir', [LoginController::class, 'loginAsKasir']);

#Ke Halaman Utama
Route::get('/HalamanUtamaPembeli', [LoginController::class, 'loginAsGuest']);
Route::get('/LoginPenjual', [LoginController::class, 'showLoginAsPenjual']);
Route::get('/LoginKasir', [LoginController::class, 'showLoginAsKasir']);

#Pembeli
Route::get('/Gerai', [PembeliController::class, 'index']);
Route::get('/HalamanUtamaPembeli/{gerai:id}', [PembeliController::class, 'showDaftarMenu']);
Route::get('/Gerai/{menu:id}', [PembeliController::class, 'showMenu']);
Route::post('/Gerai/Keranjang', [PembeliController::class, 'showKeranjang']);
Route::post('/Gerai/Pesan', [PembeliController::class, 'pesan']);
Route::get('/Gerai/Pembayaran/{DaftarPesanan:id}', [PembeliController::class, 'showHalamanPembayaran']);
Route::post('/Gerai/Pembayaran/Bayar/{DaftarPesanan:id}', [PembeliController::class, 'bayar']);

#Kasir
Route::get('/HalamanUtamaKasir', [KasirController::class, 'showHalamanUtamaKasir']);
Route::get('/Kasir/DaftarPesanan/{daftarPesanan:id}', [KasirController::class, 'showDaftarPesanan']);
Route::get('/Kasir/Keuangan', [KasirController::class, 'kelolaKeuangan']);
Route::post('/Kasir/DaftarPesanan/Konfirmasi/{daftarPesanan:id}', [KasirController::class, 'konfirmasi']);

#Penjual

#Tambah Menu - Penjual
Route::get('/HalamanUtamaPenjual', [PenjualController::class, 'showHalamanUtamaPenjual']);
Route::get('/Penjual/TambahMenu', [PenjualController::class, 'showHalamanTambahMenu']);
Route::post('/Penjual/TambahMenu', [PenjualController::class, 'tambahMenu']);
Route::get('/Penjual/Menu/{menu:id}', [PenjualController::class, 'lihatMenu']);

//Halaman Menu - Penjual
Route::get('/Penjual/Menu/Edit/{menu:id}', [PenjualController::class, 'showHalamanEditMenu']);
Route::post('/Penjual/Menu/Hapus/{menu:id}', [PenjualController::class, 'hapusMenu']);
Route::post('/Penjual/Menu/Edit/{menu:id}', [PenjualController::class, 'editMenu']);

Route::get('/Penjual/DaftarPesanan', [PenjualController::class, 'showDaftarPesanan']);
Route::get('/Penjual/DaftarPesanan/{daftarPesanan:id}', [PenjualController::class, 'showPesanan']);
Route::post('/Penjual/DaftarPesanan/SelesaikanPesanan/{pesanan:id}', [PenjualController::class, 'selesaikanPesanan']);

#Logout
Route::get('/Logout', [LoginController::class, 'logout']);