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

Route::group(['prefix' => 'blogs'], function () {
    Route::get('/', function () {
        dd('This is the Blog module index page. Build something great!');
    });

    Route::resource('blogs','BlogsController');
    Route::get('blogs/{id}/destroy','BlogsController@destroy');
    Route::post('blogs/{id}/update','BlogsController@update');
    
});

// Route::group(['prefix' => 'backend'], function () {
//     Route::resource('blogs','BlogsController');
// });
Route::get('blog/blog','BlogsController@index');
