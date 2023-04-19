<?php

use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Career\CareerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\Galler\GalleryController;
use App\Http\Controllers\Admin\Users\ProfileController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Livewire\Admin\Blog\BlogCreate;
use App\Http\Livewire\Admin\Blog\BlogEdit;
use App\Http\Livewire\Admin\Brands\BrandCreate;
use App\Http\Livewire\Admin\Brands\BrandEdit;
use App\Http\Livewire\Admin\Clients\ClientCreate;
use App\Http\Livewire\Admin\Clients\ClientEdit;
use App\Http\Livewire\Admin\Gallery\GalleryListing;
use App\Http\Livewire\Admin\Products\ProductCreate;
use App\Http\Livewire\Admin\Products\ProductEdit;
use App\Http\Livewire\Admin\Services\ServiceCreate;
use App\Http\Livewire\Admin\Services\ServiceEdit;
use App\Http\Livewire\Admin\Settings;
use App\Http\Livewire\Admin\Businesses\BusinessCreate;
use App\Http\Livewire\Admin\Businesses\BusinessEdit;
use App\Http\Livewire\Admin\StoreLocation\LocationCreate;
use App\Http\Livewire\Admin\StoreLocation\LocationEdit;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/' . env('ADMIN_PREFIX', 'admin'), function () {
        return redirect()->route('login');
    });
});

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/' . env('ADMIN_PREFIX', 'admin'), function () {
        return redirect()->route('admin.dashboard');
    });
    Route::group(['prefix' => env('ADMIN_PREFIX', 'admin'), 'as' => 'admin.'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Search in dashboard
        Route::get('/search', [DashboardController::class, 'search'])->name('search');

        // Logged-in user profile
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/profile', function () {
                return view('admin.users.profile');
            })->name('profile');

            Route::put('/password-update', [ProfileController::class, 'updatePassword'])->name('password-update');
            Route::put('/profile-update', [ProfileController::class, 'updateProfile'])->name('profile-update');
            Route::post('/logout-everywhere', [ProfileController::class, 'logoutEverywhere'])->name('logout-everywhere');
        });

        // Logged-in user profile
        Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
            Route::get('/', Settings::class)->name('index');
        });
        // Banner
        Route::resource('banner', BannerController::class)->except('show');

        // Carrer
        Route::resource('career', CareerController::class)->except('show');

        // Blog
        Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
            Route::get('/', [BlogController::class, 'index'])->name('index');
            Route::get('/create', BlogCreate::class)->name('create');
            Route::get('/{blog}/edit', BlogEdit::class)->name('edit');
        });

        // Clients
        Route::group(['prefix' => 'clients', 'as' => 'clients.'], function () {
            Route::get('/', function () {
                return view('admin.clients.index');
            })->name('index');
            Route::get('/create', ClientCreate::class)->name('create');
            Route::get('/{client}/edit', ClientEdit::class)->name('edit');
        });

        // Clients
        Route::group(['prefix' => 'brands', 'as' => 'brands.'], function () {
            Route::get('/', function () {
                return view('admin.brands.index');
            })->name('index');
            Route::get('/create', BrandCreate::class)->name('create');
            Route::get('/{brand}/edit', BrandEdit::class)->name('edit');
        });

        // Product
        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            Route::get('/', function () {
                return view('admin.products.index');
            })->name('index');
            Route::get('/create', ProductCreate::class)->name('create');
            Route::get('/{product}/edit', ProductEdit::class)->name('edit');
        });

        // Services
        Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
            Route::get('/', function () {
                return view('admin.services.index');
            })->name('index');
            Route::get('/create', ServiceCreate::class)->name('create');
            Route::get('/{service}/edit', ServiceEdit::class)->name('edit');
        });

        // Store Location
        Route::group(['prefix' => 'store_location', 'as' => 'store_location.'], function () {
            Route::get('/', function () {
                return view('admin.store_location.index');
            })->name('index');
            Route::get('/create', LocationCreate::class)->name('create');
            Route::get('/{location}/edit', LocationEdit::class)->name('edit');
        });

        // Gallery
        Route::get('/gallery', function () {
            return view('admin.gallery.index');
        })->name('gallery');

        Route::post('/gallery', [GalleryController::class, 'index'])->name('gallery.upload');

        // Product
        Route::get('/enquriy', function () {
            return view('admin.enquriy.index');
        })->name('enquriy');

        // All Users 
        Route::resource('users', UserController::class);

        // Businesses
        Route::group(['prefix' => 'businesses', 'as' => 'businesses.'], function () {
            Route::get('/', function () {
                return view('admin.businesses.index');
            })->name('index');
            Route::get('/create', BusinessCreate::class)->name('create');
            Route::get('/{business_settings}/edit', BusinessEdit::class)->name('edit');
        });

         // Pages
         Route::group(['prefix' => 'pages', 'as' => 'page.'], function () {
            Route::get('/privacy', [PageController::class, 'index'])->name('privacy');
            Route::post('/store-data', [PageController::class, 'store'])->name('store-privacy');
            Route::post('/getData', [PageController::class, 'getData'])->name('get-data');

            Route::get('/faq', [PageController::class, 'faq'])->name('faq');
            Route::get('/create-faq', [PageController::class, 'createFaq'])->name('faq-create');
            Route::post('/store-faq', [PageController::class, 'storeFaq'])->name('store-faq');

            Route::get('/edit-faq/{id}', [PageController::class, 'editFaq'])->name('faq-edit');
            Route::post('/delete-faq', [PageController::class, 'deleteFaq'])->name('delete-faq');
            Route::post('/status-faq', [PageController::class, 'changeFaqStatus'])->name('change-faq-status');

            Route::get('/faq-settings', [PageController::class, 'settingsFaq'])->name('faq-settings');
            Route::post('/store-faq-settings', [PageController::class, 'storeFaqSettings'])->name('store-faq-settings');

            Route::get('/aboutus', [PageController::class, 'aboutUs'])->name('about-us');
            Route::post('/store-about-settings', [PageController::class, 'storeAboutSettings'])->name('store-about-settings');

            Route::get('/history', [PageController::class, 'history'])->name('history');
            Route::post('/store-history-settings', [PageController::class, 'storeHistorySettings'])->name('store-history-settings');

            Route::get('/awards', [PageController::class, 'awards'])->name('awards');
            Route::post('/store-awards-settings', [PageController::class, 'storeAwardsSettings'])->name('store-awards-settings');

            Route::get('/mission-vision', [PageController::class, 'missionAndVision'])->name('mission-vision');
            Route::post('/store-mission-vision', [PageController::class, 'storeMissionAndVision'])->name('store-mission-vision');

            Route::get('/services', [PageController::class, 'services'])->name('services');
            Route::post('/store-services', [PageController::class, 'storeServices'])->name('store-services');
        });
    });
});
