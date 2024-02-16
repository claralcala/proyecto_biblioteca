<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\PrestamosLibros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'isbn' => 'required',
            'anio_publicacion' => 'required',
            'portada' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->isbn = $request->isbn;
        $libro->anio_publicacion = $request->anio_publicacion;

        if ($request->hasFile('portada')) {
            $imageName = time().'.'.$request->portada->extension();  
            $request->portada->move(public_path('images'), $imageName);
            $libro->portada = $imageName;
        }

        $libro->save();

        return redirect()->route('libros.listado');
    }

    //Funcion que inserta libro 
    public function create()
    {
        return view('insertar_libro');
    }

    

    public function listado()
    {
        $libros = Libro::simplePaginate(10); // Muestra 10 libros por página
        return view('listado', compact('libros'));
    }

    //Metodo para mostrar los detalles de un libro concreto usando la id
    public function show($id)
    {
        $libro = Libro::findOrFail($id); //si no encuentra el libro en cuestion saldrá un error
        return view('detalles', compact('libro'));
    }


    public function showUser($id)
    {
        $libro = Libro::findOrFail($id); //si no encuentra el libro en cuestion saldrá un error
        return view('detalles_libro_user', compact('libro'));
    }


    //metodo para editar los detalles de un libro
    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);

        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'isbn' => 'required',
            'anio_publicacion' => 'required',
            'portada' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->isbn = $request->isbn;
        $libro->anio_publicacion = $request->anio_publicacion;

        if ($request->hasFile('portada')) {
            $imageName = time().'.'.$request->portada->extension();  
            $request->portada->move(public_path('images'), $imageName);
            $libro->portada = $imageName;
        }
       

        $libro->save();

        return redirect()->route('libros.show', $libro->id);
    }


    //metodo para eliminar un libro
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        //una vez eliminado redirigimos al listado de libros otra vez
        return redirect()->route('libros.listado');
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        return view('edit_libro', compact('libro'));
    }

//Función para pedir prestado un libro
    public function prestar(Request $request, $libroId)
{

    // Buscamos el libro por su ID
    $libro = Libro::findOrFail($libroId);

    if ($libro->prestado) {
        //Si el libro ya está prestado, redirige con un mensaje de error
        return back()->with('error', 'Este libro ya está prestado.');
    }


    $prestamoLibro = new PrestamosLibros();
    $prestamoLibro->user_id = Auth::id(); //El ID del usuario logueado
    $prestamoLibro->libro_id = $libroId; //El ID del libro que se quiere prestar
    $prestamoLibro->fecha_prestamo = now();
    $prestamoLibro->save();

    // Se pone el libro como prestado
    $libro->prestado = true;
    $libro->save();

    return back()->with('success', 'Libro prestado con éxito');
}


}