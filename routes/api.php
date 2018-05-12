<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
   Route::post('/', 'AuthenticationController@login');
});

Route::group(['prefix' => 'faculties', 'middleware' => 'auth'], function () {
    Route::post('/', 'AuthenticationController@register');
});

Route::group(['prefix' => 'students', 'middleware' => 'auth'], function () {
   Route::get('/', 'StudentsController@readAll');
   Route::get('/:id', 'StudentsController@read');
   Route::post('/', 'StudentsController@create');
   Route::put('/:id', 'StudentsController@update');
   Route::delete('/:id', 'StudentsController@delete');
});