<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revista;
use App\Models\PrestamosRevistas;
use Illuminate\Support\Facades\Auth;


class RevistaController extends Controller
{

    public function create()
    {
        return view('insertar_revista');
    }

    //Crear una nueva revista en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'numero' => 'required',
            'anio_publicacion' => 'required',
            'portada' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
        ]);

        $revista = new Revista();
        $revista->titulo = $request->titulo;
        $revista->numero = $request->numero;
        $revista->anio_publicacion = $request->anio_publicacion;

        if ($request->hasFile('portada')) {
            $imageName = time().'.'.$request->portada->extension();  
            $request->portada->move(public_path('images'), $imageName);
            $revista->portada = $imageName;
        }
    
        $revista->save();

        return redirect()->route('revistas.index');
    }

    

      //Listamos las revistas
      public function index()
      {
          $revistas = Revista::simplePaginate(10);
          return view('listado_revistas', compact('revistas'));
      }


    public function show($id)
    {
    $revista = Revista::findOrFail($id); 
    return view('detalles_revista', compact('revista')); 
    }


    public function showUser($id)
    {
        $revista = Revista::findOrFail($id); //si no encuentra el libro en cuestion saldrá un error
        return view('detalles_revista_user', compact('revista'));
    }


    public function edit($id)
{
    $revista = Revista::findOrFail($id);
    return view('edit_revista', compact('revista'));
}

public function destroy($id)
{
    $revista = Revista::findOrFail($id);
    $revista->delete();
    return redirect()->route('revistas.index');
}


public function update(Request $request, $id)
    {
        $revista = Revista::findOrFail($id);

        $request->validate([
            'titulo' => 'required',
            'numero' => 'required',
            'anio_publicacion' => 'required',
            'portada' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $revista->titulo = $request->titulo;
        $revista->numero = $request->numero;
        $revista->anio_publicacion = $request->anio_publicacion;

        if ($request->hasFile('portada')) {
            $imageName = time().'.'.$request->portada->extension();  
            $request->portada->move(public_path('images'), $imageName);
            $revista->portada = $imageName;
        }
       

        $revista->save();

        return redirect()->route('revistas.show', $revista->id);
    }

    //Función para pedir prestada una revista
    public function prestar(Request $request, $revistaId)
{
    $revista = Revista::findOrFail($revistaId);
    
    //Verificar si ya existe un préstamo activo para esta revista
    if ($revista->prestado) {
        //Si el libro ya está prestado, redirige con un mensaje de error
        return back()->with('error', 'Esta revista ya está prestada.');
    }

    $prestamoRevista = new PrestamosRevistas();
    $prestamoRevista->user_id = Auth::id(); //El ID del usuario logueado
    $prestamoRevista->revista_id = $revistaId; //El ID del libro que se quiere prestar
    $prestamoRevista->fecha_prestamo = now();
    $prestamoRevista->save();

    // Se pone el libro como prestado
    $revista->prestado = true;
    $revista->save();

    return back()->with('success', 'Revista prestada con éxito');
}

    
}
