<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PasswordResetEvent;
use App\Listeners\PasswordResetEventListener;
use App\Events\EnqueryEvent;
use App\Listeners\EnqueryEventListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        PasswordResetEvent::class=>[
            PasswordResetEventListener::class,
        ],
        EnqueryEvent::class=>[
            EnqueryEventListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
