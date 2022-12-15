<?php

use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Career\CareerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Users\ProfileController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Livewire\Admin\Blog\BlogCreate;
use App\Http\Livewire\Admin\Blog\BlogEdit;
use App\Http\Livewire\Admin\Brands\BrandCreate;
use App\Http\Livewire\Admin\Brands\BrandEdit;
use App\Http\Livewire\Admin\Clients\ClientCreate;
use App\Http\Livewire\Admin\Clients\ClientEdit;
use App\Http\Livewire\Admin\Settings;
use App\Models\User;
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

        // All Users 
        Route::resource('users', UserController::class);
    });
});
