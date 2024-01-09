<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\User;
use App\Models\ListaAlumnos;

class AgregarAlumnosController extends Controller
{
    public function verDetalles($id_grupo)
    {
        $alumnos = User::where('role', 0)->get();
        $grupo = Grupo::with('asignatura', 'profesor')->find($id_grupo);
        $alumnosEnGrupo = $grupo->alumnos()->get();

        $total_alumnos = $alumnos->count();

        return view('vistas-administrador.agregar-alumnos', [
            'grupo' => $grupo,
            'alumnos' => $alumnos,
            'alumnosEnGrupo' => $alumnosEnGrupo,
            'total_alumnos' => $total_alumnos
        ]);
    }

    public function agregarAlumno($id_grupo, $id_alumno)
    {
        $grupo = Grupo::find($id_grupo);
        $alumno = User::find($id_alumno);

        // Verificar si el alumno ya está en el grupo
        if ($grupo->alumnos->contains($alumno)) {
            return redirect()->route('ver-detalles', ['id_grupo' => $id_grupo])
                ->with('error', 'El alumno ya está en el grupo.');
        }

        // Agregar el alumno al grupo
        $grupo->alumnos()->attach($alumno);

        return redirect()->route('ver-detalles', ['id_grupo' => $id_grupo])
            ->with('success', 'Alumno agregado al grupo correctamente');
    }

    public function eliminarAlumno(Request $request, $id_grupo, $id_alumno)
    {
        $grupo = Grupo::find($id_grupo);
        $grupo->alumnos()->detach($id_alumno); // Eliminar el alumno del grupo

        return redirect()->route('ver-detalles', ['id_grupo' => $id_grupo])
            ->with('success', 'Alumno eliminado del grupo correctamente');
    }
}
