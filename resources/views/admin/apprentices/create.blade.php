@extends('layouts.app')

@section('title', 'Nuevo Aprendiz - Administración')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card card-sena p-4 shadow-sm">
            <h3 class="fw-bold mb-4" style="color:var(--sena-dark);">
                <i class="fas fa-user-plus text-success me-2" aria-hidden="true"></i>Registrar Aprendiz
            </h3>

            <form action="{{ route('admin.apprentices.store') }}" method="POST">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-bold">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Ej. Juan" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="surname" class="form-label fw-bold">Apellido</label>
                        <input type="text" name="surname" id="surname" class="form-control" placeholder="Ej. Pérez" value="{{ old('surname') }}">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="document" class="form-label fw-bold">Cédula / Tarjeta de identidad</label>
                        <input type="text" name="document" id="document" class="form-control" placeholder="Número de documento" value="{{ old('document') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="estrato" class="form-label fw-bold">Estrato social</label>
                        <select name="estrato" id="estrato" class="form-select">
                            <option value="">Seleccione…</option>
                            @for ($i = 1; $i <= 6; $i++)
                                <option value="{{ $i }}" {{ old('estrato') == $i ? 'selected' : '' }}>Estrato {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Dirección de residencia</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Ej. Calle 5 No. 10-20" value="{{ old('address') }}">
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-bold">Correo electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Ej. correo@dominio.com" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cell_number" class="form-label fw-bold">Celular</label>
                        <input type="text" name="cell_number" id="cell_number" class="form-control" placeholder="Ej. 3200000000" value="{{ old('cell_number') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="course_id" class="form-label fw-bold">Curso / Ficha</label>
                    <select name="course_id" id="course_id" class="form-select" required>
                        <option value="">Seleccione un curso...</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->course_number }} - {{ $course->day ?? '' }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="computer_id" class="form-label fw-bold">Computador Asignado (Opcional)</label>
                    <select name="computer_id" id="computer_id" class="form-select">
                        <option value="">Sin equipo asignado</option>
                        @foreach($computers as $computer)
                            <option value="{{ $computer->id }}" {{ old('computer_id') == $computer->id ? 'selected' : '' }}>{{ $computer->brand }} (N°: {{ $computer->number }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.apprentices.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-sena">
                        <i class="fas fa-save me-1" aria-hidden="true"></i> Guardar Aprendiz
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
