<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WashingCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'business_address',
        'contact_number',
        'email',
        'photos',
        'capacity',
        'services',
        'latitude',
        'longitude',
        'is_approved',
    ];

    protected $casts = [
        'photos' => 'array',
        'services' => 'array',
    ];
}
