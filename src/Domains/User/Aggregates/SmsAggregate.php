<?php

namespace Domains\User\Aggregates;

use Domains\User\Events\SmsWasCreated;
use Domains\User\Models\User;
use Domains\User\ValueObjects\SmsValueObject;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class SmsAggregate extends AggregateRoot
{
    public function createSms(SmsValueObject $smsValueObject, User $userObject): static
    {
        //hold events in memory, when event SmsWasCreated persist after this method save to db
        $this->recordThat(
            domainEvent: new SmsWasCreated(
                smsvalueobject: $smsValueObject,
                userObject: $userObject
            )
        );
        return $this;
    }
}
