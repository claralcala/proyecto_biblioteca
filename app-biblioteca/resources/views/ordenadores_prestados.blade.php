@extends('app')

@section('content')
<div class="container">
    <h2>Ordenadores Prestados</h2>
    @if($ordenadoresPrestados->isEmpty())
        <p>No tienes ordenadores prestados.</p>
    @else
        <ul>
            @foreach($ordenadoresPrestados as $prestamo)
                <li>{{ $prestamo->ordenador->marca }}, modelo: {{ $prestamo->ordenador->modelo }} - Prestado el: {{ $prestamo->hora_prestamo }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection