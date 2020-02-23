<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\Request;

class CreateUserTest extends TestCase
{
    public function testStore()
    {
        $response = $this->json(
            Request::METHOD_POST,
            '/v1/user/store',
            [
                'name' => 'test phpunit',
                'email' => 'emailteste@gmail.com',
                'password' => '12345'
            ]
        );

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id',
            'name',
            'email',
            'created_at',
            'updated_at'
        ]);
    }

    public function testStoreErrorValidation()
    {
        $response = $this->json(
            'POST',
            '/v1/user/store',
            [
                'name' => '',
                'email' => '',
                'password' => ''
            ]
        );

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors' => [
                'name',
                'email',
                'password'
            ]
        ]);
    }
}
