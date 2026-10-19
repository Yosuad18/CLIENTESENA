@extends('layouts.app')

@section('title', 'Aprendices - Administración')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title mb-0">Aprendices</h1>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Panel</a>
        <a href="{{ route('admin.apprentices.create') }}" class="btn btn-sena">
            <i class="fas fa-plus-circle me-1" aria-hidden="true"></i> Nuevo Aprendiz
        </a>
    </div>
</div>

<div class="card card-sena shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 table-sena">
            <thead>
                <tr>
                    <th style="width:70px;">ID</th>
                    <th>Documento</th>
                    <th>Nombre Completo</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Curso / Ficha</th>
                    <th>Computador</th>
                    <th class="text-center" style="width:180px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($apprentices as $apprentice)
                    <tr>
                        <td><strong>#{{ $apprentice->id ?? '—' }}</strong></td>
                        <td>{{ $apprentice->document ?? '—' }}</td>
                        <td>{{ trim(($apprentice->name ?? '') . ' ' . ($apprentice->surname ?? '')) ?: 'Sin nombre' }}</td>
                        <td>{{ $apprentice->email ?? '—' }}</td>
                        <td>{{ $apprentice->cell_number ?? '—' }}</td>
                        <td>{{ $apprentice->course->course_number ?? 'Sin curso' }}</td>
                        <td>{{ $apprentice->computer->brand ?? 'Sin equipo' }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.apprentices.edit', $apprentice->id) }}" class="btn btn-sm btn-outline-warning">
                                <i class="fas fa-edit" aria-hidden="true"></i> Editar
                            </a>
                            <form action="{{ route('admin.apprentices.destroy', $apprentice->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Confirma la eliminación de este aprendiz?')">
                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">No hay aprendices registrados o no hay conexión con la API.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
