<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Áreas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Áreas de Formación</h2>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">Volver al Inicio</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 100px;">ID</th>
                        <th>Nombre del Área</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($areas as $area)
                        <tr>
                            <td>{{ $area['id'] }}</td>
                            <td>{{ $area['name'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center py-4 text-muted">
                                No se encontraron áreas registradas o no hay conexión con la API.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
