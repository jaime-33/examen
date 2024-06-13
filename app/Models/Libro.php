<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libro';
    protected $primaryKey = 'id'; // Corregido a 'primaryKey'

    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'autor',
        'num_paginas',
        'portada'
    ];

    protected $guarded = [];
}

