<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::resource('places','PlacesController');
    Route::group( ['middleware' => 'auth'], function ()
    {
        Route::resource('admin', 'AdminController', ['only' => ['index', 'show']]);
        Route::resource('places/{slug}/images','ImagesController', ['only' => ['store', 'destroy']]);
    });






