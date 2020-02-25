<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Company
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'company'], function () {
    Route::get('/', 'CompanyController@index')
        ->name('company.index');

    Route::get('{id}/show', 'CompanyController@show')
        ->where('id', '[0-9]+')
        ->name('company.show');

    Route::post('store', 'CompanyController@store')
        ->name('company.store');

    Route::put('{id}/update', 'CompanyController@update')
        ->where('id', '[0-9]+')
        ->name('company.update');

    Route::delete('{id}/destroy', 'CompanyController@destroy')
        ->where('id', '[0-9]+')
        ->name('company.destroy');
});
