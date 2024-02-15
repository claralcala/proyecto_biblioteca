@extends('app')

@section('content')
    <div class="container">
        <h2>Detalles del Libro</h2>
        <p><strong>Título:</strong> {{ $libro->titulo }}</p>
        <p><strong>Autor:</strong> {{ $libro->autor }}</p>
       
        @if($libro->portada)
            <div>
                <img src="{{ asset('images/' . $libro->portada) }}" alt="{{ $libro->titulo }}" style="max-width: 100%; height: 300px; border: 1px solid #ddd; border-radius: 4px; padding: 5px;">
            </div>
        @else
        <!-- Controlamos en caso de que no haya portada para avisar al usuario-->
            <p>No hay portada disponible</p>
        @endif

       
    </div>
@endsection