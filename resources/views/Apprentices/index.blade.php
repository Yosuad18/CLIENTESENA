@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Aprendices</h1>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Documento</th>
                    <th>Nombre Completo</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($apprentices as $apprentice)
                    <tr>
                        <td>{{ $apprentice['id'] ?? 'N/A' }}</td>
                        <td>{{ $apprentice['document_number'] ?? $apprentice['documento'] ?? 'N/A' }}</td>
                        <td>
                            {{ $apprentice['first_name'] ?? $apprentice['name'] ?? '' }}
                            {{ $apprentice['last_name'] ?? '' }}
                        </td>
                        <td>{{ $apprentice['email'] ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('apprentices.show', $apprentice['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay aprendices registrados o no se pudieron cargar desde la API.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
