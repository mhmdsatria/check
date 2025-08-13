<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                // Redirect sesuai role
                if ($user->role === 'superadmin') {
                    return redirect('/superadmin');
                } elseif ($user->role === 'admin_divisi') {
                    return redirect('/admin-divisi');
                } else {
                    return redirect('/'); // Default redirect jika role lain
                }
            }
        }

        return $next($request);
    }
}
