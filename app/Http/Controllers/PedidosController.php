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
use App\Models\Medidas;
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
        $medida = Medidas::all();
        return view('pedidos/createpedido', ['proyecto' => $proyecto, 'proveedores' => $proveedor, 'conceptos' => $concepto,
                                             'administradores' => $administrador, 'materiaprimas' => $materia, 'medidas' => $medida]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'descripcion' => 'required|string',
            'proyecto' => 'required|integer',
            'proveedor' => 'required|integer',
            'fecha' => 'required|date',
            'concepto' => 'required|integer',
            'admin' => 'required|integer',
            'detallesPedidos' => 'required|array', // Asegura que sea un arreglo
            'poster' => 'required|file|mimes:pdf|max:2048', // Validación del archivo PDF
            'valorTotal' => 'required|integer',
        ]);

       
        // Procesamiento del archivo PDF
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            // Almacena el archivo en el directorio de almacenamiento que elijas
            Storage::disk('public/storage/imagen')->put($fileName, file_get_contents($file));

            // Guarda el nombre del archivo en la base de datos
            $validatedData['poster'] = $fileName;
        }

        // Crear un nuevo pedido con los datos validados
        $pedido = new Pedidos([
            'descripcion' => $validatedData['descripcion'],
            'proyecto' => $validatedData['proyecto'],
            'proveedor' => $validatedData['proveedor'],
            'fecha' => $validatedData['fecha'],
            'concepto' => $validatedData['concepto'],
            'admin' => $validatedData['admin'],
            'poster' => $validatedData['poster'], // Nombre del archivo PDF
            'valor' => $validatedData['valorTotal'],
        ]);

        // Guarda el pedido en la base de datos
        $pedido->save();

        // Procesa los detalles del pedido y guárdalos en la base de datos
        foreach ($validatedData['detallesPedidos'] as $detalle) {
            $detallePedido = new DetallePedidos([
                'materia_prima' => $detalle['materiaPrima'],
                'cantidad' => $detalle['cantidad'],
                'valor_unitario' => $detalle['valorUnitario'],
                'total' => $detalle['total'],
            ]);

            // Asocia el detalle con el pedido recién creado
            $pedido->detallesPedidos()->save($detallePedido);
        }

        // Redirección y mensaje de éxito
        return redirect()->route('proyectos.gestionproyecto', ['id' => $pedido->IdPedido])->with('success', 'Pedido creado exitosamente');
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
