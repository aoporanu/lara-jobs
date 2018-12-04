<?php

use Illuminate\Http\Request;

Route::post('login', 'AuthController@login')->name('api.user.login');

Route::post('register', 'API\UsersController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', function(Request $request) {
        return $request->user();
    });
    Route::get('/logout', 'AuthController@logout')->name('api.user.logout');
    Route::get('jobs', 'JobsController@index')->name('api.jobs.index');
    Route::get('job/{id}', 'JobsController@show')->name('api.jobs.show');
    Route::post('job/', 'JobsController@store')->name('api.jobs.store');
    Route::get('categories', 'CategoriesController@index')->name('api.categories.index');
    Route::put('job/', 'JobsController@store')->name('api.jobs.update');
    Route::delete('job/{id}', 'JobsController@destroy')->name('api.jobs.delete');
    Route::get('companies', 'CompanyController@index')->name('api.companies.index');
    Route::get('company/{id}', 'CompanyController@show')->name('api.companies.show');
    Route::get('details', 'API\UsersController@details')->name('api.user.details');
});
