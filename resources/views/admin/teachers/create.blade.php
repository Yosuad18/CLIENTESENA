@extends('layouts.app')

@section('title', 'Nuevo Instructor - Administración')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card card-sena p-4 shadow-sm">
            <h3 class="fw-bold mb-4" style="color:var(--sena-dark);">
                <i class="fas fa-user-plus text-success me-2" aria-hidden="true"></i>Registrar Instructor
            </h3>

            <form action="{{ route('admin.teachers.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nombre Completo</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Ej. Juan Pérez" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Ej. juan@example.com" value="{{ old('email') }}" required>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="area_id" class="form-label fw-bold">Área</label>
                        <select name="area_id" id="area_id" class="form-select" required>
                            <option value="">Seleccione un área...</option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="training_center_id" class="form-label fw-bold">Centro de Formación</label>
                        <select name="training_center_id" id="training_center_id" class="form-select" required>
                            <option value="">Seleccione un centro...</option>
                            @foreach($trainingCenters as $center)
                                <option value="{{ $center->id }}" {{ old('training_center_id') == $center->id ? 'selected' : '' }}>{{ $center->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold d-block">Cursos Asignados</label>
                    @forelse($courses as $course)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="courses[]" value="{{ $course->id }}" id="c_{{ $course->id }}" {{ in_array($course->id, old('courses', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c_{{ $course->id }}">{{ $course->course_number }} - {{ $course->name ?? 'Sin nombre' }}</label>
                        </div>
                    @empty
                        <span class="text-muted">No hay cursos disponibles.</span>
                    @endforelse
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-sena">
                        <i class="fas fa-save me-1" aria-hidden="true"></i> Guardar Instructor
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
