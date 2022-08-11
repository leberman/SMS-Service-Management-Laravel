<?php

namespace Domains\Shared\Actions;

use Domains\Shared\Models\Sms;
use Domains\Shared\ValueObjects\SmsValueObject;
use Illuminate\Support\Str;

class CreateSmsAction
{
    public static function handle(SmsValueObject $smsValueObject): Sms
    {
        return Sms::create(
            array_merge($smsValueObject->toArray(),
            [
                'uuid' => Str::uuid()->toString()
            ])
        );
    }
}
