<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Proyectos;
use DB;
use Iluminate\Support\Facades\Storage;
use App\Models\Pedidos;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
{
    $pedidos = DB::table('pedidos')
        ->join('proyectos', 'proyectos.IdProyecto', '=', 'pedidos.IdProyecto')
        ->where('proyectos.IdProyecto', '=', $id)
        ->select('pedidos.FechaHora', 'pedidos.Evidencia', 'pedidos.ValorTotal', 'pedidos.Descripcion')
        ->orderBy('pedidos.FechaHora', 'ASC')
        ->get();

    // Obtén el proyecto correspondiente para mostrar su información si es necesario
    $proyecto = Proyectos::find($id);

    return view('pedidos/indexpedidos', ['proyecto' => $proyecto, 'pedidos' => $pedidos]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
