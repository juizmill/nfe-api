<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::post('/login', 'Auth\\AuthController@login')->name('api.login');
Route::post('/logout', 'Auth\\AuthController@logout')->name('api.logout');
Route::post('/refresh_token', 'Auth\\AuthController@refresh')->name('api.refresh');

Route::post('/user/recover/password', 'UserHandlePasswordController@recoverPassword')
    ->name('user.handle.recover.password');

Route::post('/user/reset/password', 'UserHandlePasswordController@resetPassword')
    ->name('user.handle.reset.password');

Route::post('/user/store', 'UserController@store')
    ->name('user.store');

Route::group(['middleware' => ['apiJwt']], function () {
    $files = Storage::disk('routes')->files();
    $ignoreFiles = ['api.php', 'channels.php', 'console.php', 'web.php'];
    foreach ($files as $file) {
        if (!in_array($file, $ignoreFiles)) {
            $fileInclude = base_path(sprintf('routes/%s', $file));
            include $fileInclude;
        }
    }
});
