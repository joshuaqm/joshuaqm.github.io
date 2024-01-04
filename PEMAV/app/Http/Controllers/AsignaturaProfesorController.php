<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsignaturaProfesorController extends Controller
{
    public function index()
    {
        return view('asignatura-profesor');
    }
}
