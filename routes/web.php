<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectosController;

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

Route::get('/', function () {
    return view('index');
});


/*Rutas de Proyectos*/ 

Route::get('proyectos/gestionproyecto', [App\Http\Controllers\ProyectosController::class, 'index'])->name('proyectos.gestionproyecto');
Route::get('proyectos/createproyecto', [App\Http\Controllers\ProyectosController::class, 'create'])->name('proyectos.createproyecto');
Route::post('proyectos/guardar',[App\Http\Controllers\ProyectosController::class,'store'])->name('proyectos.store');

Route::get('proyectos/editarproyecto/{id}', [App\Http\Controllers\ProyectosController::class, 'edit'])->name('proyectos.editarproyecto');
Route::post('proyectos/actualizar/{id}', [App\Http\Controllers\ProyectosController::class, 'update'])->name('proyectos.actualizar');


Route::get('/proyectos/buscarciudades/{id}', 'App\Http\Controllers\ProyectosController@listarCiudades');

Route::get('proyectos/projects', [App\Http\Controllers\ProjectsController::class, 'index'])->name('projects.index');



