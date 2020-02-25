<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'customer'], function () {
    Route::get('/', 'CustomerController@index')
        ->name('customer.index');

    Route::get('{id}/show', 'CustomerController@show')
        ->where(['id' => '[0-9]+'])
        ->name('customer.show');

    Route::post('store', 'CustomerController@store')
        ->name('customer.store');

    Route::put('{id}/update', 'CustomerController@update')
        ->where(['id' => '[0-9]+'])
        ->name('customer.update');

    Route::delete('{id}/destroy', 'CustomerController@destroy')
        ->where(['id' => '[0-9]+'])
        ->name('customer.destroy');
});
