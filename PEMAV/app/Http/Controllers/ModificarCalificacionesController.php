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
        $calificaciones = [];
        $alumnos = [];
        return view('vistas-administrador.modificar-calificaciones', compact('grupos', 'lista_alumnos', 'id_asignatura', 'calificaciones', 'alumnos'));
    }


    public function filtrarGrupos(Request $request)
    {
        $grupoID = $request->input('id_grupo');
        $id_asignatura = Grupo::where('id_grupo', $grupoID)->first()->id_asignatura;
        $lista_alumnos = ListaAlumnos::where('id_grupo', $grupoID)->get();

        $calificaciones = Calificaciones::select('numero_examen')
            ->where('id_grupo', $grupoID)
            ->where('id_asignatura', $id_asignatura)
            ->distinct()
            ->pluck('numero_examen')
            ->toArray();

        // Obtener las calificaciones de los alumnos para mostrar en la tabla
        $calificacionesAlumnos = [];
        foreach ($alumnos as $alumno) {
            $calificacionesAlumno = Calificaciones::where('id_alumno', $alumno->id)
                ->where('id_grupo', $grupoID)
                ->where('id_asignatura', $id_asignatura)
                ->pluck('calificacion', 'numero_examen')
                ->toArray();

            $calificacionesAlumnos[$alumno->id] = $calificacionesAlumno;
        }
        $profesor = Auth::user()->id;
        $grupos = Grupo::where('id_profesor', $profesor)->get();

        return view('vistas-administrador.modificar-calificaciones', compact('grupos', 'lista_alumnos', 'id_asignatura', 'calificaciones'));
    }


    public function modificarCalificaciones(Request $request)
    {
        // Validación de los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'alumno_id' => 'required|numeric',
            'examen_numero' => 'required|numeric',
            'calificacion' => 'required|numeric|min:0|max:10',
        ]);

        // Si la validación falla, redirigir de nuevo con mensajes de error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Recuperar los datos del formulario
        $alumnoId = $request->input('alumno_id');
        $examenNumero = $request->input('examen_numero');
        $calificacion = $request->input('calificacion');

        // Actualizar la calificación del alumno para el examen específico
        $calificacionExistente = Calificaciones::where('id_alumno', $alumnoId)
            ->where('numero_examen', $examenNumero)
            ->first();

        if ($calificacionExistente) {
            $calificacionExistente->calificacion = $calificacion;
            $calificacionExistente->save();
        } else {
            // Si no existe una calificación para el alumno y el examen, crea una nueva
            Calificaciones::create([
                'id_alumno' => $alumnoId,
                'numero_examen' => $examenNumero,
                'calificacion' => $calificacion,
                // ... otros campos que necesites completar ...
            ]);
        }

        // Redireccionar a la página anterior o a donde sea necesario
        return redirect()->back()->with('success', 'Calificación modificada exitosamente');
    }
}
