<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = "pesanan";

    protected $fillable = [
        'idPesanan', 'pesanan', 'jumlahPesanan', 'statusPesanan', 'daftarPesanan'
    ];

    public function daftarPesanan()
    {
        return $this->belongsTo(DaftarPesanan::class, 'daftarPesanan');
    }
    public function menu()
    {
        return $this->hasOne(Menu::class, 'pesanan');
    }
}