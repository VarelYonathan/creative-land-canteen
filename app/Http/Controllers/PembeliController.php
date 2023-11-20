<?php

namespace App\Http\Controllers;

use App\Models\Gerai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DaftarPesanan;
use App\Models\Pesanan;
use App\Models\Menu;
use App\Models\Penjual;
use Illuminate\Support\Facades\DB;

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

    public function showDaftarMenu(Gerai $gerai, Request $request)
    {
        // $ger = Gerai::where('id', $gerai->id)->get();
        $request->session()->put('gerai', $gerai);
        return view('HalamanDaftarMenu', [
            "title" => "Halaman Daftar Menu",
            // "menus" => Menu::where('gerai', $gerai->idGerai)->get(),
            "menus" => Menu::where('gerai', $gerai->id)->get(),
            "image" => "makanan.jpeg"
        ]);
    }
    public function showKeranjang(Request $request)
    {
        $id[] = array();
        $kuantitas[] = array();
        $menus[] =  array();
        $n = 0;
        for ($i = 0; $i < $request->input('totalMenu') - 1; $i++) {
            $idInputId = "id$i";
            $idInputKuantitas = "jumlahPesanan$i";
            if ($request->input("$idInputKuantitas") > 0) {
                $identifier = $request->input("$idInputId");
                $id[] = $identifier;
                $kuantitas[] = $request->input("$idInputKuantitas");
                $query = Menu::where('id', $identifier)->get();
                $menus[] = $query[0];
                ++$n;
            }
        }
        $nama = $request->input("namaPembeli");
        if ($nama == "") {
            $nama = "Anonim";
        }
        $pesan = 1;
        if ($n < 1) {
            $pesan = 0;
        }
        unset($id[0]);
        unset($kuantitas[0]);
        unset($menus[0]);
        return view('HalamanDaftarPesanan', [
            "title" => "Keranjang",
            "namaPembeli" => $nama,
            'nomorMeja' =>  $request->input("nomorMeja"),
            'menus' => $menus,
            'kuantitas' => $kuantitas,
            'pesan' => $pesan,
            "image" => "makanan.jpeg"

        ]);
    }

    public function pesan(Request $request)
    {
        $id[] = array();
        $kuantitas[] = array();
        $menus[] =  array();
        $item = $request->input('totalMenu');
        for ($i = 0; $i < $item; $i++) {
            $idInputId = "id$i";
            $idInputKuantitas = "jumlahPesanan$i";
            $identifier = $request->input("$idInputId");
            $id[] = $identifier;
            $kuantitas[] = $request->input("$idInputKuantitas");
            $query = Menu::where('id', $identifier)->get();
            $menus[] = $query[0];
        }
        unset($id[0]);
        unset($kuantitas[0]);
        unset($menus[0]);

        #insert pembeli
        $nama = $request->input("namaPembeli");
        $nomor = $request->input("nomorMeja");
        $pembeli = array(
            'namaPembeli' => $nama,
            "nomorMeja" => $nomor,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        );
        DB::table('pembeli')->insert($pembeli);
        $user = DB::table('pembeli')->latest('created_at')->first();
        $gerai = $request->session()->get('gerai');
        $penjual = Penjual::where('id', $gerai->penjual)->get();

        // #insert invoice
        $idPembeli = $user->id;
        $idKasir = NULL;
        $idPenjual = $penjual[0]->id;
        $invoice = array(
            'idPembeli' => $idPembeli,
            "idKasir" => $idKasir,
            "idPenjual" => $idPenjual,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        );
        DB::table('invoice')->insert($invoice);

        // #insert daftar pesanan
        $idGerai = $gerai->id;
        $invoi = DB::table('invoice')->latest('created_at')->first();
        $daftarPesanan = array(
            'gerai' => $idGerai, 'invoice' => $invoi->id,
            'pembeli' => $user->id,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        );
        DB::table('daftarPesanan')->insert($daftarPesanan);

        // #insert pesanan
        $dp = DaftarPesanan::where('pembeli', $user->id)->get();
        $idDaftarPesanan = $dp[0]->id;
        $harga = [];
        for ($i = 1; $i < $item + 1; $i++) {
            $pesanan = array(
                'pesanan' => $id[$i],
                'jumlahPesanan' => $kuantitas[$i],
                'daftarPesanan' => $idDaftarPesanan,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            );
            DB::table('pesanan')->insert($pesanan);
            $harga[] = $menus[$i]->hargaMenu;
        }
        // print_r($harga);
        $menu_pesanan = Pesanan::where('daftarPesanan', $idDaftarPesanan);
        $total = 0;
        for ($i = 0; $i < count($harga); $i++) {
            $total += $harga[$i] * $kuantitas[$i + 1];
        }
        $dp[0]->totalHarga = $total;

        $dp[0]->save();

        return redirect()->intended("/Gerai/Pembayaran/$idDaftarPesanan");
    }

    public function showHalamanPembayaran(int $id)
    {
        $daftarPesanan = DaftarPesanan::find($id);
        // print_r($daftarPesanan->id);
        return view('HalamanPembayaran', [
            'title' => "Halaman Pembayaran",
            'daftarPesanan' => $daftarPesanan->id
        ]);
    }

    public function bayar(int $id)
    {
        // $daftarPesanan->statusPembayaran = 1;
        // $daftarPesanan->save();
        $query = ("Update daftarpesanan set statusPembayaran = 1 where id = $id");
        DB::update($query);

        // return redirect()->intended("/Gerai");
        return redirect()->intended("/HalamanUtamaPembeli");

        return back()->with('pesan', "Berhasil memesan! ID pesanan anda adalah $id");
    }

    public function cekPesanan(Request $request)
    {
        $daftarPesanan = $request->input("idDaftarPesanan");
        $pesanan = DB::select("Select namaMenu,jumlahPesanan,statusPesanan,daftarPesanan,pesanan.id as pid from `pesanan` join `menu` on pesanan = menu.id where `daftarPesanan` = $daftarPesanan");
        // $pesanan = DB::select("Select * from pesanan where daftarPesanan = $daftarPesanan");
        return view('HalamanCekPesanan', [
            'title' => "Halaman Pesanan",
            'daftarPesanan' => $daftarPesanan,
            'pesanan' => $pesanan
        ]);
    }
}