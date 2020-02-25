<?php

namespace Tests\Feature;

use App\Role;
use Illuminate\Http\Request;
use Tests\TestCaseAuthentication;

class RoleTest extends TestCaseAuthentication
{
    public function testIndex()
    {
        $response = $this->json(
            Request::METHOD_GET,
            '/v1/role',
            [],
            $this->customHeaders
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'current_page',
            'data',
            'first_page_url',
            'from',
            'last_page',
            'last_page_url',
            'next_page_url',
            'path',
            'per_page',
            'prev_page_url',
            'to',
            'total'
        ]);
    }

    public function testStore()
    {
        $response = $this->json(
            Request::METHOD_POST,
            '/v1/role/store',
            [
                'name' => 'Teste',
                'description' => 'description roles'
            ],
            $this->customHeaders
        );

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'name',
            'description',
            'id'
        ]);
    }

    public function testStoreErrorValidation()
    {
        $response = $this->json(
            'POST',
            '/v1/role/store',
            [],
            $this->customHeaders
        );

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors' => [
                'name'
            ]
        ]);
    }

    public function testUpdate()
    {
        $role = Role::query()->create([
            'name' => 'Teste',
            'Description' => 'description teste'
        ]);

        $response = $this->json(
            Request::METHOD_PUT,
            "/v1/role/{$role->id}/update",
            [
                'name' => 'Update Teste',
                'description' => 'description roles'
            ],
            $this->customHeaders
        );

        $response->assertStatus(202);
        $response->assertJsonStructure([
            'name',
            'description',
            'id'
        ]);
    }

    public function testUpdateErrorValidation()
    {
        $response = $this->json(
            Request::METHOD_PUT,
            '/v1/role/100/update',
            [
                'name' => 'Update Teste',
                'description' => 'description roles'
            ],
            $this->customHeaders
        );

        $response->assertStatus(406);
    }

    public function testDestroySuccess()
    {
        $role = Role::query()->create([
            'name' => 'Teste',
            'Description' => 'description teste'
        ]);

        $response = $this->json(
            Request::METHOD_DELETE,
            "/v1/role/{$role->id}/destroy",
            [],
            $this->customHeaders
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'name'
        ]);
    }

    public function testDestroyReturnError()
    {
        $response = $this->json(
            Request::METHOD_DELETE,
            "/v1/role/100/destroy",
            [],
            $this->customHeaders
        );

        $response->assertStatus(404);
    }
}
