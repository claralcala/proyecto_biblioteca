@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block custom-bg sidebar">
            <div class="sidebar-sticky">
            <h2>Barra de Navegacion</h2>
                <ul class="nav flex-column">
                    <!-- Elementos del sidebar -->
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('libros.listado') }}">
                            Listado de Libros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('revistas.index') }}">
                            Listado de Revistas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lista_ordenadores') }}">
                            Listado de Ordenadores
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

        <!-- Contenido principal -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Bienvenido</h1>
            </div>

            <img src="{{ asset('images/pantallaPrincipal.jpeg') }}" alt="Imagen Biblioteca Carrillo" class="img-fluid mb-3">

            <h4>Es un placer darle la bienvenida, un espacio dedicado al conocimiento, la cultura y el enriquecimiento personal. Nos complace enormemente tener la oportunidad de compartir con usted la diversidad de recursos y servicios que ofrecemos.</h4>

            <div class="row justify-content-center">
                <div class="col-md-8">
                </div>
            </div>
        </main>
    </div>
</div>
@endsection