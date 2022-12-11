<?php

namespace App\Http\Controllers;

use App\Models\DaftarPesanan;
use App\Models\Pembeli;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    public function showHalamanUtamaKasir(Request $request)
    {
        $daftarPesanan = DaftarPesanan::where('konfirmasi', 0)->leftJoin('pembeli', 'pembeli', '=', 'pembeli.id')->get();
        return view('HalamanUtamaKasir', [
            'title' => "Halaman Utama Kasir",
            'daftarPesanan' => $daftarPesanan
        ]);
    }

    public function showDaftarPesanan(DaftarPesanan $daftarPesanan)
    {
        $pembeli = Pembeli::where("id", $daftarPesanan->pembeli)->first();
        return view('HalamanDaftarPesanan_Kasir', [
            'title' => "Halaman Daftar Menu",
            'namaPembeli' => $pembeli->namaPembeli,
            'nomorMeja' => $pembeli->nomorMeja,
            'daftarPesanan' => $daftarPesanan
        ]);
    }

    public function konfirmasi(DaftarPesanan $daftarPesanan, Request $request)
    {
        $user = $request->session()->get('user');
        $username = $user[0]->username;
        $daftarPesanan->konfirmasi = 1;
        $daftarPesanan->save();
        $invoice = Invoice::find($daftarPesanan->id)->get();
        $invoice->idKasir = $user->id;
        $invoice->save();

        return redirect()->intended("/HalamanUtamaKasir/$username");
    }

    public function kelolaKeuangan()
    {
        $query = "SELECT Sum(totalHarga) as total, namaPenjual, namaGerai, gerai.id as idGerai, penjual.id FROM `daftarpesanan` join gerai on gerai.id = daftarpesanan.gerai join penjual on penjual.id = gerai.penjual WHERE statusPembayaran = 1 AND konfirmasi =1 GROUP BY gerai.id";

        $data =  DB::select($query);
        // print_r($data);
        return view('HalamanKeuangan', [
            'title' => "Halaman Keuangan",
            'data' => $data
        ]);
    }
}