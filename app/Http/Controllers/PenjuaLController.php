<?php

namespace App\Http\Controllers;

use App\Models\Gerai;
use App\Models\Menu;
use App\Models\Penjual;
use App\Models\DaftarPesanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualController extends Controller
{
    // public function showHalamanUtamaPenjual(Penjual $penjual, Request $request)
    public function showHalamanUtamaPenjual(Request $request)
    {
        $penjual = $request->session()->get('user');
        $gerai = Gerai::where('penjual', $penjual[0]->id)->get();
        // $gerai = Gerai::where('penjual', $penjual->id)->get();
        $menu = [];
        $i = 0;
        foreach ($gerai as $g) {
            $m = Menu::where('gerai', $gerai[$i]->id)->get();
            foreach ($m as $me) {
                ++$i;
                $menu[] = $me;
            }
        }
        $kosong = 0;
        if ($i < 1) {
            $kosong = 1;
        }
        $request->session()->put('gerai', $gerai);
        return view('HalamanUtamaPenjual', [
            'title' => "Halaman Utama Penjual",
            "menus" => $menu,
            "image" => "makanan.jpeg",
            'kosong' => $kosong
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
        $request->session()->put('menu', $menu);
        return view('HalamanModifikasiMenu', [
            'title' => "Halaman Edit Menu",
            'menu' => $menu
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
        $data = array(
            'namaMenu' => $nama,
            "stokMenu" => 0,
            "hargaMenu" => $harga,
            "gerai" => $gerai,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        );
        DB::table('menu')->insert($data);
        return redirect()->intended("/HalamanUtamaPenjual");
    }

    public function editMenu(Request $request)
    {
        try {
            $id = $request->input('idMenu');
            $menu = Menu::find($id);
            $menu->namaMenu = $request->input('namaMenu');
            $menu->hargaMenu = $request->input('hargaMenu');
            $menu->gerai = $request->input('gerai');
            $menu->save();
            return redirect()->intended("/Penjual/Menu/$id");
        } catch (\Exception $e) {
            report($e);
            return redirect()->intended("/HalamanUtamaPenjual");
            return back()->with('editError', "Error pada saat mengedit menu!");
        }
    }

    public function hapusMenu(Menu $menu, Request $request)
    {
        try {
            $menu->delete();
            return redirect()->intended("/HalamanUtamaPenjual");
        } catch (\Exception $e) {
            report($e);
            return redirect()->intended("/HalamanUtamaPenjual");
        }
    }

    public function showDaftarPesanan()
    {

        // $daftarPesanan = DaftarPesanan::where('konfirmasi', 1)->leftJoin('pembeli', 'pembeli', '=', 'pembeli.id')->get();
        // $daftarPesanan = DB::select("Select * from daftarpesanan where konfirmasi = 1");

        $query = "Select *, daftarPesanan.id as dfid from daftarPesanan join pembeli on pembeli = pembeli.id  where konfirmasi = 1 ORDER BY dfid";
        $daftarPesanan = DB::select($query);
        return view('HalamanDaftarPesanan_Penjual', [
            'title' => "Halaman Daftar Pesanan",
            'daftarPesanan' => $daftarPesanan
        ]);
    }

    public function showPesanan(DaftarPesanan $daftarPesanan)
    {
        $pesanan = DB::select("Select namaMenu,jumlahPesanan,statusPesanan,daftarPesanan,pesanan.id as pid from `pesanan` join `menu` on pesanan = menu.id where `daftarPesanan` = $daftarPesanan->id");

        return view('HalamanPemesanan', [
            "title" => "Halaman Pesanan",
            'pesanan' => $pesanan
        ]);
    }

    public function selesaikanPesanan(Request $request, Pesanan $pesanan)
    // public function selesaikanPesanan(DaftarPesanan $daftarPesanan, Pesanan $pesanan)
    {
        $daftarPesanan = $request->input('idDaftarPesanan');
        // print_r($pesanan->id);
        $pesanan->statusPesanan = 1;
        $pesanan->save();

        return redirect()->intended("/Penjual/DaftarPesanan/$daftarPesanan");
    }
}