@extends('app')

@section('content')
<div class="container">
    <h2>{{__('Detalles de la revista')}} {{ $revista->titulo }}</h2>
    <p>{{__('Numero')}} {{ $revista->numero }}</p>
    <p>{{__('Año publicacion')}} {{ $revista->anio_publicacion }}</p>
    @if($revista->portada)
    <div>
        <img src="{{ asset('images/' . $revista->portada) }}" alt="Portada" style="width: 100px; height: auto;">            
    </div>
    @else
    <!-- Controlamos en caso de que no haya portada para avisar al usuario-->
    <p>{{__('No hay portada')}}</p>
    @endif

    <!-- Contenedor para los botones con flexbox -->
    <div class="d-flex">
        @if(!$revista->prestado)
        <form action="{{ route('revistas.prestar', $revista->id) }}" method="POST" class="custom-margin">
    @csrf
    <button type="submit" class="btn btn-primary">{{__('Pedir prestada')}}</button>
    </form>
        @else
        <button class="btn btn-secondary mr-2" disabled>{{__('Ya prestada')}}</button>
        @endif

        <a href="{{ route('revistas.index') }}" class="btn btn-secondary">{{__('Volver listado revistas')}}</a>
    </div>
</div>
@endsection
