<?php

namespace Domains\Shared\Jobs\Sms;

use Domains\Shared\Actions\CreateSmsAction;
use Domains\Shared\Aggregates\SmsAggregate;
use Domains\Shared\ValueObjects\SmsValueObject;
use http\Client\Curl\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class CreateSms implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;
    public function __construct(
        public int $userId,
        public SmsValueObject $smsValueObject
    ) {}

    public function handle(): void
    {
        $userObj = \Domains\User\Models\User::find($this->userId);
        SmsAggregate::retrieve(
            uuid: Str::uuid()->toString()
        )->createSms(
            smsValueObject: $this->smsValueObject,
            userObject: $userObj
        )->persist();

    }

}
