<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'category',
        'description',
        'duration',
        'price',
        'price_note',
        'notes',
        'is_utama',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'integer',
        'is_utama' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp' . number_format($this->price, 0, ',', '.');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeUtama(Builder $query): Builder
    {
        return $query->where('is_utama', true);
    }

    public function scopeByCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }
}
