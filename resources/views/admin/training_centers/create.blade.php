@extends('layouts.app')

@section('title', 'Nuevo Centro de Formación - Administración')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-sena p-4 shadow-sm">
            <h3 class="fw-bold mb-4" style="color:var(--sena-dark);">
                <i class="fas fa-building text-success me-2" aria-hidden="true"></i>Registrar Centro de Formación
            </h3>

            <form action="{{ route('admin.training-centers.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Ej. Centro de Gestión de Mercados, Logística y TI" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Dirección</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Ej. Calle 57 No. 3-00" value="{{ old('address') }}">
                </div>

                <div class="mb-4">
                    <label for="city" class="form-label fw-bold">Ciudad</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="Ej. Bogotá D.C." value="{{ old('city') }}">
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.training-centers.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-sena">
                        <i class="fas fa-save me-1" aria-hidden="true"></i> Guardar Centro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
