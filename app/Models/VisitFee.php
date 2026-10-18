<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'tier_name',
        'distance_label',
        'fee',
        'notes',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'fee' => 'integer',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getFormattedFeeAttribute(): string
    {
        return 'Rp' . number_format($this->fee, 0, ',', '.');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }
}
