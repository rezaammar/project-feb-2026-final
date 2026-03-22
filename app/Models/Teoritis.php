<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teoritis extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_saham',
        'harga_cum',
        'rasio_kiri',
        'harga_tebus',
        'rasio_kanan',
        'harga_teoritis',
        'recorded_date'
    ];
}
