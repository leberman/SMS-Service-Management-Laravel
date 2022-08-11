<?php
declare(strict_types=1);

namespace Domains\Shared\Factories;

use Domains\Shared\ValueObjects\SmsValueObject;

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
