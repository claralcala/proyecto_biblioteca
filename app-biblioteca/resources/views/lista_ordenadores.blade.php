@extends('app')

@section('content')
<div class="container">
    <h2>Listado de Ordenadores</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Número de Referencia</th>
            
            </tr>
        </thead>
        <tbody>
            @foreach ($ordenadores as $ordenador)
            <tr>

            <td>
                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('ordenadores.show', $ordenador->id) }}">{{ $ordenador->marca }}</a>
                    @else
                        <a href="{{ route('ordenadores.showUser', $ordenador->id) }}">{{ $ordenador->marca }}</a>
                    @endif
                </td>
                
                <td>{{ $ordenador->modelo }}</td>
                <td>{{ $ordenador->numero_referencia }}</td>
                <td>
                   
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection