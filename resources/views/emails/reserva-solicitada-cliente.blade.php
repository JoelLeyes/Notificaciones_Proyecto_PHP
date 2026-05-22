<!DOCTYPE html>
<html lang="es">
<body>
<h2>Recibimos tu solicitud de reserva</h2>
<p>Hola <strong>{{ $datos['nombre_usuario'] }}</strong>,</p>
<p>Ya registramos tu solicitud de reserva. El profesional la revisará y te avisaremos cuando sea confirmada.</p>
<ul>
    <li><strong>Servicio:</strong> {{ $datos['datos']['nombre_servicio'] ?? '' }}</li>
    <li><strong>Fecha y hora:</strong> {{ $datos['datos']['fecha_hora'] ?? '' }}</li>
    <li><strong>Profesional:</strong> {{ $datos['datos']['nombre_profesional'] ?? '' }}</li>
    <li><strong>Modalidad:</strong> {{ $datos['datos']['modalidad'] ?? '' }}</li>
</ul>
<p>Gracias por usar Servicios Pro.</p>
</body>
</html>