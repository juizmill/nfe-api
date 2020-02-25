<?php

namespace Tests\Feature;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Tests\TestCaseAuthentication;

class RolePermissionTest extends TestCaseAuthentication
{
    public function testStore()
    {
        $role = Role::query()->create([
            'name' => 'Teste',
            'Description' => 'description teste'
        ]);

        $permission = Permission::query()->create([
            'name' => 'Teste',
            'Description' => 'description teste'
        ]);

        $response = $this->json(
            Request::METHOD_POST,
            '/v1/role/permission/store',
            [
                'role' => $role->id,
                'permissions' => [$permission->id]
            ],
            $this->customHeaders
        );

        $response->assertStatus(201);
    }

    public function testDestroy()
    {
        $role = Role::query()->create([
            'name' => 'Teste',
            'Description' => 'description teste'
        ]);

        $permission = Permission::query()->create([
            'name' => 'Teste',
            'Description' => 'description teste'
        ]);

        $response = $this->json(
            'DELETE',
            '/v1/role/permission/destroy',
            [
                'role' => $role->id,
                'permissions' => [$permission->id]
            ],
            $this->customHeaders
        );

        $response->assertStatus(202);
    }
}
