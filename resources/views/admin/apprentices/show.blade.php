@extends('layouts.app')

@section('title', 'Aprendiz - Administración')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title mb-0">Detalle del Aprendiz</h1>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.apprentices.index') }}" class="btn btn-outline-secondary">Volver</a>
        <a href="{{ route('admin.apprentices.edit', $apprentice->id) }}" class="btn btn-sena">
            <i class="fas fa-edit me-1" aria-hidden="true"></i> Editar
        </a>
    </div>
</div>

<div class="card card-sena p-4 shadow-sm">
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">ID</div>
        <div class="col-sm-8">#{{ $apprentice->id ?? '—' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Documento</div>
        <div class="col-sm-8">{{ $apprentice->document ?? '—' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Nombre</div>
        <div class="col-sm-8">{{ trim(($apprentice->name ?? '') . ' ' . ($apprentice->surname ?? '')) ?: 'Sin nombre' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Correo</div>
        <div class="col-sm-8">{{ $apprentice->email ?? '—' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Celular</div>
        <div class="col-sm-8">{{ $apprentice->cell_number ?? $apprentice->cell ?? '—' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Estrato</div>
        <div class="col-sm-8">{{ $apprentice->estrato ?? '—' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Dirección</div>
        <div class="col-sm-8">{{ $apprentice->address ?? '—' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Curso / Ficha</div>
        <div class="col-sm-8">
            {{ $apprentice->course->course_number ?? 'Sin curso' }}
            {{ $apprentice->course->name ?? '' }}
        </div>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Equipo</div>
        <div class="col-sm-8">{{ $apprentice->computer->brand ?? 'Sin equipo' }} {{ $apprentice->computer->number ?? '' }}</div>
    </div>

    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('admin.apprentices.index') }}" class="btn btn-secondary">Volver al listado</a>
        <a href="{{ route('admin.apprentices.edit', $apprentice->id) }}" class="btn btn-sena">
            <i class="fas fa-sync-alt me-1" aria-hidden="true"></i> Editar Aprendiz
        </a>
    </div>
</div>
@endsection
