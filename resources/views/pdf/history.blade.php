<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Historial Médico</title>
</head>

<body>
    <h1>Historial Médico de {{ $history->pet->nombre }}</h1>
    <p><strong>Veterinario:</strong> {{ $history->veterinario->name }}</p>
    <p><strong>Fecha:</strong> {{ $history->fecha }}</p>
    <p><strong>Diagnóstico:</strong> {{ $history->diagnostico }}</p>
    <p><strong>Descripción:</strong> {{ $history->descripcion }}</p>
    <p><strong>Tratamiento:</strong> {{ $history->tratamiento }}</p>
</body>

</html>
