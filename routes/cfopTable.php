<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CFOP Table
|--------------------------------------------------------------------------
*/
Route::prefix('/cfop')->group(function () {
    Route::get('/', 'CfopTableController@index')
        //->middleware('can:cfopTable.index')
        ->name('cfopTable.index');
});
