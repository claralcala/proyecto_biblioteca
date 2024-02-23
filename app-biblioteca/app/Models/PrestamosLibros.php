<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamosLibros extends Model
{
    use HasFactory;

    protected $table = 'prestamos_libros'; 

    protected $fillable = [
        'user_id', // ID del usuario 
        'libro_id', // ID del libro prestado
        'fecha_prestamo', // Fecha en que se realiza el préstamo
        'fecha_devolucion', // Fecha en que se devuelve el libro
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación con el modelo Libro
    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }
}
