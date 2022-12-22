<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard')->with([
            'countNews' => 1,
            'countEnquiry' => 1,
        ]);
    }

    public function search(Request $request)
    {
        $searchResults = [];
        // $searchResults = (new Search())
        //     ->registerModel(News::class, 'title')
        //     ->registerModel(Pages::class, ['title', 'page_name'])
        //     ->search($request->q);

        return view('admin.search')->with(['searchResults' => $searchResults]);
    }

    public function tinyimage(Request $request)
    {
        if ($request->hasFile('file')) {
            $name = uploadImage($request, 'file', 'images', true);
            return response()->json(
                [
                    'location' => url($name)
                ]
            );
        }
    }

    public function tinyimageDelete(Request $request)
    {
        $base_url = URL::to('/');
        $name = Str::replace($base_url, '', $request->image);
        deleteImage($name);
        return response()->json(
            [
                'location' => url($name)
            ]
        );
    }
}
