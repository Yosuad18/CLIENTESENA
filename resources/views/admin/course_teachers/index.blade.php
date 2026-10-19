@extends('layouts.app')

@section('title', 'Cursos e Instructores - Administración')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title mb-1">Cursos e Instructores</h1>
        <p class="text-muted mb-0">Asignaciones entre cursos e instructores (solo consulta).</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Panel</a>
</div>

<div class="card card-sena shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 table-sena">
            <thead>
                <tr>
                    <th style="width:70px;">ID</th>
                    <th>Curso / Ficha</th>
                    <th>Programa</th>
                    <th>Instructor</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courseTeachers as $relation)
                    <tr>
                        <td><strong>#{{ $relation->id ?? '—' }}</strong></td>
                        <td><span class="badge bg-secondary">{{ $relation->course->course_number ?? $relation->course_number ?? '—' }}</span></td>
                        <td>{{ $relation->course->name ?? $relation->course_name ?? 'Sin programa' }}</td>
                        <td>{{ $relation->teacher->name ?? $relation->teacher_name ?? 'Sin instructor' }}</td>
                        <td>{{ $relation->teacher->email ?? $relation->teacher_email ?? '—' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No hay asignaciones registradas o no hay conexión con la API.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
