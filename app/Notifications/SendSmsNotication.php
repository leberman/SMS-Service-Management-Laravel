<?php

namespace App\Notifications;

use App\Channels\SmsChannel;
use Domains\Shared\Drivers\Sms\FarazSmsMessage;
use Domains\Shared\Drivers\Sms\GhasedakSmsMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class SendSmsNotication extends Notification implements ShouldQueue
{
    use Queueable;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        private string $message
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return string
     */
    public function via(mixed $notifiable)
    {
        return SmsChannel::class;
    }

    /**
     * Get the sms representation of the notification.
     *
     * @param mixed $notifiable
     * @return object
     */
    public function toSms(mixed $notifiable): object
    {
        Log::info(config('notify.default'));
        $message = match (config('notify.default')) {
            'ghasedak' => new GhasedakSmsMessage(),
            'farazsms' => new FarazSmsMessage(),
        };

        return ($message)
            ->to($notifiable->phone)
            ->message($this->message);
    }

}
