<?php

namespace App\Http\Controllers;

use App\Models\Ordenador;
use Illuminate\Http\Request;
use App\Models\PrestamosOrdenadors;
use Illuminate\Support\Facades\Auth;

class OrdenadorController extends Controller
{
    
    public function index()
    {
        $ordenadores = Ordenador::all();
        return view('lista_ordenadores', compact('ordenadores'));
    }

    public function create()
    {
        return view('registrar_ordenador');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'numero_referencia' => 'required',
        ]);

        $ordenador = new Ordenador();
        $ordenador->marca = $request->marca;
        $ordenador->modelo = $request->modelo;
        $ordenador->numero_referencia = $request->numero_referencia; 
        $ordenador->save();

        return redirect()->route('lista_ordenadores');
    }


    public function show($id)
{
    $ordenador = Ordenador::findOrFail($id);
    return view('detalles_ordenador', compact('ordenador'));
}


public function showUser($id)
{
    $ordenador = Ordenador::findOrFail($id);
    return view('detalles_ordenador_user', compact('ordenador'));
}


public function edit($id)
{
    $ordenador = Ordenador::findOrFail($id);
    return view('edit_ordenador', compact('ordenador'));
}

public function destroy($id)
{
    $ordenador = Ordenador::findOrFail($id);
    $ordenador->delete();
    return redirect()->route('lista_ordenadores')->with('success', 'Ordenador eliminado con éxito.');
}


public function update(Request $request, $id)
{
    $request->validate([
        'marca' => 'required',
        'modelo' => 'required',
        'numero_referencia' => 'required',
    ]);

    $ordenador = Ordenador::findOrFail($id);
    $ordenador->update($request->all());

    return redirect()->route('lista_ordenadores')->with('success', 'Ordenador actualizado con éxito');
}


public function prestar(Request $request, $ordenadorId)
{
    $ordenador = Ordenador::findOrFail($ordenadorId);
    
    if ($ordenador->prestado) {
        return back()->with('error', 'Este ordenador ya está prestado.');
    }

    $prestamoPC = new PrestamosOrdenadors();
    $prestamoPC->user_id = Auth::id(); //El ID del usuario logueado
    $prestamoPC->ordenador_id = $ordenadorId; //El ID del libro que se quiere prestar
    $prestamoPC->hora_prestamo = now();
    $prestamoPC->save();

    // Se pone el libro como prestado
    $ordenador->prestado = true;
    $ordenador->save();



   

    return back()->with('success', 'Ordenador prestado con éxito.');
}

}
