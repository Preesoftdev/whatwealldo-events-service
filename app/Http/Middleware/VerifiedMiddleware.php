<?php

namespace App\Http\Middleware;

use App\Traits\ResponseMethodTrait;
use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class VerifiedMiddleware
{
    use ResponseMethodTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Retrieve the token from the Authorization header
        $token = $request->bearerToken();
        \Log::info('Authorization Token:', ['token' => $token]);
        // Check if the token is present
      //  $user = JWTAuth::parseToken()->authenticate();
        if (!$token) {
            \Log::error('JWT Error: Token not provided', ['request' => $request->all()]);
            return $this->sendResponse(null, 'Token not provided', 400);
        }

        \Log::info('JWT Token provided', ['token' => $token]);

        try {
            // Validate and decode the token
            $payload = JWTAuth::setToken($token)->getPayload();

            // Log the decoded JWT payload (Optional, ensure this doesn't log sensitive data)
            \Log::info('JWT Payload decoded', ['payload' => $payload->toArray()]);
        } catch (TokenExpiredException $e) {
            \Log::error('JWT Error: Token expired', ['exception' => $e->getMessage()]);
            return $this->sendError('Token expired');
        } catch (TokenInvalidException $e) {
            \Log::error('JWT Error: Token invalid', ['exception' => $e->getMessage()]);
            return $this->sendError('Token invalid');
        } catch (JWTException $e) {
            \Log::error('JWT Error: Could not parse token', ['exception' => $e->getMessage()]);
            return $this->sendError('Could not parse token');
        } catch (\Exception $e) {
            \Log::error('Unexpected error during JWT validation', ['exception' => $e->getMessage()]);
            return $this->sendError('An error occurred');
        }
        /////////////////////////////

        $user = $this->getUserfromOtherServices($payload);
         // Check if the returned value contains an error, and handle it
        if (isset($user['error'])) {
        // Return the error response using your sendError method
           return $this->sendError($user['error']);  // Make sure you return status too
        }
        // If everything goes well, proceed to the next middleware or controller
        return $next($request);
    }
    private function getUserfromOtherServices($payload)
    {
        try {
            $userId = $payload->get('sub');
            $baseUrl = env('APP_INTERNAL_LINK', 'http://127.0.0.1:8001');
    
            \Log::info('Requesting user info', ['baseUrl' => $baseUrl, 'userId' => $userId]);
    
            $response = Http::get("{$baseUrl}/api/users/{$userId}");
            \Log::info('User response', ['response' => $response]);
            if ($response->successful()) {
                $user = $response->json();
                \Log::info('User info', ['email_verified_at' => $user['data']['email_verified_at'], 'userId' => $userId]);

                if (!isset($user['data']) || empty($user['data']['email_verified_at'])) {
                    \Log::error('Missing email verification info', ['user' => $user]);
                    // Return an error flag or message instead of response directly
                    return ['error' => 'User email is not verified']; 
                }
    
                Session::put('user_info', $user);
                return $user;
            } else {
                return ['error' => 'User not found', 'status' => 404];
            }
        } catch (JWTException $e) {
            return ['error' => 'Token invalid or expired', 'status' => 401];
        } catch (\Exception $e) {
            return ['error' => 'An error occurred while fetching user data', 'status' => 500];
        }
    }
}
