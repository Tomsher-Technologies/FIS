<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\Enquiries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Artisan;
use Cache;

class DashboardController extends Controller
{
    public function index()
    {
        $contactEnquiries = Contacts::count();
        $productEnquiries = Enquiries::count();
        return view('admin.dashboard')->with([
            'productEnquiries' => $productEnquiries,
            'contactEnquiries' => $contactEnquiries,
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

    function clearCache(Request $request)
    {
        Artisan::call('cache:clear');
        return back();
    }
}
