@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block custom-bg sidebar">
            <div class="sidebar-sticky">
                <h2>Barra de Navegación</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('libros.listado') }}">Listado de Libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('revistas.index') }}">Listado de Revistas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lista_ordenadores') }}">Listado de Ordenadores</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.libros_prestados') }}">Mis libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.revistas_prestadas') }}">Mis revistas</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container">
    <h2>Ordenadores Prestados</h2>
    @if($ordenadoresPrestados->isEmpty())
        <p>No tienes ordenadores prestados.</p>
    @else
        <ul>
            @foreach($ordenadoresPrestados as $prestamo)
                <li>{{ $prestamo->ordenador->marca }}, modelo: {{ $prestamo->ordenador->modelo }} - Prestado el: {{ $prestamo->hora_prestamo }}</li>
            @endforeach
        </ul>
    @endif
    </div>
</main>
</div>
</div>
@endsection