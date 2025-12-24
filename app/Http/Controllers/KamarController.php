<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    // 1. Tampilkan Daftar Kamar
    public function index()
    {
        $kamars = Kamar::all(); // Ambil semua data kamar
        return view('kamar.index', compact('kamars'));
    }

    // 2. Tampilkan Form Tambah
    public function create()
    {
        return view('kamar.create');
    }

    // 3. Simpan Data ke Database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nomor_kamar' => 'required|string|max:10',
            'fasilitas' => 'required|string',
            'harga' => 'required|numeric',
            'status' => 'required',
        ]);

        // Simpan ke database
        Kamar::create($request->all());

        // Redirect kembali dengan pesan sukses
        return redirect()->route('kamar.index')->with('success', 'Data Kamar Berhasil Ditambahkan');
    }

    // (Fungsi Edit & Hapus akan kita tambahkan nanti agar tidak bingung)
    // ... (kode sebelumnya: index, create, store) ...

    // 4. Tampilkan Form Edit
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id); // Cari data berdasarkan ID
        return view('kamar.edit', compact('kamar'));
    }

    // 5. Update Data ke Database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_kamar' => 'required|string|max:10',
            'fasilitas' => 'required|string',
            'harga' => 'required|numeric',
            'status' => 'required',
        ]);

        $kamar = Kamar::findOrFail($id);
        $kamar->update($request->all());

        return redirect()->route('kamar.index')->with('success', 'Data Kamar Berhasil Diperbarui');
    }

    // 6. Hapus Data
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->route('kamar.index')->with('success', 'Data Kamar Berhasil Dihapus');
    }
}