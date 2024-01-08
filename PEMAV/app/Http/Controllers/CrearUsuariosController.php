<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrearUsuariosController extends Controller
{
    public function index()
    {
        return view('vistas-administrador.crear-usuarios');
    }
    
}
