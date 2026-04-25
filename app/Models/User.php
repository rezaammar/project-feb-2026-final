<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'password',
        'role_id',
        'otp',
        'email_verified_at',
        'otp_expires_at'
    ];

    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        return $this->role && $this->role->name === 'superadmin' || $this->role->name === 'admin';
    }    

    public function status()
    {
        // User memiliki satu UserStatus
        return $this->hasOne(UserStatus::class, 'user_id');
    }

    public function readImages()
    {
        return $this->belongsToMany(
            \App\Models\Image::class,
            'image_user_reads',
            'user_id',
            'image_id'
        )->withTimestamps();
    }
}
