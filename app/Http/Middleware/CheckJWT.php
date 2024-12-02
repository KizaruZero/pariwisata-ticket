<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class CheckJWT
{
    public function handle($request, Closure $next)
    {
        // if (app()->environment('testing')) {
        //     return $next($request);
        // }
        try {
            if ($request->hasCookie('jwt_token')) {
                $token = $request->cookie('jwt_token');
                // Set token ke header Authorization
                $request->headers->set('Authorization', 'Bearer ' . $token);

                // Verifikasi token JWT
                $user = JWTAuth::parseToken()->authenticate();

                if (!$user) {
                    return response()->json(['message' => 'User not found'], 401);
                }
            } else {
                return response()->json(['message' => 'Authorization token not found'], 401);
            }
        } catch (\Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json(['message' => 'Token is invalid'], 401);
            } else if ($e instanceof TokenExpiredException) {
                return response()->json(['message' => 'Token has expired'], 401);
            } else {
                return response()->json(['message' => 'Authorization token not found'], 401);
            }
        }

        return $next($request);
    }

}