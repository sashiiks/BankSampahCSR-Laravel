<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MitraController extends Controller
{
    public function create()
    {
        return view('mitra.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_desa' => 'required|string|max:255',
            'Nama bank sampah' => 'required|string|max:255',
            'Bulan' => 'required|string|max:20',
            'Tahun' => 'required|integer|min:1900|max:2100',
            'RT' => 'nullable|string|max:10',
            'RW' => 'nullable|string|max:10',
            'Jumlah Nasabah' => 'required|integer|min:0',
            'Nasabah aktif' => 'required|integer|min:0',
        ]);

        // Simpan data ke tabel `dataall`
        DB::table('dataall')->insert($validatedData);

        return redirect()->route('transaksi.index')->with('success', 'Mitra berhasil didaftarkan!');
    }
}
