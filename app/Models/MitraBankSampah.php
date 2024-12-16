<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraBankSampah extends Model
{
    use HasFactory;

    protected $table = 'dataall';
    protected $fillable = [
        'No.',
        'nama_desa',
        'nama_bank_sampah',
        'rt',
        'rw',
        'jumlah_nasabah',
        'nasabah_aktif', 
    ];
}
