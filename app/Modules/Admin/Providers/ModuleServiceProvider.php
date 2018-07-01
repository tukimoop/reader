<?php

namespace App\Modules\Admin\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'admin');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'admin');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'admin');
        $this->loadConfigsFrom(__DIR__.'/../config');

        // Copy files
        $this->publishes([
            __DIR__.'/../Resources/Assets/fonts/feather/fonts' => public_path('fonts'),
        ], 'modules');
        $this->publishes([
            __DIR__.'/../Resources/Assets/img' => public_path('assets/modules/admin/img'),
        ], 'modules');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
