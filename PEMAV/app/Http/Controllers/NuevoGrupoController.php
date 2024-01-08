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
            'id_asignatura' => 'required',
            'id_profesor' => 'required',
            'salon' => 'required',
            'horario_inicio' => 'required|date_format:H:i',
            'horario_fin' => 'required|date_format:H:i|after:horario_inicio',
            'dias' => 'required',
        ]);

        // Crear un nuevo grupo en la base de datos
        Grupo::create($request->all());

        // Redireccionar después de guardar el grupo
        return redirect()->route('vistas-administrador.nuevo-grupo')
            ->with('success', 'Grupo creado exitosamente.');
    }
    public function create()
    {
        // Obtener solo los nombres de las asignaturas
        $asignaturas = Asignatura::pluck('nombre_asignatura');

        // Obtener solo los nombres de los usuarios con role igual a 0
        $profesores = User::where('role', 1)->pluck('name');

        return view('vistas-administrador.nuevo-grupo', [
            'asignaturas' => $asignaturas,
            'profesores' => $profesores,
        ]);
    }
    public function dias(Request $request)
    {
        // Obtener los días seleccionados como un arreglo
        $diasSeleccionados = $request->input('dias');

        // Convertir el arreglo de días a una cadena para almacenar en la base de datos
        $diasComoString = implode(',', $diasSeleccionados);

        // Guardar los días como una cadena en la base de datos
        $grupo = new Grupo();
        $grupo->dias = $diasComoString;
        $grupo->save();

        // Resto del código para almacenar otros campos del formulario
    }
}
