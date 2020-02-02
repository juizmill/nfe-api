<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', 'Auth\\AuthController@login')->name('api.login');
Route::post('/logout', 'Auth\\AuthController@logout')->name('api.logout');
Route::post('/refresh_token', 'Auth\\AuthController@refresh')->name('api.refresh');

Route::middleware('apiJwt')->group(function () {
    Route::group(['prefix' => 'company'], function () {
        Route::get('/', ['uses' => 'CompanyController@index'])->name('api.company.index');
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

    Route::group(['prefix' => 'customer'], function () {
        Route::group(['prefix' => 'physical'], function () {
            Route::get('/', ['uses' => 'CustomerPhysicalController@index'])->name('api.customer.physical.index');
            Route::get('{id}/show', ['uses' => 'CustomerPhysicalController@show'])->name('api.customer.physical.show');
            Route::post('store', ['uses' => 'CustomerPhysicalController@store'])->name('api.customer.physical.store');
            Route::put('{id}/update', ['uses' => 'CustomerPhysicalController@update'])->name('api.customer.physical.update');
            Route::delete('{id}/destroy', ['uses' => 'CustomerPhysicalController@destroy'])->name('api.customer.physical.destroy');
        });

        Route::group(['prefix' => 'juridical'], function () {
            Route::get('/', ['uses' => 'CustomerJuridicalController@index'])->name('api.customer.juridical.index');
            Route::get('{id}/show', ['uses' => 'CustomerJuridicalController@show'])->name('api.customer.juridical.show');
            Route::post('store', ['uses' => 'CustomerJuridicalController@store'])->name('api.customer.juridical.store');
            Route::put('{id}/update', ['uses' => 'CustomerJuridicalController@update'])->name('api.customer.juridical.update');
            Route::delete('{id}/destroy', ['uses' => 'CustomerJuridicalController@destroy'])->name('api.customer.juridical.destroy');
        });
    });
});
