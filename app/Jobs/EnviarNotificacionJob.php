<?php

namespace App\Jobs;

use App\Mail\ReservaConfirmadaMail;
use App\Mail\ReservaCanceladaMail;
use App\Mail\ReservaSolicitadaClienteMail;
use App\Mail\ReservaSolicitadaProfesionalMail;
use App\Mail\RecordatorioReservaMail;
use App\Mail\ReservaReprogramadaMail;
use App\Mail\ResenaRecibidaMail;
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
        $mailableMap = [
            'reserva_solicitada_cliente'     => ReservaSolicitadaClienteMail::class,
            'reserva_solicitada_profesional'  => ReservaSolicitadaProfesionalMail::class,
            'reserva_confirmada'              => ReservaConfirmadaMail::class,
            'reserva_cancelada'               => ReservaCanceladaMail::class,
            'recordatorio_reserva'            => RecordatorioReservaMail::class,
            'reserva_reprogramada'            => ReservaReprogramadaMail::class,
            'resena_creada'                   => ResenaRecibidaMail::class,
        ];

        $tipo = $this->datos['tipo'] ?? null;
        if (!isset($mailableMap[$tipo])) {
            throw new \InvalidArgumentException("Tipo de notificación no soportado: {$tipo}");
        }

        $mailableClass = $mailableMap[$tipo];
        $mailable = new $mailableClass($this->datos);

        Mail::to($this->datos['email_usuario'])->send($mailable);
    }
}
