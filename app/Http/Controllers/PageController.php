<?php

namespace App\Http\Controllers;
use App\Models\TransaksiSampah;
use App\Models\MitraBankSampah;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan halaman home
    public function home()
    {
        // 1. Total Bank Sampah Mitra
        $totalBankSampah = TransaksiSampah::distinct('nama_bank_sampah')->count('nama_bank_sampah');

        // 2. Total Pengelolaan Sampah (Penjualan dalam kg)
        $totalPengelolaanSampah = TransaksiSampah::sum('penjualan_kg');

        // 3. Total Keseluruhan Nasabah
        $totalNasabah = TransaksiSampah::sum('jumlah_nasabah');

        // 4. Total Daerah Mitra
        $totalDaerahMitra = TransaksiSampah::distinct('nama_desa')->count('nama_desa');

        // Pass data ke view
        return view('home', [
            'totalBankSampah' => $totalBankSampah,
            'totalPengelolaanSampah' => $totalPengelolaanSampah,
            'totalNasabah' => $totalNasabah,
            'totalDaerahMitra' => $totalDaerahMitra,
        ]);
    }

    // Menampilkan halaman profile
    public function profile() {
        return view('profile');
    }

    // Menampilkan halaman galeri
    public function galeri() {
        return view('galeri');
    }

}
