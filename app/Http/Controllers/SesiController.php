<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SesiController extends Controller
{
    /**
     * Halaman Login Umum
     */
    public function index(Request $request)
    {
        if ($request->is('login/superadmin')) {
            return view('login-superadmin'); // ✅ view khusus superadmin
        } elseif ($request->is('login/admin')) {
            return view('login-admin'); // ✅ view khusus admin divisi
        }
        return redirect()->route('login.superadmin'); // default
    }


    /**
     * Login khusus Super Admin (gunakan guard superadmin)
     */
    public function loginSuperAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if ($user->role !== 'SuperAdmin') {
                Auth::logout();
                return back()->withErrors(['email' => 'Akun ini bukan Super Admin!']);
            }
            $request->session()->regenerate();
            return redirect()->route('super-admin.index'); // ✅ Langsung ke dashboard superadmin
        }
        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if ($user->role !== 'Admin') {
                Auth::logout();
                return back()->withErrors(['email' => 'Akun ini bukan Admin Divisi!']);
            }
            $request->session()->regenerate();
            return redirect()->route('admin.index'); // ✅ Langsung ke dashboard admin
        }
        return back()->withErrors(['email' => 'Email atau password salah!']);
    }




    /**
     * Logout Universal
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login.superadmin')->with('success', 'Berhasil logout');
    }

    /**
     * Form Registrasi (opsional)
     */
    public function registerForm()
    {
        return view('register');
    }

    /**
     * Proses Registrasi (opsional)
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }
}
