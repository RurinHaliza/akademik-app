<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengampu extends Model
{
    protected $table = 'pengampus';

    protected $fillable = [
        'kode_mk',
        'nip'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nip');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_mk');
    }
}