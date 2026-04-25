<!DOCTYPE html>
<html lang="es">
<body>
<h2>¡Tu reserva fue confirmada!</h2>
<p>Hola <strong>{{ $datos['nombre_usuario'] }}</strong>,</p>
<p>Tu reserva ha sido confirmada. Los detalles son:</p>
<ul>
    <li><strong>Servicio:</strong> {{ $datos['datos']['nombre_servicio'] ?? '' }}</li>
    <li><strong>Fecha y hora:</strong> {{ $datos['datos']['fecha_hora'] ?? '' }}</li>
    <li><strong>Profesional:</strong> {{ $datos['datos']['nombre_profesional'] ?? '' }}</li>
    <li><strong>Modalidad:</strong> {{ $datos['datos']['modalidad'] ?? '' }}</li>
</ul>
<p>Gracias por usar Servicios Pro.</p>
</body>
</html>
