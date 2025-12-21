<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = ['judul', 'keterangan', 'team', 'gambar'];

    protected $casts = [
        'gambar' => 'array',
    ];
}
