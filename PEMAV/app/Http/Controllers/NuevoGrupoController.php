<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;
use App\Models\Asignatura;
use App\Models\User;

class NuevoGrupoController extends Controller
{
    // Resto de métodos para index, show, edit, update, destroy...

    // Mostrar el formulario para crear un nuevo grupo
    public function index()
    {
        return view('vistas-administrador.nuevo-grupo'); // Suponiendo que tienes una vista llamada create.blade.php en la carpeta views/grupos/
    }

    // Almacenar un nuevo grupo en la base de datos
    public function store(Request $request)
{
    // Validar los datos ingresados por el usuario
    $request->validate([
        'id_grupo' => 'required|unique:grupos',
        'id_asignatura' => 'required|exists:asignaturas,id_asignatura',
        'id_profesor' => 'required|exists:users,id',
        'salon' => 'required',
        'horario_inicio' => 'required|date_format:H:i',
        'horario_fin' => 'required|date_format:H:i|after:horario_inicio',
        'dias' => 'required|array', // Asegura que sea un arreglo
    ]);

    // Crear un nuevo grupo en la base de datos
    Grupo::create([
        'id_grupo' => $request->id_grupo,
        'id_asignatura' => $request->id_asignatura,
        'id_profesor' => $request->id_profesor,
        'salon' => $request->salon,
        'horario_inicio' => $request->horario_inicio,
        'horario_fin' => $request->horario_fin,
        'dias_seleccionados' => json_encode($request->dias), // Guarda los días como una cadena JSON
    ]);

    // Redireccionar después de guardar el grupo
    return redirect()->route('vistas-administrador.nuevo-grupo')
        ->with('success', 'Grupo creado exitosamente.');
}

    public function create()
    {
        $asignaturas = Asignatura::pluck('nombre_asignatura', 'id_asignatura');

        $profesores = User::where('role', 2)->pluck('name', 'id');

        $alumnos = User::where('role', 0)->pluck('name', 'id');

        return view('vistas-administrador.nuevo-grupo', [
            'asignaturas' => $asignaturas,
            'profesores' => $profesores,
            'alumnos' => $alumnos,
        ]);
    }

    public function dias(Request $request)
    {
        // Obtener los días seleccionados como un arreglo
        $diasSeleccionados = $request->input('dias');

        // Convertir el arreglo de días a una cadena JSON para almacenar en la base de datos
        $diasComoJSON = json_encode($diasSeleccionados);

        // Guardar los días como una cadena JSON en la columna "dias_seleccionados" de la tabla "grupos"
        $grupo = new Grupo();
        $grupo->dias_seleccionados = $diasComoJSON;
        $grupo->id_asignatura = $request->input('id_asignatura');
        $grupo->id_profesor = $request->input('id_profesor');
        $grupo->salon = $request->input('salon');
        $grupo->horario_inicio = $request->input('horario_inicio');
        $grupo->horario_fin = $request->input('horario_fin');

        $grupo->save();

        // Obtener los días como una cadena JSON de la columna "dias_seleccionados" de la tabla "grupos"
        //$diasComoJSON = $grupo->dias_seleccionados;

        return redirect()->route('nuevo-grupo')
            ->with('success', 'Grupo creado exitosamente.');
    }


}
