<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Product
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'product'], function () {
    Route::get('/', 'ProductController@index')
        ->name('api.product.index');

    Route::get('{id}/show', 'ProductController@show')
        ->where('id', '[0-9]+')
        ->name('api.product.show');

    Route::post('store', 'ProductController@store')
        ->name('api.product.store');

    Route::put('{id}/update', 'ProductController@update')
        ->where('id', '[0-9]+')
        ->name('api.product.update');

    Route::delete('{id}/destroy', 'ProductController@destroy')
        ->where('id', '[0-9]+')
        ->name('api.product.destroy');
});
