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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function (){

    Route::get('/roles', 'RoleController@index');
    Route::post('/roles', 'RoleController@store');
    Route::post('/roles/{id}', 'RoleController@update');
    Route::delete('/roles/{id}', 'RoleController@destroy');

    Route::get('/users', 'UserController@index');
    Route::post('/users', 'UserController@store');
    Route::post('/users/{id}', 'UserController@update');
    Route::delete('/users/{id}', 'UserController@destroy');

});