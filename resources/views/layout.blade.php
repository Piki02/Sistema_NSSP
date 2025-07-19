<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'NSSP')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

    {{-- 🧭 NAVBAR PRINCIPAL --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 rounded shadow-sm px-3">
        <a class="navbar-brand" href="{{ route('dashboard') }}">NSSP</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('files.index') }}">Files</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clients.index') }}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vessels.index') }}">Buques</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('time-logs.index') }}">Time Logs</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger btn-sm">Cerrar sesión</button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">@yield('title')</h1>

        {{-- Botón para regresar al dashboard --}}
        @if (Route::has('dashboard'))
            <div class="mb-4">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    ← Regresar al Inicio
                </a>
            </div>
        @endif

        {{-- 🔍 Formulario de búsqueda de files --}}
        @auth
        <form action="{{ route('files.search') }}" method="GET" class="row g-2 mb-4">
            <div class="col-auto">
                <select name="branch" class="form-select" required>
                    <option value="GT">GT - Guatemala</option>
                    <option value="HN">HN - Honduras</option>
                    <option value="CR">CR - Costa Rica</option>
                </select>
            </div>
            <div class="col-auto">
                <input type="text" name="number" class="form-control" placeholder="Número de File (ej. 202025)" required>
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </div>
        </form>
        @endauth

        {{-- Mensajes de éxito y error --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Contenido específico de cada vista --}}
        @yield('content')
    </div>
</body>
</html>
