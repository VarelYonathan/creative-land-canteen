<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function showHalamanUtamaKasir()
    {
        return view('HalamanUtamaKasir', [
            'title' => "Halaman Utama Kasir"
        ]);
    }
}