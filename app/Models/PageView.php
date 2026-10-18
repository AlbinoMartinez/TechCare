<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'path',
        'referrer_host',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'device_class',
        'visitor_hash',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
