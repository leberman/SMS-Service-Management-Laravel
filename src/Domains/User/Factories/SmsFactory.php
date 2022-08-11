<?php

declare(strict_types=1);

namespace Domains\User\Factories;

use Domains\User\ValueObjects\SmsValueObject;

class SmsFactory
{
    public static function create(array $attributes): SmsValueObject
    {
        return new SmsValueObject(
            userId: $attributes['user_id'],
            message: $attributes['message'],
        );
    }
}
