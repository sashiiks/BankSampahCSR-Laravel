<?php

namespace App\Http\Controllers;

use App\Models\MitraBankSampah;
use App\Models\TransaksiSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
         // Menghitung data untuk dashboard
         $totalMitra = MitraBankSampah::count();
         $totalNasabah = MitraBankSampah::sum('Jumlah Nasabah');
         $totalTransaksi = TransaksiSampah::count();
         $totalDesa = MitraBankSampah::distinct('nama_desa')->count();

         // Data untuk grafik persebaran daerah
         $regionData = DB::table('dataall') // Pastikan nama tabel sesuai
             ->select('nama_desa', DB::raw('COUNT(*) as total'))
             ->groupBy('nama_desa')
             ->get();

         // Memetakan data ke format yang dapat digunakan di Chart.js
         $labels = $regionData->pluck('nama_desa');
         $data = $regionData->pluck('total');

        // Mengirim data ke view
        return view('dashboard.index', compact(
            'totalMitra',
            'totalNasabah',
            'totalTransaksi',
            'totalDesa',
            'labels',
            'regionData'
        ));
    }

    public function mitra()
    {
        $mitra = MitraBankSampah::all();
        return view('dashboard.mitra', compact('mitra'));
    }

    public function transaksi()
    {
        $transaksi = TransaksiSampah::all();
        return view('dashboard.transaksi', compact('transaksi'));
    }

    public function pelaporan()
    {
        $pembelianKg = TransaksiSampah::sum('Pembelian (kg)');
        $penjualanKg = TransaksiSampah::sum('Penjualan (kg)');
        $pembelianRp = TransaksiSampah::sum('Jumlah Pembelian (Rp)');
        $penjualanRp = TransaksiSampah::sum('Jumlah Penjualan (Rp)');

        return view('dashboard.pelaporan', compact('pembelianKg', 'penjualanKg', 'pembelianRp', 'penjualanRp'));
    }
}
