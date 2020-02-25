<?php

use App\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        collect(Route::getRoutes()->get())->map(function ($route) {
            $ignorePermissions = [
                'api.login',
                'api.logout',
                'api.refresh',
                'user.handle.recover.password',
                'user.handle.reset.password'
            ];
            $permission = $route->getAction('as');
            if (!in_array($permission, $ignorePermissions)) {
                Permission::create([
                    'name' => $permission
                ]);
            }
        });
    }
}
