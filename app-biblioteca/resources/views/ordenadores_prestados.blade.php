@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block custom-bg sidebar" style="height: 100vh;">
            <div class="sidebar-sticky">
                <h2>{{__('Barra de Navegacion')}}</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('libros.listado') }}"> {{__('Listado de Libros')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('revistas.index') }}"> {{__('Listado de Revistas')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lista_ordenadores') }}"> {{__('Listado de Ordenadores ')}}</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.libros_prestados') }}"> {{__('Mis libros')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.revistas_prestadas') }}"> {{__('Mis revistas')}}</a>
                    </li>
                                @if(Auth::check()) {{-- Verifica si hay un usuario autenticado --}}
                    @if(Auth::user()->role === 'admin') {{-- Si el usuario es un administrador --}}
                    <li class="nav-item">
                                    <form action="{{ route('logados') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Inicio  </button>
                                    </form>
                                </li>
                    
                    @elseif(Auth::user()->role === 'user') {{-- Si el usuario es un usuario normal --}}
                    <li class="nav-item">
                                    <form action="{{ route('principal') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Inicio  </button>
                                    </form>
                                </li>
                    @endif
                            @else {{-- Sin usuario autenticado dejamos el header sin enlace --}}
                            <img src= "{{ asset('images/biblio.png') }}" alt = "Logo" class="img-fluid mb-3">
                    @endif
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
    <h2>{{__('Ordenadores Prestados')}}</h2>
    @if($ordenadoresPrestados->isEmpty())
        <p>{{__('No tienes ordenadores')}}</p>
    @else
        <ul>
            @foreach($ordenadoresPrestados as $prestamo)
                <li>{{ $prestamo->ordenador->marca }}, {{__('Modelo')}}: {{ $prestamo->ordenador->modelo }} - {{__('Prestado el')}}: {{ $prestamo->hora_prestamo }}</li>
            @endforeach
        </ul>
    @endif
    </div>
</main>
</div>
</div>
@endsection