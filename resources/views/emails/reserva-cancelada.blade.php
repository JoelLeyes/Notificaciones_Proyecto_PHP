<!DOCTYPE html>
<html lang="es">
<body>
<h2>Tu reserva fue cancelada</h2>
<p>Hola <strong>{{ $datos['nombre_usuario'] }}</strong>,</p>
<p>Tu reserva ha sido cancelada.</p>
<ul>
    <li><strong>Servicio:</strong> {{ $datos['datos']['nombre_servicio'] ?? '' }}</li>
    <li><strong>Fecha y hora:</strong> {{ $datos['datos']['fecha_hora'] ?? '' }}</li>
    <li><strong>Motivo:</strong> {{ $datos['datos']['motivo_cancelacion'] ?? 'Sin especificar' }}</li>
</ul>
<p>Podés reservar un nuevo turno en cualquier momento.</p>
</body>
</html>
