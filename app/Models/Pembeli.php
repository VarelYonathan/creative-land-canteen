<?php

namespace App\Models;

use Database\Factories\PembeliFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "pembeli";

    protected $fillable = [
        'idPembeli', 'nomorMeja'
    ];

    public function daftarPesanan()
    {
        return $this->hasOne(DaftarPesanan::class, 'idPembeli', 'pembeli');
    }
}