<?php

declare(strict_types=1);
namespace Domains\Shared\Events;

use Domains\Shared\ValueObjects\SmsValueObject;
use Domains\User\Models\User;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class SmsWasCreated extends ShouldBeStored
{
    public function __construct(
        public SmsValueObject $smsvalueobject,
        public User $userObject
    )
    {}
}
