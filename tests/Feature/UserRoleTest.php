<?php

namespace Tests\Feature;

use App\Role;
use App\Permission;
use App\User;
use Illuminate\Http\Request;
use Tests\TestCaseAuthentication;

class UserRoleTest extends TestCaseAuthentication
{
    public function testStore()
    {
        $role = Role::query()->create([
            'name' => 'Teste',
            'Description' => 'description teste'
        ]);

        $user = factory(User::class)->create();

        $response = $this->json(
            Request::METHOD_POST,
            '/v1/user/role/store',
            [
                'user' => $user->id,
                'roles' => [$role->id]
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

        $user = factory(User::class)->create();

        $response = $this->json(
            'DELETE',
            '/v1/user/role/destroy',
            [
                'user' => $user->id,
                'roles' => [$role->id]
            ],
            $this->customHeaders
        );

        $response->assertStatus(202);
    }
}
