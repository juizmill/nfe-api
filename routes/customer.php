<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'customer'], function () {
    Route::group(['prefix' => 'physical'], function () {
        Route::get('/', ['CustomerPhysicalController@index'])
            ->name('api.customer.physical.index');
        Route::get('{id}/show', ['CustomerPhysicalController@show'])
            ->where(['id' => '[0-9]+'])
            ->name('api.customer.physical.show');
        Route::post('store', ['CustomerPhysicalController@store'])
            ->name('api.customer.physical.store');
        Route::put('{id}/update', ['CustomerPhysicalController@update'])
            ->where(['id' => '[0-9]+'])
            ->name('api.customer.physical.update');
        Route::delete('{id}/destroy', ['CustomerPhysicalController@destroy'])
            ->where(['id' => '[0-9]+'])
            ->name('api.customer.physical.destroy');
    });

    Route::group(['prefix' => 'juridical'], function () {
        Route::get('/', ['CustomerJuridicalController@index'])
            ->name('api.customer.juridical.index');
        Route::get('{id}/show', ['CustomerJuridicalController@show'])
            ->where(['id' => '[0-9]+'])
            ->name('api.customer.juridical.show');
        Route::post('store', ['CustomerJuridicalController@store'])
            ->name('api.customer.juridical.store');
        Route::put('{id}/update', ['CustomerJuridicalController@update'])
            ->where(['id' => '[0-9]+'])
            ->name('api.customer.juridical.update');
        Route::delete('{id}/destroy', ['CustomerJuridicalController@destroy'])
            ->where(['id' => '[0-9]+'])
            ->name('api.customer.juridical.destroy');
    });
});
