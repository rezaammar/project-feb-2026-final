<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subs extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'username',
        'package_id',
        'duration',
        'transaction_id',
        'status',
        'start_date',
        'end_date'
    ];
}
