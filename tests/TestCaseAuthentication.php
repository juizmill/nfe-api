<?php

namespace Tests;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCaseAuthentication extends BaseTestCase
{
    const USER_NAME = 'teste';
    const USER_EMAIL = 'test@email.com';
    const USER_PASSWORD = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
    const USER_TOKEN = '8kA0qddu8B7AVO2d5e52cc6e0a21e';

    use CreatesApplication;
    use RefreshDatabase;

    protected $user;
    protected $customHeaders;

    public function setUp(): void
    {
        parent::setUp();
        $user = new User([
            'name' => self::USER_NAME,
            'email' => self::USER_EMAIL,
            'password' => self::USER_PASSWORD,
            'token' => self::USER_TOKEN
        ]);

        $user->save();

        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);

        $this->user = $user;
        $this->customHeaders = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ];
    }
}
