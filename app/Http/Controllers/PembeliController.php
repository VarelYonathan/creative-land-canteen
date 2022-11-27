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
            "menus" => Menu::all()
        ]);
    }

    public function showMenu(Menu $menu)
    {
        return view('HalamanMenu', [
            "title" => "Halaman Menu",
            // "menu" => Gerai::find($id)
            "menu" => $menu
        ]);
    }
}