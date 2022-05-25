<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CloudHostingProduct extends Mailable
{

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;

    public function __construct($email)
    {
        $this->name = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('programmerahmedlotfy@gmail.com')
                ->view('emails.CloudHosting.Product',['email' => $this->name]);
    }
}
