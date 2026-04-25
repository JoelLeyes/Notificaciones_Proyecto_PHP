<!DOCTYPE html>
<html lang="es">
<body>
<h2>Tu turno fue reprogramado</h2>
<p>Hola <strong>{{ $datos['nombre_usuario'] }}</strong>,</p>
<p>Tu reserva ha sido movida a una nueva fecha:</p>
<ul>
    <li><strong>Servicio:</strong> {{ $datos['datos']['nombre_servicio'] ?? '' }}</li>
    <li><strong>Nueva fecha y hora:</strong> {{ $datos['datos']['nueva_fecha_hora'] ?? '' }}</li>
    <li><strong>Profesional:</strong> {{ $datos['datos']['nombre_profesional'] ?? '' }}</li>
</ul>
<p>Si tenés alguna consulta, contactá al profesional directamente.</p>
</body>
</html>
