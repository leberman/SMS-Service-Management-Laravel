<?php

declare(strict_types=1);
namespace Domains\User\Events;

use Domains\User\Models\User;
use Domains\User\ValueObjects\SmsValueObject;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class SmsWasCreated extends ShouldBeStored
{
    public function __construct(
        public SmsValueObject $smsvalueobject,
        public User $userObject
    )
    {}
}
