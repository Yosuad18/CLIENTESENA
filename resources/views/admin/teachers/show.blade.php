@extends('layouts.app')

@section('title', 'Instructor - Administración')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title mb-0">Detalle del Instructor</h1>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.teachers.index') }}" class="btn btn-outline-secondary">Volver</a>
        <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-sena">
            <i class="fas fa-edit me-1" aria-hidden="true"></i> Editar
        </a>
    </div>
</div>

<div class="card card-sena p-4 shadow-sm">
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">ID</div>
        <div class="col-sm-8">#{{ $teacher->id ?? '—' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Nombre</div>
        <div class="col-sm-8">{{ $teacher->name ?? 'Sin nombre' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Correo</div>
        <div class="col-sm-8">{{ $teacher->email ?? '—' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Área</div>
        <div class="col-sm-8">{{ $teacher->area->name ?? 'Sin área' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Centro de formación</div>
        <div class="col-sm-8">{{ $teacher->trainingCenter->name ?? 'Sin centro' }}</div>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Cursos / Fichas</div>
        <div class="col-sm-8">
            @forelse(($teacher->courses ?? []) as $course)
                <span class="badge bg-secondary me-1">{{ $course->course_number ?? '—' }} {{ $course->name ?? '' }}</span>
            @empty
                <span class="text-muted">Sin cursos asignados</span>
            @endforelse
        </div>
    </div>

    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">Volver al listado</a>
        <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-sena">
            <i class="fas fa-sync-alt me-1" aria-hidden="true"></i> Editar Instructor
        </a>
    </div>
</div>
@endsection
