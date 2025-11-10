<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiException;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {
        if ( !$request->expectsJson() ) {
            
            throw ApiException::notAcceptable("The 'Accept' header must include 'application/json'");

        }

        $apiKey = $request->bearerToken();

        if ( empty($apiKey) ) {

            throw ApiException::unauthorized();

        }

        if ( $apiKey !== env('API_KEY') ) {

            throw ApiException::unauthorized();

        }

        return $next($request);
    }
}
