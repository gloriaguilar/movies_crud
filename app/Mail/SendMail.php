<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public $isNewUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData, $isNewUser)
    {
        $this->mailData = $mailData;
        $this->isNewUser = $isNewUser;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'CRUD MOVIES BY GLORIA',
        );
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->isNewUser){
            return $this->view('email.new-user');
        }else{
            return $this->view('email.new-movie');
        }
       
    }
}