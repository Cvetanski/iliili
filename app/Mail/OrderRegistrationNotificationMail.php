<?php


namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderRegistrationNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('testtest@test.com')
            ->view('mails.user-registered', ['order' => $this->order])
            ->subject('Успешно извршивте нарачка, Ви Благодариме!');
    }
}
