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

    

    
</div>
@endsection