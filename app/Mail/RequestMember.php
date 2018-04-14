<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestMember extends Mailable
{
    use Queueable, SerializesModels;

    public $leader;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($leader)
    {
      $this->leader = $leader;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.student.request');
    }
}
