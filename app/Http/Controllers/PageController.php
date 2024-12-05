<?php

namespace App\Http\Controllers;
use App\Models\TransaksiSampah;
use App\Models\MitraBankSampah;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan halaman home
    public function home() {
        return view('home');
    }

    // Menampilkan halaman profile
    public function profile() {
        return view('profile');
    }

    // Menampilkan halaman galeri
    public function galeri() {
        return view('galeri');
    }

    // Menampilkan halaman laporan dengan filter
    public function report(Request $request)
    {
        // Mengambil parameter filter dari request
        $bulan = $request->input('bulan', 'All');
        $tahun = $request->input('tahun', 'All');
        $daerah = $request->input('daerah', 'All');

        // Query dasar untuk tabel transaksi sampah
        $query = TransaksiSampah::query();

        // Filter berdasarkan bulan jika ada
        if ($bulan !== 'All') {
            $query->where('Bulan', $bulan);
        }

        // Filter berdasarkan tahun jika ada
        if ($tahun !== 'All') {
            $query->where('Tahun', $tahun);
        }

        // Filter berdasarkan daerah jika ada
        if ($daerah !== 'All') {
            $query->where('nama_desa', $daerah);
        }

        // Mendapatkan data transaksi yang sudah difilter
        $transaksi = $query->get();

        // Menghitung total pembelian dan penjualan dalam kg
        $pembelianKg = $query->sum('Pembelian (kg)');
        $penjualanKg = $query->sum('Penjualan (kg)');

        // Query untuk mendapatkan jumlah bank sampah per daerah
        $bankSampahPerDaerah = MitraBankSampah::select('nama_desa', 'Nama bank sampah')
            ->groupBy('nama_desa', 'Nama bank sampah')
            ->get()
            ->groupBy('nama_desa') // Mengelompokkan berdasarkan desa
            ->map(function ($items, $desa) {
                return [
                    'total_bank' => $items->count(),
                    'bank_names' => $items->pluck('Nama bank sampah'),
                ];
            });

        // Data untuk chart Bar (Jumlah Bank Sampah per Daerah)
        $barChartLabels = $bankSampahPerDaerah->keys(); // Daerah
        $barChartData = $bankSampahPerDaerah->map(fn($data) => $data['total_bank'])->values(); // Jumlah Bank

        // Data untuk chart Doughnut (Nasabah Aktif vs Non-Aktif)
        $doughnutChartLabels = ['Aktif', 'Non-Aktif'];
        $doughnutChartData = [
            MitraBankSampah::sum('Nasabah aktif'),
            MitraBankSampah::sum('Jumlah Nasabah') - MitraBankSampah::sum('Nasabah aktif')
        ];

        // Mengirim data ke view 'report'
        return view('report', compact(
            'transaksi',
            'pembelianKg',
            'penjualanKg',
            'bankSampahPerDaerah',
            'barChartLabels',
            'barChartData',
            'doughnutChartLabels',
            'doughnutChartData'
        ));
    }

    // Menampilkan halaman form untuk mitra
    public function formMitra() {
        return view('form_mitra');
    }

    // Menampilkan halaman form untuk non mitra
    public function formNonMitra() {
        return view('form_nonmitra');
    }
}
