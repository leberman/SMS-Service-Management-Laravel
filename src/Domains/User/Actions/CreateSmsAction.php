<?php

namespace Domains\User\Actions;

use Illuminate\Support\Str;
use Domains\User\Models\Sms;
use Domains\User\ValueObjects\SmsValueObject;

class CreateSmsAction
{
    public static function handle(SmsValueObject $smsValueObject): Sms
    {
        //create new sms in db, type cast and model values objects in SmsValueObjects
        return Sms::create(
            array_merge(
                $smsValueObject->toArray(),
                [
                'uuid' => Str::uuid()->toString()
            ]
            )
        );
    }
}
