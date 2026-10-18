<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticEvent extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'event_name',
        'metadata',
        'visitor_hash',
        'created_at',
    ];

    protected $casts = [
        'metadata' => 'array',
        'created_at' => 'datetime',
    ];
}
