<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// TinyMCE Image upload
Route::post('/tinyimage', [DashboardController::class, 'tinyimage'])->name('tinyimage');
Route::delete('/tinyimage', [DashboardController::class, 'tinyimageDelete'])->name('tinyimage.delete');
