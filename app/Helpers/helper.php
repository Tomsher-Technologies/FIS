<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function getAdminAsset($path)
{
    return asset('adminassets/' . $path);
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
