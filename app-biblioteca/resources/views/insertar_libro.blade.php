@extends('app')

@section('content')
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block custom-bg sidebar" style="height: 200vh;">
            <div class="sidebar-sticky">
                <h2> {{__('Barra de Navegacion')}}</h2>
                <ul class="nav flex-column">
                    <!-- Elementos del Sidebar -->
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
                        <a class="nav-link" href="{{ route('ordenadores.create') }}">
                          
                            {{__('Registrar Ordenador')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ordenadores.store') }}">
                            
                            {{__('Listado Ordenadores')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logados') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Pantalla Principal</button>
                        </form>
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

        <!-- Contenido Principal -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="container">
                    <h2>{{__('Insertar Libro')}}</h2>
                    <form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="titulo" class="form-label">{{__('Titulo')}}</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="autor" class="form-label">{{__('Autor')}}</label>
                            <input type="text" class="form-control" id="autor" name="autor" required>
                        </div>
                        <div class="mb-3">
                            <label for="isbn" class="form-label">{{__('ISBN')}}</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" required>
                        </div>
                        <div class="mb-3">
                            <label for="anio_publicacion" class="form-label">{{__('Año publicacion')}}</label>
                            <input type="text" class="form-control" id="anio_publicacion" name="anio_publicacion" required>
                        </div>
                        <div class="mb-3">
                            <label for="portada" class="form-label">{{__('Portada')}}</label>
                            <input type="file" class="form-control" id="portada" name="portada">
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('Guardar')}}</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
