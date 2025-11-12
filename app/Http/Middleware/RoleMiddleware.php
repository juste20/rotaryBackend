<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
   
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        if (!in_array($user->role->slug, $roles)) {
            abort(403, 'Accès refusé — Vous n’avez pas les droits nécessaires.');
        }

        return $next($request);
    }
}
