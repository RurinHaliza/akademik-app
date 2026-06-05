<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Dosen extends Model
{
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nip',
        'user_id',
        'nama',
        'alamat',
        'nohp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'nip');
    }
}