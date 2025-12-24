<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Penghuni; // Panggil Model Penghuni
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // 1. Tampilkan Riwayat Transaksi
    public function index()
    {
        // Ambil data transaksi beserta nama penghuninya
        $transaksis = Transaksi::with('penghuni')->latest()->get();
        return view('transaksi.index', compact('transaksis'));
    }

    // 2. Form Tambah Transaksi
    public function create()
    {
        // Ambil semua data penghuni untuk dipilih di form
        $penghunis = Penghuni::all();
        return view('transaksi.create', compact('penghunis'));
    }

    // 3. Simpan Transaksi
    public function store(Request $request)
    {
        $request->validate([
            'penghuni_id' => 'required|exists:penghunis,id',
            'bulan_tagihan' => 'required|string',
            'tanggal_bayar' => 'required|date',
            'jumlah_bayar' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Pembayaran Berhasil Dicatat');
    }
    // ... (kode sebelumnya) ...

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $penghunis = Penghuni::all(); // Load data penghuni buat dropdown
        return view('transaksi.edit', compact('transaksi', 'penghunis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_bayar' => 'required|date',
            'jumlah_bayar' => 'required|numeric',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil Dihapus');
    }
}