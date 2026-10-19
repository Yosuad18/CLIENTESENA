@extends('layouts.app')

@section('title', 'Nuevo Computador - Administración')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-sena p-4 shadow-sm">
            <h3 class="fw-bold mb-4" style="color:var(--sena-dark);">
                <i class="fas fa-desktop text-success me-2" aria-hidden="true"></i>Registrar Computador
            </h3>

            <form action="{{ route('admin.computers.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="brand" class="form-label fw-bold">Marca</label>
                    <input type="text" name="brand" id="brand" class="form-control" placeholder="Ej. Lenovo, HP, Dell" value="{{ old('brand') }}" required>
                </div>

                <div class="mb-4">
                    <label for="number" class="form-label fw-bold">Número / Inventario</label>
                    <input type="text" name="number" id="number" class="form-control" placeholder="Ej. LAB-001" value="{{ old('number') }}" required>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.computers.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-sena">
                        <i class="fas fa-save me-1" aria-hidden="true"></i> Guardar Computador
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
