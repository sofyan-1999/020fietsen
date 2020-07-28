<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderConfirmationData)
    {
        $this->order = $orderConfirmationData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Bedankt voor je bestelling!")
            ->from("sofyan_1@hotmail.nl")
            ->to('ceyhun70@live.nl')
            ->view('email.orderConfirmation')->with([
                'order' => $this->order,
                'product' => $this->order->product
            ]);
    }
}
