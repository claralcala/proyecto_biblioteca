<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    use HasFactory;

     //Atributos con fillable
     protected $fillable = [
        'titulo', 
        'numero',  
        'anio_publicacion', 
        'portada',
        'prestado'
    ];
}
