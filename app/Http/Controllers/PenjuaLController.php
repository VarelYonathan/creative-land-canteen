<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualController extends Controller
{
    public function showHalamanUtamaPenjual()
    {
        return view('HalamanUtamaPenjual', [
            'title' => "Halaman Utama Penjual"
        ]);
    }
}