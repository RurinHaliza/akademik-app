<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $primaryKey = 'kode_mk';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester'
    ];

    public function jadwal()
    {
        return $this->hasMany(JadwalAkademik::class, 'kode_mk');
    }

    public function presensi()
    {
        return $this->hasMany(PresensiAkademik::class, 'kode_mk');
    }

    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'kode_mk');
    }
}