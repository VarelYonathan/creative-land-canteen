<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPesanan extends Model
{
    use HasFactory;

    protected $table = "daftarpesanan";
    protected $primarykey = 'idDaftarPesanan';
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = [
        'idDaftarPesanan', 'totalHarga', 'gerai', 'tanggalPemesanan', 'invoice', 'statusPembayaran', 'pembeli', 'kasir'
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'idDaftarPesanan', 'daftarPesanan');
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
    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'kasir');
    }
}