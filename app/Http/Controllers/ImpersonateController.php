<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
    public function impersonate(Request $request, $adminId)
    {
        $admin = User::findOrFail($adminId);
        if(! $admin || $admin->role !== 'admin_bidang') {
            return redirect()->back()->with('error','Target bukan admin bidang.');
        }

        // store original user id in session
        session(['impersonate.original' => auth()->id()]);
        Auth::loginUsingId($admin->id);

        return redirect()->route('admin.dashboard')->with('success','Anda sekarang masuk sebagai ' . $admin->name);
    }

    public function stop(Request $request)
    {
        $original = session('impersonate.original');
        if($original) {
            Auth::loginUsingId($original);
            session()->forget('impersonate.original');
        }
        return redirect()->route('superadmin.dashboard')->with('success','Kembali ke Super Admin.');
    }
}
