<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'package_id',
        'transaction_id',
        'status',
        'start_date',
        'end_date'
    ];

    //     public function package()
    // {
    //     return $this->belongsTo(Package::class);
    // }
}
