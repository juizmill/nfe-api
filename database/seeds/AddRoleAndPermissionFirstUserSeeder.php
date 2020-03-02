<?php

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Database\Seeder;

class AddRoleAndPermissionFirstUserSeeder extends Seeder
{
    public function run()
    {
        /** @var User $user */
        $user = User::query()->first();

        /** @var Role $role */
        $role = Role::query()->first();
        $permissions = Permission::all();

        $role->permissions()->attach($permissions);
        $user->roles()->attach($role);
    }
}
