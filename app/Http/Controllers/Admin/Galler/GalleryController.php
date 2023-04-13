<?php

namespace App\Http\Controllers\Admin\Galler;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $image = $request->file('file');
        $imageName = cleanFileName(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . "." . pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);

        $name = Storage::disk('public')->putFileAs(
            'gallery',
            $image,
            $imageName
        );

        Gallery::create([
            'image_alt' => '',
            'image' => Storage::url($name)
        ]);

        return response()->json(['success' => $imageName]);
    }
}
