<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login'); // not logged in
        }

        if (!in_array($user->role, $roles)) {
            abort(403, 'Unauthorized'); // user does not have the required role
        }

        return $next($request);
    }
}
