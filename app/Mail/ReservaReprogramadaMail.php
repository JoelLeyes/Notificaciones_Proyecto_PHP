<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Email de reprogramación de turno.
 * Se envía cuando una reserva es movida a una nueva fecha y hora.
 */
class ReservaReprogramadaMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly array $datos) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Tu turno fue reprogramado — Servicios Pro');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.reserva-reprogramada');
    }

    public function attachments(): array
    {
        return [];
    }
}
