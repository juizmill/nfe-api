<?php

use App\Http\Requests\CustomerPhysicalRequest;
use Illuminate\Http\Request;

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

Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');

    Route::group(['prefix' => 'company'], function () {
        Route::post('store', ['uses' => 'CompanyController@store'])->name('api.company.store');
        Route::post('show', ['uses' => 'CompanyController@show'])->name('api.company.show');
        Route::put('update', ['uses' => 'CompanyController@update'])->name('api.company.update');
        Route::delete('destroy', ['uses' => 'CompanyController@destroy'])->name('api.company.destroy');
    });

    Route::group(['prefix' => 'customer'], function () {
        Route::group(['prefix' => 'physical'], function () {
            Route::post('store', ['uses' => 'CustomerPhysicalController@store'])->name('api.customer.physical.store');
            Route::post('show', ['uses' => 'CustomerPhysicalController@show'])->name('api.customer.physical.show');
            Route::put('update', ['uses' => 'CustomerPhysicalController@update'])->name('api.customer.physical.update');
            Route::delete('destroy', ['uses' => 'CustomerPhysicalController@destroy'])->name('api.customer.physical.destroy');
        });

        Route::group(['prefix' => 'juridical'], function () {
            Route::post('store', ['uses' => 'CustomerJuridicalController@store'])->name('api.customer.juridical.store');
            Route::post('show', ['uses' => 'CustomerJuridicalController@show'])->name('api.customer.juridical.show');
            Route::put('update', ['uses' => 'CustomerJuridicalController@update'])->name('api.customer.juridical.update');
            Route::delete('destroy', ['uses' => 'CustomerJuridicalController@destroy'])->name('api.customer.juridical.destroy');
        });
    });

});


