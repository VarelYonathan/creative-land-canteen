<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pesanan;
use Cart;

class DaftarPesanan extends Model
{
    use HasFactory;

    protected $table = "daftarpesanan";
    // protected $primarykey = 'idDaftarPesanan';
    // public $timestamps = false;
    protected $fillable = [
        // 'id', 'totalHarga', 'gerai', 'tanggalPemesanan', 'invoice', 'statusPembayaran', 'pembeli', 'kasir'
        // 'id', 'totalHarga', 'gerai', 'tanggalPemesanan', 'invoice', 'statusPembayaran', 'konfirmasi'
        'id', 'totalHarga', 'gerai', 'invoice', 'statusPembayaran', 'konfirmasi'
    ];

    public function store($id, $nama, $harga)
    {
        Cart::add($id, $nama, 1, $harga)->associate('App\Models\Pesanan;');
    }

    public function pesanan()
    {
        // return $this->hasMany(Pesanan::class, 'idDaftarPesanan', 'daftarPesanan');
        return $this->hasMany(Pesanan::class, 'daftarPesanan');
    }

    public function gerai()
    {
        return $this->hasOne(Gerai::class, 'gerai');
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'invoice');
    }
    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'pembeli');
    }
    // public function kasir()
    // {
    //     return $this->belongsTo(Kasir::class, 'kasir');
    // }
}