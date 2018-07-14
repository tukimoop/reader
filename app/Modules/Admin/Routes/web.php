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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'last.seen']], function () {

    // Dashboard
    Route::redirect('/', '/admin/dashboard');
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard.index');

    // Content
    Route::group(['prefix' => 'content'], function () {

        // Comics
        Route::get('comics', 'ContentController@comics')->name('admin.content.comics');

    });

    // Content
    Route::group(['prefix' => 'members'], function () {

        // Comics
        Route::get('', 'MembersController@index')->name('admin.members.index');

        // User Groups
        Route::group(['prefix' => 'groups'], function () {

            Route::get('', 'UserGroupsController@index')->name('admin.members.groups.index');
            Route::get('{role}', 'UserGroupsController@show')->name('admin.members.groups.show');

        });

    });

    // System
    Route::group(['prefix' => 'system'], function () {

        Route::redirect('/', '/admin/system/settings/general');

        // Settings
        Route::group(['prefix' => 'settings'], function () {

            Route::redirect('/', '/admin/system/settings/general');

            // General
            Route::get('general', 'SystemController@general')->name('admin.system.settings.general');
            Route::post('general', 'SystemController@updateGeneral')->name('admin.system.settings.general.update');

            // Security
            Route::get('security', 'SystemController@security')->name('admin.system.settings.security');
            Route::post('security', 'SystemController@updateSecurity')->name('admin.system.settings.security.update');

            // Performance
            Route::get('performance', 'SystemController@performance')->name('admin.system.settings.performance');
            Route::post('performance', 'SystemController@updatePerformance')->name('admin.system.settings.performance.update');

        });

    });
});
