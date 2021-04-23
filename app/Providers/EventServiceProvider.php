<?php

namespace App\Providers;

use App\Events\Order\OrderWasRegistered;
use App\Events\User\UserWasRegistered;
use App\Listeners\SendOrderDetailsToUser;
use App\Listeners\SendRegistrationEmailToUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
//    protected $listen = [
//        Registered::class => [
//            SendEmailVerificationNotification::class,
//        ],
//    ];

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        UserWasRegistered::class => [
            SendRegistrationEmailToUser::class
        ],

        OrderWasRegistered::class => [
            SendOrderDetailsToUser::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
