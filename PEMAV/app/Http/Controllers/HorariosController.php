<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ListaAlumnos;
use App\Models\Grupo;

class HorariosController extends Controller
{
    public function index()
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Buscar en la tabla ListaAlumnos donde el ID de alumno coincida con el ID del usuario autenticado
        $lista_alumnos = ListaAlumnos::where('id_alumno', $userId)->get();

        // Obtener los grupos del usuario actual junto con las asignaturas relacionadas
        $grupos = Grupo::with('asignatura')
            ->whereIn('id_grupo', $lista_alumnos->pluck('id_grupo'))
            ->get();

        // Pasar los datos a la vista
        return view('horarios', compact('lista_alumnos', 'grupos'));
    }
}
