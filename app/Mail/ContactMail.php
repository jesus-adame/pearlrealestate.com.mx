<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private ContactMessage $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactMessage $message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $body = $this->message->body;

        return $this->markdown('mails.contact')
            ->with([
                'body' => $body
            ])
        ;
    }
}
