<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMonitor extends Model
{
    use HasFactory;
    protected $table = 'user_monitor';

    protected $fillable = [
        'active',
        'non_active',
        'total_user'
    ];
}
