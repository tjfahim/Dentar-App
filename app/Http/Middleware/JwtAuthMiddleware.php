<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        // Retrieve the token from the Authorization header
        // $token = $request->bearerToken();

        // Check for a custom header if the token is not found
        // if (!$token) {
            $token = $request->header('X-Authorization');
            // if ($token) {
            //     // Strip "Bearer" if it exists
            //     $token = str_replace('Bearer ', '', $token);
            // }
        // }

        // Check if token exists
        if ($token) {
            try {
                // Set the token in JWTAuth
                JWTAuth::setToken($token);
                Auth::setToken($token);
                $user = JWTAuth::authenticate($token);
                if($user->status == null || $user->status == 0){
                    Auth::logout();
                    JWTAuth::invalidate($token);
                    return response()->json(['error' => 'Verify user email'], 403);
                }
                // Attempt to authenticate the user
                // $user = JWTAuth::authenticate($token);

                // if ($user) {
                //     // Set the authenticated user in the request for later use
                //     Auth::login($user);
                // } else {
                //     return response()->json(['error' => 'User not found'], 404);
                // }
            } catch (JWTException $e) {
                return response()->json(['error' => 'Token is not provided'], 401);
            } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                return response()->json(['error' => 'Token expired'], 401);
            } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                return response()->json(['error' => 'Token is invalid'], 401);
            }
        } else {
            return response()->json(['error' => 'Token not found'], 401);
        }

        return $next($request);
    }
}
