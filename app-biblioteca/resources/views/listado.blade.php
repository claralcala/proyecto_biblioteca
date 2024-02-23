@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block custom-bg sidebar" style="height: 100vh;">
            <div class="sidebar-sticky">
                <h2>{{__('Barra Navegacion')}}</h2>
                <ul class="nav flex-column">
                    <!-- Elementos del Sidebar -->

                     <!-- Elementos del Sidebar -->
                     @if(Auth::user()->role == 'admin') {{-- Solo visible para administradores --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('libros.create') }}">
                            {{__('Registrar Libro')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('revistas.create') }}">
                            {{__('Registrar Revista')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ordenadores.create') }}">
                            {{__('Registrar Ordenador')}}
                            </a>
                        </li>
                    @else {{-- Solo visible para usuarios normales --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.libros_prestados') }}">
                            {{__('Mis Libros')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.revistas_prestadas') }}">
                                
                                 {{__('Mis revistas')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.ordenadores_prestados') }}">
                            {{__('Mis ordenadores')}}
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('revistas.index') }}">
                        {{__('Listado Revista')}}
                        </a>
                    </li>
        
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lista_ordenadores') }}">
                        {{__('Listado Ordenadores')}}
                        </a>
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
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="container">
                        <h2>{{__('Listado Libros')}}</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{__('Titulo')}}</th>
                                    <th>{{__('Autor')}}</th>
                                    <th>ISBN</th>
                                    <th>{{__('Año Publicacion')}}</th>
                                    <th>{{__('Portada')}}</th>
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
                                        {{__('Sin Portada')}}
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