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
                        <a class="nav-link" href="{{ route('libros.listado') }}">
                            Listado Libros
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
                <h2>Listado de Revistas</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Numero</th>
                        
                            <th>Año de Publicación</th>
                            <th>Portada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($revistas as $revista)
                        <tr>
                            
                        <td>
                                @if(Auth::user()->role == 'admin')
                                    <a href="{{ route('revistas.show', $revista->id) }}">{{ $revista->titulo }}</a>
                                @else
                                    <a href="{{ route('revistas.showUser', $revista->id) }}">{{ $revista->titulo }}</a>
                                @endif
                            </td>
                    
                            <td>{{ $revista->titulo }}</td>
                            <td>{{ $revista->numero }}</td>
                            <td>{{ $revista->anio_publicacion }}</td>
                            <td>
                                @if($revista->portada)
                                    <img src="{{ asset('images/' . $revista->portada) }}" width="100" height="100">
                                @else
                                    Sin portada
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{ $revistas->links() }}
                </table>
                </div>
                </div>
            </main>
        </div>
    @endsection