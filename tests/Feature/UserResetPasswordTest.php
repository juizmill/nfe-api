<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use Tests\TestCaseAuthentication;

class UserResetPasswordTest extends TestCaseAuthentication
{
    public function testRecoverPasswordSuccess()
    {
        $response = $this->json(
            Request::METHOD_POST,
            '/v1/user/reset/password',
            [
                'password' => '12345',
                'password_confirmation' => '12345',
                'token' => self::USER_TOKEN
            ]
        );

        $response->assertStatus(202);
    }

    public function testRecoverPasswordError()
    {
        $response = $this->json(
            Request::METHOD_POST,
            '/v1/user/reset/password',
            [
                'password' => '123456',
                'password_confirmation' => '12345',
                'token' => 'token_error'
            ]
        );

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors' => [
                'password',
                'token'
            ]
        ]);
    }
}
