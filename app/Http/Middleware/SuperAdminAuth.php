<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperAdminAuth {
    public function handle($request, Closure $next) {
        if (!Auth::check() || Auth::user()->role !== 'SuperAdmin') {
            return redirect()->route('login.superadmin')->withErrors(['email' => 'Silakan login sebagai Super Admin.']);
        }
        return $next($request);
    }
}