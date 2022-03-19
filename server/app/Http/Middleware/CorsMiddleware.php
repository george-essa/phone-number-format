<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
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
        $allowed_domains = ['http://localhost:3000', 'http://3.124.242.31'];
        if (in_array($_SERVER['HTTP_ORIGIN'], $allowed_domains)) {
            $domain = $_SERVER['HTTP_ORIGIN'];
        }
        $headers = [
            'Access-Control-Allow-Origin'      => [$domain],
            'Access-Control-Allow-Methods'     => 'POST, GET, OPTIONS, PUT, DELETE',

            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Max-Age'           => '86400',
            'Access-Control-Allow-Headers'     => 'Content-Type, Authorization, X-Requested-With',
            'x-content-type-options'           => 'nosniff',
            'x-frame-options'                  => 'sameorigin',
            'x-xss-protection'                 => '1; mode=block',
            'Strict-Transport-Security'                 => microtime(true),
        ];

        if ($request->isMethod('OPTIONS')) {
            return response()->json('{"method":"OPTIONS"}', 200, $headers);
        }
        $response = $next($request);
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }
        return $response;
    }
}
