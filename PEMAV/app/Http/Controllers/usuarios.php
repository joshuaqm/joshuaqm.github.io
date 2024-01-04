<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class usuarios extends Controller
{
    public function index()
    {
        // Muestra una lista de usuarios
        $usuarios = usuarios::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        // Muestra el formulario para crear un nuevo usuario
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        // Almacena un nuevo usuario en la base de datos
        usuarios::create($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    }

    public function show($id)
    {
        // Muestra los detalles de un usuario específico
        $usuario = usuarios::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        // Muestra el formulario para editar un usuario
        $usuario = usuarios::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        // Actualiza un usuario específico en la base de datos
        $usuario = usuarios::findOrFail($id);
        $usuario->update($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }

    public function destroy($id)
    {
        // Elimina un usuario específico de la base de datos
        $usuario = usuarios::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
