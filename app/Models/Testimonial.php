<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_role',
        'device_type',
        'service_name',
        'feedback',
        'rating',
        'consent_to_publish',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'consent_to_publish' => 'boolean',
        'is_published' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->where('consent_to_publish', true)
            ->orderBy('sort_order');
    }
}
