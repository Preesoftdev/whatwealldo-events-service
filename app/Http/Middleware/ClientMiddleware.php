<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Traits\ResponseMethodTrait;
use App\Exceptions\AuthorizationException;
use Symfony\Component\HttpFoundation\Response;


class ClientMiddleware
{
    use ResponseMethodTrait;

    public function handle(Request $request, Closure $next): Response
    {
        
        try {
            $user = JWTAuth::parseToken()->authenticate();
            
            if (!$user || !$user->hasRole('client')) {
                throw new AuthorizationException('Access denied.');
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Unauthorized access'], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
