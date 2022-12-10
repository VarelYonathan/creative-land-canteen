<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kasir extends Authenticatable
{
    use HasFactory;

    protected $table = "kasir";
    public $timestamps = false;
    protected $primarykey = 'idKasir';
    public $incrementing = true;

    protected $fillable = [
        'idKasir', 'username', 'namaKasir', 'password'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function daftarPesanan()
    {
        return $this->hasMany(DaftarPesanan::class);
    }
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}