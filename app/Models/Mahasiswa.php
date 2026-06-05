<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Mahasiswa extends Model
{
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nim',
        'user_id',
        'nama',
        'alamat',
        'nohp',
        'semester',
        'id_gol',
        
    ];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_gol');
    }

    public function presensi()
    {
        return $this->hasMany(PresensiAkademik::class, 'nim');
    }

    public function krs()
    {
        return $this->hasMany(Krs::class, 'nim');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}