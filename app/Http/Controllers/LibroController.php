<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LibroFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LibroController extends Controller
{
    public function __construct()
    {
        // Constructor vacío
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->get('texto');

        // Filtrar libros por título si hay texto de búsqueda
        $libros = Libro::when($query, function ($query, $search) {
            return $query->where('titulo', 'like', '%' . $search . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(7);

        return view('almacen.libro.index', compact('libros', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("almacen.libro.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LibroFormRequest $request)
    {
        $libro = new Libro;
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->num_paginas = $request->num_paginas;

        if ($request->hasFile("portada")) {
            $imagen = $request->file("portada");
            $nombreimagen = Str::slug($request->titulo) . "." . $imagen->guessExtension();
            $ruta = public_path("/imagen/libros/");

            $imagen->move($ruta, $nombreimagen);
            $libro->portada = $nombreimagen;
        }

        $libro->save();
        return redirect()->route('libro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view("almacen.libro.show", compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        return view("almacen.libro.edit", compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LibroFormRequest $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->num_paginas = $request->num_paginas;

        if ($request->hasFile("portada")) {
            $imagen = $request->file("portada");
            $nombreimagen = Str::slug($request->titulo) . "." . $imagen->guessExtension();
            $ruta = public_path("/imagen/libros/");

            $imagen->move($ruta, $nombreimagen);
            $libro->portada = $nombreimagen;
        }

        $libro->save();
        return redirect()->route('libro.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        
        return redirect()->route('libro.index')
            ->with('success', 'Libro eliminado correctamente');
    }
}



