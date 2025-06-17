<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\InteractsWithQueue;

class SendMessageToUserMail extends Mailable
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $name;
    public $content;

    /**
     * Create a new message instance.
     */
    public function __construct($name,  $content)
    {

        $this->name = $name;
        $this->content = $content;
    }

    // public function build()
    // {
    //     return $this->from('no-reply@yourdomain.com', 'Your App Name') // Use a generic sender email
    //         ->subject('Your Booking Information')
    //         ->view('mail.sendMessageToUserByMail') // Your email template
    //         ->with([
    //             'name' => $this->name,
    //             'content' => $this->content,
    //         ]);
    // }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'IAUOFFSA',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.sendMessageToUserByMail',
            with: [
                'name' => $this->name,
                'content' => $this->content
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
