<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCaseAuthentication extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected $customHeaders;

    public function setUp(): void
    {
        parent::setUp();
        $user = new User([
            'name' => 'teste',
            'email' => 'test@email.com',
            'password' => '123456'
        ]);

        $user->save();

        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);

        $this->customHeaders = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ];
    }
}
