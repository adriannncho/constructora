<?php

namespace App\Http\Controllers;
use App\Models\Proyectos;
use App\Models\Departamentos;
use App\Models\Ciudades;
use Illuminate\Http\Request;
use DB;
use Iluminate\Support\Facades\Storage;


class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $proyectos = Proyectos:: orderBy('Estado', 'ASC')-> get();
        return view('proyectos.gestionproyecto', ['proyectos'=>$proyectos]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departamentos = Departamentos::orderBy('Nombre', 'ASC')->get();
        return view('proyectos.createproyecto',  ['departamentos'=>$departamentos]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $imagen = $request->file('file');
            $nombrefoto=time() . $imagen->getClientOriginalName();
            $imagen->move(public_path().'/storage/imagen',$nombrefoto);
        }

        Proyectos::create([
            'IdDepartamento'=> request('depto'),
            'IdCiudad'=> request('ciudad'),
            'Nombre'=> request('nombre'),
            'Direccion'=> request('dire'), 
            'Imagen'=> $nombrefoto,
            'Estado' => request('estado'),
            'AporteTotal' => request('presupuesto')
        ]);

        return redirect()->route('proyectos.gestionproyecto');
            
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
        $proyecto = Proyectos::findOrFail($id);
        $departamentos = Departamentos::all();
        $ciudades = Ciudades::all();
        return view('proyectos/editarproyecto', compact('proyecto', 'departamentos', 'ciudades'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $proyecto = Proyectos::findOrFail($id);

        $nombrefoto = $proyecto->Imagen; // Por defecto, mantén la imagen existente

        if ($request->hasFile('file')) {
            $foto = $request->file('file');
            $nombrefoto = time() . $foto->getClientOriginalName();
            $foto->move(public_path() . '/storage/imagen', $nombrefoto);
        }

        $proyecto->update([
            'IdDepartamento' => $request->input('depto'),
            'IdCiudad' => $request->input('ciudad'),
            'Nombre' => $request->input('nombre'),
            'Direccion' => $request->input('dire'),
            'Imagen' => $nombrefoto,
            'Estado' => $request->input('estado'),
            'AporteTotal' => $request->input('presupuesto')
        ]);

        return redirect()->route('proyectos.gestionproyecto');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function listarCiudades($id)
    {
        $ciudades = Ciudades::where('IdDepartamento', $id)->orderBy('Nombre', 'ASC')->get();
        //$proyectos = Proyecto:: orderBy('Nombre', 'ASC')-> get();
        //$ciudades = Ciudades::orderBy('Nombre', 'ASC')-> get();
        return $ciudades; 
        /* return "xyz"; */
    
    }

}
