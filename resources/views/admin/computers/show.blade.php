@extends('layouts.app')

@section('title', 'Computador - Administración')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title mb-0">Detalle del Computador</h1>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.computers.index') }}" class="btn btn-outline-secondary">Volver</a>
        <a href="{{ route('admin.computers.edit', $computer->id) }}" class="btn btn-sena">
            <i class="fas fa-edit me-1" aria-hidden="true"></i> Editar
        </a>
    </div>
</div>

<div class="card card-sena p-4 shadow-sm">
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">ID</div>
        <div class="col-sm-8">#{{ $computer->id ?? '—' }}</div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Marca</div>
        <div class="col-sm-8">{{ $computer->brand ?? 'Sin marca' }}</div>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-sm-4 fw-bold" style="color:var(--sena-dark);">Número / Inventario</div>
        <div class="col-sm-8">{{ $computer->number ?? '—' }}</div>
    </div>

    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('admin.computers.index') }}" class="btn btn-secondary">Volver al listado</a>
        <a href="{{ route('admin.computers.edit', $computer->id) }}" class="btn btn-sena">
            <i class="fas fa-sync-alt me-1" aria-hidden="true"></i> Editar Computador
        </a>
    </div>
</div>
@endsection
