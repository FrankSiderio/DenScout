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
    public $group;
    public $member;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($leader, $group, $member)
    {
      $this->leader = $leader;
      $this->group = $group;
      $this->member = $member;
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
