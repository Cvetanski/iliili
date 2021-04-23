<?php

namespace App\Listeners;

use App\Events\Order\OrderWasRegistered;
use App\Mail\OrderRegistrationNotificationMail;
use Illuminate\Support\Facades\Mail;

class SendOrderDetailsToUser
{
    public function handle(OrderWasRegistered $event)
    {
        Mail::to($event->getUser()->getEmail())->send(new OrderRegistrationNotificationMail($event->getUser()));
    }
}
