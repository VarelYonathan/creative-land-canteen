<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Penjual extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    // protected $primarykey = 'idPenjual';

    protected $table = "penjual";

    protected $fillable = [
        // 'idPenjual', 'username', 'namaPenjual', 'password'
        'id', 'username', 'namaPenjual', 'password'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function gerai()
    {
        return $this->hasOne(Gerai::class);
    }
}