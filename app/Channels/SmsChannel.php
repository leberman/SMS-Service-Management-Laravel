<?php
declare(strict_types=1);

namespace App\Channels;

use Illuminate\Notifications\Notification;

class SmsChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     */
    public function send($notifiable, Notification $notification) :void
    {
        //create instance of model and call method toSms()
        $message = $notification->toSms($notifiable);

        // instance of GhasedakSmsMessage and call method to() of toSms()
        $message->send();

    }
}
