<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'ratings',
        'review',
    ];

    // Relationships
    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class, 'user_id');
    }

    public function serviceListing()
    {
        return $this->belongsTo(ServiceListing::class, 'service_id');
    }
}
