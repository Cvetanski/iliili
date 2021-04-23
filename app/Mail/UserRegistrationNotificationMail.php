<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class UserRegistrationNotificationMail extends  Mailable
{
    use Queueable, SerializesModels;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('testtest@test.com')
            ->view('mails.user-registered', ['user' => $this->user])
            ->subject('Добредојдовте на ИлиИли! Направивте успешна регистрација на нашиот вебсајт!');
    }
}
