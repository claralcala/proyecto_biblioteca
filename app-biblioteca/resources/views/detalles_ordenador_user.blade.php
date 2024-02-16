@extends('app')

@section('content')
<div class="container">
    <h2>Detalles del Ordenador</h2>
    <dl class="row">
        <dt class="col-sm-2">Marca:</dt>
        <dd class="col-sm-10">{{ $ordenador->marca }}</dd>

        <dt class="col-sm-2">Modelo:</dt>
        <dd class="col-sm-10">{{ $ordenador->modelo }}</dd>

        <dt class="col-sm-2">Número de Referencia:</dt>
        <dd class="col-sm-10">{{ $ordenador->numero_referencia }}</dd>
    </dl>

    @if(!$ordenador->prestado)
    <form action="{{ route('ordenadores.prestar', $ordenador->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Pedir Prestado</button>
    </form>
    @else
    <button class="btn btn-secondary" disabled>Ya Prestado</button>
    @endif
</form>

<a href="{{ route('lista_ordenadores') }}" class="btn btn-secondary">Volver al listado de ordenadores</a>
    
</div>
@endsection