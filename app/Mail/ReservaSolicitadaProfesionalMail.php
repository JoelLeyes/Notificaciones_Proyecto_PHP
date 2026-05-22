<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservaSolicitadaProfesionalMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly array $datos) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Nueva solicitud de reserva pendiente — Servicios Pro');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.reserva-solicitada-profesional');
    }

    public function attachments(): array
    {
        return [];
    }
}