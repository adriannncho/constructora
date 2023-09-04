<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyectos;
use DB;
use Iluminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status');
        $proyecto= [];

        if ($status === 'En ejecucion' || $status === 'En planeacion' || $status === 'Finalizado') {
            $proyecto = Proyectos::where('estado', $status)->get();
        } else {
            $proyecto = Proyectos::all();
        }

        return view('proyectos/projects', compact('proyecto'));
    }
}
