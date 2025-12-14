<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';

    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
        'slug',
        'keterangan',
        'peluang_kerja',
        'materi',
        'foto',
    ];
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($jurusan) {
            if ($jurusan->foto) {
                Storage::disk('public')->delete($jurusan->foto);
            }
        });
    }
}
