<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;


    protected $table = "pembeli";

    protected $fillable = [
        'idPembeli', 'nomorMeja'
    ];

    public function daftarPesanan()
    {
        return $this->hasOne(DaftarPesanan::class, 'idPembeli', 'pembeli');
    }
}