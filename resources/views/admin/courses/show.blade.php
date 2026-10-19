@extends('layouts.app')

@section('title', 'Curso - Administración')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title mb-0">Detalle del Curso</h1>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary">Volver</a>
        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sena">
            <i class="fas fa-edit me-1" aria-hidden="true"></i> Editar
        </a>
    </div>
</div>

<div class="card card-sena p-4 shadow-sm">
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">ID</div>
        <div class="col-sm-8">#{{ $course->id ?? '—' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Ficha</div>
        <div class="col-sm-8"><span class="badge bg-secondary">{{ $course->course_number ?? '—' }}</span></div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Programa</div>
        <div class="col-sm-8">{{ $course->name ?? 'Sin nombre' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Jornada</div>
        <div class="col-sm-8">{{ $course->day ?? '—' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Fecha límite</div>
        <div class="col-sm-8">{{ !empty($course->deadline) ? \Illuminate\Support\Carbon::parse($course->deadline)->format('d/m/Y') : '—' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Área</div>
        <div class="col-sm-8">{{ $course->area->name ?? 'Sin área' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Centro de formación</div>
        <div class="col-sm-8">{{ $course->trainingCenter->name ?? 'Sin centro' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Instructores</div>
        <div class="col-sm-8">
            @forelse(($course->teachers ?? []) as $teacher)
                <span class="badge bg-secondary me-1">{{ $teacher->name ?? '—' }}</span>
            @empty
                <span class="text-muted">Sin instructores asignados</span>
            @endforelse
        </div>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Imagen</div>
        <div class="col-sm-8">
            @if(!empty($course->image))
                <img src="{{ asset('storage/images/' . $course->image) }}" alt="Imagen del curso" width="90" height="90" style="object-fit:cover;border-radius:8px;">
            @else
                <span class="text-muted">Sin imagen</span>
            @endif
        </div>
    </div>

    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Volver al listado</a>
        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sena">
            <i class="fas fa-sync-alt me-1" aria-hidden="true"></i> Editar Curso
        </a>
    </div>
</div>
@endsection
