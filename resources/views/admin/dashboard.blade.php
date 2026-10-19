@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title mb-1">Panel de Administración</h1>
        <p class="text-muted mb-0">Selecciona un módulo para gestionar los registros del sistema.</p>
    </div>
</div>

<div class="row g-3">
    <div class="col-12 col-sm-6 col-lg-4">
        <a href="{{ route('admin.areas.index') }}" class="text-decoration-none">
            <div class="card card-sena h-100 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:52px;height:52px;background:rgba(57,169,0,.12);color:var(--sena-green);">
                        <i class="fas fa-layer-group fa-lg" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold" style="color:var(--sena-dark);">Áreas</h5>
                        <small class="text-muted">Áreas de formación</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-lg-4">
        <a href="{{ route('admin.courses.index') }}" class="text-decoration-none">
            <div class="card card-sena h-100 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:52px;height:52px;background:rgba(57,169,0,.12);color:var(--sena-green);">
                        <i class="fas fa-book fa-lg" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold" style="color:var(--sena-dark);">Cursos</h5>
                        <small class="text-muted">Cursos y fichas</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-lg-4">
        <a href="{{ route('admin.teachers.index') }}" class="text-decoration-none">
            <div class="card card-sena h-100 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:52px;height:52px;background:rgba(57,169,0,.12);color:var(--sena-green);">
                        <i class="fas fa-chalkboard-teacher fa-lg" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold" style="color:var(--sena-dark);">Instructores</h5>
                        <small class="text-muted">Docentes del centro</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-lg-4">
        <a href="{{ route('admin.apprentices.index') }}" class="text-decoration-none">
            <div class="card card-sena h-100 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:52px;height:52px;background:rgba(57,169,0,.12);color:var(--sena-green);">
                        <i class="fas fa-user-graduate fa-lg" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold" style="color:var(--sena-dark);">Aprendices</h5>
                        <small class="text-muted">Aprendices inscritos</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-lg-4">
        <a href="{{ route('admin.computers.index') }}" class="text-decoration-none">
            <div class="card card-sena h-100 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:52px;height:52px;background:rgba(57,169,0,.12);color:var(--sena-green);">
                        <i class="fas fa-desktop fa-lg" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold" style="color:var(--sena-dark);">Computadores</h5>
                        <small class="text-muted">Equipos del laboratorio</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-lg-4">
        <a href="{{ route('admin.training-centers.index') }}" class="text-decoration-none">
            <div class="card card-sena h-100 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:52px;height:52px;background:rgba(57,169,0,.12);color:var(--sena-green);">
                        <i class="fas fa-building fa-lg" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold" style="color:var(--sena-dark);">Centros de Formación</h5>
                        <small class="text-muted">Centros SENA</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-lg-4">
        <a href="{{ route('admin.course-teachers.index') }}" class="text-decoration-none">
            <div class="card card-sena h-100 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:52px;height:52px;background:rgba(255,107,0,.12);color:var(--sena-orange);">
                        <i class="fas fa-link fa-lg" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold" style="color:var(--sena-dark);">Cursos e Instructores</h5>
                        <small class="text-muted">Asignaciones (solo consulta)</small>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
