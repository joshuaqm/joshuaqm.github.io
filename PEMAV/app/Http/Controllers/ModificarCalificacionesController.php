<?php

namespace App\Http\Controllers;
use App\Models\Grupo;
use App\Models\Asignatura;
use App\Models\ListaAlumnos;
use App\Models\Calificaciones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ModificarCalificacionesController extends Controller
{
    public function index()
    {
        $profesor = Auth::user()->id;
        $grupos = Grupo::where('id_profesor', $profesor)->get();
        $calificaciones=[];
        
        $alumnoId = null;
        $examenNumero = null;
        $calificacion = null;

        return view('vistas-administrador.modificar-calificaciones', compact('grupos','calificaciones', 'alumnoId', 'examenNumero', 'calificacion'));
    }


    public function filtrarGrupos(Request $request)
    {
        $grupoID = $request->input('id_grupo');
        $id_asignatura = Grupo::where('id_grupo', $grupoID)->first()->id_asignatura;

        $profesor = Auth::user()->id;
        $grupos = Grupo::where('id_profesor', $profesor)->get();
        $calificaciones=Calificaciones::where('id_grupo', $grupoID)->get();

        $alumnoId = null;
        $examenNumero = null;
        $calificacion = null;

        return view('vistas-administrador.modificar-calificaciones', compact('grupos', 'id_asignatura', 'grupoID','calificaciones', 'alumnoId', 'examenNumero', 'calificacion'));
    }


    public function update(Request $request)
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
