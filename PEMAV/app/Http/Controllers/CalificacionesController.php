<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Calificaciones;

class CalificacionesController extends Controller
{
    public function index()
    {
        $alumno = Auth::user()->name;
        $id_alumno = Auth::user()->id;

        $promedioEspañol = Calificaciones::where('id_alumno', $id_alumno)->where('id_asignatura', 1)->avg('calificacion');
        $promedioMatematicas = Calificaciones::where('id_alumno', $id_alumno)->where('id_asignatura', 2)->avg('calificacion');
        $promedioHabilidadMatematica = Calificaciones::where('id_alumno', $id_alumno)->where('id_asignatura', 3)->avg('calificacion');
        $promedioHabilidadVerbal = Calificaciones::where('id_alumno', $id_alumno)->where('id_asignatura', 4)->avg('calificacion');
        $promedioFisica = Calificaciones::where('id_alumno', $id_alumno)->where('id_asignatura', 5)->avg('calificacion');
        $promedioQuimica = Calificaciones::where('id_alumno', $id_alumno)->where('id_asignatura', 6)->avg('calificacion');
        $promedioBiologia = Calificaciones::where('id_alumno', $id_alumno)->where('id_asignatura', 7)->avg('calificacion');
        $promedioHistoria = Calificaciones::where('id_alumno', $id_alumno)->where('id_asignatura', 8)->avg('calificacion');
        $promedioGeografia = Calificaciones::where('id_alumno', $id_alumno)->where('id_asignatura', 9)->avg('calificacion');
        $promedioFormacionCivica = Calificaciones::where('id_alumno', $id_alumno)->where('id_asignatura', 10)->avg('calificacion');
        
        $contadorMaterias = 0;
        $promedioTotal = 0;
        if($promedioEspañol != null){
            $promedioTotal += $promedioEspañol;
            $contadorMaterias++;
        }
        if($promedioMatematicas != null){
            $promedioTotal += $promedioMatematicas;
            $contadorMaterias++;
        }
        if($promedioHabilidadMatematica != null){
            $promedioTotal += $promedioHabilidadMatematica;
            $contadorMaterias++;
        }
        if($promedioHabilidadVerbal != null){
            $promedioTotal += $promedioHabilidadVerbal;
            $contadorMaterias++;
        }
        if($promedioFisica != null){
            $promedioTotal += $promedioFisica;
            $contadorMaterias++;
        }
        if($promedioQuimica != null){
            $promedioTotal += $promedioQuimica;
            $contadorMaterias++;
       }
        if($promedioBiologia != null){
            $promedioTotal += $promedioBiologia;
            $contadorMaterias++;
        }
        if($promedioHistoria != null){
            $promedioTotal += $promedioHistoria;
            $contadorMaterias++;
        }
        if($promedioGeografia != null){
            $promedioTotal += $promedioGeografia;
            $contadorMaterias++;
        }
        if($promedioFormacionCivica != null){
            $promedioTotal += $promedioFormacionCivica;
            $contadorMaterias++;
        }
        $promedioTotal = $promedioTotal / $contadorMaterias;
        
        $calificaciones = Calificaciones::where('id_alumno', $id_alumno)->get();

        return view('calificaciones', compact('alumno', 'calificaciones', 
        'promedioEspañol', 'promedioMatematicas', 'promedioHabilidadMatematica', 
        'promedioHabilidadVerbal', 'promedioFisica', 'promedioQuimica', 'promedioBiologia', 
        'promedioHistoria', 'promedioGeografia', 'promedioFormacionCivica', 'promedioTotal'));
    }
}
