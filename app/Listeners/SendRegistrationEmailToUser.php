<?php


namespace App\Listeners;

use App\Events\User\UserWasRegistered;
use App\Mail\UserRegistrationNotificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendRegistrationEmailToUser
{
//    public function handle(UserWasRegistered $event)
//
//    {   $user = User::find($event->userId)->toArray();
//        Mail::send('emails.mailEvent', $user, function($message) use ($user) {
//            $message->to($user['email']);
//            $message->subject('Event Testing');
//        });
//    }

    public function handle(UserWasRegistered $event)
    {
        Mail::to($event->getUser()->getEmail())->send(new UserRegistrationNotificationMail($event->getUser()));
    }

}
