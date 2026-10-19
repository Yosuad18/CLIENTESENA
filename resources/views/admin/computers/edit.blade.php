@extends('layouts.app')

@section('title', 'Editar Computador - Administración')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-sena p-4 shadow-sm">
            <h3 class="fw-bold mb-4" style="color:var(--sena-dark);">
                <i class="fas fa-edit text-success me-2" aria-hidden="true"></i>Editar Computador
            </h3>

            <form action="{{ route('admin.computers.update', $computer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="brand" class="form-label fw-bold">Marca</label>
                    <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand', $computer->brand ?? '') }}" required>
                </div>

                <div class="mb-4">
                    <label for="number" class="form-label fw-bold">Número / Inventario</label>
                    <input type="text" name="number" id="number" class="form-control" value="{{ old('number', $computer->number ?? '') }}" required>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.computers.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-sena">
                        <i class="fas fa-sync-alt me-1" aria-hidden="true"></i> Actualizar Computador
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
