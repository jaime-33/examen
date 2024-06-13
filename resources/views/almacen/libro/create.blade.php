@extends('layouts.admin')

@section('contenido')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Nuevo Libro</h3>
        </div>

        <form action="{{ route('libro.store') }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ingrese el título del libro">
                </div>

                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" class="form-control" name="autor" id="autor" placeholder="Ingrese el autor del libro">
                </div>

                <div class="form-group">
                    <label for="num_paginas">Número de Páginas</label>
                    <input type="text" class="form-control" name="num_paginas" id="num_paginas" placeholder="Ingrese el número de páginas del libro">
                </div>

                <div class="form-group">
                    <label for="portada">Portada</label>
                    <input type="file" class="form-control" id="portada" name="portada">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                <a href="{{ route('libro.index') }}" class="btn btn-danger me-1 mb-1">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection

