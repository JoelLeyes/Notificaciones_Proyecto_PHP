<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservaSolicitadaClienteMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly array $datos) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Recibimos tu solicitud de reserva — Servicios Pro');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.reserva-solicitada-cliente');
    }

    public function attachments(): array
    {
        return [];
    }
}