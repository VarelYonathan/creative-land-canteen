<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = "pesanan";
    // public $timestamps = false;
    // protected $primarykey = 'idPesanan';

    protected $fillable = [
        'id', 'pesanan', 'jumlahPesanan', 'statusPesanan', 'daftarPesanan'
        // 'idPesanan', 'pesanan', 'jumlahPesanan', 'statusPesanan', 'daftarPesanan'
    ];

    public function daftarPesanan()
    {
        // return $this->belongsTo(DaftarPesanan::class, 'daftarPesanan');
        // return $this->belongsTo(DaftarPesanan::class, 'daftarPesanan');
        return $this->belongsTo(DaftarPesanan::class);
    }
    public function menu()
    {
        return $this->hasOne(Menu::class, 'pesanan');
    }
}