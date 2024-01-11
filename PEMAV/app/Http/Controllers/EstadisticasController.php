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
            $id_grupo = 'No se ha seleccionado un grupo';
            $calificaciones = null;
            return view('vistas-administrador.estadisticas', compact('grupos', 'grupoFiltrado', 'id_grupo', 
            'nombre_asignatura', 'calificaciones'));
        }
        else{
            return view('vistas-administrador.estadisticas');
        }
    }

    public function filtrar(Request $request)
    {
        $grupos = Grupo::all();
        $id_grupo = $request->id_grupo;

        $grupoFiltrado = Grupo::where('id_grupo', $id_grupo)->get();
        $nombre_asignatura = $grupoFiltrado[0]->asignatura->nombre_asignatura;

        $calificaciones = Calificaciones::where('id_grupo', $id_grupo)->get();
        return view('vistas-administrador.estadisticas', compact('grupoFiltrado', 'grupos', 'id_grupo', 
        'nombre_asignatura', 'calificaciones'));
    }
}
