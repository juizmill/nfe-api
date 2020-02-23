<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use Tests\TestCaseAuthentication;

class LoginUserTest extends TestCaseAuthentication
{
    public function testLoginSuccess()
    {
        $response = $this->json(
            Request::METHOD_POST,
            '/v1/login',
            [
                'email' => self::USER_EMAIL,
                'password' => 'password'
            ]
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in',
            'user',
        ]);
    }

    public function testLoginError()
    {
        $response = $this->json(
            Request::METHOD_POST,
            '/v1/login',
            [
                'email' => 'email-error@email.com',
                'password' => 'password-error'
            ]
        );

        $response->assertStatus(401);
        $response->assertJsonStructure([
            'error'
        ]);
    }
}
