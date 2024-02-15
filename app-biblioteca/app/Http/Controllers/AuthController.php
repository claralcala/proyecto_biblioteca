<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //

    /**
	* Función que muestra la vista de logados o la vista con el formulario de Login
	*/
	public function index()
	{
	    // Comprobamos si el usuario ya está logado
	    if (Auth::check()) {
	
	        // Si está logado le mostramos la vista de logados
	        return view('logados');
	    }
	
	    // Si no está logado le mostramos la vista con el formulario de login
	    return view('login');
	}
	
    /**
	* Función que se encarga de recibir los datos del formulario de login, comprobar que el usuario existe y
	* en caso correcto logar al usuario
	*/
	public function login(Request $request)
{
    // Comprobamos que el email y la contraseña han sido introducidos
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    // Almacenamos las credenciales de email y contraseña
    $credentials = $request->only('email', 'password');

    // Si el usuario existe lo logamos
    if (Auth::attempt($credentials)) {
        // Comprobamos el rol del usuario y redirigimos según sea admin o user
        if (Auth::user()->role == 'admin') {
            // Si es admin, redirige a la vista 'logados'
            return redirect()->intended('logados')->withSuccess('Logado Correctamente como Administrador');
        } else {
            // Si es un usuario normal, redirige a la vista 'principal'
            return redirect()->intended('principal')->withSuccess('Logado Correctamente');
        }
    }

    // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
    return redirect("/")->withSuccess('Los datos introducidos no son correctos');
}
	
	/**
	* Función que muestra la vista de logados si el usuario está logado y si no le devuelve al formulario de login
	* con un mensaje de error
	*/
	public function logados()
	{
	    if (Auth::check()) {
	        return view('logados');
	    }
	
	    return redirect("/")->withSuccess('No tienes acceso, por favor inicia sesión');
    }


	public function principal()
{
    if (Auth::check()) {
		return view('principal');
	}

	return redirect("/")->withSuccess('No tienes acceso, por favor inicia sesión');
}

	/**
	* Función para desloguearse
	*/
	public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
