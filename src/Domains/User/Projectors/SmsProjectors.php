<?php

namespace Domains\User\Projectors;

use Domains\Shared\Actions\CreateSmsAction;
use Domains\User\Events\SmsWasCreated;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class SmsProjectors extends Projector
{

    //when job done call this method and bind object to model Sms
    public function onSmsWasCreated(SmsWasCreated $event): void
    {
        CreateSmsAction::handle(
            smsValueObject: $event->smsvalueobject
        );
    }
}
