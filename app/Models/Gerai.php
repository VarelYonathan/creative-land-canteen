<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerai extends Model
{
    use HasFactory;

    protected $table = "gerai";
    // public $timestamps = false;
    // protected $primarykey = 'idGerai';

    protected $fillable = [
        'id', 'namaGerai', 'penjual', 'status'
    ];

    public function penjual()
    {
        return $this->hasOne(Penjual::class, 'penjual');
    }

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }

    ## belongs to daftar pesanan??
}