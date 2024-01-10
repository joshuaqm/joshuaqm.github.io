<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Grupo;
use App\Models\ListaAlumnos;
use App\Models\Calificaciones;

class NuevoExamenController extends Controller
{
    public function index()
    {
        $profesor = Auth::user()->id;
        $grupos = Grupo::where('id_profesor', $profesor)->get();
        $lista_alumnos = []; // Inicializa la variable lista_alumnos
        $id_asignatura = null;

        return view('vistas-administrador.nuevo-examen', compact('grupos', 'lista_alumnos', 'id_asignatura'));
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

    public function store(Request $request)
    {
        // Recibiendo datos del formulario
        $id_asignatura = $request->input('id_asignatura');
        $numeroExamen = $request->input('numero_examen');
        $fechaExamen = $request->input('fecha_examen');
        $calificaciones = $request->input('calificaciones');

        // Ejemplo de cómo puedes recorrer las calificaciones y guardarlas
        foreach ($calificaciones as $alumnoId => $calificacion) {
            $nuevaCalificacion = new Calificaciones();
            $nuevaCalificacion->id_asignatura = $id_asignatura; // Asignas el id de la asignatura
            $nuevaCalificacion->id_alumno = $alumnoId; // Asignas el id del alumno
            $nuevaCalificacion->numero_examen = $numeroExamen; // Asignas el número de examen
            $nuevaCalificacion->fecha_examen = $fechaExamen; // Asignas la fecha del examen
            $nuevaCalificacion->calificacion = $calificacion; // Asignas la calificación del alumno
            $nuevaCalificacion->save();
        }

        return redirect()->route('nuevo-examen')->with('success', 'Examen registrado correctamente');
    }

}
