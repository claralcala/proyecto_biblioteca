@extends('app')

@section('content')
<div class="container">
    <h2> {{__('Detalles de la revista')}} {{ $revista->titulo }}</h2>
    <p>{{__('Numero')}} {{ $revista->numero }}</p>
    <p>{{__('Año Publicacion')}} {{ $revista->anio_publicacion }}</p>
    @if($revista->portada)
            <div>
            <img src="{{ asset('images/' . $revista->portada) }}" alt="Portada" style="width: 100px; height: auto;">            
            </div>
        @else
        <!-- Controlamos en caso de que no haya portada para avisar al usuario-->
            <p>{{__('No hay portada')}}</p>
        @endif

    

    <!-- Botón de Edición -->
    <a href="{{ route('revistas.edit', $revista->id) }}" class="btn btn-primary">{{__('Editar')}}</a>

    <!-- Botón de Eliminación -->
    <form action="{{ route('revistas.destroy', $revista->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta revista?')">{{__('Eliminar')}}</button>
    </form>
</div>
@endsection