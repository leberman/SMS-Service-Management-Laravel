<?php

namespace Domains\User\Reactors;

use Domains\User\Events\SmsWasCreated;
use Domains\User\Notifications\Sms\SendSmsNotication;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;

class SendSmsReactor extends Reactor implements ShouldQueue
{
    public function onSmsWasCreated(SmsWasCreated $event)
    {

        //You can send your SMS in two ways
        //if used simple -> you can create object sms drives and call methods [to,message,send]
        //if used notify laravel -> you can create object from user and call method new notify and use instance of SendSmsNotication

//        $sms = new FarazSmsMessage();
//        $sms->to($event->userObject->phone)->message($event->smsvalueobject->message)->send();

        //OR send
        $event->userObject->notify(new SendSmsNotication($event->smsvalueobject->message));

        Log::info('job successfully');

    }
}
