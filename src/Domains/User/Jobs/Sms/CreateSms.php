<?php

namespace Domains\User\Jobs\Sms;

use Domains\User\Aggregates\SmsAggregate;
use Domains\User\ValueObjects\SmsValueObject;
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

        //Aggregate hold events in memory and finally store in db - job
        SmsAggregate::retrieve(
            uuid: Str::uuid()->toString()
        )->createSms(
            smsValueObject: $this->smsValueObject,
            userObject: $userObj
        )->persist();

    }

}
