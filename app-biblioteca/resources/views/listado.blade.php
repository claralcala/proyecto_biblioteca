@extends('app')

@section('content')
<div class="container">
    <h2>Listado de Libros</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Año de Publicación</th>
                <th>Portada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
            <tr>
                <td><a href="{{ route('libros.show', $libro->id) }}">{{ $libro->titulo }}</a></td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->isbn }}</td>
                <td>{{ $libro->anio_publicacion }}</td>
                <td>
                    @if($libro->portada)
                        <img src="{{ asset('images/' . $libro->portada) }}" width="100" height="100">
                    @else
                        Sin portada
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        {{ $libros->links() }}
    </table>
</div>
@endsection