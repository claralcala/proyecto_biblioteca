
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('libros.create') }}">
                            Registrar Libro
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('libros.listado') }}">
                            Listado de Libros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('revistas.create') }}">
                            Registrar Revista
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('revistas.store') }}">
                            Listado Revista
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ordenadores.create') }}">
                            Registrar Ordenador
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
                <h2>Listado de Ordenadores</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Número de Referencia</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordenadores as $ordenador)
                        <tr>

                        <td>
                                @if(Auth::user()->role == 'admin')
                                    <a href="{{ route('ordenadores.show', $ordenador->id) }}">{{ $ordenador->marca }}</a>
                                @else
                                    <a href="{{ route('ordenadores.showUser', $ordenador->id) }}">{{ $ordenador->marca }}</a>
                                @endif
                            </td>
                            
                            <td>{{ $ordenador->modelo }}</td>
                            <td>{{ $ordenador->numero_referencia }}</td>
                            <td>
                            
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                </div>
                </div>
            </main>
        </div>


@endsection