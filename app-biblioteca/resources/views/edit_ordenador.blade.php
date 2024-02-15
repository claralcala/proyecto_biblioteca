@extends('app')

@section('content')
<div class="container">
    <h2>Editar Ordenador</h2>
    <form action="{{ route('ordenadores.update', $ordenador->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" value="{{ $ordenador->marca }}" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $ordenador->modelo }}" required>
        </div>

        <div class="mb-3">
            <label for="numero_referencia" class="form-label">Número de Referencia</label>
            <input type="text" class="form-control" id="numero_referencia" name="numero_referencia" value="{{ $ordenador->numero_referencia }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection