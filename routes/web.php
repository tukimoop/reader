<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('reader.index');

Route::get('/latest', 'HomeController@latest')->name('reader.latest');

Route::get('/comics', 'HomeController@latest')->name('reader.comics');

Route::get('/comic/{slug}', 'HomeController@latest')->name('reader.comics.show');

Route::get('/read/{slug}', 'HomeController@latest')->name('reader.comics.chapter.show');