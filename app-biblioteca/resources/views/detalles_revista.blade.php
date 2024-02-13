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

    

    <!-- Botón de Edición -->
    <a href="{{ route('revistas.edit', $revista->id) }}" class="btn btn-primary">Editar</a>

    <!-- Botón de Eliminación -->
    <form action="{{ route('revistas.destroy', $revista->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta revista?')">Eliminar</button>
    </form>
</div>
@endsection