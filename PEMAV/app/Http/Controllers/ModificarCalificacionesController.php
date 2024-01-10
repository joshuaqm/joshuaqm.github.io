<?php

namespace App\Http\Controllers;
use App\Models\Grupo;
use App\Models\Asignatura;
use App\Models\ListaAlumnos;
use App\Models\Calificaciones;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ModificarCalificacionesController extends Controller
{
    public function index()
    {
        $profesor = Auth::user()->id;
        $grupos = Grupo::where('id_profesor', $profesor)->get();
        $lista_alumnos = []; // Inicializa la variable lista_alumnos
        $id_asignatura = null;

        return view('vistas-administrador.modificar-calificaciones', compact('grupos', 'lista_alumnos', 'id_asignatura'));
    }


    public function filtrarGrupos(Request $request)
    {
        $grupoID = $request->input('id_grupo');
        $id_asignatura = Grupo::where('id_grupo', $grupoID)->first()->id_asignatura;
        $lista_alumnos = ListaAlumnos::where('id_grupo', $grupoID)->get();

        $profesor = Auth::user()->id;
        $grupos = Grupo::where('id_profesor', $profesor)->get();

        return view('vistas-administrador.nuevo-examen', compact('grupos', 'lista_alumnos', 'id_asignatura'));
    }
}
