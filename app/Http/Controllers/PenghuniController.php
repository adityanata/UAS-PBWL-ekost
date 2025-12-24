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
    // ... (kode sebelumnya: index, create, store) ...

    // 4. Tampilkan Form Edit
    public function edit($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        // Kita kirim data kamar juga, barangkali mau pindah kamar (opsional)
        // Tapi untuk aman, kita load semua kamar yg tersedia + kamar dia saat ini
        $kamars = Kamar::where('status', 'Tersedia')
            ->orWhere('id', $penghuni->kamar_id)
            ->get();

        return view('penghuni.edit', compact('penghuni', 'kamars'));
    }

    // 5. Update Data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|numeric',
            'no_hp' => 'required',
            // Kita skip validasi kamar_id agar tidak rumit logikanya untuk pemula
        ]);

        $penghuni = Penghuni::findOrFail($id);

        // Update data diri saja
        $penghuni->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect()->route('penghuni.index')->with('success', 'Data Penghuni Berhasil Diupdate');
    }

    // 6. Hapus Data (PENTING: Ubah status kamar jadi Tersedia)
    public function destroy($id)
    {
        $penghuni = Penghuni::findOrFail($id);

        // Cari kamarnya, lalu ubah jadi Tersedia
        $kamar = Kamar::find($penghuni->kamar_id);
        if ($kamar) {
            $kamar->update(['status' => 'Tersedia']);
        }

        $penghuni->delete();

        return redirect()->route('penghuni.index')->with('success', 'Penghuni dihapus, Kamar kembali Kosong/Tersedia');
    }
}