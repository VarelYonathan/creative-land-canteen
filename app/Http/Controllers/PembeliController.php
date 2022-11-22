<?php

namespace App\Http\Controllers;

use App\Models\Gerai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PembeliController extends Controller
{
    //
    public function index()
    {
        return view('HalamanDaftarMenu', [
            "title" => "Halaman Daftar Menu",
            "menus" => Gerai::getall()
        ]);
    }

    public function showMenu($slug)
    {
        return view('HalamanMenu', [
            "title" => "Halaman Menu",
            "menu" => Gerai::find($slug)
        ]);
    }
}