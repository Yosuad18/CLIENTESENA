@extends('layouts.app')

@section('title', 'Instructores - Administración')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title mb-0">Instructores</h1>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Panel</a>
        <a href="{{ route('admin.teachers.create') }}" class="btn btn-sena">
            <i class="fas fa-plus-circle me-1" aria-hidden="true"></i> Nuevo Instructor
        </a>
    </div>
</div>

<div class="card card-sena shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 table-sena">
            <thead>
                <tr>
                    <th style="width:70px;">ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Área</th>
                    <th>Centro</th>
                    <th class="text-center" style="width:180px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $teacher)
                    <tr>
                        <td><strong>#{{ $teacher->id ?? '—' }}</strong></td>
                        <td>{{ $teacher->name ?? 'Sin nombre' }}</td>
                        <td>{{ $teacher->email ?? '—' }}</td>
                        <td>{{ $teacher->area->name ?? 'Sin área' }}</td>
                        <td>{{ $teacher->trainingCenter->name ?? 'Sin centro' }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-sm btn-outline-warning">
                                <i class="fas fa-edit" aria-hidden="true"></i> Editar
                            </a>
                            <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Confirma la eliminación de este instructor?')">
                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">No hay instructores registrados o no hay conexión con la API.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
