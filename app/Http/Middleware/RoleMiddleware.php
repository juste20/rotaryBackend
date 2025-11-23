<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        // Vérifie si l'utilisateur a au moins un rôle autorisé
        if (! $user->roles()->whereIn('slug', $roles)->exists()) {
            abort(403, 'Accès refusé — Vous n’avez pas les droits nécessaires.');
        }

        return $next($request);
    }
}
