<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = "menu";
    // protected $primarykey = 'idMenu';
    // public $timestamps = false;

    protected $fillable = [
        'id', 'namaMenu', 'stokMenu', 'hargaMenu', 'gerai'
    ];

    public function gerai()
    {
        return $this->belongsTo(Gerai::class, 'gerai');
    }
}