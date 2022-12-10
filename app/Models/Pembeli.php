<?php

namespace App\Models;

use Database\Factories\PembeliFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pembeli extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $primarykey = 'idPembeli';
    public $incrementing = true;

    protected $table = "pembeli";

    protected $fillable = [
        'idPembeli', 'nomorMeja'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function daftarPesanan()
    {
        return $this->hasMany(DaftarPesanan::class, 'idPembeli', 'pembeli');
    }
}