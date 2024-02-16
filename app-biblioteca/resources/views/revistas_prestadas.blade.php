@extends('app')

@section('content')
<div class="container">
    <h2>Revistas Prestadas</h2>
    @if($revistasPrestadas->isEmpty())
        <p>No tienes revistas prestadas.</p>
    @else
        <ul>
            @foreach($revistasPrestadas as $prestamo)
                <li>{{ $prestamo->revista->titulo }}, número: {{ $prestamo->revista->numero }} - Prestada el: {{ $prestamo->fecha_prestamo }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection