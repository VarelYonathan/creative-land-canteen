<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerai extends Model
{
    use HasFactory;
    // private static $daftarMenu = [
    //     [
    //         "nama" => "Nasi Goreng",
    //         "slug" => "nasi-goreng",
    //         "harga" => "Rp. 10.000",
    //         "stok" => "Tersedia",
    //         "image" => "img/makanan.jpeg"
    //     ],
    //     [
    //         "nama" => "Nasi Goreng Spesial",
    //         "slug" => "nasi-goreng-spesial",
    //         "harga" => "Rp. 20.000",
    //         "stok" => "Tersedia",
    //         "image" => "img/makanan.jpeg"
    //     ],
    // ];

    protected $table = "gerai";

    protected $fillable = [
        'idGerai', 'namaGerai', 'penjual'
    ];

    public function penjual()
    {
        return $this->hasOne(Penjual::class, 'penjual');
    }

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }

    ## belongs to daftar pesanan??
}