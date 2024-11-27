<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            // Retrieve the token from the session (for web) or from the Authorization header (for API)
            $token = $request->session()->get('token') ?? $request->bearerToken();

            if (!$token) {
                return redirect()->route('/');
                // return response()->json(['error' => 'Unauthorized'], 401);
            }

            JWTAuth::setToken($token);
            // $user = JWTAuth::parseToken()->authenticate();
            $payload = JWTAuth::getPayload();
            $userId = $payload['sub'];
            if (!$payload) {
                return redirect()->route('/');
                // return response()->json(['error' => 'Unauthorized'], 401);
            }

            $user = User::findOrFail($userId);
            // $user = JWTAuth::user();
            // info($user);
            if ($user) {
                // Set the user in the Auth facade
                auth()->setUser($user);
            }



        } catch (JWTException $e) {
            return redirect()->route('/');
            // return response()->json(['error' => 'Token invalid'], 401);
        }

        return $next($request);
    }
}
