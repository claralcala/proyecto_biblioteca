@extends('app')

@section('content')
<div class="container">
    <h2>Crear Ordenador</h2>
    <form action="{{ route('ordenadores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>
        <div class="mb-3">
            <label for="numero_referencia" class="form-label">Número de Referencia</label>
            <input type="text" class="form-control" id="numero_referencia" name="numero_referencia" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection