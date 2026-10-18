<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'customer_name',
        'customer_phone',
        'device',
        'problem',
        'service_name',
        'location',
        'home_service_tier',
        'preferred_time',
        'status',
        'technician_notes',
        'estimated_cost',
    ];

    protected $casts = [
        'estimated_cost' => 'integer',
    ];

    public function getStatusBadgeAttribute(): array
    {
        return match ($this->status) {
            'baru' => ['label' => 'Baru', 'class' => 'bg-blue-100 text-blue-800 border-blue-200'],
            'dikonfirmasi' => ['label' => 'Dikonfirmasi', 'class' => 'bg-yellow-100 text-yellow-800 border-yellow-200'],
            'dikerjakan' => ['label' => 'Sedang Dikerjakan', 'class' => 'bg-purple-100 text-purple-800 border-purple-200'],
            'selesai' => ['label' => 'Selesai', 'class' => 'bg-green-100 text-green-800 border-green-200'],
            'dibatalkan' => ['label' => 'Dibatalkan', 'class' => 'bg-red-100 text-red-800 border-red-200'],
            default => ['label' => ucfirst($this->status), 'class' => 'bg-gray-100 text-gray-800 border-gray-200'],
        };
    }
}
