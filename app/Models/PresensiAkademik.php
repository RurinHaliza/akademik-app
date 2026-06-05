<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresensiAkademik extends Model
{
    protected $fillable = [
        'hari',
        'tanggal',
        'status_kehadiran',
        'nim',
        'kode_mk'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_mk');
    }
}