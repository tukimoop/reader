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

Route::group(['prefix' => 'admin'], function () {

    // Dashboard
    Route::redirect('/', '/admin/dashboard');
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard.index');

    // System
    Route::group(['prefix' => 'system'], function () {

        Route::redirect('/', '/admin/system/general');

        Route::get('general', 'SystemController@general')->name('admin.system.general');
        Route::get('security', 'SystemController@security')->name('admin.system.security');
        Route::get('performance', 'SystemController@performance')->name('admin.system.performance');

    });
});
