<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MitraBankSampah;
use App\Models\TransaksiSampah;

class TransaksiController extends Controller
{

    /** kode ini tu harusnya saling kesambung sama  Mitra controller cuma gua heran pas dibuka
     * view nya yang itu ga jalan bjirr. di admin
     *
     *
     *
     *
     * Menampilkan daftar transaksi.
     */
    public function index()
    {
        $mitra = MitraBankSampah::all(); // Ambil semua data mitra
        $transaksi = TransaksiSampah::all(); // Ambil semua data transaksi

        return view('transaksi.index', compact('mitra', 'transaksi'));
    }

    /**
     * Menampilkan form untuk transaksi baru.
     *
     *
     * sama kalo ini harusnya ada view yang tampil namanya transaksi form tapi ga nampil juga jir.
     */
    public function create()
    {
        // Ambil daftar nama bank sampah dari tabel mitra
        $mitra = MitraBankSampah::select('id', 'nama_bank_sampah')->distinct()->get();

        // Kirim data mitra ke view form
        return view('mitra.create', compact('mitra'));
    }

    /**
     * Menyimpan transaksi baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi Input
        // disini juga jir sumpah gua bingung ga bisa nampilin transaksi gitu di admin.
        $validatedData = $request->validate([
            'nama_mitra' => 'required|exists:mitra_bank_sampah,id', // ID mitra harus valid
            'Bulan' => 'required|string|max:50',
            'Tahun' => 'required|numeric',
            'Pembelian (kg)' => 'required|numeric|min:0',
            'Penjualan (kg)' => 'required|numeric|min:0',
            'Jumlah Pembelian (Rp)' => 'required|numeric|min:0',
            'Jumlah Penjualan (Rp)' => 'required|numeric|min:0',
            'Nama Pengepul' => 'required|string|max:255',
        ]);

        // Simpan data transaksi ke database
        TransaksiSampah::create([
            'mitra_id' => $validatedData['nama_mitra'], // ID mitra sebagai foreign key
            'bulan' => $validatedData['Bulan'],
            'tahun' => $validatedData['Tahun'],
            'pembelian_kg' => $validatedData['Pembelian (kg)'],
            'penjualan_kg' => $validatedData['Penjualan (kg)'],
            'jumlah_pembelian_rp' => $validatedData['Jumlah Pembelian (Rp)'],
            'jumlah_penjualan_rp' => $validatedData['Jumlah Penjualan (Rp)'],
            'nama_pengepul' => $validatedData['Nama Pengepul'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan!');
    }
}
