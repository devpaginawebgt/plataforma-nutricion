<?php

namespace App\Providers;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        RedirectIfAuthenticated::redirectUsing(function ($request) {
            return route($request->user()->dashboardRoute());
        });

        foreach (glob(resource_path('views/modules/*'), GLOB_ONLYDIR) as $roleDir) {
            if (is_dir($roleDir.'/components')) {
                Blade::anonymousComponentPath($roleDir.'/components', basename($roleDir));
            }

            foreach (glob($roleDir.'/*', GLOB_ONLYDIR) as $moduleDir) {
                $componentsDir = $moduleDir.'/components';
                if (is_dir($componentsDir)) {
                    Blade::anonymousComponentPath($componentsDir, basename($roleDir).'-'.basename($moduleDir));
                }
            }
        }
    }
}
