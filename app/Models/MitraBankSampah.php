<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraBankSampah extends Model
{
    use HasFactory;

    protected $table = 'dataall';
    protected $fillable = [
        'nama_desa',
        'Nama bank sampah',
        'RT',
        'RW',
        'Jumlah Nasabah',
        'Nasabah aktif',
    ];
}
