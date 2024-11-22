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
        try {
            // First check cookie
            if ($token = $request->cookie('jwt_token')) {
                JWTAuth::setToken($token);
                $user = JWTAuth::authenticate();
            }
            // Then check Authorization header
            else {
                $user = JWTAuth::parseToken()->authenticate();
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['error' => 'Token expired'], 401);
        } catch (TokenInvalidException $e) {
            return response()->json(['error' => 'Token invalid'], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Token not found'], 401);
        }

        return $next($request);
    }
}