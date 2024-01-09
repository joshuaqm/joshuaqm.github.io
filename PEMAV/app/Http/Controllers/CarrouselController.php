<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Facades\Storage;

class CarrouselController extends Controller
{
    public function index()
    {
        $imagenes = Carousel::all();
        return view('vistas-administrador.crear-anuncio', compact('imagenes'));
    }

    public function showImage($id)
    {
        $imagen = Carousel::find($id);

        $image = Storage::get($imagen->image);
        $mimeType = Storage::mimeType($imagen->image);

        return response($image)->header('Content-Type', $mimeType);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required', 'mimes:jpeg,png,jpg,gif,svg|max:2048'], // Validación para asegurarse de que es una imagen
        ]);
    
        $anuncio = new Carousel();
        $anuncio->title = $request->title;
        $anuncio->description = $request->description;
    
        // Guardar la imagen en el almacenamiento y obtener la ruta
        $imagePath = $request->file('image')->store('anuncios');
    
        // Aquí, $imagePath será la ruta de almacenamiento de la imagen que se guardará en la base de datos
        $anuncio->image = $imagePath;
    
        $anuncio->save();
    
        return redirect()->route('crear-anuncio')->with('success', 'Anuncio creado correctamente');
    }
    public function destroy($id)
    {
        $imagen = Carousel::findOrFail($id);
        Storage::delete($imagen->image);
        $imagen->delete();

        return redirect()->back()->with('success', 'Anuncio eliminado correctamente');
    }    
}

