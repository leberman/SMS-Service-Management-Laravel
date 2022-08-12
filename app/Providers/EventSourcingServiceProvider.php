<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Domains\User\Projectors\SmsProjectors;
use Domains\User\Reactors\SendSmsReactor;
use Spatie\EventSourcing\Facades\Projectionist;

class EventSourcingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //triggered when new events and store sms in DB
        Projectionist::addProjectors(
            projectors: [SmsProjectors::class]
        );

        //called when the event fires and send sms Notify
        Projectionist::addReactors(
            reactors: [SendSmsReactor::class]
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
