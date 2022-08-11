<?php

namespace Domains\Shared\ValueObjects;

use phpseclib3\Math\PrimeField\Integer;

class SmsValueObject
{
    public function __construct(
        public null|int $userId = null,
        public null|string $message = null,
    ) {
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'message' => $this->message,
        ];
    }
}
