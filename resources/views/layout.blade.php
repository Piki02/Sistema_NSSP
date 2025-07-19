<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'NSSP')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
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

        {{-- Mensaje de éxito (opcional) --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Aquí se cargan los contenidos específicos de cada vista --}}
        @yield('content')
    </div>
</body>
</html>
