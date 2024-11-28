<?php

// app/Models/Addon.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'features',
        'timeline'
    ];

    protected $casts = [
        'features' => 'array',  // Cast features column to an array
    ];
}
