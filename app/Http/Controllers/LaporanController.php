<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Grafik 1: Total Bank Sampah Mitra dan Desa
        $totalBankSampahMitra = Laporan::select(DB::raw('COUNT(DISTINCT nama_bank_sampah) as total_bank_sampah'))
            ->first();

        $totalDesa = Laporan::select(DB::raw('COUNT(DISTINCT nama_desa) as total_desa'))
            ->first();

        // Rincian Bank Sampah Per Desa (untuk Grafik 2)
        $rincianBankSampahPerDesa = Laporan::select('nama_desa', DB::raw('COUNT(DISTINCT nama_bank_sampah) as total_bank_sampah'))
            ->groupBy('nama_desa')
            ->get();

        // Grafik 2: Jumlah Keseluruhan Nasabah dan Nasabah Aktif
        $totalNasabah = Laporan::sum('jumlah_nasabah');
        $totalNasabahAktif = Laporan::sum('nasabah_aktif');

        // Grafik 3: Data Bank Sampah Tiap Daerah
        $bankSampahPerDaerah = Laporan::select('nama_desa', 'nama_bank_sampah')
            ->distinct()
            ->get();

        // Menyusun data untuk grafik bar (Nama Desa dan Jumlah Bank Sampah)
        $labels = $rincianBankSampahPerDesa->pluck('nama_desa');
        $bankSampahData = $rincianBankSampahPerDesa->pluck('total_bank_sampah');

        // Passing data ke view
        return view('laporan.index', [
            'totalBankSampahMitra' => $totalBankSampahMitra,
            'totalDesa' => $totalDesa,
            'rincianBankSampahPerDesa' => $rincianBankSampahPerDesa,
            'totalNasabah' => $totalNasabah,
            'totalNasabahAktif' => $totalNasabahAktif,
            'bankSampahPerDaerah' => $bankSampahPerDaerah,
            'labels' => $labels, // Menyertakan data labels
            'bankSampahData' => $bankSampahData // Menyertakan data bank sampah
        ]);
    }
}
