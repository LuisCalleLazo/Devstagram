<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->file('file');

        if (!$image || !$image->isValid()) {
            return response()->json(['error' => 'Invalid image upload.'], 400);
        }

        // Generar un nombre único para la imagen
        $name = Str::uuid().".".$image->getClientOriginalExtension();

        // Definir la ruta donde se guardará la imagen
        $imagePath = public_path('uploads');

        // Mover la imagen a la carpeta de destino
        $image->move($imagePath, $name);

        return response()->json(['imagen' => $name]);
    }
}
