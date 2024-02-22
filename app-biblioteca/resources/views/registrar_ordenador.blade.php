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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('libros.create') }}">
                            
                            {{__('Registrar Libro')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('libros.listado') }}">
                       
                            {{__('Listado de Libros')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('revistas.create') }}">
                           
                            {{__('Registrar Revista')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('revistas.store') }}">
                          
                            {{__('Listado Revista')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ordenadores.store') }}">
                           
                            {{__('Listado Ordenadores')}}
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
                    <h2>{{__('Crear Ordenador')}}</h2>
                    <form action="{{ route('ordenadores.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="marca" class="form-label">{{__('Marca')}}</label>
                            <input type="text" class="form-control" id="marca" name="marca" required>
                        </div>
                        <div class="mb-3">
                            <label for="modelo" class="form-label">{{__('Modelo')}}</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" required>
                        </div>
                        <div class="mb-3">
                            <label for="numero_referencia" class="form-label">{{__('Numero Referencia')}}</label>
                            <input type="text" class="form-control" id="numero_referencia" name="numero_referencia" required>
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('Guardar')}}</button>
                    </form>
                </div>
                </div>
                </div>
            </main>
        </div>
@endsection