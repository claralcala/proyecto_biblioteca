@extends('app')

@section('content')
<div class="container">
    <h2>Listado de Revistas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Numero</th>
            
                <th>Año de Publicación</th>
                <th>Portada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($revistas as $revista)
            <tr>
                
            <td>
                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('revistas.show', $revista->id) }}">{{ $revista->titulo }}</a>
                    @else
                        <a href="{{ route('revistas.showUser', $revista->id) }}">{{ $revista->titulo }}</a>
                    @endif
                </td>
        
                <td>{{ $revista->titulo }}</td>
                <td>{{ $revista->numero }}</td>
                <td>{{ $revista->anio_publicacion }}</td>
                <td>
                    @if($revista->portada)
                        <img src="{{ asset('images/' . $revista->portada) }}" width="100" height="100">
                    @else
                        Sin portada
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        {{ $revistas->links() }}
    </table>
</div>
@endsection