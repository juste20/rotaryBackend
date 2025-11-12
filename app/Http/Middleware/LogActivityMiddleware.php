<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogActivityMiddleware
{
    
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (Auth::check()) {
            $user = Auth::user();
            $message = sprintf(
                "[%s] %s %s par %s (ID: %d)",
                now()->toDateTimeString(),
                $request->method(),
                $request->path(),
                $user->name,
                $user->id
            );

            Log::channel('daily')->info($message);
        }

        return $response;
    }
}
