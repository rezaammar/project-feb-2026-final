<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    // use HasFactory;
    protected $fillable = [
        'user_id', 'username', 'email', 'status', 
        'start_date', 'end_date', 'address', 'phone', 
        'bio', 'avatar', 'birth_date'
    ];

    public function user()
    {
        // UserStatus dimiliki oleh seorang User
        return $this->belongsTo(User::class);
    }
}
