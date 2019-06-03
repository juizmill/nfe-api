<?php

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


Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => 'client-id',
        'redirect_uri' => env('APP_URL').'/callback',
        'response_type' => 'code',
        'scope' => 'place-orders check-status',
    ]);

    return redirect(env('APP_URL').'/oauth/authorize?'.$query);
});



Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');

    Route::group(['prefix' => 'company'], function () {
        Route::post('store', ['uses' => 'CompanyController@store'])->name('api.company.store');
        Route::post('show', ['uses' => 'CompanyController@show'])->name('api.company.show');
        Route::put('update', ['uses' => 'CompanyController@update'])->name('api.company.update');
        Route::delete('destroy', ['uses' => 'CompanyController@destroy'])->name('api.company.destroy');
    });

});


