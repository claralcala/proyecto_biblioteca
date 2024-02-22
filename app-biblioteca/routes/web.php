<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\RevistaController;
use App\Http\Controllers\OrdenadorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Rutas de Autenticación y Registro
Route::get('/', [AuthController::class, 'index'])->name('home');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logados', [AuthController::class, 'logados'])->name('logados');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [UserController::class, 'create'])->name('register');
Route::post('register', [UserController::class, 'store']);

// Ruta para la página a la que se redirige a los administradores después del login
Route::get('/logados', [AuthController::class, 'logados'])->middleware('auth')->name('logados');

// Ruta para la página principal a la que se redirige a los usuarios normales después del login
Route::get('/principal', [AuthController::class, 'principal'])->middleware('auth')->name('principal');

Route::get('/set_language/{language}', LanguageController::class)->name( 'set_language');
// Rutas accesibles para usuarios normales y administradores
Route::middleware(['auth'])->group(function () {
    // Listado y detalles de libros
    Route::get('/libros', [LibroController::class, 'listado'])->name('libros.listado');

    
    // Listado y detalles de revistas
    Route::get('/revistas', [RevistaController::class, 'index'])->name('revistas.index');
    

    // Listado y detalles de ordenadores
    Route::get('/ordenadores', [OrdenadorController::class, 'index'])->name('lista_ordenadores');
    
});

Route::middleware(['user'])->group(function () {


  Route::get('/libros/{libro}/show_user', [LibroController::class, 'showUser'])->name('libros.showUser')->middleware('auth');

  Route::get('/revistas/{revista}/show_user', [RevistaController::class, 'showUser'])->name('revistas.showUser')->middleware('auth');

  Route::get('/ordenadores/{ordenador}/show_user', [OrdenadorController::class, 'showUser'])->name('ordenadores.showUser')->middleware('auth');

  Route::post('/libros/{libro}/prestar', [LibroController::class, 'prestar'])->middleware('auth')->name('libros.prestar');

  Route::post('/revistas/{revista}/prestar', [RevistaController::class, 'prestar'])->middleware('auth')->name('revistas.prestar');

  Route::post('/ordenadores/{ordenador}/prestar', [OrdenadorController::class, 'prestar'])->middleware('auth')->name('ordenadores.prestar');


  Route::get('/mis-libros', [UserController::class, 'librosPrestados'])->name('user.libros_prestados')->middleware('auth');
  Route::get('/mis-revistas', [UserController::class, 'revistasPrestadas'])->name('user.revistas_prestadas')->middleware('auth');
  Route::get('/mis-ordenadores', [UserController::class, 'ordenadoresPrestados'])->name('user.ordenadores_prestados')->middleware('auth');
});  


Route::middleware(['admin'])->group(function () {

Route::get('/registrar-libro', [LibroController::class, 'create'])->name('libros.create');

// Ruta para insertar libro en base de datos
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');

Route::get('/libros/{libro}', [LibroController::class, 'show'])->name('libros.show');





//Rutas para editar y eliminar libro
Route::get('/libros/{libro}/edit', [LibroController::class, 'edit'])->name('libros.edit');
Route::delete('/libros/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');

//Ruta para actualizar libro
Route::put('/libros/{libro}', [LibroController::class, 'update'])->name('libros.update');


Route::get('/registrar-revista', [RevistaController::class, 'create'])->name('revistas.create');
Route::post('/revistas', [RevistaController::class, 'store'])->name('revistas.store');

Route::get('/revistas/{revista}', [RevistaController::class, 'show'])->name('revistas.show');


// Ruta para editar revista
Route::get('/revistas/{revista}/edit', [RevistaController::class, 'edit'])->name('revistas.edit');

// Ruta para eliminar revista
Route::delete('/revistas/{revista}', [RevistaController::class, 'destroy'])->name('revistas.destroy');

//Ruta para actualizar revista
Route::put('/revistas/{revista}', [RevistaController::class, 'update'])->name('revistas.update');



Route::get('/ordenadores/registrar-ordenador', [OrdenadorController::class, 'create'])->name('ordenadores.create');
Route::post('/ordenadores', [OrdenadorController::class, 'store'])->name('ordenadores.store');

//Ruta para ver detalles de un ordenador
Route::get('/ordenadores/{ordenador}', [OrdenadorController::class, 'show'])->name('ordenadores.show');

//Editar y eliminar ordenador
Route::get('/ordenadores/{ordenador}/edit', [OrdenadorController::class, 'edit'])->name('ordenadores.edit');
Route::delete('/ordenadores/{ordenador}', [OrdenadorController::class, 'destroy'])->name('ordenadores.destroy');

//para la pantalla de edición de ordenador
Route::put('/ordenadores/{ordenador}', [OrdenadorController::class, 'update'])->name('ordenadores.update');

});




