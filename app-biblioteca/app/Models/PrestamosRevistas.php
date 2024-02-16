<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamosRevistas extends Model
{
    use HasFactory;

    protected $table = 'prestamos_revistas'; 

    protected $fillable = [
        'user_id', // ID del usuario 
        'revista_id', // ID del libro prestado
        'fecha_prestamo', // Fecha en que se realiza el préstamo
        'fecha_devolucion', // Fecha en que se devuelve el libro , de momento lo pongo opcional y ya lo modificaré
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación con el modelo Revista
    public function revista()
    {
        return $this->belongsTo(Revista::class, 'revista_id');
    }


}
