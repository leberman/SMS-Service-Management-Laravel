<?php

namespace App\Providers;

use Domains\Shared\Jobs\Sms\CreateSms;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Queue::after(function (CreateSms $event) {
//            Log::info('job Not Compiled');
//        });
    }
}
