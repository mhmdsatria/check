<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Cek login dengan guard 'admin'
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('login.admin')->withErrors(['email' => 'Silakan login sebagai Admin Divisi.']);
        }

        // Cek role
        if (Auth::guard('admin')->user()->role !== 'Admin') {
            Auth::guard('admin')->logout();
            return redirect()->route('login.admin')->withErrors(['email' => 'Akses ditolak! Bukan Admin Divisi.']);
        }

        return $next($request);
    }
}
