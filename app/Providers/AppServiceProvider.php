<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
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
        foreach (glob(resource_path('views/modules/*'), GLOB_ONLYDIR) as $moduleDir) {
            $componentsDir = $moduleDir.'/components';
            if (is_dir($componentsDir)) {
                Blade::anonymousComponentPath($componentsDir, basename($moduleDir));
            }
        }
    }
}
