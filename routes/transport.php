<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Transport
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'transport'], function () {
    Route::get('/', 'TransportController@index')
        ->name('transport.index');

    Route::get('{id}/show', 'TransportController@show')
        ->where('id', '[0-9]+')
        ->name('transport.show');

    Route::post('store', 'TransportController@store')
        ->name('transport.store');

    Route::put('{id}/update', 'TransportController@update')
        ->where('id', '[0-9]+')
        ->name('transport.update');

    Route::delete('{id}/destroy', 'TransportController@destroy')
        ->where('id', '[0-9]+')
        ->name('transport.destroy');
});
