<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'Admin') {
            return redirect()->route('login.admin')->withErrors(['email' => 'Silakan login sebagai Admin Divisi.']);
        }

        return $next($request);
    }
}