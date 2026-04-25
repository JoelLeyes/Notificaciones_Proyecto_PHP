<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Email de cancelación de reserva.
 * Se envía al cliente (o profesional) cuando una reserva es cancelada.
 */
class ReservaCanceladaMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly array $datos) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Reserva cancelada — Servicios Pro');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.reserva-cancelada');
    }

    public function attachments(): array
    {
        return [];
    }
}
