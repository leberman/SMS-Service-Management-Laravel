<?php

namespace Domains\Shared\Projectors;

use Domains\Shared\Actions\CreateSmsAction;
use Domains\Shared\Events\SmsWasCreated;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class SmsProjectors extends Projector
{

    //when job done call this method
    public function onSmsWasCreated(SmsWasCreated $event): void
    {
        CreateSmsAction::handle(
            smsValueObject: $event->smsvalueobject
        );
    }
}
