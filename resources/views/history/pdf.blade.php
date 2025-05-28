<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Historial de {{ $pet->nombre }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Historial Médico de {{ $pet->nombre }}</h2>
    <p><strong>Dueño:</strong> {{ $pet->owner->name ?? 'Desconocido' }}</p>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Diagnóstico</th>
                <th>Descripción</th>
                <th>Tratamiento</th>
                <th>Veterinario</th>
            </tr>
        </thead>
        <tbody>
            @foreach($histories as $history)
                <tr>
                    <td>{{ $history->fecha }}</td>
                    <td>{{ $history->diagnostico}}</td>
                    <td>{{ $history->descripcion }}</td>
                    <td>{{ $history->tratamiento}} </td>
                    <td>{{ $history->veterinario->name ?? 'Desconocido' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
