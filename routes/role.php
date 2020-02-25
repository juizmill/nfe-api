<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Roles
|--------------------------------------------------------------------------
*/
Route::prefix('/role')->group(function () {
    Route::get('/', 'RoleController@index')
        //->middleware('can:role.index')
        ->name('role.index');

    Route::get('{id}/show', 'RoleController@show')
        ->where(['id' => '[0-9]+'])
        //->middleware('can:role.show')
        ->name('role.show');

    Route::post('store', 'RoleController@store')
        //->middleware('can:role.store')
        ->name('role.store');

    Route::put('{id}/update', 'RoleController@update')
        ->where(['id' => '[0-9]+'])
        //->middleware('can:role.update')
        ->name('role.update');

    Route::delete('{id}/destroy', 'RoleController@destroy')
        ->where(['id' => '[0-9]+'])
        //->middleware('can:role.destroy')
        ->name('role.destroy');
});

/*
|--------------------------------------------------------------------------
| Role Permission
|--------------------------------------------------------------------------
*/
Route::prefix('/role/permission')->group(function () {
    Route::post('store', 'RolePermissionController@store')
        //->middleware('can:role.permission.store')
        ->name('role.permission.store');

    Route::delete('delete', 'RolePermissionController@destroy')
        //->middleware('can:role.permission.destroy')
        ->name('role.permission.destroy');
});
