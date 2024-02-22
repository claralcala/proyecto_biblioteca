
@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block custom-bg sidebar" style="height: 100vh;">
            <div class="sidebar-sticky">
                <h2>{{__('Barra de Navegacion')}}</h2>
                <ul class="nav flex-column">
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
                                {{__('Mis libros')}}
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
                        <a class="nav-link" href="{{ route('libros.listado') }}">
                            {{__('Listado de Libros')}}
                        </a>
                    </li>
        
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('revistas.index') }}">
                           {{__('Listado Revistas')}}
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
                <h2> {{__('Listado Ordenadores')}}</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{__('Marca')}}</th>
                            <th>{{__('Modelo')}}</th>
                            <th>{{__('Numero Referencia')}}</th>
                        
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
                    {{ $ordenadores->links() }}
                </table>
                </div>
                </div>
            </main>
        </div>


@endsection