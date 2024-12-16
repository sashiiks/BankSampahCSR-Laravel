<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'bs_new';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
            'nama_desa',
            'bulan',
            'tahun',
            'nama_bank_sampah',
            'rt',
            'rw',
            'jumlah_nasabah',
            'nasabah_aktif',
            'pembelian_kg',
            'pembelian_rp',
            'penjualan_kg',
            'penjualan_rp',
            'nama_pengepul'
        ];

}
