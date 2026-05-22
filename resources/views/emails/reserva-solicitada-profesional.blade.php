<!DOCTYPE html>
<html lang="es">
<body>
<h2>Tienes una nueva solicitud de reserva</h2>
<p>Hola <strong>{{ $datos['nombre_usuario'] }}</strong>,</p>
<p>Un cliente solicitó una reserva pendiente de confirmación.</p>
<ul>
    <li><strong>Cliente:</strong> {{ $datos['datos']['nombre_cliente'] ?? '' }}</li>
    <li><strong>Servicio:</strong> {{ $datos['datos']['nombre_servicio'] ?? '' }}</li>
    <li><strong>Fecha y hora:</strong> {{ $datos['datos']['fecha_hora'] ?? '' }}</li>
    <li><strong>Modalidad:</strong> {{ $datos['datos']['modalidad'] ?? '' }}</li>
</ul>
@if(!empty($datos['datos']['notas']))
<p><strong>Notas:</strong> {{ $datos['datos']['notas'] }}</p>
@endif
<p>Ingresá al panel para confirmarla o gestionarla.</p>
</body>
</html>