<?php
declare(strict_types=1);
namespace App\Providers;

use Domains\Shared\Projectors\SmsProjectors;
use Domains\Shared\Reactors\SendSmsReactor;
use Illuminate\Support\ServiceProvider;
use phpDocumentor\Reflection\Project;
use Spatie\EventSourcing\Facades\Projectionist;

class EventSourcingServiceProvider extends ServiceProvider
{

    public function register():void
    {
        Projectionist::addProjectors(
            projectors: [SmsProjectors::class]
        );

        Projectionist::addReactors(
            reactors: [SendSmsReactor::class]
        );
    }

    public function boot():void
    {
        //
    }
}
