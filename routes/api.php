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

Route::get('jobs', 'JobsController@index');

Route::get('job/{id}', 'JobsController@show');

Route::post('job/', 'JobsController@store');

Route::put('job/', 'JobsController@store');

Route::delete('job/{id}', 'JobsController@destroy');

Route::get('companies', 'CompanyController@index');

Route::get('company/{id}', 'CompanyController@show');

Route::get('categories', 'CategoriesController@index');

Route::get('getcv', 'UserController@getCV');
