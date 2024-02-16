<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
                            
    <title>Biblioteca Carrillo</title>
                            
    <!-- Fuentes -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS CUSTOM -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
<header class="bg-dark text-white text-center py-3">
    @if(Auth::check()) {{-- Verifica si hay un usuario autenticado --}}
        @if(Auth::user()->role === 'admin') {{-- Si el usuario es un administrador --}}
            <a href="{{ route('logados') }}" class="text-white">
                <h1>Biblioteca Carrillo</h1>
            </a>
        @elseif(Auth::user()->role === 'user') {{-- Si el usuario es un usuario normal --}}
            <a href="{{ route('principal') }}" class="text-white">
                <h1>Biblioteca Carrillo</h1>
            </a>
        @endif
    @else {{-- Sin usuario autenticado dejamos el header sin enlace --}}
        <h1>Biblioteca Carrillo</h1>
    @endif
</header>
    @yield('content')

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; {{ date('Y') }} Biblioteca Carrillo - Clara Alcalá y Manuel Ángel Rodríguez</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>