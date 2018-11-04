<?php

Route::get('jobs', 'JobsController@index')->middleware('auth:api');

Route::get('job/{id}', 'JobsController@show');

Route::post('job/', 'JobsController@store');

Route::put('job/', 'JobsController@store');

Route::delete('job/{id}', 'JobsController@destroy');

Route::get('companies', 'CompanyController@index');

Route::get('company/{id}', 'CompanyController@show');

Route::get('categories', 'CategoriesController@index');

Route::post('login', 'API\UsersController@login');

Route::post('register', 'API\UsersController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('details', 'API\UsersController@details');
});
