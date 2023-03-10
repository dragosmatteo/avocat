<?php

namespace App\Http\Middleware;

use Closure;

class CacheControl
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->header('Cache-Control', 'no-cache, must-revalidate');
        // $response->header('Cache-Control', 'max-age=100');

        return $response;
    }
}
