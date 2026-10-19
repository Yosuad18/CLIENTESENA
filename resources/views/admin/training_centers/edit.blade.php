@extends('layouts.app')

@section('title', 'Editar Centro de Formación - Administración')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-sena p-4 shadow-sm">
            <h3 class="fw-bold mb-4" style="color:var(--sena-dark);">
                <i class="fas fa-edit text-success me-2" aria-hidden="true"></i>Editar Centro de Formación
            </h3>

            <form action="{{ route('admin.training-centers.update', $trainingCenter->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $trainingCenter->name ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Dirección</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $trainingCenter->address ?? '') }}">
                </div>

                <div class="mb-4">
                    <label for="city" class="form-label fw-bold">Ciudad</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $trainingCenter->city ?? '') }}">
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.training-centers.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-sena">
                        <i class="fas fa-sync-alt me-1" aria-hidden="true"></i> Actualizar Centro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
