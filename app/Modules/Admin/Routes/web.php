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
    Route::redirect('', '/admin/dashboard');
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard.index');

    // Content
    Route::group(['prefix' => 'content'], function () {

        // Comics
        Route::group(['prefix' => 'comics'], function () {

            Route::get('', 'Content\ComicsController@index')->name('admin.content.comics');

            Route::get('create', 'Content\ComicsController@create')->name('admin.content.comics.create');

            Route::get('{comic}', 'Content\ComicsController@show')->name('admin.content.comics.show');

            Route::post('', 'Content\ComicsController@store')->name('admin.content.comics.store');

            Route::delete('{comic}', 'Content\ComicsController@destroy')->name('admin.content.comics.destroy');


            // Chapters
            Route::get('{comic}/create', 'Content\ChaptersController@create')->name('admin.content.comics.chapters.create');

            Route::post('{comic}/create', 'Content\ChaptersController@store')->name('admin.content.comics.chapters.store');

            Route::get('{comic}/{chapter}', 'Content\ChaptersController@show')->name('admin.content.comics.chapters.show');

            Route::post('{comic}/{chapter}', 'Content\ChaptersController@uploadImage')->name('admin.content.comics.chapters.upload');

            Route::get('{comic}/{chapter}/announce', 'Content\ChaptersController@announce')->name('admin.content.comics.chapters.announce');

            Route::delete('{comic}/{chapter}', 'Content\ChaptersController@destroy')->name('admin.content.comics.chapters.destroy');

        });

        // Volumes
        Route::group(['prefix' => 'volumes'], function () {

            Route::post('', 'Content\VolumesController@store')->name('admin.content.volumes.create');

            Route::delete('{volume}', 'Content\VolumesController@destroy')->name('admin.content.volumes.destroy');

        });

    });

    // Content
    Route::group(['prefix' => 'members'], function () {

        // Comics
        Route::get('', 'MembersController@index')->name('admin.members.index');

        // User Groups
        Route::group(['prefix' => 'groups'], function () {

            Route::get('', 'UserGroupsController@index')->name('admin.members.groups.index');

            Route::get('{role}', 'UserGroupsController@show')->name('admin.members.groups.show');

            Route::post('{role}', 'UserGroupsController@update')->name('admin.members.groups.update');

        });

    });

    // System
    Route::group(['prefix' => 'system'], function () {

        Route::redirect('', '/admin/system/settings/general');

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
