<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleBasedRedirect
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        
        // Check if user has any of the required roles
        if (!empty($roles) && !in_array($user->role, $roles)) {
            return $this->redirectBasedOnRole($user->role);
        }

        return $next($request);
    }

    /**
     * Redirect user based on their role
     */
    private function redirectBasedOnRole($role)
    {
        switch ($role) {
            case 'admin':
                return redirect('/admin/dashboard');
            case 'teacher':
                return redirect('/teacher/dashboard');
            case 'student':
                return redirect('/student/dashboard');
            default:
                return redirect('/dashboard');
        }
    }
}