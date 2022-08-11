<?php

namespace Domains\Shared\Reactors;

use App\Notifications\SendSmsNotication;
use Domains\Shared\Events\SmsWasCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;

class SendSmsReactor extends Reactor implements ShouldQueue
{
    public function onSmsWasCreated(SmsWasCreated $event)
    {
//        $sms = new FarazSmsMessage();
//        $sms->to($event->userObject->phone)->message($event->smsvalueobject->message)->send();

        //OR send
        $event->userObject->notify(new SendSmsNotication($event->smsvalueobject->message));

        Log::info('job successfully');

    }
}
