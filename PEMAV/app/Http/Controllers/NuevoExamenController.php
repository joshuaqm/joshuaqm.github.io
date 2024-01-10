<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Grupo;
use App\Models\ListaAlumnos;

class NuevoExamenController extends Controller
{
    public function index()
    {
        $profesor = Auth::user()->id;
        $grupos = Grupo::where('id_profesor', $profesor)->get();

        return view('vistas-administrador.nuevo-examen', compact('grupos'));
    }

    public function filtrarGrupos(Request $request)
    {
        $grupoID = $request->input('id_grupo');
        $lista_alumnos = ListaAlumnos::where('id_grupo', $grupoID)->get();

        $profesor = Auth::user()->id;
        $grupos = Grupo::where('id_profesor', $profesor)->get();

        return view('vistas-administrador.nuevo-examen', compact('grupos', 'lista_alumnos'));
    }
}
