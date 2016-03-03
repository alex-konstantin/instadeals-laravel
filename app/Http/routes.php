<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/proxy', ['as' => 'proxy', 'uses' => 'IndexController@index']);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'IndexController@index');

    Route::group(['middleware' => 'auth'], function () {
        Route::group(['namespace' => 'Instadeal'], function () {
            Route::get('/instadeal/list', 'InstadealController@index');

            Route::get('/instadeal/update/id/{id}', 'InstadealController@edit');
            Route::post('/instadeal/update', 'InstadealController@update');

            Route::get('/instadeal/create', 'InstadealController@create');
            Route::post('/instadeal/create', 'InstadealController@store');

            Route::get('/instadeal/delete/id/{id}', 'InstadealController@delete');
        });

        Route::group(['namespace' => 'User'], function () {
            Route::get('/user/list', 'UserController@index');

            Route::get('/user/update/id/{id}', 'UserController@edit');
            Route::post('/user/update', 'UserController@update');

            Route::get('/user/create', 'UserController@create');
            Route::post('/user/create', 'UserController@store');
        });
    });

    Route::any('/{any}', function ($any) {
        return Redirect::route('proxy',['deal'=>$any]);
    })->where('any', '.*');

});