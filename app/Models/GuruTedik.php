<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuruTedik extends Model
{
    use HasFactory;
    protected $table = 'guru_tediks';
    protected $fillable = [
        'nip',
        'nama_lengkap',
        'jabatan',
        'bidang_studi',
        'jenis_kelamin',
        'nomor_hp',
        'alamat',
        'foto',
    ];
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($guru) {
            if ($guru->foto && \Storage::disk('public')->exists($guru->foto)) {
                \Storage::disk('public')->delete($guru->foto);
            }
        });
    }

    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : asset('assets/images/user2.jpeg');
    }
}
