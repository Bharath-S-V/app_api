<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'features', 'content'];

    protected $casts = [
        'features' => 'array', // Automatically casts 'features' as an array when retrieved
    ];
}
