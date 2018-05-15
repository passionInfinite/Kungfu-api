<?php

use Illuminate\Http\Request;
use KungFu\Http\Middleware\Authenticated;

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

Route::group(['prefix' => 'faculties', 'middleware' => Authenticated::class], function () {
    Route::post('/', 'AuthenticationController@register');
    Route::get('/', 'FacultiesController@readAll');
    Route::get('/{id}', 'FacultiesController@read');
    Route::put('/{id}', 'FacultiesController@update');
    Route::delete('/{id}', 'FacultiesController@delete');
});

Route::group(['prefix' => 'students', 'middleware' => Authenticated::class], function () {
   Route::get('/', 'StudentsController@readAll');
   Route::get('/{id}', 'StudentsController@read');
   Route::post('/', 'StudentsController@create');
   Route::put('/{id}', 'StudentsController@update');
   Route::delete('/{id}', 'StudentsController@delete');
});

Route::group(['prefix' => 'sales', 'middleware' => Authenticated::class], function () {
    Route::post('/', 'SalesController@create');
    Route::get('/', 'SalesController@readAll');
    Route::get('/{id}', 'SalesController@readById');
    Route::get('/student/{id}', 'SalesController@read');
    Route::delete('/{id}', 'SalesController@delete');
});

Route::group(['prefix' => 'levels', 'middleware' => Authenticated::class], function () {
    Route::post('/', 'LevelsController@create');
    Route::get('/', 'LevelsController@readAll');
    Route::get('/{id}', 'LevelsController@read');
    Route::put('/{id}', 'LevelsController@update');
    Route::delete('/{id}', 'LevelsController@delete');
});

Route::group(['prefix' => 'batches', 'middleware' => Authenticated::class], function () {
    Route::post('/', 'BatchesController@create');
    Route::get('/', 'BatchesController@readAll');
    Route::get('/{id}', 'BatchesController@read');
    Route::put('/{id}', 'BatchesController@update');
    Route::delete('/{id}', 'BatchesController@delete');
});

Route::group(['prefix' => 'ranks', 'middleware' => Authenticated::class], function () {
    Route::post('/', 'RanksController@create');
    Route::get('/', 'RanksController@readAll');
    Route::get('/{id}', 'RanksController@read');
    Route::put('/{id}', 'RanksController@update');
    Route::delete('/{id}', 'RanksController@delete');
});

Route::group(['prefix' => 'attendance', 'middleware' => Authenticated::class], function () {
    Route::post('/', 'AttendanceController@create');
    Route::get('/', 'AttendanceController@readAll');
    Route::get('/{id}', 'AttendanceController@read');
    Route::put('/{id}', 'AttendanceController@update');
    Route::delete('/{id}', 'AttendanceController@delete');
});

Route::group(['prefix' => 'progress', 'middleware' => Authenticated::class], function () {
    Route::post('/', 'ProgressController@create');
    Route::get('/', 'ProgressController@readAll');
    Route::get('/{id}', 'ProgressController@read');
    Route::put('/{id}', 'ProgressController@update');
    Route::delete('/{id}', 'ProgressController@delete');
});
