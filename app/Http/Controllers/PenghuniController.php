<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use App\Models\Kamar; // Jangan lupa panggil Model Kamar
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    // 1. Tampilkan Daftar Penghuni
    public function index()
    {
        // Kita ambil data penghuni beserta data kamarnya (Relasi)
        $penghunis = Penghuni::with('kamar')->get();
        return view('penghuni.index', compact('penghunis'));
    }

    // 2. Form Tambah Penghuni
    public function create()
    {
        // PENTING: Hanya ambil kamar yang statusnya 'Tersedia'
        // Agar admin tidak memasukkan orang ke kamar yang sudah ada isinya
        $kamars = Kamar::where('status', 'Tersedia')->get();
        
        return view('penghuni.create', compact('kamars'));
    }

    // 3. Simpan Data
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|numeric|unique:penghunis,nik',
            'no_hp' => 'required',
            'kamar_id' => 'required|exists:kamars,id', // Pastikan ID kamar valid
            'tanggal_masuk' => 'required|date',
        ]);

        // Simpan Data Penghuni
        Penghuni::create($request->all());

        // UPDATE STATUS KAMAR OTOMATIS
        // Karena kamar sudah dihuni, ubah statusnya jadi 'Terisi'
        $kamar = Kamar::find($request->kamar_id);
        $kamar->update(['status' => 'Terisi']);

        return redirect()->route('penghuni.index')->with('success', 'Penghuni Berhasil Ditambahkan');
    }
}