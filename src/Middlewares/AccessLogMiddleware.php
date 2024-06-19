<?php

namespace Jaleeldgk\LaravelAccessLogs\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessLogMiddleware
{
    public function handle($request, Closure $next)
    {
        // Attach the authenticated user to the request
        if (Auth::check()) {
            $request->attributes->set('logged_in_user', Auth::user());
        }

        $response = $next($request);

        // Attach the response status to the request
        $request->attributes->set('response_status', $response->getStatusCode());

        return $response;
    }
}
