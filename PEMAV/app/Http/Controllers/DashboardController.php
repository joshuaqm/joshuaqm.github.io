<?php

namespace App\Http\Controllers;
use App\Models\Carousel;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $imagenes = Carousel::all();
        return view('dashboard', compact('imagenes'));
    }

    public function showImage($id)
    {
        $imagen = Carousel::find($id);

        $image = Storage::get($imagen->image);
        $mimeType = Storage::mimeType($imagen->image);

        return response($image)->header('Content-Type', $mimeType);
    }
}
