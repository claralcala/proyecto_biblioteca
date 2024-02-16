@extends('app')

@section('content')
<div class="container">
    <h2>Libros Prestados</h2>
    @if($librosPrestados->isEmpty())
        <p>No tienes libros prestados.</p>
    @else
        <ul>
            @foreach($librosPrestados as $prestamo)
                <li>{{ $prestamo->libro->titulo }} - Prestado el: {{ $prestamo->fecha_prestamo }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection