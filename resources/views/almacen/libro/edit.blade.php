@extends('layouts.admin')

@section('contenido')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Libro {{ $libro->id }}</h3>
        </div>

        <form action="{{ route('libro.update', $libro->id) }}" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ingrese el título del libro" value="{{ $libro->titulo }}">
                </div> 

                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" class="form-control" name="autor" id="autor" placeholder="Ingrese el autor del libro" value="{{ $libro->autor }}">
                </div> 

                <div class="form-group">
                    <label for="num_paginas">Número de Páginas</label>
                    <input type="text" class="form-control" name="num_paginas" id="num_paginas" placeholder="Ingrese el número de páginas del libro" value="{{ $libro->num_paginas }}">
                </div> 

                <div class="form-group">
                    <label for="portada">Portada</label>
                    <input type="file" class="form-control" id="portada" name="portada">
                    @if ($libro->portada)
                        <img src="{{ url('imagen/libros/' . $libro->portada) }}" alt="{{ $libro->titulo }}" width="70px" height="70px" class="img-thumbnail">
                    @else
                        <p>No hay imagen disponible</p>
                    @endif
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
            </div>
        </form>
    </div>
</div>

@endsection
