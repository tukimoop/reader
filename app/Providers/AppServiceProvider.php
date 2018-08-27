<?php

namespace App\Providers;

use App\Models\Comic;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('comic', function ($value) {
            if (is_int($value)) {
                return Comic::Where('id', $value)
                        ->first() ?? abort(404);
            }

            return Comic::where('slug', $value)
                    ->first() ?? abort(404);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
