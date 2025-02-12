<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Exceptions\AuthorizationException;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user || !$user->hasRole('admin')) {
                throw new AuthorizationException('Access denied.');
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Unauthorized access'], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
    
}
