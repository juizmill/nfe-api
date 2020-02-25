<?php

namespace App\Providers;

use App\User;
use App\Permission;
use App\Policies\PermissionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissions = Permission::query()->with('roles')->get();
        foreach ($permissions as $permission) {
            /** @var Permission $permission */
            Gate::define($permission->name, function (User $user) use ($permission) {
                return $user->hasPermission($permission);
            });

            Gate::before(function (User $user) {
                if ($user->hasSuperUser() === true) {
                    return true;
                }
            });
        }
    }
}
