<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image_path',
        'deskripsi',
        'custom'
    ];

    public function readers()
    {
        return $this->belongsToMany(
            \App\Models\User::class,
            'image_user_reads',
            'image_id',
            'user_id'
        )->withTimestamps();
    }
}
