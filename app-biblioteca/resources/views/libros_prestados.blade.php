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
                        <a class="nav-link" href="{{ route('libros.listado') }}">{{__('Listado de Libros')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('revistas.index') }}">{{__('Listado Revista')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lista_ordenadores') }}">{{__('Listado de Ordenadores')}}</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.revistas_prestadas') }}">{{__('Mis revistas')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.ordenadores_prestados') }}"> {{__('Mis ordenadores')}}</a>
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

        <!-- Contenido principal -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="container">
                <h2>{{__('Libros Prestados')}}</h2>
                @if($librosPrestados->isEmpty())
                    <p>{{__('No tienes libros')}}</p>
                @else
                    <ul>
                        @foreach($librosPrestados as $prestamo)
                            <li>{{ $prestamo->libro->titulo }} - {{__('prestado el')}}: {{ $prestamo->fecha_prestamo }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </main>
    </div>
</div>
@endsection