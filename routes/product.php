<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Product
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'product'], function () {
    Route::get('/', 'ProductController@index')
        ->name('product.index');

    Route::get('{id}/show', 'ProductController@show')
        ->where('id', '[0-9]+')
        ->name('product.show');

    Route::post('store', 'ProductController@store')
        ->name('product.store');

    Route::put('{id}/update', 'ProductController@update')
        ->where('id', '[0-9]+')
        ->name('product.update');

    Route::delete('{id}/destroy', 'ProductController@destroy')
        ->where('id', '[0-9]+')
        ->name('product.destroy');
});
