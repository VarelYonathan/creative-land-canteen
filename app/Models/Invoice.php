<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = "invoice";
    // public $timestamps = false;
    // protected $primarykey = 'idInvoice';

    protected $fillable = [
        'id', 'idPembeli', 'idKasir', 'idPenjual'
    ];

    public function daftarPesanan()
    {
        // return $this->belongsTo(DaftarPesanan::class, 'idInvoice', 'invoice');
        return $this->belongsTo(DaftarPesanan::class, 'invoice');
    }
    public function pembeli()
    {
        return $this->hasOne(Penjual::class, 'idPembeli');
        // return $this->hasOne(Penjual::class);
    }
    public function kasir()
    {
        return $this->belongsTo(Penjual::class, 'idKasir');
        // return $this->belongsTo(Penjual::class);
    }
    public function penjual()
    {
        return $this->hasOne(Penjual::class, 'idPenjual');
        // return $this->hasOne(Penjual::class);
    }
}