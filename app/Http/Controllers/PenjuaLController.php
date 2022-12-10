<?php

namespace App\Http\Controllers;

use App\Models\Gerai;
use App\Models\Menu;
use App\Models\Penjual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualController extends Controller
{
    public function showHalamanUtamaPenjual(Penjual $penjual, Request $request)
    {
        // $gerai = Gerai::where('penjual', $penjual->idPenjual)->get();
        // $menu = [];
        // $i = 0;
        // foreach ($gerai as $g) {
        //     $m = Menu::where('gerai', $gerai[$i]->idGerai)->get();
        //     ++$i;
        //     foreach ($m as $me) {
        //         $menu[] = $me;
        //     }
        // }

        $gerai = Gerai::where('penjual', $penjual->id)->get();
        $menu = [];
        $i = 0;
        foreach ($gerai as $g) {
            $m = Menu::where('gerai', $gerai[$i]->id)->get();
            ++$i;
            foreach ($m as $me) {
                $menu[] = $me;
            }
        }
        $request->session()->put('gerai', $gerai);
        return view('HalamanUtamaPenjual', [
            'title' => "Halaman Utama Penjual",
            // "menus" => Menu::where('gerai', $gerai[0]->idGerai)->get(),
            "menus" => $menu,
            "image" => "makanan.jpeg"
        ]);
    }

    public function showHalamanTambahMenu(Request $request)
    {
        $gerai = $request->session()->get('gerai');
        return view('HalamanTambahMenu', [
            'title' => "Halaman Tambah Menu",
            'gerai' => $gerai[0]->id
        ]);
    }

    public function showHalamanEditMenu(Menu $menu, Request $request)
    {
        // $m = $request->session()->put('menu', $menu);
        return view('HalamanModifikasiMenu', [
            'title' => "Halaman Edit Menu",
            'menu' => $menu,
            // 'idMenu' => $request->session()->get('menu')
            'idMenu' => 1
        ]);
    }

    public function lihatMenu(Menu $menu)
    {
        return view('HalamanMenu', [
            "title" => "Halaman Menu",
            "menu" => $menu,
            "image" => "makanan.jpeg",
            "role" => "1"
        ]);
    }

    public function tambahMenu(Request $request)
    {
        $nama = $request->input('namaMenu');
        $harga = $request->input('hargaMenu');
        $gerai = $request->input('gerai');
        $data = array('namaMenu' => $nama, "stokMenu" => 0, "hargaMenu" => $harga, "gerai" => $gerai);
        DB::table('menu')->insert($data);
        $user = $request->session()->get('user');
        $username = $user[0]->username;

        $user = $request->session()->get('user');
        $username = $user[0]->username;
        return redirect()->intended("/HalamanUtamaPenjual/$username");
        // echo "Record inserted successfully.<br/>";
        // echo "<a href = '/HalamanUtamaPenjual/$username'>Click Here</a> to go back.";
    }

    public function editMenu(Request $request)
    {
        $id = $request->input('idMenu');
        $menu = Menu::find($id);
        $menu->namaMenu = $request->input('namaMenu');
        $menu->hargaMenu = $request->input('hargaMenu');
        $menu->gerai = $request->input('gerai');

        $menu->save();
        return redirect()->intended("/Penjual/Menu/$id");
    }

    public function hapusMenu(Menu $menu, Request $request)
    {
        $user = $request->session()->get('user');
        $username = $user[0]->username;
        $username = 'penjual1';
        $menu->delete();
        // $menu->truncate();
        return redirect()->intended("/HalamanUtamaPenjual/$username");

        // echo "Record inserted successfully.<br/>";
        // echo "<a href = '/HalamanUtamaPenjual/$username'>Click Here</a> to go back.";
    }
}