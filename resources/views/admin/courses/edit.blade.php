@extends('layouts.app')

@section('title', 'Editar Curso - Administración')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card card-sena p-4 shadow-sm">
            <h3 class="fw-bold mb-4" style="color:var(--sena-dark);">
                <i class="fas fa-edit text-success me-2" aria-hidden="true"></i>Editar Curso
            </h3>

            <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @php
                    $selectedTeachers = old('teachers', array_map(fn ($t) => $t->id ?? $t, $course->teachers ?? []));
                @endphp

                <div class="mb-3">
                    <label for="course_number" class="form-label fw-bold">Número de Curso / Ficha</label>
                    <input type="text" name="course_number" id="course_number" class="form-control" value="{{ old('course_number', $course->course_number ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nombre del Programa (público)</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $course->name ?? '') }}" placeholder="Ej. Análisis y Desarrollo de Software">
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="day" class="form-label fw-bold">Jornada / Días</label>
                        <input type="text" name="day" id="day" class="form-control" value="{{ old('day', $course->day ?? '') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="deadline" class="form-label fw-bold">Fecha límite de inscripción</label>
                        <input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline', !empty($course->deadline) ? substr($course->deadline, 0, 10) : '') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Imagen del Curso</label>
                    @if(!empty($course->image))
                        <div class="mb-2">
                            <img src="{{ asset('storage/images/' . $course->image) }}" alt="Imagen del curso" width="90" height="90" style="object-fit:cover;border-radius:8px;">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="area_id" class="form-label fw-bold">Área</label>
                        <select name="area_id" id="area_id" class="form-select" required>
                            <option value="">Seleccione un área...</option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}" {{ old('area_id', $course->area_id ?? '') == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="training_center_id" class="form-label fw-bold">Centro de Formación</label>
                        <select name="training_center_id" id="training_center_id" class="form-select" required>
                            <option value="">Seleccione un centro...</option>
                            @foreach($trainingCenters as $center)
                                <option value="{{ $center->id }}" {{ old('training_center_id', $course->training_center_id ?? '') == $center->id ? 'selected' : '' }}>{{ $center->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold d-block">Instructores Asignados</label>
                    @forelse($teachers as $teacher)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="teachers[]" value="{{ $teacher->id }}" id="t_{{ $teacher->id }}" {{ in_array($teacher->id, array_map('intval', $selectedTeachers)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="t_{{ $teacher->id }}">{{ $teacher->name }}</label>
                        </div>
                    @empty
                        <span class="text-muted">No hay instructores disponibles.</span>
                    @endforelse
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-sena">
                        <i class="fas fa-sync-alt me-1" aria-hidden="true"></i> Actualizar Curso
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
