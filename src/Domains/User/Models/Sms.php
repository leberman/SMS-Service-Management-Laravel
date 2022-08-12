<?php

namespace Domains\User\Models;

use Database\Factories\SmsFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Domains\User\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sms extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'user_id',
        'message'
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return SmsFactory::new();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id'
        );
    }

}
