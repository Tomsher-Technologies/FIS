<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Users\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'auth.session'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Search in dashboard
    Route::get('/search', [DashboardController::class, 'search'])->name('search');
    
    // Logged-in user profile
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/profile', function () {
            return view('users.profile');
        })->name('profile');

        Route::put('/password-update', [ProfileController::class, 'updatePassword'])->name('password-update');
        Route::put('/profile-update', [ProfileController::class, 'updateProfile'])->name('profile-update');
        Route::post('/logout-everywhere', [ProfileController::class, 'logoutEverywhere'])->name('logout-everywhere');
    });

    // All Users 
    Route::resource('users', UserController::class);
});
