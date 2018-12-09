<?php

use Illuminate\Http\Request;

Route::post('login', 'AuthController@login')->name('api.user.login');

Route::post('register', 'AuthController@register');
Route::resource('jobs', 'JobsController');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', function(Request $request) {
        return $request->user();
    });
    Route::get('logout', 'AuthController@logout')->name('api.user.logout');
    Route::get('details', 'API\UsersController@details')->name('api.user.details');
    Route::resource('companies', 'CompanyController');
    Route::resource('cities', 'CityController');
});
Route::resource('categories', 'CategoriesController');
Route::get('category/{category}/jobs', 'CategoriesController@index')->name('category.jobs');
Route::get('companies/{company}/jobs', 'CompanyController@index')->name('company.jobs');
