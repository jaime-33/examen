@extends('layouts.admin')
@section('contenido')
   <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">LISTADO DE LIBROS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                      <li class="breadcrumb-item active">LIBROS</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Hoverable rows start -->
<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-xl-12">
                        <form action="{{ route('libro.index') }}" method="get">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                        <input type="text" class="form-control" name="texto" placeholder="Buscar libros" value="{{ isset($texto) ? $texto : '' }}" aria-label="Buscar libros" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                        <a href="{{ route('libro.create') }}" class="btn btn-success">Nuevo</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body"></div>
                    <!-- table hover -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Id</th>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Número de páginas</th>
                                    <th>Portada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($libros as $lib)
                                <tr>
                                    <td>
                                        <a href="{{ route('libro.edit', $lib->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                        <!-- Button trigger for danger theme modal -->
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $lib->id }}"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                    <td>{{ $lib->id }}</td>
                                    <td>{{ $lib->titulo }}</td>
                                    <td>{{ $lib->autor }}</td>
                                    <td>{{ $lib->num_paginas }}</td>
                                    <td>
                                    <td><img src="http://localhost/examenJaime/public/imagen/libros/{{$lib->portada}}" alt="{{ $lib->titulo }}" width="70px" height="70px" class="img-thumbnail"></td>
                                    
                                </tr>
                                @include('almacen.libro.modal')
                                @endforeach
                            </tbody>
                        </table>
                        {{ $libros ->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hoverable rows end -->

@endsection
