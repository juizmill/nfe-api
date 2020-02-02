<?php

namespace App\Providers;

use App\Permission;
use App\User;
use App\Policies\PermissionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => PermissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::before(function (User $user, $ability) {
        //     return $user->isSuperAdmin() === true ? true : null;
        // });

        // $permissions = Permission::with('roles')->get();

        // foreach ($permissions as $permission) {
        //     /** @var Permission $permission */
        //     Gate::define($permission->name, function (User $user) use ($permission) {
        //         return $user->hasPermission($permission);
        //     });
        // }
    }
}
