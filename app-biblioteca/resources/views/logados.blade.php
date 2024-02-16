@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <h2>Barra de Navegacion</h2>
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
                        <a class="nav-link" href="{{ route('ordenadores.store') }}">
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

<!-- Contenido principal -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <div class="text-center">
            
               
            </div>

            <div class="text-center">
                <h4>Es un placer darle la bienvenida a la Biblioteca Carrillo, un espacio dedicado al conocimiento, la cultura y el enriquecimiento personal. Nos complace enormemente tener la oportunidad de compartir con usted la diversidad de recursos y servicios que ofrecemos.</h4></br>

                </br>
                
                <img src="{{ asset('images/pantallaPrincipal.jpeg') }}" alt="Imagen Biblioteca Carrillo" class="img-fluid mb-3"></br>

                </br>

                <h4>
                    En la Biblioteca Carrillo, nos esforzamos por ser mucho más que un simple depósito de libros; somos un centro dinámico que fomenta la exploración intelectual, el aprendizaje continuo y el desarrollo de la comunidad. Nuestra colección abarca una amplia gama de temas, desde literatura clásica hasta las últimas novedades en ciencia, tecnología, historia y más.</br>

                </br>
                    Además de nuestros recursos impresos, también ofrecemos acceso a plataformas digitales, computadoras con conexión a Internet y eventos culturales. Nuestro personal altamente capacitado está siempre disponible para ayudarlo a encontrar la información que busca, recomendarle lecturas interesantes o guiarlo en el uso de nuestras instalaciones.</br>

                    </br>

                    En la Biblioteca Carrillo, nos enorgullece ser un lugar inclusivo que promueve la diversidad de ideas y perspectivas. Invitamos a personas de todas las edades y trasfondos a explorar y aprovechar al máximo los servicios que ofrecemos.</br>

                    </br>

                    Le animamos a participar en nuestros eventos, actividades y programas, diseñados para inspirar la curiosidad y fomentar la conexión dentro de nuestra comunidad. Creemos firmemente que la biblioteca es un espacio vital donde las ideas convergen y las mentes se expanden.</br>

                    </br>
                    Estamos comprometidos a brindarle una experiencia bibliotecaria excepcional, y esperamos que encuentre en la Biblioteca Carrillo un lugar donde su búsqueda de conocimiento sea gratificante y enriquecedora.</br>

                    </br>

                    Gracias por elegirnos como su destino bibliotecario. </br>
                    </br>
                    ¡Bienvenido/a a la Biblioteca Carrillo!
                </h4>
            </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
        </div>
    </div>
</main>

    </div>
</div>
@endsection 