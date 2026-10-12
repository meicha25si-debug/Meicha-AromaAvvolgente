<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKue extends Model
{
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];
}
