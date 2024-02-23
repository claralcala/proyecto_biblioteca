<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamosOrdenadors extends Model
{
    use HasFactory;

    protected $table = 'prestamos_ordenadors'; 

    protected $fillable = [
        'user_id', // ID del usuario 
        'ordenador_id', // ID del libro prestado
        'hora_prestamo', // Fecha en que se realiza el préstamo
        'hora_devolucion', // Fecha en que se devuelve el libro , de momento lo pongo opcional y ya lo modificaré
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación con el modelo Ordenador
    public function ordenador()
    {
        return $this->belongsTo(Ordenador::class, 'ordenador_id');
    }
}
