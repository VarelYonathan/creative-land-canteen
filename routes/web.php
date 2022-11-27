<?php

use App\Models\Gerai;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembeliController;

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
    return view('HalamanUtamaPembeli');
});


Route::get('/daftarMenu', [PembeliController::class, 'index']);

Route::get('daftarMenu/{menu}', [PembeliController::class, 'showMenu']);