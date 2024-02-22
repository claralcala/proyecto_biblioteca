@extends('app')

@section('content')
    <div class="container">
        <h2>{{__('Detalles del libro')}}</h2>
        <p><strong>{{__('Titulo')}}</strong> {{ $libro->titulo }}</p>
        <p><strong>{{__('Autor')}}</strong> {{ $libro->autor }}</p>
       
        @if($libro->portada)
            <div>
                <img src="{{ asset('images/' . $libro->portada) }}" alt="{{ $libro->titulo }}" style="max-width: 100%; height: 300px; border: 1px solid #ddd; border-radius: 4px; padding: 5px;">
            </div>
        @else
        <!-- Controlamos en caso de que no haya portada para avisar al usuario-->
            <p>{{__('No hay portada')}}</p>
        @endif

        <!-- boton para editar los datos del libro -->
    <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-primary">{{__('Editar')}}</a>

        <!-- boton para eliminar libro -->
    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este libro?')">{{__('Eliminar')}}</button>
    </form>
    </div>
@endsection