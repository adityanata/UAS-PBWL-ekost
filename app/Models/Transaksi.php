<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    // Izinkan kolom ini diisi
    protected $fillable = [
        'penghuni_id',
        'tanggal_bayar',
        'bulan_tagihan',
        'jumlah_bayar',
        'keterangan'
    ];

    // Relasi ke Penghuni (Milik siapa pembayaran ini?)
    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }
}