<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\RevistaController;
use App\Http\Controllers\OrdenadorController;
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


Route::get('/', [AuthController::class, 'index'])->name('home');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logados', [AuthController::class, 'logados'])->name('logados');

//Ruta para el logout

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {

Route::get('/registrar-libro', [LibroController::class, 'create'])->name('libros.create');

// Ruta para insertar libro en base de datos
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');


// Ruta del listado de libros
Route::get('/listado', [LibroController::class, 'listado'])->name('libros.listado');


//Lleva a la pantalla de los detalles de un libro
Route::get('/libros/{libro}', [LibroController::class, 'show'])->name('libros.show');

//Rutas para editar y eliminar libro
Route::get('/libros/{libro}/edit', [LibroController::class, 'edit'])->name('libros.edit');
Route::delete('/libros/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');

//Ruta para actualizar libro
Route::put('/libros/{libro}', [LibroController::class, 'update'])->name('libros.update');


Route::get('/registrar-revista', [RevistaController::class, 'create'])->name('revistas.create');
Route::post('/revistas', [RevistaController::class, 'store'])->name('revistas.store');
Route::get('/revistas', [RevistaController::class, 'index'])->name('revistas.index');

// Detalles de revista
Route::get('/revistas/{revista}', [RevistaController::class, 'show'])->name('revistas.show');

// Ruta para editar revista
Route::get('/revistas/{revista}/edit', [RevistaController::class, 'edit'])->name('revistas.edit');

// Ruta para eliminar revista
Route::delete('/revistas/{revista}', [RevistaController::class, 'destroy'])->name('revistas.destroy');

//Ruta para actualizar revista
Route::put('/revistas/{revista}', [RevistaController::class, 'update'])->name('revistas.update');


Route::get('/ordenadores', [OrdenadorController::class, 'index'])->name('lista_ordenadores');
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

//Route::get('/', function () {
  //  return view('welcome');
//});
