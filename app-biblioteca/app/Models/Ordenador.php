<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenador extends Model
{
    use HasFactory;

    //Atributos con fillable
    protected $fillable = [
        'marca', 
        'modelo', 
        'numero_referencia', 
        
    ];
}
