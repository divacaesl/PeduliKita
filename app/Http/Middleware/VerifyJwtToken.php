<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\JwtService;

class VerifyJwtToken
{
    protected $jwtService;

    public function __construct(JwtService $jwtService)
    {
        $this->jwtService = $jwtService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Token not provided.'], 401);
        }

        $payload = $this->jwtService->verifyToken($token);

        if (!$payload) {
            return response()->json(['message' => 'Invalid or expired token.'], 401);
        }

        // Add user info to request if needed
        $request->attributes->set('jwt_payload', $payload);

        return $next($request);
    }
}
