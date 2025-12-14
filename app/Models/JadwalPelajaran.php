<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{

    protected $fillable = [
        'nama',
        'jenis',
        'path'
    ];
}
