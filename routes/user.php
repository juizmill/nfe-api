<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/
Route::prefix('/user')->group(function () {
    Route::get('/', 'UserController@index')
        ->middleware('can:user.index')
        ->name('user.index');

    Route::get('{id}/show', 'UserController@show')
        ->where(['id' => '[0-9]+'])
        ->middleware('can:user.show')
        ->name('user.show');

    Route::put('{id}/update', 'UserController@update')
        ->where(['id' => '[0-9]+'])
        ->middleware('can:user.update')
        ->name('user.update');

    Route::delete('{id}/delete', 'UserController@destroy')
        ->where(['id' => '[0-9]+'])
        ->middleware('can:user.destroy')
        ->name('user.destroy');

    Route::put('/password/{id}/update', 'UserHandlePasswordController@update')
        ->where(['id' => '[0-9]+'])
        ->middleware('can:user.handle.password.update')
        ->name('user.handle.password.update');
});

/*
|--------------------------------------------------------------------------
| User Role
|--------------------------------------------------------------------------
*/
Route::prefix('/user/role')->group(function () {
    Route::post('store', 'UserRoleController@store')
        //->middleware('can:user.role.store')
        ->name('user.role.store');

    Route::delete('destroy', 'UserRoleController@destroy')
        //->middleware('can:user.role.destroy')
        ->name('user.role.destroy');
});
