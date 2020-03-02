<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Transport
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'transport/vehicle'], function () {
    Route::get('/', 'VehicleController@index')
        ->name('transport.index');

    Route::get('{id}/show', 'VehicleController@show')
        ->where('id', '[0-9]+')
        ->name('transport.show');

    Route::post('store', 'VehicleController@store')
        ->name('transport.store');

    Route::put('{id}/update', 'VehicleController@update')
        ->where('id', '[0-9]+')
        ->name('transport.update');

    Route::delete('{id}/destroy', 'VehicleController@destroy')
        ->where('id', '[0-9]+')
        ->name('transport.destroy');
});
