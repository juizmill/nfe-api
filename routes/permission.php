<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Permission
|--------------------------------------------------------------------------
*/
Route::prefix('/permission')->group(function () {
    Route::get('/', 'PermissionController@index')
        //->middleware('can:permission.index')
        ->name('permission.index');

    Route::get('{id}/show', 'PermissionController@show')
        ->where(['id' => '[0-9]+'])
        //->middleware('can:permission.show')
        ->name('permission.show');

    Route::post('store', 'PermissionController@store')
        //->middleware('can:permission.store')
        ->name('permission.store');

    Route::put('{id}/update', 'PermissionController@update')
        ->where(['id' => '[0-9]+'])
        //->middleware('can:permission.update')
        ->name('permission.update');

    Route::delete('{id}/destroy', 'PermissionController@destroy')
        ->where(['id' => '[0-9]+'])
        //->middleware('can:permission.destroy')
        ->name('permission.destroy');
});
