<?php

declare(strict_types=1);

namespace Domains\Shared\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    /* create uuid string when instance of model */
    public static function bootHasUuid(): void
    {
        static::creating(fn (Model $model) => $model->uuid = Str::uuid()->toString());
    }
}
