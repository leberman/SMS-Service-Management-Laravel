<?php

namespace Domains\Shared\Drivers\Sms;

interface SmsDriverInterface
{
    public function message(string $message): self;
    public function to(int $to): self;
    public function send(): mixed;
}
