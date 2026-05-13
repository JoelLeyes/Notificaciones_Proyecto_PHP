<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\EnviarNotificacionJob;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Controlador del microservicio de notificaciones.
 * Recibe peticiones del backend principal y encola el envío de emails.
 * Autentica las peticiones mediante un token de servicio en el header.
 */
class NotificacionController extends Controller
{
    /**
     * POST /api/notificar
     * Encola el envío de un email de notificación.
     * El tipo determina qué plantilla de email se utiliza.
     */
    public function enviar(Request $request): JsonResponse
    {
        // Verificar token de servicio (comunicación interna entre microservicios)
        if ($request->header('X-Token-Servicio') !== config('app.token_servicio')) {
            return response()->json(['error' => 'No autorizado.'], 401);
        }

        $validados = $request->validate([
            'tipo'          => 'required|in:reserva_confirmada,reserva_cancelada,recordatorio_reserva,reserva_reprogramada,resena_creada',
            'email_usuario' => 'required|email',
            'nombre_usuario' => 'required|string',
            'datos'         => 'required|array',
        ]);

        EnviarNotificacionJob::dispatch($validados);

        return response()->json(['mensaje' => 'Notificación encolada correctamente.'], 202);
    }
}
