@extends('app')

@section('content')
<div class="container">
    <h2>{{__('Detalles del ordenador')}}</h2>
    <dl class="row">
        <dt class="col-sm-2">{{__('Marca')}}</dt>
        <dd class="col-sm-10">{{ $ordenador->marca }}</dd>

        <dt class="col-sm-2">{{__('Modelo')}}</dt>
        <dd class="col-sm-10">{{ $ordenador->modelo }}</dd>

        <dt class="col-sm-2">{{__('Numero referencia')}}</dt>
        <dd class="col-sm-10">{{ $ordenador->numero_referencia }}</dd>
    </dl>

    @if(!$ordenador->prestado)
    <form action="{{ route('ordenadores.prestar', $ordenador->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">{{__('Pedir prestado')}}</button>
    </form>
    @else
    <button class="btn btn-secondary" disabled>{{__('Ya prestado')}}</button>
    @endif
</form>

<a href="{{ route('lista_ordenadores') }}" class="btn btn-secondary">Volver al listado de ordenadores</a>
    
</div>
@endsection