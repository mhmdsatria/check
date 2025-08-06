<?php

// App/Http/Middleware/SuperAdminAuth.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperAdminAuth {
    public function handle($request, Closure $next) {
        if (!Auth::check() || Auth::user()->role !== 'SuperAdmin') {
            return redirect()->route('login.superadmin');
        }
        return $next($request);
    }
}

// App/Http/Middleware/AdminAuth.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth {
    public function handle($request, Closure $next) {
        if (!Auth::check() || Auth::user()->role !== 'Admin') {
            return redirect()->route('login.admin');
        }
        return $next($request);
    }
}
