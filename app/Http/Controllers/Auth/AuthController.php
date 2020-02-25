<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['Successfully logged out']);
    }

    public function refresh()
    {
        try {
            $token = JWTAuth::parseToken()->refresh();
            return $this->respondWithToken($token);
        } catch (JWTException $exception) {
            return response()->json([$exception->getMessage()], 400);
        }
    }

    protected function respondWithToken($token)
    {
        /** @var \App\User $user */
        $user = auth('api')->user();

        $roles = collect($user->roles()->get())->map(function ($role) {
            return $role->name;
        });

        $permissions = collect(
            $user->roles()->with('permissions')->get()->pluck('permissions')->flatten()
        )->map(function ($permission) {
            return $permission->name;
        });

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at,
                'roles' => $roles,
                'permissions' => $permissions
            ]
        ]);
    }
}
