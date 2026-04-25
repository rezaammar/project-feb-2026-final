<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rasio extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_saham',
        'beredar_awal',
        'beredar_tambahan',
        'beredar_total',
        'rasio_kiri',
        'rasio_kanan'
    ];
}
