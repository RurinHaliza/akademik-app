<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $fillable = [
        'nama_gol'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_gol');
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalAkademik::class, 'id_gol');
    }
}