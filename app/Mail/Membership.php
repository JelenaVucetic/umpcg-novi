<?php

namespace App\Mail;

use App\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Membership extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Member $details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from($this->details->email)->subject('Zahtjev za članstvo')
        ->view('emails.membership');
    }
}
