<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    // Dashboard
    Route::redirect('/', '/admin/dashboard');
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard.index');

    // Content
    Route::group(['prefix' => 'content'], function () {

        // Comics
        Route::get('comics', 'ContentController@comics')->name('admin.content.comics');

    });

    // System
    Route::group(['prefix' => 'system'], function () {

        Route::redirect('/', '/admin/system/general');

        /**
         * Settings
         */

        // General
        Route::get('general', 'SystemController@general')->name('admin.system.general');
        Route::post('general', 'SystemController@updateGeneral')->name('admin.system.general.update');

        // Security
        Route::get('security', 'SystemController@security')->name('admin.system.security');
        Route::post('security', 'SystemController@updateSecurity')->name('admin.system.security.update');

        // Performance
        Route::get('performance', 'SystemController@performance')->name('admin.system.performance');

    });
});
