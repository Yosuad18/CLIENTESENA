<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administración SENA')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sena-green: #39A900;
            --sena-dark: #00324D;
            --sena-surface: #F5F7F8;
            --sena-orange: #FF6B00;
            --sena-border: #E0E0E0;
        }

        body {
            font-family: 'Work Sans', sans-serif;
            background-color: var(--sena-surface);
            color: #1E1E1E;
        }

        .sena-header {
            background-color: var(--sena-green);
            color: #fff;
        }

        .sena-header .brand {
            font-weight: 700;
            font-size: 1.15rem;
            letter-spacing: 0.5px;
            text-decoration: none;
            color: #fff;
        }

        .sena-header .nav-link {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }

        .sena-header .nav-link:hover,
        .sena-header .nav-link.active {
            color: #fff;
        }

        .btn-sena {
            background-color: var(--sena-green);
            color: #fff;
            border: none;
            font-weight: 600;
        }

        .btn-sena:hover,
        .btn-sena:focus {
            background-color: #2f8a00;
            color: #fff;
        }

        .card-sena {
            background: #fff;
            border: 1px solid var(--sena-border);
            border-radius: 12px;
        }

        .table-sena thead {
            background-color: var(--sena-dark);
            color: #fff;
        }

        .table-sena thead th {
            font-weight: 600;
            border: none;
        }

        .page-title {
            color: var(--sena-dark);
            font-weight: 700;
        }

        .skip-link {
            position: absolute;
            left: -9999px;
        }

        .skip-link:focus {
            left: 1rem;
            top: 1rem;
            z-index: 1000;
            background: #fff;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <a class="skip-link" href="#main-content">Saltar al contenido principal</a>

    <header class="sena-header shadow-sm">
        <div class="container py-2 d-flex flex-wrap align-items-center justify-content-between gap-2">
            <a href="{{ route('home') }}" class="brand" aria-label="SENA - Inicio">
                <i class="fas fa-graduation-cap me-2" aria-hidden="true"></i>SENA · Administración
            </a>
            <nav class="d-flex align-items-center gap-3" aria-label="Navegación principal">
                <a href="{{ route('home') }}" class="nav-link p-0"><i class="fas fa-home me-1" aria-hidden="true"></i> Inicio</a>
                <a href="{{ route('admin.dashboard') }}" class="nav-link p-0"><i class="fas fa-cog me-1" aria-hidden="true"></i> Panel</a>
            </nav>
        </div>
    </header>

    <main id="main-content" class="container py-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1" aria-hidden="true"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-1" aria-hidden="true"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-1" aria-hidden="true"></i>
                <strong>Revisa los datos del formulario:</strong>
                <ul class="mb-0 mt-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="text-center text-muted py-4" style="font-size: 0.85rem;">
        Servicio Nacional de Aprendizaje (SENA) · Panel de Administración
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
