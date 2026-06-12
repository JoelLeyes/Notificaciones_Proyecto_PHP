<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Email de recordatorio de turno.
 * Se envía automáticamente X horas antes del turno usando un job programado.
 */
class RecordatorioReservaMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly array $datos) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Falta una hora para tu turno — Servicios Pro');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.recordatorio-reserva');
    }

    public function attachments(): array
    {
        return [];
    }
}
