<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use Tests\TestCaseAuthentication;

class UserRecoverPasswordTest extends TestCaseAuthentication
{
    public function testRecoverPasswordSuccess()
    {
        $response = $this->json(
            Request::METHOD_POST,
            '/v1/user/recover/password',
            [
                'email' => 'test@email.com'
            ]
        );

        $response->assertStatus(202);
    }

    public function testRecoverPasswordError()
    {
        $response = $this->json(
            Request::METHOD_POST,
            '/v1/user/recover/password',
            [
                'email' => 'email-error@email.com',
            ]
        );

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors' => [
                'email'
            ]
        ]);
    }
}
