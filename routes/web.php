<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::fallback([FrontendController::class, 'catchAll']);

Route::post('/contact-save', [FrontendController::class, 'postContact'])->name('contact-save');
Route::get('/blog-details/{id}', [FrontendController::class, 'blog_details'])->name('blog-details');
include 'admin.php';
