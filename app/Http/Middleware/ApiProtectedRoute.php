<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Illuminate\Auth\Access\AuthorizationException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class ApiProtectedRoute extends BaseMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            $isAuthenticate = JWTAuth::parseToken()->authenticate();
            if (!$isAuthenticate) {
                throw new AuthorizationException("User not authorization");
            }
        } catch (\Exception $exception) {
            if ($exception instanceof TokenInvalidException) {
                return response()->json(['Token is Invalid'], 403);
            } elseif ($exception instanceof TokenExpiredException) {
                return response()->json(['Token is Expired'], 403);
            }

            return response()->json(['Authorization Token not found'], 403);
        }

        return $next($request);
    }
}
