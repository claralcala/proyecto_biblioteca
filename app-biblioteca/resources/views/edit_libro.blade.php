@extends('app')

@section('content')
<div class="container">
    <h2>Editar Libro</h2>
    <form action="{{ route('libros.update', $libro->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $libro->titulo }}" required>
        </div>

        <div class="mb-3">
            <label for="titulo" class="form-label">Autor</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $libro->autor }}" required>
        </div>

        <div class="mb-3">
            <label for="titulo" class="form-label">Año publicación</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $libro->anio_publicacion }}" required>
        </div>

        <div class="mb-3">
            <label for="titulo" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $libro->isbn }}" required>
        </div>

        <!-- Campo para la portada-->
        <div class="mb-3">
            <label for="portada" class="form-label">Portada</label>
            <input type="file" class="form-control" id="portada" name="portada">
            @if($libro->portada)
                <img src="{{ asset('images/' . $libro->portada) }}" alt="Portada" style="max-width: 100px; height: auto;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection