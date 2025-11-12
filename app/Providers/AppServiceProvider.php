<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
         // Share data with ALL views that use app layout
        View::composer('admin.template', function ($view) {
            $view->with([
                'adminUser' => Auth::user()->name,
            ]);
        });
        //
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
