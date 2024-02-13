@extends('app')

@section('content')
<div class="container">
    <h2>Editar Revista</h2>
    <form action="{{ route('revistas.update', $revista->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $revista->titulo }}" required>
        </div>

        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="text" class="form-control" id="numero" name="numero"  value="{{ $revista->numero }}" required>
        </div>


        <div class="mb-3">
            <label for="anio_publicacion" class="form-label">Año de Publicación</label>
            <input type="number" class="form-control" id="anio_publicacion" name="anio_publicacion" value="{{ $revista->anio_publicacion }}" required>
        </div>

        

        <!-- Campo para la portada-->
        <div class="mb-3">
            <label for="portada" class="form-label">Portada</label>
            <input type="file" class="form-control" id="portada" name="portada">
            @if($revista->portada)
                <img src="{{ asset('images/' . $revista->portada) }}" alt="Portada" style="max-width: 100px; height: auto;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection