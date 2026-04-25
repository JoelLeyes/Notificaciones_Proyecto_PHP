<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Email de confirmación de reserva.
 * Se envía al cliente cuando el profesional confirma su reserva.
 */
class ReservaConfirmadaMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly array $datos) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Reserva confirmada — Servicios Pro');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.reserva-confirmada');
    }

    public function attachments(): array
    {
        return [];
    }
}
