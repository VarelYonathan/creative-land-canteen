<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = "invoice";

    protected $fillable = [
        'idInvoice', 'idPembeli', 'idKasir', 'idPenjual'
    ];

    public function daftarPesanan()
    {
        return $this->belongsTo(DaftarPesanan::class, 'idInvoice', 'invoice');
    }
    public function pembeli()
    {
        return $this->hasOne(Penjual::class, 'idPembeli');
    }
    public function kasir()
    {
        return $this->belongsTo(Penjual::class, 'idKasir');
    }
    public function penjual()
    {
        return $this->hasOne(Penjual::class, 'idPenjual');
    }
}