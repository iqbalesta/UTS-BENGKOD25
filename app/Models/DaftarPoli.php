<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
    protected $table = 'daftar_poli';

    protected $fillable = [
        'id_teknisi',
        'id_jadwal',
        'keluhan',
        'no_antrian',
    ];

    public function teknisi(){
        return $this->belongsTo(User::class, 'id_teknisi');
    }

    public function jadwalPeriksa(){
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal');
    }

    public function periksa(){
        return $this->hasOne(Periksa::class, 'id_daftar_poli');
    }
}
