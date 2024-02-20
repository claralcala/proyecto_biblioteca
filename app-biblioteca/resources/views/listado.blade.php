@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block custom-bg sidebar" style="height: 100vh;">
            <div class="sidebar-sticky">
                <h2>Barra de Navegación</h2>
                <ul class="nav flex-column">
                    <!-- Elementos del Sidebar -->

                     <!-- Elementos del Sidebar -->
                     @if(Auth::user()->role == 'admin') {{-- Solo visible para administradores --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('libros.create') }}">
                                Registrar Libro
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('revistas.create') }}">
                                Registrar Revista
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ordenadores.create') }}">
                                Registrar Ordenador
                            </a>
                        </li>
                    @else {{-- Solo visible para usuarios normales --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.libros_prestados') }}">
                                Mis libros
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.revistas_prestadas') }}">
                                Mis revistas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.ordenadores_prestados') }}">
                                Mis ordenadores
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('revistas.index') }}">
                            Listado Revista
                        </a>
                    </li>
        
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lista_ordenadores') }}">
                            Listado Ordenadores
                        </a>
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
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="container">
                        <h2>Listado de Libros</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>ISBN</th>
                                    <th>Año de Publicación</th>
                                    <th>Portada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($libros as $libro)
                                <tr>
                                <td>
                                        @if(Auth::user()->role == 'admin')
                                            <a href="{{ route('libros.show', $libro->id) }}">{{ $libro->titulo }}</a>
                                        @else
                                            <a href="{{ route('libros.showUser', $libro->id) }}">{{ $libro->titulo }}</a>
                                        @endif
                                    </td>
                                    <td>{{ $libro->autor }}</td>
                                    <td>{{ $libro->isbn }}</td>
                                    <td>{{ $libro->anio_publicacion }}</td>
                                    <td>
                                        @if($libro->portada)
                                            <img src="{{ asset('images/' . $libro->portada) }}" width="100" height="100">
                                        @else
                                            Sin portada
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{ $libros->links() }}
                        </table>
                </div>
                </div>
            </main>
        </div>
@endsection