<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalAkademik extends Model
{
    protected $fillable = [
        'hari',
        'kode_mk',
        'id_ruang',
        'id_gol'
    ];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_mk');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_gol');
    }
}