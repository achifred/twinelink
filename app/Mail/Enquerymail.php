<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Enquerymail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $email;
    public $subj;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $email, $subj)
    {
        $this->details = $details;
        $this->email =$email;
        $this->subj = $subj;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)->subject($this->subj)->view('email.enquerymail');
    }
}
