@extends('app')

@section('content')
<div class="container">
    <h2>{{__('Detalles del ordenador')}}</h2>
    <dl class="row">
        <dt class="col-sm-2">{{__('Marca')}}</dt>
        <dd class="col-sm-10">{{ $ordenador->marca }}</dd>

        <dt class="col-sm-2">{{__('Modelo')}}</dt>
        <dd class="col-sm-10">{{ $ordenador->modelo }}</dd>

        <dt class="col-sm-2">{{__('Numero Referencia')}}</dt>
        <dd class="col-sm-10">{{ $ordenador->numero_referencia }}</dd>
    </dl>

    <!-- Botones de editar y eliminar -->
    <a href="{{ route('ordenadores.edit', $ordenador->id) }}" class="btn btn-primary">{{__('Editar')}}</a>

    <form action="{{ route('ordenadores.destroy', $ordenador->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este ordenador?')">{{__('Eliminar')}}</button>
    </form>
</div>
@endsection