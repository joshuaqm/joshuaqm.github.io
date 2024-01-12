<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use Illuminate\Support\Facades\Auth;
use App\Models\Calificaciones;

class EstadisticasController extends Controller
{
    public function index()
    {
        $rol_usuario = Auth::user()->role;

        if($rol_usuario == '2'){
            $id_usuario = Auth::user()->id;
            $grupos = Grupo::where('id_profesor', $id_usuario)->get();
            $grupoFiltrado = null;
            $nombre_asignatura = null;
            if($grupos->count() > 0){
                $id_grupo = Grupo::where('id_profesor', $id_usuario)->first()->id_grupo;
                $calificaciones = Calificaciones::where('id_grupo', $id_grupo)->get();
                $numero_examen = 0;
                return view('vistas-administrador.estadisticas', compact('grupos', 'grupoFiltrado', 'id_grupo', 
                'nombre_asignatura', 'calificaciones', 'numero_examen'));
            }
            else{   
                return redirect()->route('dashboard.index')->with('error', 'No tienes grupos asignados');
            }
            
        }
        elseif($rol_usuario == '1'){
            $grupos = Grupo::all();
            $grupoFiltrado = null;
            $nombre_asignatura = null;
            if($grupos->count() > 0){
                $id_grupo = Grupo::all()->first()->id_grupo;
                $calificaciones = Calificaciones::all();
                $numero_examen = 0;
                return view('vistas-administrador.estadisticas', compact('grupos', 'grupoFiltrado', 'id_grupo', 
                'nombre_asignatura', 'calificaciones', 'numero_examen'));
            }
            else{   
                return redirect()->route('dashboard')->with('error', 'No hay grupos registrados');
            }
        }
        else{
            return view('vistas-administrador.estadisticas');
        }
    }

    public function filtrar(Request $request)
    {
        $rol_usuario = Auth::user()->role;

        if($rol_usuario == '2'){
            $grupos = Grupo::all();
            $id_grupo = $request->id_grupo;

            $grupoFiltrado = Grupo::where('id_grupo', $id_grupo)->get();
            $nombre_asignatura = $grupoFiltrado[0]->asignatura->nombre_asignatura;

            $calificaciones = Calificaciones::where('id_grupo', $id_grupo)->get();
            $numero_examen = 0;

            return view('vistas-administrador.estadisticas', compact('grupoFiltrado', 'grupos', 'id_grupo', 
            'nombre_asignatura', 'calificaciones', 'numero_examen'));
        }
        elseif($rol_usuario == '1'){
            $grupos = Grupo::all();
            $id_grupo = $request->id_grupo;
            $grupoFiltrado = Grupo::where('id_grupo', $id_grupo)->get();
            $nombre_asignatura = $grupoFiltrado[0]->asignatura->nombre_asignatura;
        
            $calificaciones = Calificaciones::where('id_grupo', $id_grupo)->get();
            $numero_examen = 0;
        
            return view('vistas-administrador.estadisticas', compact('grupoFiltrado', 'grupos', 'id_grupo', 
            'nombre_asignatura', 'calificaciones', 'numero_examen'));
        
    }
    else{
        return redirect()->route('estadisticas.index')->with('error', 'No tienes permisos para acceder a esta página');
    }
    }
}