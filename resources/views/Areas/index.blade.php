<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aprendices</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Areas Registradas</h2>
        <a href="{{ route('areas.create') }}" class="btn btn-primary">+ Nueva Area</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
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
                                No se encontraron áreas registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aprendices</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Aprendices Registrados</h2>
        <a href="{{ route('apprentices.create') }}" class="btn btn-primary">+ Nuevo Aprendiz</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre Completo</th>
                        <th>Documento</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Estrato</th>
                        <th>Curso</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($apprentices as $apprentice)
                        <tr>
                            <td>{{ $apprentice['id'] }}</td>
                            <td>{{ $apprentice['name'] }} {{ $apprentice['surname'] ?? '' }}</td>
                            <td>{{ $apprentice['document'] ?? 'N/A' }}</td>
                            <td>{{ $apprentice['email'] }}</td>
                            <td>{{ $apprentice['cell'] ?? 'N/A' }}</td>
                            <td>{{ $apprentice['estrato'] ?? 'N/A' }}</td>
                            <td>
                                {{-- Accedemos a la relación cargada desde la API con 'with' --}}
                                {{ $apprentice['course']['name'] ?? ($apprentice['course']['course_number'] ?? 'Sin asignar') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No se encontraron aprendices registrados o no hay conexión con la API.
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
