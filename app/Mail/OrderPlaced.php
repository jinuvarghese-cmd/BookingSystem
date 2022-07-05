<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Booking
     */
    public $booking;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($products, $booking_id, $nos)
    {
        $this->products = $products;
        $this->booking_id = $booking_id;
        $this->nos = $nos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email')->with([
            'products' => $this->products,
            'booking_id' => $this->booking_id,
            'nos' => $this->nos
        ]);;
    }
}
