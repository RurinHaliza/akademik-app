<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $fillable = [
        'nama_ruang'
    ];

    public function jadwal()
    {
        return $this->hasMany(JadwalAkademik::class, 'id_ruang');
    }
}