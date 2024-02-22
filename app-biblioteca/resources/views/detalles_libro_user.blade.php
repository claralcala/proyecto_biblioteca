@extends('app')

@section('content')
<div class="container">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h2>Detalles del Libro</h2>
    <p><strong>Título:</strong> {{ $libro->titulo }}</p>
    <p><strong>Autor:</strong> {{ $libro->autor }}</p>

    @if($libro->portada)
    <div>
        <img src="{{ asset('images/' . $libro->portada) }}" alt="{{ $libro->titulo }}"
            style="max-width: 100%; height: 300px; border: 1px solid #ddd; border-radius: 4px; padding: 5px;">
    </div>
    @else
    <p>No hay portada disponible</p>
    @endif

    <!-- Contenedor para los botones, utilizando flexbox de Bootstrap -->
    <div class="d-flex align-items-center">
        <div class="mr-2">
            @if(!$libro->prestado)
            <form action="{{ route('libros.prestar', $libro->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Pedir Prestado</button>
            </form>
            @else
            <button class="btn btn-primary" disabled>Ya Prestado</button>
            @endif
        </div>
        <div>
            <!-- Botón para volver al listado de libros -->
            <a href="{{ route('libros.listado') }}" class="btn btn-secondary">Volver al listado de libros</a>
        </div>
    </div>
</div>
@endsection
