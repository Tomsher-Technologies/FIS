<?php

use App\Models\Pages\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

function getAdminAsset($path)
{
    return asset('adminassets/' . $path);
}


function getSEOUrl($path)
{
    $uriSegments = explode(".", $path);

    Cache::forget('url_pages');

    $pages = Cache::rememberForever('url_pages',  function () {
        return Pages::all();
    });

    $url_sub = "";
    $url = $pages->where('page_id_name', $uriSegments[0])->pluck('seo_url')->first();

    if (count($uriSegments) > 1) {
        switch ($uriSegments[0]) {
            default:
                $url_sub = "";
        }
    }

    return $url !== null ? URL::to($url . "/" . $url_sub) : "";
}

/**
 * Image Upload Helper
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  string $input
 * @param  string $path
 * @param  boolean $uniqueName
 * @return \Illuminate\Http\Response
 */
function uploadImage(Request $request, $input, $path, $uniqueName = true)
{
    if ($request->hasFile($input)) {

        $uploadedFile = $request->file($input);
        $filename =   time() . cleanFileName($uploadedFile->getClientOriginalName());
        if (!$uniqueName) {
            $filename = cleanFileName($uploadedFile->getClientOriginalName());
        }

        $name = Storage::disk('public')->putFileAs(
            $path,
            $uploadedFile,
            $filename
        );

        return Storage::url($name);
    }
    return null;
}

/**
 * Image Delete Helper
 *
 * @param  string $path
 * @return boolean
 */
function deleteImage($path)
{
    $fileName = 'public' . Str::remove('/storage', $path);
    if (Storage::exists($fileName)) {
        Storage::delete($fileName);
    }
}

/**
 * Clean file names. Removes special characters from file name
 *
 * @param  string $file_name_str
 * @return string
 */
function cleanFileName($file_name_str)
{
    $file_name_str = str_replace(' ', '-', $file_name_str);
    // Removes special chars. 
    $file_name_str = preg_replace('/[^A-Za-z0-9.\-\_]/', '', $file_name_str);
    // Replaces multiple hyphens with single one. 
    $file_name_str = preg_replace('/-+/', '-', $file_name_str);
    return $file_name_str;
}

/**
 * Create SEO Url from string
 *
 * @param  string $file_name_str
 * @return string
 */
function createSlug($string)
{
    return Str::of($string)->slug('-');
}

/**
 * Save SEO Data
 *
 * @param  Modal $modal
 * @param  string $file_name_str
 * @return string
 */
function saveSEO($model, $that, $class)
{
    $model->seo()->updateorCreate([
        'seo_id' => $model->id,
        'seo_type' => $class
    ], [
        'title' => $that->seotitle ?? '',
        'og_title' => $that->ogtitle ?? '',
        'twitter_title' => $that->twtitle ?? '',
        'description' => $that->seodescription ?? '',
        'og_description' => $that->og_description ?? '',
        'twitter_description' => $that->twitter_description ?? '',
        'seokeywords' => $that->seokeywords ?? '',
    ]);
}


function getValueFromSetting($settings, $name)
{
    return $settings->where('name', $name)->first()->value;
}
