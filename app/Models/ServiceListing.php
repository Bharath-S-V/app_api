<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'category_id',
        'services_included',
        'sub_features',
        'recommanded_addons',
        'faqs',
        'timeline_in_minutes',
    ];

    protected $casts = [
        'services_included' => 'array',
        'sub_features' => 'array',
        'recommanded_addons' => 'array',
        'faqs' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Service::class, 'category_id');
    }
}
