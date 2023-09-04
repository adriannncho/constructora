<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\AporteController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\DetallePedidoController;
use App\Models\Proyectos;

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
    $proyectosFinalizados = Proyectos::where('Estado', 'Finalizado')->get();

    return view('index', compact('proyectosFinalizados'));
});


/*Rutas de Proyectos*/ 

Route::get('proyectos/gestionproyecto', [App\Http\Controllers\ProyectosController::class, 'index'])->name('proyectos.gestionproyecto');
Route::get('proyectos/createproyecto', [App\Http\Controllers\ProyectosController::class, 'create'])->name('proyectos.createproyecto');
Route::post('proyectos/guardar',[App\Http\Controllers\ProyectosController::class,'store'])->name('proyectos.store');

Route::get('proyectos/editarproyecto/{id}', [App\Http\Controllers\ProyectosController::class, 'edit'])->name('proyectos.editarproyecto');
Route::post('proyectos/actualizar/{id}', [App\Http\Controllers\ProyectosController::class, 'update'])->name('proyectos.actualizar');

Route::get('proyectos/projects', [App\Http\Controllers\ProjectsController::class, 'index'])->name('projects.index');

Route::get('/proyectos/buscarciudades/{id}', 'App\Http\Controllers\ProyectosController@listarCiudades');


/* Rutas de Materiales */
Route::get('materia/gestionmateria/{id}', [App\Http\Controllers\MateriaController::class, 'index'])->name('gestionmateria.index');
Route::get('/proyectos/{Idproyecto}/gestionmateria', 'AporteController@showAportesGraph');



/* Rutas de Aportes*/ 
Route::get('materia/aportes', [App\Http\Controllers\AporteController::class, 'index'])->name('aportes.index');



/*Rutas de Pedidos*/
Route::get('pedidos/indexpedidos/{id}', [App\Http\Controllers\PedidosController::class, 'index'])->name('pedidos.index');
Route::get('pedidos/createpedido/{id}', [App\Http\Controllers\PedidosController::class, 'create'])->name('pedidos.create');
Route::post('pedidos/guardar',[App\Http\Controllers\PedidosController::class,'store'])->name('pedidos.store');


/* Detalle Pedido*/ 
Route::get('pedidos/detallepedido/{id}', [App\Http\Controllers\DetallePedidoController::class, 'index'])->name('detallepedido.index');