<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Proyectos;
use DB;
use Iluminate\Support\Facades\Storage;
use App\Models\Aportes;
use App\Models\Socios;


class AporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $aportes = Aportes::all(); // Obtén todos los aportes desde la base de datos
        $socios = Socios::all();
    

        return view('materia/aportes', compact('aportes','socios'));
       

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

    public function charts()
    {
        /* $aporte = Aportes::all();

        $data = [];

        foreach($aporte as $aporte){
            $data['data'][] = $aporte->AporteTotal;
        }
        $data['data'] = json_encode($data);
        return view('aportes.index', $data); */
    }
}
