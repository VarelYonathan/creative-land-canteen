<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;


    protected $table = "laporan";

    protected $fillable = [
        'idLaporan', 'kasir', 'total'
    ];

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'kasir');
    }
}