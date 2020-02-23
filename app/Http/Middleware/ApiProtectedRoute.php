<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class ApiProtectedRoute extends BaseMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
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
