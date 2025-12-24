<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    // Izinkan kolom ini diisi
    protected $fillable = [
        'kamar_id',
        'nama_lengkap',
        'nik',
        'no_hp',
        'tanggal_masuk'
    ];

    // Relasi ke Kamar
    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}