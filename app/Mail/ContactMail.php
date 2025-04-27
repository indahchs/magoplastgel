<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $name;
    public $phone;
    public $email;
    public $services;
    public $message;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $name, $phone, $email, $services, $message)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->services = $services;
        $this->message = $message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'pages.user.mail-template',
            with: [
                'subject' => $this->subject,
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'services' => $this->services,
                'messageBody' => $this->message 
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
