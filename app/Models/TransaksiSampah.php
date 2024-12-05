<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSampah extends Model
{
    use HasFactory;

    protected $table = 'dataall';
    protected $fillable = [
        'nama_desa',
        'Nama bank sampah',
        'Bulan',
        'Tahun',
        'Pembelian (kg)',
        'Jumlah Pembelian (Rp)',
        'Penjualan (kg)',
        'Jumlah Penjualan (Rp)',
        'Nama Pengepul'
    ];
}
