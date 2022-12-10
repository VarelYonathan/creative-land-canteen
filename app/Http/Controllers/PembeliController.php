<?php

namespace App\Http\Controllers;

use App\Models\Gerai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;

class PembeliController extends Controller
{
    //
    public function index()
    {
        return view('HalamanDaftarMenu', [
            "title" => "Halaman Daftar Menu",
            "menus" => Menu::get(),
            "image" => "makanan.jpeg"
        ]);
    }

    public function showMenu(Menu $menu)
    {
        return view('HalamanMenu', [
            "title" => "Halaman Menu",
            // "menu" => Gerai::find($id)
            "menu" => $menu,
            "image" => "makanan.jpeg"
        ]);
    }

    public function showDaftarMenu(Gerai $gerai)
    {
        return view('HalamanDaftarMenu', [
            "title" => "Halaman Daftar Menu",
            // "menus" => Menu::where('gerai', $gerai->idGerai)->get(),
            "menus" => Menu::where('gerai', $gerai->id)->get(),
            "image" => "makanan.jpeg"
        ]);
    }
}