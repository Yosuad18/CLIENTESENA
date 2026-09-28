<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión SENA - Inicio</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome para Íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="fa-solid fa-graduation-cap me-2"></i>AdminSena Client
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('apprentices.index') }}">Aprendices</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Encabezado / Hero Section -->
    <header class="bg-white border-bottom py-5 mb-5 shadow-sm">
        <div class="container text-center py-3">
            <h1 class="display-5 fw-bold text-success mb-3">Panel de Control - AdminSena</h1>
            <p class="lead text-secondary mx-auto" style="max-width: 700px;">
                Interfaz cliente desacoplada que consume la API RESTful centralizada para la gestión de aprendices, instructores, cursos y equipos informáticos.
            </p>
            <div class="mt-4">
                <a href="{{ route('apprentices.index') }}" class="btn btn-success btn-lg px-4 me-md-2 shadow-sm">
                    <i class="fa-solid fa-users me-2"></i> Ver Aprendices
                </a>
            </div>
        </div>
    </header>

    <!-- Tarjetas de Acceso / Módulos -->
    <main class="container mb-5">
        <div class="row g-4">

            <!-- Tarjeta: Aprendices -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 transition-hover">
                    <div class="card-body text-center p-4">
                        <div class="bg-success-subtle text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                            <i class="fa-solid fa-user-graduate fa-2x"></i>
                        </div>
                        <h4 class="card-title fw-bold">Aprendices</h4>
                        <p class="card-text text-muted">
                            Consulte el listado general de aprendices registrados, fichas asociadas y equipos asignados desde la API.
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-4 text-center">
                        <a href="{{ route('apprentices.index') }}" class="btn btn-outline-success w-75 rounded-pill">
                            Consumir API <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta: Cursos -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 opacity-75">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                            <i class="fa-solid fa-book-bookmark fa-2x"></i>
                        </div>
                        <h4 class="card-title fw-bold">Cursos / Fichas</h4>
                        <p class="card-text text-muted">
                            Información sobre programas de formación, números de ficha, áreas y centros de formación.
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-4 text-center">
                        <button class="btn btn-outline-secondary w-75 rounded-pill" disabled>
                            Próximamente
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tarjeta: Equipos -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 opacity-75">
                    <div class="card-body text-center p-4">
                        <div class="bg-warning-subtle text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                            <i class="fa-solid fa-laptop-code fa-2x"></i>
                        </div>
                        <h4 class="card-title fw-bold">Equipos Computacionales</h4>
                        <p class="card-text text-muted">
                            Gestión de inventario de computadores y asignación de dispositivos a aprendices.
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-4 text-center">
                        <button class="btn btn-outline-secondary w-75 rounded-pill" disabled>
                            Próximamente
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0 small text-secondary">
                &copy; {{ date('Y') }} AdminSena Client - Proyecto Desacoplado (Laravel Frontend / Backend REST API)
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
