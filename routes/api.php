<?php

use App\Http\Controllers\Api\NotificacionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas del Microservicio de Notificaciones
|--------------------------------------------------------------------------
|
| Este servicio solo expone un endpoint interno.
| La autenticación se realiza mediante el header X-Token-Servicio.
|
| POST /api/notificar    -> EnviarNotificacionJob en cola
|
*/

Route::post('notificar', [NotificacionController::class, 'enviar']);
