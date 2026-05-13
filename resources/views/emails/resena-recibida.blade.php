<!DOCTYPE html>
<html lang="es">
<body>
<h2>Has recibido una nueva reseña</h2>
<p>Hola <strong>{{ $datos['nombre_usuario'] }}</strong>,</p>
<p>Un cliente dejó una reseña sobre tu servicio.</p>
<ul>
    <li><strong>Servicio:</strong> {{ $datos['datos']['nombre_servicio'] ?? '' }}</li>
    <li><strong>Cliente:</strong> {{ $datos['datos']['nombre_cliente'] ?? '' }}</li>
    <li><strong>Fecha:</strong> {{ $datos['datos']['fecha_hora'] ?? '' }}</li>
    <li><strong>Calificación:</strong> {{ $datos['datos']['calificacion'] ?? '' }} / 5</li>
    <li><strong>Comentario:</strong> {{ $datos['datos']['comentario'] ?? 'Sin comentario' }}</li>
</ul>
<p>Tu promedio se actualizó automáticamente en la plataforma.</p>
</body>
</html>