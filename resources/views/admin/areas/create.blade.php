@extends('layouts.app')

@section('title', 'Nueva Área - Administración')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-sena p-4 shadow-sm">
            <h3 class="fw-bold mb-4" style="color:var(--sena-dark);">
                <i class="fas fa-plus-circle text-success me-2" aria-hidden="true"></i>Registrar Área
            </h3>

            <form action="{{ route('admin.areas.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label fw-bold">Nombre del Área</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Ej. Gestión Administrativa" value="{{ old('name') }}" required>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.areas.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-sena">
                        <i class="fas fa-save me-1" aria-hidden="true"></i> Guardar Área
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
