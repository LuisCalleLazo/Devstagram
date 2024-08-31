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

        $name = Str::uuid().".".$image->extension();
        $imageServer = Image::make($image);

        $imageServer->fit(1000, 1000);
        $imagePath = public_path('uploads') . '/' . $name;

        $imageServer->save($imagePath);

        return response()->json(
            [
                'imagen' => $image->extension()
            ]
        );
    }
}
