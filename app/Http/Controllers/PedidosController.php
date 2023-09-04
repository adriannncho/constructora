<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Proyectos;
use App\Models\Pedidos;
use App\Models\Conceptos;
use App\Models\DetallePedidos;
use App\Models\Proveedores;
use App\Models\Administradores;
use App\Models\MateriaPrimas;
use DB;
use Iluminate\Support\Facades\Storage;


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
        ->select('pedidos.IdPedido','pedidos.FechaHora', 'pedidos.Evidencia', 'pedidos.ValorTotal', 'pedidos.Descripcion')
        ->orderBy('pedidos.FechaHora', 'ASC')
        ->get();

    // Obtén el proyecto correspondiente para mostrar su información si es necesario
    $proyecto = Proyectos::find($id);

    return view('pedidos/indexpedidos', ['proyecto' => $proyecto, 'pedidos' => $pedidos]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        //
        $proyecto = Proyectos::find($id);
        $proveedor = Proveedores::all();
        $concepto = Conceptos::all();
        $administrador = Administradores::all();
        $materia = MateriaPrimas::all();
        return view('pedidos/createpedido', ['proyectos' => $proyecto, 'proveedores' => $proveedor, 'conceptos' => $concepto,
                                             'administradores' => $administrador, 'materiaprimas' => $materia]);
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request){
        // Verifica si se ha subido un archivo PDF
    if ($request->hasFile('poster') && $request->file('poster')->isValid()) {
        // Obtiene el archivo PDF
        $archivoPDF = $request->file('poster');
        // Genera un nombre único para el archivo PDF
        $nombrePDF = time() . '_' . $archivoPDF->getClientOriginalName();

        // Mueve el archivo PDF a la ubicación deseada (por ejemplo, a la carpeta storage/app/public/pdf)
        $archivoPDF->storeAs('storage/imagen/', $nombrePDF);
    }

        // Crear un nuevo pedido
        $pedido = Pedidos::create([
            'IdProveedor' => request('proveedor'), // Asegúrate de obtener el IdProveedor adecuadamente
            'IdProyecto' => $proyecto->IdProyecto,
            'IdConcepto' => request('concepto'),
            'FechaHora' => request('fecha'),
            'Evidencia' => $nombrePDF,
            'ValorTotal' => 0, // Inicializa el total en 0
            'Descripcion' => request('descripcion'),
            'IdAdministrador' => request('admin'), // Ajusta el IdAdministrador según tus necesidades
        ]);

        // Valores iniciales para el total del pedido
        $totalPedido = 0;

        // Guardar los detalles del pedido
        foreach (request('materiaPrima') as $key => $materiaPrima) {
            $detallePedido = DetallePedidos::create([
                'IdPedido' => $pedido->IdPedido,
                'IdMateriaPrima' => request('materiaPrima[]')[$key], // Asegúrate de obtener el IdMateriaPrima adecuadamente
                'Cantidad' => request('cantidad[]')[$key],
                'ValorUnitario' => request('valorUnitario[]')[$key],
                'Total' => 0, // Inicializa el total del detalle en 0
            ]);

            // Calcula el total por detalle y agrega al total del pedido
            $totalDetalle = $detallePedido->Cantidad * $detallePedido->ValorUnitario;
            $totalPedido += $totalDetalle;

            // Actualiza el total del detalle
            $detallePedido->Total = $totalDetalle;
            $detallePedido->save();
        }

        // Actualiza el total del pedido con la suma de los totales de detalles
        $pedido->ValorTotal = $totalPedido;
        $pedido->save();

        return redirect()->route('pedidos.index');
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
