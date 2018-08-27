<?php

namespace App\Providers;

use App\Models\Comic;
use App\Models\Language;
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
        // Route bind: Comic
        Route::bind('comic', function ($value) {
            if (is_int($value)) {
                return Comic::where('id', $value)
                        ->first() ?? abort(404);
            }

            return Comic::where('slug', $value)
                    ->first() ?? abort(404);
        });

        // Route bind: Language
        Route::bind('language', function ($value) {
            if (is_int($value)) {
                return Language::where('id', $value)
                        ->first() ?? abort(404);
            }

            return Language::where('short_code', $value)
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
