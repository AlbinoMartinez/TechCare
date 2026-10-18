<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'user_name',
        'action',
        'subject_type',
        'subject_id',
        'description',
        'old_values',
        'new_values',
        'created_at',
    ];

    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
        'created_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Helper to record activity quickly.
     */
    public static function log(string $action, string $description, ?Model $subject = null, ?array $oldValues = null, ?array $newValues = null): static
    {
        $user = auth()->user();

        return static::create([
            'user_id' => $user?->id,
            'user_name' => $user?->name ?? 'System',
            'action' => $action,
            'subject_type' => $subject ? class_basename($subject) : null,
            'subject_id' => $subject?->getKey(),
            'description' => $description,
            'old_values' => $oldValues,
            'new_values' => $newValues,
            'created_at' => now(),
        ]);
    }
}
