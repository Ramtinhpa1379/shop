<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OptMail extends Mailable
{
    use Queueable, SerializesModels;

    public $opt;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($opt)
    {
        $this->opt=$opt;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("eng.dark79@gmail.com")->view("mail.optsend");
    }
}
