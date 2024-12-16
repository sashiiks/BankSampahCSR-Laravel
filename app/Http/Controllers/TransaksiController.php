<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiSampah;

class TransaksiController extends Controller
{
    /**
     * Menampilkan daftar transaksi.
     */
    public function index()
    {
        // Ambil semua data dari tabel 'dataall'
        $transaksi = TransaksiSampah::orderBy('id', 'desc')->paginate(20);

        if (request()->ajax()) {
            return view('transaksi.index', compact('transaksi'));
        }

        // Tampilkan view dengan data transaksi
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Menampilkan form tambah transaksi.
     */
    public function create()
    {
        return view('transaksi.form');
    }

    public function store(Request $request)
    {
    // Validasi input
    $validatedData = $request->validate([
        'nama_desa' => 'required|string|max:255',
        'bulan' => 'required|string|max:50',
        'tahun' => 'required|numeric|min:0',
        'nama_bank_sampah' => 'required|string|max:255',
        'rt' => 'required|string|max:50',
        'rw' => 'required|numeric',
        'jumlah_nasabah' => 'required|numeric|min:0',
        'nasabah_aktif' => 'required|numeric|min:0',
        'pembelian_kg' => 'required|numeric|min:0',
        'pembelian_rp' => 'required|numeric|min:0',
        'penjualan_kg' => 'required|numeric|min:0',
        'penjualan_rp' => 'required|numeric|min:0',
        'nama_pengepul' => 'required|string|max:255',
    ]);

    try {
        // Simpan data ke database
        TransaksiSampah::create($validatedData);

        // Reset form dengan flash message sukses
        return back()->with('success', 'Transaksi berhasil ditambahkan!');
    } catch (\Exception $e) {
        // Kembali ke form dengan pesan error jika terjadi kegagalan
        return back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
    }
    }

    /**
     * Menampilkan form edit transaksi berdasarkan No.
     */
    public function edit($id)
    {
        // Ambil data transaksi dari tabel 'dataall' berdasarkan No.
        $transaksi = TransaksiSampah::where('id', $id)->firstOrFail();

        // Tampilkan view form edit
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Memperbarui data transaksi di tabel 'dataall' berdasarkan No.
     */
    public function update(Request $request, $id)
    {
    // Validasi input
    $validatedData = $request->validate([
        'nama_desa' => 'required|string|max:255',
        'bulan' => 'required|string|max:50',
        'tahun' => 'required|numeric|min:0',
        'nama_bank_sampah' => 'required|string|max:255',
        'rt' => 'required|string|max:50',
        'rw' => 'required|numeric',
        'jumlah_nasabah' => 'required|numeric|min:0',
        'nasabah_aktif' => 'required|numeric|min:0',
        'pembelian_kg' => 'required|numeric|min:0',
        'pembelian_rp' => 'required|numeric|min:0',
        'penjualan_kg' => 'required|numeric|min:0',
        'penjualan_rp' => 'required|numeric|min:0',
        'nama_pengepul' => 'required|string|max:255',
    ], [
        'required' => ':attribute wajib diisi.',
        'numeric' => ':attribute harus berupa angka.',
        'string' => ':attribute harus berupa teks.',
        'max' => ':attribute maksimal :max karakter.',
        'min' => ':attribute minimal :min.'
    ]);

    // Validasi tambahan (kondisional)
    if ($request->nasabah_aktif > $request->jumlah_nasabah) {
        return redirect()->back()->withErrors(['nasabah_aktif' => 'Jumlah nasabah aktif tidak boleh lebih besar dari jumlah keseluruhan nasabah.']);
    }

    try {
        // Cari data transaksi berdasarkan ID
        $transaksi = TransaksiSampah::findOrFail($id);

        // Update data transaksi
        $transaksi->update($validatedData);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui transaksi: ' . $e->getMessage());
    }
    }


    /**
     * Menghapus data transaksi dari tabel 'dataall' berdasarkan No.
     */
    public function destroy($id)
    {
        // Cari data transaksi berdasarkan No. dan hapus
        $transaksi = TransaksiSampah::where('id', $id)->firstOrFail();
        $transaksi->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
