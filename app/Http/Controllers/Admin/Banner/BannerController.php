<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $banner = Banner::create($request->all());
        if ($request->hasFile('image_file')) {
            // $name = pathinfo($request->file('image_file')->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $request->file('image_file')->getClientOriginalExtension();
            // $path = $request->file('image_file')->storeAs(
            //     'public/banner',
            //     $name
            // );

            $name = uploadImage($request, 'image_file', 'banner');

            $banner->image = $name;
            $banner->save();
        }
        return redirect()->route('admin.banner.index')->with('status', 'Banner created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit')->with([
            'banner' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBannerRequest  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {

        $banner->update($request->all());

        if ($request->hasFile('image_file')) {

            // Delete image
            deleteImage($banner->image);

            $name = uploadImage($request, 'image_file', 'banner');

            $banner->image = $name;
            $banner->save();
        }

        return redirect()->route('admin.banner.index')->with('status', 'Banner created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if ($banner->image) {
            deleteImage($banner->image);
        }
        $banner->delete();
        return redirect()->route('admin.banner.index')->with('status', 'Banner deleted successfully');
    }
}
