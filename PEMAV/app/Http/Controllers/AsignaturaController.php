<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ListaAlumnos;
use App\Models\Asignatura;
use Carbon\Carbon;

class AsignaturaController extends Controller
{
    public function index(Request $request)
    {
        $userID = Auth::id();
        $asignaturaID = $request->route('id_asignatura');
        $asignatura = Asignatura::where('id_asignatura', $asignaturaID)->pluck('nombre_asignatura')->first();

        // Obtener el grupo de la asignatura específica en el que está inscrito el alumno
        $grupoAsignatura = ListaAlumnos::where('id_alumno', $userID)
            ->whereHas('grupo', function ($query) use ($asignaturaID) {
                $query->where('id_asignatura', $asignaturaID);
            })
            ->with('grupo.profesor') // Cargar la relación del profesor
            ->first();

        
        if ($grupoAsignatura) {
            $profesor = $grupoAsignatura->grupo->profesor->name;
            $salon = $grupoAsignatura->grupo->salon;
            $idGrupo = $grupoAsignatura->grupo->id_grupo;
            $dias = $grupoAsignatura->grupo->dias_seleccionados;
            $horario_inicio = Carbon::parse($grupoAsignatura->grupo->horario_inicio)->format('H:i');
            $horario_fin = Carbon::parse($grupoAsignatura->grupo->horario_fin)->format('H:i');
            return view('asignatura', compact('asignatura', 'profesor', 'salon', 'idGrupo', 'dias', 'horario_inicio', 'horario_fin'));
        }

        // Si no se encuentra el grupo, configurar un mensaje de error en la sesión
        session()->flash('error', 'No se encontró ningún grupo para esta asignatura.');

        // Redirigir de vuelta a la página anterior
        return redirect()->back();
    }

}
