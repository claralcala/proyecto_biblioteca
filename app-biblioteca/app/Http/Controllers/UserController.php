<?php

namespace App\Http\Controllers;
use App\Models\PrestamosLibros;
use App\Models\PrestamosRevistas;
use App\Models\PrestamosOrdenadors;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //mostrando vista  del registro
    public function create()
    {
        return view('auth.register');
    }

    //guardar user en la bd
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registro exitoso.');
    }


    public function librosPrestados()
{
    $librosPrestados = PrestamosLibros::where('user_id', Auth::id())
                        ->with('libro') 
                        ->get();

    return view('libros_prestados', compact('librosPrestados'));
}


public function revistasPrestadas()
{
    $revistasPrestadas = PrestamosRevistas::where('user_id', Auth::id())
                            ->with('revista')
                            ->get();

    return view('revistas_prestadas', compact('revistasPrestadas'));
}


public function ordenadoresPrestados()
{
    $ordenadoresPrestados = PrestamosOrdenadors::where('user_id', Auth::id())
                            ->with('ordenador')
                            ->get();

    return view('ordenadores_prestados', compact('ordenadoresPrestados'));
}
}
