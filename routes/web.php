<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProductsController;
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
Route::post('/enquiry-save', [FrontendController::class, 'postEnquiry'])->name('enquiry-save');
Route::get('/news-details/{id}', [FrontendController::class, 'blog_details'])->name('blog-details');

Route::get('/products/{category?}', [ProductsController::class, 'getProductsList'])->name('products');
Route::get('/product/{sku}/{slug}', [ProductsController::class, 'getProductDetails'])->name('product-details');
Route::get('posts', [ProductsController::class, 'index']);

Route::post('/loadmore-products', [ProductsController::class, 'loadMoreProducts'])->name('loadmore-products');
include 'admin.php';
