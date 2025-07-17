<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Correo de Prueba de Laravel',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.test', // Creamos esta vista en el siguiente paso
        );
    }

    public function attachments(): array
    {
        return [];
    }
}