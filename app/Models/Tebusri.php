<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tebusri extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_saham',
        'harga_avg',
        'harga_tebus',
        'jumlah_lot',
        'rasio_kiri',
        'rasio_kanan',
        'lot_tebus',
        'biaya_tebus',
        'harga_avg_final',
        'total_lot_final',
        'recorded_date'
    ];
}
