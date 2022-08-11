<?php

namespace Domains\Shared\Aggregates;

use Domains\Shared\Events\SmsWasCreated;
use Domains\Shared\ValueObjects\SmsValueObject;
use Domains\User\Models\User;
use \Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class SmsAggregate extends AggregateRoot
{
    public function createSms(SmsValueObject $smsValueObject, User $userObject): static
    {
        $this->recordThat(
            domainEvent: new SmsWasCreated(
                smsvalueobject: $smsValueObject,
                userObject: $userObject
            )
        );
        return $this;
    }
}
