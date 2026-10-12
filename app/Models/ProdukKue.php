<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukKue extends Model
{
    protected $fillable = [
        'nama_kue',
        'kategori',
        'harga',
        'stok',
    ];
}
