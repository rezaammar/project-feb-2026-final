<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Average extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_saham',
        'jenis_average',
        // 'product_id',
        'harga_awal',
        'jumlah_awal',
        'harga_baru',
        'jumlah_baru',
        'average',
        'recorded_date'
    ];
}
