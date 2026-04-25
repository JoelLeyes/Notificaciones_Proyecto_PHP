<?php

namespace App\Jobs;

use App\Mail\ReservaConfirmadaMail;
use App\Mail\ReservaCanceladaMail;
use App\Mail\RecordatorioReservaMail;
use App\Mail\ReservaReprogramadaMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

/**
 * Job para enviar notificaciones por email de forma asincrónica.
 * Se encola en Redis y lo procesa el queue worker de este microservicio.
 * El tipo de notificación determina qué clase Mailable se instancia.
 */
class EnviarNotificacionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public readonly array $datos) {}

    public function handle(): void
    {
        $mailable = match ($this->datos['tipo']) {
            'reserva_confirmada'    => new ReservaConfirmadaMail($this->datos),
            'reserva_cancelada'     => new ReservaCanceladaMail($this->datos),
            'recordatorio_reserva'  => new RecordatorioReservaMail($this->datos),
            'reserva_reprogramada'  => new ReservaReprogramadaMail($this->datos),
        };

        Mail::to($this->datos['email_usuario'])->send($mailable);
    }
}
