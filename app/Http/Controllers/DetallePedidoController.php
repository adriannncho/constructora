<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallePedidos;
use App\Models\Pedidos;
use DB;
use Iluminate\Support\Facades\Storage;

class DetallePedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        //
         $detallePedidos = DB::table('detallepedidos')
            ->join('pedidos', 'pedidos.IdPedido', '=', 'detallepedidos.IdPedido')
            ->join('materiaPrimas', 'materiaPrimas.IdMateriaPrima', '=', 'detallepedidos.IdMateriaPrima')
            ->join('proyectos', 'proyectos.IdProyecto', '=', 'pedidos.IdProyecto')
            ->where('proyectos.IdProyecto', '=', $id)
            ->select('detallepedidos.ValorUnitario', 'detallepedidos.Cantidad', 'materiaPrimas.Nombre as NombreMateriaPrima', 'detallepedidos.Total')
            ->orderBy('materiaPrimas.Nombre', 'ASC')
            ->get();


        return view('pedidos/detallepedido', ['detallePedidos' => $detallePedidos]);


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
