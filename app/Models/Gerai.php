<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerai extends Model
{
    use HasFactory;
    private static $daftarMenu = [
        [
            "nama" => "Nasi Goreng",
            "slug" => "nasi-goreng",
            "harga" => "Rp. 10.000",
            "stok" => "Tersedia",
            "image" => "img/makanan.jpeg"
        ],
        [
            "nama" => "Nasi Goreng Spesial",
            "slug" => "nasi-goreng-spesial",
            "harga" => "Rp. 20.000",
            "stok" => "Tersedia",
            "image" => "img/makanan.jpeg"
        ],
    ];

    public static function getall()
    {
        return collect(self::$daftarMenu);
    }

    public static function find($slug)
    {
        $menu = static::getall();
        // $n_menu = [];
        // foreach ($daftarMenu as $menu) {
        //     if ($menu['slug'] === $slug) {
        //         $n_menu = $menu;
        //     }
        // }
        return $menu->firstWhere('slug', $slug);
    }
}