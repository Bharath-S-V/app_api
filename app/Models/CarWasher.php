<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarWasher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'business_address',
        'photos',
        'service_radius',
        'services_offered',
        'availability_schedule',
        'status',
        'verification_documents'
    ];

    protected $casts = [
        'photos' => 'array',
        'services_offered' => 'array',
        'availability_schedule' => 'array',
        'verification_documents' => 'array',
    ];
}
