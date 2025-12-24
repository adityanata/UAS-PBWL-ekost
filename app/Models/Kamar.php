<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    // Tambahkan bagian ini agar Laravel mengizinkan input data
    protected $fillable = [
        'nomor_kamar', 
        'fasilitas', 
        'harga', 
        'status'
    ];
    
    // Relasi (Opsional, sudah kita bahas sebelumnya)
    public function penghuni() {
        return $this->hasOne(Penghuni::class);
    }
}