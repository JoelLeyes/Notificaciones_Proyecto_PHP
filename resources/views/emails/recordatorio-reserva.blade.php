<!DOCTYPE html>
<html lang="es">
<body>
<h2>Falta una hora para tu turno</h2>
<p>Hola <strong>{{ $datos['nombre_usuario'] }}</strong>,</p>
<p>Te enviamos este aviso porque falta una hora para tu reserva:</p>
<ul>
    <li><strong>Servicio:</strong> {{ $datos['datos']['nombre_servicio'] ?? '' }}</li>
    <li><strong>Fecha y hora:</strong> {{ $datos['datos']['fecha_hora'] ?? '' }}</li>
    <li><strong>Profesional:</strong> {{ $datos['datos']['nombre_profesional'] ?? '' }}</li>
    <li><strong>Modalidad:</strong> {{ $datos['datos']['modalidad'] ?? '' }}</li>
</ul>
<p>Si necesitás revisar los detalles, podés entrar a tu panel de reservas.</p>
<p>¡Nos vemos pronto!</p>
</body>
</html>
