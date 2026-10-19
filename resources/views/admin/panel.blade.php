@extends('layouts.app')

@section('title', 'Panel General - Administración')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title mb-1">Panel General</h1>
        <p class="text-muted mb-0">Accede a cada módulo y consulta la cantidad de registros disponibles.</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Dashboard</a>
</div>

<div class="row g-3">
    @foreach($modules as $module)
    <div class="col-12 col-sm-6 col-lg-4">
        <a href="{{ route($module['route']) }}" class="text-decoration-none">
            <div class="card card-sena h-100 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:52px;height:52px;background:{{ $module['color'] === 'orange' ? 'rgba(255,107,0,.12)' : 'rgba(57,169,0,.12)' }};color:{{ $module['color'] === 'orange' ? 'var(--sena-orange)' : 'var(--sena-green)' }};">
                        <i class="fas {{ $module['icon'] }} fa-lg" aria-hidden="true"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="mb-0 fw-bold" style="color:var(--sena-dark);">{{ $module['label'] }}</h5>
                        <small class="text-muted">{{ $module['desc'] }}</small>
                    </div>
                    <span class="badge rounded-pill px-3 py-2" style="background:{{ $module['color'] === 'orange' ? 'rgba(255,107,0,.15)' : 'rgba(57,169,0,.15)' }};color:{{ $module['color'] === 'orange' ? 'var(--sena-orange)' : 'var(--sena-green)' }};font-size:.95rem;">
                        {{ $module['count'] }}
                    </span>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection
