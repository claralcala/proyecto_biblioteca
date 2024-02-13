<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    //Atributos con fillable
    protected $fillable = [
        'titulo', 
        'autor', 
        'isbn', 
        'anio_publicacion', 
        'portada'
    ];
}
