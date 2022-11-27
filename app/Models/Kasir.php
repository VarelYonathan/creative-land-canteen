<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;

    protected $table = "kasir";

    protected $fillable = [
        'idKasir', 'username', 'password'
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