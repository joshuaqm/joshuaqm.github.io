<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ListaAlumnos;
use App\Models\Asignatura;
use App\Models\User;
use App\Models\Grupo;
use Carbon\Carbon;
use App\Models\Calificaciones;

class AsignaturaController extends Controller
{
    public function index(Request $request)
    {
        $userID = Auth::id();
        $asignaturaID = $request->route('id_asignatura');
        $asignatura = Asignatura::where('id_asignatura', $asignaturaID)->pluck('nombre_asignatura')->first();

        $user = User::find($userID);

        if($user->role == '0'){
            $grupoAsignatura = ListaAlumnos::where('id_alumno', $userID)
            ->whereHas('grupo', function ($query) use ($asignaturaID) {
                $query->where('id_asignatura', $asignaturaID);
            })
            ->with('grupo.profesor') // Cargar la relación del profesor
            ->first();

            $calificaciones = Calificaciones::where('id_alumno', $userID)
                ->where('id_asignatura', $asignaturaID)
                ->get();

            $alumno = Auth::user()->name;
            $promedioAsignatura = Calificaciones::where('id_alumno', $userID)
                ->where('id_asignatura', $asignaturaID)
                ->avg('calificacion');
                    
            if ($grupoAsignatura) {
                $profesor = $grupoAsignatura->grupo->profesor->name;
                $salon = $grupoAsignatura->grupo->salon;
                $idGrupo = $grupoAsignatura->grupo->id_grupo;
                $dias = $grupoAsignatura->grupo->dias_seleccionados;
                $horario_inicio = Carbon::parse($grupoAsignatura->grupo->horario_inicio)->format('H:i');
                $horario_fin = Carbon::parse($grupoAsignatura->grupo->horario_fin)->format('H:i');

                return view('asignatura', compact('asignatura', 'asignaturaID', 'profesor', 'salon', 'idGrupo', 
                'dias', 'horario_inicio', 'horario_fin', 'calificaciones', 'alumno', 'promedioAsignatura'));
            }

            // Si no se encuentra el grupo, configurar un mensaje de error en la sesión
            session()->flash('error', 'No se encontró ningún grupo para esta asignatura.');

            // Redirigir de vuelta a la página anterior
            return redirect()->back();
            }
            elseif($user->role == '2'){
                $asignaturas = Asignatura::all(); // Obtener todas las asignaturas disponibles
        
                $asignaturaID = $request->route('id_asignatura');
                $asignatura = Asignatura::where('id_asignatura', $asignaturaID)->pluck('nombre_asignatura')->first();
        
                $grupos = Grupo::where('id_profesor', $userID)
                    ->where('id_asignatura', $asignaturaID)
                    ->get();
        
                $profesor = $user->name;
                $salon = null;
                $dias = null;
                $horario_inicio = null;
                $horario_fin = null;
                $lista_alumnos = [];
                
                if($grupos->count() > 0){
                    return view('asignatura', compact('asignatura', 'asignaturas', 'grupos', 
                    'profesor', 'salon', 'dias', 'horario_inicio', 'horario_fin', 'lista_alumnos'));
                }
                else{
                    session()->flash('error', 'No tienes grupos registrados para esta asignatura.');
                    return redirect()->back();
                }
            }
            return redirect()->back();
    }
    public function verGrupo(Request $request)
    {
        $userID = Auth::id();
        $grupoID = $request->input('grupo_id');
        $grupo = Grupo::find($grupoID);
        $asignaturaID = $grupo->id_asignatura;
        $lista_alumnos = ListaAlumnos::where('id_grupo', $grupoID)->get();

        $grupos = Grupo::where('id_profesor', $userID)
                    ->where('id_asignatura', $asignaturaID)
                    ->get();
        
        if ($grupo) {
            $asignatura = $grupo->asignatura->nombre_asignatura;
            $profesor = $grupo->profesor->name;
            $salon = $grupo->salon;
            $dias = $grupo->dias_seleccionados;
            $horario_inicio = Carbon::parse($grupo->horario_inicio)->format('H:i');
            $horario_fin = Carbon::parse($grupo->horario_fin)->format('H:i');

            return view('asignatura', compact('grupos', 'asignatura', 'profesor', 'salon', 
            'dias', 'horario_inicio', 'horario_fin', 'lista_alumnos'));
        }

        return view('asignatura', compact('grupos'));
    }        
}