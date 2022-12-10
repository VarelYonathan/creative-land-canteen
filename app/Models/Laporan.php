<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;


    protected $table = "laporan";
    // public $timestamps = false;
    // protected $primarykey = 'idLaporan';

    protected $fillable = [
        'id', 'kasir', 'total'
    ];

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'kasir');
    }
}