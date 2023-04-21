<?php

namespace App\Providers;

use App\Models\Common\Settings;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Facades\View::composer('frontend.*', function (View $view) {
            $settings = Cache::rememberForever('settings', function () {
                return Settings::all();
            });

            return $view->with([
                'settings' => $settings,
            ]);
        });
    }
}
