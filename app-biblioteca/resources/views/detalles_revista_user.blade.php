@extends('app')

@section('content')
<div class="container">
    <h2>Detalles de la Revista: {{ $revista->titulo }}</h2>
    <p>Número: {{ $revista->numero }}</p>
    <p>Año de Publicación: {{ $revista->anio_publicacion }}</p>
    @if($revista->portada)
    <div>
        <img src="{{ asset('images/' . $revista->portada) }}" alt="Portada" style="width: 100px; height: auto;">            
    </div>
    @else
    <!-- Controlamos en caso de que no haya portada para avisar al usuario-->
    <p>No hay portada disponible</p>
    @endif

    <!-- Contenedor para los botones con flexbox -->
    <div class="d-flex">
        @if(!$revista->prestado)
        <form action="{{ route('revistas.prestar', $revista->id) }}" method="POST" class="custom-margin">
    @csrf
    <button type="submit" class="btn btn-primary">Pedir Prestada</button>
    </form>
        @else
        <button class="btn btn-secondary mr-2" disabled>Ya Prestada</button>
        @endif

        <a href="{{ route('revistas.index') }}" class="btn btn-secondary">Volver al listado de revistas</a>
    </div>
</div>
@endsection
