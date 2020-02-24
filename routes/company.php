<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Company
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'company'], function () {
    Route::get('/', ['uses' => 'CompanyController@index'])
    ->name('api.company.index');

    Route::get('{id}/show', ['uses' => 'CompanyController@show'])
        ->where('id', '[0-9]+')
        ->name('api.company.show');

    Route::post('store', ['uses' => 'CompanyController@store'])->name('api.company.store');
    Route::put('{id}/update', ['uses' => 'CompanyController@update'])
        ->where('id', '[0-9]+')
        ->name('api.company.update');

    Route::delete('{id}/destroy', ['uses' => 'CompanyController@destroy'])
        ->where('id', '[0-9]+')
        ->name('api.company.destroy');
});
