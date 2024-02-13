@extends('app')

@section('content')
<div class="container">
    <h2>Registrar Revista</h2>
    <form action="{{ route('revistas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>

        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="text" class="form-control" id="numero" name="numero" required>
        </div>


        <div class="mb-3">
            <label for="anio_publicacion" class="form-label">Año de Publicación</label>
            <input type="number" class="form-control" id="anio_publicacion" name="anio_publicacion" required>
        </div>

        <div class="mb-3">
            <label for="portada" class="form-label">Portada</label>
            <input type="file" class="form-control" id="portada" name="portada">
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection