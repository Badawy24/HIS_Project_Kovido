<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DoctortContact extends Mailable
{
    public $msg;
    public $doctor_email;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message,$doctor_email)
    {
        //
        $this->msg = $message;
        $this->doctor_email = $doctor_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('programmerahmedlotfy@gmail.com')
                ->view('msg_to_doctor',['msg' => $this->msg,
                'doctor_email'=>$this->doctor_email]);
    }
}
