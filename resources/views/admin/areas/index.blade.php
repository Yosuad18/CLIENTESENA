@extends('layouts.app')

@section('title', 'Áreas - Administración')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title mb-0">Áreas de Formación</h1>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Panel</a>
        <a href="{{ route('admin.areas.create') }}" class="btn btn-sena">
            <i class="fas fa-plus-circle me-1" aria-hidden="true"></i> Nueva Área
        </a>
    </div>
</div>

<div class="card card-sena shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 table-sena">
            <thead>
                <tr>
                    <th style="width:80px;">ID</th>
                    <th>Nombre del Área</th>
                    <th class="text-center" style="width:180px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($areas as $area)
                    <tr>
                        <td><strong>#{{ $area->id ?? '—' }}</strong></td>
                        <td>{{ $area->name ?? 'Sin nombre' }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.areas.edit', $area->id) }}" class="btn btn-sm btn-outline-warning">
                                <i class="fas fa-edit" aria-hidden="true"></i> Editar
                            </a>
                            <form action="{{ route('admin.areas.destroy', $area->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Confirma la eliminación de esta área?')">
                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted py-4">No hay áreas registradas o no hay conexión con la API.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
